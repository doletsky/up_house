<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!-- страница каталога -->
<!--<pre>--><?//print_r($arResult)?><!--</pre>-->
<div id="page-catalog">



    <?
    if (CModule::IncludeModule("iblock"))
    {
        $arFilter = array(
            "ACTIVE" => "Y",
            "GLOBAL_ACTIVE" => "Y",
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        );
        if(strlen($arResult["VARIABLES"]["SECTION_CODE"])>0)
        {
            $arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
        }
        elseif($arResult["VARIABLES"]["SECTION_ID"]>0)
        {
            $arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
        }

        $obCache = new CPHPCache;
        if($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
        {
            $arCurSection = $obCache->GetVars();
        }
        else
        {
            $arCurSection = array();
            $dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));
            $dbRes = new CIBlockResult($dbRes);

            if(defined("BX_COMP_MANAGED_CACHE"))
            {
                global $CACHE_MANAGER;
                $CACHE_MANAGER->StartTagCache("/iblock/catalog");

                if ($arCurSection = $dbRes->GetNext())
                {
                    $CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);
                }
                $CACHE_MANAGER->EndTagCache();
            }
            else
            {
                if(!$arCurSection = $dbRes->GetNext())
                    $arCurSection = array();
            }

            $obCache->EndDataCache($arCurSection);
        }

        ob_start();
		
		//var_dump($arResult['UF_FILTER_FIELDS']);
		
		$filtertemplate=".default";
		if($arResult['SHOW_SMART_FILTER'] == '25')$filtertemplate="compactFilter";
        if($arResult['SHOW_SMART_FILTER'] == '15' || $arResult['SHOW_SMART_FILTER'] == '14'  || $arResult['SHOW_SMART_FILTER'] == '25' ){
            $APPLICATION->IncludeComponent("apple-house:catalog.smart.filter", $filtertemplate, array(
                    "IBLOCK_TYPE" => "1c_catalog",
                    "IBLOCK_ID" => "8",
                    "SECTION_ID" => $arParams["SECTION_ID"],
                    "FILTER_NAME" => "arrFilter",
                    "FILTER_FIELDS"=> $arResult['UF_FILTER_FIELDS'],
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_GROUPS" => "Y",
                    "SAVE_IN_SESSION" => "N",
                    "INSTANT_RELOAD" => "N",
                    "PRICE_CODE" => array('Продажа'), //array("BASE"),
                ),
                false
            );//
            //$iGridWidth = 3;
        }

        $outputSmartFilter = ob_get_contents();
        ob_end_clean();
//    if($USER->IsAdmin())
//        var_dump($output1);
//        $APPLICATION->ShowViewContent("right_area");

    }
    ?>
<? // endif; ?>
<?
$APPLICATION->IncludeComponent("apple-house:catalog.section", "catalogList", array(
	"IBLOCK_TYPE" => "1c_catalog",
	"IBLOCK_ID" => "8",
	"SECTION_ID" => $arParams['SECTION_ID'],
	"SECTION_CODE" => "",
	"SECTION_USER_FIELDS" => array(
		0 => "UF_BONUS",
		1 => "UF_DESCRIPTION",
		2 => "UF_SECTION_CHARS",
		3 => "UF_SHOW_REVIEWS",
		4 => "UF_SEO_TEXT",
		5 => "UF_MODEL",
		6 => "UF_BUY_DISABLE"
	),
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "asc",
	"FILTER_NAME" => "arrFilter",
	"INCLUDE_SUBSECTIONS" => "Y",
	"SHOW_ALL_WO_SECTION" => "Y",
	"PAGE_ELEMENT_COUNT" => "16",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "CML2_CODE",
		1 => "",
	),
	"OFFERS_LIMIT" => "5",
	"SECTION_URL" => "/#CODE#",
	"DETAIL_URL" => "/?ELEMENT_ID=#ID#",
	"BASKET_URL" => "/personal/basket/",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"ADD_SECTIONS_CHAIN" => "Y",
	"DISPLAY_COMPARE" => "N",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"CACHE_FILTER" => "N",
	"PRICE_CODE" => array(
		0 => "Продажа",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"CONVERT_CURRENCY" => "N",
	"DISPLAY_TOP_PAGER" => "Y",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Товары",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "catalog_v20",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"AJAX_OPTION_ADDITIONAL" => "",
    "SMART_FILTER_OUTPUT" => $outputSmartFilter,//$APPLICATION->ShowViewContent("right_area"),
	),
	false
);?>
<? if(strpos($_SERVER['HTTP_REFERER'], 'google') !== false || strpos($_SERVER['HTTP_REFERER'], 'yandex') !== false): ?>
<script type="text/javascript">
$(document).ready(function() {
	var offset = $('.content').offset();
	$(window).scrollTop(offset.top - 60);
});
</script>
<? endif ?>


</div>
