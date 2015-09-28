<?
//var_dump($arResult["SECTIONS"]);
foreach($arResult["SECTIONS"] as $key => $arSection) {
	$arResult["SECTIONS"][$key]["SECTION_PAGE_URL"] = str_replace('%2F', '/', $arSection["SECTION_PAGE_URL"]);
	if(!$arSection["UF_ACTIVE"] || preg_match("/Гарнитуры|ручки|стилус|jawbone|google|polar|blackberry|nike|Бренды|Ozaki|CooKoo|Fitbit|iHealth|JBL|Pebble|Spigen|Apple|Подарк|подарк|Уценк|уценк|Идеи|Скидк|скидк|Часы|Акустика|Радио|Спорт и отдых|Распродажа|Камеры|Лучшие предложения|часы|акустика|Умный дом|спорт|Спорт|Amazon|Microsoft|OnePlus|Samsung|Квадрокоптеры DJI|LG/is",$arSection["NAME"])){
		//if(!preg_match("/iPad 5|iPad Mini 2 Retina/is",$arSection["NAME"]))
			unset($arResult["SECTIONS"][$key]);
	}
	
}

$arResult["SECTIONS"][]=array("NAME"=>"Jawbone UP 24","SECTION_PAGE_URL"=>'/gadgets/bracelet/jawbone_up');
$arResult["SECTIONS"][]=array("NAME"=>"Nike FuelBand","SECTION_PAGE_URL"=>'/gadgets/bracelet/fuelband');
$arResult["SECTIONS"][]=array("NAME"=>"Google Glass","SECTION_PAGE_URL"=>'/gadgets/google-glass');
$arResult["SECTIONS"][]=array("NAME"=>"CarPlay","SECTION_PAGE_URL"=>'/carplay');
$arResult["SECTIONS"][]=array("NAME"=>"Apple iWatch","SECTION_PAGE_URL"=>'/iwatch');

?>