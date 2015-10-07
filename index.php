<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Apple");
$APPLICATION->SetTitle("Купить iPhone - продажа iPhone 6, iPhone 6 Plus, iPhine 5/4/4S, купить айфон дешево с гарантией в интернет-магазине UP-HOUSE.RU с доставкой по Москве и России.");

///// ADD TO BASKET
$action = strtoupper($_REQUEST['action']);
$productID = intval($_REQUEST["id"]);
if($action == "ADD2BASKET" && $productID > 0)
{
	if(CModule::IncludeModule("iblock") && CModule::IncludeModule("sale") && CModule::IncludeModule("catalog"))
	{
		$QUANTITY = 1;

		$product_properties = array();

		$rsItems = CIBlockElement::GetList(array(), array('ID' => $productID), false, false, array('ID', 'IBLOCK_ID'));
		if ($arItem = $rsItems->Fetch())
		{
			$arItem['IBLOCK_ID'] = intval($arItem['IBLOCK_ID']);
		}
		else
		{
			$strError = GetMessage('CATALOG_PRODUCT_NOT_FOUND').".";
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

		if(!$strError && Add2BasketByProductID($productID, $QUANTITY, array(), $product_properties))
		{
			//LocalRedirect($APPLICATION->GetCurPageParam("", array('id', 'action', 'credit')));
			LocalRedirect('/personal/basket/');
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
///// END OF ADD TO BASKET

?>

<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "promoSlider", array(
	"IBLOCK_TYPE" => "services",
	"IBLOCK_ID" => "12",
	"SECTION_ID" => "210",
	"SECTION_CODE" => "",
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "asc",
	"FILTER_NAME" => "arrFilter",
	"INCLUDE_SUBSECTIONS" => "Y",
	"SHOW_ALL_WO_SECTION" => "N",
	"PAGE_ELEMENT_COUNT" => "30",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"OFFERS_LIMIT" => "5",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"BASKET_URL" => "/personal/basket.php",
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
	"ADD_SECTIONS_CHAIN" => "N",
	"DISPLAY_COMPARE" => "N",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"CACHE_FILTER" => "N",
	"PRICE_CODE" => array(
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"CONVERT_CURRENCY" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Товары",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
<div class="slider-container" style='clear:both'>
	<h2 class="color_black fs_30px ff_helvetica-neue-light"><a class="news_n_reviews" href="/news/">Новости и обзоры</a></h2>
</div>
<?//  if ($USER->IsAdmin()): ?>
    <div class="social_icons">
        <a target="_blank" href="http://instagram.com/uphouseru"><img src="/bitrix/templates/index/private/images/instargam_icon.png" /></a>
        <a target="_blank" href="https://vk.com/uphouseru"><img src="/bitrix/templates/index/private/images/vk_icon.png" /></a>
        <a target="_blank" href="https://www.facebook.com/uphouseru"><img src="/bitrix/templates/index/private/images/fb_icon.png" /></a>
        <a target="_blank" href="https://twitter.com/uphouseru"><img src="/bitrix/templates/index/private/images/twitter_icon.png" /></a>
    </div>
<?// endif;?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "lastNews", array(
	"IBLOCK_TYPE" => "news",
	"IBLOCK_ID" => "1",
	"NEWS_COUNT" => "4",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "show_news_#CODE#.html",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
<div class="b_line line_thick" style='clear:both;'></div>
<div class="slider-container" style='clear:both'>
	<h2 class="color_black fs_30px ff_helvetica-neue-light">Новинки уже в продаже</h2>
	<h3 class="color_7e7e7e fs_14px ff_helvetica-neue-light">Самые последние поступления</h3>
<?$APPLICATION->IncludeComponent(
	"apple-house:catalog.specialoffers",
	"",
	Array(
		"IBLOCK_SPEC_TYPE" => "catalog",
		"IBLOCK_SPEC_ID" => "15",
		"IBLOCK_CAT_TYPE" => "1c_catalog",
		"IBLOCK_CAT_ID" => "8",
		"IBLOCK_SPEC_SECTION" => "241"
	),
false
);?> 
</div>
<div class="slider-container">
	<h2 class="color_black fs_30px ff_helvetica-neue-light">Хит продаж</h2>
	<h3 class="color_7e7e7e fs_14px ff_helvetica-neue-light">Самые популярные товары</h3>
<?$APPLICATION->IncludeComponent(
	"apple-house:catalog.specialoffers",
	"",
	Array(
		"IBLOCK_SPEC_TYPE" => "catalog",
		"IBLOCK_SPEC_ID" => "15",
		"IBLOCK_CAT_TYPE" => "1c_catalog",
		"IBLOCK_CAT_ID" => "8",
		"IBLOCK_SPEC_SECTION" => "242"
	),
false
);?> 
</div>
				


				
<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => "/include/whyarg.php",
	"EDIT_TEMPLATE" => ""
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>