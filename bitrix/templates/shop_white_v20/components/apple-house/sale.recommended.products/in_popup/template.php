<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $arRecPrFilter;
$arRecPrFilter = $arResult;
if(!empty($arResult))
{
	//echo "<h3>".GetMessage("SRP_TITLE")."</h3>";
	$APPLICATION->IncludeComponent("apple-house:catalog.top", "in_popup", array(
        "IBLOCK_TYPE" => '1c_catalog',
        "IBLOCK_ID" => 8,
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_COUNT" => $arParams["ELEMENT_COUNT"],
		"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
        "VISIBLE_ELEMENT_COUNT" => ($arParams["LINE_VISIBLE_ELEMENT_COUNT"] ? $arParams["LINE_VISIBLE_ELEMENT_COUNT"] : $arParams["ELEMENT_COUNT"]),
		"DETAIL_URL" => $arParams["DETAIL_URL"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"DISPLAY_COMPARE" => "N",
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
		"FILTER_NAME" => "arRecPrFilter",
		'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
		'CURRENCY_ID' => $arParams['CURRENCY_ID'],
		),
		$component
	);
}?>
