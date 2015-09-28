<?
$rsBonusEnum = CUserFieldEnum::GetList(array(), array("USER_FIELD_ID" => 9));
while($arBounsEnum = $rsBonusEnum->GetNext()) {
	$arResult['BONUS'][$arBounsEnum['ID']] = $arBounsEnum;
}
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
?>