<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
   <!-- content -->
    <main id="main" role="main">
    <div class="container" id="page-home">
    <div class="row">
    <div class="col-xs-12">

    <!-- ������� � ������ -->
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
            "PAGER_TITLE" => "�������",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "AJAX_OPTION_ADDITIONAL" => ""
        ),
        false
    );?>
<!--    <section class="news-reviews main-section">-->
<!--        <div class="row">-->
<!--            <div class="col-xs-9">-->
<!--                <div>-->
<!--                    <h2 class="news-reviews-title entry-title">������� � ������</h2>-->
<!--                    <div class="news-reviews-content">-->
<!--                        <article class="news-reviews-item">-->
<!--                            <time class="news-reviews-date" datetime="16.06.2014">16.06.2014</time>-->
<!--                            <a href="#" class="news-reviews-text">Metal - ������� ��������� �������</a>-->
<!--                        </article>-->
<!---->
<!--                        <article class="news-reviews-item">-->
<!--                            <time class="news-reviews-date" datetime="15.06.2014">15.06.2014</time>-->
<!--                            <a href="#" class="news-reviews-text">OS X Yosemite � iOS 8: �� ����� ���������� ����� ���������� ����� ��?</a>-->
<!--                        </article>-->
<!---->
<!--                        <article class="news-reviews-item">-->
<!--                            <time class="news-reviews-date" datetime="11.06.2014">11.06.2014</time>-->
<!--                            <a href="#" class="news-reviews-text">������ ������ ������ �������� �� �������� ���������</a>-->
<!--                        </article>-->
<!---->
<!--                        <article class="news-reviews-item">-->
<!--                            <time class="news-reviews-date" datetime="09.06.2014">09.06.2014</time>-->
<!--                            <a href="#" class="news-reviews-text">HomeKit - ������ ��� ��� ������ ���������</a>-->
<!--                        </article>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-xs-3">-->
<!---->
<!--                <!-- ����������� -->-->
<!--                <aside class="subscribe">-->
<!--                    <div class="subscribe-content">-->
<!--                        <div class="subscribe-title">��������� ������<br /> � ����� ������</div>-->
<!---->
<!--                        <input type="text" class="subscribe-input" placeholder="���" />-->
<!--                        <input type="email" class="subscribe-input" placeholder="email" />-->
<!--                        <input type="submit" class="subscribe-button" value="�����������" />-->
<!--                    </div>-->
<!--                </aside>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
    <!-- /������� � ������ -->

    <!-- ������� -->
    <section class="novelty main-section">
    <h2 class="novelty-title entry-title">������� ��� � �������</h2>

    <div class="carousel">

    <!-- 1 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-1.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">Lapka PEM - �������� ����������� ��������� ���������� �����</figcaption>
            </figure>
        </a>
        <div class="product-price">7 980, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 2 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-2.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������������ ������������ ������� Jawbone Mini Jambox Blue Diamond</figcaption>
            </figure>
        </a>
        <div class="product-price">4 990, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 3 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-3.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">����������� Bluetooth-�������� JBL Flip2 ��� iPhone / iPod / iPad / Android �����</figcaption>
            </figure>
        </a>
        <div class="product-price">4 290, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 4 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-4.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������� Jawbone Up24 Lemon Lime (��������) M</figcaption>
            </figure>
        </a>
        <div class="product-price">6 490, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 1 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-1.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">Lapka PEM - �������� ����������� ��������� ���������� �����</figcaption>
            </figure>
        </a>
        <div class="product-price">7 980, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 2 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-2.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������������ ������������ ������� Jawbone Mini Jambox Blue Diamond</figcaption>
            </figure>
        </a>
        <div class="product-price">4 990, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 3 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-3.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">����������� Bluetooth-�������� JBL Flip2 ��� iPhone / iPod / iPad / Android �����</figcaption>
            </figure>
        </a>
        <div class="product-price">4 290, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 4 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-4.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������� Jawbone Up24 Lemon Lime (��������) M</figcaption>
            </figure>
        </a>
        <div class="product-price">6 490, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 1 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-1.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">Lapka PEM - �������� ����������� ��������� ���������� �����</figcaption>
            </figure>
        </a>
        <div class="product-price">7 980, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 2 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-2.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������������ ������������ ������� Jawbone Mini Jambox Blue Diamond</figcaption>
            </figure>
        </a>
        <div class="product-price">4 990, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 3 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-3.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">����������� Bluetooth-�������� JBL Flip2 ��� iPhone / iPod / iPad / Android �����</figcaption>
            </figure>
        </a>
        <div class="product-price">4 290, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 4 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-4.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������� Jawbone Up24 Lemon Lime (��������) M</figcaption>
            </figure>
        </a>
        <div class="product-price">6 490, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 1 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-1.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">Lapka PEM - �������� ����������� ��������� ���������� �����</figcaption>
            </figure>
        </a>
        <div class="product-price">7 980, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 2 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-2.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������������ ������������ ������� Jawbone Mini Jambox Blue Diamond</figcaption>
            </figure>
        </a>
        <div class="product-price">4 990, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 3 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-3.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">����������� Bluetooth-�������� JBL Flip2 ��� iPhone / iPod / iPad / Android �����</figcaption>
            </figure>
        </a>
        <div class="product-price">4 290, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 4 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-4.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������� Jawbone Up24 Lemon Lime (��������) M</figcaption>
            </figure>
        </a>
        <div class="product-price">6 490, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>
    </div>

    </section>
    <!-- /������� -->

    <!-- ��� ������ -->
    <section class="hit-sales main-section">
    <h2 class="novelty-title entry-title">X�� ������</h2>

    <div class="carousel">

    <!-- 1 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-5.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������� Jawbone Up24 Persimmon (���������) M</figcaption>
            </figure>
        </a>
        <div class="product-price">4 490, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 2 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-6.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">Apple iPhone 5C 32GB Yellow (������) MF093RU/A</figcaption>
            </figure>
        </a>
        <div class="product-price">23 900, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 3 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-7.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������������ ������������ ������� JBL Pulse</figcaption>
            </figure>
        </a>
        <div class="product-price">7 290, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 4 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-8.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">���������������� �������� Brookstone Rover Revolution</figcaption>
            </figure>
        </a>
        <div class="product-price">6 090, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 1 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-5.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������� Jawbone Up24 Persimmon (���������) M</figcaption>
            </figure>
        </a>
        <div class="product-price">4 490, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 2 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-6.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">Apple iPhone 5C 32GB Yellow (������) MF093RU/A</figcaption>
            </figure>
        </a>
        <div class="product-price">23 900, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 3 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-7.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������������ ������������ ������� JBL Pulse</figcaption>
            </figure>
        </a>
        <div class="product-price">7 290, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 4 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-8.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">���������������� �������� Brookstone Rover Revolution</figcaption>
            </figure>
        </a>
        <div class="product-price">6 090, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 1 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-5.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������� Jawbone Up24 Persimmon (���������) M</figcaption>
            </figure>
        </a>
        <div class="product-price">4 490, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 2 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-6.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">Apple iPhone 5C 32GB Yellow (������) MF093RU/A</figcaption>
            </figure>
        </a>
        <div class="product-price">23 900, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 3 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-7.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������������ ������������ ������� JBL Pulse</figcaption>
            </figure>
        </a>
        <div class="product-price">7 290, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 4 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-8.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">���������������� �������� Brookstone Rover Revolution</figcaption>
            </figure>
        </a>
        <div class="product-price">6 090, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 1 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-5.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������� Jawbone Up24 Persimmon (���������) M</figcaption>
            </figure>
        </a>
        <div class="product-price">4 490, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 2 slide -->
    <div class="slide">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-6.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">Apple iPhone 5C 32GB Yellow (������) MF093RU/A</figcaption>
            </figure>
        </a>
        <div class="product-price">23 900, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 3 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-7.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">������������ ������������ ������� JBL Pulse</figcaption>
            </figure>
        </a>
        <div class="product-price">7 290, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>

    <!-- 4 slide -->
    <div class="slide product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/carousel-8.jpg" alt="Lapka PEM" class="product-img" />
                <figcaption class="product-desc">���������������� �������� Brookstone Rover Revolution</figcaption>
            </figure>
        </a>
        <div class="product-price">6 090, -</div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" />
            <a href="#" class="button-credit">� ������</a>
        </div>
    </div>
    </div>

    </section>
    <!-- /��� ������ -->

    <!-- ��� ������ iPhone? -->
    <section class="advantage main-section">
        <h2 class="entry-title">��� ������ iPhone?</h2>
        <h3 class="advantage-subtitle entry-subtitle">
            ������ ��������� ������������� ������� Apple �� ������ � ������, �� � �� ���� ������<br /> ������������ �������� � ����� ��������?
            � ��� ���� ��������� ������� ����������:
        </h3>

        <div class="clearfix">
            <!-- 1 -->
            <div class="advantage-item">
                <div class="advantage-num">1</div>
                <div class="advantage-content">
                    ��-������, �� ������� ������ ����� � ������������ ��������� Apple, ��� �������, ����������� ����, �� ����� ������� ����������� �� ������������� �� ���������� ������! ������ ������������ � ������������ �������� (����������� ������ � ���-������� ������������� ��������� �����), ������� ������� ���������-����������, ��������� ���� ������� ����� ��������. ��� ������� ������� ������ �������������� ��������, �� ���� SIM-FREE iPhone. ������ ������ � Up-House.ru, ������ ���� ��������� � ���, ��� ��� iPhone ��� iPad ������ ����� ����������� ����� ��������� iTunes � �������� � ����� GSM-���������� ����� ������ ����.
                </div>
            </div>

            <!-- 2 -->
            <div class="advantage-item">
                <div class="advantage-num">2</div>
                <div class="advantage-content">
                    ��-������, � ����� �������� ������ ������� ����� ��������� ������� ��������� iPhone 4/4S, iPhone 5/5�/5S. �� ������� ������ �����, ������ ��� ������� iPhone, � ������� ������ 8GB, 16GB, 32 ��������� � ������������ ����������� � 64��, ������� � ����������� ��������� � ������������� ������, �� ������� �� ����������� �������� 1 ���. ������ �����, �� ������ ������� ���������� ���������� ��� iPhone � iPad: �����, �����������, �������� ������, �������������� ������ � �������� ����������.
                </div>
            </div>

            <!-- 3 -->
            <div class="advantage-item">
                <div class="advantage-num">3</div>
                <div class="advantage-content">
                    �-�������, ���� ������� �������� �������� �������� ��������� �� ������ � ��������, �� � � �����������! ��� ����� ����� ���������� �� ����������� ����� � �� ��������: ������� � ����� �������� iPhone ����� ��� ������? �� ����� �� � ��� �������?�. ������������, ��� �� ����� ������� �� ����� ������� � �� ��� ������ ������ iPhone ��������, ����� ��������� ������� �������. �� �������� ������ � ������������ ������������, � ��� �� ��������� ������� � ������� ��� �������� iPhone �� ��������, � ��� ��� �������� �������� �� ������� � ������ ��������� ����� � ������� ���� iPhone � iPad ��������� ������������� ������, �� ��������� � ������� �������� ���������� � �������� ��������� ������!
                </div>
            </div>

            <!-- 4 -->
            <div class="advantage-item">
                <div class="advantage-num">4</div>
                <div class="advantage-content">
                    �-���������, �� ��������� � ����� �������! ���� ���� �� �� ����������� �������� ������ � ����� ��������, �� � ��� ���� ������ � ���������, � �� �������� ���������������� ���! �� ������ �������� ����� �������� ���������� ��������� � ���� �� iPhone ��� iPad, ��� ���� �� ���� ���������, ��� ��� ������� ������, ���� ��������� ���������� ��� ������� ��� ������� ��� ������� � ����� ��������! ��� ��� ����� �����, ����� �� �������� �������� ��������. ������ ������� �������� � ��� �� ������������ ������, ���� ������ ����������� ������������ ��������� ������ �� ��� ��������.
                </div>
            </div>
        </div>
    </section>
    <!-- /��� ������ iPhone? -->

    </div>
    </div>
    </div>
    </main>
    <!-- /content -->


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>