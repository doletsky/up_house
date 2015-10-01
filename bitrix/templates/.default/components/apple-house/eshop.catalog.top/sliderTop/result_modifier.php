<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

$arResult['PAGES_COUNT'] = ceil(count($arResult['ITEMS'])/4);

foreach($arResult['ITEMS'] as $key => $arItem) {
	$arResult['ITEMS'][$key]['DETAIL_PAGE_URL'] = '/' . $arItem['PROPERTIES']['CML2_CODE']['VALUE'];
	$arResult['ITEMS']['CAN_BUY']=0;	
}

?>