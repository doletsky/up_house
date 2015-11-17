<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="main-shadow">
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <a href="/" class="breadcrumbs-item">Главная</a>
        <div class="breadcrumbs-item">Корзина</div>
    </div>
    <!-- /breadcrumbs -->

    <section class="cart-section section-container">
        <div class="row">
            <div class="col-xs-6"><h1 class="cart-title entry-title">корзина</h1></div>
            <div class="col-xs-6"><a href="#" class="cart-continue-shop button-link-underline">Продолжить покупки</a></div>
        </div>
<pre><?print_r($arResult)?></pre>
        <div class="cart-container">
            <table class="table-cart">
                <tbody>
                <tr class="table-row-product">
                    <td class="table-cart-chill table-cart-product-title">
                        <div class="cart-product-title">
                            <a href="#" class="cart-product-title-link">
                                Apple iPhone 5S 16GB White&Silver (Белый) А1530/1457
                            </a>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-select">
                        <div class="cart-product-select">
                            <a href="#" class="minus-icon product-sprite"></a>
                            <div class="cart-product-select-num">1</div>
                            <a href="#" class="plus-icon product-sprite"></a>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-price">
                        <div class="cart-product-price-num">
                            26 700 <span class="cart-product-price-cy">руб.</span>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-del">
                        <a href="#" class="del-product-icon product-sprite"></a>
                    </td>
                </tr>

                <tr class="table-row-addition">
                    <td class="table-cart-chill table-cart-product-title">
                        <div class="cart-product-title">
                            <div class="tick-icon product-sprite"></div>
                            <a href="#" class="cart-additiont-title-link">
                                Кабель Apple USB to Lightning
                            </a>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-select">

                    </td>

                    <td class="table-cart-chill table-cart-product-price">
                        <div class="cart-addition-price-num">
                            890 <span class="cart-product-price-cy">руб.</span>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-del">
                        <a href="#" class="del-additiont-icon product-sprite"></a>
                    </td>
                </tr>

                <tr class="table-row-addition table-row-last">
                    <td class="table-cart-chill table-cart-product-title">
                        <div class="cart-product-title">
                            <div class="tick-icon product-sprite"></div>
                            <a href="#" class="cart-additiont-title-link">
                                Автомобильное зарядное устройство
                            </a>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-select">

                    </td>

                    <td class="table-cart-chill table-cart-product-price">
                        <div class="cart-addition-price-num">
                            990 <span class="cart-product-price-cy">руб.</span>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-del">
                        <a href="#" class="del-additiont-icon product-sprite"></a>
                    </td>
                </tr>

                <tr class="table-row-product">
                    <td class="table-cart-chill table-cart-product-title">
                        <div class="cart-product-title">
                            <a href="#" class="cart-product-title-link">
                                Браслет Jawbone Up24 Lemon Lime (Лимонный) M
                            </a>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-select">
                        <div class="cart-product-select">
                            <a href="#" class="minus-icon product-sprite"></a>
                            <div class="cart-product-select-num">1</div>
                            <a href="#" class="plus-icon product-sprite"></a>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-price">
                        <div class="cart-product-price-num">
                            5 990 <span class="cart-product-price-cy">руб.</span>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-del">
                        <a href="#" class="del-product-icon product-sprite"></a>
                    </td>
                </tr>

                <tr class="table-row-addition table-row-last">
                    <td class="table-cart-chill table-cart-product-title">
                        <div class="cart-product-title">
                            <div class="tick-icon product-sprite"></div>
                            <a href="#" class="cart-additiont-title-link">
                                Сменный колпачок
                            </a>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-select">

                    </td>

                    <td class="table-cart-chill table-cart-product-price">
                        <div class="cart-addition-price-num">
                            620 <span class="cart-product-price-cy">руб.</span>
                        </div>
                    </td>

                    <td class="table-cart-chill table-cart-product-del">
                        <a href="#" class="del-additiont-icon product-sprite"></a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

        <!-- код купона -->
        <div class="coupon-code-block mb-4">
            <input type="text" class="coupon-code-input" placeholder="введите код купона" />
            <a href="#" class="button-transparent coupon-code-button">применить</a>
        </div>

        <!-- итого -->
        <div class="cart-total clearfix">
            <div class="cart-total-section">
                <a href="#" class="button-bg cart-total-button">Оформить заказ</a>
            </div>
            <div class="cart-total-section-2">
                <div class="cart-total-content">
                    <span class="cart-total-text">итого:</span>
                    <span class="cart-total-num">35 190</span>
                    <span class="cart-total-cy">руб.</span>
                </div>
            </div>
        </div>

    </section>
