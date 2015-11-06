<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

    <!-- bufferig out in header -->
<?$this->SetViewTarget("submenu_catalog");?>
    <div class="row">
        <div class="col-xs-12">
            <?//$firstSectionCode=explode("/",$APPLICATION->GetCurPage());?>

            <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","",
                Array(
                    "VIEW_MODE" => "TEXT",
                    "SHOW_PARENT_NAME" => "Y",
                    "IBLOCK_TYPE" => "1c_catalog",
                    "IBLOCK_ID" => "8",
                    "SECTION_ID" => "",
                    "SECTION_CODE" => "",//$firstSectionCode[1],
                    "SECTION_URL" => "",
                    "COUNT_ELEMENTS" => "Y",
                    "TOP_DEPTH" => "3",
                    "SECTION_FIELDS" => "",
                    "SECTION_USER_FIELDS" => "",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_NOTES" => "",
                    "CACHE_GROUPS" => "Y",
                    "CARUSEL_CODE" => $arResult['SECTION']['PATH'][0]["CODE"],
                    "CUR_CODE" => $arResult['SECTION']['PATH'][1]["CODE"],
                    "DETAIL_PAGE" => "Y"
                )
            );?>
        </div>
    </div>
<?$this->EndViewTarget();?>


    <!-- страница карточка товара -->
    <div id="page-product-info">

    <!-- верхний блок карточки товара -->
    <div class="main-shadow">
        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <a href="/" class="breadcrumbs-item">Главная</a>
            <?foreach($arResult['SECTION']['PATH'] as $path):?>
            <a href="/<?=$path["CODE"]?>" class="breadcrumbs-item"><?=$path["NAME"]?></a>
            <?endforeach;?>
            <div class="breadcrumbs-item"><?=$arResult['NAME']?></div>
        </div>
        <!-- /breadcrumbs -->

        <section class="product-info">
            <div class="clearfix mb-3">
                <div class="pull-left">
                    <h1 class="product-title entry-title"><?=$arResult['NAME']?></h1>
                </div>

                <div class="pull-right">
                    <!-- социальные иконки -->
                    <div class="social-button">
                        <a href="#" class="social-icon facebook" title="facebook"></a>
                        <a href="#" class="social-icon vk" title="vk"></a>
                        <a href="#" class="social-icon twitter" title="twitter"></a>
                    </div>
                    <!-- /социальные иконки -->
                    <? if(!empty($arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'])):?>
                    <div class="product-article">артикул товара: <span class="article-pr"><?=$arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></span></div>
                    <?endif?>
                </div>
            </div>

            <div class="row">
                <!-- левая колонка -->
                <div class="col-xs-6">


                    <div class="product-info-img" data-id="0" id="fancy-box-phantom">
                        <img id="main-img" itemprop="image" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>" title="<?=$arResult['NAME']?>" />
                    </div>

                    <?  if ($arResult["ARR_IMAGES"]["VALUE"]): ?>
                        <div class="product-thumbnail" rel="group1" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>">
                            <?=CFile::ShowImage($arResult['DETAIL_PICTURE']['SRC'], 70, 70)?>
                        </div>
                        <?  $iCounter = 0; $current=" current";
                        foreach($arResult["ARR_IMAGES"]["VALUE"] as $imgCode):
                            if(5 < ++$iCounter)
                                break;
                            ?>
                            <?$renderImage = CFile::ResizeImageGet($imgCode, array("width" => 70, "height" => 100));?>
                            <?$renderImageFull = CFile::ResizeImageGet($imgCode, array("width" => 400, "height" => 400));?>
                            <div class="product-thumbnail" rel="group1" href="<?=$renderImageFull['src']?>">
                                <img itemprop="image" src="<?=$renderImage['src']?>" alt="<?=$arResult['NAME']?>" title="<?=$arResult['NAME']?>" imgcode="<?=$imgCode?>" />
                            </div>
                            <?//$current="";?>
                        <? endforeach; ?>
                    <? endif ?>
                    <div class="product-thumbnail current"></div>

                    <div class="product-review mt-4">
                        <? if($arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']): ?>
                                <a class="product-button" href='#' onclick='$.fancybox("<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/<?=$arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']?>\" frameborder=\"0\" allowfullscreen></iframe>"); return false;'>
                                    видео обзор<i class="play-icon product-sprite"></i></a>
                        <? endif ?>
                        <? if(preg_match('/apple iphone 5S/is',$arResult['NAME'])): ?>
                            <a href='/show_news_obzor_apple_iphone_5s.html' target="_blank" class="product-button">читать обзор<i class="text-icon product-sprite"></i></a>
                        <? elseif(preg_match('/apple iphone 5C/is',$arResult['NAME'])): ?>
                            <a href='/show_news_obzor-iphone-5c.html' target="_blank" class="product-button">читать обзор<i class="text-icon product-sprite"></i></a>
                        <? elseif(preg_match('/apple iphone 6 plus/is',$arResult['NAME'])): ?>
                            <a href='/show_news_iphone6_plus.html' target="_blank" class="product-button">читать обзор<i class="text-icon product-sprite"></i></a>
                        <? elseif(preg_match('/apple iphone 6/is',$arResult['NAME'])): ?>
                            <a href='/show_news_iphone6.html' target="_blank" class="product-button">читать обзор<i class="text-icon product-sprite"></i></a>
                        <? elseif('gadgets/sport/action_camera/GoPro' == $arResult['SECTION']['CODE']): ?>
                            <a href='/show_news_gopro.html' target="_blank" class="product-button">читать обзор<i class="text-icon product-sprite"></i></a>
                        <? endif ?>
                        <a href="#" class="product-button">инструкция<i class="text-icon product-sprite"></i></a>
                    </div>

                    <div class="accept mt-2">
                        <? if($arResult['OTHER_COLORS']){ ?>

                            <div class="element_other_colors">
                                В других цветах:<br>
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
                                    <div title='<?=$color_name;?>' class="element_other_color_one" style='background:<?=$color;?>' onclick="location.href='/<?=$other_color['PROPERTY_CML2_CODE_VALUE'];?>'" ><div style='background:<?=$secondcolor;?>' class='element_other_color_one_two'></div></div>
                                <? } ?>
                            </div>
                        <? } ?>
                    </div>
                </div>

                <!-- правая колонка -->
                <div class="col-xs-6">

                    <!-- цена -->
                    <div class="price">
                        <div class="price-text">Цена:</div>
                        <? if($arResult['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE']):?>
                        <div class="price-num"><?=str_replace('руб.', '<span class="rub">руб.</span>', $arResult['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE'])?></div>
                        <? elseif($arResult['PRICES']['Продажа']['PRINT_VALUE']):?>
                            <div class="price-num"><?=str_replace('руб.', '<span class="rub">руб.</span>',$arResult['PRICES']['Продажа']['PRINT_VALUE'])?></div>
                        <? endif ?>
                    </div>

