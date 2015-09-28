<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
include($_SERVER['DOCUMENT_ROOT'] . '/include/tools/catalogtemplate.php');
$catTemplate = getCatTemplate();
$SITE_TEMPLATE_PATH = '/bitrix/templates/shop_white';
IncludeTemplateLangFile(__FILE__); ?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie7 lt-ie8 lt-ie9"><![endif]-->
<!--[if IE 7]><html class="no-js ie7 lt-ie8 lt-ie9"><![endif]-->
<!--[if IE 8]><html class="no-js ie8 gt-ie7 lt-ie9"><![endif]-->
<!--[if IE 9]><html class="no-js ie9 gt-ie7 gt-ie8"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js"><!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?$APPLICATION->ShowTitle()?></title>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
	<? $APPLICATION->ShowHead(); ?>
	<!-- Framework Styles -->
	<link rel="stylesheet" type="text/css" href="<?=$SITE_TEMPLATE_PATH?>/framework/style/core.css">

	<!-- Private  Styles-->
	<link rel="stylesheet" type="text/css" href="<?=$SITE_TEMPLATE_PATH?>/private/style/private.css">
		
	<!-- Libs -->
		<!-- jQuery -->
		<script type="text/javascript" src="<?=$SITE_TEMPLATE_PATH?>/private/libs/jQuery/1.9.1/jquery-1.9.1.min.js"></script>
		
		<!-- jQuery Easing -->
		<script type="text/javascript" src="<?=$SITE_TEMPLATE_PATH?>/private/libs/jQueryEasing/1.3/jquery.easing.1.3.min.js"></script>
		
		<!-- jQuery Tiny Carousel -->
		<script type="text/javascript" src="<?=$SITE_TEMPLATE_PATH?>/private/libs/jQueryTinyCarousel/js/jquery.tinycarousel.js"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-35109714-1', 'auto');
        ga('send', 'pageview');
        ga('require', 'ecommerce', 'ecommerce.js');

    </script>
<? /*
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-35109714-1']);
_gaq.push(['_addOrganic', 'nova.rambler.ru', 'query']);
_gaq.push(['_addOrganic', 'go.mail.ru', 'q']);
_gaq.push(['_addOrganic', 'nigma.ru', 's']);
_gaq.push(['_addOrganic', 'webalta.ru', 'q']);
_gaq.push(['_addOrganic', 'aport.ru', 'r']);
_gaq.push(['_addOrganic', 'poisk.ru', 'text']);
_gaq.push(['_addOrganic', 'km.ru', 'sq']);
_gaq.push(['_addOrganic', 'liveinternet.ru', 'ask']);
_gaq.push(['_addOrganic', 'quintura.ru', 'request']);
_gaq.push(['_addOrganic', 'search.qip.ru', 'query']);
_gaq.push(['_addOrganic', 'gde.ru', 'keywords']);
_gaq.push(['_addOrganic', 'gogo.ru', 'q']);
_gaq.push(['_addOrganic', 'ru.yahoo.com', 'p']);
_gaq.push(['_addOrganic', 'images.yandex.ru', 'q', true]);
_gaq.push(['_addOrganic', 'blogsearch.google.ru', 'q', true]);
_gaq.push(['_addOrganic', 'blogs.yandex.ru', 'text', true]);
_gaq.push(['_addOrganic', 'ru.search.yahoo.com','p']);
_gaq.push(['_addOrganic', 'ya.ru', 'q']);
_gaq.push(['_addOrganic', 'm.yandex.ru','query']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
(function() { var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })();
</script>

*/ ?>
<link rel="shortcut icon"  href="/favicon.ico" />	
		</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<div class="wrapper-outer">
	<div class="wrapper">
		<div class="container">
			<div class="main">
				<? if($catTemplate == 'element'): ?>
				<div class="header header_transparent">
				<? else: ?>
				<div class="header">
				<? endif ?>
					<div class="b_grid">
						<div class="b_grid_unit-1-3">
							<div class="b_logo">
								<a class="image-link" href="/">Up House</a>
							</div>						
						</div>
						<div class="b_grid_unit-5-12">
							<div class="b_grid_level grid_level_15px">
								<a class="skype_link" href="skype:apple-house.ru?chat">
									<i class="b_glyph glyph_skype va_middle"></i>
									<span class="fs_11px ff_helvetica-neue-bold color_303132">
										Up-House
									</span>
								</a>
								&nbsp;&nbsp;&nbsp;
								<i class="b_glyph glyph_clock va_middle"></i>
								<span class="fs_13px ff_helvetica-neue-roman color_303132">
									<?=GetMessage('MON-FRI')?> 9:00-20:00 бс-тё 10:00-19:00
								</span>
							</div>
							<div class="b_grid_level grid_level_15px">
								<span class="phone_b">
									8(495)966-1234
								</span>							
							</div>
						</div>
						<div class="b_grid_unit-1-4">
							<div class="b_grid_level margin-top_15px margin-bottom_5px">
								<div class="ta_right ff_helvetica-neue-roman ws_3px fs_12px">
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
	"TOP_DEPTH" => "2",
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
<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "basketLink", array(
	"PATH_TO_BASKET" => "/personal/basket/",
	"PATH_TO_ORDER" => "/personal/order/"
	),
	false
);?>
						</ul>
					</div>
				</div>
				<? if($catTemplate == 'element'): ?>
				<div class="b_breadcrumbs breadcrumbs_transparent ff_helvetica-neue-roman color_7e7e7e">
				<? else: ?>
				<div class="b_breadcrumbs ff_helvetica-neue-roman color_7e7e7e">
				<? endif ?>
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadCrumbs", Array(
	"START_FROM" => "0",   
	"PATH" => "",
	"SITE_ID" => "-",
	),
	false
);?>
				</div>
				<? if($catTemplate == 'element'): ?>
				<div class="content ff_helvetica-neue-light fs_14px">
				<? endif ?>