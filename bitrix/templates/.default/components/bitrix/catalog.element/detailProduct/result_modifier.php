<?
$rsBonusEnum = CUserFieldEnum::GetList(array(), array("USER_FIELD_ID" => 9));
while($arBounsEnum = $rsBonusEnum->GetNext()) {
	$arResult['SECTION']['BONUS'][$arBounsEnum['ID']] = $arBounsEnum;
}

if($arResult['SECTION']['DEPTH_LEVEL'] == 2)
	$sectionID = $arResult['SECTION']['IBLOCK_SECTION_ID'];
else
	$sectionID = $arResult['SECTION']['ID'];

$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'ID' => $sectionID);
$arSelect = array('ID', 'IBLOCK_ID',  'UF_BONUS', 'UF_VIDEOOBZOR');
$db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
if($ar_result = $db_list->GetNext()) {
    $arResult['SECTION']['INFO'] = $ar_result;
}





$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'ID' => $arResult['SECTION']['ID']);
$arSelect = array('ID', 'IBLOCK_ID',  'UF_SERVICES');
$db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
if($ar_result = $db_list->GetNext()) {
	$seviceSections = $ar_result['UF_SERVICES'];
	
	$arServiceSectionFilter = array('IBLOCK_ID' => 11, 'GLOBAL_ACTIVE'=>'Y', 'ID' => $seviceSections);
	$arServiceSectionSelect = array('ID', 'NAME', 'IBLOCK_ID');
	$db_service_section_list = CIBlockSection::GetList(array(), $arServiceSectionFilter, false, $arServiceSectionSelect);
	while($ar_result = $db_service_section_list->GetNext()) {
    	$arResult['SERVICE_LIST']['SECTIONS'][] = $ar_result;
	}
	$arServiceListFilter = array('IBLOCK_ID' => 11, 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID' => $seviceSections);
	$arServiceListSelect = array('ID', 'NAME', 'IBLOCK_ID', 'IBLOCK_SECTION_ID', 'PROPERTY_LIST_NAME', 'CATALOG_GROUP_1');
	$db_service_list = CIBlockElement::GetList(array(), $arServiceListFilter, false, false, $arServiceListSelect);
	while($ar_result = $db_service_list->GetNext()) {
    	$arResult['SERVICE_LIST']['SERVICES'][$ar_result['IBLOCK_SECTION_ID']][] = $ar_result;
	}
}

?>