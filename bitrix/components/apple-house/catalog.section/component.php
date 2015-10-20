<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CUtil::InitJSCore(array('popup'));

CPageOption::SetOptionString("main", "nav_page_in_session", "N");
/*************************************************************************
    Processing of received parameters
*************************************************************************/

if(!isset($arParams["CACHE_TIME"]))
    $arParams["CACHE_TIME"] = 36000000;

$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);

$arParams["SECTION_ID"] = intval($arParams["~SECTION_ID"]);
if($arParams["SECTION_ID"] > 0 && $arParams["SECTION_ID"]."" != $arParams["~SECTION_ID"])
{
    ShowError(GetMessage("CATALOG_SECTION_NOT_FOUND"));
    @define("ERROR_404", "Y");
    if($arParams["SET_STATUS_404"]==="Y")
        CHTTP::SetStatus("404 Not Found");
    return;
}

if (!in_array($arParams["INCLUDE_SUBSECTIONS"], array('Y', 'A', 'N')))
    $arParams["INCLUDE_SUBSECTIONS"] = 'Y';
$arParams["SHOW_ALL_WO_SECTION"] = $arParams["SHOW_ALL_WO_SECTION"]==="Y";

if(strlen($arParams["ELEMENT_SORT_FIELD"])<=0)
    $arParams["ELEMENT_SORT_FIELD"]="sort";

if(!preg_match('/^(asc|desc|nulls)(,asc|,desc|,nulls){0,1}$/i', $arParams["ELEMENT_SORT_ORDER"]))
    $arParams["ELEMENT_SORT_ORDER"]="asc";

if(strlen($arParams["FILTER_NAME"])<=0 || !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["FILTER_NAME"]))
{
    $arrFilter = array();
}
else
{
    global ${$arParams["FILTER_NAME"]};
    $arrFilter = ${$arParams["FILTER_NAME"]};
    if(!is_array($arrFilter))
        $arrFilter = array();
}

$arParams["SECTION_URL"]=trim($arParams["SECTION_URL"]);
$arParams["DETAIL_URL"]=trim($arParams["DETAIL_URL"]);
$arParams["BASKET_URL"]=trim($arParams["BASKET_URL"]);
if(strlen($arParams["BASKET_URL"])<=0)
    $arParams["BASKET_URL"] = "/personal/basket.php";

