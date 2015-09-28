<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//var_dump($_SERVER['REMOTE_ADDR']);
//var_dump('QQQQQQQQQQQQQQQ');


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

if($regionName == 'Москва' || $regionName == 'Московская область')
    $arResult['USER_REGION_ID'] = 670;
elseif($regionName == 'Краснодарский край')
    $arResult['USER_REGION_ID'] = 1316;
else
    $arResult['USER_REGION_ID'] = 1317;

var_dump($arResult['USER_REGION_ID']);
*/

//if($USER->IsAdmin()):

    $APPLICATION->IncludeComponent("altasib:altasib.geoip",
        "deliveryInfo",
        array(
            'CACHE_TIME' => 0,
            'CACHE_TYPE' => 'N',
            'DELIVERY' => $arResult["DELIVERY"],
            'CAN_BUY' => $arResult['CAN_BUY'],
            'GET_BY_OWN_ACCEPT' => (isset($arResult['PROPERTIES']['SAMOYVYVOZ']['VALUE']) && !empty($arResult['PROPERTIES']['SAMOYVYVOZ']['VALUE'])) ? false : true,
        ),
        false);


//endif;