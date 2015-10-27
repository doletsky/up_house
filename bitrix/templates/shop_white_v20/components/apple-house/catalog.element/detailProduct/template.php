<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<pre><?print_r($arResult)?></pre>
<? $APPLICATION->SetAdditionalCSS("/news/style.css", true); ?>
<script type="text/javascript">
$(document).ready(function() {
    var addLink = '<?=str_replace('&amp;', '&', $arResult['ADD_URL'])?>';
    <? if($arResult['PRICES']['Продажа']['DISCOUNT_VALUE_VAT']):?>
    var elementPrice = <?=$arResult['PRICES']['Продажа']['DISCOUNT_VALUE_VAT']?>;
    <? elseif($arResult['PRICES']['Продажа']['VALUE_VAT']):?>
    var elementPrice = <?=$arResult['PRICES']['Продажа']['VALUE_VAT']?>;
    <? endif ?>
    /*
    var services = [];
    <? foreach($arResult['SERVICE_LIST']['SECTIONS'] as $serviceSection): ?>
    services[<?=$serviceSection['ID']?>] = [];
    services[<?=$serviceSection['ID']?>]['id'] = 0;
    services[<?=$serviceSection['ID']?>]['price'] = 0;
    <? endforeach ?>
    var serviceList = [<? foreach($arResult['SERVICE_LIST']['SECTIONS'] as $key => $serviceSection): ?><?=$serviceSection['ID']?><? if(($key + 1) < count($arResult['SERVICE_LIST']['SECTIONS'])):?>,<? endif ?><? endforeach ?>];
    */
    /*
    $('.product_options').change(function(e) {
        var add = addLink;
        var price = elementPrice;
        $('.product_options').each(function() {
            var option = $('option:selected',$(this));
            var optionID = option.val();

            if(optionID > 0) {
                var optionPrice = option.attr('data-price');
                add += '&option[]=' + optionID;
                price += parseInt(optionPrice);
            }
        });
        price = price.toString();
        $('#addElementLink').attr('href', add);
        $('#addElementCreditLink').attr('href', add + '&Credit=Y');
        $('#elementPrice').text(formatPrice(price) + ' руб.');
    });
    */
    function optionChange() {
        var add = addLink;
        var price = elementPrice;
        $('.option_group input').each(function() {
            var optionID = $(this).val();
            if(optionID > 0 && $(this).prop('checked')) {
                var optionPrice = $(this).attr('data-price');
                add += '&option[]=' + optionID;
                price += parseInt(optionPrice);
            }
        });
        price = price.toString();
        $('#addElementLink').attr('href', add);
        $('#addElementCreditLink').attr('href', add + '&credit=Y');
        $('#elementPrice').text(formatPrice(price) + ' руб.');
    }

    function formatPrice(price) {
        var newPrice = '';
        var y = 0;
        for(var i = price.length-1; i >= 0; i--) {
            if(y%3 == 0)
                newPrice = ' ' + newPrice;
            newPrice = price[i] + newPrice;
            y++;
        }
        return newPrice;
    }
    $('.option_group').each(function() {
        var group_blc = $(this);
        var input_blc = $('.option_input', group_blc);
        input_blc.each(function() {
            var input = $('input', $(this));
            input.hide();
            var input_id = input.attr('id');
            var input_type = input.attr('type');
            var input_checked = input.prop('checked');
            $(this).append('<div style="float:left; width:15px; height:15px; margin:1px 0 0 0;" class="' + input_id + '"></div>');
            var gr_input = $('.' + input_id, $(this));

            var input_label = $('.option_label', group_blc);
            if(input_type == 'checkbox') {
                if(input_checked)
                    gr_input.css('background', 'url(/bitrix/templates/shop_white/private/images/checkbox.png) left -15px no-repeat');
                else
                    gr_input.css('background', 'url(/bitrix/templates/shop_white/private/images/checkbox.png) left top no-repeat');
                input_label.click(function(e) {
                    e.preventDefault();
                    var for_id = $(this).attr('for');
                    if($('#' + for_id).prop('checked')){
                        $('.' + for_id).css('background-position', 'left top');
                        $('#' + for_id).prop('checked', false);
                    }
                    else{
                        $('.' + for_id).css('background-position', 'left -15px');
                        $('#' + for_id).prop('checked', true);
                    }
                    optionChange();
                });
                gr_input.click(function(e) {
                    var for_id = $(this).attr('class');
                    if($('#' + for_id).prop('checked')) {
                        $(this).css('background-position', 'left top');
                        $('#' + for_id).prop('checked', false);
                    }
                    else {
                        $(this).css('background-position', 'left -15px');
                        $('#' + for_id).prop('checked', true);
                    }
                    optionChange();
                });
            }
            else if(input_type == 'radio') {
                if(input_checked)
                    gr_input.css('background', 'url(/bitrix/templates/shop_white/private/images/radio_btn.png) left -15px no-repeat');
                else
                    gr_input.css('background', 'url(/bitrix/templates/shop_white/private/images/radio_btn.png) left top no-repeat');
                input_label.click(function(e) {
                    var for_id = $(this).attr('for');
                    var option_group = $('#' + for_id).attr('name');
                    $('input[name=' + option_group + ']').each(function() {
                        var radio_id = $(this).attr('id');
                        $('.' + radio_id).css('background-position', 'left top');
                        $(this).prop('checked', false);
                    });
                    $('.' + for_id).css('background-position', 'left -15px');
                    $('#' + for_id).prop('checked', true);
                    optionChange();
                });
                gr_input.click(function(e) {
                    var for_id = $(this).attr('class');
                    var option_group = $('#' + for_id).attr('name');
                    $('input[name=' + option_group + ']').each(function() {
                        var radio_id = $(this).attr('id');
                        $('.' + radio_id).css('background-position', 'left top');
                        $(this).prop('checked', false);
                    });
                    $('.' + for_id).css('background-position', 'left -15px');
                    $('#' + for_id).prop('checked', true);
                    optionChange();
                });
            }
        });
    });
});
</script>
        <span itemscope itemtype="http://data-vocabulary.org/Product">
        <div class="b_grid grid_level_15px ff_helvetica-neue-light">
            <div class="b_grid_unit-3-4">
                <h1 class="fs_36px"><span itemprop="name"><?=$arResult['NAME']?></span></h1>
                <? if($arResult['PROPERTIES']['PROIZVODITEL']['VALUE']): ?>
                <meta itemprop="brand" content="<?=$arResult['PROPERTIES']['PROIZVODITEL']['VALUE']?>">
                <? else: ?>
                <meta itemprop="brand" content="Apple">
                <? endif ?>
            </div>
            <div class="b_grid_unit-1-4 fs_10px">
                <? /*
                <? if($arResult['SECTION']['UF_SHOW_REVIEWS'] && $arResult['RATING']): ?>
                <div class="margin-bottom_10px ov_rating_cont" itemscope itemtype="http://data-vocabulary.org/Review-aggregate">
                    <div class="product_review margin-top_10px fs_13px ta_left">
                        <meta content="<?=$arResult['DETAIL_PICTURE']['SRC']?>" itemprop="photo">
                        <div class="fs_bold product_review_name" itemprop="rating" itemscope itemtype="http://data-vocabulary.org/Rating">Оценка <span itemprop="itemreviewed"><?=$arResult['RATING_NAME']?></span>: </div>
                        <div class="product_review_rating ta_left"><? for($i=0; $i < 5; $i++): ?><img src="<?=SITE_TEMPLATE_PATH?>/private/images/star_<? if($i < $arResult['RATING_ROUND']): ?>yes<? else: ?>no<? endif ?>.png"><? endfor?></div>
                    </div>
                    <div class="fs_13px">Рейтинг <span class="fs_bold" itemprop="average"><?=$arResult['RATING']?></span> на основе <a class="link_007eb4" href="<?=$arResult['RATING_LINK']?>"><span itemprop="count"><?=$arResult['RATING_COUNT']?></span> отзывов</a></div>
                </div>
                <? endif ?>
                */ ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:asd.share.buttons",
                    "shareProduct",
                    Array(
                        "ASD_ID" => $arResult['ID'],
                        "ASD_TITLE" => $arResult['NAME'],
                        "ASD_URL" => '/detail/?ELEMENT_ID=' . $arResult['ID'],
                        "ASD_PICTURE" => $arResult['DETAIL_PICTURE']['SRC'],
                        "ASD_TEXT" => $arResult['PREVIEW_TEXT'],
                        "ASD_LINK_TITLE" => "Поделиться в #SERVICE#",
                        "ASD_SITE_NAME" => "",
                        "ASD_INCLUDE_SCRIPTS" => ""
                    ),
                false
                );
                ?>
            <? if(!empty($arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'])){ ?><div style='float:right;margin:10px 15px 0px 0px;font-size:16px;' class='element_artikul'>Артикул товара: <?=$arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></div><? } ?>
            </div>
        </div>
        <div class="b_grid_level grid_level_15px ff_helvetica-neue-light">
            <div class="b_grid_unit-1-2 ta_center">
            <? if(is_array($arResult['DETAIL_PICTURE'])):?>
                <div id="main-img-container">
<?php
$lteCategories = [];
$lteRegexp = '/^(' .
             'ipad\-5\/[^\/]+\/wifi_4g' .
             '|' .
             'ipad\-pro\/[^\/]+\/cellular' .
             '|' .
             'ipad\-mini4\/[^\/]+\/wi\-fi\-4g' .
             '|' .
             'ipad\-mini\-2\-retina\/[^\/]+\/wi\-fi\-4g' .
             '|' .
             'iphone\-5c\/(8|16|32)gb\/\w+' .
             '|' .
             'iphone\-5s\/(vip\/(color\/)?)?(16|32|64)gb\/\w+' .
             ')/is';
?>
                    <?php if (in_array($arResult['IBLOCK_SECTION_ID'], $lteCategories) || preg_match($lteRegexp, $arResult['PROPERTIES']['CML2_CODE']['VALUE'])): ?>
                    <div class='lte_on_img'><a href='/lte/'><img src='/images/lte.png'></a></div>
                    <?php endif; ?>

                    <a id="fancy-box-phantom" rel="" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" data-id="0">
                        <img id="main-img" itemprop="image" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" style="max-width: 400px; max-height: 400px;" alt="<?=$arResult['NAME']?>">
                    </a>
                    <img id="loading-process" src="/bitrix/templates/shop_white/private/images/loading-process.gif" />
                    <? //if ($USER->IsAdmin()) ?>
                    <? if($arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']): ?>
                        <div id='video-btn-container'>
                            <a href='#' onclick='$.fancybox("<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/<?=$arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']?>\" frameborder=\"0\" allowfullscreen></iframe>"); return false;'>
                                <img src='/images/video_btn.png'>
                            </a>
                        </div>
                        <?/*        <iframe width="560" height="315" src="//www.youtube.com/embed/<?=$arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']?>" frameborder="0" allowfullscreen></iframe> */?>

                    <? endif ?>
                </div>
                <? /* <img itemprop="image" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" width="<?=$arResult['DETAIL_PICTURE']['WIDTH']?>" height="<?=$arResult['DETAIL_PICTURE']['HEIGHT']?>" alt="<?=$arResult['NAME']?>"> */ ?>
            <? endif ?>
            <? // if ($USER->IsAdmin()): ?>
            <?  if ($arResult["ARR_IMAGES"]["VALUE"]): ?>
                <div id="img-preview-selector">
                    <a class="grouped_elements" rel="group1" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>">
                        <img itemprop="image" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" style="max-width:70px; max-height: 100px" alt="<?=$arResult['NAME']?>">
                    </a>
                    <?  $iCounter = 0;
                        foreach($arResult["ARR_IMAGES"]["VALUE"] as $imgCode):
                            if(4 < ++$iCounter)
                                break;
                    ?>
                        <?$renderImage = CFile::ResizeImageGet($imgCode, array("width" => 70, "height" => 100));?>
                        <? /* <a class="grouped_elements" rel="group1" href="<?=$renderImage['src']?>"> */ ?>
                            <?=CFile::ShowImage($renderImage['src'], 70, 100, "imgcode='". $imgCode . "' class='img_showed'", "", false);?>
                        <? /* </a> */ ?>
                    <? endforeach; ?>
                </div>
                <div id="img-preview-selector-hidden"></div>
                <div id="img-preview-selector-border"></div>
            <?   endif;   ?>
            <? if(preg_match('/apple iphone 5S/is',$arResult['NAME'])): ?>
                <br><br><br><br><a href='/show_news_obzor_apple_iphone_5s.html' target="_blank"><img src='/images/read_review_button.png' alt='Обзор iPhone 5s'></a>
            <? elseif(preg_match('/apple iphone 5C/is',$arResult['NAME'])): ?>
                <br><br><br><br><a href='/show_news_obzor-iphone-5c.html' target="_blank"><img src='/images/read_review_button.png' alt='Обзор iPhone 5C'></a>
            <? elseif(preg_match('/apple iphone 6 plus/is',$arResult['NAME'])): ?>
                    <br><br><br><br><a href='/show_news_iphone6_plus.html' target="_blank"><img src='/images/read_review_button.png' alt='Обзор iPhone 6 Plus'></a>
            <? elseif(preg_match('/apple iphone 6/is',$arResult['NAME'])): ?>
                    <br><br><br><br><a href='/show_news_iphone6.html' target="_blank"><img src='/images/read_review_button.png' alt='Обзор iPhone 6'></a>
            <? elseif('gadgets/sport/action_camera/GoPro' == $arResult['SECTION']['CODE']): ?>
                    <br><br><br><br><a href='/show_news_gopro.html' target="_blank"><img src='/images/read_review_button.png' alt='Обзор камер GoPro'></a>
            <? endif ?>
            </div>
            <div class="b_grid_unit-1-2">
                <div class="b_grid_level">
                    <div class="b_grid_unit-1">
                    <?if($arResult['CAN_BUY']):?>
                        <span itemprop="offerDetails" itemscope itemtype="http://data-vocabulary.org/Offer">
                            <meta itemprop="currency" content="RUR">
                            <? if($arResult['PRICES']['Продажа']['VALUE'] > $arResult['PRICES']['Продажа']['DISCOUNT_VALUE']):?>
                            <span class="fs_14px">Цена:</span> <span class="color_259ccf fs_36px" id="elementPrice">
<span itemprop="price" style="color:Red;"><?=$arResult['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE']?></span>
<span itemprop="old_price" style="text-decoration:line-through;"><?=$arResult['PRICES']['Продажа']['PRINT_VALUE']?></span>
                            </span>
                            <? elseif($arResult['PRICES']['Продажа']['PRINT_VALUE']):?>
                            <span class="fs_14px">Цена:</span> <span class="color_259ccf fs_36px" id="elementPrice"><span itemprop="price"><?=$arResult['PRICES']['Продажа']['PRINT_VALUE']?></span></span>
                            <? endif ?>
                            <? // <br><span style='font-size:24px;'><br>Товар ожидается<br><br></span> ?>
                        </span>
                    <? endif; ?>
                    <!--</div>
                    <div class="b_grid_unit-1-3 ta_right fs_10px">-->
                        <?if($arResult['CAN_BUY']):?>
                        <div class="margin-top_10px">
                            <span itemprop="availability"content="in_stock"></span>
                            <? if(count($arResult["SECTION"]["OPTIONS"])):?>
                                <div class="color_black fs_14px fs_bold margin-bottom_5px">Дополнительные услуги</div>
                            <? endif ?>
                            <? foreach($arResult["SECTION"]["OPTIONS"] as $optionGroup): ?>
                                <? if(!empty($optionGroup["ITEMS"])): ?>
                                <div class="option_group">
                                        <? if($optionGroup['ID'] == '228' || $optionGroup['ID'] == '304'):?>
                                            <a href="/inet" target="_blank" class="option_additional_link">подробнее о тарифах</a>
                                        <? endif;?>
                                        <? /*if($optionGroup['ID'] == '5902'):?>
                                            <a href="/tariff" class="option_additional_link">подробнее о тарифах</a>
                                        <? endif;*/?>
                                        <?
                                        $someComment = false;

//                                        if($optionGroup['ID'] == '423' || $optionGroup['ID'] == '420' || $optionGroup['ID'] == '421' || $optionGroup['ID'] == '458')
                                        if($optionGroup['NAME'] == 'Сим-карта в подарок')
                                                $someComment = '<a href="/tariff" target="_blank" class="option_additional_comment">выбрать красивый номер</a>';
                                        if($optionGroup['NAME'] == 'Гарнитура')
                                                $someComment = '<a href="/brands/sony/headset" target="_blank" class="option_additional_comment">выбрать цвет гарнитуры</a>';

                                        ?>
                                        <? if(count($optionGroup["ITEMS"]) > 1): ?>
                                            <div class="option_radio_title"><span class="color_black fs_14px"><?=$optionGroup['NAME']?>:</span>
                                                <? if($optionGroup['NAME'] == 'Комплекты со скидкой'):?>
                                                  <? if(  $arResult['SECTION']['ID'] == 261
                                                       || $arResult['SECTION']['ID'] == 263
                                                       || $arResult['SECTION']['ID'] == 377
                                                       ):?>
                                                    (<a href="/iphone-6/accessories/set" target="_blank" class="option_additional_comment">подробнее</a>)
                                                  <? endif ?>
                                                  <? if(  $arResult['SECTION']['ID'] == 385
                                                       || $arResult['SECTION']['ID'] == 386
                                                       || $arResult['SECTION']['ID'] == 387
                                                       || $arResult['SECTION']['ID'] == 384
                                                       ):?>
                                                    (<a href="/iphone-6-plus/accessories/set" target="_blank" class="option_additional_comment">подробнее</a>)
                                                  <? endif ?>
                                                <? endif ?>
                                            </div>
                                            <div class="option_radio_group">
                                                <div class="option_input option_input_radio"><input checked="checked" type="radio" id="option_<?=$optionGroup['ID']?>_0" value="0" name="opiton_<?=$optionGroup['ID']?>" data-price="0"></div>
                                                <div class="option_name_radio"><label class="option_label" for="option_<?=$optionGroup['ID']?>_0"><span class="color_black fs_14px">не требуется</span></label></div>
                                            </div>
                                            <? foreach($optionGroup["ITEMS"] as $option): ?>
                                            <div class="option_radio_group">
                                                <div class="option_input option_input_radio"><input type="radio" id="option_<?=$option['ID']?>" value="<?=$option['ID']?>" name="opiton_<?=$optionGroup['ID']?>" data-price="<?=round($option['CATALOG_PRICE_1'])?>"></div>
                                                <div class="option_name_radio"><label class="option_label" for="option_<?=$option['ID']?>"><span class="color_black fs_14px"><?=$option['NAME']?></span></label> <? if($option['CATALOG_PRICE_1'] > 0):?>(<span class="color_79b70d"><?=$option['PRICES']['Продажа']['PRINT_VALUE_VAT']?></span>)<? else: ?>(<span class="color_79b70d">бесплатно</span>)<? endif ?></div>
                                            </div>
                                            <? endforeach ?>
                                        <? elseif(count($optionGroup["ITEMS"]) == 1):?>
                                            <? $option = $optionGroup["ITEMS"][0];
                                               if($option['CATALOG_PRICE_1'] == 0 && $someComment == false) $someComment = 'бесплатно';
                                            ?>
                                            <div class="option_input option_input_checkbox"><input type="checkbox" id="option_<?=$option['ID']?>" value="<?=$option['ID']?>" name="opiton_<?=$optionGroup['ID']?>" data-price="<?=round($option['CATALOG_PRICE_1'])?>"></div>
                                            <div class="option_name_checkbox"><label class="option_label" for="option_<?=$option['ID']?>"><span class="color_black fs_14px"><?=$optionGroup['NAME']?></span></label> <? if($option['CATALOG_PRICE_1'] > 0):?>(<span class="color_79b70d"><?=$option['PRICES']['Продажа']['PRINT_VALUE_VAT']?></span>)&nbsp;<? endif; ?><? if ($someComment): ?>(<span class="color_79b70d"><?=$someComment?></span>)<? endif ?>
                                            <? if(  $arResult['SECTION']['ID'] == 502 // Apple Watch
                                                 || $arResult['SECTION']['ID'] == 503 // Apple Watch Edition
                                                 || $arResult['SECTION']['ID'] == 504 // Apple Watch Sport
                                                 ):
                                            ?>
                                              <? if ($optionGroup['ID'] == 889 // Чехол от
                                                    ):
                                              ?>
                                                (<a href="/gadgets/watch/iwatch/accessories/cases" target="_blank" class="option_additional_comment">подробнее</a>)
                                              <? endif ?>
                                              <? if ($optionGroup['ID'] == 888 // Сменный ремешок от
                                                    ):
                                              ?>
                                                (<a href="/gadgets/watch/iwatch/accessories/bands" target="_blank" class="option_additional_comment">подробнее</a>)
                                              <? endif ?>
                                            <? endif ?>
                                            <?// if(  $arResult['SECTION']['IBLOCK_SECTION_ID'] == 182 // MacBook Air
                                              //   || $arResult['SECTION']['IBLOCK_SECTION_ID'] == 181 // MacBook Pro Retina
                                              //   ):
                                            ?>
                                              <? if ($optionGroup['ID'] == 923 // Чехол от MacBook Air
                                                    ):
                                              ?>
                                                (<a href="/macbook/cases/air" target="_blank" class="option_additional_comment">подробнее</a>)
                                              <? endif ?>
                                              <? if ($optionGroup['ID'] == 927 // Чехол от MacBook Pro Retina
                                                    ):
                                              ?>
                                                (<a href="/macbook/cases/pro_retina" target="_blank" class="option_additional_comment">подробнее</a>)
                                              <? endif ?>
                                              <? if ($optionGroup['ID'] == 891 // Чехол от MacBook 12
                                                    ):
                                              ?>
                                                (<a href="/macbook/12/macbook/cases" target="_blank" class="option_additional_comment">подробнее</a>)
                                              <? endif ?>
                                            <? // endif ?>
                                            </div>
                                        <? endif ?>
                                </div>
                                <? endif ?>
                            <? endforeach ?>
                        <? /*else: ?>
                            <? foreach($arResult["SECTION"]["OPTIONS"] as $optionGroup): ?>
                                <? if(!empty($optionGroup["ITEMS"])): ?>
                                <div class="margin-bottom_5px">
                                    <span class="color_black fs_14px"><?=$optionGroup['NAME']?>:</span>
                                    <div class="b_select-styled">
                                        <select data-group="<?=$optionGroup['ID']?>" class="b_select-styled_select product_options">
                                            <option value="0" data-price="0" class="b_select-styled_option">Не требуется</option>
                                            <? foreach($optionGroup["ITEMS"] as $option): ?>
                                            <option value="<?=$option['ID']?>" data-price="<?=round($option['CATALOG_PRICE_1'])?>" class="b_select-styled_option"><?=$option['NAME']?></option>
                                            <? endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <? endif ?>
                            <? endforeach ?>
                        <? endif*/ ?>
                        <? /*
                        <? foreach($arResult['SERVICE_LIST']['SECTIONS'] as $serviceSection): ?>
                            <div class="margin-top_5px">
                                <span class="color_black fs_14px"><?=$serviceSection['NAME']?>:</span>
                                <div class="b_select-styled">
                                    <select data-service="<?=$serviceSection['ID']?>" class="b_select-styled_select additional_service">
                                        <option value="0" data-price="0" class="b_select-styled_option">Не требуется</option>
                                        <? foreach($arResult['SERVICE_LIST']['SERVICES'][$serviceSection['ID']] as $service): ?>
                                        <option value="<?=$service['ID']?>" data-price="<?=round($service['CATALOG_PRICE_1'])?>" class="b_select-styled_option"><?=$service['PROPERTY_LIST_NAME_VALUE']?></option>
                                        <? endforeach ?>
                                    </select>
                                </div>
                            </div>
                        <? endforeach ?>
                        */ ?>
                        </div>
                        <? if($arResult['SECTION']['UF_BUY_DISABLE']): ?>
                        <a class="b_button-buy button-buy_preorder no-style-link" id="addElementLink" href="<?=$arResult['ADD_URL']?>&preorder=Y"></a>
                        <? else: ?>
                        <a class="b_button-buy button-buy_buy no-style-link" id="addElementLink" href="<?=$arResult['ADD_URL']?>" onclick="ga('send', 'event', 'Acc window', 'Open', '');"></a>
                        <? if(false): ?>
                            <a class="b_button-buy button-buy_buy-credit no-style-link" id="addElementCreditLink" href="<?=$arResult['ADD_URL']?>&credit=Y"></a>
                        <? endif;?>
                        <a class="b_button-buy button-buy_buy-one-click no-style-link" id="oneClickBuyLink" data-buyid="<?=$arResult["ID"]?>" href="<?=$arResult['ADD_URL']?>"></a>
                        <? endif ?>
                        <? else: ?>
                        <span itemprop="availability" content="out_of_stock"></span>
                            <? //if($USER->IsAdmin()): ?>
                                <?  /* <a class="b_button-buy button-buy_buy no-style-link" id="addElementLink" href="<?=$arResult['ADD_URL']?>" onclick="_gaq.push(['_trackEvent', 'Acc window', 'Open', '']);"></a> */ ?>
                                <a class="b_button-buy button-buy_preorder no-style-link" id="addElementPreorderLink" data-buyid="<?=$arResult["ID"]?>" href="#"></a>
                                <?  /* <a class="b_button-buy button-buy_buy-one-click no-style-link" id="oneClickBuyLink" data-buyid="<?=$arResult["ID"]?>" href="<?=$arResult['ADD_URL']?>"></a> */ ?>
                            <? //endif;?>
                        <? endif ?>
                        <? /*
                        <div class="ff_helvetica-neue-bold ta_center margin-top_10px">
                            <? /*if($arResult['CAN_BUY']):?>
                            <span class="color_79b70d fs_14px">Есть в наличии</span>
                            <? else: ?>
                            <span class="color_79b70d fs_14px">Нет в наличии</span>
                            <? endif
                        </div> */?>
                    </div>
                </div>

                <? if($arResult['OTHER_COLORS']){ ?>

                <div class="element_other_colors">
                    В других цветах:
                    <? foreach($arResult['OTHER_COLORS'] as $other_color){
                        $color='';
                        $secondcolor='';
                        $color_name=$other_color['NAME'];

                        foreach($arResult['colors_hex'] as $cname=>$hex){

                            if(preg_match('/'.mb_strtolower($cname).'/is', mb_strtolower($other_color['NAME']))){
                                if(empty($color)){
                                    $color=$hex;
                                }else{
                                    $secondcolor=$hex;
                                }
                            }
                        }
                    ?>
                        <a title='<?=$color_name;?>' class="element_other_color_one" style='background:<?=$color;?>' href='/<?=$other_color['PROPERTY_CML2_CODE_VALUE'];?>'><span style='background:<?=$secondcolor;?>' class='element_other_color_one_two'></span></a>
                    <? } ?>
                </div>
                <? } ?>
                <? //var_dump($arResult['SECTION']['ID']); ?>
                <?
                //var_dump($arResult["ELEMENT_ID"]);
                //$obj_res = CIBlockSection::GetList(array () , array("IBLOCK_ID"=>8,"ELEMENT_ID"=>$arResult["ELEMENT_ID"]), false);
                $obj_res = CIBlockElement::GetElementGroups($arResult["ELEMENT_ID"], true,  array("IBLOCK_ID"=>8) );
/*
                if ( $parent_id = $obj_res->GetNext() )

                    var_dump($parent_id); // Вот вам и id родителя
                else
                    echo 'QQ';
//die;*/
                //var_dump($arResult)?>
                <? if(!empty($arResult['SECTION']['INFO']['UF_BONUS'])): ?>
                <div class="b_grid_level">
                    <span class="color_black fs_14px">При покупке <?=$arResult['SECTION']['NAME']?> в магазине<br> Up-House Вы получаете:</span>
                </div>
                <div class="b_grid_level grid_level_10px fs_14px">
                    <div class="b_grid_unit-11-24">
                    <? foreach($arResult['SECTION']['INFO']['UF_BONUS'] as $key => $bonus): ?>
                        <?if ($arResult['SECTION']['BONUS'][$bonus]['XML_ID'] != 'counsult'):?>
                            <div class="b_glyphed-block glyphed-block_<?=$arResult['SECTION']['BONUS'][$bonus]['XML_ID']?>"><div><?=$arResult['SECTION']['BONUS'][$bonus]['VALUE']?></div></div>
                        <? else: ?>
                            <? /* <a href="#" onclick="$('#jivo-label').click(); return false;"> */ ?>
                                <div class="b_glyphed-block glyphed-block_<?=$arResult['SECTION']['BONUS'][$bonus]['XML_ID']?>"><div><?=htmlspecialchars_decode($arResult['SECTION']['BONUS'][$bonus]['VALUE'])?></div></div>
                            <? /* </a> */?>
                        <? endif;?>
                        <? if($key == 2): ?>
                    </div>
                    <? /*<div class="b_grid_unit-1-12">
                    </div> */ ?>
                    <div class="b_grid_unit-11-24">
                        <? endif ?>
                    <? endforeach ?>
                    </div>
                </div>
                <? endif ?>

                <div id="delivery_block_place"></div>
                <? //if($USER->IsAdmin()):?>
                <?
/*                    $APPLICATION->IncludeComponent("altasib:altasib.geoip",
                        "deliveryInfo",
                        array(
                            'CACHE_TIME' => 0,
                            'CACHE_TYPE' => 'N',
                            'DELIVERY' => $arResult["DELIVERY"]
                        ),
                        false);
                /*
                $APPLICATION->IncludeComponent(
                    "apple-house:sale.ajax.locations",
                    "deliveryInfo",
                    array(
                        "AJAX_CALL" => "N",
                        "COUNTRY" => '4',
                        "CITY" => $arResult['USER_REGION_ID'],
                        "COUNTRY_INPUT_NAME" => "COUNTRY_tmp",
                        "REGION_INPUT_NAME" => "REGION_tmp",
                        "CITY_INPUT_NAME" => $arResult["ORDER_PROP"]["USER_PROPS_Y"][$cityFieldId]["FIELD_NAME"], //"CITY_ID",
                        "CITY_OUT_LOCATION" => "Y",
                        "LOCATION_VALUE" => "",
                        "ONCITYCHANGE" => "submitForm()",
                    ),
                    null,
                    array('HIDE_ICONS' => 'Y')
                );
                */
                ?>
                <? //endif;?>

            </div>
        </div>
        <div class="b_grid_level lh_1-7" style="margin-bottom: 10px"><?=$arResult['PREVIEW_TEXT']?></div>
        </span>
    </div>
<div class="b_grid">

    <? /* <div class="b_grid_unit-17-24 b_grid_unit-right"> */ ?>
    <div class="b_grid_unit-right">
        <div class="b_tabs">
            <ul class="b_tabs_menu">
                <? if(empty($arResult['DETAIL_TEXT'])): ?>
                <li class="b_tabs_menu-item">
                    <a class="b_tabs_link" href="#features">
                        Характеристики
                    </a>
                </li>
                <? endif; ?>

                <? if($arResult['DETAIL_TEXT'] || $arResult['SEO_TEXT']): ?>
                <li class="b_tabs_menu-item tabs_menu-item_active">
                    <a class="b_tabs_link" href="#model-description">
                        Описание модели
                    </a>
                </li>
                <? endif ?>
                <? if(!empty($arResult['DETAIL_TEXT'])): ?>
                <li class="b_tabs_menu-item">
                    <a class="b_tabs_link" href="#features">
                        Характеристики
                    </a>
                </li>
                <? endif; ?>

                <? if($arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']): ?>
                <li class="b_tabs_menu-item">
                    <a class="b_tabs_link" href="#video-overview">
                        Видео обзор
                    </a>
                </li>
                <? endif ?>
                <li class="b_tabs_menu-item">
                    <a class="b_tabs_link" href="#reviews">
                        Отзывы
                    </a>
                </li>
                <?  //if ($USER->IsAdmin()): ?>
                <li class="b_tabs_menu-item">
                    <a class="b_tabs_link" href="#accessories">
                        Аксессуары
                    </a>
                </li>
                <? //endif; ?>
            </ul>
            <script>
                $(document).ready(function(){
                    $('#features').delay(100).css('display','block').show();
                    //alert($('#features').delay(1000).css('display'));
                });
            </script>
            <div class="b_tabs_contents-container" >
                <div class="b_tabs_content" id="model-description">
                    <? if($arResult['DETAIL_TEXT']): ?>
                        <div class="b_grid margin-top_20px">
                            <?=$arResult['DETAIL_TEXT']?>
                        </div>
                    <? endif ?>
                    <? if($arResult['SEO_TEXT']): ?>
                        <div class="b_grid margin-top_20px">
                        <?=$arResult['SEO_TEXT']?>
                        </div>
                    <? endif ?>
                    <? if(preg_match('/apple iphone 5S/is',$arResult['NAME'])): ?>
                    <br><a href='/show_news_obzor_apple_iphone_5s.html'><img src='/images/read_review_button.png'></a>
                <? endif ?>
                </div>

                <div class="b_tabs_content" id="features" style='display:block'>
                    <div class="b_grid">
                        <table class="b_goods-features-table">
                        <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['OVERALL'])): ?>
                            <tr class="b_goods-features-table_row">
                                <td class="b_goods-features-table_col b_goods-features-table_head" colspan=2>Общие характеристики</td>
                            </tr>
                            <? foreach($arResult["PROP_GROUP_DISPLAY"]['OVERALL'] as $prop): ?>
                                <tr class="b_goods-features-table_row">
                                    <td class="b_goods-features-table_col b_goods-features-table_charname"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
                                </tr>
                            <? endforeach ?>
                        <? endif ?>
                        <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['MULTIMEDIA'])): ?>
                                <tr class="b_goods-features-table_row">
                                    <td class="b_goods-features-table_col b_goods-features-table_head" colspan=2>Мультимедийные возможности</td>
                                </tr>
                                <? foreach($arResult["PROP_GROUP_DISPLAY"]['MULTIMEDIA'] as $prop): ?>
                                    <tr class="b_goods-features-table_row">
                                        <td class="b_goods-features-table_col b_goods-features-table_charname"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
                                    </tr>
                                <? endforeach ?>
                        <? endif ?>
                        <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['CONNECT'])): ?>
                                <tr class="b_goods-features-table_row">
                                    <td class="b_goods-features-table_col b_goods-features-table_head" colspan=2>Связь</td>
                                </tr>
                                <? foreach($arResult["PROP_GROUP_DISPLAY"]['CONNECT'] as $prop): ?>
                                    <tr class="b_goods-features-table_row">
                                        <td class="b_goods-features-table_col b_goods-features-table_charname"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
                                    </tr>
                                <? endforeach ?>
                        <? endif ?>
                        <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['PROC_RAM'])): ?>
                                <tr class="b_goods-features-table_row">
                                    <td class="b_goods-features-table_col b_goods-features-table_head" colspan=2>Память и процессор</td>
                                </tr>
                                <? foreach($arResult["PROP_GROUP_DISPLAY"]['PROC_RAM'] as $prop): ?>
                                    <tr class="b_goods-features-table_row">
                                        <td class="b_goods-features-table_col b_goods-features-table_charname"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
                                    </tr>
                                <? endforeach ?>
                        <? endif ?>
                        <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['STORAGE'])): ?>
                                <tr class="b_goods-features-table_row">
                                    <td class="b_goods-features-table_col b_goods-features-table_head" colspan=2>Накопители</td>
                                </tr>
                                <? foreach($arResult["PROP_GROUP_DISPLAY"]['STORAGE'] as $prop): ?>
                                    <tr class="b_goods-features-table_row">
                                        <td class="b_goods-features-table_col b_goods-features-table_charname"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
                                    </tr>
                                <? endforeach ?>
                        <? endif ?>
                        <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['AUDIO'])): ?>
                                <tr class="b_goods-features-table_row">
                                    <td class="b_goods-features-table_col b_goods-features-table_head" colspan=2>Аудио</td>
                                </tr>
                                <? foreach($arResult["PROP_GROUP_DISPLAY"]['AUDIO'] as $prop): ?>
                                    <tr class="b_goods-features-table_row">
                                        <td class="b_goods-features-table_col b_goods-features-table_charname"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
                                    </tr>
                                <? endforeach ?>
                        <? endif ?>
                        <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['POWER'])): ?>
                                <tr class="b_goods-features-table_row">
                                    <td class="b_goods-features-table_col b_goods-features-table_head" colspan=2>Питание</td>
                                </tr>
                                <? foreach($arResult["PROP_GROUP_DISPLAY"]['POWER'] as $prop): ?>
                                    <tr class="b_goods-features-table_row">
                                        <td class="b_goods-features-table_col b_goods-features-table_charname"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
                                    </tr>
                                <? endforeach ?>
                        <? endif ?>
                        </table>
                    </div>
                </div>


                <? if($arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']): ?>
                <div class="b_tabs_content" id="video-overview">
                    <div class="margin-top_20px">
                    <iframe width="560" height="315" src="//www.youtube.com/embed/<?=$arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <? endif ?>



                <div class="b_tabs_content" id="reviews">
                    <div class="b_grid_level">
                        <? if($arResult['SECTION']['UF_SHOW_REVIEWS'] && $arResult['RATING']): ?>
                            <div class="b_grid" itemscope itemtype="http://data-vocabulary.org/Review-aggregate">
                                <div class="b_grid_unit-1-2">
                                    <div class="product_review margin-top_10px fs_13px ta_left">
                                        <meta content="<?=$arResult['DETAIL_PICTURE']['SRC']?>" itemprop="photo">
                                        <div class="fs_bold product_review_name" itemprop="rating" itemscope itemtype="http://data-vocabulary.org/Rating">Оценка <span itemprop="itemreviewed"><?=$arResult['RATING_NAME']?></span>: </div>
                                        <div class="product_review_rating ta_left"><? for($i=0; $i < 5; $i++): ?><img src="<?=SITE_TEMPLATE_PATH?>/private/images/star_<? if($i < $arResult['RATING_ROUND']): ?>yes<? else: ?>no<? endif ?>.png"><? endfor?></div>
                                    </div>
                                </div>
                                <div class="b_grid_unit-1-2 ta_right">
                                    <div class="fs_13px margin-top_10px">Рейтинг <span class="fs_bold" itemprop="average"><?=$arResult['RATING']?></span> на основе <a class="link_007eb4" href="<?=$arResult['RATING_LINK']?>"><span itemprop="count"><?=$arResult['RATING_COUNT']?></span> отзывов</a></div>
                                </div>
                            </div>
                        <? endif ?>
                        <?  $APPLICATION->IncludeComponent(
                            "apple-house:catalog.reviews",
                            "",
                            Array(
                                "IBLOCK_CAT_TYPE" => "1c_catalog",
                                "IBLOCK_CAT_ID" => "8",
                                "IBLOCK_REVIEW_TYPE" => "services",
                                "IBLOCK_REVIEW_ID" => "13",
                                "ALLOW_ADD" => "N",
                                "DISPLAY_MODE" => "element"
                            ),
                        false
                        ); ?>
                    </div>
                </div>

                <? // var_dump($arResult["DETAIL_PICTURE"]);//if ($USER->IsAdmin()): ?>
                    <div class="b_tabs_content" id="accessories">
                        <div class="b_grid">
                            <?  $APPLICATION->IncludeComponent("apple-house:sale.recommended.products", ".default", Array(
                                    "IBLOCK_TYPE" => '1c_catalog',
                                    "IBLOCK_ID" => 8,
                                    "ID" => $arResult["ID"],    // Идентификатор товара
                                    "MIN_BUYES" => "1",    // Минимальное количество покупок товара
                                    "DETAIL_URL" => $arResult["DETAIL_PICTURE"],    // URL, ведущий на страницу с содержимым элемента
                                    "BASKET_URL" => "/personal/basket.php",    // URL, ведущий на страницу с корзиной покупателя
                                    "ACTION_VARIABLE" => "action",    // Название переменной, в которой передается действие
                                    "PRODUCT_ID_VARIABLE" => "id",    // Название переменной, в которой передается код товара для покупки
                                    "ELEMENT_COUNT" => "10",    // Количество элементов для отображения
                                    "LINE_ELEMENT_COUNT" => "10",    // Количество элементов выводимых в одной строке таблицы
                                    "LINE_VISIBLE_ELEMENT_COUNT" => "5",    // Количество видимых элементов выводимых -1
                                    "PRICE_CODE" => array(),    // Тип цены
                                    "USE_PRICE_COUNT" => "Y",    // Использовать вывод цен с диапазонами
                                    "SHOW_PRICE_COUNT" => "1",    // Выводить цены для количества
                                    "PRICE_VAT_INCLUDE" => "Y",    // Включать НДС в цену
                                    "CACHE_TYPE" => "A",    // Тип кеширования
                                    "CACHE_TIME" => "3600",    // Время кеширования (сек.)
                                    "CONVERT_CURRENCY" => "Y",    // Показывать цены в одной валюте
                                    "CURRENCY_ID" => "RUB",    // Валюта, в которую будут сконвертированы цены
                                ),
                                false
                            );  ?>
                        </div>
                    </div>
                <? //endif; ?>


            </div>

        </div>
        <?  if(!empty($arResult['SIMILAR']) || !empty($arResult['COLOR_ADDITIONAL'])): ?>
            <div class="similar_prods">
                <? if(!empty($arResult['SIMILAR'])): ?>
                    <div class="b_tabs_header">Похожие товары</div>
                    <div class="background_f3 padding_10px">
                        <div class="b_grid_level lh_1-7">
                            <div class="padding-bottom-top_5px">
                                <? /*<ul class="padding-left_15px"> */ ?>
                                <ul class="simlinks_list">
                                    <? $iCounter = 0;
                                    foreach($arResult['SIMILAR'] as $similar): ?>
                                        <?$arrPrice = CPrice::GetBasePrice($similar["ID"]);
                                            if($arrPrice['PRICE'] == 0)
                                                continue;

                                            if(5 < ++$iCounter)
                                                break;
                                        ?>
                                        <li class="similar_links">
                                            <a class="link_007eb4 link_img" href="/<?=$similar['PROPERTY_CML2_CODE_VALUE']?>">
                                                <img src="<?=CFile::GetPath($similar["PREVIEW_PICTURE"])?>" title="<?=$similar['NAME']?>" alt="<?=$similar['NAME']?>">
                                            </a>

                                            <a class="link_007eb4 link_name" href="/<?=$similar['PROPERTY_CML2_CODE_VALUE']?>">
                                                <?=$similar['NAME']?>
                                            </a>
                                            <span class="catalog-price"><?=number_format($arrPrice['PRICE'], 0, '', ' ')?> руб.</span>
                                            <?//var_dump($similar); die;?></li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <? endif  ?>

            </div>
        <? endif  ?>
    </div>
</div>
