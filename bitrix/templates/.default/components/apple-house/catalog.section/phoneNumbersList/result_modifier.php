<?
$rsBonusEnum = CUserFieldEnum::GetList(array(), array("USER_FIELD_ID" => 9));
while($arBounsEnum = $rsBonusEnum->GetNext()) {
	$arResult['BONUS'][$arBounsEnum['ID']] = $arBounsEnum;
}

foreach($arResult['ITEMS'] as $key => &$arItem) {
	$arResult['ITEMS'][$key]['DETAIL_PAGE_URL'] = '/' . $arItem['PROPERTIES']['CML2_CODE']['VALUE'];
	foreach($arItem["PRICES"] as &$price){
		if($price["VALUE"]==0){
			$price["CAN_BUY"]=0;
			$arResult['ITEMS'][$key]["CAN_BUY"]=0;
			$price["PRINT_DISCOUNT_VALUE_VAT"]="";
		}
		//$price["CAN_BUY"]=0;
		//$arResult['ITEMS'][$key]["CAN_BUY"]=0;
		break;
	}
}
//var_dump($arResult);
//list($arResult['DESCRIPTION_1'], $arResult['DESCRIPTION_2']) = explode('---', $arResult['DESCRIPTION']);
$arResult['UF_SEO_TEXT']=str_replace("@shop_text@","",$arResult['~UF_SEO_TEXT']);
//var_dump($arResult);
if(empty($arResult['UF_SEO_TEXT']))$arResult['UF_SEO_TEXT']=$arResult['SECTION']['DETAIL_TEXT'];
if(empty($arResult['UF_SEO_TEXT']))$arResult['UF_SEO_TEXT']=$arResult['SECTION']['PREVIEW_TEXT'];
if(empty($arResult['UF_SEO_TEXT']))$arResult['UF_SEO_TEXT']=$arResult['DESCRIPTION'];
list($arResult['DESCRIPTION_1'], $arResult['DESCRIPTION_2']) = explode('---', $arResult['UF_SEO_TEXT']);
//list($arResult['DESCRIPTION_1'], $arResult['DESCRIPTION_2']) = explode('---', $arResult['UF_SEO_TEXT']);
//$arResult['DESCRIPTION_1']=substr($arResult['DESCRIPTION_1'],0,200);
/*
if($arResult['DEPTH_LEVEL'] > 1) {
	$sectionID = $arResult['IBLOCK_SECTION_ID'];
	$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ID' => $sectionID, 'GLOBAL_ACTIVE' => 'Y');
	$arSelect = array('ID', 'NAME', 'DESCRIPTION', 'UF_BONUS');
	$db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
	if($arSection = $db_list->GetNext()) {
		$arResult['NAME'] = $arSection['NAME'];
		$arResult['DESCRIPTION'] = $arSection['DESCRIPTION'];
		$arResult['UF_BONUS'] = $arSection['UF_BONUS'];
	}
}
*/

if($arResult['UF_MODEL'])
	$arResult['HAS_MODEL'] = true;
else
	$arResult['HAS_MODEL'] = false;
	
$showfilter=false;
foreach($arResult['SECTION_FILTER'] as $key => $filterGroup){
	foreach($filterGroup as $key => $filterElement){
		if($filterElement['SELECTED'])$showfilter=true;
	}	
}
if($arResult['IBLOCK_SECTION_ID']==0)$showfilter=true;
if(!$showfilter)unset($arResult['SECTION_FILTER']);
//var_dump($arResult);
/*if(preg_match('/iphone 5s/is',$arResult['NAME'])){
			$price["CAN_BUY"]=0;
			$arResult['ITEMS'][$key]["CAN_BUY"]=0;
			//$price["PRINT_DISCOUNT_VALUE_VAT"]="";
}*/
	
?>