</div>


<?if(0):?>
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

        <div class="b_grid_unit-1-2">
            <a class="no-style-link" href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>"><span class="color_253487"><?=$arBasketItems['NAME']?></span></a><? if($credit):?> <span class="color_black fs_14px">(в кредит)</span><? endif?>
<?php
$preorderMessage = preg_match('/^\/iphone\-6S/is', $arBasketItems["DETAIL_PAGE_URL"]) ?
                   "<span style='color: #ce0000; margin-top: 10px; display:block;'>Вы оформляете ПРЕДЗАКАЗ!</span>" :
                   "<br /><span class='color_black fs_14px'>(предзаказ)</span>";
?>
            <? if($preorder) echo $preorderMessage; ?>
        </div>
        <div class="b_grid_unit-1-6">
            <div class="b_spin-edit">
                <input class="b_spin-edit_input" type="hidden" name="QUANTITY_<?=$arBasketItems["ID"]?>" value="<?=$arBasketItems["QUANTITY"]?>">
                <span class="b_spin-edit_button spin-edit_button_minus"><i class="b_glyph glyph-minus"></i></span>
                <div class="b_spin-edit_value"></div>
                <span class="b_spin-edit_button spin-edit_button_plus"><i class="b_glyph glyph-plus"></i></span>
            </div>
        </div>
        <div class="b_grid_unit-1-4">
            <span class="color_79b70d"><?=($arBasketItems['PRICE']<$arBasketItems['FULL_PRICE'])?'<s style="color:#aaa">'.$arBasketItems["FULL_PRICE_FORMATED"].'</s> ':''?><? if($arBasketItems['PRICE'] > 0) echo $arBasketItems["PRICE_FORMATED"]; else echo 'Бесплатно';?></span>
        </div>
        <div class="b_grid_unit-1-12 ta_right">
            <a class="no-style-link" href="<?=str_replace("#ID#", $arBasketItems["ID"], $arUrlTempl["delete"])?>"><i class="b_glyph glyph-delete"></i></a>
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
    <? //if($USER->IsAdmin()): ?>
<? //if($USER->IsAdmin()){ CCatalogDiscount::ClearCoupon();} ?>

        <? if($arResult["COUPON"]): ?>
            <? // CCatalogDiscount::ClearCoupon(); ?>
            <? /*<div>Ваш купон: <span class="fs_bold"><?=$arResult["COUPON"]?></span></div>*/ ?>
                <div>
                    Купон на скидку активирован.
                </div>

<div style="font-size: 13px; margin-top: 10px">Размер скидки Вам сообщит наш менеджер во время уточнения информации по Вашему заказу.</div>


    <? else: ?>
            <div>
                <div style="float:left; padding:4px 10px 0 0;">
                    Купон на скидку: <input type="text" style="height:16px; font-size:14px; line-height:16px; padding:2px 5px; border:1px solid #dedfe0" name="COUPON" value="">
                </div>
                <div style="float:left">
                    <a id="button-apply_coupon" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/private/images/apply_btn.png" width="132" height="30" alt="применить"></a>
                </div>
                <? //<input type="submit" value="Применить купон" style="height:16px; font-size:16px; line-height:16px; padding:3px 10px; color:#fff; border:none; background:#5dc7ea; display:block; float:left;">?>
            </div>
            <br clear="left">
        <? //endif ?>
    <? endif ?>
    <div class="b_grid_level grid_level_30px">
        <div class="b_grid_unit-2-3" id="basket_submit_links">
            <a class="b_button-buy button-buy_order" id="button-buy_order" href="/personal/order/make/"></a>
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
<?endif?>