$arParams["ACTION_VARIABLE"]=trim($arParams["ACTION_VARIABLE"]);
if(strlen($arParams["ACTION_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["ACTION_VARIABLE"]))
    $arParams["ACTION_VARIABLE"] = "action";

$arParams["PRODUCT_ID_VARIABLE"]=trim($arParams["PRODUCT_ID_VARIABLE"]);
if(strlen($arParams["PRODUCT_ID_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["PRODUCT_ID_VARIABLE"]))
    $arParams["PRODUCT_ID_VARIABLE"] = "id";

$arParams["PRODUCT_QUANTITY_VARIABLE"]=trim($arParams["PRODUCT_QUANTITY_VARIABLE"]);
if(strlen($arParams["PRODUCT_QUANTITY_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["PRODUCT_QUANTITY_VARIABLE"]))
    $arParams["PRODUCT_QUANTITY_VARIABLE"] = "quantity";

$arParams["PRODUCT_PROPS_VARIABLE"]=trim($arParams["PRODUCT_PROPS_VARIABLE"]);
if(strlen($arParams["PRODUCT_PROPS_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["PRODUCT_PROPS_VARIABLE"]))
    $arParams["PRODUCT_PROPS_VARIABLE"] = "prop";

$arParams["SECTION_ID_VARIABLE"]=trim($arParams["SECTION_ID_VARIABLE"]);
if(strlen($arParams["SECTION_ID_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["SECTION_ID_VARIABLE"]))
    $arParams["SECTION_ID_VARIABLE"] = "SECTION_ID";

$arParams["SET_TITLE"] = $arParams["SET_TITLE"]!="N";
$arParams["ADD_SECTIONS_CHAIN"] = $arParams["ADD_SECTIONS_CHAIN"]==="Y"; //Turn off by default
$arParams["DISPLAY_COMPARE"] = $arParams["DISPLAY_COMPARE"]=="Y";

$arParams["PAGE_ELEMENT_COUNT"] = intval($arParams["PAGE_ELEMENT_COUNT"]);
if($arParams["PAGE_ELEMENT_COUNT"]<=0)
    $arParams["PAGE_ELEMENT_COUNT"]=20;
$arParams["LINE_ELEMENT_COUNT"] = intval($arParams["LINE_ELEMENT_COUNT"]);
if($arParams["LINE_ELEMENT_COUNT"]<=0)
    $arParams["LINE_ELEMENT_COUNT"]=3;

if(!is_array($arParams["PROPERTY_CODE"]))
    $arParams["PROPERTY_CODE"] = array();
foreach($arParams["PROPERTY_CODE"] as $k=>$v)
    if($v==="")
        unset($arParams["PROPERTY_CODE"][$k]);

if(!is_array($arParams["PRICE_CODE"]))
    $arParams["PRICE_CODE"] = array();
$arParams["USE_PRICE_COUNT"] = $arParams["USE_PRICE_COUNT"]=="Y";
$arParams["SHOW_PRICE_COUNT"] = intval($arParams["SHOW_PRICE_COUNT"]);
if($arParams["SHOW_PRICE_COUNT"]<=0)
    $arParams["SHOW_PRICE_COUNT"]=1;
$arParams["USE_PRODUCT_QUANTITY"] = $arParams["USE_PRODUCT_QUANTITY"]==="Y";

if(!is_array($arParams["PRODUCT_PROPERTIES"]))
    $arParams["PRODUCT_PROPERTIES"] = array();
foreach($arParams["PRODUCT_PROPERTIES"] as $k=>$v)
    if($v==="")
        unset($arParams["PRODUCT_PROPERTIES"][$k]);

if (!is_array($arParams["OFFERS_CART_PROPERTIES"]))
    $arParams["OFFERS_CART_PROPERTIES"] = array();
foreach($arParams["OFFERS_CART_PROPERTIES"] as $i => $pid)
    if ($pid === "")
        unset($arParams["OFFERS_CART_PROPERTIES"][$i]);

$arParams["DISPLAY_TOP_PAGER"] = $arParams["DISPLAY_TOP_PAGER"]=="Y";
$arParams["DISPLAY_BOTTOM_PAGER"] = $arParams["DISPLAY_BOTTOM_PAGER"]!="N";
$arParams["PAGER_TITLE"] = trim($arParams["PAGER_TITLE"]);
$arParams["PAGER_SHOW_ALWAYS"] = $arParams["PAGER_SHOW_ALWAYS"]!="N";
$arParams["PAGER_TEMPLATE"] = trim($arParams["PAGER_TEMPLATE"]);
$arParams["PAGER_DESC_NUMBERING"] = $arParams["PAGER_DESC_NUMBERING"]=="Y";
$arParams["PAGER_DESC_NUMBERING_CACHE_TIME"] = intval($arParams["PAGER_DESC_NUMBERING_CACHE_TIME"]);
$arParams["PAGER_SHOW_ALL"] = $arParams["PAGER_SHOW_ALL"]!=="N";


$arParams["ONLY_ACTIVE"] = ((isset($arParams["ONLY_ACTIVE"])) ? $arParams["ONLY_ACTIVE"] : '');

$arNavParams = array(
    "nPageSize" => $arParams["PAGE_ELEMENT_COUNT"],
    "bDescPageNumbering" => $arParams["PAGER_DESC_NUMBERING"],
    "bShowAll" => $arParams["PAGER_SHOW_ALL"],
);
$arNavigation = CDBResult::GetNavParams($arNavParams);
if($arNavigation["PAGEN"]==0 && $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"]>0)
    $arParams["CACHE_TIME"] = $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"];

$arParams["CACHE_FILTER"]=$arParams["CACHE_FILTER"]=="Y";
if(!$arParams["CACHE_FILTER"] && count($arrFilter)>0)
    $arParams["CACHE_TIME"] = 0;

$arParams["PRICE_VAT_INCLUDE"] = $arParams["PRICE_VAT_INCLUDE"] !== "N";

$arParams['CONVERT_CURRENCY'] = (isset($arParams['CONVERT_CURRENCY']) && 'Y' == $arParams['CONVERT_CURRENCY'] ? 'Y' : 'N');
$arParams['CURRENCY_ID'] = trim(strval($arParams['CURRENCY_ID']));
if ('' == $arParams['CURRENCY_ID'])
{
    $arParams['CONVERT_CURRENCY'] = 'N';
}
elseif ('N' == $arParams['CONVERT_CURRENCY'])
{
    $arParams['CURRENCY_ID'] = '';
}

$arParams["OFFERS_LIMIT"] = intval($arParams["OFFERS_LIMIT"]);
if (0 > $arParams["OFFERS_LIMIT"])
    $arParams["OFFERS_LIMIT"] = 0;

// Title
$arSelect = array('ID', 'UF_SHOW_SMART_FILTER', 'UF_TITLE');
$arFilter = Array('IBLOCK_ID' => $arParams["IBLOCK_ID"], 'ID' => $arParams["SECTION_ID"]);

$rsSection = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
$sectionFields = $rsSection->GetNext();

if ($sectionFields !== false) {
    $arResult['SHOW_SMART_FILTER'] = $sectionFields['UF_SHOW_SMART_FILTER'];
    //$arResult['UF_TITLE'] = $sectionFields['UF_TITLE'];
    $strTITLE = $sectionFields['UF_TITLE'];
}

/*************************************************************************
            Processing of the Buy link
*************************************************************************/
$strError = "";
if (array_key_exists($arParams["ACTION_VARIABLE"], $_REQUEST) && array_key_exists($arParams["PRODUCT_ID_VARIABLE"], $_REQUEST))
{
    if(array_key_exists($arParams["ACTION_VARIABLE"]."BUY", $_REQUEST))
        $action = "BUY";
    elseif(array_key_exists($arParams["ACTION_VARIABLE"]."ADD2BASKET", $_REQUEST))
        $action = "ADD2BASKET";
    else
        $action = strtoupper($_REQUEST[$arParams["ACTION_VARIABLE"]]);
        
    $productID = intval($_REQUEST[$arParams["PRODUCT_ID_VARIABLE"]]);
    if(($action == "ADD2BASKET" || $action == "BUY" || $action == "SUBSCRIBE_PRODUCT") && $productID > 0)
    {
        if(CModule::IncludeModule("iblock") && CModule::IncludeModule("sale") && CModule::IncludeModule("catalog"))
        {
            if($arParams["USE_PRODUCT_QUANTITY"])
                $QUANTITY = intval($_REQUEST[$arParams["PRODUCT_QUANTITY_VARIABLE"]]);
            if($QUANTITY <= 1)
                $QUANTITY = 1;

            $product_properties = array();

            $rsItems = CIBlockElement::GetList(array(), array('ID' => $productID), false, false, array('ID', 'IBLOCK_ID'));
            if ($arItem = $rsItems->Fetch())
            {
                $arItem['IBLOCK_ID'] = intval($arItem['IBLOCK_ID']);
                if ($arItem['IBLOCK_ID'] == $arParams["IBLOCK_ID"])
                {
                    if (!empty($arParams["PRODUCT_PROPERTIES"]))
                    {
                        if (
                            array_key_exists($arParams["PRODUCT_PROPS_VARIABLE"], $_REQUEST)
                            && is_array($_REQUEST[$arParams["PRODUCT_PROPS_VARIABLE"]])
                        )
                        {
                            $product_properties = CIBlockPriceTools::CheckProductProperties(
                                $arParams["IBLOCK_ID"],
                                $productID,
                                $arParams["PRODUCT_PROPERTIES"],
                                $_REQUEST[$arParams["PRODUCT_PROPS_VARIABLE"]]
                            );
                            if (!is_array($product_properties))
                                $strError = GetMessage("CATALOG_ERROR2BASKET").".";
                        }
                        else
                        {
                            $strError = GetMessage("CATALOG_ERROR2BASKET").".";
                        }
                    }
                }
                else
                {
                    if (!empty($arParams["OFFERS_CART_PROPERTIES"]))
                    {
                        $product_properties = CIBlockPriceTools::GetOfferProperties(
                            $productID,
                            $arParams["IBLOCK_ID"],
                            $arParams["OFFERS_CART_PROPERTIES"]
                        );
                    }
                }
            }
            else
            {
                $strError = GetMessage('CATALOG_PRODUCT_NOT_FOUND').".";
            }

            $notifyOption = COption::GetOptionString("sale", "subscribe_prod", "");
            $arNotify = unserialize($notifyOption);

            if ($action == "SUBSCRIBE_PRODUCT" && $arNotify[SITE_ID]['use'] == 'Y')
            {
                $arRewriteFields["SUBSCRIBE"] = "Y";
                $arRewriteFields["CAN_BUY"] = "N";
            }
            
            // в кредит
            if($_REQUEST['credit'] == 'Y') {
                $product_properties[] = array(
                    "NAME" => "Кредит",
                    "CODE" => "Credit", 
                    "VALUE" => "Да", 
                    "SORT" => "100"
                );
            }
            
            if($_REQUEST['preorder'] == 'Y') {
                $product_properties[] = array(
                    "NAME" => "Предзаказ",
                    "CODE" => "Preorder", 
                    "VALUE" => "Да", 
                    "SORT" => "100"
                );
            }

            if(!$strError && Add2BasketByProductID($productID, $QUANTITY, $arRewriteFields, $product_properties))
            {
                if($action == "ADD2BASKET")
                    LocalRedirect($arParams["BASKET_URL"]);
                else
                    LocalRedirect($APPLICATION->GetCurPageParam("", array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"], 'credit')));
            }
            else
            {
                if($ex = $GLOBALS["APPLICATION"]->GetException())
                    $strError = $ex->GetString();
                else
                    $strError = GetMessage("CATALOG_ERROR2BASKET").".";
            }
        }
    }
}
if(strlen($strError)>0)
{
    ShowError($strError);
    return;
}
/*************************************************************************
            Work with cache
*************************************************************************/

if($this->StartResultCache(false, array($arrFilter, ($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups()), $arNavigation)))
{
    if(!CModule::IncludeModule("iblock"))
    {
        $this->AbortResultCache();
        ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
        return;
    }

    global $CACHE_MANAGER;
    $arConvertParams = array();
    if ('Y' == $arParams['CONVERT_CURRENCY'])
    {
        if (!CModule::IncludeModule('currency'))
        {
            $arParams['CONVERT_CURRENCY'] = 'N';
            $arParams['CURRENCY_ID'] = '';
        }
        else
        {
            $arCurrencyInfo = CCurrency::GetByID($arParams['CURRENCY_ID']);
            if (!(is_array($arCurrencyInfo) && !empty($arCurrencyInfo)))
            {
                $arParams['CONVERT_CURRENCY'] = 'N';
                $arParams['CURRENCY_ID'] = '';
            }
            else
            {
                $arParams['CURRENCY_ID'] = $arCurrencyInfo['CURRENCY'];
                $arConvertParams['CURRENCY_ID'] = $arCurrencyInfo['CURRENCY'];
            }
        }
    }

    $arSelect = array();
    if(isset($arParams["SECTION_USER_FIELDS"]) && is_array($arParams["SECTION_USER_FIELDS"]))
    {
        foreach($arParams["SECTION_USER_FIELDS"] as $field)
            if(is_string($field) && preg_match("/^UF_/", $field))
                $arSelect[] = $field;
    }
    if(preg_match("/^UF_/", $arParams["META_KEYWORDS"])) $arSelect[] = $arParams["META_KEYWORDS"];
    if(preg_match("/^UF_/", $arParams["META_DESCRIPTION"])) $arSelect[] = $arParams["META_DESCRIPTION"];
    if(preg_match("/^UF_/", $arParams["BROWSER_TITLE"])) $arSelect[] = $arParams["BROWSER_TITLE"];

    $arFilter = array(
        "IBLOCK_ID"=>$arParams["IBLOCK_ID"],
        "IBLOCK_ACTIVE"=>"Y",
        "ACTIVE"=>"Y",
        "GLOBAL_ACTIVE"=>"Y",
    );

    $bSectionFound = false;
    //Hidden triky parameter USED to display linked
    //by default it is not set
    if($arParams["BY_LINK"]==="Y")
    {
        $arResult = array(
            "ID" => 0,
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        );
        $bSectionFound = true;
    }
    elseif(strlen($arParams["SECTION_CODE"]) > 0)
    {
        $arFilter["CODE"]=$arParams["SECTION_CODE"];
        $rsSection = CIBlockSection::GetList(Array(), $arFilter, false, $arSelect);
        $rsSection->SetUrlTemplates("", $arParams["SECTION_URL"]);
        $arResult = $rsSection->GetNext();
        if($arResult)
            $bSectionFound = true;
    }
    elseif($arParams["SECTION_ID"])
    {
        $arFilter["ID"]=$arParams["SECTION_ID"];
        $rsSection = CIBlockSection::GetList(Array(), $arFilter, false, $arSelect);
        $rsSection->SetUrlTemplates("", $arParams["SECTION_URL"]);
        $arResult = $rsSection->GetNext();
        if($arResult)
            $bSectionFound = true;
    }
    else
    {
        //Root section (no section filter)
        $arResult = array(
            "ID" => 0,
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        );
        $bSectionFound = true;
    }

    $arResult['SHOW_SMART_FILTER'] = $sectionFields['UF_SHOW_SMART_FILTER'];


    //if no section chars - look for parent section chars
    if(empty($arResult['UF_SECTION_CHARS']) && $arResult['DEPTH_LEVEL'] > 1) {
        $arSelect = array('ID', 'UF_SECTION_CHARS');
        $arFilter["ID"] = $arResult["IBLOCK_SECTION_ID"];
        $rsSection = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);
        $sectionFields = $rsSection->GetNext();
        $arResult['UF_SECTION_CHARS'] = $sectionFields['UF_SECTION_CHARS'];
    }

    // if nothing then default
    //if(empty($arResult['UF_SECTION_CHARS']))
        $arResult['UF_SECTION_CHARS'] = array('PROTSESSOR', 'OBEM_PAMYATI', 'TSVET', 'PROIZVODITEL', 'SOVMESTIMOST', 'FORM_FAKTOR');

    if(!$bSectionFound)
    {
        $this->AbortResultCache();
        ShowError(GetMessage("CATALOG_SECTION_NOT_FOUND"));
        @define("ERROR_404", "Y");
        if($arParams["SET_STATUS_404"]==="Y")
            CHTTP::SetStatus("404 Not Found");
        return;
    }
    elseif($arResult["ID"] > 0 && $arParams["ADD_SECTIONS_CHAIN"])
    {
        $arResult["PATH"] = array();
        $rsPath = GetIBlockSectionPath($arResult["IBLOCK_ID"], $arResult["ID"]);
        $rsPath->SetUrlTemplates("", $arParams["SECTION_URL"]);
        while($arPath = $rsPath->GetNext())
        {
            $arResult["PATH"][]=$arPath;
        }
    }

    $bCatalog = CModule::IncludeModule('catalog');
    //This function returns array with prices description and access rights
    //in case catalog module n/a prices get values from element properties
    $arResult["PRICES"] = CIBlockPriceTools::GetCatalogPrices($arParams["IBLOCK_ID"], $arParams["PRICE_CODE"]);

    $arResult['CONVERT_CURRENCY'] = $arConvertParams;

    $arResult["PICTURE"] = CFile::GetFileArray($arResult["PICTURE"]);
    $arResult["DETAIL_PICTURE"] = CFile::GetFileArray($arResult["DETAIL_PICTURE"]);

    // list of the element fields that will be used in selection
    $arSelect = array(
        "ID",
        "IBLOCK_ID",
        "CODE",
        "XML_ID",
        "NAME",
        "ACTIVE",
        "DATE_ACTIVE_FROM",
        "DATE_ACTIVE_TO",
        "SORT",
        "PREVIEW_TEXT",
        "PREVIEW_TEXT_TYPE",
        "DETAIL_TEXT",
        "DETAIL_TEXT_TYPE",
        "DATE_CREATE",
        "CREATED_BY",
        "TIMESTAMP_X",
        "MODIFIED_BY",
        "TAGS",
        "IBLOCK_SECTION_ID",
        "DETAIL_PAGE_URL",
        "DETAIL_PICTURE",
        "PREVIEW_PICTURE",
        "PROPERTY_*",
    );
    
    $arFilter = array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "IBLOCK_LID" => SITE_ID,
        "IBLOCK_ACTIVE" => "Y",
        "ACTIVE_DATE" => "Y",
        "ACTIVE" => ($arParams["ONLY_ACTIVE"] == 'N' ? '' : 'Y'),
        "CHECK_PERMISSIONS" => "Y",
        "MIN_PERMISSION" => "R",
        "INCLUDE_SUBSECTIONS" => ($arParams["INCLUDE_SUBSECTIONS"] == 'N' ? 'N' : 'Y'),
    );

    if ($arParams["IBLOCK_ID"] != 18) {
        $arFilter["!PREVIEW_PICTURE"] = false;
    }
    
    // get opitons IDs
    $optionsIDs = array();
    if($arResult['DEPTH_LEVEL'] == 1) { 
        $arSecOptionFilter = array('IBLOCK_ID' => $arParams["IBLOCK_ID"], 'NAME' => 'Опции%', 'SECTION_ID' => $arResult['ID']);
        $arSecOptionSelect = array('ID', 'NAME');
        $dbSecOptionList = CIBlockSection::GetList(array(), $arSecOptionFilter, false, $arSecOptionSelect);
        $arOptionsParent = $dbSecOptionList->GetNext();
        
        if($arOptionsParent['ID']) {
            $optionsSections = array();
            $optionsSectionsFilter = array('IBLOCK_ID' => $arParams["IBLOCK_ID"], 'SECTION_ID' => $arOptionsParent['ID']);
            $optionsSectionsSelect = array('ID');
            $optionsSectionsList = CIBlockSection::GetList(array(), $optionsSectionsFilter, false, $optionsSectionsSelect);
            while($arOptionSection = $optionsSectionsList->GetNext()) {
                $optionsSections[] = $arOptionSection['ID'];
            }
        }
        
        if(!empty($optionsSections)) {
            $arOptions = array();
            $arOptionsFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], 'SECTION_ID' => $optionsSections);
            $arOptionsSelect = array('ID');
            $optionsRes = CIBlockElement::GetList(array(), $arOptionsFilter, false, false, $arOptionsSelect);
            while($arOption = $optionsRes->GetNext()) {
                $arOptions[] = $arOption['ID'];
            }
        }
    
        if(!empty($arOptions))
            $arFilter['!ID'] = $arOptions;
    }

    if ($arParams["INCLUDE_SUBSECTIONS"] == 'A')
        $arFilter["SECTION_GLOBAL_ACTIVE"] = "Y";

    if($arParams["BY_LINK"]!=="Y")
    {
        if($arResult["ID"])
            $arFilter["SECTION_ID"] = $arResult["ID"];
        elseif(!$arParams["SHOW_ALL_WO_SECTION"])
            $arFilter["SECTION_ID"] = 0;
        else
        {
            if (is_set($arFilter, 'INCLUDE_SUBSECTIONS'))
                unset($arFilter["INCLUDE_SUBSECTIONS"]);
            if (is_set($arFilter, 'SECTION_GLOBAL_ACTIVE'))
                unset($arFilter["SECTION_GLOBAL_ACTIVE"]);
        }
    }

    if(is_array($arrFilter["OFFERS"]))
    {
        $arOffersIBlock = CIBlockPriceTools::GetOffersIBlock($arParams["IBLOCK_ID"]);
        if(is_array($arOffersIBlock))
        {
            if(!empty($arrFilter["OFFERS"]))
            {
                $arSubFilter = $arrFilter["OFFERS"];
                $arSubFilter["IBLOCK_ID"] = $arOffersIBlock["OFFERS_IBLOCK_ID"];
                $arSubFilter["ACTIVE_DATE"] = "Y";

                if($arParams["ONLY_ACTIVE"] != 'N')
//                  $arSubFilter["ACTIVE"] = ($arParams["ONLY_ACTIVE"] == 'N' ? 'N' : 'Y');
//                else
                    $arSubFilter["ACTIVE"] = 'Y';

                $arFilter["=ID"] = CIBlockElement::SubQuery("PROPERTY_".$arOffersIBlock["OFFERS_PROPERTY_ID"], $arSubFilter);
            }

            $arPriceFilter = array();
            foreach($arrFilter as $key => $value)
            {
                if(preg_match('/^(>=|<=)CATALOG_PRICE_/', $key))
                {
                    $arPriceFilter[$key] = $value;
                    unset($arrFilter[$key]);
                }
            }

            if(!empty($arPriceFilter))
            {
                $arSubFilter = $arPriceFilter;
                $arSubFilter["IBLOCK_ID"] = $arOffersIBlock["OFFERS_IBLOCK_ID"];
                $arSubFilter["ACTIVE_DATE"] = "Y";
                $arSubFilter["ACTIVE"] = "Y";
                $arFilter[] = array(
                    "LOGIC" => "OR",
                    array($arPriceFilter),
                    "=ID" => CIBlockElement::SubQuery("PROPERTY_".$arOffersIBlock["OFFERS_PROPERTY_ID"], $arSubFilter),
                );
            }
        }
    }

    //PRICES
    $arPriceTypeID = array();
    if(!$arParams["USE_PRICE_COUNT"])
    {
        foreach($arResult["PRICES"] as &$value)
        {
            $arSelect[] = $value["SELECT"];
            $arFilter["CATALOG_SHOP_QUANTITY_".$value["ID"]] = $arParams["SHOW_PRICE_COUNT"];
        }
        if (isset($value))
            unset($value);
    }
    else
    {
        foreach ($arResult["PRICES"] as &$value)
        {
            $arPriceTypeID[] = $value["ID"];
        }
        if (isset($value))
            unset($value);
    }

    $arSort = array(
        $arParams["ELEMENT_SORT_FIELD"] => $arParams["ELEMENT_SORT_ORDER"],
        "ID" => "DESC",
    );

    $arCurrencyList = array();

    //EXECUTE
//    unset($arrFilter['CATALOG_QUANTITY']);// = 0;
//    unset($arFilter['CATALOG_QUANTITY']);// = 0;
    $rsElements = CIBlockElement::GetList($arSort, array_merge($arrFilter, $arFilter), false, $arNavParams, $arSelect);
    $rsElements->SetUrlTemplates($arParams["DETAIL_URL"]);
    if($arParams["BY_LINK"]!=="Y" && !$arParams["SHOW_ALL_WO_SECTION"])
        $rsElements->SetSectionContext($arResult);
    $arResult["ITEMS"] = array();
    while($obElement = $rsElements->GetNextElement())
    {
        $arItem = $obElement->GetFields();

        $arItem['ACTIVE_FROM'] = $arItem['DATE_ACTIVE_FROM'];
        $arItem['ACTIVE_TO'] = $arItem['DATE_ACTIVE_TO'];

        if($arResult["ID"])
            $arItem["IBLOCK_SECTION_ID"] = $arResult["ID"];

        $arButtons = CIBlock::GetPanelButtons(
            $arItem["IBLOCK_ID"],
            $arItem["ID"],
            $arResult["ID"],
            array("SECTION_BUTTONS"=>false, "SESSID"=>false, "CATALOG"=>true)
        );
        $arItem["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
        $arItem["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

        $arItem["PREVIEW_PICTURE"] = CFile::GetFileArray($arItem["PREVIEW_PICTURE"]);
        $arItem["DETAIL_PICTURE"] = CFile::GetFileArray($arItem["DETAIL_PICTURE"]);

        if(count($arParams["PROPERTY_CODE"]))
            $arItem["PROPERTIES"] = $obElement->GetProperties();
        elseif(count($arParams["PRODUCT_PROPERTIES"]))
            $arItem["PROPERTIES"] = $obElement->GetProperties();

        $arItem["DISPLAY_PROPERTIES"] = array();
        foreach($arParams["PROPERTY_CODE"] as $pid)
        {
            $prop = &$arItem["PROPERTIES"][$pid];
            if(
                (is_array($prop["VALUE"]) && count($prop["VALUE"]) > 0)
                || (!is_array($prop["VALUE"]) && strlen($prop["VALUE"]) > 0)
            )
            {
                $arItem["DISPLAY_PROPERTIES"][$pid] = CIBlockFormatProperties::GetDisplayValue($arItem, $prop, "catalog_out");
            }
        }

        $arItem["PRODUCT_PROPERTIES"] = CIBlockPriceTools::GetProductProperties(
            $arParams["IBLOCK_ID"],
            $arItem["ID"],
            $arParams["PRODUCT_PROPERTIES"],
            $arItem["PROPERTIES"]
        );

        if($arParams["USE_PRICE_COUNT"])
        {
            if ($bCatalog)
            {
                $arItem["PRICE_MATRIX"] = CatalogGetPriceTableEx($arItem["ID"], 0, $arPriceTypeID, 'Y', $arConvertParams);
                foreach($arItem["PRICE_MATRIX"]["COLS"] as $keyColumn=>$arColumn)
                    $arItem["PRICE_MATRIX"]["COLS"][$keyColumn]["NAME_LANG"] = htmlspecialcharsex($arColumn["NAME_LANG"]);
            }
            else
            {
                $arItem["PRICE_MATRIX"] = false;
            }
            $arItem["PRICES"] = array();
        }
        else
        {
            $arItem["PRICE_MATRIX"] = false;
            $arItem["PRICES"] = CIBlockPriceTools::GetItemPrices($arParams["IBLOCK_ID"], $arResult["PRICES"], $arItem, $arParams['PRICE_VAT_INCLUDE'], $arConvertParams);
        }
        $arItem["CAN_BUY"] = CIBlockPriceTools::CanBuy($arParams["IBLOCK_ID"], $arResult["PRICES"], $arItem);

        $arItem["BUY_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($arParams["ACTION_VARIABLE"]."=BUY&".$arParams["PRODUCT_ID_VARIABLE"]."=".$arItem["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));
        $arItem["ADD_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($arParams["ACTION_VARIABLE"]."=ADD2BASKET&".$arParams["PRODUCT_ID_VARIABLE"]."=".$arItem["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));
        $arItem["COMPARE_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam("action=ADD_TO_COMPARE_LIST&id=".$arItem["ID"], array("action", "id")));
        $arItem["SUBSCRIBE_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($arParams["ACTION_VARIABLE"]."=SUBSCRIBE_PRODUCT&id=".$arItem["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));
        //$arItem["PRODUCT_ID"] = $arItem["ID"];

        $arItem["SECTION"]["PATH"] = array();
        if($arParams["BY_LINK"]==="Y")
        {
            $rsPath = GetIBlockSectionPath($arItem["IBLOCK_ID"], $arItem["IBLOCK_SECTION_ID"]);
            $rsPath->SetUrlTemplates("", $arParams["SECTION_URL"]);
            while($arPath = $rsPath->GetNext())
            {
                $arItem["SECTION"]["PATH"][]=$arPath;
            }
        }

        if ('Y' == $arParams['CONVERT_CURRENCY'])
        {
            if ($arParams["USE_PRICE_COUNT"])
            {
                if (is_array($arItem["PRICE_MATRIX"]) && !empty($arItem["PRICE_MATRIX"]))
                {
                    if (isset($arItem["PRICE_MATRIX"]['CURRENCY_LIST']) && is_array($arItem["PRICE_MATRIX"]['CURRENCY_LIST']))
                        $arCurrencyList = array_merge($arCurrencyList, $arItem["PRICE_MATRIX"]['CURRENCY_LIST']);
                }
            }
            else
            {
                if (!empty($arItem["PRICES"]))
                {
                    foreach ($arItem["PRICES"] as &$arOnePrices)
                    {
                        if (isset($arOnePrices['ORIG_CURRENCY']))
                            $arCurrencyList[] = $arOnePrices['ORIG_CURRENCY'];
                    }
                    if (isset($arOnePrices))
                        unset($arOnePrices);
                }
            }
        }

//       var_dump($arItem);
        $arResult["ITEMS"][]=$arItem;
        $arResult["ELEMENTS"][] = $arItem["ID"];
    }

    $arResult["NAV_STRING"] = $rsElements->GetPageNavStringEx($navComponentObject, $arParams["PAGER_TITLE"], $arParams["PAGER_TEMPLATE"], $arParams["PAGER_SHOW_ALWAYS"]);
    $arResult["NAV_CACHED_DATA"] = $navComponentObject->GetTemplateCachedData();
    $arResult["NAV_RESULT"] = $rsElements;
    
    $arResult["NAV_CUR_PAGE"] = $rsElements->NavPageNomer;
    $arResult["NAV_PAGE_COUNT"] = $rsElements->NavPageCount;

    if(!isset($arParams["OFFERS_FIELD_CODE"]))
        $arParams["OFFERS_FIELD_CODE"] = array();
    elseif (!is_array($arParams["OFFERS_FIELD_CODE"]))
        $arParams["OFFERS_FIELD_CODE"] = array($arParams["OFFERS_FIELD_CODE"]);
    foreach($arParams["OFFERS_FIELD_CODE"] as $key => $value)
        if($value === "")
            unset($arParams["OFFERS_FIELD_CODE"][$key]);

    if(!isset($arParams["OFFERS_PROPERTY_CODE"]))
        $arParams["OFFERS_PROPERTY_CODE"] = array();
    elseif (!is_array($arParams["OFFERS_PROPERTY_CODE"]))
        $arParams["OFFERS_PROPERTY_CODE"] = array($arParams["OFFERS_PROPERTY_CODE"]);
    foreach($arParams["OFFERS_PROPERTY_CODE"] as $key => $value)
        if($value === "")
            unset($arParams["OFFERS_PROPERTY_CODE"][$key]);

    if(
        !empty($arResult["ELEMENTS"])
        && (
            !empty($arParams["OFFERS_FIELD_CODE"])
            || !empty($arParams["OFFERS_PROPERTY_CODE"])
        )
    )
    {
        $arOffers = CIBlockPriceTools::GetOffersArray(
            $arParams["IBLOCK_ID"]
            ,$arResult["ELEMENTS"]
            ,array(
                $arParams["OFFERS_SORT_FIELD"] => $arParams["OFFERS_SORT_ORDER"],
                "ID" => "DESC",
            )
            ,$arParams["OFFERS_FIELD_CODE"]
            ,$arParams["OFFERS_PROPERTY_CODE"]
            ,$arParams["OFFERS_LIMIT"]
            ,$arResult["PRICES"]
            ,$arParams['PRICE_VAT_INCLUDE']
            ,$arConvertParams
        );
        if(!empty($arOffers))
        {
            $arElementOffer = array();
            foreach($arResult["ELEMENTS"] as $i => $id)
            {
                $arResult["ITEMS"][$i]["OFFERS"] = array();
                $arElementOffer[$id] = &$arResult["ITEMS"][$i]["OFFERS"];
            }

            foreach($arOffers as $arOffer)
            {
                if(array_key_exists($arOffer["LINK_ELEMENT_ID"], $arElementOffer))
                {
                    $arOffer["BUY_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($arParams["ACTION_VARIABLE"]."=BUY&".$arParams["PRODUCT_ID_VARIABLE"]."=".$arOffer["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));
                    $arOffer["ADD_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($arParams["ACTION_VARIABLE"]."=ADD2BASKET&".$arParams["PRODUCT_ID_VARIABLE"]."=".$arOffer["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));
                    $arOffer["COMPARE_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam("action=ADD_TO_COMPARE_LIST&id=".$arOffer["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));
                    $arOffer["SUBSCRIBE_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($arParams["ACTION_VARIABLE"]."=SUBSCRIBE_PRODUCT&id=".$arOffer["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));

                    $arElementOffer[$arOffer["LINK_ELEMENT_ID"]][] = $arOffer;

                    if ('Y' == $arParams['CONVERT_CURRENCY'])
                    {
                        if (!empty($arOffer['PRICES']))
                        {
                            foreach ($arOffer['PRICES'] as &$arOnePrices)
                            {
                                if (isset($arOnePrices['ORIG_CURRENCY']))
                                    $arCurrencyList[] = $arOnePrices['ORIG_CURRENCY'];
                            }
                            if (isset($arOnePrices))
                                unset($arOnePrices);
                        }
                    }
                }
            }
        }
    }

    if ('Y' == $arParams['CONVERT_CURRENCY'])
    {
        if (!empty($arCurrencyList))
        {
            if (defined("BX_COMP_MANAGED_CACHE"))
            {
                $arCurrencyList[] = $arConvertParams['CURRENCY_ID'];
                $arCurrencyList = array_unique($arCurrencyList);
                $CACHE_MANAGER->StartTagCache($this->GetCachePath());
                foreach ($arCurrencyList as &$strOneCurrency)
                {
                    $CACHE_MANAGER->RegisterTag("currency_id_".$strOneCurrency);
                }
                if (isset($strOneCurrency))
                    unset($strOneCurrency);
                $CACHE_MANAGER->EndTagCache();
            }
        }
    }

    // parent section
/*
    if($arResult['DEPTH_LEVEL'] == 2) {
        $obParentSection = CIBlockSection::GetByID($arResult['IBLOCK_SECTION_ID']);
        if($parentSection = $obParentSection->GetNext()) {
            $arResult['PARENT_SECTION']['NAME'] = $parentSection['NAME'];
            $arResult['PARENT_SECTION']['CODE'] = $parentSection['CODE'];
            $arResult['PARENT_SECTION']['ID'] = $parentSection['ID'];
        }
    }
    else {
        $arResult['PARENT_SECTION']['NAME'] = $arResult['NAME'];
        $arResult['PARENT_SECTION']['CODE'] = $arResult['CODE'];
        $arResult['PARENT_SECTION']['ID'] = $arResult['ID'];
    }
*/

    // get filter section
    $filterArgs = array('IBLOCK_ID' => 16, 'GLOBAL_ACTIVE'=>'Y', 'UF_SECTION'=>$arResult['ID']);
    $filterFields = array('ID');
    $filter = CIBlockSection::GetList(array(), $filterArgs, false, $filterFields);
//    $ar_sfilter = $filter_slist->GetNext();
    if($filter->SelectedRowsCount() == 0)
    {
        $obParentSection = CIBlockSection::GetByID($arResult['IBLOCK_SECTION_ID']);
        if($obParentSection->SelectedRowsCount() > 0) {
            $parentSection = $obParentSection->GetNext();
            $filterArgs['UF_SECTION'] = $parentSection['ID'];
            $filter = CIBlockSection::GetList(array(), $filterArgs, false, $filterFields);
        }

    }

    // filter
    if($filter->SelectedRowsCount() > 0)
    {
        $ar_sfilter = $filter->GetNext();

        // getting filter elements
        $filterSectionIDs = array();

        if($ar_sfilter['ID'])
        {
            $arFilter = array( "IBLOCK_ID" => 16
                             , "SECTION_ID" => $ar_sfilter['ID']
                             //, "!PROPERTY_SECTION" => $arResult['ID']
                             , "ACTIVE" => "Y"
                             );
            $arSelect = array('ID', 'NAME', 'PREVIEW_PICTURE', 'PROPERTY_*');
//            $filter_res = CIBlockElement::GetList(array('SORT'=>'ASC'), $arFilter, false, false, $arSelect);
            $filter_res = CIBlockElement::GetList(array('SORT'=>'ASC'), $arFilter, false, false);
            $ar_filter = array();
            while($res_filter = $filter_res->GetNextElement())
            {
                $ar_filter = $res_filter->GetFields();
                if($ar_filter['PREVIEW_PICTURE'])
                {
                    $ar_filter['PREVIEW_PICTURE'] = CFile::GetFileArray($ar_filter['PREVIEW_PICTURE']);
                }
                $ar_filter['PROPERTIES'] = $res_filter->GetProperties();
                if($ar_filter['PROPERTIES']['SECTION']['VALUE'] == $arResult['ID'])
                {
                    $ar_filter['SELECTED'] = true;
                    $ar_filter['FILTER_CODE'] = $arResult["CODE"];
                }
                else
                {
                    $ar_filter['SELECTED'] = false;
                    $linkFilter = array("ID" => $ar_filter['PROPERTIES']['SECTION']['VALUE']);
                    $linkSelect = array('CODE');
                    $linkSelection = CIBlockSection::GetList(Array(), $linkFilter, false, false, $linkSelect);
                    $linkFields = $linkSelection->GetNextElement()->GetFields();
                    $ar_filter['FILTER_CODE'] = $linkFields["CODE"];
                }

                $arResult['SECTION_FILTER'][$ar_filter['PROPERTIES']['TYPE']['VALUE_XML_ID']][] = $ar_filter;
                $filterSectionIDs[] = $ar_filter['PROPERTIES']['SECTION']['VALUE'];
            }
        }

    }
    $sectionChilds = array();
    // section childs and siblings
    if($arResult['ID']) {
/*
        if($arResult['DEPTH_LEVEL'] == 2) {
            $arFilter = array('IBLOCK_ID'=>$arResult['IBLOCK_ID'], 'SECTION_ID'=>$arResult['IBLOCK_SECTION_ID'], '!ID'=>$arResult['ID']);
            $arSelect = array('ID', 'CODE', 'NAME', 'UF_ACTIVE');
            $db_list = CIBlockSection::GetList(array('SORT'=>'ASC'), $arFilter, false, $arSelect);
            while($ar_result = $db_list->GetNext()) {
                if($ar_result['UF_ACTIVE'] && !in_array($ar_result['ID'], $filterSectionIDs)) {
                    $arResult['SECTION_LINKS'][] = $ar_result;
                }
                $sectionChilds[] = $ar_result['ID'];
                $arResult['SECTIONS'][$ar_result['ID']] = $ar_result;
            }
            
            $sectionChilds[] = $arResult['ID'];
            $res = CIBlockSection::GetByID($arResult['IBLOCK_SECTION_ID']);
            if($ar_res = $res->GetNext()) {
                $arResult['RATING_NAME'] = $ar_res['NAME'];
                $arResult['RATING_LINK'] = '/reviews/' . $ar_res['CODE'];
            }
        }
        else {
            $arFilter = array('IBLOCK_ID'=>$arResult['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID'=>$arResult['ID']);
            $arSelect = array('ID', 'CODE', 'NAME','UF_ACTIVE');
            $db_list = CIBlockSection::GetList(array('SORT'=>'ASC'), $arFilter, false, $arSelect);
            while($ar_result = $db_list->GetNext()) {
                if($ar_result['UF_ACTIVE'] && !in_array($ar_result['ID'], $filterSectionIDs)) {
                    $arResult['SECTION_LINKS'][] = $ar_result;
                }
                $sectionChilds[] = $ar_result['ID'];
                $arResult['SECTIONS'][$ar_result['ID']] = $ar_result;
            }
                $arResult['RATING_NAME'] = $arResult['NAME'];
                $arResult['RATING_LINK'] = '/reviews/' . $arResult['CODE'];
        }
*/


        $arFilter = array('IBLOCK_ID'=>$arResult['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID'=>$arResult['ID']);
        $arSelect = array('ID', 'CODE', 'NAME','UF_ACTIVE');
        $db_list = CIBlockSection::GetList(array('SORT'=>'ASC'), $arFilter, false, $arSelect);
        while($ar_result = $db_list->GetNext()) {
            if($ar_result['UF_ACTIVE'] && !in_array($ar_result['ID'], $filterSectionIDs)) {
                $arResult['SECTION_LINKS'][] = $ar_result;
            }
            $sectionChilds[] = $ar_result['ID'];
            $arResult['SECTIONS'][$ar_result['ID']] = $ar_result;
        }
        $arResult['RATING_NAME'] = $arResult['NAME'];
        $arResult['RATING_LINK'] = '/reviews/' . $arResult['CODE'];

        if(count($arResult['SECTIONS']) < 1){
            $arFilter = array('IBLOCK_ID'=>$arResult['IBLOCK_ID'], 'SECTION_ID'=>$arResult['IBLOCK_SECTION_ID'], '!ID'=>$arResult['ID']);
            $arSelect = array('ID', 'CODE', 'NAME', 'UF_ACTIVE');
            $db_list = CIBlockSection::GetList(array('SORT'=>'ASC'), $arFilter, false, $arSelect);
            while($ar_result = $db_list->GetNext()) {
                if($ar_result['UF_ACTIVE'] && !in_array($ar_result['ID'], $filterSectionIDs)) {
                    $arResult['SECTION_LINKS'][] = $ar_result;
                }
                $sectionChilds[] = $ar_result['ID'];
                $arResult['SECTIONS'][$ar_result['ID']] = $ar_result;
            }

            $sectionChilds[] = $arResult['ID'];
            $res = CIBlockSection::GetByID($arResult['IBLOCK_SECTION_ID']);
            if($ar_res = $res->GetNext()) {
                $arResult['RATING_NAME'] = $ar_res['NAME'];
                $arResult['RATING_LINK'] = '/reviews/' . $ar_res['CODE'];
            }
        }
    }

    $totalSectionLinks = 0;
    foreach($arResult['SECTION_LINKS'] as $key => $sectionLink) {
            if($sectionLink['UF_ACTIVE'])
                $totalSectionLinks++;
    }
    //var_dump($arResult);
    $arResult['SECTION_LINKS_COUNT'] = $totalSectionLinks - 1;

    if($arResult['UF_SHOW_REVIEWS']) {
        // get section rating
        $rating = 0;
        $ratingCount = 0;
        $sectionElements = array();
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
    
    if($arResult["NAV_CUR_PAGE"] > 1) {
        
        $arResult['pageTitle'] = $arResult['NAME'] . ' - страница №' . $arResult["NAV_CUR_PAGE"] . ' из ' . $arResult["NAV_PAGE_COUNT"] . '- интернет-магазин Up-House.ru';
        $arResult['pageDescription'] = $arResult['NAME'] . ' - страница №' . $arResult["NAV_CUR_PAGE"] . ' из ' . $arResult["NAV_PAGE_COUNT"] . ' в интернет-магазине Up-House.';
        $arResult['SEO_TEXT'] = 'В нашем интернет-магазине вы можете <a class="link_007eb4" href="/' . $arResult['PARENT_SECTION']['CODE'] . '">купить ' . $arResult['PARENT_SECTION']['NAME'] . '</a> с гарантией и быстрой доставкой!';
    }
    else {
        $arResult['pageTitle'] = 'КУПИТЬ ' . $arResult['NAME'] . ' по выгодной цене в Москве. Продажа ' .strtolower($arResult['NAME']). ' в интернет-магазине.';
        
        if(preg_match('/^iPhone/is', $arResult['NAME']) || preg_match('/^iPhone/is', $arResult['NAME']))$arResult['pageTitle'] = 'КУПИТЬ ' . $arResult['NAME'] . ' в Москве, цена на ' . str_ireplace($arResult['MORPH']['search'], $arResult['MORPH']['rus_name'], $arResult['NAME']) . ', отзывы. Apple ' . $arResult['NAME'] . ' купить недорого. Продажа дешевых ' . strtolower(str_ireplace($arResult['MORPH']['search'], $arResult['MORPH']['eng_name_r'], $arResult['NAME'])) . ' в интернет-магазине Up-House.';
        
        
        $arResult['pageDescription'] = 'Купить ' . $arResult['NAME'] . ' недорого в интернет-магазине Up-House. Заказать ' . $arResult['NAME'] . ' (' . str_ireplace($arResult['MORPH']['search'], $arResult['MORPH']['rus_name'], $arResult['NAME']) . ') дешевле чем в других магазинах с доставкой и гарантией. Широкий выбор техники Apple (Эпл)';
        $arResult['SEO_TEXT'] = 'Купить ' . $arResult['NAME'] . ' с доставкой и гарантией по доступным ценам вы можете в интернет-магазине Up-House.ru. Все продаваемые ' . str_ireplace($arResult['MORPH']['search'], $arResult['MORPH']['rus_name_mn'], $arResult['NAME']) . ' сопровождаются подробным описанием, техническими характеристиками и отзывами покупателей нашего магазина. При выборе ' . strtolower($arResult['NAME']) . ' опытные менеджеры нашего интернет-магазина окажут Вам всестороннюю помощь и ответят на любые возникшие вопросы.';
        
        //if($arResult['NAME']=='iPad Mini')$arResult['pageTitle']='iPad Mini купить в Москве, цена айпад мини. Скоро в продаже iPad Mini 2 retina';
    }


    $this->SetResultCacheKeys(array(
        "ID",
        "NAV_CACHED_DATA",
        $arParams["META_KEYWORDS"],
        $arParams["META_DESCRIPTION"],
        $arParams["BROWSER_TITLE"],
        "NAME",
        "PATH",
        "IBLOCK_SECTION_ID",
        "pageTitle",
        "pageDescription"
    ));


    $this->IncludeComponentTemplate();
}

$arTitleOptions = null;
if($USER->IsAuthorized())
{
    if(
        $APPLICATION->GetShowIncludeAreas()
        || (is_object($GLOBALS["INTRANET_TOOLBAR"]) && $arParams["INTRANET_TOOLBAR"]!=="N")
        || $arParams["SET_TITLE"]
        || isset($arResult[$arParams["BROWSER_TITLE"]])
    )
    {
        if(CModule::IncludeModule("iblock"))
        {
            $UrlDeleteSectionButton = "";
            if($arResult["IBLOCK_SECTION_ID"] > 0)
            {
                $rsSection = CIBlockSection::GetList(
                    array(),
                    array("=ID" => $arResult["IBLOCK_SECTION_ID"]),
                    false,
                    array("SECTION_PAGE_URL")
                );
                $rsSection->SetUrlTemplates("", $arParams["SECTION_URL"]);
                $arSection = $rsSection->GetNext();
                $UrlDeleteSectionButton = $arSection["SECTION_PAGE_URL"];
            }

            if(empty($UrlDeleteSectionButton))
            {
                $url_template = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "LIST_PAGE_URL");
                $arIBlock = CIBlock::GetArrayByID($arParams["IBLOCK_ID"]);
                $arIBlock["IBLOCK_CODE"] = $arIBlock["CODE"];
                $UrlDeleteSectionButton = CIBlock::ReplaceDetailURL($url_template, $arIBlock, true, false);
            }

            $arReturnUrl = array(
                "add_section" => (
                    strlen($arParams["SECTION_URL"])?
                    $arParams["SECTION_URL"]:
                    CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_PAGE_URL")
                ),
                "delete_section" => $UrlDeleteSectionButton,
            );
            $arButtons = CIBlock::GetPanelButtons(
                $arParams["IBLOCK_ID"],
                0,
                $arResult["ID"],
                array("RETURN_URL" =>  $arReturnUrl, "CATALOG"=>true)
            );

            if($APPLICATION->GetShowIncludeAreas())
                $this->AddIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));

            if(
                is_array($arButtons["intranet"])
                && is_object($GLOBALS["INTRANET_TOOLBAR"])
                && $arParams["INTRANET_TOOLBAR"]!=="N"
            )
            {
                $APPLICATION->AddHeadScript('/bitrix/js/main/utils.js');
                foreach($arButtons["intranet"] as $arButton)
                    $GLOBALS["INTRANET_TOOLBAR"]->AddButton($arButton);
            }

            if($arParams["SET_TITLE"] || isset($arResult[$arParams["BROWSER_TITLE"]]))
            {
                $arTitleOptions = array(
                    'ADMIN_EDIT_LINK' => $arButtons["submenu"]["edit_section"]["ACTION"],
                    'PUBLIC_EDIT_LINK' => $arButtons["edit"]["edit_section"]["ACTION"],
                    'COMPONENT_NAME' => $this->GetName(),
                );
            }
        }
    }
}



$this->SetTemplateCachedData($arResult["NAV_CACHED_DATA"]);

if($strTITLE != '' && !($arResult["NAV_CUR_PAGE"] > 1))
    $APPLICATION->SetTitle($strTITLE);
else
    if($arResult['pageTitle'])
        $APPLICATION->SetTitle($arResult['pageTitle']);
if($arResult['pageDescription'])
    $APPLICATION->SetPageProperty("description", $arResult['pageDescription']);

/*
if(isset($arResult[$arParams["META_KEYWORDS"]]))
{
    $val = $arResult[$arParams["META_KEYWORDS"]];
    if(is_array($val))
        $val = implode(" ", $val);
    $APPLICATION->SetPageProperty("keywords", $val);
}

if(isset($arResult[$arParams["META_DESCRIPTION"]]))
{
    $val = $arResult[$arParams["META_DESCRIPTION"]];
    if(is_array($val))
        $val = implode(" ", $val);
    $APPLICATION->SetPageProperty("description", $val);
}

if ($arParams["SET_TITLE"] && isset($arResult["NAME"]))
    $APPLICATION->SetTitle($arResult["NAME"], $arTitleOptions);
    

if(isset($arResult[$arParams["BROWSER_TITLE"]]))
{
    $val = $arResult[$arParams["BROWSER_TITLE"]];
    if(is_array($val))
        $val = implode(" ", $val);
    $APPLICATION->SetPageProperty("title", $val, $arTitleOptions);
}
*/

if($arParams["ADD_SECTIONS_CHAIN"] && isset($arResult["PATH"]) && is_array($arResult["PATH"]))
{
    foreach($arResult["PATH"] as $arPath)
    {
        $APPLICATION->AddChainItem($arPath["NAME"], $arPath["~SECTION_PAGE_URL"]);
    }
}

?>