<?if($arResult['CAN_BUY']):?>
    <? if(count($arResult["SECTION"]["OPTIONS"])):?>
                    <!-- дополнительные услуги -->
                    <div class="additional-services">
                        <h3 class="additional-services-title">Дополнительные услуги:</h3>
                        <div class="option_group">
        <? foreach($arResult["SECTION"]["OPTIONS"] as $optionGroup): ?>
<!--                        <pre>--><?//print_r($optionGroup)?><!--</pre>-->
            <? if(!empty($optionGroup["ITEMS"])): ?>
                <? if($optionGroup['ID'] == '228' || $optionGroup['ID'] == '304'):?>
                    <a href="/inet" target="_blank" class="option_additional_link">подробнее о тарифах</a>
                <? endif;?>
                <?
                $someComment = false;

                //                                        if($optionGroup['ID'] == '423' || $optionGroup['ID'] == '420' || $optionGroup['ID'] == '421' || $optionGroup['ID'] == '458')
                if($optionGroup['NAME'] == 'Сим-карта в подарок')
                    $someComment = '<a href="/tariff" target="_blank" class="option_additional_comment">выбрать красивый номер</a>';
                if($optionGroup['NAME'] == 'Гарнитура')
                    $someComment = '<a href="/brands/sony/headset" target="_blank" class="option_additional_comment">выбрать цвет гарнитуры</a>';

                ?>
                <? if(count($optionGroup["ITEMS"]) > 1): ?>
                    <div class="additional-services-item clearfix">
                        <div class="input-checkbox">
                            <input type="checkbox" value="None" id="input-checkbox-<?=$optionGroup["ID"]?>" name="PROP_<?=$optionGroup["ID"]?>" checked="checked" disabled/>
                            <label for="input-checkbox-<?=$optionGroup["ID"]?>"></label>
                        </div>
                        <div class="additional-services-text"><?=$optionGroup["NAME"]?></div>
                    </div>
                    <div style="padding-left: 23px" class="group-radio">
                        <div class="additional-services-item clearfix">
                            <div class="input-checkbox">
                                <input type="checkbox" value="None" id="input-checkbox-no-<?=$optionGroup["ID"]?>" name="NO_PROP_<?=$optionGroup["ID"]?>" checked="checked"/>
                                <label for="input-checkbox-no-<?=$optionGroup["ID"]?>"></label>
                            </div>
                            <div class="additional-services-text">не требуется</div>
                        </div>
                        <?foreach($optionGroup["ITEMS"] as $item):?>
                            <div class="additional-services-item clearfix">
                                <div class="input-checkbox">
                                    <input type="checkbox" value="None" id="input-checkbox-<?=$item["ID"]?>" name="PROP_<?=$item["ID"]?>" />
                                    <label for="input-checkbox-<?=$item["ID"]?>"></label>
                                </div>
                                <div class="additional-services-text"><?=$item["NAME"]?></div>
                            </div>
                        <?endforeach?>
                    </div>

                <? else: ?>
                    <div class="additional-services-item clearfix">
                        <div class="input-checkbox">
                            <input type="checkbox" value="None" id="input-checkbox-<?=$optionGroup["ITEMS"][0]["ID"]?>" name="PROP_<?=$optionGroup["ITEMS"][0]["ID"]?>" />
                            <label for="input-checkbox-<?=$optionGroup["ITEMS"][0]["ID"]?>"></label>
                        </div>
                        <div class="additional-services-text"><?=$optionGroup["ITEMS"][0]["NAME"]?></div>
                    </div>
                <?endif?>

            <?endif?>
        <?endforeach?>
                    </div>
                    </div>
    <?endif?>

                    <!-- кнопки купить -->
                    <div class="product-buy">
                        <a href="#" class="button-buy">Купить</a>
                        <a href="#" class="button-one-click">Купить в один клик</a>
                    </div>

