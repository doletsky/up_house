<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><div class="b_grid_level grid_level_15px">
    <div class="b_grid_unit-1">
        <span class="fs_24px">����� �� ������</span>
    </div>
</div>
<? if($arResult["COUPON"]): ?>
    <div class="b_grid_level grid_level_15px">����� �� ������ �����������. ������ ������ ��� ������� ��� �������� �� ����� ��������� ���������� �� ������ ������.</div>
<? else: ?>
    <div class="b_grid_level grid_level_15px">
        <div class="b_grid_unit-1-3 lh_30px">
            ����� �� ������:
        </div>
        <div class="b_grid_unit-2-3">
            <input type="text" id="COUPON" name="COUPON" value="" maxlength="250" class="b_input-text input-text_width_240px">
        </div>
    </div>
    <div class="b_grid_level grid_level_5px">
        <? /* <input type="hidden" name="HTTP_REFFERER" value="<?=$arResult["REFFERER"];?>" /> */ ?>
        <a id="button-apply_coupon" href="#" onclick="submitForm(); return false;"><img src="<?=SITE_TEMPLATE_PATH?>/private/images/apply_btn.png" width="132" height="30" alt="���������"></a>
    </div>
<? endif ?>