<?
$rsBonusEnum = CUserFieldEnum::GetList(array(), array("USER_FIELD_ID" => 9));
while($arBounsEnum = $rsBonusEnum->GetNext()) {
    $arResult['SECTION']['BONUS'][$arBounsEnum['ID']] = $arBounsEnum;
}

/*
// Берем свойства из корневого раздела - бонусы при покупке, видеообзор, даные для вывода рейтинга
if($arResult['SECTION']['DEPTH_LEVEL'] == 2)
	$sectionID = $arResult['SECTION']['IBLOCK_SECTION_ID'];
else
	$sectionID = $arResult['SECTION']['ID'];

$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'ID' => $arResult['SECTION']['ID']);
$arSelect = array('ID', 'NAME', 'CODE', 'IBLOCK_ID', 'UF_BONUS', 'UF_VIDEOOBZOR');
$db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
if($ar_result = $db_list->GetNext()) {
    $arResult['SECTION']['INFO'] = $ar_result;
}
*/
//var_dump($arResult['SECTION']['INFO']['UF_BONUS']);
//var_dump($arResult['SECTION']['DEPTH_LEVEL']);
//var_dump($sectionID);
//var_dump($arResult['ID']);//CIBlockElement::GetElementGroups($arResult['ID']));
/*
$db_old_groups = CIBlockElement::GetElementGroups($arResult['ID'], true);
while($ar_group = $db_old_groups->Fetch())
    var_dump($ar_group["ID"]);

*/


// Берем свойства из текущего раздела - опции при покупке и флаг вывода отзывов
if($arResult['SECTION']['DEPTH_LEVEL'] == 2 || $arResult['SECTION']['DEPTH_LEVEL'] == 3) {
    $sectionID = $arResult['SECTION']['ID'];
    $arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'ID' => $sectionID);
    $arSelect = array('ID', 'IBLOCK_ID', 'UF_BONUS', 'UF_VIDEOOBZOR', 'UF_OPTIONS_GROUP', 'UF_SHOW_REVIEWS', 'UF_BUY_DISABLE');
    $db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
    if($ar_result = $db_list->GetNext()) {
        $arResult['SECTION']['INFO'] = $ar_result;
        $arResult['SECTION']['UF_OPTIONS_GROUP'] = $ar_result['UF_OPTIONS_GROUP'];
        $arResult['SECTION']['UF_SHOW_REVIEWS'] = $ar_result['UF_SHOW_REVIEWS'];
        $arResult['SECTION']['UF_BUY_DISABLE'] = $ar_result['UF_BUY_DISABLE'];
    }
}
else {
    $arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'ID' => $arResult['IBLOCK_SECTION_ID']);
    $arSelect = array('ID', 'IBLOCK_ID', 'UF_BUY_DISABLE');
    $db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
    if($ar_result = $db_list->GetNext()) {
        $arResult['SECTION']['UF_BUY_DISABLE'] = $ar_result['UF_BUY_DISABLE'];
    }
}

/********************/
if($arResult['SECTION']['DEPTH_LEVEL'] > 1) {
    // Если опций в текущем разделе не нашлось
    // то нужно посмотреть во всех привязанных через вкладку "группа"
    if($arResult['SECTION']['UF_OPTIONS_GROUP'] == NULL){
        // выбрать все секции
        $allSections = CIBlockElement::GetElementGroups($arResult['ID'], true);
        // будем смотреть каждую, пока не выбрали опции
        while($section = $allSections->Fetch()){
            // получим id родительской секции через IBLOCK_SECTION_ID
//            $res = CIBlockSection::GetByID($section['ID']);
//            if($ar_res = $res->GetNext()){

            $arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'ID' => $section['ID']);//$ar_res['IBLOCK_SECTION_ID']);
            $arSelect = array('ID', 'IBLOCK_ID', 'UF_BONUS', 'UF_VIDEOOBZOR', 'UF_OPTIONS_GROUP', 'UF_SHOW_REVIEWS', 'UF_BUY_DISABLE');
            $db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
            if($ar_result = $db_list->GetNext()) {
                if($ar_result['UF_OPTIONS_GROUP'] == NULL)
                    continue;


                // и выход после того, как нашли

                $arResult['SECTION']['INFO'] = $ar_result;
                $arResult['SECTION']['UF_OPTIONS_GROUP'] = $ar_result['UF_OPTIONS_GROUP'];

                $arResult['SECTION']['UF_SHOW_REVIEWS'] = $ar_result['UF_SHOW_REVIEWS'];
                $arResult['SECTION']['UF_BUY_DISABLE'] = $ar_result['UF_BUY_DISABLE'];
                break;
            }
        }
    }
