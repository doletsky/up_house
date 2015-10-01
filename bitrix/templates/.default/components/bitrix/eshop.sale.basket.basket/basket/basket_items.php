<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if(count($arResult["ITEMS"]["AnDelCanBuy"])): ?>
<script>
$(document).ready(function(e) {
	$('#button-buy_order').click(function(e) {
		e.preventDefault();
		$('#basket_submit_links').append('<input type="hidden"" value="<?=GetMessage("SALE_ORDER")?>" name="BasketOrder">');
		$('#basket_form').submit();
	});
});
</script>
<? foreach($arResult["ITEMS"]["AnDelCanBuy"] as $arBasketItems): ?>
	<?
	$credit = false;
	foreach($arBasketItems['PROPS'] as $prop) {
		if($prop['CODE'] == 'Credit')
			if($prop['VALUE'] == 'Да')
				$credit = true;	
	}
	?>
	<div class="b_grid_level grid_level_30px">
		<div class="b_grid_unit-1-2">
			<a class="no-style-link" href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>"><span class="color_253487"><?=$arBasketItems['NAME']?></span></a><? if($credit):?> <span class="color_black fs_14px">(в кредит)</span><? endif?>
		</div>
		<div class="b_grid_unit-1-6">
			<div class="b_spin-edit">
				<input class="b_spin-edit_input" type="hidden" name="QUANTITY_<?=$arBasketItems["ID"]?>" value="<?=$arBasketItems["QUANTITY"]?>">
				<span class="b_spin-edit_button spin-edit_button_minus"><i class="b_glyph glyph-minus"></i></span>
				<div class="b_spin-edit_value"></div>
				<span class="b_spin-edit_button spin-edit_button_plus"><i class="b_glyph glyph-plus"></i></span>
			</div>
		</div>
		<div class="b_grid_unit-1-6">
			<span class="color_79b70d"><? if($arBasketItems['PRICE'] > 0) echo $arBasketItems["PRICE_FORMATED"]; else echo 'Бесплатно';?></span>
		</div>
		<div class="b_grid_unit-1-6 ta_right">
			<a class="no-style-link" href="<?=str_replace("#ID#", $arBasketItems["ID"], $arUrlTempl["delete"])?>"><i class="b_glyph glyph-delete"></i></a>
		</div>
	</div>
<? endforeach ?>
	<div class="b_grid_level grid_level_30px">
		<div class="b_grid_unit-2-3" id="basket_submit_links">
			<a class="b_button-buy button-buy_order" id="button-buy_order" href="#"></a>
		</div>
		<div class="b_grid_unit-1-3 ta_right">
			<span class="b_order-total">
				<span class="color_black fs_18px">Итого:</span>&nbsp;&nbsp;&nbsp;
				<span class="color_79b70d fs_24px"><?=$arResult["allSum_FORMATED"]?></span>
			</span>
		</div>
	</div>
<? else: ?>
	<div class="b_grid_level grid_level_30px">Корзина пуста</div>
<? endif ?>