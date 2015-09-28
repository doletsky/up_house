<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/*
//delayed function must return a string
if(empty($arResult))
	return "";

$breacCrumbsLength = count($arResult);
$strReturn = "";
for($index = 0, $itemSize = $breacCrumbsLength; $index < $itemSize; $index++)
{
$arResult[$index]["LINK"]=str_replace('%2F','/',$arResult[$index]["LINK"]);
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	/*if($index == ($breacCrumbsLength - 1))
		$strReturn .= '<span class="breadcrumbs-item">'.$title.'</span>';
	elseif($index == 0) // Главная
		$strReturn .= '<span class="breadcrumbs-item"><a class="link_007eb4" href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></span>';
	elseif($arResult[$index]["LINK"] <> "")
		$strReturn .= '<span class="breadcrumbs-item itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" class="link_007eb4" href="'.$arResult[$index]["LINK"].'" title="'.$title.'"><span itemprop="title">'.$title.'</span></a></span>';
	else*//*
		$strReturn .= '<span class="breadcrumbs-item">'.$title.'</span>';
}*/
return "QWE";

//$strReturn .= '</div>';

return $strReturn;