//    }
}



/*
if($arResult['SECTION']['DEPTH_LEVEL'] == 2 || $arResult['SECTION']['DEPTH_LEVEL'] == 3) {
    $res = CIBlockSection::GetByID($arResult['SECTION']['ID']);
    if($ar_res = $res->GetNext()){
        if($arResult['SECTION']['DEPTH_LEVEL'] == 3){
            $res = CIBlockSection::GetByID($ar_res['IBLOCK_SECTION_ID']);
            if($ar_res = $res->GetNext()){
               // var_dump($ar_res);
            }
        }
    }

    if(isset($ar_res['IBLOCK_SECTION_ID']) && !empty($ar_res['IBLOCK_SECTION_ID'])){
        $arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID' => $ar_res['IBLOCK_SECTION_ID'], 'CODE' => '%/options');
        $db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, true);
        if($ar_result = $db_list->GetNext()){

            //$arResult['SECTION']['UF_OPTIONS_GROUP'] = $ar_result['ID'];

/*
             //var_dump($ar_result);
        }
    }
*/
//}
/********************/



if($arResult['SECTION']['UF_OPTIONS_GROUP']) {
    $arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID' => $arResult['SECTION']['UF_OPTIONS_GROUP']);
    $arSelect = array('ID', 'NAME', 'IBLOCK_ID');
    $db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
    while($arSectionResult = $db_list->GetNext()) {
        $arOptionsFilter = array('IBLOCK_ID' => $arSectionResult['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID' => $arSectionResult['ID']);
        $arOptionsSelect = array('ID', 'NAME', 'IBLOCK_ID', 'CATALOG_GROUP_1');
        $db_options_list = CIBlockElement::GetList(array(), $arOptionsFilter, false, false, $arOptionsSelect);
        while($ar_option = $db_options_list->GetNext()) {
            $ar_option["PRICES"] = CIBlockPriceTools::GetItemPrices($arSectionResult['IBLOCK_ID'], $arResult["CAT_PRICES"], $ar_option, $arParams['PRICE_VAT_INCLUDE']);
            $arSectionResult["ITEMS"][] = $ar_option;
        }
        $arResult["SECTION"]["OPTIONS"][] = $arSectionResult;
    }
}

// reviews rating
if($arResult['SECTION']['UF_SHOW_REVIEWS']) {
    $rating = 0;
    $ratingCount = 0;
    $sectionChilds = array();
    $sectionElements = array();
    if($arResult['SECTION']['DEPTH_LEVEL'] == 2)
        $sectionID = $arResult['SECTION']['IBLOCK_SECTION_ID'];
    else
        $sectionID = $arResult['SECTION']['ID'];

    $arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'ID' => $sectionID);
    $arSelect = array('ID', 'NAME', 'CODE');
    $db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
    if($ar_result = $db_list->GetNext()) {
        $arResult['RATING_NAME'] = $ar_result['NAME'];
        $arResult['RATING_LINK'] = '/reviews/' . $ar_result['CODE'];
        //$arResult['SECTION']['UF_OPTIONS_GROUP'] = $ar_result['UF_OPTIONS_GROUP'];
        //$arResult['SECTION']['UF_SHOW_REVIEWS'] = $ar_result['UF_SHOW_REVIEWS'];
    }

    $arFilter = array('IBLOCK_ID' => $arParams["IBLOCK_ID"], 'SECTION_ID' => $sectionID);
    $arSelect = array('ID');
    $db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
    while($ar_result = $db_list->GetNext())	{
        $sectionChilds[] = $ar_result['ID'];
    }

    $arFilter = array(
        "IBLOCK_ID" => 8,
        "ACTIVE" => "Y",
        "SECTION_ID" => $sectionChilds
    );
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, array('ID'));
    while($ar_fields = $res->GetNext()) {
        $sectionElements[] = $ar_fields['ID'];
    }
    //////////////////////////////////
    if(!empty($sectionElements)) {
        $arFilter = array(
            "IBLOCK_ID" => 13,
            "ACTIVE" => "Y",
            "PROPERTY_PRODUCT_ID" => $sectionElements
        );
        $arGroupBy = array("PROPERTY_RATING");
        $res = CIBlockElement::GetList(array(), $arFilter, $arGroupBy);
        while($ar_fields = $res->GetNext()) {
            $rating += $ar_fields['PROPERTY_RATING_VALUE']*$ar_fields['CNT'];
            $ratingCount += $ar_fields['CNT'];
        }
    }

    if($rating) {
        $arResult['RATING'] = round($rating/$ratingCount, 1);
        $arResult['RATING_ROUND'] = round($arResult['RATING']);
        $arResult['RATING_COUNT'] = $ratingCount;
    }
}

