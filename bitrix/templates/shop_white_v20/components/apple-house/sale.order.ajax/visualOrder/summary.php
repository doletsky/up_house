<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// result modifier
$arBasketKeys = array(); // массив в котором id товара вязывается с ключом
foreach($arResult["BASKET_ITEMS"] as $key => $arBasketItems) {
	$arBasketKeys[$arBasketItems['ID']] = $key;
}
?>
<!--<pre>--><?//print_r($arResult['BASKET_LIST'])?><!--</pre>-->
<div class="row b_grid_level grid_level_15px">
	<div class="col-xs-6 b_grid_unit-3-5">
		<div class="composition-order b_grid_level grid_level_15px">
            <h3 class="entry-title-3"><?=ToLower(GetMessage("SOA_TEMPL_SUM_TITLE"))?></h3>

		<div class="b_line"></div>
            <table class="table-cart">
	<?
	foreach($arResult['BASKET_LIST'] as $arBasketItems)
	{
    ?>

                <tr class="table-row-product">
                    <td class="table-cart-chill table-cart-product-title">
                        <div class="cart-product-title">
                            <a href="<?=$arBasketItems['DETAIL_PAGE_URL']?>" class="cart-product-title-link">
                                <?=$arBasketItems['NAME']?>
                            </a>
                        </div>
                    </td>
                    <td class="table-cart-chill table-cart-product-select">
                        <div class="cart-product-select-num"><?=$arBasketItems['QUANTITY']?> </div>
                    </td>
                    <td class="table-cart-chill table-cart-product-price">
                        <div class="cart-product-price-num">
                            <?=number_format($arBasketItems['PRICE'], 0, ',', ' ')?> <span class="cart-product-price-cy">руб.</span>
                        </div>
                    </td>
                </tr>
        <?if(count($arBasketItems['PROPS'])>0):?>
        <?
        foreach($arBasketItems['PROPS'] as $arBasketProps)
        {
            ?>
                <tr class="table-row-addition">
                    <td colspan="2" class="table-cart-chill table-cart-product-title">
                        <div class="cart-product-title">
                            <div class="tick-icon-dark product-sprite"></div>
                            <a href="<?=$arBasketProps['DETAIL_PAGE_URL']?>" class="cart-additiont-title-link">
                                <?=$arBasketItems['NAME']?>
                            </a>
                        </div>
                    </td>
                    <td class="table-cart-chill table-cart-product-price">
                        <div class="cart-addition-price-num">
                            <?=number_format($arBasketProps['PRICE'], 0, ',', ' ')?> <span class="cart-product-price-cy">руб.</span>
                        </div>
                    </td>
                </tr>
            <?
        }
            ?>
        <?endif?>

    <?
	}
	?>
            </table>
        </div>
	</div>
	<div class="row b_grid_unit-2-5">
		<div class="col-xs-6 b_grid_level grid_level_15px">
			<div class="comments-order b_grid_unit-11-12">
                    <h3 class="entry-title-3"><?=ToLower(GetMessage("SOA_TEMPL_SUM_COMMENTS"))?></h3>
					<textarea class="form-textarea b_textarea textarea_height_150px textarea_width_300px" placeholder="оставьте Ваш комментарий в этом окне" name="ORDER_DESCRIPTION" id="ORDER_DESCRIPTION"><?=$arResult["USER_VALS"]["ORDER_DESCRIPTION"]?></textarea>
			</div>
		</div>							
	</div>							
</div>

<!-- итого -->
<div class="cart-total ordering mt-5 clearfix">
    <div class="cart-total-section">
        <a href="#" class="button-bg cart-total-button b_button-buy button-buy_order-2" onClick="submitForm('Y'); return false;">Заказать</a>
    </div>

    <div class="cart-total-section-1">
        <div class="cart-total-content-2">
            <span class="cart-total-text-2">товаров на:</span> <span class="cart-total-num-2"><?=$arResult["ORDER_PRICE_FORMATED"]?></span>
            <?
            if (doubleval($arResult["DELIVERY_PRICE"]) > 0)
            {
            ?>
            <br><span class="cart-total-text-2">доставка:</span> <span class="cart-total-num-2"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></span>
            <?}?>
            <?
            if (doubleval($arResult["PAYMENT_PRICE"]) > 0)
            {
                ?>
                <br><span class="cart-total-text-2">комиссия платежной системы:</span> <span class="cart-total-num-2"><?=$arResult["PAYMENT_PRICE_FORMATED"]?></span>
            <?
            }
            ?>

        </div>
    </div>

    <div class="cart-total-section-2">
        <div class="cart-total-content">
            <span class="cart-total-text">итого:</span>
            <span class="cart-total-num"><?=str_replace(' руб.', '', $arResult["ORDER_TOTAL_PRICE_FORMATED"])?></span>
            <span class="cart-total-cy">руб.</span>
        </div>
    </div>
</div>
<!-- /итого -->
