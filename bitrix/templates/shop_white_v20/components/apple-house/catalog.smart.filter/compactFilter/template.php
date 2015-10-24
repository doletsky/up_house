<?//if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? // $this->SetViewTarget("right_area");?>
<?  //($arResult['SHOW_SMART_FILTER'] == '15')

parse_str($_SERVER['QUERY_STRING'], $urlParams);
    
?>
<!--<pre>--><?//print_r($arResult["DISPLAY_FILTER_ITEMS"])?><!--</pre>-->



<form action="" method="get" name="smart-filter" id="smart-filter">
    <input type="hidden" id="set_filter" name="set_filter" value="Показать">

<?foreach($arResult["DISPLAY_FILTER_ITEMS"] as $ITEM){
    if($ITEM['PROPERTY_VIEW_TYPE']!='C'&&$ITEM['PRICE']!=1) {
        ?>
        <pre><?print_r($ITEM)?></pre>
    <?
    }
    elseif($ITEM['PRICE']==1){
    ?>
        <div class="catalog-filter-price mt-3">
            <div class="catalog-filter-title catalog-filter-price-title">Цена</div>
            <div class="catalog-filter-price-container">
                <div>
                    <label class="form-label catalog-filter-price-label">
                        От <input type="text" class="form-input catalog-filter-price-inp min-price" name="<?=$ITEM['VALUES']['MIN']['CONTROL_ID']?>"/>
                    </label>
                    <label class="form-label catalog-filter-price-label">
                        До <input type="text" class="form-input catalog-filter-price-inp max-price"  name="<?=$ITEM['VALUES']['MAX']['CONTROL_ID']?>"/>
                    </label>
                </div>

                <div id="slider-range" class="slider-range-styles" minval="<?=$ITEM["VALUES"]["MIN"]["VALUE"]?>" maxval="<?=$ITEM["VALUES"]["MAX"]["VALUE"]?>" extrmaxval="<?=$arResult["EXTREMES"]['max']?>"></div>
                <div id="slider-scale">
                    <span class="slider-middles">0</span>
                    <?foreach ($arResult["MIDDLES"] as $middle): ?>
                        <span class="slider-middles"><?=$middle;?></span>
                    <?endforeach; ?>
                    <span class="slider-middles"><?=$arResult["EXTREMES"]['max']?></span>
                </div>


            </div>
        </div>

    <?
    }
    elseif($ITEM['PROPERTY_VIEW_TYPE']=='C'){
    ?>
    <div class="catalog-filter-manufacturer mt-3">
        <div class="catalog-filter-title"><?=$ITEM["NAME"]?></div>
        <div class="input-row">
        <?foreach($ITEM["VALUES"] as $PROP):?>
            <?
            $checked='';
            if(array_key_exists($PROP["CONTROL_ID"],$urlParams)){$checked=' checked="checked"';unset($urlParams[$PROP["CONTROL_ID"]]);}
            ?>
            <input id="manufacturer-radio-<?=$PROP["CONTROL_ID"]?>" type="checkbox" value="Y" name="<?=$PROP["CONTROL_ID"]?>"<?=$checked?>>
            <label for="manufacturer-radio-<?=$PROP["CONTROL_ID"]?>" class="input-helper input-helper--radio"><?=$PROP["VALUE"]?></label>
            <br />
        <?endforeach?>
        </div>
    </div>
    <?}
}?>
<?foreach($urlParams as $param=>$valParam):?>
    <input type="hidden" name="<?=$param?>" value="<?=$valParam?>">
<?endforeach?>

    <div class="filter-buttons-block clearfix">
        <a href="#" class="button-transparent filter-button pull-left" onclick="$('form#smart-filter').submit();return false;">показать</a>
        <a href="<?=$APPLICATION->GetCurPage();?>" class="filter-del pull-left">
            <span class="del-icon product-sprite"></span>
        </a>
    </div>
</form>

<?if(0):?>

