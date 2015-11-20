<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// result modifier
$arBasketKeys = array(); // массив в котором id товара вязывается с ключом
foreach($arResult["BASKET_ITEMS"] as $key => $arBasketItems) {
	$arBasketKeys[$arBasketItems['ID']] = $key;
}
?>
<div class="b_grid_level grid_level_15px">
	<div class="b_grid_unit-3-5">
		<div class="b_grid_level grid_level_15px">
			<div class="b_grid_unit-1">
				<span class="fs_24px"><?=GetMessage("SOA_TEMPL_SUM_TITLE")?></span>										
			</div>
		</div>
		<div class="b_line"></div>
	<?
	foreach($arResult["BASKET_ITEMS"] as $arBasketItems)
	{
		?>
		<?
		$credit = false;
		foreach($arBasketItems['PROPS'] as $prop) {
			if($prop['CODE'] == 'OPTION_GROUP')
				continue 2;
			if($prop['CODE'] == 'Credit')
				if($prop['VALUE'] == 'Да')
					$credit = true;
		}
		?>
		<div class="b_grid_level grid_level_15px">
			<div class="b_grid_unit-3-5"><?=$arBasketItems["NAME"]?><? if($credit):?> <span class="fs_12px">(в кредит)</span><? endif?></div>
			<div class="b_grid_unit-1-5 ta_right"><?=$arBasketItems["QUANTITY"]?></div>
			<div class="b_grid_unit-1-5 ta_right"><span class="color_79b70d"><?=$arBasketItems["PRICE_FORMATED"]?></span></div>
			<? foreach($arBasketItems['PROPS'] as $prop): ?>
				<? if($prop['CODE'] == 'OPTIONS'): ?>
					<? $itemKey = $arBasketKeys[$prop['VALUE']] ?>
					<? if(!empty($arResult["BASKET_ITEMS"][$itemKey])): ?>
					<div style="clear:left;"></div>
					<div class="b_grid">
						<div class="b_grid_unit-3-5">
							<div class="fs_13px order_summary_option">&mdash;&nbsp;&nbsp;<?=$arResult["BASKET_ITEMS"][$itemKey]['NAME']?></div>
						</div>
						<div class="b_grid_unit-1-5 ta_right"></div>
						<div class="b_grid_unit-1-5 ta_right">
							<span class="fs_13px color_79b70d"><? if($arResult["BASKET_ITEMS"][$itemKey]['PRICE'] > 0) echo $arResult["BASKET_ITEMS"][$itemKey]["PRICE_FORMATED"]; else echo 'Бесплатно';?></span>
						</div>
					</div>
					<? endif ?>
				<? endif ?>
			<? endforeach ?>
		</div>
		<div class="b_line"></div>
		<?
	}
	?>							
	</div>
	<div class="b_grid_unit-2-5">
		<div class="b_grid_level grid_level_15px">
			<div class="b_grid_unit-1-12">
			</div>
			<div class="b_grid_unit-11-12">
				<span class="fs_24px"><?=GetMessage("SOA_TEMPL_SUM_COMMENTS")?></span>
				<div class="margin-top_15px">
					<textarea class="b_textarea textarea_height_150px textarea_width_300px"name="ORDER_DESCRIPTION" id="ORDER_DESCRIPTION"><?=$arResult["USER_VALS"]["ORDER_DESCRIPTION"]?></textarea>
				</div>
			</div>
		</div>							
	</div>							
</div>
<div class="b_grid_level grid_level_15px">
	<div class="b_grid_unit-1-5">
		<a class="b_button-buy button-buy_order-2" onClick="submitForm('Y'); return false;" href="#"></a>
	</div>
	<div class="b_grid_unit-1-5">
	</div>
	<div class="b_grid_unit-3-5">
			<div class="b_order-total order-total_width_300px">
				<div class="b_grid">
					<div class="b_grid_level b_grid_level_15px">
						<div class="b_grid_unit-1-2">
							<?=GetMessage("SOA_TEMPL_SUM_SUMMARY")?>
						</div>
						<div class="b_grid_unit-1-2">
							<span class="color_79b70d"><?=$arResult["ORDER_PRICE_FORMATED"]?></span>
						</div>												
					</div>
					<?
					if (doubleval($arResult["DELIVERY_PRICE"]) > 0)
					{
						?>
					<div class="b_grid_level b_grid_level_15px">
						<div class="b_grid_unit-1-2">
							<?=GetMessage("SOA_TEMPL_SUM_DELIVERY")?>
						</div>
						<div class="b_grid_unit-1-2">
							<span class="color_79b70d"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></span>
						</div>												
					</div>
						<?
					}
					?>
					<?
					if (doubleval($arResult["PAYMENT_PRICE"]) > 0)
					{
						?>
					<div class="b_grid_level b_grid_level_15px">
						<div class="b_grid_unit-1-2">Комиссия платежной системы</div>
						<div class="b_grid_unit-1-2">
							<span class="color_79b70d"><?=$arResult["PAYMENT_PRICE_FORMATED"]?></span>
						</div>												
					</div>
						<?
					}
					?>
					<div class="b_grid_level b_grid_level_15px">
						<div class="b_grid_unit-1-2">
							<span class="color_black fs_18px"><?=GetMessage("SOA_TEMPL_SUM_IT")?></span>
						</div>
						<div class="b_grid_unit-1-2">
							<span class="color_black fs_24px"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></span>
						</div>												
					</div>
				</div>
			</div>
	</div>							
</div>