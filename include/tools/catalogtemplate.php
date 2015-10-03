<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule("iblock");

function getCatTemplate() {
	global $APPLICATION;
	$requestURL = $APPLICATION->GetCurPage(true);
	$requestParam = $APPLICATION->GetCurParam();
	
	$arParams['REQUEST_URL'] = $requestURL;
	/*
	$requestURL = $_REQUEST['CODE'];
	$len = strlen($requestURL);
	if($requestURL{0} == '/')
		$requestURL = substr($requestURL, 1);
	if($requestURL{$len-1} == '/')
		$requestURL = substr($requestURL, 0, $len-1);
	*/
	$requestURL = str_replace('/catalog/', '', $requestURL);
	if($requestURL{0} == '/')
		$requestURL = substr($requestURL, 1);
		/*
	global $USER;
	if($USER->IsAdmin()) {
		$requestURL = $_REQUEST['CODE'];
		$len = strlen($requestURL);
		if($requestURL{0} == '/')
			$requestURL = substr($requestURL, 1);
		if($requestURL{$len-1} == '/')
			$requestURL = substr($requestURL, 0, $len-1);
	}
	*/
	$sectionNotFound = false;
	$elementNotFound = false;	
	
	$arFilter = array('IBLOCK_ID' => 8, 'CODE' => $requestURL);
	$db_list = CIBlockSection::GetList(array(), $arFilter, false);
	if($ar_result = $db_list->GetNext()) {
		return 'section';
	}
	
	$arFilter = array("IBLOCK_ID" => 8, "ACTIVE" => "Y", "PROPERTY_CML2_CODE" => $requestURL);
	$res = CIBlockElement::GetList(array(), $arFilter);
	if($ar_fields = $res->GetNext()) {
		return 'element';
	}
	
	return 'element';
}

?>