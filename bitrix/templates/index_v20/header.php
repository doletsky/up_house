<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__); ?>
<!DOCTYPE html>
<html class="no-js home">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iphone заголовок</title>
    <meta name="description" content="Iphone описание">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link href="<?=SITE_TEMPLATE_PATH?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?=SITE_TEMPLATE_PATH?>/css/main.less" rel="stylesheet/less" />

    <script src="<?=SITE_TEMPLATE_PATH?>/js/less-1.7.3.min.js" type="text/javascript"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/modernizr-2.6.2.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <? $APPLICATION->ShowHead(); ?>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="site-container">
<!-- header -->
<header id="header" role="banner">
<div class="container">
<div class="row">
    <div class="col-xs-12">
        <div class="header-bg clearfix">
            <div class="header-section">
                <!-- logo -->
                <a href="/">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" alt="iphone" title="iphone" />
                </a>
            </div>
            <div class="header-section-2">

                <div class="vertical-line"></div>

                <div class="pull-left">
                    <!-- vcard -->
                    <div class="vcard">
                        <div class="tel">+7 (495) <span class="tel-bold">966 1234</span></div>
                    </div>

                    <!-- social button -->
                    <div class="social-button-block">
                        <a href="http://instagram.com/uphouseru" class="social-icon instagram" title="instagram"></a>
                        <a href="https://www.facebook.com/uphouseru" class="social-icon facebook" title="facebook"></a>
                        <a href="https://vk.com/uphouseru" class="social-icon vk" title="vk"></a>
                        <a href="https://twitter.com/uphouseru" class="social-icon twitter" title="twitter"></a>
                    </div>
                </div>
            </div>

            <div class="header-section-3">

                <div class="vertical-line"></div>
                <!-- menu pages -->
                <nav class="menu-page-block" role="navigation">
                    <a id="call_back" href="#" class="menu-page-item">Обратный звонок</a>
                    <div id="call_back_form" style="padding: 15px; margin: 0;">
                        <span>Ваш телефон</span> <input class="input_phone" id="cb_phone">
                        <br>
                        <div class="call_back_button">Перезвоните мне</div>
                    </div>
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "topMenu", array(
                            "ROOT_MENU_TYPE" => "top",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "left",
                            "USE_EXT" => "N",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N",

                        ),
                        false
                    );?>
                </nav>

                <div class="clearfix">
                    <div class="header-section-4">
                        <div class="skype-block">
                            <span class="skype-icon"></span>
                            <span class="skype-text">up-house</span>
                        </div>

                        <div class="vcard">
                            <div class="workhours">пн-пт с 09:00 до 20:00</div>
                            <div class="workhours">сб-вс с 10:00 до 19:00</div>
                        </div>
                    </div>
<pre><?print_r($_REQUEST)?></pre><?die;?>
                    <div class="header-section-5 pull-left">
                        <?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "basketLink_n", array(
                                "PATH_TO_BASKET" => "/personal/basket/",
                                "PATH_TO_ORDER" => "/personal/order/"
                            ),
                            false
                        );?>
                        <?$APPLICATION->IncludeComponent("bitrix:search.form", "searchForm", array(
                                "PAGE" => "/search/",
                                "USE_SUGGEST" => "N"
                            ),
                            false
                        );?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- menu catalog -->
<div class="row">
    <div class="col-xs-12">
        <nav class="menu-catalog-block clearfix">
            <ul class="menu-catalog-list">
                <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "mainCatalogMenuV20", array(
                        "IBLOCK_TYPE" => "1c_catalog",
                        "IBLOCK_ID" => "8",
                        "SECTION_ID" => "",
                        "SECTION_CODE" => "",
                        "COUNT_ELEMENTS" => "N",
                        "TOP_DEPTH" => "3",
                        "SECTION_FIELDS" => array(
                            0 => "",
                            1 => "",
                        ),
                        "SECTION_USER_FIELDS" => array(
                            "UF_ACTIVE",
                        ),
                        "SECTION_URL" => "/#CODE#",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_GROUPS" => "Y",
                        "ADD_SECTIONS_CHAIN" => "Y",
                    ),
                    false
                );?>

            </ul>
        </nav>
    </div>
</div>
</div>

<!-- slider -->
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
<!-- /slider -->
</header>
<!-- /header -->