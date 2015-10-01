<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?
// result modifier
$arBasketKeys = array(); // массив в котором id товара вязывается с ключом
foreach($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arBasketItems) {
	$arBasketKeys[$arBasketItems['ID']] = $key;
}
?>


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
		if($prop['CODE'] == 'OPTION_GROUP')
			continue 2;
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
		<div class="b_grid">
		<? foreach($arBasketItems['PROPS'] as $prop): ?>
			<? if($prop['CODE'] == 'OPTIONS'): ?>
				<? $itemKey = $arBasketKeys[$prop['VALUE']] ?>
				<? if(!empty($arResult["ITEMS"]["AnDelCanBuy"][$itemKey])): ?>
					<div class="b_grid_unit-1-2">
						<div class="fs_14px" style="padding:3px 0 3px 30px; background:url(/bitrix/templates/shop_white/private/images/basket_option.png) 10px 4px no-repeat;"><?=$arResult["ITEMS"]["AnDelCanBuy"][$itemKey]['NAME']?></div>
					</div>
					<div class="b_grid_unit-1-6"></div>
					<div class="b_grid_unit-1-6">
						<span class="fs_14px color_79b70d"><? if($arResult["ITEMS"]["AnDelCanBuy"][$itemKey]['PRICE'] > 0) echo $arResult["ITEMS"]["AnDelCanBuy"][$itemKey]["PRICE_FORMATED"]; else echo 'Бесплатно';?></span>
					</div>
					<div class="b_grid_unit-1-6 ta_right">
						<a class="no-style-link" href="<?=str_replace("#ID#", $arResult["ITEMS"]["AnDelCanBuy"][$itemKey]["ID"], $arUrlTempl["delete"])?>"><i class="b_glyph glyph-delete" style="background:url(/bitrix/templates/shop_white/private/images/delete_option.png) 3px 3px no-repeat;"></i></a>
					</div>
				<? endif ?>
			<? endif ?>
		<? endforeach ?>
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