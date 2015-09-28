<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__); ?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie7 lt-ie8 lt-ie9"><![endif]-->
<!--[if IE 7]><html class="no-js ie7 lt-ie8 lt-ie9"><![endif]-->
<!--[if IE 8]><html class="no-js ie8 gt-ie7 lt-ie9"><![endif]-->
<!--[if IE 9]><html class="no-js ie9 gt-ie7 gt-ie8"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?$APPLICATION->ShowTitle()?></title>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
	<!-- Framework Styles -->
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/framework/style/core.css">

	<!-- Private  Styles-->
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/private/style/private.css">
    <link rel="stylesheet" type="text/css" href="/private/style/menu.css">

    <link rel="stylesheet" type="text/css" href="/bitrix/templates/shop_white/private/style/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="/bitrix/templates/shop_white/private/libs/jQueryBPopup/css/style.css">
	<!-- Libs -->
		<!-- jQuery -->
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/private/libs/jQuery/1.9.1/jquery-1.9.1.min.js"></script>
		

		<!-- jQuery Easing -->
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/private/libs/jQueryEasing/1.3/jquery.easing.1.3.min.js"></script>

		<!-- jQuery Tiny Carousel -->
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/private/libs/jQueryTinyCarousel/js/jquery.tinycarousel.js"></script>
        <!-- jQuery BPopup -->
        <script type="text/javascript" src="/bitrix/templates/shop_white/private/libs/jQueryBPopup/js/jquery.bpopup.min.js"></script>

		<link rel="stylesheet" type="text/css" href="/news/style.css">

        <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/private/js/jquery.mask.js"></script>

        <script type="text/javascript" src="/private/js/initialization.js"></script>
		
		<!-- DialogWidget -->
		<script src="//service.dialogwidget.ru/widget/dialogw.js" charset="UTF-8" id="dw_script" data-dwk="lrL7hw6fq08WSfg"></script>
		<!-- /DialogWidget -->
		
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
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body>
    <div class="b-overlay_cart view_default" style="opacity: 1; z-index: 10015; display: none;">
        <div class="b-overlay-h">
            <div class="b-popup skin_mini scheme_none shadow_on mod_thankyou" style="top: 6px;">
                <div class="b-popup-h">
                    <div class="b-popup-close"></div>

                    <div class="b-popup-body">
                        <div class="b-popup-body-h">
                            <div class="b_grid">
                                <div class="b_grid_unit-1-2">
                                    <div class="g-font size_2 g-ui margin_025">Вы добавили в <a class="js-popup-oncart" href="/personal/basket/">корзину</a></div>
                                </div>
                            </div>

                            <div class="_b-cart-head">


                            <form method="post" action="<?=POST_FORM_ACTION_URI?>" name="basket_form" id="basket_form_popup">
                                <div class="b_cart fs_18px">
                                    <div class="b_grid">
                                        <div class="b_grid_level margin-top_30px">
                                            <div class="overlay_cart_img">

                                            </div>
                                            <div class="b_popup_grid_unit-1-2 overlay_cart_name">
                                                <a href="/ipad-5/64gb/wifi/black" class="no-style-link cart_item_name"><span class="color_253487">Apple iPad Air 5 64Gb Wi-Fi Black/Space Gray </span></a>
                                            </div>

                                            <div class="b_popup_grid_unit-1-4 overlay_cart_price">
                                                <span class="color_79b70d cart_item_price">53 980 руб.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>

                            <div class="_b-cart-head">
                                <div style="font-size: 20px;">С этим товаром покупают</div>
                            </div>
                            <div class="overlay_cart_accessories">

                            </div>
                            <div class="b_grid_level grid_level_30px">
                                <a class="dop_footer_close" href="#">Закрыть и продолжить покупки</a>
                                <div id="basket_submit_links_popup" class="b_popup_grid_unit-2-3 ta_right">
                                    <a onclick="ga('send', 'event', 'Exit form', 'Order', '');" href="/personal/basket/" id="button-buy_order_popup" class="b_button-buy button-buy_order"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<div class="wrapper-outer">
	<div class="wrapper">
		<div class="container">
			<div class="main">
				<div class="header">
					<div class="b_grid">
						<div class="b_grid_unit-1-4" style="width: 23%; overflow: hidden;">
							<div class="b_logo">
								<a class="image-link" href="/">Up House</a>
							</div>
						</div>
						<div class="b_grid_unit-1-3" style="display: block; position: relative; top: -4.5px; width: 33%;">
							<div class="b_grid_level">
								<span class="phone_b">
									<?$APPLICATION->IncludeComponent("altasib:altasib.geoip", "geoPhone", array());?>
								</span>
							</div>

							<div class="b_grid_level margin_top_5px">
                                <div class="b_grid_unit-2-5" style="width: 35%;">
                                    <div class="call_back">Обратный звонок</div>
                                    <a class="skype_link" href="skype:uphouseru?chat">
                                        <i class="b_glyph glyph_skype va_middle"></i>
										<span class="fs_11px ff_helvetica-neue-bold color_303132">
											Up-House
										</span>
                                    </a>
                                    <div id="call_back_form">
                                        <span>Ваш телефон</span> <input id="cb_phone" class="input_phone" />
                                        <br>
                                        <div class="call_back_button">Перезвоните мне</div>
                                    </div>
                                </div>
								<div class="b_grid_unit-1-3" style="width: 65%;">
									<span class="fs_13px bold ff_helvetica-neue-bold color_555555">
										пн-пт: 09-20 (самовывоз 11-20)<br />
                                        сб-вс: 10-19 (самовывоз 11-19)
									</span>
								</div>
							</div>
						</div>

						<div class="b_grid_unit-5-12" style="display: block; position: relative; top: 1.5px; width: 44%">
							<div class="b_grid_level margin-top_10px margin-bottom_10px margin-right_0px">
								<div class="ta_right ff_helvetica-neue-roman ws_2px fs_14px top_menu">
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
								</div>
							</div>

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
					<div class="b_main-menu">
						<ul class="b_main-menu_list">
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "mainCatalogMenu", array(
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
					</div>
				</div>
<script type="text/javascript" src="/private/js/draw.js"></script>