/*
$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'ID' => $arResult['SECTION']['ID']);
$arSelect = array('ID', 'IBLOCK_ID', 'UF_SERVICES');
$db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
if($ar_result = $db_list->GetNext()) {
	$seviceSections = $ar_result['UF_SERVICES'];
	
	if(!empty($seviceSections)) {
		$arServiceSectionFilter = array('IBLOCK_ID' => 11, 'GLOBAL_ACTIVE'=>'Y', 'ID' => $seviceSections);
		$arServiceSectionSelect = array('ID', 'NAME', 'IBLOCK_ID');
		$db_service_section_list = CIBlockSection::GetList(array(), $arServiceSectionFilter, false, $arServiceSectionSelect);
		while($ar_result = $db_service_section_list->GetNext()) {
			$arResult['SERVICE_LIST']['SECTIONS'][] = $ar_result;
		}
		$arServiceListFilter = array('IBLOCK_ID' => 11, 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID' => $seviceSections);
		$arServiceListSelect = array('ID', 'NAME', 'IBLOCK_ID', 'IBLOCK_SECTION_ID', 'PROPERTY_LIST_NAME', 'CATALOG_GROUP_1');
		$db_service_list = CIBlockElement::GetList(array(), $arServiceListFilter, false, false, $arServiceListSelect);
		while($ar_result = $db_service_list->GetNext()) {
			$arResult['SERVICE_LIST']['SERVICES'][$ar_result['IBLOCK_SECTION_ID']][] = $ar_result;
		}
	}
}
*/
foreach($arResult["PRICES"] as &$price){
    if($price["VALUE"]==0){
        $price["CAN_BUY"]=0;
        $arResult["CAN_BUY"]=0;
    }
    break;
}

foreach($arResult["PROP_GROUP_DISPLAY"] as &$property){
    foreach($property as &$prop){
        $prop["VALUE"]=preg_replace('/https/is','http',$prop["VALUE"]);
        $prop["VALUE"]=preg_replace('/((www|http:\/\/)[^ ]+)/', '<a href="\1" target="_blank">\1</a>', $prop["VALUE"]);
    }
}

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
*/
//$arResult["CAN_BUY"]=0;

//echo "<pre>";
//var_dump($arResult);

?>