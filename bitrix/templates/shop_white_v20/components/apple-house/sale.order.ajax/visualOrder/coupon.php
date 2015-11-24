<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="discount-coupon">
    <h3 class="entry-title-3">купон на скидку</h3>
<? if($arResult["COUPON"]): ?>
    <div class="b_grid_level grid_level_15px">Купон на скидку активирован. Размер скидки Вам сообщит наш менеджер во время уточнения информации по Вашему заказу.</div>
<? else: ?>
    <div class="b_grid_level grid_level_15px">
        <div class="b_grid_unit-2-3">
            <input type="text" id="COUPON" name="COUPON" value="" maxlength="250" class="coupon-code-input b_input-text input-text_width_240px">
            <a id="button-apply_coupon" href="#" onclick="submitForm(); return false;" class="button-transparent coupon-code-button">применить</a>
        </div>
    </div>
<? endif ?>
    </div>