<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $totalSumm = 0;?>
<?if ($arResult["READY"]=="Y"):?>
	<?
	foreach ($arResult["ITEMS"] as $v)
	{
		if ($v["DELAY"]=="N" && $v["CAN_BUY"]=="Y")
		{
			$totalSumm += $v["PRICE"]*$v['QUANTITY'];
		}
	}
	?>
<? endif ?>
<? 
	if($totalSumm == 0) 
		$totalSumm = 'ѕусто';
	else
		$totalSumm = number_format($totalSumm, 0, '', ' ') . ' р.';
?>
	<li class="b_main-menu_list-item">
		<a class="b_main-menu_link<?=($totalSumm)?' b_main-menu_link_active':''?>" href="<?=$arParams["PATH_TO_BASKET"]?>"><i class="b_glyph glyph_cart va_sub"></i>&nbsp;<?=$totalSumm?></a>
	</li>