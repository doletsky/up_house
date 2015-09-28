<?
$currentDepth = $arResult["SECTIONS"][0]["DEPTH_LEVEL"];
foreach($arResult["SECTIONS"] as $key => $arSection) {
	if(!$arSection["UF_ACTIVE"])
		unset($arResult["SECTIONS"][$key]);
	else {
		if($arSection["DEPTH_LEVEL"] > $currentDepth) {
			$arResult["SECTIONS"][$key-1]["PARENT"] = true;
		}	
		$currentDepth = $arSection["DEPTH_LEVEL"];
		$arResult["SECTIONS"][$key]["SECTION_PAGE_URL"] = str_replace('%2F', '/', $arSection["SECTION_PAGE_URL"]);
	}
	if($arResult["SECTIONS"][$key]["NAME"]=='iPad Mini 2 Retina')$arResult["SECTIONS"][$key]["NAME"]='iPad Mini 2';
	
	if(preg_match('/Скидки|Подарки/is',$arResult["SECTIONS"][$key]["NAME"]))$arResult["SECTIONS"][$key]["NAME"]='<span style="color:#fb1919">'.$arResult["SECTIONS"][$key]["NAME"].'</span>';
	
	
	//$arResult["SECTIONS"][$key]["NAME"].=$arSection["UF_ACTIVE"];
}

?>