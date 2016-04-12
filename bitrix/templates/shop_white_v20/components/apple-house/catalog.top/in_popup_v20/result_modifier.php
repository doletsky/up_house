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

//section recomended
$resSec = CIBlockElement::GetByID($arParams["ID"]);
if($ar_res_sec = $resSec->GetNext()){
    $arSecTree['ID']=$ar_res_sec['IBLOCK_SECTION_ID'];
    $arSecFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'],'ID'=>$arSecTree['ID']);
    $arSecSelect = Array('UF_RECOMMEND');
    $rsSect = CIBlockSection::GetList(array('sort' => 'asc'),$arSecFilter, false, $arSecSelect);
    if($arSect = $rsSect->GetNext()){
        foreach($arSect['UF_RECOMMEND'] as $idRecom){
            $resRecom = CIBlockElement::GetByID($idRecom);
            if($ar_res_recom = $resRecom->GetNext()){
                $arSecTree['RECOM'][]=$ar_res_recom;
            }
        }
    }
}
    $arResult["SECTION_TREE"][] = $arSecTree;
$arResult["ITEMS"]=array_merge($arSecTree['RECOM'],$arResult["ITEMS"]);
//$arResult["ROWS"]=$arSecTree['RECOM'];
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
//$arResult["ROWS"][0]=array_merge($arSecTree['RECOM'],$arResult["ROWS"][0]);
?>