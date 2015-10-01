<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?
$i = 0;
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
<a href="<?=$arItem["LINK"]?>" class="link_007eb4 link_decoration"<?if ($i==0):?> style="margin-left: 0px;"<?endif?>><?=$arItem["TEXT"]?></a>
<? $i++; ?>
<?endforeach?>
<?endif?>