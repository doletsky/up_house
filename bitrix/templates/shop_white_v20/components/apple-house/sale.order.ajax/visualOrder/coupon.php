<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><div class="b_grid_level grid_level_15px">
    <div class="b_grid_unit-1">
        <span class="fs_24px">Купон на скидку</span>
    </div>
</div>
<? if($arResult["COUPON"]): ?>
    <div class="b_grid_level grid_level_15px">Купон на скидку активирован. Размер скидки Вам сообщит наш менеджер во время уточнения информации по Вашему заказу.</div>
<? else: ?>
    <div class="b_grid_level grid_level_15px">
        <div class="b_grid_unit-1-3 lh_30px">
            Купон на скидку:
        </div>
        <div class="b_grid_unit-2-3">
            <input type="text" id="COUPON" name="COUPON" value="" maxlength="250" class="b_input-text input-text_width_240px">
        </div>
    </div>
    <div class="b_grid_level grid_level_5px">
        <? /* <input type="hidden" name="HTTP_REFFERER" value="<?=$arResult["REFFERER"];?>" /> */ ?>
        <a id="button-apply_coupon" href="#" onclick="submitForm(); return false;"><img src="<?=SITE_TEMPLATE_PATH?>/private/images/apply_btn.png" width="132" height="30" alt="применить"></a>
    </div>
<? endif ?>