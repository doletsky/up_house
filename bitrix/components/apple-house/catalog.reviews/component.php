<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$reviewsIBlock = $arParams['IBLOCK_REVIEW_ID'];
$catalogIBlock = $arParams['IBLOCK_CAT_ID'];
$arResult['ALLOW_NEW'] = ($arParams['ALLOW_ADD'] == 'Y') ? true : false;

$arResult["ERRORS"] = array();
// add new review
if($_REQUEST['review_add'] == 'Y' && $arResult['ALLOW_NEW']) {
	if(strlen($_POST["review_name"]) <= 1)
		$arResult["ERRORS"][] = GetMessage("REVIEW_REQ_NAME");
	if(strlen($_POST["review_text"]) <= 1)
		$arResult["ERRORS"][] = GetMessage("REVIEW_REQ_TEXT");
		
	$reviewName = htmlspecialcharsbx($_REQUEST['review_name']);
	$reviewRating = intval($_REQUEST['review_rating']);
		if($reviewRating < 1)
			$reviewRating = 1;
		elseif($reviewRating > 5)
			$reviewRating = 5;
	$reviewText = htmlspecialcharsbx($_REQUEST['review_text']);
	$productID = intval($_REQUEST['product_id']);
	
	$res = CIBlockElement::GetByID($productID);
	if(!$ar_res = $res->GetNext())
		$arResult["ERRORS"][] = GetMessage("PRODUCT_NOT_FOUND");
	
	if(empty($arResult["ERRORS"])) {
		$rateEnums = CIBlockPropertyEnum::GetList(array(), array("IBLOCK_ID"=>$reviewsIBlock, "CODE"=>"RATING"));
		while($rateFields = $rateEnums->GetNext()) {
			$arResult['RATE'][$rateFields['VALUE']] = $rateFields['ID'];
		}
		
		$el = new CIBlockElement;
		
		$PROP = array();
		$PROP[181] = $productID;
		$PROP[182] = $arResult['RATE'][$reviewRating];
		
		$arLoadProductArray = array(
			"IBLOCK_SECTION_ID" => false,
			"IBLOCK_ID"      => $reviewsIBlock,
			"PROPERTY_VALUES"=> $PROP,
			"NAME"           => $reviewName,
			"ACTIVE"         => "Y",
			"PREVIEW_TEXT"   => $reviewText
		);
		
		if(!$PRODUCT_ID = $el->Add($arLoadProductArray))
			$arResult["ERRORS"][] = $el->LAST_ERROR;
	}
}

