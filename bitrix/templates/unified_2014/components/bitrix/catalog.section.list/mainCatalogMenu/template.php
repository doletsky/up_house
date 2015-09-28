<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$CURRENT_DEPTH=$arResult["SECTION"]["DEPTH_LEVEL"]+1;
foreach($arResult["SECTIONS"] as $arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
	if($CURRENT_DEPTH<$arSection["DEPTH_LEVEL"]){
		//if($CURRENT_DEPTH>1)
        //    echo "<div class='submenu_marker'></div>";
		if($CURRENT_DEPTH == 2)
            echo '<span class="glyphicon glyphicon-chevron-right"></span>';
		//echo "\n\r<div class=\"b_main-submenu\"><ul class=\"submenu-catalog js-submenu-catalog\">";"
		echo "\n\r<ul class=\"" . ($CURRENT_DEPTH == 2 ? "submenu-three-catalog js-submenu-three-catalog" : "submenu-catalog js-submenu-catalog")  . "\">";
	}
	elseif($CURRENT_DEPTH>$arSection["DEPTH_LEVEL"])
//		echo str_repeat("\n\r</ul></div></li>", $CURRENT_DEPTH - $arSection["DEPTH_LEVEL"]);
		echo str_repeat("\n\r</ul></li>", $CURRENT_DEPTH - $arSection["DEPTH_LEVEL"]);

	$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
?>

	<li class="<? if($CURRENT_DEPTH == 2): ?>b_main-submenu_list-item submenu-catalog-item<? elseif($CURRENT_DEPTH == 3): ?>submenu-three-catalog-item<? else: ?>b_main-menu_list-item menu-catalog-list-item<? endif; ?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
        <a class="<? if($CURRENT_DEPTH == 2): ?>b_main-submenu_link submenu-catalog-link<? elseif($CURRENT_DEPTH == 3): ?>submenu-three-catalog-link<? else: ?>b_main-menu_link menu-catalog-item<? endif ?>" href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?><?if($arParams["COUNT_ELEMENTS"]):?>&nbsp;(<?=$arSection["ELEMENT_CNT"]?>)<?endif;?></a>
    <? if(!$arSection["PARENT"]): ?></li><? endif ?>
<? endforeach?>
</ul> </li>
<? /* if($CURRENT_DEPTH > 1): ?>
</ul></div></li>
<? endif  */ ?>