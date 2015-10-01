<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";

$breacCrumbsLength = count($arResult);
for($index = 0, $itemSize = $breacCrumbsLength; $index < $itemSize; $index++)
{
$arResult[$index]["LINK"]=str_replace('%2F','/',$arResult[$index]["LINK"]);
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($index == ($breacCrumbsLength - 1))
		$strReturn .= '<div class="b_breadcrumbs_item">'.$title.'</div>';
	elseif($index == 0) // Главная
		$strReturn .= '<div class="b_breadcrumbs_item"><a class="link_007eb4" href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></div>';
	elseif($arResult[$index]["LINK"] <> "")
		$strReturn .= '<div class="b_breadcrumbs_item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" class="link_007eb4" href="'.$arResult[$index]["LINK"].'" title="'.$title.'"><span itemprop="title">'.$title.'</span></a></div>';
	else
		$strReturn .= '<div class="b_breadcrumbs_item">'.$title.'</div>';
}

$strReturn .= '</div>';

return $strReturn;
?>
