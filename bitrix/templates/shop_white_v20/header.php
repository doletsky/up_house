<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__); ?>
<!DOCTYPE html>
<html class="no-js home">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?$APPLICATION->ShowTitle()?></title>
    <meta name="description" content="Iphone описание">
    <meta name="viewport" content="width=device-width">

    <link href="<?=SITE_TEMPLATE_PATH?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?=SITE_TEMPLATE_PATH?>/css/main.less" rel="stylesheet/less" />
    <link href="<?=SITE_TEMPLATE_PATH?>/css/pop-up-quick-order-v20.css" rel="stylesheet/less" />

    <script src="<?=SITE_TEMPLATE_PATH?>/js/less-1.7.3.min.js" type="text/javascript"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/modernizr-2.6.2.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <script src="//service.dialogwidget.ru/widget/dialogw.js" charset="windows-1251" id="dw_script" data-dwk="lrL7hw6fq08WSfg"></script>
    <? $APPLICATION->ShowHead(); ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-35109714-1', 'auto');
        ga('send', 'pageview');
        ga('require', 'ecommerce', 'ecommerce.js');

    </script>
    <link rel="shortcut icon"  href="/favicon.ico" />
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
                                    "TOP_DEPTH" => "1",
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

            <!-- submenu catalog -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="menu-model clearfix" id="slide-submenu">
                        <a class="menu-model-item" href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-menu-model.png" alt="iPhone 6" class="menu-model-img" />
                            <span class="menu-model-title">iPhone 6</span>
                        </a>
                        <a class="menu-model-item current" href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-menu-model.png" alt="iPhone 6" class="menu-model-img" />
                            <span class="menu-model-title">iPhone 5S</span>
                        </a>
                        <a class="menu-model-item" href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-menu-model-2.png" alt="iPhone 6" class="menu-model-img" />
                            <span class="menu-model-title">iPhone 5C</span>
                        </a>
                        <a class="menu-model-item" href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-menu-model-3.png" alt="iPhone 6" class="menu-model-img" />
                            <span class="menu-model-title">iPhone 5</span>
                        </a>
                        <a class="menu-model-item" href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-menu-model-3.png" alt="iPhone 6" class="menu-model-img" />
                            <span class="menu-model-title">iPhone 4/4S</span>
                        </a>
                        <a class="menu-model-item" href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-menu-model-2.png" alt="iPhone 6" class="menu-model-img" />
                            <span class="menu-model-title">iPhone 3C</span>
                        </a>
                        <a class="menu-model-item" href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-menu-model-3.png" alt="iPhone 6" class="menu-model-img" />
                            <span class="menu-model-title">iPhone 3</span>
                        </a>
                        <a class="menu-model-item" href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-menu-model-3.png" alt="iPhone 6" class="menu-model-img" />
                            <span class="menu-model-title">iPhone 2/2S</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>


    </header>
    <!-- /header -->