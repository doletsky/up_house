<?
$rsBonusEnum = CUserFieldEnum::GetList(array(), array("USER_FIELD_ID" => 9));
while($arBounsEnum = $rsBonusEnum->GetNext()) {
	$arResult['BONUS'][$arBounsEnum['ID']] = $arBounsEnum;
}
$arResult['disabled'] = [];
foreach($arResult['ITEMS'] as $key => &$arItem)
{
	if(!is_array($arItem['PREVIEW_PICTURE'])){
		$arResult['disabled'][] = $arItem;
		unset($arResult['ITEMS'][$key]);
	}
	else
	{
		$arItem['NAME']=preg_replace(array("/^Мобильный телефон /","/^Смартфон /","/^Умные часы /"),"", $arItem["NAME"]);

		if(!empty($_SESSION['ref_id']))$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'].='-'.$_SESSION['ref_id'];
		
		
		$arItem['DETAIL_PAGE_URL'] = '/' . $arItem['PROPERTIES']['CML2_CODE']['VALUE'];
		
		if ($arItem["PROPERTIES"]["ZAPRET_POKUPKI"]["VALUE"] == "Да")
		{
			$arItem['SECTION']["UF_BUY_DISABLE"]=true;
		}
		foreach($arItem["PRICES"] as &$price){
			if($price["VALUE"]==0){
				$price["CAN_BUY"]=0;
				$arItem["CAN_BUY"]=0;
				$price["PRINT_DISCOUNT_VALUE_VAT"]="";
			}
			break;
		}
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

$arResult['HAS_MODEL'] = false;

$showfilter=false;
foreach($arResult['SECTION_FILTER'] as $key => $filterGroup){
	foreach($filterGroup as $key => $filterElement){
		if($filterElement['SELECTED'])$showfilter=true;
	}
}
if($arResult['IBLOCK_SECTION_ID']==0)$showfilter=true;
//if(!$showfilter)unset($arResult['SECTION_FILTER']);
//var_dump($arResult);
/*if(preg_match('/iphone 5s/is',$arResult['NAME'])){
			$price["CAN_BUY"]=0;
			$arResult['ITEMS'][$key]["CAN_BUY"]=0;
			//$price["PRINT_DISCOUNT_VALUE_VAT"]="";
}*/

//где сохранить пробелы
$arNbsp=array(
    " Gb", " GB", "и ", "для ", "в "
);

$arResult["SUBSECTION"]=array();
$arFilterSubSect = array('IBLOCK_ID' => $arResult['IBLOCK_ID'],'SECTION_ID' => $arResult['PATH'][1]['ID'],'DEPTH_LEVEL' => 3);
$rsSubSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilterSubSect);
while ($arSubSect = $rsSubSect->GetNext())
{
    $arSubSect["FILTER_NAME"]="";
    $arSelectFilters = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_SECTION");
    $arFilterFilters = Array("IBLOCK_ID"=>16, "ACTIVE"=>"Y", "PROPERTY_SECTION"=>$arSubSect['ID']);
    $resFilters = CIBlockElement::GetList(Array(), $arFilterFilters, false, false, $arSelectFilters);
    while($obFilters = $resFilters->GetNextElement()){
        $arFieldsFilters = $obFilters->GetFields();
        $fName=$arFieldsFilters["NAME"];
        foreach($arNbsp as $nb) $fName=str_replace($nb, str_replace(" ", "&nbsp", $nb), $fName);//сохраняем пробелы
        $fName=str_replace(" ", "<br/>", $fName);//оставшиеся пробелы заменяем <br>
        $arSubSect["FILTER_NAME"]=$fName;
    }
    $arResult['SUBSECTION'][]=$arSubSect;
}
?>