$requestURL = $APPLICATION->GetCurPage(true);
if ($this->StartResultCache(360000, $requestURL)) {
	if($arParams['DISPLAY_MODE'] == 'section') {
		// get parent section
		$sectionCode = str_replace('/reviews/', '', $requestURL);
		$arSelect = array('ID', 'NAME', 'CODE');
		$arFilter = array('IBLOCK_ID' => $catalogIBlock, 'CODE' => $sectionCode);
		$db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
		if($ar_result = $db_list->GetNext()) {
			$arResult['SECTION']['PARENT'] = $ar_result;
		}
		
		// get children sections
		$sectionIDs = array();
		if($arResult['SECTION']['PARENT']['ID']) {
			$arSelect = array('ID', 'NAME');
			$arFilter = array('IBLOCK_ID' => $catalogIBlock, 'SECTION_ID' => $arResult['SECTION']['PARENT']['ID']);
			$db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
			while($ar_result = $db_list->GetNext()) {
				$arResult['SECTION']['ITEMS'][] = $ar_result;
				$sectionIDs[] = $ar_result['ID'];
			}
		}
		
		// get product IDs
		$productIDs = array();
		$productSelect = array("ID", "NAME", "PROPERTY_CML2_CODE");
		$productFilter = array("IBLOCK_ID" => $catalogIBlock, "SECTION_ID" => (!empty($sectionIDs)) ? $sectionIDs : $arResult['SECTION']['PARENT']['ID']);
		$product = CIBlockElement::GetList(array(), $productFilter, false, false, $productSelect);
		while($arProduct = $product->GetNext()) {
			$arResult['PRODUCT'][$arProduct['ID']] = $arProduct;
			$productIDs[] = $arProduct['ID'];
		}
		
		// get other sections
		if($arResult['SECTION']['PARENT']['ID']) {
			$arSelect = array('ID', 'NAME', 'CODE');
			$arFilter = array('IBLOCK_ID' => $catalogIBlock, 'DEPTH_LEVEL' => 1, '!ID' => $arResult['SECTION']['PARENT']['ID'], 'UF_ACTIVE'=>1);
			$db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
			while($ar_result = $db_list->GetNext()) {
				$arResult['SECTION_LINKS'][] = $ar_result;
			}
		}		
	}
	else {
		$productCode = str_replace('/catalog/', '', $requestURL);
		if($requestURL{0} == '/')
			$productCode = substr($requestURL, 1);
		
		$productSelect = array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID");
		$productFilter = array("IBLOCK_ID" => $catalogIBlock, "PROPERTY_CML2_CODE" => $productCode);
		$product = CIBlockElement::GetList(array(), $productFilter, false, false, $productSelect);
		if($arProduct = $product->GetNext()) {
			$arResult['PRODUCT'] = $arProduct;
		}
		
		// get section code
		$section = CIBlockSection::GetByID($arProduct["IBLOCK_SECTION_ID"]);
		if($ar_section = $section->GetNext()) {
			if($ar_section['DEPTH_LEVEL'] == 1) {
				$arResult['SECTION_CODE'] = $ar_section['CODE'];
				$arResult['SECTION_NAME'] = $ar_section['NAME'];
				$arResult['SECTION_ID'] = $ar_section['ID'];
			}
			elseif($ar_section['DEPTH_LEVEL'] == 2) {
				$parentSection = CIBlockSection::GetByID($ar_section["IBLOCK_SECTION_ID"]);
				if($ar_parent_section = $parentSection->GetNext()) {
					$arResult['SECTION_CODE'] = $ar_parent_section['CODE'];
					$arResult['SECTION_NAME'] = $ar_parent_section['NAME'];
					$arResult['SECTION_ID'] = $ar_parent_section['ID'];
				}
			}
		}
	}
	
	// get review list
	if($arParams['DISPLAY_MODE'] == 'section') {
		if(!empty($productIDs)) {
			$ratingCount = 0;
			$rating = 0;
			$reviewsSelect = array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "PROPERTY_RATING", "PROPERTY_PRODUCT_ID");
			$reviewsFilter = array("IBLOCK_ID" => $reviewsIBlock, "PROPERTY_PRODUCT_ID" => $productIDs);
			$reviews = CIBlockElement::GetList(array(), $reviewsFilter, false, false, $reviewsSelect);
			while($arReview = $reviews->GetNext()) {
				$arResult['ITEMS'][] = $arReview;
				$ratingCount++;
				$rating += $arReview['PROPERTY_RATING_VALUE'];
			}
			
			// Общая рейтинговая информация
			$arResult['RATING'] = round($rating/$ratingCount, 1);
			$arResult['RATING_ROUND'] = round($arResult['RATING']);
			$arResult['RATING_COUNT'] = $ratingCount;
			$resFisrtReview = CIBlockElement::GetByID($arResult['ITEMS'][0]['PROPERTY_PRODUCT_ID_VALUE']);
			$detailPic = array();
			if($arFirstReview = $resFisrtReview->GetNext())
				if($arFirstReview['DETAIL_PICTURE'])
					$detailPic = CFile::GetFileArray($arFirstReview['DETAIL_PICTURE']);
			$arResult['RATING_IMG'] = $detailPic['SRC'];
		}
		$arResult['chainName'] = $arResult['SECTION']['PARENT']['NAME'];
		$arResult['chainLink'] = $arResult['SECTION']['PARENT']['CODE'];
	}
	else {
		// get children sections
		$sectionIDs = array();
		if($arResult['SECTION_ID']) {
			$arSelect = array('ID', 'NAME');
			$arFilter = array('IBLOCK_ID' => $catalogIBlock, 'SECTION_ID' => $arResult['SECTION_ID']);
			$db_list = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
			while($ar_result = $db_list->GetNext()) {
				$arResult['SECTION']['ITEMS'][] = $ar_result;
				$sectionIDs[] = $ar_result['ID'];
			}
		}
		
		// get product IDs
		$productIDs = array();
		$productSelect = array("ID", "NAME", "PROPERTY_CML2_CODE");
		$productFilter = array("IBLOCK_ID" => $catalogIBlock, "SECTION_ID" => (!empty($sectionIDs)) ? $sectionIDs : $arResult['SECTION_ID']);
		$product = CIBlockElement::GetList(array(), $productFilter, false, false, $productSelect);
		while($arProduct = $product->GetNext()) {
			$arResult['PRODUCT'][$arProduct['ID']] = $arProduct;
			$productIDs[] = $arProduct['ID'];
		}
		
		if(!empty($productIDs)) {
			$reviewsSelect = array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "PROPERTY_RATING", "PROPERTY_PRODUCT_ID");
			$reviewsFilter = array("IBLOCK_ID" => $reviewsIBlock, "PROPERTY_PRODUCT_ID" => $productIDs);
			$reviews = CIBlockElement::GetList(array(), $reviewsFilter, false, array('nPageSize'=>4), $reviewsSelect);
			while($arReview = $reviews->GetNext()) {
				$arResult['ITEMS'][] = $arReview;
			}
		}
	}
	
	if($arParams['DISPLAY_MODE'] == 'section') {
		// Морфологическая подсказка
		$arFilter = array(
			"IBLOCK_ID" => 14,
			"ACTIVE" => "Y"
		);
		$arSelect = array('ID', 'IBLOCK_ID', 'NAME', 'PROPERTY_*');
		$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
		while($ar_fields = $res->GetNextElement()) {
			$element = $ar_fields->GetFields();
			$element['PROPERTIES'] = $ar_fields->GetProperties();
			$arResult['MORPH']['search'][] = $element['NAME'];
			$arResult['MORPH']['eng_name'][] = $element['PROPERTIES']['eng_name']['VALUE'];
			$arResult['MORPH']['rus_name'][] = $element['PROPERTIES']['rus_name']['VALUE'];
			$arResult['MORPH']['rus_name_mn'][] = $element['PROPERTIES']['rus_name_mn']['VALUE'];
			$arResult['MORPH']['eng_name_r'][] = $element['PROPERTIES']['eng_name_r']['VALUE'];
		}
		
		$arResult['pageTitle'] = 'Отзывы ' . $arResult['SECTION']['PARENT']['NAME'] . ', достоинства и недостатки ' . str_replace($arResult['MORPH']['search'], $arResult['MORPH']['rus_name'],  $arResult['SECTION']['PARENT']['NAME']) . '. Мнения покупателей о ' . $arResult['SECTION']['PARENT']['NAME'] . '. Читайте другие отзывы о товарах Apple.';

	}

	$this->SetResultCacheKeys(array(
		"pageTitle",
		"chainLink",
		"chainName",
	));
	
	$this->IncludeComponentTemplate();
}

if($arParams['DISPLAY_MODE'] == 'section') {
	$APPLICATION->AddChainItem($arResult['chainName'], '/' . $arResult['chainLink']);
	$APPLICATION->SetTitle($arResult['pageTitle']);
}
?>