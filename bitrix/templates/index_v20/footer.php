<!-- footer -->
<footer id="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <img src="//<?=STATIC_HOST?><?=SITE_TEMPLATE_PATH?>/img/logo-footer.png?ver=2.1.0.0a4a22d" alt="up house" title="up house" class="footer-logo" />
            </div>

            <div class="col-xs-6">
                <div class="copy">
                    © UP-House, 2016<br />
                    Все права защищены.<br />
                    Информация, представленная на данном сайте не является офертой,<br />
                    определяемой положениями статей 435, 437 Гражданского Кодекса РФ
                </div>
            </div>

            <div class="col-xs-4">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "bottomMenu", array(
                        "ROOT_MENU_TYPE" => "bottom",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                );?>

                <div class="footer-seo">Продвижение сайта - <a href="#">Сеоразум</a></div>
                <div class="footer-strangebrain">Дизайн сайта - <a href="http://strangebrain.ru/" target="_blank">StrangeBrain</a></div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->
<!--</div>-->

<!-- pop-up-quick-order -->

<div class="pop-up-section" id="modal_overlay">
    <div class="pop-up-container" id="modal_overlay_cont">
    </div>
</div>
<!-- /pop-up-quick-order -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js?ver=2.1.0.0a4a22d"></script>
<!-- MOBILE VERSION -->
<script src="/include/mobit/mobit.php?js=1&amp;ver=2.1.0.0a4a22d" charset="UTF-8"></script>
<!-- /mobile version -->
<script type="text/javascript" src="//<?=STATIC_HOST?>/bitrix/templates/shop_white/private/libs/jQueryBPopup/js/jquery.bpopup.min.js?ver=2.1.0.0a4a22d"></script>
<script src="//<?=STATIC_HOST?><?=SITE_TEMPLATE_PATH?>/js/jquery.mask.js?ver=2.1.0.0a4a22d"></script>
<script src="//<?=STATIC_HOST?><?=SITE_TEMPLATE_PATH?>/js/plugins.js?ver=2.1.0.0a4a22d"></script>
<script src="//<?=STATIC_HOST?><?=SITE_TEMPLATE_PATH?>/js/main.js?ver=2.1.0.0a4a22d"></script>
<script src="//<?=STATIC_HOST?><?=SITE_TEMPLATE_PATH?>/js/pop-up-quick-order-v20.js?ver=2.1.0.0a4a22d"></script>
<script src="//<?=STATIC_HOST?><?=SITE_TEMPLATE_PATH?>/js/bootstrap.min.js?ver=2.1.0.0a4a22d"></script>
<script src="//<?=STATIC_HOST?><?=SITE_TEMPLATE_PATH?>/js/jquery.bxslider.min.js?ver=2.1.0.0a4a22d"></script>

<!-- slider script -->
<script>
    var bxsl_slider;
    $(document).ready(function () {
        bxsl_slider = $('.bxslider').bxSlider({
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
    var carousel_slider;
    $('.carousel').ready(function () {
            carousel_slider = $('.carousel').bxSlider({
                slideWidth: 195,
                minSlides: 4,
                maxSlides: 4,
                slideMargin: 30,
                preloadImages: 'all'
            });
    });
</script>
<!-- /carousel script -->

<!-- menu catalog -->
<!--<script>-->
<!--    var $menuItem = jQuery('.menu-catalog-list-item');-->
<!--    $('.js-submenu-catalog').hide();-->
<!---->
<!--    $(document).ready(function () {-->
<!---->
<!---->
<!--        $menuItem.mouseenter(function () {-->
<!--            jQuery(this).find('.js-submenu-catalog').fadeIn(300);-->
<!--        });-->
<!---->
<!--        $menuItem.mouseleave(function () {-->
<!--            jQuery(this).find('.js-submenu-catalog').fadeOut(300);-->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->

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
    // обработчик спрятать/показать форму обратной связи
    $('#call_back').bind("click", function(){
        var bFlagShowed = $("#call_back_form").css('display') == 'block';
        if(!bFlagShowed)
            $('#call_back_form').show();

        $("#call_back_form").animate({
            height: (bFlagShowed ? '0px' : '90px'),
            opacity: (bFlagShowed ? '0' : '1'),
            'padding-top': (bFlagShowed ? '0px' : '15px'),
            'padding-bottom': (bFlagShowed ? '0px' : '15px')
        }, 500, function() {
            if(bFlagShowed)
                $('#call_back_form').hide();
        });

    });

    // обработчки нажатия кнопки "перезвоните мне"
    $('.call_back_button').click(function(){
        if($('#cb_phone').val()!=''){
            $.ajax({
                type: "POST",
                url: '/formrequest.php',
                data: { phone:$('#cb_phone').val(), type:'callback' }
            }).done( function(data){ alert('Ваша заявка отправлена, мы скоро вам перезвоним!'); });

            $('#call_back').click();
        }else{
            alert('Нужно ввести номер телефона');
        }
    });

    // маска для поля "телефон" в форме обртаной связи
    $('#cb_phone').mask('+7 ?(999) 999-99-99');
</script>



<!-- /menu catalog -->

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = '129325';
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter10932967 = new Ya.Metrika({id:10932967, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/10932967" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>