<?endif?>

                    <?if(0&&$arResult['CAN_BUY']):?>
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



                    <!-- описание продукта -->
                    <?if(strlen($arResult["PREVIEW_TEXT"])>0):?>
                    <article class="product-desc">
                        <?=$arResult["PREVIEW_TEXT"]?>
                    </article>
                    <?endif?>

                    <?
                    $isAcceptedOwnGet = (  !isset($arResult['PROPERTIES']['SAMOYVYVOZ']['VALUE'])
                    || trim($arResult['PROPERTIES']['SAMOYVYVOZ']['VALUE']) != "Да"
                    ) ? true : false;

                    $APPLICATION->IncludeComponent("altasib:altasib.geoip",
                    "deliveryInfo_v20",
                    array(
                    'CACHE_TIME' => 0,
                    'CACHE_TYPE' => 'N',
                    'DELIVERY' => $arResult["DELIVERY"],
                    'CAN_BUY' => $arResult['CAN_BUY'],
                    'GET_BY_OWN_ACCEPT' => $isAcceptedOwnGet,
                    ),
                    false);
                    ?>

                </div>
            </div>

        </section>
    </div>
    <!-- /верхний блок карточки товара -->

    <!-- преимущества -->
<? if(!empty($arResult['SECTION']['INFO']['UF_BONUS'])): ?>
    <section class="advantage main-shadow">
        <h2 class="advantage-title">При покупке <?=$arResult['SECTION']['NAME']?> в магазине UP-House Вы получаете:</h2>
    <div class="advantage-container clearfix">
    <? foreach($arResult['SECTION']['INFO']['UF_BONUS'] as $key => $bonus): ?>
        <div class="advantage-item">
            <div class="advantage-img">
                <i class="<?=$arResult['SECTION']['BONUS'][$bonus]['XML_ID']?> product-sprite"></i>
            </div>

            <div class="advantage-text"><?=$arResult['SECTION']['BONUS'][$bonus]['VALUE']?></div>
        </div>
    <? endforeach ?>
        </div>
    </section>
