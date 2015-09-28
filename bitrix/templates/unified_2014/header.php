<!DOCTYPE html>
<html class="no-js home">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle();?></title>

    <meta name="description" content="Iphone описание">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link href="private/css/bootstrap.min.css" rel="stylesheet">
    <link href="private/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="private/css/main.less" rel="stylesheet/less" />

    <script src="private/js/less-1.7.3.min.js" type="text/javascript"></script>
    <script src="private/js/modernizr-2.6.2.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
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
                    <img src="/bitrix/templates/<? echo SITE_TEMPLATE_ID;?>/private/images/theme_imgs/logo.png" alt="iphone" title="iphone" />
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
                        <a href="#" class="social-icon instagram" title="instagram"></a>
                        <a href="#" class="social-icon facebook" title="facebook"></a>
                        <a href="#" class="social-icon vk" title="vk"></a>
                        <a href="#" class="social-icon twitter" title="twitter"></a>
                    </div>
                </div>
            </div>

            <div class="header-section-3">

                <div class="vertical-line"></div>
                <!-- menu pages -->
                <nav class="menu-page-block" role="navigation">
                    <a href="#" class="menu-page-item">Обратный звонок</a>
                    <a href="#" class="menu-page-item">Новости</a>
                    <a href="#" class="menu-page-item">Оплата</a>
                    <a href="#" class="menu-page-item">Доставка</a>
                    <a href="#" class="menu-page-item">Кредит</a>
                    <a href="#" class="menu-page-item">Гарантия</a>
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
                        <div class="cart pull-left">Пока пусто :(</div>
                        <div class="search-block pull-left">
                            <input type="search" class="search-input" placeholder="поиск" />
                            <input type="submit" class="search-button" value="" />
                        </div>
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
                <li class="menu-catalog-list-item">
                    <a href="#" class="menu-catalog-item">iPhone 5S</a>

                    <!-- submenu -->
                    <ul class="submenu-catalog js-submenu-catalog">
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPhone 5S 16gb</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPhone 5S 32gb</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPhone 5S 64gb</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPhone 5S VIP</a>

                            <!-- submenu three -->
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <ul class="submenu-three-catalog js-submenu-three-catalog">
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">iPhone 5S Diamond</a>
                                </li>
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">iPhone 5S Gold</a>
                                </li>
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">iPhone 5S Светояблоко</a>
                                </li>
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">iPhone 5S Цветной</a>
                                </li>
                            </ul>
                            <!-- /submenu three -->
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">Аксессуары для iPhone 5S</a>

                            <!-- submenu three -->
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <ul class="submenu-three-catalog js-submenu-three-catalog">
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">Защитные пленки для iPhone 5S</a>
                                </li>
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">Аксессуары для автомобиля для iPhone 5S</a>
                                </li>
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">Внешние аккумуляторы для iPhone 5S</a>
                                </li>
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">Зарядные устройства и док-станции для iPhone 5S</a>
                                </li>
                            </ul>
                            <!-- /submenu three -->
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">Чехлы для iPhone 5S</a>
                        </li>
                    </ul>
                    <!-- /submenu -->
                </li>
                <li class="menu-catalog-list-item">
                    <a href="#" class="menu-catalog-item">iPhone 5C</a>

                    <!-- submenu -->
                    <ul class="submenu-catalog js-submenu-catalog">
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPhone 5C 16gb</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPhone 5C 32gb</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">Аксессуары для iPhone 5C</a>

                            <!-- submenu three -->
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <ul class="submenu-three-catalog js-submenu-three-catalog">
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">iPhone 5S Diamond</a>
                                </li>
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">iPhone 5S Gold</a>
                                </li>
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">iPhone 5S Светояблоко</a>
                                </li>
                                <li class="submenu-three-catalog-item">
                                    <a href="#" class="submenu-three-catalog-link">iPhone 5S Цветной</a>
                                </li>
                            </ul>
                            <!-- /submenu three -->
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">Чехлы для iPhone 5C</a>
                        </li>
                    </ul>
                    <!-- /submenu -->
                </li>
                <li class="menu-catalog-list-item">
                    <a href="#" class="menu-catalog-item">
                        iPhone 5
                    </a>

                    <!-- submenu -->
                    <ul class="submenu-catalog js-submenu-catalog">
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPhone 5 16gb</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPhone 5 32gb</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPhone 5 64gb</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPhone 5 VIP</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPhone 5 цветной</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">Бамперы для iPhone 5</a>
                        </li>
                    </ul>
                    <!-- /submenu -->
                </li>
                <li class="menu-catalog-list-item">
                    <a href="#" class="menu-catalog-item">iPad Air</a>

                    <!-- submenu -->
                    <ul class="submenu-catalog js-submenu-catalog">
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPad Air 5 16 Gb</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPad Air 5 32 Gb</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPad Air 5 64 Gb</a>
                        </li>
                        <li class="submenu-catalog-item">
                            <a href="#" class="submenu-catalog-link">iPad Air 5 128 Gb</a>
                        </li>
                    </ul>
                    <!-- /submenu -->
                </li>
                <li class="menu-catalog-list-item">
                    <a href="#" class="menu-catalog-item">iPad Mini 2</a>
                </li>
                <li class="menu-catalog-list-item">
                    <a href="#" class="menu-catalog-item">iPhone 4/4s</a>
                </li>
                <li class="menu-catalog-list-item">
                    <a href="#" class="menu-catalog-item">MacBook</a>
                </li>
                <li class="menu-catalog-list-item">
                    <a href="#" class="menu-catalog-item">iMac</a>
                </li>
                <li class="menu-catalog-list-item">
                    <a href="#" class="menu-catalog-item">Гаджеты</a>
                </li>
                <li class="menu-catalog-list-item">
                    <a href="#" class="menu-catalog-item">Бренды</a>
                </li>
                <li class="menu-catalog-list-item">
                    <a href="#" class="menu-catalog-item current">Скидки</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
</div>

<!-- slider -->
<div id="slider">
    <ul class="bxslider">
        <!-- 1 slide -->
        <li>
            <img src="/bitrix/templates/<? echo SITE_TEMPLATE_ID;?>/private/images/theme_imgs/slider/slider.jpg" />
            <div class="bx-caption">
                <h2 class="slider-title">Jawbone UP24</h2>
                <div class="slider-content">
                    следить за здоровьем<br />стало еще проще
                </div>
                <a href="#" class="slider-button">Заказать</a>
            </div>
        </li>

        <!-- 2 slide -->
        <li>
            <img src="/bitrix/templates/<? echo SITE_TEMPLATE_ID;?>/private/images/theme_imgs/slider/slider-2.jpg" />
            <div class="bx-caption">
                <h2 class="slider-title">iPad mini</h2>
                <div class="slider-content">
                    с дисплеем Retina<br /> уже в продаже
                </div>
                <a href="#" class="slider-button">Заказать</a>
            </div>
        </li>

        <!-- 3 slide -->
        <li>
            <img src="/bitrix/templates/<? echo SITE_TEMPLATE_ID;?>/private/images/theme_imgs/slider/slider.jpg" />
            <div class="bx-caption">
                <h2 class="slider-title">Jawbone UP24</h2>
                <div class="slider-content">
                    следить за здоровьем<br />
                    стало еще проще
                </div>
                <a href="#" class="slider-button">Заказать</a>
            </div>
        </li>

        <!-- 4 slide -->
        <li>
            <img src="/bitrix/templates/<? echo SITE_TEMPLATE_ID;?>/private/images/theme_imgs/slider/slider-2.jpg" />
            <div class="bx-caption">
                <h2 class="slider-title">iPad mini</h2>
                <div class="slider-content">
                    с дисплеем Retina<br />
                    уже в продаже
                </div>
                <a href="#" class="slider-button">Заказать</a>
            </div>
        </li>
    </ul>
</div>
<!-- /slider -->
</header>
<!-- /header -->

<!-- content -->
<main id="main" role="main">
    <div class="container" id="page-home">
        <div class="row">
            <div class="col-xs-12">



<?$APPLICATION->ShowPanel();?>

