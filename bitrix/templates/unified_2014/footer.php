
</div>
</div>
</div>
</main>
<!-- /content -->

<!-- footer -->
<footer id="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <img src="img/logo-footer.png" alt="up house" title="up house" class="footer-logo" />
            </div>

            <div class="col-xs-6">
                <div class="copy">
                    © UP-House, 2014<br />
                    Все права защищены.<br />
                    Информация, представленная на данном сайте не является офертой,<br />
                    определяемой положениями статей 435, 437 Гражданского Кодекса РФ
                </div>
            </div>

            <div class="col-xs-4">
                <nav class="footer-nav" role="navigation">
                    <a href="#" class="footer-nav-item">О компании</a>
                    <a href="#" class="footer-nav-item">Новости</a>
                    <a href="#" class="footer-nav-item">FAQ</a>
                </nav>

                <div class="footer-seo">Продвижение сайта - <a href="#">Сеоразум</a></div>
                <div class="footer-strangebrain">Дизайн сайта - <a href="http://strangebrain.ru/" target="_blank">StrangeBrain</a></div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="private/js/plugins.js"></script>
<script src="private/js/main.js"></script>
<script src="private/js/bootstrap.min.js"></script>
<script src="private/js/jquery.bxslider.min.js"></script>
<script src="private/js/custom_scripts.js.js"></script>

<!-- slider script -->
<script>
    $(document).ready(function () {
        $('.bxslider').bxSlider({
            mode: 'fade',   // включаем, эффект затухания
            auto: true,     // включаем, автоматическую смену слайдов, через каждые 4 секунды
            captions: true, // включаем, контент в слайде
            pause: 4000,    // смотрим 2 пункт
            speed: 1000     // скорость эффекта затухания
        });
    });
</script>

<!-- carousel script -->
<script>
    $(document).ready(function () {
        $('.carousel').bxSlider({
            slideWidth: 195,
            minSlides: 4,
            maxSlides: 4,
            slideMargin: 30
        });
    });
</script>
<!-- /carousel script -->

<!-- menu catalog -->
<script>
    var $menuItem = jQuery('.menu-catalog-list-item');
    $('.js-submenu-catalog').hide();

    $(document).ready(function () {


        $menuItem.mouseenter(function () {
            jQuery(this).find('.js-submenu-catalog').fadeIn(300);
        });

        $menuItem.mouseleave(function () {
            jQuery(this).find('.js-submenu-catalog').fadeOut(300);
        });

    });
</script>

<script>
    var $menuItem = jQuery('.menu-catalog-list-item');
    $('.js-submenu-catalog').hide();

    $(document).ready(function () {


        $menuItem.mouseenter(function () {
            jQuery(this).find('.js-submenu-catalog').fadeIn(300);
        });

        $menuItem.mouseleave(function () {
            jQuery(this).find('.js-submenu-catalog').fadeOut(300);
        });

    });
</script>



<!-- /menu catalog -->
</body>
</html>