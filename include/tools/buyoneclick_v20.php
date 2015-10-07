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
	
	$userName = mb_convert_encoding(htmlspecialchars($_POST['oneClickBuy_name']), "Windows-1251", "utf-8");
	$userPhone = mb_convert_encoding(htmlspecialchars($_POST['oneClickBuy_phone']), "Windows-1251", "utf-8");
    $userEmail = mb_convert_encoding(htmlspecialchars($_POST['preOrder_email']), "Windows-1251", "utf-8");
    $userMessage = mb_convert_encoding(htmlspecialchars($_POST['oneClickBuy_message']), "Windows-1251", "utf-8");
	
	$registeredUserID = 1;
	//$userEmail = 'order@apple-house.ru';
	
	$orderProps = array(
		1 => $userName,
		3 => $userPhone,
		7 => $userMessage,
		2 => $userEmail
	);
	
	$orderQuantity = 1;
	
	$orderProductID = intval($_POST['oneClickBuy_id']);
	if($orderProductID < 1)
		$jsonAnswer['status'] = 'error';
	
	$newOrder = array(
		'LID' => SITE_ID,
		'PERSON_TYPE_ID' => 1,
		'PAYED' => 'N',
		'CURRENCY' => "RUB",
		'USER_ID' => $registeredUserID
	);
	
	$newOrderID = CSaleOrder::Add($newOrder);
	/*$jsonAnswer['order_id'] = $newOrderID;
	$newOrder = CSaleOrder::GetByID($newOrderID);
	$jsonAnswer['order_date'] = $newOrder['DATE_INSERT'];
	*/

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

	// add item to basket
	if(!$error) {
		$db_product = CIBlockElement::GetByID($orderProductID);
		$arProduct = $db_product->GetNext();
		
		$arProps = array();
		$iblockID = 8;

		$arProps = CIBlockPriceTools::GetOfferProperties($orderProductID, 8, array());
		
		$add = Add2BasketByProductID($orderProductID, 1, array('ORDER_ID' => $newOrderID, 'QUANTITY' => $orderQuantity), $arProps);

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
	// send mail
    //$adminEmail = 'ipcasique@gmail.com';
    $adminEmail = COption::GetOptionString('main', 'email_from', 'ipcasique@gmail.com'). ', to.nooze@gmail.com';
    //$adminEmail = COption::GetOptionString('main', 'email_from', 'default@admin.email');

	$letterFields = array(
		'ORDER_ID' => $newOrderID,
		'ORDER_DATE' => date('d.m.Y'),
		'ORDER_USER' => "admin",
		'PRICE' => $orderPrice,
        'ADMIN_EMAIL' => $adminEmail,
        'EMAIL' => $userEmail,
		//'BCC' => !empty($bcc)? implode(',', $bcc) : '',
		'ORDER_LIST' => $orderList,
		'NAME' => $userName,
		'PHONE' => $userPhone,
		'COMMENT' => $userMessage
	);

	// Event "OnOrderNewSendEmail" processing
	$eventName = 'SALE_NEW_ONECLICK_ORDER';
	$send_letter = true;
	$db_events = GetModuleEvents('sale', 'OnOrderNewSendEmail');
	while ($arEvent = $db_events->Fetch())
		if (ExecuteModuleEventEx($arEvent, array($newOrderID, &$eventName, &$letterFields)) === false)
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
    $('#oneClickBuy_phone').mask('+7 ?(999) 999-99-99');
    $('#oneClickBuy_phone').focusout(function(){
        if($(this).val() == '+7 (___) ___-__-__')
            $(this).val('');
    });

	$('#oneClickBuy_name').focus(function(e) {
		if($(this).hasClass('modal_error')) {
			$(this).removeClass('modal_error');
			$(this).val('');
		}
	});
	
	$('#oneClickBuy_phone').focus(function(e) {
		if($(this).hasClass('modal_error')) {
			$(this).removeClass('modal_error');
			$(this).val('');
		}
	});
	
	$('#modal_oneClickBuy_submit').click(function(e) {
		e.preventDefault();
		
		var error = false;
/*
		if($('#oneClickBuy_name').val() == '') {
			$('#oneClickBuy_name').addClass('modal_error');
			$('#oneClickBuy_name').val('Вы не ввели имя');
			error = true;
		}
		else if($('#oneClickBuy_name').hasClass('modal_error')) {
			error = true;
		}
*/
		if($('#oneClickBuy_phone').val() == '') {
			$('#oneClickBuy_phone').addClass('modal_error');
			$('#oneClickBuy_phone').val('Вы не ввели телефон');
			error = true;
		}
		else if($('#oneClickBuy_phone').hasClass('modal_error')) {
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
			'/include/tools/buyoneclick.php',
			{
				orderAjax : 'Y',
				oneClickBuy_name: $('#oneClickBuy_name').val(),
				oneClickBuy_phone: $('#oneClickBuy_phone').val(),
                preOrder_email: $('#preOrder_email').val(),
                oneClickBuy_id: <?=$arElement['ID']?>,
				oneClickBuy_message: $('#oneClickBuy_message').val()
			},
			function(data) {
				var obData = $.parseJSON(data);
				if(obData.status == 'success') {
					$('.modal_oneClickBuy_tbl').remove();
					$('.modal_oneClickBuy_tbl_input').remove();
					$('.modal_oneClickBuy_info').remove();
					$('.modal_oneClickBuy_submit').remove();
                    $('#pop-up-quick-order-form').remove();

                    ga('ecommerce:addTransaction', {
                        'id': '<?=$transid?>',                                              // Transaction ID. Required
                        'affiliation': 'Apple House',                                       // Affiliation or store name
                        'revenue': '<?=$arElement['PRICE']['Продажа']["VALUE_VAT"]?>',      // Grand Total
                        'shipping': '300',                                                  // Shipping
                        'tax': '0'                                                          // Tax
                    });
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
*/

                    ga('ecommerce:addItem', {
                        'id': '<?=$transid?>',                                          // Transaction ID. Required
                        'name': '<?=$arElement['NAME']?>',                              // Product name. Required
                        'sku': '<?=$arElement['ID']?>',                                 // SKU/code
                        'category': '1 click order',                                    // Category or variation
                        'price': '<?=$arElement['PRICE']['Продажа']["VALUE_VAT"]?>',    // Unit price
                        'quantity': '1'                                                 // Quantity
                    });
/*
					_gaq.push(['_addItem',
						'<?=$transid?>',           // transaction ID - required
						'<?=$arElement['ID']?>',           // SKU/code - required
						'<?=$arElement['NAME']?>',        // product name
						'1 click order',   // category or variation
						'<?=$arElement['PRICE']['Продажа']["VALUE_VAT"]?>',          // unit price - required
						'1'               // quantity - required
					  ]);
*/
					  //_gaq.push(['_trackTrans']); //submits transaction to the Analytics servers
                    ga('ecommerce:send'); //submits transaction to the Analytics servers


                    $('.modal_overlay_wrap').show();
					$('.modal_oneClickBuy_success').show();
				}
			}
		);
	});
});
</script>


            <div class="pop-up pop-up-quick-order" id="pop-up-quick-order-form">
                <div class="clearfix pop-up-header">
                    <h1 class="pull-left pop-up-title">Быстрый заказ</h1>
                    <div class="pull-right pop-up-close">
                        <a href="#"><i class="pop-up-close-icon modal_oneClickBuy_close_v20"></i></a>
                    </div>
                </div>
                <div class="horizontal-line horizontal-line-main"></div>

                <div class="pop-up-content clearfix">
                    <div class="pull-left pop-up-picture">
                        <img src="<?=$arElement['PREVIEW_PICTURE']['SRC']?>" class="pop-up-img" alt="<?=$arElement['NAME']?>" />
                    </div>
                    <div class="pull-left pop-up-product">
                        <h1 class="pop-up-product-title"><?=$arElement['NAME']?></h1>
                        <div class="pop-up-product-price"><?=$arElement['PRICE']['Продажа']['DISCOUNT_VALUE_VAT']?> <span class="cy">руб.</span></div>
                    </div>
                </div>

                <div class="pop-up-form-block clearfix">
                    <div class="contact-details">
                        <input id="oneClickBuy_name" type="text" placeholder="Ф.И.О.*" required="" class="form-input form-input-name"><br>
                        <input id="preOrder_email" type="email" placeholder="e-mail*" required="" class="form-input form-input-name"><br>
                        <input id="oneClickBuy_phone" type="tel" placeholder="контактный телефон*"  class="form-input form-input-name">
                    </div>
                    <div class="contact-details-2">
                        <textarea id="oneClickBuy_message" class="form-textarea" placeholder="адрес и комментарий "></textarea>
                    </div>
                </div>

                <div class="pop-up-buy clearfix">
                    <div class="pop-up-buy-text pull-left">
                        Менеджер нашего магазина свяжется с Вами для уточнения заказа и условий доставки.
                    </div>
                    <div class="pop-up-buy-button pull-left">
                        <a id="modal_oneClickBuy_submit" href="#" class="button-bg">купить</a>
                    </div>
                </div>



            </div>
    <div class="modal_overlay_wrap" style="display: none;width: 530px;margin: 0 auto;">
        <div class="modal_overlay_cont" id="modal_overlay_cont">
            <div class="modal_oneClickBuy">
                <div class="modal_oneClickBuy_success">
                    <h3 class="ff_helvetica-neue-bold margin-top_15px">Спасибо! Ваш заказ отправлен.</h3>
                    <div class="ff_helvetica-neue-light fs_14px margin-top_10px">Менеджер нашего магазина свяжется с вами в ближайшее время</div>
                </div>
                <a class="modal_oneClickBuy_close link_007eb4 modal_overlay_close_btn modal_oneClickBuy_close_v20" id="modal_oneClickBuy_close" href="#">закрыть</a>
            </div>
        </div>
    </div>
<?
}
?>
