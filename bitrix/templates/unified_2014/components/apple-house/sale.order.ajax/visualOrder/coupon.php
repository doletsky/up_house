<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <div class="col-xs-6">

        <div class="discount-coupon">
            <h3 class="entry-title-3">купон на скидку</h3>
            <? if($arResult["COUPON"]): ?>
                <div class="coupon-message">Купон на скидку активирован. Ваша скидка: 3% на технику, 10% на чехлы и аксессуары.</div>
            <? else: ?>
            <div class="coupon-code-block mb-4 clearfix">
                <input type="text" class="coupon-code-input" placeholder="введите код купона" id="COUPON" name="COUPON" value="" maxlength="250" >
                <a href="#" class="button-transparent coupon-code-button" id="button-apply_coupon" href="#" onclick="submitForm(); return false;">применить</a>
            </div>
        </div>
    </div>

<? endif ?>