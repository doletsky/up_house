<?
$rsBonusEnum = CUserFieldEnum::GetList(array(), array("USER_FIELD_ID" => 9));
while($arBounsEnum = $rsBonusEnum->GetNext()) {
	$arResult['SECTION']['BONUS'][$arBounsEnum['ID']] = $arBounsEnum;
}

$arResult['NAME']=preg_replace(array("/^Мобильный телефон /","/^Смартфон /","/^Умные часы /"),"", $arResult['NAME']);
//var_dump($_SESSION);
if(!empty($_SESSION['ref_id']))$arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'].='-'.$_SESSION['ref_id'];

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

if ($arResult["PROPERTIES"]["ZAPRET_POKUPKI"]["VALUE"] == "Да")
{
	$arResult['SECTION']["UF_BUY_DISABLE"]=true;
}

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


$arResult['colors_hex'] = array("*TITLE01*"		 => "Reds",
		"Indian Red" 		 => "#CD5C5C",
		"Light Coral" 		 => "#F08080",
		"Salmon" 		 => "#FA8072",
		"Dark Salmon" 		 => "#E9967A",
		"Light Salmon" 		 => "#FFA07A",
		"Crimson" 		 => "#DC143C",
		"Red" 			 => "#f25656",
		"Красный" 			 => "#FF0000",
		"Fire Brick" 		 => "#B22222",
		"Dark Red" 		 => "#8B0000",
		
		"*TITLE02*"		 => "Pinks",
		"Pink" 			 => "#FFC0CB",
		"Розовый" 			 => "#FFC0CB",
		"Light Pink" 		 => "#FFB6C1",
		"Cranberry" 		 => "#FFB6C1",
		"Hot Pink" 		 => "#FF69B4",
		"Deep Pink" 		 => "#FF1493",
		"Medium Violet Red" 	 => "#C71585",
		"Pale Violet Red" 	 => "#DB7093",
		
		"*TITLE03*"		 => "Oranges",
		"Light Salmon" 		 => "#FFA07A",
		"Coral" 		 => "#FF7F50",
		"Tomato" 		 => "#FF6347",
		"Orange Red" 		 => "#FF4500",
		"Dark Orange" 		 => "#FF8C00",
		"Orange" 		 => "#FFA500",
		"Оранжевый" 		 => "#FFA500",
		
		"*TITLE04*"		 => "Yellows",
		"Gold" 			 => "#FFD700",
		"Золотой" 			 => "#FFD700",
		
		"Шампань" 			 => "#EEE8AA",
		"Yellow" 		 => "#FFFF00",
		"Желтый" 		 => "#FFFF00",
		"Light Yellow" 		 => "#FFFFE0",
		"Lemon Chiffon" 	 => "#FFFACD",
		"Light Goldenrod Yellow" => "#FAFAD2",
		"Papaya Whip" 		 => "#FFEFD5",
		"Moccasin" 		 => "#FFE4B5",
		"Peach Puff" 		 => "#FFDAB9",
		"Pale Goldenrod" 	 => "#EEE8AA",
		"Khaki" 		 => "#F0E68C",
		"Dark Khaki" 		 => "#BDB76B",
				
		"*TITLE05*" 		 => "Purples",
		"Lavender" 		 => "#E6E6FA",
		"Thistle" 		 => "#D8BFD8",
		"Plum" 			 => "#DDA0DD",
		"Violet" 		 => "#EE82EE",
		"Orchid" 		 => "#DA70D6",
		"Fuchsia" 		 => "#FF00FF",
		"Magenta" 		 => "#FF00FF",
		"Medium Orchid" 	 => "#BA55D3",
		"Medium Purple" 	 => "#9370DB",
		"Blue Violet" 		 => "#8A2BE2",
		"Dark Violet" 		 => "#9400D3",
		"Dark Orchid" 		 => "#9932CC",
		"Dark Magenta" 		 => "#8B008B",
		"Purple" 		 => "#800080",
		"Indigo" 		 => "#4B0082",
		"Slate Blue" 		 => "#6A5ACD",
		"Dark Slate Blue" 	 => "#483D8B",
		
		"*TITLE06*"		 => "Greens",
		"Green Yellow" 		 => "#ADFF2F",
		"Chartreuse" 		 => "#7FFF00",
		"Lawn Green" 		 => "#7CFC00",
		"Lime" 			 => "#00FF00",
		"Лайм" 			 => "#00FF00",
		"Lime Green" 		 => "#32CD32",
		"Pale Green" 		 => "#98FB98",
		"Light	Green" 		 => "#90EE90",
		"Medium Spring Green" 	 => "#00FA9A",
		"Spring Green" 		 => "#00FF7F",
		"Medium Sea Green" 	 => "#3CB371",
		"Sea Green" 		 => "#2E8B57",
		"Forest Green" 		 => "#228B22",
		"Green" 		 => "#008000",
		"Зеленый" 		 => "#8ee61b",
		"Зелёный" 		 => "#8ee61b",
		"Dark Green" 		 => "#006400",
		"Yellow Green" 		 => "#9ACD32",
		"Olive Drab" 		 => "#6B8E23",
		"Olive" 		 => "#808000",
		"Оливковый" 		 => "#808000",
		"Dark Olive Green" 	 => "#556B2F",
		"Medium Aquamarine" 	 => "#66CDAA",
		"Dark Sea Green" 	 => "#8FBC8F",
		"Light Sea Green" 	 => "#20B2AA",
		"Dark Cyan" 		 => "#008B8B",
		"Teal" 			 => "#008080",
		
		"*TITLE07*"		 => "Blues",
		"Aqua" 			 => "#00FFFF",
		"Tiffany" 			 => "#40E0D0",
		"Голубой"=> "#04aae0",
		"Синий"=> "#1568af",
		"Cyan" 			 => "#00FFFF",
		"Light Cyan" 		 => "#E0FFFF",
		"Pale Turquoise" 	 => "#AFEEEE",
		"Aquamarine" 		 => "#7FFFD4",
		"Turquoise" 		 => "#40E0D0",
		"Medium Turquoise" 	 => "#48D1CC",
		"Dark Turquoise" 	 => "#00CED1",
		"Cadet Blue" 		 => "#5F9EA0",
		"Steel Blue" 		 => "#4682B4",
		"Light Steel Blue" 	 => "#B0C4DE",
		"Powder Blue" 		 => "#B0E0E6",
		"Light Blue" 		 => "#ADD8E6",
		"Sky Blue" 		 => "#87CEEB",
		"Light Sky Blue" 	 => "#87CEFA",
		"Deep Sky Blue" 	 => "#00BFFF",
		"Dodger Blue" 		 => "#1E90FF",
		"Cornflower Blue" 	 => "#6495ED",
		"Medium Slate Blue" 	 => "#7B68EE",
		"Royal Blue" 		 => "#4169E1",
		"Blue" 			 => "#288dcc",
		"Medium Blue" 		 => "#0000CD",
		"Dark Blue"		 => "#00008B",
		"Navy" 			 => "#000080",
		"Midnight Blue" 	 => "#191970",
				
		"*TITLE08*"		 => "Browns",
		"Cornsilk" 		 => "#FFF8DC",
		"Blanched Almond" 	 => "#FFEBCD",
		"Bisque" 		 => "#FFE4C4",
		"Navajo White" 		 => "#FFDEAD",
		"Wheat" 		 => "#F5DEB3",
		"Burly Wood" 		 => "#DEB887",
		"Tan" 			 => "#D2B48C",
		"Rosy Brown" 		 => "#BC8F8F",
		"Sandy Brown" 		 => "#F4A460",
		"Goldenrod" 		 => "#DAA520",
		"Dark Goldenrod" 	 => "#B8860B",
		"Peru" 			 => "#CD853F",
		"Chocolate" 		 => "#D2691E",
		"Saddle Brown" 		 => "#8B4513",
		"Sienna" 		 => "#A0522D",
		"Brown" 		 => "#A52A2A",
		"Коричневый" 		 => "#A52A2A",
		"Copper" 			 => "#D0A998",
		"Maroon" 		 => "#800000",
				
		"*TITLE09*"		 => "Whites",
		
		"Snow" 			 => "#FFFAFA",
		"Honeydew" 		 => "#F0FFF0",
		"Mint" 		 => "#91e1e2",
		"Mint Cream" 		 => "#F5FFFA",
		"Мятный" 		 => "#91e1e2",
		"Azure" 		 => "#F0FFFF",
		"Alice Blue" 		 => "#F0F8FF",
		"Ghost White" 		 => "#F8F8FF",
		"White Smoke" 		 => "#F5F5F5",
		"Seashell"		 => "#FFF5EE",
		"Beige"			 => "#F5F5DC",
		"Бежевый"			 => "#F5F5DC",
		"Old Lace"		 => "#FDF5E6",
		"Floral White"		 => "#FFFAF0",
		"Ivory"			 => "#FFFFF0",
		"Antique White"		 => "#FAEBD7",
		"Linen"			 => "#FAF0E6",
		"Lavender Blush"	 => "#FFF0F5",
		"Misty Rose"		 => "#FFE4E1",
		
		"*TITLE10*"		 => "Greys",
		"Gainsboro"		 => "#DCDCDC",
		"Light Grey"		 => "#D3D3D3",
		"Silver"		 => "#e0e0e0",
		"Серебр"		 => "#C0C0C0",
		"Сталь"		 => "#708090",
		"Dark Gray"		 => "#A9A9A9",
		"Gray"			 => "#808080",
		"Серый"			 => "#808080",
		"Dim Gray"		 => "#696969",
		"Light Slate Gray"	 => "#778899",
		"Slate Gray"		 => "#708090",
		"Dark Slate Gray"	 => "#2F4F4F",
		"Black"			 => "#555",
		"Черный"			 => "#555",
		"White" 		 => "#FFFFFF",
		"Белый" 		 => "#FFFFFF",
		);

if(!empty($arResult['SIMILAR'])){
    foreach($arResult['SIMILAR'] as $k => $similar)
        $arResult['SIMILAR'][$k]["PRICE"] = CPrice::GetBasePrice($similar["ID"]);
}

?>