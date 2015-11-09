<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

if($arResult["region"]=="Москва" || $arResult["region"]=="Москвская область" || $arResult["city"]=="Москва")
    $regionId = 670;
elseif($arResult["region"]=="Краснодар" || $arResult["region"]=="Краснодарский край" || $arResult["city"]=="Краснодар")
    $regionId = 1316;
else
    $regionId = 670;
?>

<?
$APPLICATION->IncludeComponent(
    "apple-house:sale.ajax.locations",
    "",
    array(
        "AJAX_CALL" => "N",
        "COUNTRY" => '4',
        "CITY" => $regionId,
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
?>
<div class="product-delivery">
<?
$currentDate = date("d.m.Y");
$currentHour = date("H");
?>
<? foreach($arParams["DELIVERY"] as $deliveryItem):?>
    <?
    if(!$arParams['GET_BY_OWN_ACCEPT'] && ($deliveryItem['ID'] == 3 || $deliveryItem['ID'] == 5))
        continue;

    $deliveryTime = '';
    $deliveryDescr = '';
    $deliveryDescrAsLink = '';
    $deliveryName = str_replace('транспортной компанией', 'ТК', $deliveryItem['NAME']) . ' - '. ((/*strpos($_SERVER['REQUEST_URI'], '/gadgets/sport/') !== FALSE &&*/ $deliveryItem['ID'] == 6  || $deliveryItem['ID'] == 13) ? 'от ' : '') .'<span style="white-space: nowrap;">' . $deliveryItem['PRICE_FORMATED'] . '</span>';

    switch($deliveryItem['ID']){
        case 1: //'Доставка по Москве в пределах МКАД':
        case 6: //'Доставка за пределами МКАД':
            $deliveryTime = 'Ближайшая доставка: <span class="make_bold_n_color">сегодня</span> / завтра<br /><span class="make_small">Более точную информацию уточняйте у оператора</span>';
            break;
        case 4: //'Доставка в Краснодаре':
        case 13: //'Доставка по Краснодарскому краю':
            $deliveryTime = 'Ближайшая доставка:';
            if($currentHour >= 0 && $currentHour < 12)
                $rightPartOfTime = ' <span class="make_bold_n_color">Сегодня</span>, '. /*$currentDate .*/' до 16:00. <br /><span class="make_small">При оформлении заказа до 12.00<span>';
            elseif($currentHour >= 12 && $currentHour < 17)
                $rightPartOfTime = ' <span class="make_bold_n_color">Сегодня</span>, '. /*$currentDate .*/' до 20:00. <br /><span class="make_small">При оформлении заказа до 17.00<span>';
            elseif($currentHour >= 17 && $currentHour < 19)
                $rightPartOfTime = ' <span class="make_bold_n_color">Сегодня</span>, '. /*$currentDate .*/' до 24:00. <br /><span class="make_small">При оформлении заказа до 19.00<span>';
            elseif($currentHour >= 19 && $currentHour < 24)
                $rightPartOfTime = ' <span class="make_bold_n_color">Завтра</span>, '. /*date('d.m.Y', strtotime('+1 day', strtotime($currentDate))) .*/' до 12:00. <br /><span class="make_small">При оформлении заказа сегодня до 24.00<span>';

            $deliveryTime .= $rightPartOfTime;
            break;

        case 3: //'Самовывоз':
        case 5: //'Самовывоз':
            if($deliveryItem['CITY_ID'] == 670){
                $deliveryTime = 'Ближайший самовывоз: <span class="make_bold_n_color">сегодня</span> / завтра<br /><span class="make_small">Более точную информацию уточняйте у оператора</span>';
                $deliveryDescr = 'г. Москва, ул. Барклая, дом 13, с.1, телефон +7 (495) 966-12-34. Обратите внимание! Самовывоз товара возможен только после предварительного резерва, так как в пункте самовывоза находится лишь малая часть ассортимента.  <span class="pseudo_link" id="delivery_map_moscow_btn" href="#yandex_map_moscow">посмотреть на карте</span>';
                $deliveryDescrAsLink = 'м. Багратионовская';
                $deliveryIcon='metro-icon';
            }
            elseif($deliveryItem['CITY_ID'] == 1316){
                $deliveryTime = 'Ближайший самовывоз: Завтра, '. date('d.m.Y', strtotime('+1 day', strtotime($currentDate)));
                $deliveryDescr = 'г. Краснодар, ул. Стасова 178. ТК "МедиаПлаза", телефон: +7 (861) 292-29-88, +7 (928) 884-29-88. Обратите внимание! Самовывоз товара возможен только после предварительного резерва по номеру +7 (861) 292-29-88, так как в пункте самовывоза находится лишь малая часть ассортимента. <span class="pseudo_link" id="delivery_map_krasnodar_btn" href="#yandex_map_krasnodar">посмотреть на карте</span>';
                $deliveryDescrAsLink = 'ул. Стасова 178';
            }

            $deliveryName = $deliveryItem['NAME'] . ' - бесплатно, ' . '<span class="delivery_link">'. $deliveryDescrAsLink .'</span>';
            break;

        case 7: //'Доставка транспортной компанией DPD без страховки':
        case 8: //'Доставка транспортной компанией DPD со страховкой':
        case 9: //'Доставка транспортной компанией SPSR без страховки':
        case 10: //'Доставка транспортной компанией SPSR со страховкой':
            $deliveryTime = 'Срок доставки от 2 до 6 рабочих дней';
            break;
        case 11: //'Доставка транспортной компанией DHL':
            $deliveryTime = 'Срок доставки от 1 до 2-х рабочих дней';
            break;
        case 12: //'Доставка через сеть постаматов PickPoint':
            $deliveryTime = 'Срок доставки от 1 до 8 дней. (в среднем – менее 2-х дней)';
            break;
    }
    ?>
    <?if(0):?>
    <div class="delivery_item_container region_<?=$deliveryItem['CITY_ID']?>" <?=($deliveryItem['CITY_ID'] != $regionId ? 'style="display: none"' : '')?>>
        <img src="<?=$deliveryItem['LOGOTIP']['SRC']?>" />
        <div class="delivery_item"><?=$deliveryName;?></div>
        <? if($arParams['CAN_BUY']):?>
            <div class="delivery_item_time"><?=$deliveryTime?></div>
            <div class="delivery_item_description"><span><?=$deliveryDescr?></span></div>
        <? endif;?>
    </div>
    <?endif?>
    <div class="product-delivery-item clearfix region_<?=$deliveryItem['CITY_ID']?>" <?=($deliveryItem['CITY_ID'] != $regionId ? 'style="display: none"' : '')?>>
        <div class="product-delivery-img">
            <i class="car-icon product-sprite"></i>
        </div>
        <div class="product-delivery-content">
            <h4 class="product-delivery-title"><?=$deliveryName;?></h4>
            <div class="product-delivery-text">
                Ближайшая доставка: <?=$deliveryTime?><!--strong>Сегодня</strong>, до 24:00--><br />
                <?=$deliveryDescr?>
            </div>
        </div>
    </div>

<? endforeach;?>
</div>
    <!-- доставка -->
<!--    <div class="product-delivery">-->
<!--        <div class="product-delivery-item clearfix">-->
<!--            <div class="product-delivery-img">-->
<!--                <i class="car-icon product-sprite"></i>-->
<!--            </div>-->
<!--            <div class="product-delivery-content">-->
<!--                <h4 class="product-delivery-title">Доставка по Москве в пределах МКАД - 300 руб.</h4>-->
<!--                <div class="product-delivery-text">-->
<!--                    Ближайшая доставка: <strong>Сегодня</strong>, до 24:00<br />-->
<!--                    При оформлении заказа до 19:00-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="product-delivery-item clearfix">-->
<!--            <div class="product-delivery-img">-->
<!--                <i class="car-icon product-sprite"></i>-->
<!--            </div>-->
<!--            <div class="product-delivery-content">-->
<!--                <h4 class="product-delivery-title">Доставка по Москве в пределах МКАД - 400 руб.</h4>-->
<!--                <div class="product-delivery-text">-->
<!--                    Ближайшая доставка: <strong>Сегодня</strong>, до 24:00<br />-->
<!--                    При оформлении заказа до 19:00-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="product-delivery-item clearfix">-->
<!--            <div class="product-delivery-img">-->
<!--                <i class="metro-icon product-sprite"></i>-->
<!--            </div>-->
<!--            <div class="product-delivery-content">-->
<!--                <h4 class="product-delivery-title">Самовывоз - бесплатно, <a href="#">м. Багратионовская</a></h4>-->
<!--                <div class="product-delivery-text">-->
<!--                    Ближайший самовывоз: Завтра, 06.07.2014-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<?if(0):
/*
if($arResult["region"]=="Краснодар" || $arResult["region"]=="Краснодарский край" || $arResult["city"]=="Краснодар"){

	echo "+7 (861) 292-29-88";
}else{
	echo "+7 (495) 966-1234";
}
		*/

?>


                    <div class="b_grid_level lh_1-7 delivery_block">
                        <div class="delivery_city_select">
                            <img src="<?=SITE_TEMPLATE_PATH?>/private/images/locationpin_ico.png" /> Ваш регион:
                            <div style="display:inline-block; margin-left: 10px;">
                                <?
                                /*
                                if ($_SERVER['HTTP_X_FORWARDED_FOR']){
                                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                    $arrIPs = explode(', ', $ip);
                                    $xml = simplexml_load_string(file_get_contents("http://ipgeobase.ru:7020/geo?ip={$arrIPs[0]}"));
                                    if((string)$xml->ip->message == 'Not found')
                                        $xml = simplexml_load_string(file_get_contents("http://ipgeobase.ru:7020/geo?ip={$arrIPs[1]}"));
                                }
                                else{
                                    $ip = $_SERVER['REMOTE_ADDR'];
                                    $xml = simplexml_load_string(file_get_contents("http://ipgeobase.ru:7020/geo?ip={$ip}"));
                                }

                                $regionName = iconv('UTF-8', 'windows-1251', (string)$xml->ip->region);
*/
                                //var_dump($regionName);
                                if($arResult["region"]=="Москва" || $arResult["region"]=="Москвская область" || $arResult["city"]=="Москва")
                                    $regionId = 670;
                                elseif($arResult["region"]=="Краснодар" || $arResult["region"]=="Краснодарский край" || $arResult["city"]=="Краснодар")
                                    $regionId = 1316;
                                else
                                    $regionId = 670;
                                    /*$regionId = 1317;*/

//var_dump($arResult['USER_REGION_ID']);


                                ?>

                                <?
                                $APPLICATION->IncludeComponent(
                                    "apple-house:sale.ajax.locations",
                                    "",
                                    array(
                                        "AJAX_CALL" => "N",
                                        "COUNTRY" => '4',
                                        "CITY" => $regionId,
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
                                ?>
                            </div>
                            <? /* <select>
                                <option value="">Москва</option>
                            </select> */

//var_dump($arResult["DELIVERY"]);

                            ?>
                        </div>
                        <? /* <div class="delivery_ways make_bigger"><img src="<?=SITE_TEMPLATE_PATH?>/private/images/truck_ico.png" />Способы доставки:</div> */ ?>


                        <div class="delivery_items">
                            <?
                                $currentDate = date("d.m.Y");
                                $currentHour = date("H");
                            ?>
                            <? foreach($arParams["DELIVERY"] as $deliveryItem):?>
                                <?
                                    if(!$arParams['GET_BY_OWN_ACCEPT'] && ($deliveryItem['ID'] == 3 || $deliveryItem['ID'] == 5))
                                        continue;

                                    $deliveryTime = '';
                                    $deliveryDescr = '';
                                    $deliveryDescrAsLink = '';
                                    $deliveryName = str_replace('транспортной компанией', 'ТК', $deliveryItem['NAME']) . ' - '. ((/*strpos($_SERVER['REQUEST_URI'], '/gadgets/sport/') !== FALSE &&*/ $deliveryItem['ID'] == 6  || $deliveryItem['ID'] == 13) ? 'от ' : '') .'<span style="white-space: nowrap;">' . $deliveryItem['PRICE_FORMATED'] . '</span>';

                                    switch($deliveryItem['ID']){
                                        case 1: //'Доставка по Москве в пределах МКАД':
                                        case 6: //'Доставка за пределами МКАД':
                                            $deliveryTime = 'Ближайшая доставка: <span class="make_bold_n_color">сегодня</span> / завтра<br /><span class="make_small">Более точную информацию уточняйте у оператора</span>';
                                            break;
                                        case 4: //'Доставка в Краснодаре':
                                        case 13: //'Доставка по Краснодарскому краю':
                                            $deliveryTime = 'Ближайшая доставка:';
                                            if($currentHour >= 0 && $currentHour < 12)
                                                $rightPartOfTime = ' <span class="make_bold_n_color">Сегодня</span>, '. /*$currentDate .*/' до 16:00. <br /><span class="make_small">При оформлении заказа до 12.00<span>';
                                            elseif($currentHour >= 12 && $currentHour < 17)
                                                $rightPartOfTime = ' <span class="make_bold_n_color">Сегодня</span>, '. /*$currentDate .*/' до 20:00. <br /><span class="make_small">При оформлении заказа до 17.00<span>';
                                            elseif($currentHour >= 17 && $currentHour < 19)
                                                $rightPartOfTime = ' <span class="make_bold_n_color">Сегодня</span>, '. /*$currentDate .*/' до 24:00. <br /><span class="make_small">При оформлении заказа до 19.00<span>';
                                            elseif($currentHour >= 19 && $currentHour < 24)
                                                $rightPartOfTime = ' <span class="make_bold_n_color">Завтра</span>, '. /*date('d.m.Y', strtotime('+1 day', strtotime($currentDate))) .*/' до 12:00. <br /><span class="make_small">При оформлении заказа сегодня до 24.00<span>';

                                            $deliveryTime .= $rightPartOfTime;
                                        break;

                                        case 3: //'Самовывоз':
                                        case 5: //'Самовывоз':
                                            if($deliveryItem['CITY_ID'] == 670){
                                                $deliveryTime = 'Ближайший самовывоз: <span class="make_bold_n_color">сегодня</span> / завтра<br /><span class="make_small">Более точную информацию уточняйте у оператора</span>';
                                                $deliveryDescr = 'г. Москва, ул. Барклая, дом 13, с.1, телефон +7 (495) 966-12-34. Обратите внимание! Самовывоз товара возможен только после предварительного резерва, так как в пункте самовывоза находится лишь малая часть ассортимента.  <span class="pseudo_link" id="delivery_map_moscow_btn" href="#yandex_map_moscow">посмотреть на карте</span>';
                                                $deliveryDescrAsLink = 'м. Багратионовская';
                                            }
                                            elseif($deliveryItem['CITY_ID'] == 1316){
                                                $deliveryTime = 'Ближайший самовывоз: Завтра, '. date('d.m.Y', strtotime('+1 day', strtotime($currentDate)));
                                                $deliveryDescr = 'г. Краснодар, ул. Стасова 178. ТК "МедиаПлаза", телефон: +7 (861) 292-29-88, +7 (928) 884-29-88. Обратите внимание! Самовывоз товара возможен только после предварительного резерва по номеру +7 (861) 292-29-88, так как в пункте самовывоза находится лишь малая часть ассортимента. <span class="pseudo_link" id="delivery_map_krasnodar_btn" href="#yandex_map_krasnodar">посмотреть на карте</span>';
                                                $deliveryDescrAsLink = 'ул. Стасова 178';
                                            }

                                            $deliveryName = $deliveryItem['NAME'] . ' - бесплатно, ' . '<span class="delivery_link">'. $deliveryDescrAsLink .'</span>';
                                        break;

                                        case 7: //'Доставка транспортной компанией DPD без страховки':
                                        case 8: //'Доставка транспортной компанией DPD со страховкой':
                                        case 9: //'Доставка транспортной компанией SPSR без страховки':
                                        case 10: //'Доставка транспортной компанией SPSR со страховкой':
                                            $deliveryTime = 'Срок доставки от 2 до 6 рабочих дней';
                                        break;
                                        case 11: //'Доставка транспортной компанией DHL':
                                            $deliveryTime = 'Срок доставки от 1 до 2-х рабочих дней';
                                        break;
                                        case 12: //'Доставка через сеть постаматов PickPoint':
                                            $deliveryTime = 'Срок доставки от 1 до 8 дней. (в среднем – менее 2-х дней)';
                                        break;
                                    }
                                ?>
<div class="delivery_item_container region_<?=$deliveryItem['CITY_ID']?>" <?=($deliveryItem['CITY_ID'] != $regionId ? 'style="display: none"' : '')?>>
    <img src="<?=$deliveryItem['LOGOTIP']['SRC']?>" />
    <div class="delivery_item"><?=$deliveryName;?></div>
<? if($arParams['CAN_BUY']):?>
    <div class="delivery_item_time"><?=$deliveryTime?></div>
    <div class="delivery_item_description"><span><?=$deliveryDescr?></span></div>
<? endif;?>
</div>

<? endforeach;?>

</div>
<div id="yandex_map_moscow" class="yandex_maps_fancy">
    <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=FSjN65mSjNzUiDgGpb8XG12JTE5s0mrH&width=600&height=450"></script>
</div>
<div id="yandex_map_krasnodar" class="yandex_maps_fancy">
    <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=FNU1EmbYIp-_Rv3-k_rSV5gz7d1YxgSD&width=600&height=450"></script>
</div>
</div>
<?endif?>