<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
/*
if($arResult["region"]=="���������" || $arResult["region"]=="������������� ����" || $arResult["city"]=="���������"){
	
	echo "+7 (861) 292-29-88";
}else{
	echo "+7 (495) 966-1234";
}
		*/

?>


                    <div class="b_grid_level lh_1-7 delivery_block">
                        <div class="delivery_city_select">

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
                                if($arResult["region"]=="������" || $arResult["region"]=="��������� �������" || $arResult["city"]=="������")
                                    $regionId = 670;
                                elseif($arResult["region"]=="���������" || $arResult["region"]=="������������� ����" || $arResult["city"]=="���������")
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
                                <option value="">������</option>
                            </select> */

//var_dump($arResult["DELIVERY"]);

                            ?>
                        </div>
                        <? /* <div class="delivery_ways make_bigger"><img src="<?=SITE_TEMPLATE_PATH?>/private/images/truck_ico.png" />������� ��������:</div> */ ?>


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
                                    $deliveryName = str_replace('������������ ���������', '��', $deliveryItem['NAME']) . ' - '. ((/*strpos($_SERVER['REQUEST_URI'], '/gadgets/sport/') !== FALSE &&*/ $deliveryItem['ID'] == 6  || $deliveryItem['ID'] == 13) ? '�� ' : '') .'<span style="white-space: nowrap;">' . $deliveryItem['PRICE_FORMATED'] . '</span>';

                                    switch($deliveryItem['ID']){
                                        case 1: //'�������� �� ������ � �������� ����':
                                        case 6: //'�������� �� ��������� ����':
                                        case 4: //'�������� � ����������':
                                        case 13: //'�������� �� �������������� ����':
                                            $deliveryTime = '��������� ��������:';

                                            if($currentHour >= 0 && $currentHour < 12)
                                                $rightPartOfTime = ' <span class="make_bold">�������</span>, '. /*$currentDate .*/' �� 16:00. <br /><span class="make_small">��� ���������� ������ �� 12.00<span>';
elseif($currentHour >= 12 && $currentHour < 17)
                                                $rightPartOfTime = ' <span class="make_bold">�������</span>, '. /*$currentDate .*/' �� 20:00. <br /><span class="make_small">��� ���������� ������ �� 17.00<span>';
                                            elseif($currentHour >= 17 && $currentHour < 19)
                                                $rightPartOfTime = ' <span class="make_bold">�������</span>, '. /*$currentDate .*/' �� 24:00. <br /><span class="make_small">��� ���������� ������ �� 19.00<span>';
                                            elseif($currentHour >= 19 && $currentHour < 24)
                                                $rightPartOfTime = ' <span class="make_bold">������</span>, '. /*date('d.m.Y', strtotime('+1 day', strtotime($currentDate))) .*/' �� 12:00. <br /><span class="make_small">��� ���������� ������ ������� �� 24.00<span>';

                                            $deliveryTime .= $rightPartOfTime;
                                        break;

                                        case 3: //'���������':
                                        case 5: //'���������':
                                            $deliveryTime = '��������� ���������: ������, '. date('d.m.Y', strtotime('+1 day', strtotime($currentDate)));

                                            if($deliveryItem['CITY_ID'] == 670){
                                                $deliveryDescr = '�. ������, ��������������� ������, �. 7, �. 2. ������� ����� "�����", ������� +7 (495) 966-12-34  <span class="pseudo_link" id="delivery_map_moscow_btn" href="#yandex_map_moscow">���������� �� �����</span>';
                                                $deliveryDescrAsLink = '�. ���������������';
                                            }
                                            elseif($deliveryItem['CITY_ID'] == 1316){
                                                $deliveryDescr = '�. ���������, ��. ������� 178. �� "����������", �������: +7 (861) 292-29-88, +7 (928) 884-29-88 <span class="pseudo_link" id="delivery_map_krasnodar_btn" href="#yandex_map_krasnodar">���������� �� �����</span>';
                                                $deliveryDescrAsLink = '��. ������� 178';
                                            }

                                            $deliveryName = $deliveryItem['NAME'] . ' - ���������, ' . '<span class="delivery_link">'. $deliveryDescrAsLink .'</span>';
                                        break;

                                        case 7: //'�������� ������������ ��������� DPD ��� ���������':
                                        case 8: //'�������� ������������ ��������� DPD �� ����������':
                                        case 9: //'�������� ������������ ��������� SPSR ��� ���������':
                                        case 10: //'�������� ������������ ��������� SPSR �� ����������':
                                            $deliveryTime = '���� �������� �� 2 �� 6 ������� ����';
                                        break;
                                        case 11: //'�������� ������������ ��������� DHL':
                                            $deliveryTime = '���� �������� �� 1 �� 2-� ������� ����';
                                        break;
                                        case 12: //'�������� ����� ���� ���������� PickPoint':
                                            $deliveryTime = '���� �������� �� 1 �� 8 ����. (� ������� � ����� 2-� ����)';
                                        break;
                                    }
                                ?>
<div class="delivery_item_container region_<?=$deliveryItem['CITY_ID']?>" <?=($deliveryItem['CITY_ID'] != $regionId ? 'style="display: none"' : '')?>>
    <div class="delivery_item-img-container"><img src="<?=$deliveryItem['LOGOTIP']['SRC']?>" /></div>
    <div class="delivery_item-text-block">
        <div class="delivery_item"><h4><?=$deliveryName;?></h4></div>
    <? if($arParams['CAN_BUY']):?>
        <div class="delivery_item_time"><?=$deliveryTime?></div>
        <div class="delivery_item_description"><span><?=$deliveryDescr?></span></div>
    <? endif;?>
    </div>
</div>

<? endforeach;?>

</div>
<div id="yandex_map_moscow" class="yandex_maps_fancy">
    <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=ctajk0AEdWy5wUn5KaTaohxvpNASigVu&width=600&height=450"></script>
</div>
<div id="yandex_map_krasnodar" class="yandex_maps_fancy">
    <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=FNU1EmbYIp-_Rv3-k_rSV5gz7d1YxgSD&width=600&height=450"></script>
</div>
</div>