<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
    <?foreach($arResult["HIDDEN"] as $arItem):?>
        <input
            type="hidden"
            name="<?echo $arItem["CONTROL_NAME"]?>"
            id="<?echo $arItem["CONTROL_ID"]?>"
            value="<?echo $arItem["HTML_VALUE"]?>"
        />
    <?endforeach;?>

    <div class="filtren">
        <ul>
        <?//var_dump($arParams["FILTER_FIELDS"]);
            //var_dump($arResult["ITEMS"]);
        ?>

        <?
        //$arParams['FILTER_FIELDS'][]='Цена';


        foreach($arResult["ITEMS"] as $arItem):?>
        <? if (preg_match("/iphone-6$|iphone-6-plus$/is",$uri) && in_array($arItem["NAME"],array('Форм-фактор','Производитель','Bluetooth','Диагональ')))continue; 
        	
           //var_dump($arItem["NAME"]);
           if (!in_array($arItem["NAME"],$arParams['FILTER_FIELDS']))
           {
           //var_dump($arItem["NAME"]);
           continue; 
           }
        ?>

            <?//var_dump($arItem["PROPERTY_TYPE"]); ?>
            <?if($arItem["PROPERTY_TYPE"] == "N" || isset($arItem["PRICE"])):?>
            <li class="lvl1"> <a href="#" onclick="BX.toggle(BX('ul_<?echo $arItem["ID"]?>')); return false;" class="showchild">Цена<?//=$arItem["NAME"]?></a>
                <ul id="ul_<?echo $arItem["ID"]?>">
                    <?
                        //var_dump(number_format($arItem["VALUES"]["MIN"]["VALUE"], 0, '', ''));
                        //var_dump($arItem["VALUES"]["MIN"]["HTML_VALUE"]);
                        //$arItem["VALUES"]["MAX"]["VALUE"];
                    //var_dump( $arItem["VALUES"]["MIN"]['VALUE']);
                    ?>
                    <li class="lvl2">
                        <table id="smart_filter_prices" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td><span class="min-price"><?echo GetMessage("CT_BCSF_FILTER_FROM")?></span><input
                                    class="min-price"
                                    type="text"
                                    name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                                    id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                                    value="<?echo ($arItem["VALUES"]["MIN"]["HTML_VALUE"] ? $arItem["VALUES"]["MIN"]["HTML_VALUE"] : number_format($arItem["VALUES"]["MIN"]["VALUE"], 0, '', ''))?>"
                                    size="5"
                                    onkeyup="smartFilter.keyup(this)"
                                /></td>
                                <td><span class="max-price"><?echo GetMessage("CT_BCSF_FILTER_TO")?></span><input
                                    class="max-price"
                                    type="text"
                                    name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                                    id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                                    value="<?echo ($arItem["VALUES"]["MAX"]["HTML_VALUE"] ? $arItem["VALUES"]["MAX"]["HTML_VALUE"] : number_format($arItem["VALUES"]["MAX"]["VALUE"], 0, '', ''))?>"
                                    size="5"
                                    onkeyup="smartFilter.keyup(this)"
                                /></td>
                            </tr>
                        </table>
                        <script type="text/javascript" src="/bitrix/templates/shop_white/private/js/jquery-ui-1.10.4.custom.js"></script>
                        <link rel="stylesheet" href="/bitrix/templates/shop_white/private/style/jquery-ui-1.10.4.custom.css">
                        <link rel="stylesheet" href="/bitrix/templates/shop_white/private/style/private_smart_filter.css">
                        <script>
                            $(function() {
                                $( "#slider-range" ).slider({
                                    range: true,
/*                                    min: <?=$arItem["VALUES"]["MIN"]["VALUE"]?>,
                                    max: <?=$arItem["VALUES"]["MAX"]["VALUE"]?>,*/
                                    min: 0,
                                    max: <?=$arResult["EXTREMES"]['max']/100?>,

                                    values: [ <?=($arItem["VALUES"]["MIN"]["HTML_VALUE"] ? ($arItem["VALUES"]["MIN"]["HTML_VALUE"])/100 : number_format($arItem["VALUES"]["MIN"]["VALUE"]-100, 0, '', '')/100)?>,
                                              <?=($arItem["VALUES"]["MAX"]["HTML_VALUE"] ? ($arItem["VALUES"]["MAX"]["HTML_VALUE"])/100 : number_format($arItem["VALUES"]["MAX"]["VALUE"]+100, 0, '', '')/100)?> ],
                                    slide: function( event, ui ) {
                                        $(".min-price").val(ui.values[0] * 100);
                                        $(".max-price").val(ui.values[1] * 100);

                                        var perCentMinPrice = (parseInt($("#slider-range a:first-of-type").css('left')) / parseInt($('#slider-range').css('width')));
                                        var perCentMaxPrice = (parseInt($("#slider-range a:last-of-type").css('left')) / parseInt($('#slider-range').css('width')));

                                        $("#slider-range a:first-of-type").css('margin-left', "-" + (10 * perCentMinPrice) + "px");
                                        $("#slider-range a:last-of-type").css('margin-left', "-" + (10 * perCentMaxPrice) + "px");
                                    }
                                });
                                $( ".min-price" ).val( $( "#slider-range" ).slider( "values", 0 ) * 100 );
                                $( ".max-price" ).val( $( "#slider-range" ).slider( "values", 1 ) * 100 );

                                var perCentMinPrice = (parseInt($("#slider-range a:first-of-type").css('left')) / parseInt($('#slider-range').css('width')));
                                var perCentMaxPrice = (parseInt($("#slider-range a:last-of-type").css('left')) / parseInt($('#slider-range').css('width')));

                                $("#slider-range a:first-of-type").css('margin-left', "-" + (10 * perCentMinPrice) + "px");
                                $("#slider-range a:last-of-type").css('margin-left', "-" + (10 * perCentMaxPrice) + "px");
                            });
                        </script>
                        <div id="slider-scale">
                            <span class="slider-middles">0</span>
                            <?foreach ($arResult["MIDDLES"] as $middle): ?>
                                <span class="slider-middles"><?=$middle;?></span>
                            <?endforeach; ?>
                            <span class="slider-middles"><?=$arResult["EXTREMES"]['max']?></span>
                        </div>
                        <div id="slider-range" class="slider-range-styles" minval="<?=$arItem["VALUES"]["MIN"]["VALUE"]?>" maxval="<?=$arItem["VALUES"]["MAX"]["VALUE"]?>" extrmaxval="<?=$arResult["EXTREMES"]['max']?>"></div>


                    </li>
                </ul>
            </li>
            <?elseif(!empty($arItem["VALUES"]) && count($arItem["VALUES"]) > 1 && $arResult['SHOW_SMART_FILTER'] != '14'):;?>
                <?if($arItem["PROPERTY_VIEW_TYPE"] == "Y"):?>
                    <li class="lvl1"> <? /* <a href="#" onclick="BX.toggle(BX('ul_<?echo $arItem["ID"]?>')); return false;" class="showchild"><?=$arItem["NAME"]?></a> */ ?>
                        <?/* блок оригинала, спрятан, используется для клонирования*/?>
                        <div class="smart-filter-container smart_filter_select_origin_container" select-for-id="smart_filter_select_<?echo $arItem["ID"]?>" style="display: none;">
                            <div class="dropdown">
                            <select class="smart-filter" onchange="SmartFilterSelected(this, false);" select-for-id="smart_filter_select_<?echo $arItem["ID"]?>" id="smart_filter_select_origin">
                                <option value="" disabled="disabled" selected="selected">Выберите <?=$arItem["NAME"]?></option>
                                <?foreach($arItem["VALUES"] as $val => $ar):?>
                                    <option value="<?echo $ar["HTML_VALUE"]?>" filter-name="<?echo $ar["CONTROL_NAME"]?>" <?echo $ar["CHECKED"]? 'selected="selected"': ''?> <?echo $ar["DISABLED"]? 'disabled="disabled"': ''?>>
                                        <?echo $ar["VALUE"];?>
                                    </option>
                                <?endforeach;?>
                            </select>
                            </div>
                            <input type="hidden" name="name" value="value"/>
                            <a href="#" onclick="RemoveOption(this); return false;" style="display: none;">удалить</a>
                            <a href="#" onclick="ShowOption(this); return false;" class="plus_from_smart_filter" style="display: none;">+</a>

                        </div>

                        <?/* если есть выбранные позиции от битрикса, создать блоки с ними, деактивировать позиции в остальных блоках */?>
                        <? $divSelectCounter = 1; ?>
                        <?foreach($arItem["VALUES"] as $valForSelect => $arForSelect):?>
                            <? if($arForSelect["CHECKED"]):?>
                                <div class="smart-filter-container" select-for-id="smart_filter_select_<?echo $arItem["ID"]?>_<?=$divSelectCounter++?>">
                                    <div class="dropdown">
                                    <select class="smart-filter" onchange="SmartFilterSelected(this, false);" select-for-id="smart_filter_select_<?echo $arItem["ID"]?>">
                                        <option value="" disabled="disabled" selected="selected">Выберите <?=$arItem["NAME"]?></option>
                                        <?foreach($arItem["VALUES"] as $val => $ar):?>
                                            <option value="<?echo $ar["HTML_VALUE"]?>" filter-name="<?echo $ar["CONTROL_NAME"]?>" <?echo ($ar["CHECKED"] && ($ar["CONTROL_NAME"] == $arForSelect["CONTROL_NAME"]))? 'selected="selected" custom="2"': ''?> <?echo ($ar["DISABLED"] || ($ar["CHECKED"] && ($ar["CONTROL_NAME"] != $arForSelect["CONTROL_NAME"])))? 'disabled="disabled"': ''?>>
                                                <?echo $ar["VALUE"];?>
                                            </option>
                                        <?endforeach;?>
                                    </select>
                                    </div>

                                    <input type="hidden" name="<?echo $arForSelect["CONTROL_NAME"]?>" value="Y"/>
                                    <a href="#" onclick="RemoveOption(this); return false;" style="display: none;">удалить</a>
                                    <a href="#" onclick="ShowOption(this); return false;" class="plus_from_smart_filter" style="display: none;">+</a>
                                </div>
                                    <? endif; ?>
                        <?endforeach;?>


                        <?/* ложный блок, используется только для снятия выбранного знаяения, его значение возвращается скриптом на место, не имеет "удалить" */?>
                        <div class="smart-filter-container smart_filter_select_liar_container" select-for-id="smart_filter_select_<?echo $arItem["ID"]?>">
                            <div class="dropdown">
                            <select class="smart-filter" onchange="SmartFilterSelected(this, true);" select-for-id="smart_filter_select_<?echo $arItem["ID"]?>">
                                <option value="" disabled="disabled" selected="selected">Выберите <?=$arItem["NAME"]?></option>
                                <?foreach($arItem["VALUES"] as $val => $ar):?>
                                    <option value="<?echo $ar["HTML_VALUE"]?>" filter-name="<?echo $ar["CONTROL_NAME"]?>"  <?echo $ar["DISABLED"]? 'disabled="disabled"': ''?>>
                                        <?echo $ar["VALUE"];?>
                                    </option>
                                <?endforeach;?>
                            </select>
                            </div>
                        </div>
                    </li>
                <?elseif($arItem["PROPERTY_VIEW_TYPE"] == "C"):?>
                    <?/* вариант с чекбоксами от Битрикса */?>
                    <li class="lvl1"> <a href="#" onclick="BX.toggle(BX('ul_<?echo $arItem["ID"]?>')); return false;" class="showchild"><?=$arItem["NAME"]?></a>
                        <ul id="ul_<?echo $arItem["ID"]?>">
                            <?foreach($arItem["VALUES"] as $val => $ar):?>
                            <? // АДОВ КОСТЫЛЬ 
                                
                                
                            ?>
                            <? if (preg_match("/iphone-6|iphone-6-plus$/is",$uri) && $arItem["NAME"]=='Основной цвет' && !in_array($ar["VALUE"],array('белый','черный','золотой','розовый')))continue; ?>
                            <? if (preg_match("/iphone-6|iphone-6-plus$/is",$uri) && $arItem["NAME"]=='Объем памяти' && !in_array($ar["VALUE"],array('16 Гб','64 Гб','128 Гб')))continue; ?>
                            <? if (preg_match("/iwatch$/is",$uri) && $arItem["NAME"]=='Основной цвет' && !in_array($ar["VALUE"],array('белый','черный','золотой','зеленый','золотой','коричневый','розовый','серебристый','синий')))continue; ?>
                            
                            <li class="lvl2<?echo $ar["DISABLED"]? ' lvl2_disabled': ''?>"><input
                                type="checkbox"
                                value="<?echo $ar["HTML_VALUE"]?>"
                                name="<?echo $ar["CONTROL_NAME"]?>"
                                id="<?echo $ar["CONTROL_ID"]?>"
                                <?echo $ar["CHECKED"]? 'checked="checked"': ''?>
                                onclick="smartFilter.click(this)"
                                class="checkbox-invisible"
                            /><span class="checkbox-visible"></span><label for="<?echo $ar["CONTROL_ID"]?>"><?echo $ar["VALUE"];?></label></li>
                            <?endforeach;?>
                        </ul>
                    </li>
                <?endif;?>
            <?endif;?>
        <?endforeach;?>
        </ul>
        <div class="smart_filter_submitbtns">
            <input type="submit" id="set_filter" name="set_filter" value="<?=GetMessage("CT_BCSF_SET_FILTER")?>" />
            <input type="submit" id="del_filter" name="del_filter" value="x" />
            <? /*<input type="submit" id="del_filter" name="del_filter" value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>" /> */?>
        </div>
        <div class="modef" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?>>
            <?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
            <a href="<?echo $arResult["FILTER_URL"]?>" class="showchild"><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
            <!--<span class="ecke"></span>-->
        </div>
    </div>
</form>
<script>
    var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>');
</script>
<? // $this->EndViewTarget("right_area");?>
<?endif?>