<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!-- контактные данные -->
<div class="col-xs-6">
    <div class="contact-details">
        <h3 class="entry-title-3">контактные данные</h3>
            <input type="hidden" name="showProps" id="showProps" value="N" />
    <? // ФИО ?>
    <div class="b_grid_level grid_level_15px">
        <div class="b_grid_unit-2-3">
            <input type="text" placeholder="Ф.И.О.*" class="form-input form-input-name b_input-text input-text_width_240px" maxlength="250" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][1]["VALUE"]?>" name="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][1]["FIELD_NAME"]?>" id="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][1]["FIELD_NAME"]?>">
        </div>
    </div>
    <? // e-mail ?>
    <div class="b_grid_level grid_level_15px">
        <div class="b_grid_unit-2-3">
            <input type="email" placeholder="e-mail*" class="form-input form-input-name b_input-text input-text_width_240px" maxlength="250" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][2]["VALUE"]?>" name="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][2]["FIELD_NAME"]?>" id="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][2]["FIELD_NAME"]?>">
        </div>
    </div>
    <? // телефон ?>
    <div class="b_grid_level grid_level_15px">
        <div class="b_grid_unit-2-3">
            <div class="order_phone_blc">
                <input type="tel" placeholder="контактный телефон*" class="form-input form-input-name b_input-text input-text_width_240px" maxlength="250" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][3]["VALUE"]?>" name="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][3]["FIELD_NAME"]?>" id="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][3]["FIELD_NAME"]?>">
            </div>
        </div>
    </div>
    <? if(0 && $USER->IsAdmin() && $arResult['USER_VALS']['DELIVERY_ID'] == 1):?>
        <script type="text/javascript">
            <? $maskedPhoneInput = ($_REQUEST['masked_phone_input'] == $arResult["ORDER_PROP"]["USER_PROPS_Y"][3]["VALUE"]) ? $_REQUEST['masked_phone_input'] : $arResult["ORDER_PROP"]["USER_PROPS_Y"][3]["VALUE"];?>
            $('.order_phone_blc').append('<input id="masked_phone_input" name="masked_phone_input" class="b_input-text input-text_width_240px" value="<?=$maskedPhoneInput?>">');

        </script>
    <? endif ?>
    <? // местоположение ?>
    <div style="display:none">
        <? /*
	$GLOBALS["APPLICATION"]->IncludeComponent(
		"bitrix:sale.ajax.locations",
		"",
		array(
			"AJAX_CALL" => "N",
			"COUNTRY_INPUT_NAME" => 4,
			"REGION_INPUT_NAME" => "REGION",
			"CITY_INPUT_NAME" => $arResult["ORDER_PROP"]["USER_PROPS_Y"][6]["FIELD_NAME"],
			"CITY_OUT_LOCATION" => "Y",
			"LOCATION_VALUE" => $_REQUEST['CITY_ID'],  // Москва
			"ORDER_PROPS_ID" => 6,
			"ONCITYCHANGE" => "",
		),
		null,
		array('HIDE_ICONS' => 'Y')
	);*/
        ?>
    </div>


    <script type="text/javascript">
        function fGetBuyerProps(el)
        {
            var show = '<?=GetMessageJS('SOA_TEMPL_BUYER_SHOW')?>';
            var hide = '<?=GetMessageJS('SOA_TEMPL_BUYER_HIDE')?>';
            var status = BX('sale_order_props').style.display;
            var startVal = 0;
            var startHeight = 0;
            var endVal = 0;
            var endHeight = 0;
            var pFormCont = BX('sale_order_props');
            pFormCont.style.display = "block";
            pFormCont.style.overflow = "hidden";
            pFormCont.style.height = 0;
            var display = "";

            if (status == 'none')
            {
                el.text = '<?=GetMessageJS('SOA_TEMPL_BUYER_HIDE');?>';

                startVal = 0;
                startHeight = 0;
                endVal = 100;
                endHeight = pFormCont.scrollHeight;
                display = 'block';
                BX('showProps').value = "Y";
                el.innerHTML = hide;
            }
            else
            {
                el.text = '<?=GetMessageJS('SOA_TEMPL_BUYER_SHOW');?>';

                startVal = 100;
                startHeight = pFormCont.scrollHeight;
                endVal = 0;
                endHeight = 0;
                display = 'none';
                BX('showProps').value = "N";
                pFormCont.style.height = startHeight+'px';
                el.innerHTML = show;
            }

            (new BX.easing({
                duration : 700,
                start : { opacity : startVal, height : startHeight},
                finish : { opacity: endVal, height : endHeight},
                transition : BX.easing.makeEaseOut(BX.easing.transitions.quart),
                step : function(state){
                    pFormCont.style.height = state.height + "px";
                    pFormCont.style.opacity = state.opacity / 100;
                },
                complete : function(){
                    BX('sale_order_props').style.display = display;
                    BX('sale_order_props').style.height = '';
                }
            })).animate();
        }
    </script>
        </div>
</div>
