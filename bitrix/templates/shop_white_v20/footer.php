                </div>
            </div>
        </div>
</main>
<!-- footer -->
<footer id="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/logo-footer.png" alt="up house" title="up house" class="footer-logo" />
            </div>

            <div class="col-xs-6">
                <div class="copy">
                    © UP-House, 2014<br />
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

        <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "bottomCatalogMenuV20", array(
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
                "ADD_SECTIONS_CHAIN" => "N"
            ),
            false
        );?>

    </div>
</footer>
<!-- /footer -->
</div>

<!-- pop-up-quick-order -->

<div class="pop-up-section" id="modal_overlay">
    <div class="pop-up-container" id="modal_overlay_cont">
    </div>
</div>
<!-- /pop-up-quick-order -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="/bitrix/templates/shop_white/private/libs/jQueryBPopup/js/jquery.bpopup.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.mask.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/pop-up-quick-order-v20.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.bxslider.min.js"></script>

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

<!-- slider submenu -->
<script>
    $(document).ready(function () {
        var countSlide=$('#slide-submenu a').length;
        slideSubmenu=$('#slide-submenu').bxSlider({
            slideWidth: 89,
            minSlides: 1,
            maxSlides: 5,
            moveSlides: 1,
            slideMargin: 85,
            pager: false,
            onSliderLoad: function(){
                if(countSlide<6) $('.bx-controls-direction a').addClass('disabled');//console.log(this);
            }
        });
        slideSubmenu.goToSlide(slideNum);console.log('sNm='+slideNum);
    });
</script>
<!-- /slider submenu -->
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
    // обработчик спрятать/показать форму обратной связи
    $('#call_back').bind("click", function(){
        var bFlagShowed = $("#call_back_form").css('display') == 'block';console.log(bFlagShowed);
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
<!--<script type='text/javascript'>-->
<!--    (function(){ var widget_id = '129325';-->
<!--        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>-->
<!-- {/literal} END JIVOSITE CODE -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter10932967 = new Ya.Metrika({id:10932967, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/10932967" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>