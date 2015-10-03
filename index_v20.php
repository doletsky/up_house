<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

   <!-- content -->
    <main id="main" role="main">
    <div class="container" id="page-home">
    <div class="row">
    <div class="col-xs-12">

    <!-- новости и обзоры -->
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
    <!-- /новости и обзоры -->

    <!-- новинки -->
<section class="novelty main-section">
<h2 class="novelty-title entry-title">Новинки уже в продаже</h2>
    <?$APPLICATION->IncludeComponent(
        "apple-house:catalog.specialoffers",
        "v20",
        Array(
            "IBLOCK_SPEC_TYPE" => "catalog",
            "IBLOCK_SPEC_ID" => "15",
            "IBLOCK_CAT_TYPE" => "1c_catalog",
            "IBLOCK_CAT_ID" => "8",
            "IBLOCK_SPEC_SECTION" => "241"
        ),
        false
    );?>
</section>
    <!-- /новинки -->

    <!-- хит продаж -->
    <section class="hit-sales main-section">
    <h2 class="novelty-title entry-title">Xит продаж</h2>

        <?$APPLICATION->IncludeComponent(
            "apple-house:catalog.specialoffers",
            "v20",
            Array(
                "IBLOCK_SPEC_TYPE" => "catalog",
                "IBLOCK_SPEC_ID" => "15",
                "IBLOCK_CAT_TYPE" => "1c_catalog",
                "IBLOCK_CAT_ID" => "8",
                "IBLOCK_SPEC_SECTION" => "242"
            ),
            false
        );?>

    </section>
    <!-- /хит продаж -->

    <!-- где купить iPhone? -->
        <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => "/include/whyarg_v20.php",
                "EDIT_TEMPLATE" => ""
            ),
            false
        );?>

    <!-- /где купить iPhone? -->

    </div>
    </div>
    </div>
    </main>
    <!-- /content -->


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>