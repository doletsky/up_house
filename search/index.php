<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?><?$APPLICATION->IncludeComponent("apple-house:search.page", "searchPage", array(
	"RESTART" => "N",
	"NO_WORD_LOGIC" => "N",
	"CHECK_DATES" => "N",
	"USE_TITLE_RANK" => "N",
	"DEFAULT_SORT" => "rank",
	"FILTER_NAME" => "",
	"arrFILTER" => array(
		0 => "iblock_1c_catalog",
	),
	"arrFILTER_iblock_1c_catalog" => array(
		0 => "all",
	),
	"SHOW_WHERE" => "N",
	"SHOW_WHEN" => "N",
	"PAGE_RESULT_COUNT" => "20",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"DISPLAY_TOP_PAGER" => "Y",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Результаты поиска",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "appleHouse",
	"USE_LANGUAGE_GUESS" => "N",
	"USE_SUGGEST" => "Y",
	"SHOW_ITEM_TAGS" => "Y",
	"TAGS_INHERIT" => "Y",
	"SHOW_ITEM_DATE_CHANGE" => "N",
	"SHOW_ORDER_BY" => "Y",
	"SHOW_TAGS_CLOUD" => "N",
	"SHOW_RATING" => "N",
	"RATING_TYPE" => "",
	"PATH_TO_USER_PROFILE" => "",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>