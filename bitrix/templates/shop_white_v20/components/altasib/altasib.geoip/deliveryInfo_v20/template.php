<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

if($arResult["region"]=="������" || $arResult["region"]=="��������� �������" || $arResult["city"]=="������")
    $regionId = 670;
elseif($arResult["region"]=="���������" || $arResult["region"]=="������������� ����" || $arResult["city"]=="���������")
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
    $deliveryName = str_replace('������������ ���������', '��', $deliveryItem['NAME']) . ' - '. ((/*strpos($_SERVER['REQUEST_URI'], '/gadgets/sport/') !== FALSE &&*/ $deliveryItem['ID'] == 6  || $deliveryItem['ID'] == 13) ? '�� ' : '') .'<span style="white-space: nowrap;">' . $deliveryItem['PRICE_FORMATED'] . '</span>';
    $deliveryIcon='car-icon';
    switch($deliveryItem['ID']){
        case 1: //'�������� �� ������ � �������� ����':
        case 6: //'�������� �� ��������� ����':
            $deliveryTime = '��������� ��������: <span class="make_bold_n_color">�������</span> / ������<br /><span class="make_small">����� ������ ���������� ��������� � ���������</span>';
            break;
        case 4: //'�������� � ����������':
        case 13: //'�������� �� �������������� ����':
            $deliveryTime = '��������� ��������:';
            if($currentHour >= 0 && $currentHour < 12)
                $rightPartOfTime = ' <span class="make_bold_n_color">�������</span>, '. /*$currentDate .*/' �� 16:00. <br /><span class="make_small">��� ���������� ������ �� 12.00<span>';
            elseif($currentHour >= 12 && $currentHour < 17)
                $rightPartOfTime = ' <span class="make_bold_n_color">�������</span>, '. /*$currentDate .*/' �� 20:00. <br /><span class="make_small">��� ���������� ������ �� 17.00<span>';
            elseif($currentHour >= 17 && $currentHour < 19)
                $rightPartOfTime = ' <span class="make_bold_n_color">�������</span>, '. /*$currentDate .*/' �� 24:00. <br /><span class="make_small">��� ���������� ������ �� 19.00<span>';
            elseif($currentHour >= 19 && $currentHour < 24)
                $rightPartOfTime = ' <span class="make_bold_n_color">������</span>, '. /*date('d.m.Y', strtotime('+1 day', strtotime($currentDate))) .*/' �� 12:00. <br /><span class="make_small">��� ���������� ������ ������� �� 24.00<span>';

            $deliveryTime .= $rightPartOfTime;
            break;

        case 3: //'���������':
        case 5: //'���������':
            if($deliveryItem['CITY_ID'] == 670){
                $deliveryTime = '��������� ���������: <span class="make_bold_n_color">�������</span> / ������<br /><span class="make_small">����� ������ ���������� ��������� � ���������</span>';
                $deliveryDescr = '�. ������, ��. �������, ��� 13, �.1, ������� +7 (495) 966-12-34. �������� ��������! ��������� ������ �������� ������ ����� ���������������� �������, ��� ��� � ������ ���������� ��������� ���� ����� ����� ������������.  <span class="pseudo_link" id="delivery_map_moscow_btn" href="#yandex_map_moscow">���������� �� �����</span>';
                $deliveryDescrAsLink = '�. ���������������';
                $deliveryIcon='metro-icon';
            }
            elseif($deliveryItem['CITY_ID'] == 1316){
                $deliveryTime = '��������� ���������: ������, '. date('d.m.Y', strtotime('+1 day', strtotime($currentDate)));
                $deliveryDescr = '�. ���������, ��. ������� 178. �� "����������", �������: +7 (861) 292-29-88, +7 (928) 884-29-88. �������� ��������! ��������� ������ �������� ������ ����� ���������������� ������� �� ������ +7 (861) 292-29-88, ��� ��� � ������ ���������� ��������� ���� ����� ����� ������������. <span class="pseudo_link" id="delivery_map_krasnodar_btn" href="#yandex_map_krasnodar">���������� �� �����</span>';
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

    <div class="product-delivery-item clearfix region_<?=$deliveryItem['CITY_ID']?>" <?=($deliveryItem['CITY_ID'] != $regionId ? 'style="display: none"' : '')?>>
        <div class="product-delivery-img">
            <i class="<?=$deliveryIcon?> product-sprite"></i>
        </div>
        <div class="product-delivery-content">
            <h4 class="product-delivery-title"><?=$deliveryName;?></h4>
        <? if($arParams['CAN_BUY']):?>
            <div class="product-delivery-text">
                ��������� ��������: <?=$deliveryTime?><!--strong>�������</strong>, �� 24:00--><br />
                <?=$deliveryDescr?>
            </div>
        <?endif?>
        </div>
    </div>

<? endforeach;?>
</div>
