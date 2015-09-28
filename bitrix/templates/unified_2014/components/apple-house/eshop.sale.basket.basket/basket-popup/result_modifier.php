<?
///// ADD TO BASKET
$action = strtoupper($_REQUEST['add']);
$productID = intval($_REQUEST["id"]);
if($action == "ADD2BASKET" && $productID > 0)
{
	if(CModule::IncludeModule("iblock") && CModule::IncludeModule("sale") && CModule::IncludeModule("catalog"))
	{
		$QUANTITY = 1;

		$product_properties = array();

		$rsItems = CIBlockElement::GetList(array(), array('ID' => $productID), false, false, array('ID', 'IBLOCK_ID'));
		if ($arItem = $rsItems->Fetch())
		{
			$arItem['IBLOCK_ID'] = intval($arItem['IBLOCK_ID']);
		}
		else
		{
			$strError = GetMessage('CATALOG_PRODUCT_NOT_FOUND').".";
		}

		if(!$strError && Add2BasketByProductID($productID, $QUANTITY))
		{
				LocalRedirect($APPLICATION->GetCurPageParam("", array('id', 'add')));
		}
		else
		{
			if($ex = $GLOBALS["APPLICATION"]->GetException())
				$strError = $ex->GetString();
			else
				$strError = GetMessage("CATALOG_ERROR2BASKET").".";
		}
	}
}
///// END OF ADD TO BASKET

$basketItemsIDs = array();
$recommendItemsIDs = array();
$recommendSectionIDs = array();
$detailURLs = array();
$arResult['RECCOMEND'] = array();

foreach($arResult['ITEMS']['AnDelCanBuy'] as $basketItems) {
	$basketItemsIDs[] = $basketItems['PRODUCT_ID'];
}

if(!empty($basketItemsIDs)) {
	$arSelect = array("ID", "PROPERTY_RECOMMEND", "IBLOCK_SECTION_ID");
	$arFilter = array("IBLOCK_ID" => 8, "ID" => $basketItemsIDs);
	$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
	while($arFields = $res->GetNext()) {
		$recommend = $arFields['PROPERTY_RECOMMEND_VALUE'];
		if(!in_array($recommend, $recommendItemsIDs) && !empty($recommend))
			$recommendItemsIDs[] = $recommend;
		elseif(!in_array($arFields['IBLOCK_SECTION_ID'], $recommendSectionIDs))
			$recommendSectionIDs[] = $arFields['IBLOCK_SECTION_ID'];
	}
/*
	$arSelect = array("ID", "PROPERTY_CML2_CODE", "IBLOCK_SECTION_ID");
	$arFilter = array("IBLOCK_ID" => 8, "ID" => $basketItemsIDs);
	$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
	while($arFields = $res->GetNext()) {
		$detailURLs[$arFields['ID']] = '/' . $arFields['PROPERTY_CML2_CODE_VALUE'];
		if(!in_array($arFields['IBLOCK_SECTION_ID'], $recommendSectionIDs))
			$recommendSectionIDs[] = $arFields['IBLOCK_SECTION_ID'];
	}
*/
	foreach($arResult['ITEMS']['AnDelCanBuy'] as $key => $basketItems) {
		$arResult['ITEMS']['AnDelCanBuy'][$key]['DETAIL_PAGE_URL'] = $detailURLs[$basketItems['PRODUCT_ID']];
	}

	if(!empty($recommendSectionIDs)) {
		$arFilter = array('IBLOCK_ID' => 8, 'ID' => $recommendSectionIDs, 'GLOBAL_ACTIVE'=>'Y');
		$arSelect = array('ID', 'UF_RECOMMEND');
		$db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
		while($ar_result = $db_list->GetNext()) {
			foreach($ar_result['UF_RECOMMEND'] as $recommend) {
				if(!in_array($recommend, $recommendItemsIDs) && !empty($recommend))
					$recommendItemsIDs[] = $recommend;
			}
		}
	}
}

if(!empty($recommendItemsIDs)) {
	
	$arResult["PRICES"] = CIBlockPriceTools::GetCatalogPrices(8, array('Продажа'));
	
	$arRecommendFilter = array(
		"IBLOCK_ID" => 8,
		"ID" => $recommendItemsIDs,
		"ACTIVE" => "Y",
	);
	$arRecommendSelect = array("ID", "NAME", "PREVIEW_PICTURE", "IBLOCK_ID", "CATALOG_GROUP_1", "PROPERTY_CML2_CODE");
	$res = CIBlockElement::GetList(array(), $arRecommendFilter, false, false, $arRecommendSelect);
	while($ar_fields = $res->GetNext()) {
		if($ar_fields["PREVIEW_PICTURE"])
			$ar_fields["PREVIEW_PICTURE"] = CFile::GetFileArray($ar_fields["PREVIEW_PICTURE"]);

		$ar_fields["DETAIL_PAGE_URL"] = '/catalog/' . $ar_fields['PROPERTY_CML2_CODE_VALUE'];
		$ar_fields["PRICES"] = CIBlockPriceTools::GetItemPrices(8, $arResult["PRICES"], $ar_fields, true);
		$ar_fields["CAN_BUY"] = CIBlockPriceTools::CanBuy(8, $arResult["PRICES"], $ar_fields);
		$ar_fields["ADD_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam("add=ADD2BASKET&id=".$ar_fields["ID"], array("id", "action")));
		$price=current($ar_fields["PRICES"]);
		
		if(!empty($price['VALUE']))$arResult['RECCOMEND'][] = $ar_fields;
	}
	$arResult['RECCOMEND_PAGES'] = ceil(count($arResult['RECCOMEND'])/4);
}
?>