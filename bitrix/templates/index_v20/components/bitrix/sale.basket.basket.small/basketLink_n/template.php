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
		$totalSumm = 'Пока пусто :(';
	else
		$totalSumm = number_format($totalSumm, 0, '', ' ') . ' р.';
?>
<div class="cart pull-left" onclick="location.href='<?=$arParams["PATH_TO_BASKET"]?>'"><?=$totalSumm?></div>
<!--	<div class="new_basket">-->
<!--		<a class="--><?//=((int)$totalSumm)?' basket_active':''?><!--" href="--><?//=$arParams["PATH_TO_BASKET"]?><!--">--><?//=$totalSumm?><!--</a>-->
<!--	</div>-->