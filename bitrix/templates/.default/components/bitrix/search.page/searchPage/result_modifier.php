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

		if(!$strError && Add2BasketByProductID($productID, $QUANTITY))
		{
				LocalRedirect($APPLICATION->GetCurPageParam("", array('id', 'action')));
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

$arSelect = array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "DATE_ACTIVE_FROM", "CATALOG_GROUP_1");
$arFilter = array("IBLOCK_ID" => 8, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
while($arElement = $res->GetNext()) {
	if($arElement["PREVIEW_PICTURE"])
		$arElement["PREVIEW_PICTURE"] = CFile::GetFileArray($arElement["PREVIEW_PICTURE"]);
	
	$arElement["PRICES"] = CIBlockPriceTools::GetItemPrices(8, $arResult["PRICES"], $arElement, true);
	$arElement["CAN_BUY"] = CIBlockPriceTools::CanBuy(8, $arResult["PRICES"], $arElement);
	$arElement["ADD_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam("action=ADD2BASKET&id=".$arElement["ID"], array("id", "action")));
	
	$arResult["SEARCH_ITEMS"][$arElement['ID']] = $arElement;
}
?>