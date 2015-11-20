<?

if($arResult["ORDER_ID"]) {
	
    if($arResult['ORDER']['PAY_SYSTEM_ID'] == 9) { //KupiVKredit
        $commisionProductID = 3986;
        $commisionPrice = number_format(($arResult['ORDER']['PRICE'])*0.05, 2, '.', '');
        $commisionName = "Комиссия за выдачу кредита";
    }
    elseif($arResult['ORDER']['PAY_SYSTEM_ID'] == 7) { //PayU
        $commisionProductID = 3986;
        //$commisionProductID = false;
        $commisionPrice = number_format(($arResult['ORDER']['PRICE'])*0.039, 2, '.', '');
        $commisionName = "Комиссия за проведение платежа";
    }
    elseif($arResult['ORDER']['PAY_SYSTEM_ID'] == 10) { //оплата картой курьеру
        $commisionProductID = 3986;
        $commisionPrice = number_format(($arResult['ORDER']['PRICE'])*0.05, 2, '.', '');
        $commisionName = "Комиссия";
    }
    elseif($arResult['ORDER']['PAY_SYSTEM_ID'] == 11) { //Beznal
        $commisionProductID = 3986;
        $commisionPrice = number_format(($arResult['ORDER']['PRICE'])*0.05, 2, '.', '');
        $commisionName = "Комиссия";
    }
	else {
		$commisionProductID = false;
	}
	
	$arFilter = Array(
		"ORDER_ID" => $arResult["ORDER_ID"],
		"ID"=> '39',
    );

	CModule::IncludeModule("sale");
	
    //$db_sales = CSaleOrder::GetList(array("DATE_INSERT" => "ASC"), $arFilter,false,false,array("ID","PRICE","PRICE_DELIVERY","PROPERTY_*"));
    $db_sales = CSaleOrder::GetByID($arResult["ORDER_ID"]);
    //while ($ar_sales = $db_sales->Fetch())
	$ar_sales=$db_sales;
	$props=CSaleOrderPropsValue::GetOrderProps($arResult["ORDER_ID"]);
	while($arVals = $props->Fetch()){
       // echo "<pre>";var_dump($arVals);
	}
    {
	 
	$ar_sales["ID"]=$arResult["ORDER"]["ACCOUNT_NUMBER"];
    $_REQUEST["ECOMMERSE"] = "ga('ecommerce:addTransaction', {
    'id': '".$ar_sales['ID']."',                        // Transaction ID. Required
    'affiliation': 'Apple-house',                       // Affiliation or store name
    'revenue': '".$ar_sales["PRICE"]."',                // Grand Total
    'shipping': '".$ar_sales["PRICE_DELIVERY"]."',      // Shipping
    'tax': '0'                                           // Tax
    });";
/*
    $_REQUEST["ECOMMERSE"] = "_gaq.push(['_addTrans',
    '".$ar_sales['ID']."',
    'Apple-house',
    '".$ar_sales["PRICE"]."',
    '',
    '".$ar_sales["PRICE_DELIVERY"]."',
    'Moscow',
    'Moscow',
    'Russia'
    ]);";
*/
    $arBasketItems = array();
    $dbBasketItems = CSaleBasket::GetList(
    array(
    "NAME" => "ASC",
    "ID" => "ASC"
    ),
    array(
    "ORDER_ID" => $arResult["ORDER_ID"]
    ),
    false,
    false,
    array("ID", "CALLBACK_FUNC", "MODULE",
    "PRODUCT_ID", "QUANTITY", "DELAY",
    "CAN_BUY", "PRICE", "WEIGHT")
    );
	$commisionFound = false;
    while ($arItems = $dbBasketItems->Fetch())
    {
		if($arItems["PRODUCT_ID"] == $commisionProductID) {
			$commisionFound = true;
			continue;
		}
    $res2 = CIBlockElement::GetByID($arItems["PRODUCT_ID"]) ;
    $ar_res2 = $res2->GetNext();
    $res3 = CIBlockSection::GetByID($ar_res2["IBLOCK_SECTION_ID"]) ;
    $ar_res3 = $res3->GetNext();
    $_REQUEST["ECOMMERSE"] .= "ga('ecommerce:addItem', {
    'id': '".$ar_sales['ID']."',                    // Transaction ID. Required
    'name': '".$ar_res2['NAME']."',                 // Product name. Required
    'sku': '".$arItems['ID']."',                    // SKU/code
    'category': '".$ar_res3['NAME']."',             // Category or variation
    'price': '".$arItems['PRICE']."',               // Unit price
    'quantity': '".$arItems['QUANTITY']."'          // Quantity
    });";
/*
    $_REQUEST["ECOMMERSE"] .= "_gaq.push(['_addItem',
    '".$ar_sales['ID']."',
    '".$arItems['ID']."',
    '".$ar_res2['NAME']."',
    '".$ar_res3['NAME']."',
    '".$arItems['PRICE']."',
    '".$arItems['QUANTITY']."'
    ]);";
*/
    }

    //$_REQUEST["ECOMMERSE"] .= "_gaq.push(['_trackTrans']);";
    $_REQUEST["ECOMMERSE"] .= "ga('ecommerce:send');";

    }

$arResult["ECOMMERSE"]=$_REQUEST["ECOMMERSE"];	

	if($commisionProductID && !$commisionFound) {
		$arFields = array(
			"PRODUCT_ID" => $commisionProductID,
			"ORDER_ID" => $arResult["ORDER_ID"],
			"PRICE" =>  $commisionPrice,
			"CURRENCY" => "RUB",
			"QUANTITY" => 1,
			"LID" => LANG,
			"DELAY" => "N",
			"CAN_BUY" => "Y",
			"NAME" => $commisionName,
		);
		
		CSaleBasket::Add($arFields);
		
		CSaleOrder::Update($arResult['ORDER_ID'], array('PRICE' => ($arResult['ORDER']['PRICE'] + $commisionPrice)));
	}

}

?>