<? endif ?>
    <!-- /преимущества -->

    <!-- Описание -->
    <section class="description main-shadow">

    <!-- меню-табы описания -->
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-tab-item active ">
            <a href="#tab-description-model" role="tab" data-toggle="tab" class="nav-tab-link">описание модели</a>
        </li>
        <li class="nav-tab-item"><a href="#tab-characteristics" role="tab" data-toggle="tab" class="nav-tab-link">характеристики</a></li>
        <li class="nav-tab-item"><a href="#tab-video-review" role="tab" data-toggle="tab" class="nav-tab-link">видео обзор</a></li>
        <li class="nav-tab-item"><a href="#tab-reviews" role="tab" data-toggle="tab" class="nav-tab-link">отзывы</a></li>
        <li class="nav-tab-item"><a href="#tab-accessories" role="tab" data-toggle="tab" class="nav-tab-link">аксессуары</a></li>
    </ul>

    <!-- контент описания -->
    <div class="tab-content">
        <!-- описание модели -->
        <article class="tab-pane active" id="tab-description-model">
            <? if($arResult['DETAIL_TEXT']): ?>
                <div class="b_grid margin-top_20px">
                    <?=$arResult['DETAIL_TEXT']?>
                </div>
            <? endif ?>
            <? if($arResult['SEO_TEXT']): ?>

                <div class="tab-footer">
                    <div class="horizontal-line"> </div>
                    <?=$arResult['SEO_TEXT']?>
                </div>
            <? endif ?>
            <? if(preg_match('/apple iphone 5S/is',$arResult['NAME'])): ?>
                <br><a href='/show_news_obzor_apple_iphone_5s.html'><img src='/images/read_review_button.png'></a>
            <? endif ?>
        </article>
        <!-- /описание модели -->
        <!-- характеристики -->
        <div class="tab-pane" id="tab-characteristics">
            <table class="table-container">
                <tbody>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['OVERALL'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">Общие характеристики</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['OVERALL'] as $prop): ?>
                    <tr>
                        <td class="table-cell"><?=$prop['NAME']?></td>
                        <td class="table-cell"><?=$prop['VALUE']?></td>
                    </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['MULTIMEDIA'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">Мультимедийные возможности</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['MULTIMEDIA'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['CONNECT'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">Связь</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['CONNECT'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['PROC_RAM'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">Память и процессор</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['PROC_RAM'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['STORAGE'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">Накопители</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['STORAGE'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['AUDIO'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">Аудио</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['AUDIO'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['POWER'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">Питание</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['POWER'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                </tbody>
            </table>
        </div>
        <!-- /характеристики -->

        <!--  видео обзор -->
        <? if($arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']): ?>
            <div class="tab-pane" id="tab-video-review">
                <iframe width="853" height="480" src="//www.youtube.com/embed/<?=$arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']?>" frameborder="0" allowfullscreen></iframe>
            </div>
        <? endif ?>
        <!--  /видео обзор -->

        <!-- отзывы -->
        <div class="tab-pane" id="tab-reviews">
            <div class="reviews">
                <div class="clearfix reviews-section">
                    <div class="pull-left">
                        <div class="reviews-title">Средняя оценка Lapka PEM</div>
                        <div class="reviews-img">
                            <img src="img/reviews-stars.png" alt="5 звёзд" />
                        </div>
                    </div>

                    <div class="pull-right"><span class="reviews-text">Рейтинг 5 на основе</span> <a href="#">10 отзывов</a></div>
                </div>

                <div class="reviews-item">
                    <div class="reviews-header clearfix">
                        <span class="reviews-user">Олег</span>
                        <time class="reviews-time">07.07.2014</time>
                        <div class="reviews-img">
                            <img src="img/reviews-stars.png" alt="5 звёзд" />
                        </div>
                    </div>

                    <div class="reviews-desc">Аксессуар — это не только наклейка или чехол. В дополнение к телефону можно купить всё что угодно. Портативную акустику, беспроводную зарядку, сканер отпечатков пальцев, миниатюрный принтер. Но и это ещё не всё. Есть, например, устройство для измерения радиации, влажности и даже нитратов в продуктах питания. Называется просто и лаконично — Lapka. Давайте выясним, чем она полезна и как работает.</div>
                </div>

                <div class="reviews-item">
                    <div class="reviews-header clearfix">
                        <span class="reviews-user">Никита</span>
                        <time class="reviews-time">13.06.2014</time>
                        <div class="reviews-img">
                            <img src="img/reviews-stars.png" alt="5 звёзд" />
                        </div>
                    </div>

                    <div class="reviews-desc">
                        Заслышав название Lapka, можно представить всё, что угодно, только не набор датчиков для измерения параметров окружающей среды. Мы, например, чуть было не подумали, что это брелок в виде кроличьей лапки на удачу, или что-то похожее. Но в действительности всё оказалось гораздо интереснее.
                    </div>
                </div>

                <div class="reviews-item">
                    <div class="reviews-header clearfix">
                        <span class="reviews-user">Алиса</span>
                        <time class="reviews-time">11.12.2013</time>
                        <div class="reviews-img">
                            <img src="img/reviews-stars.png" alt="5 звёзд" />
                        </div>
                    </div>

                    <div class="reviews-desc">
                        Приложение Lapka предназначено для бытового использования, оно отображает информацию в более простом и понятном виде (фон меняет цвет в зависимости от уровня опасности). Отсюда же можно расшарить результат в социальные сети. Желаете похвастаться тем, что съели экологически чистое яблоко? Жмите кнопку! Обнаружили, что ваш дом «фонит»? Покажите собственнику квартиры и скиньте пару тысяч рублей с арендной платы. Словом, запостить результат в некоторых случаях определенно стоит. Главное —не злоупотреблять.
                    </div>
                </div>

                <div class="reviews-more"><a href="#" >Читать все отзывы о Lapka PEM (10)</a></div>
            </div>
        </div>
        <!-- /отзывы -->

        <!-- аксессуары -->
        <? // var_dump($arResult["DETAIL_PICTURE"]);//if ($USER->IsAdmin()): ?>
        <div class="tab-pane" id="tab-accessories">
            <div class="product-container clearfix">
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
<!--        <div class="tab-pane" id="tab-accessories">-->
<!--            <div class="product-container clearfix">-->
<!---->
<!--                -->
<!---->
<!--            </div>-->
<!--        </div>-->
        <!-- /аксессуары -->
    </div>

    </section>
    <!-- /Описание -->

    <!-- похожие товары -->
<? if(!empty($arResult['SIMILAR'])): ?>
    <section class="similar-products main-section">
        <h2 class="similar-products-title entry-title">похожие товары</h2>

        <div class="product-container clearfix">

        <?
        $iCounter = 0;
        foreach($arResult['SIMILAR'] as $similar):
            if($similar['PRICE']['PRICE'] <= 0){  continue; }

            if(4 < ++$iCounter)
                break;
            ?>
            <!-- 1 slide -->
            <div class="product-item">
                <a href="/<?=$similar['PROPERTY_CML2_CODE_VALUE']?>" class="product-link">
                    <figure class="product-content">
                        <img src="<?=CFile::GetPath($similar["PREVIEW_PICTURE"])?>" alt="<?=$similar['NAME']?>" class="product-img" />
                        <figcaption class="product-desc"><?=$similar['NAME']?></figcaption>
                    </figure>
                </a>
                <div class="product-price"><?=number_format($similar['PRICE']['PRICE'], 0, '', ' ')?>, -</div>
                <div class="clearfix">
                    <input type="submit" class="button-buy" value="Купить" />
                    <a href="#" class="button-credit">В 1 клик</a>
                </div>
            </div>
        <?endforeach?>

        </div>
    </section>
<?endif?>
    <!-- /похожие товары -->

    </div>
    <!-- /страница карточка товара -->

