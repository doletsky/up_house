<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="ta_right ff_helvetica-neue-roman ws_10px fs_12px">
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<a href="<?=$arItem["LINK"]?>" class="link_007eb4 ws_normal link_decoration"><?=$arItem["TEXT"]?></a>	
<?endforeach?>
</div>
<?endif?>