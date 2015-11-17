<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
// result modifier
$arBasketKeys = array(); // массив в котором id товара вязывается с ключом
foreach($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arBasketItems) {
	$arBasketKeys[$arBasketItems['ID']] = $key;
}
?>
<? if($USER->IsAdmin() && $arResult['COUPON_ERROR']): ?>
<div class="order_error_cont">
	<div class="order_error_blc">Неверно указан код купона</div>
</div>
<? endif ?>

<? if(count($arResult["ITEMS"]["AnDelCanBuy"])): ?>
<script>
$(document).ready(function(e) {
/*	$('#button-apply_coupon_popup').click(function(e) {
		e.preventDefault();
		$('#basket_submit_links_popup').append('<input type="hidden"" value="<?=GetMessage("SALE_ORDER")?>" name="BasketOrder">');
		$('#basket_submit_links_popup').append('<input type="hidden"" value="Y" name="ApplyCoupon">');
		$('#basket_form_popup').submit();
	});*/
	$('#button-buy_order_popup').click(function(e) {
		e.preventDefault();
		$('#basket_submit_links_popup').append('<input type="hidden"" value="<?=GetMessage("SALE_ORDER")?>" name="BasketOrder">');
		$('#basket_form_popup').submit();
	});
});
</script>
<? ?>
<?
    $counter = 0;
    $allSumm = $arResult["allSum"];
    $allCount = count( $arResult["ITEMS"]["AnDelCanBuy"]);
    foreach($arResult["ITEMS"]["AnDelCanBuy"] as $arBasketItems): ?>
	<?
        if($counter++ > 1)
            break;
	$credit = $preorder = false;
	foreach($arBasketItems['PROPS'] as $prop) {
		if($prop['CODE'] == 'OPTION_GROUP')
			continue 2;
		if($prop['CODE'] == 'Credit')
			if($prop['VALUE'] == 'Да')
				$credit = true;	
		if($prop['CODE'] == 'Preorder')
			if($prop['VALUE'] == 'Да')
				$preorder = true;	
	}
	?>
	<div class="b_grid_level margin-top_30px">
        <?
        $arOrder = Array("NAME"=>"ASC");
        $arSelect = Array("ID", "IBLOCK_ID", "LANG_DIR", "DETAIL_PAGE_URL");
        $arFilter = Array("IBLOCK_ID"=>$IBLOCK_ID, "ACTIVE"=>"Y", "ID" => $arBasketItems["PRODUCT_ID"]);
        $rsElement = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

        if($obElement = $rsElement->GetNextElement()){
            $arProps = $obElement->GetProperties();
            $arBasketItems["DETAIL_PAGE_URL"] = '/' . $arProps['CML2_CODE']['VALUE'];
        }
        ?>

        <?
        $res = CIBlockElement::GetByID($arBasketItems["PRODUCT_ID"]);
        if($ar_res = $res->GetNext()):?>
            <?=CFile::ShowImage($ar_res["PREVIEW_PICTURE"], 70, 100, "border=0", "", true);?>
        <? endif ?>

		<div class="b_popup_grid_unit-1-2">
			<a class="no-style-link" href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>"><span class="color_253487"><?=$arBasketItems['NAME']?></span></a><? if($credit):?> <span class="color_black fs_14px">(в кредит)</span><? endif?>
			<? if($preorder):?> <span class="color_black fs_14px">(предзаказ)</span><? endif?>
		</div>

        <input class="b_spin-edit_input" type="hidden" name="QUANTITY_<?=$arBasketItems["ID"]?>" value="<?=$arBasketItems["QUANTITY"]?>">

