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
	$('#button-apply_coupon').click(function(e) {
		e.preventDefault();
		$('#basket_submit_links').append('<input type="hidden"" value="<?=GetMessage("SALE_ORDER")?>" name="BasketOrder">');
		$('#basket_submit_links').append('<input type="hidden"" value="Y" name="ApplyCoupon">');
		$('#basket_form').submit();
	});
	$('#button-buy_order').click(function(e) {
		e.preventDefault();
		$('#basket_submit_links').append('<input type="hidden"" value="<?=GetMessage("SALE_ORDER")?>" name="BasketOrder">');
		$('#basket_form').submit();
	});
});
</script>

    <table class="table-cart">
    <tbody>

<? foreach($arResult["ITEMS"]["AnDelCanBuy"] as $arBasketItems): ?>
	<?
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

        <tr class="table-row-product">
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


            <td class="table-cart-chill table-cart-product-title">
                <div class="cart-product-title">
                    <a class="cart-product-title-link" href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>">
                        <?=$arBasketItems['NAME']?>
                    </a>
                    <? if($credit):?> <span class="color_black fs_14px">(в кредит)</span><? endif?>
                </div>
            </td>

            <td class="table-cart-chill table-cart-product-select">
                <div class="cart-product-select">
                    <a class="minus-icon product-sprite" href="#"></a>
                    <div class="cart-product-select-num"><?=$arBasketItems["QUANTITY"]?></div>
                    <a class="plus-icon product-sprite" href="#"></a>
                </div>
            </td>

            <td class="table-cart-chill table-cart-product-price">
                <div class="cart-product-price-num">
                    <?=($arBasketItems['PRICE']<$arBasketItems['FULL_PRICE']) ? $arBasketItems["FULL_PRICE_FORMATED"] :''?>
                    <? if($arBasketItems['PRICE'] > 0) echo PriceDigitExtractor($arBasketItems["PRICE_FORMATED"]); else echo 'Бесплатно';?>
                    <span class="cart-product-price-cy">руб.</span>
                </div>
            </td>

            <td class="table-cart-chill table-cart-product-del">
                <a class="del-product-icon product-sprite" href="<?=str_replace("#ID#", $arBasketItems["ID"], $arUrlTempl["delete"])?>"></a>
            </td>
        </tr>
<? /*
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
*/ ?>
<? endforeach ?>
    </tbody>
    </table>

	
    <? if($arResult["COUPON"]): ?>
        <div class="coupon-code-block mb-4">Купон на скидку активирован.</div>
    <? else: ?>
        <!-- код купона -->
        <div class="coupon-code-block mb-4">
            <input type="text" placeholder="введите код купона" class="coupon-code-input">
            <a class="button-transparent coupon-code-button" href="#">применить</a>
        </div>

	<? endif ?>


    <!-- итого -->
    <div class="cart-total clearfix">
        <div class="cart-total-section">
            <a class="button-bg cart-total-button b_button-buy button-buy_order" id="button-buy_order" href="#">Оформить заказ</a>
        </div>
        <div class="cart-total-section-2">
            <div class="cart-total-content">
                <span class="cart-total-text">итого:</span>
                <span class="cart-total-num"><?=PriceDigitExtractor($arResult["allSum_FORMATED"])?></span>
                <span class="cart-total-cy">руб.</span>
            </div>
        </div>
    </div>

<? else: ?>
	<div class="b_grid_level grid_level_30px">Корзина пуста</div>
<? endif ?>