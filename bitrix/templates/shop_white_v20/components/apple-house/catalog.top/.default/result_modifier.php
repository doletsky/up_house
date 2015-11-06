<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$arResult["TD_WIDTH"] = round(100/$arParams["LINE_ELEMENT_COUNT"])."%";
$arResult["nRowsPerItem"] = 1; //Image, Name and Properties
$arResult["bDisplayPrices"] = false;
foreach($arResult["ITEMS"] as $arItem)
{
	if (!empty($arItem["PRICES"]) || is_array($arItem["PRICE_MATRIX"]))
		$arResult["bDisplayPrices"] = true;
	elseif (!empty($arItem["OFFERS"]) && is_array($arItem["OFFERS"]))
		$arResult["bDisplayPrices"] = true;
	if($arResult["bDisplayPrices"])
		break;
}
if($arResult["bDisplayPrices"])
	$arResult["nRowsPerItem"]++; // Plus one row for prices
$arResult["bDisplayButtons"] = $arParams["DISPLAY_COMPARE"] || count($arResult["PRICES"])>0;
foreach($arResult["ITEMS"] as $arItem)
{
	if($arItem["CAN_BUY"])
		$arResult["bDisplayButtons"] = true;
	if($arResult["bDisplayButtons"])
		break;
}
if($arResult["bDisplayButtons"])
	$arResult["nRowsPerItem"]++; // Plus one row for buttons

//array_chunk
$arResult["ROWS"] = array();
while(count($arResult["ITEMS"])>0)
{
	$arRow = array_splice($arResult["ITEMS"], 0, $arParams["LINE_ELEMENT_COUNT"]);
	while(count($arRow) < $arParams["LINE_ELEMENT_COUNT"])
		$arRow[]=false;
	$arResult["ROWS"][]=$arRow;
}

foreach($arResult["ROWS"] as $rKey => $arItems):
    foreach($arItems as $eKey => $arElement):
        if(is_array($arElement)):
            $arOrder = Array("NAME"=>"ASC");
            $arSelect = Array("ID", "IBLOCK_ID", "LANG_DIR", "DETAIL_PAGE_URL");
            $arFilter = Array("IBLOCK_ID"=>8, "ACTIVE"=>"Y", "ID" => $arElement["ID"]);
            $rsElement = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

            if($obElement = $rsElement->GetNextElement()){
                $arProps = $obElement->GetProperties();
                $arResult["ROWS"][$rKey][$eKey]["DETAIL_PAGE_URL"] = '/' . $arProps['CML2_CODE']['VALUE'];
            }
        endif;
    endforeach;
endforeach;

?>