<?/*
        <div class="b_popup_grid_unit-1-6">
            <div class="b_spin-edit">
                <input class="b_spin-edit_input" type="hidden" name="QUANTITY_<?=$arBasketItems["ID"]?>" value="<?=$arBasketItems["QUANTITY"]?>">
                <div class="b_spin-edit_value"></div>
            </div>
        </div>
        <div class="b_popup_multiple">
            X
        </div>
		<div class="b_popup_grid_unit-1-4">
			<span class="color_79b70d"><?=($arBasketItems['PRICE']<$arBasketItems['FULL_PRICE'])?'<s style="color:#aaa">'.$arBasketItems["FULL_PRICE_FORMATED"].'</s> ':''?><? if($arBasketItems['PRICE'] > 0) echo $arBasketItems["PRICE_FORMATED"]; else echo 'Бесплатно';?></span>
            <? $allSumm -= $arBasketItems["QUANTITY"] * $arBasketItems['PRICE'];?>
		</div>
*/?>
        <div class="b_popup_grid_unit-1-4">
            <span class="color_79b70d"><? if($arBasketItems['PRICE'] > 0) echo number_format($arBasketItems["QUANTITY"] * $arBasketItems['PRICE'], 0, '.', ' ').' руб.'; else echo 'Бесплатно';?></span>
            <? $allSumm -= $arBasketItems["QUANTITY"] * $arBasketItems['PRICE'];?>
        </div>
	</div>
	<div class="b_grid margin-bottom_30px">
	<? foreach($arBasketItems['PROPS'] as $prop): ?>
		<? if($prop['CODE'] == 'OPTIONS'): ?>
			<? $itemKey = $arBasketKeys[$prop['VALUE']] ?>
			<? if(!empty($arResult["ITEMS"]["AnDelCanBuy"][$itemKey])): ?>
				<div class="b_grid_unit-1-2">
					<div class="fs_14px basket_item_option"><?=$arResult["ITEMS"]["AnDelCanBuy"][$itemKey]['NAME']?></div>
				</div>
				<div class="b_grid_unit-1-6"><input type="hidden" name="QUANTITY_<?=$arResult["ITEMS"]["AnDelCanBuy"][$itemKey]["ID"]?>" value="<?=$arResult["ITEMS"]["AnDelCanBuy"][$itemKey]["QUANTITY"]?>"></div>
				<div class="b_grid_unit-1-6">
					<span class="fs_14px color_79b70d"><? if($arResult["ITEMS"]["AnDelCanBuy"][$itemKey]['PRICE'] > 0) echo $arResult["ITEMS"]["AnDelCanBuy"][$itemKey]["PRICE_FORMATED"]; else echo 'Бесплатно';?></span>
				</div>
				<div class="b_grid_unit-1-6 ta_right">
					<a class="no-style-link" href="<?=str_replace("#ID#", $arResult["ITEMS"]["AnDelCanBuy"][$itemKey]["ID"], $arUrlTempl["delete"])?>"><i class="b_glyph glyph-delete glyph-delete_option"></i></a>
				</div>
			<? endif ?>
		<? endif ?>
	<? endforeach ?>
	</div>
<? endforeach ?>
    <? if(($allCount - 2) > 0):?>
    <div class="_b-cart-order-summary">
        <div class="_b-cart-order-summary-list">
            <div class="_b-cart-order-summary-item view_total">
                <? if((($allCount - 2)%10) == 1): ?>
                    <p class="g-font size_8">И <a class="js-popup-oncart" href="/showparam/magaz-cart.html">еще <?=($allCount - 2)?> товар</a>, общей стоимостью: <b class="js-cart-order-total" style="display: inline;"><?=number_format($allSumm, 0, '.', ' ')?> <span class="g-ruble"> руб.</span></b></p>
                <? elseif(((($allCount - 2)%10) > 1) && ((($allCount - 2)%10) < 5)): ?>
                    <p class="g-font size_8">И <a class="js-popup-oncart" href="/showparam/magaz-cart.html">еще <?=($allCount - 2)?> товара</a>, общей стоимостью: <b class="js-cart-order-total" style="display: inline;"><?=number_format($allSumm, 0, '.', ' ')?> <span class="g-ruble"> руб.</span></b></p>
                <? else: ?>
                    <p class="g-font size_8">И <a class="js-popup-oncart" href="/showparam/magaz-cart.html">еще <?=($allCount - 2)?> товаров</a>, общей стоимостью: <b class="js-cart-order-total" style="display: inline;"><?=number_format($allSumm, 0, '.', ' ')?> <span class="g-ruble"> руб.</span></b></p>
                <? endif;?>
            </div>
        </div>
    </div>
    <? endif; ?>
	<div class="b_grid_level grid_level_30px">
        <div class="b_popup_grid_unit-1-3">
			<span class="b_order-total">
				<span class="color_black fs_18px">Итого:</span>&nbsp;&nbsp;&nbsp;
				<span class="color_79b70d fs_24px"><?=$arResult["allSum_FORMATED"]?></span>
			</span>
        </div>
		<div class="b_popup_grid_unit-2-3 ta_right" id="basket_submit_links_popup">
			<a class="b_button-buy button-buy_order" id="button-buy_order_popup" href="#" onclick="ga('send', 'event', 'Exit form', 'Order', '');"></a>
		</div>
	</div>
<? else: ?>
	<div class="b_grid_level grid_level_30px">Корзина пуста</div>
<? endif ?>