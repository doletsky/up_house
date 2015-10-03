<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
if($_REQUEST['orderAjax'] == 'Y') {
	CModule::IncludeModule("iblock");
	CModule::IncludeModule("catalog");
	CModule::IncludeModule("sale");
	
	$basketUserID = CSaleBasket::GetBasketUserID();
	CSaleBasket::DeleteAll($basketUserID);
	
	/*
	$use_captcha = COption::GetOptionString('main', 'captcha_registration', 'N');
	if ($use_captcha == 'Y')
		COption::SetOptionString('main', 'captcha_registration', 'N');
	$userPassword = randString(10);
	$userFIO = parseFIOString($_POST['new_order']['FIO']);
	$newUser = $USER->Register($login, $userFIO[0], $userFIO[1],
		$userPassword,  $userPassword,$_POST['new_order']['EMAIL']);
	if ($use_captcha == 'Y')
		COption::SetOptionString('main', 'captcha_registration', 'Y');
	if ($newUser['TYPE'] == 'ERROR') {
		die(getResultJsonArray(GetMessage('1CB_USER_REGISTER_FAIL'), 'N', $newUser['MESSAGE']));
	} else {
		$registeredUserID = $USER->GetID();
		if (!empty($_POST['new_order']['PHONE']))
			$userUpd = $USER->Update($registeredUserID, 
				array('PERSONAL_PHONE' => $_POST['new_order']['PHONE']));
		$USER->Logout();
	}
	*/
	$error = false;
	$jsonAnswer = array();
	
	$userName = mb_convert_encoding(htmlspecialchars($_POST['preOrder_name']), "Windows-1251", "utf-8");
	$userPhone = mb_convert_encoding(htmlspecialchars($_POST['preOrder_phone']), "Windows-1251", "utf-8");
	$userEmail = mb_convert_encoding(htmlspecialchars($_POST['preOrder_email']), "Windows-1251", "utf-8");
	$userMessage = mb_convert_encoding(htmlspecialchars($_POST['preOrder_message']), "Windows-1251", "utf-8");
	
	$registeredUserID = 1;
	//$userEmail = 'order@apple-house.ru';
	
	$orderProps = array(
		1 => $userName,
		3 => $userPhone,
		7 => $userMessage,
		2 => $userEmail
	);
	
	$orderQuantity = 1;
	
	$orderProductID = intval($_POST['preOrder_id']);
	if($orderProductID < 1)
		$jsonAnswer['status'] = 'error';
	
	$newOrder = array(
		'LID' => SITE_ID,
		'PERSON_TYPE_ID' => 1,
		'PAYED' => 'N',
		'CURRENCY' => "RUB",
		'USER_ID' => $registeredUserID
	);
	
	$newOrderID = CSaleOrder::Add($newOrder);         ////////////////

	/*
	$jsonAnswer['order_id'] = $newOrderID;
	$newOrder = CSaleOrder::GetByID($newOrderID);
	$jsonAnswer['order_date'] = $newOrder['DATE_INSERT'];
	//*/
	
	if(!empty($_COOKIE['HTTP_REFERER'])){
					
		$arHFields = array(
		   "ORDER_ID" => $newOrderID,
		   "ORDER_PROPS_ID" => 42,
		   "NAME" => "HTTP Источник",
		   "CODE" => "REFERER",
		   "VALUE" => $_COOKIE['HTTP_REFERER']
		);
		
		CSaleOrderPropsValue::Add($arHFields);
	}

	if ($newOrderID == false) {
		$error = true;
		$jsonAnswer['status'] = 'error';
		if($ex = $APPLICATION->GetException())
			$jsonAnswer['errors'][] = $ex->GetString();
	}
	else {
		$jsonAnswer['status'] = 'success';
		//$jsonAnswer['order_id'] = $newOrderID;
	}
 /////////////////////////
    $el_res= CIBlockElement::GetByID( $orderProductID );

    //$productUrl = '<a href="http://' . $_SERVER['HTTP_HOST'].urldecode($_REQUEST['product_url']) . '">' . $_SERVER['HTTP_HOST'].urldecode($_REQUEST['product_url']) . '</a>';
    $productUrl = $_SERVER['HTTP_HOST'].urldecode($_REQUEST['product_url']);
    //$productUrl = urldecode($_REQUEST['product_url']);
    $productName = urldecode($_REQUEST['product_name']);

/*    if ($el_arr = $el_res->GetNext())
        $productUrl = $el_arr[ 'DETAIL_PAGE_URL' ];
*/
	
	// add item to basket

	if(!$error) {
		$db_product = CIBlockElement::GetByID($orderProductID);
		$arProduct = $db_product->GetNext();

		$arProps = array();
		$iblockID = 8;

		$arProps = CIBlockPriceTools::GetOfferProperties($orderProductID, 8, array());

		//$add = Add2BasketByProductID($orderProductID, 1, array('ORDER_ID' => $newOrderID, 'QUANTITY' => $orderQuantity), $arProps);
		$add = CSaleBasket::Add(array('PRODUCT_ID' => $orderProductID, "PRODUCT_PRICE_ID" => 0, "PRICE" => 0, "CURRENCY" => "RUB", "QUANTITY" => $orderQuantity, "LID" => SITE_ID, "NAME" => $arProduct['NAME'], "ORDER_ID" => $newOrderID, "PRODUCT_XML_ID" => $arProduct['XML_ID']));

		if (!$add) {
			$error = true;
			$jsonAnswer['status'] = 'error';
			if($ex = $APPLICATION->GetException())
				$jsonAnswer['errors'][] = $ex->GetString();
		} else {
			$ar_basket_item = CSaleBasket::GetByID($add);
			$orderPrice = $ar_basket_item['PRICE']*$ar_basket_item['QUANTITY'];
			$orderList = $ar_basket_item['NAME'];
		}
		//CSaleBasket::DeleteAll($basketUserID);
	}


	// add order properties

	if(!$error) {
		$name_prop_id = 1;
		$phone_prop_id = 3;
		$email_prop_id = 2;
		$message_prop_id = 7;
		$db_props = CSaleOrderProps::GetList(array(), array('@ID' => array($name_prop_id, $phone_prop_id, $email_prop_id, $message_prop_id)));
		
		while ($row = $db_props->Fetch())
			CSaleOrderPropsValue::Add(array(
				'ORDER_ID' => $newOrderID,
				'NAME' => $row['NAME'],
				'ORDER_PROPS_ID' => $row['ID'],
				'CODE' => $row['CODE'],
				'VALUE' => $orderProps[$row['ID']]
			));
	}

	//$_SESSION['SALE_BASKET_NUM_PRODUCTS'][SITE_ID] = 0;
	$orderUpdate = CSaleOrder::Update($newOrderID, array('PRICE' => $orderPrice));


//

	// send mail
	$adminEmail = 'ipc_pulsar@mail.ru';
	//$adminEmail = 'ipcasique@gmail.com, ipc_quasar@mail.ru';
	//$adminEmail = COption::GetOptionString('main', 'email_from', 'ipcasique@gmail.com'). ', substruct@mail.ru';
	//$adminEmail = COption::GetOptionString('main', 'email_from', 'ipcasique@gmail.com'). ', to.nooze@gmail.com';

	$letterFields = array(
		//'ORDER_ID' => $newOrderID,
		'ORDER_DATE' => date('d.m.Y'),
		'ORDER_USER' => "admin",
		//'PRICE' => $orderPrice,
		'ADMIN_EMAIL' => $adminEmail,
		'EMAIL' => $userEmail,
		//'BCC' => !empty($bcc)? implode(',', $bcc) : '',
		//'ORDER_LIST' => $orderList,
		'PRODUCT_URL' => $productUrl,
		'PRODUCT_NAME' => mb_convert_encoding($productName, "windows-1251", "utf-8"),//$productName,
		'NAME' => $userName,
		'PHONE' => $userPhone,
		'COMMENT' => $userMessage
	);

	// Event "OnOrderNewSendEmail" processing
	$eventName = 'SALE_NEW_PRE_ORDER';
	$send_letter = true;
	$db_events = GetModuleEvents('sale', 'OnOrderNewSendEmail');
	while ($arEvent = $db_events->Fetch())
        if (ExecuteModuleEventEx($arEvent, array($orderProductID, &$eventName, &$letterFields)) === false)
			$send_letter = false;

	if ($send_letter)
        CEvent::SendImmediate($eventName, SITE_ID, $letterFields, $duplicate);
		
	echo json_encode($jsonAnswer);
	
}
else {
	
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("sale");

$buyID = intval($_REQUEST['buy_id']);

$arResult["PRICES"] = CIBlockPriceTools::GetCatalogPrices(8, array("Продажа"));
$arSelect = array("ID", "NAME", "PREVIEW_PICTURE", "IBLOCK_ID", "CATALOG_GROUP_1");
$arFilter = array("IBLOCK_ID" => 8, "ID" => $buyID, "ACTIVE"=>"Y");
$obElement = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
$arElement = $obElement->GetNext();
$arElement['PRICE'] = CIBlockPriceTools::GetItemPrices(8, $arResult["PRICES"], $arElement, true, array('CURRENCY_ID' => 'RUB'));

if($arElement['PREVIEW_PICTURE'])
	$arElement['PREVIEW_PICTURE'] = CFile::GetFileArray($arElement['PREVIEW_PICTURE']);


if($USER->IsAuthorized()) {
	$arResult['NAME'] = $USER->GetFullName();
}

$transid='1click'.time();

?>
<script type="text/javascript">
$(document).ready(function() {

    $('#preOrder_phone').mask('+7 ?(999) 999-99-99');
    $('#preOrder_phone').focusout(function(){
        if($(this).val() == '+7 (___) ___-__-__')
            $(this).val('');
    });

	$('#preOrder_name').focus(function(e) {
		if($(this).hasClass('modal_error')) {
			$(this).removeClass('modal_error');
			$(this).val('');
		}
	});

	$('#preOrder_phone').focus(function(e) {
		if($(this).hasClass('modal_error')) {
			$(this).removeClass('modal_error');
			$(this).val('');
		}
	});

	$('#modal_preOrder_submit').click(function(e) {
		e.preventDefault();
		
		var error = false;
/*
		if($('#preOrder_name').val() == '') {
			$('#preOrder_name').addClass('modal_error');
			$('#preOrder_name').val('Вы не ввели имя');
			error = true;
		}
		else if($('#preOrder_name').hasClass('modal_error')) {
			error = true;
		}
*/
		if($('#preOrder_phone').val() == '') {
			$('#preOrder_phone').addClass('modal_error');
			$('#preOrder_phone').val('Вы не ввели телефон');
			error = true;
		}
		else if($('#preOrder_phone').hasClass('modal_error')) {
			error = true;
		}
/*
		if($('#preOrder_email').val() == '') {
			$('#preOrder_email').addClass('modal_error');
			$('#preOrder_email').val('Вы не ввели e-mail');
			error = true;
		}
		else if($('#preOrder_email').hasClass('modal_error')) {
			error = true;
		}
*/
		if(error)
			return;

		$.post(
			'/include/tools/preorder.php',
			{
				orderAjax : 'Y',
				preOrder_name: $('#preOrder_name').val(),
				preOrder_phone: $('#preOrder_phone').val(),
				preOrder_email: $('#preOrder_email').val(),
                product_url: encodeURIComponent("<?=$_REQUEST['product_url'];?>"),
                product_name: encodeURIComponent("<?=$arElement['NAME']?>"),

                preOrder_id: <?=$arElement['ID']?>,
				preOrder_message: $('#preOrder_message').val()
			},
			function(data) {
				var obData = $.parseJSON(data);
				if(obData.status == 'success') {
					$('.modal_preOrder_tbl').remove();
					$('.modal_preOrder_tbl_input').remove();
					$('.modal_preOrder_info').remove();
					$('.modal_preOrder_submit').remove();

                    /*
					_gaq.push(['_addTrans',
						'<?=$transid?>',           // transaction ID - required
						'Apple House',  // affiliation or store name
						'<?=$arElement['PRICE']['Продажа']["VALUE_VAT"]?>',          // total - required
						'0',           // tax
						'300',              // shipping
						'Moscow',       // city
						'',     // state or province
						'Russia'             // country
					  ]);

					_gaq.push(['_addItem',
						'<?=$transid?>',           // transaction ID - required
						'<?=$arElement['ID']?>',           // SKU/code - required
						'<?=$arElement['NAME']?>',        // product name
						'1 click order',   // category or variation
						'<?=$arElement['PRICE']['Продажа']["VALUE_VAT"]?>',          // unit price - required
						'1'               // quantity - required
					  ]);
					  _gaq.push(['_trackTrans']); //submits transaction to the Analytics servers
                    */

					$('.modal_preOrder_success').show();
				}
			}
		);
	});
});
</script>
<div class="modal_preOrder">
	<table class="modal_preOrder_tbl">
		<tr>
			<td rowspan="3" class="modal_preOrder_image">
				<? if(is_array($arElement['PREVIEW_PICTURE'])): ?>
				<img src="<?=$arElement['PREVIEW_PICTURE']['SRC']?>">
				<? endif ?>
			</td>
			<td class="modal_preOrder_title"><h3 class="ff_helvetica-neue-bold fs_18px">Предзаказ</h3></td>
		</tr>
		<tr>
			<td class="modal_preOrder_name b_catalog-item_text ff_helvetica-neue-light color_007eb4 fs_18px"><?=$arElement['NAME']?></td>
		</tr>
	</table>
	<table class="modal_preOrder_tbl_input margin-top_10px">
		<tr>
			<td class="ff_helvetica-neue-light color_black fs_14px">имя</td>
			<td class="ff_helvetica-neue-light color_black fs_14px">телефон</td>
		</tr>
		<tr>
			<td><input id="preOrder_name" class="b_input-text input-text_width_240px"></td>
			<td><input id="preOrder_phone" class="b_input-text input-text_width_240px"></td>
		</tr>
        <tr>
            <td class="ff_helvetica-neue-light color_black fs_14px">e-mail</td>
        </tr>
        <tr>
			<td><input id="preOrder_email" class="b_input-text input-text_width_240px"></td>
		</tr>
		<tr>
			<td colspan="2" class="ff_helvetica-neue-light color_black fs_14px">адрес и комментарий</td>
		</tr>
		<tr>
			<td colspan="2"><textarea id="preOrder_message" class="b_textarea"></textarea></td>
		</tr>
	</table>
	<div class="modal_preOrder_info ff_helvetica-neue-light color_black fs_14px margin-top_10px">Как только товар появится на складе, менеджер нашего магазина свяжется с Вами для уточнения заказа и условий доставки.</div>
	<div class="modal_preOrder_submit margin-top_10px">
        <a id="modal_preOrder_submit" class="b_button-buy button-buy_preorder no-style-link" href="#"></a>
    </div>
	<div class="modal_preOrder_success">
		<h3 class="ff_helvetica-neue-bold margin-top_15px">Спасибо! Ваш заказ отправлен.</h3>
		<div class="ff_helvetica-neue-light fs_14px margin-top_10px">Менеджер нашего магазина свяжется с Вами, как только товар появится на складе</div>
	</div>
</div>
<?
}
?>
