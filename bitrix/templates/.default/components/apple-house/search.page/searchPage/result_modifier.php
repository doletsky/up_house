<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

///// ADD TO BASKET
$action = strtoupper($_REQUEST['action']);
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
			// в кредит
			if($_REQUEST['credit'] == 'Y') {
				$product_properties[] = array(
					"NAME" => "Кредит",
					"CODE" => "Credit", 
					"VALUE" => "Да", 
					"SORT" => "100"
				);
			}

		if(!$strError && Add2BasketByProductID($productID, $QUANTITY, array(), $product_properties))
		{
				LocalRedirect($APPLICATION->GetCurPageParam("", array('id', 'action', 'credit')));
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

$arResult["TAGS_CHAIN"] = array();
if($arResult["REQUEST"]["~TAGS"])
{
	$res = array_unique(explode(",", $arResult["REQUEST"]["~TAGS"]));
	$url = array();
	foreach ($res as $key => $tags)
	{
		$tags = trim($tags);
		if(!empty($tags))
		{
			$url_without = $res;
			unset($url_without[$key]);
			$url[$tags] = $tags;
			$result = array(
				"TAG_NAME" => htmlspecialcharsex($tags),
				"TAG_PATH" => $APPLICATION->GetCurPageParam("tags=".urlencode(implode(",", $url)), array("tags")),
				"TAG_WITHOUT" => $APPLICATION->GetCurPageParam((count($url_without) > 0 ? "tags=".urlencode(implode(",", $url_without)) : ""), array("tags")),
			);
			$arResult["TAGS_CHAIN"][] = $result;
		}
	}
}

$arSearchItems = array();
foreach($arResult["SEARCH"] as $key => $arItem) {
	if($arItem['PARAM2'] == 8)
		$arSearchItems[] = $arItem['ITEM_ID'];
	$arResult["SEARCH"][$key]['DETAIL_PAGE_URL'] = '/catalog/detail/?ELEMENT_ID=' . $arItem['ITEM_ID'];
}

$arResult["PRICES"] = CIBlockPriceTools::GetCatalogPrices(8, array('Продажа'));

if(!empty($arSearchItems)) {
	$arSearchSections = array();
	$arSelect = array("ID", "IBLOCK_ID", "IBLOCK_SECTION_ID", "NAME", "PREVIEW_PICTURE", "DATE_ACTIVE_FROM", "CATALOG_GROUP_1", "PROPERTY_CML2_CODE");
	$arFilter = array("IBLOCK_ID" => 8, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arSearchItems);
	$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
	while($arElement = $res->GetNext()) {
		if($arElement["PREVIEW_PICTURE"])
			$arElement["PREVIEW_PICTURE"] = CFile::GetFileArray($arElement["PREVIEW_PICTURE"]);
		
		$arElement["DETAIL_PAGE_URL"] = '/' . $arElement['PROPERTY_CML2_CODE_VALUE'];
		$arElement["PRICES"] = CIBlockPriceTools::GetItemPrices(8, $arResult["PRICES"], $arElement, true);
		//$arElement["CAN_BUY"] = CIBlockPriceTools::CanBuy(8, $arResult["PRICES"], $arElement);
		$arElement["CAN_BUY"] = 'Y';
		$price["CAN_BUY"] = 'Y';
		$arElement["ADD_URL"] = "/personal/basket/?add=ADD2BASKET&id=".$arElement["ID"];
		
		foreach($arElement["PRICES"] as &$price){
		if($price["VALUE"]==0){
			$price["CAN_BUY"]=0;
			$arElement["CAN_BUY"]=0;
		}
		//$price["CAN_BUY"]=0;
		//$arElement["CAN_BUY"]=0;
		break;
		}
		
		if(!in_array($arElement['IBLOCK_SECTION_ID'], $arSearchSections))
			$arSearchSections[] = $arElement['IBLOCK_SECTION_ID'];
	
		$arResult["SEARCH_ITEMS"][$arElement['ID']] = $arElement;
	}
}

if(!empty($arSearchSections)) {
	$arSelect = array("ID", "UF_BUY_DISABLE");
	$arFilter = array("IBLOCK_ID" => 8, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arSearchSections);
	$res = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
	while($arSection = $res->GetNext()) {
		$arResult["SEARCH_ITEMS_SECTIONS"][$arSection['ID']] = $arSection;
	}
}
?>