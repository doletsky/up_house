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

<?$APPLICATION->ShowViewContent('add_cart_popup');?>


<script type="text/javascript" src="/bitrix/templates/shop_white/private/libs/jQueryBPopup/js/jquery.bpopup.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.mask.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins.js"></script>
<script src="/bitrix/templates/shop_white/private/js/jquery.fancybox.pack.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/pop-up-quick-order-v20.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="/bitrix/templates/shop_white/private/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
<link rel="stylesheet" href="/bitrix/templates/shop_white_v20/css/jquery-ui-1.10.4.custom.css">
<link rel="stylesheet" href="/bitrix/templates/shop_white_v20/css/private_smart_filter.css">
<script>
    // vvv ===================== часть шкалы цен для смартфильтра
    // переменна хранит в себе всю ширину фильтра
    var sliderRangeWidth = parseInt($('#slider-range').css('width'));

    // #slider-fixed-range-max выводит серую область всего диапазона
    $('#slider-range').append('<div id="slider-fixed-range-max" class="slider-range-styles" style="width: ' + (sliderRangeWidth - 10) + 'px"></div>');

    // #slider-fixed-range выводит зеленую часть доступного диапазона
    $('#slider-range').append('<div id="slider-fixed-range" class="slider-range-styles"></div>');
    $('#slider-fixed-range').css('left',  (5 + $('#slider-range').attr('minval') * (sliderRangeWidth - 10) / $('#slider-range').attr('extrmaxval')) + 'px');
    $('#slider-fixed-range').css('width', ($('#slider-range').attr('maxval') * (sliderRangeWidth - 10) / $('#slider-range').attr('extrmaxval') - parseInt($('#slider-fixed-range').css('left')) + 5) + 'px');

    // ширина выбраннй области, не показывается пользователю и в текущей реализации в принципе не нужна
    $('.ui-widget-header').css('width', (sliderRangeWidth - 10) + 'px');

    // позиционирование засечек
    var sliderRangeWidthQuarter = (sliderRangeWidth - 10) / 4;
    for(var i=0; i<5; i++)
        $('#slider-range').append('<div class="slider-pin" style="left: ' + (5 + sliderRangeWidthQuarter*i - ((i == 4) ? 1 : 0)) + 'px"></div>');

    // позицонирование значений засечек
    $sliderMiddles = $('#slider-scale .slider-middles');
    $sliderMiddles.eq(0).css('left', '3px');
    for(var i=1; i<$sliderMiddles.length-1; i++)
        $sliderMiddles.eq(i).css('left', (3 + sliderRangeWidthQuarter*i - parseInt($sliderMiddles.eq(i).css('width'))/2) + 'px');
    $sliderMiddles.eq(4).css('left', (sliderRangeWidth - parseInt($sliderMiddles.eq(4).css('width'))) + 'px');
    // ^^^ ===================== часть шкалы цен для смартфильтра
    $(function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: $('#slider-range').attr('extrmaxval')/100,

            values: [ $('#slider-range').attr('minval')/100,
                $('#slider-range').attr('maxval')/100 ],
            slide: function( event, ui ) {console.log(ui);
                $(".min-price").val(ui.values[0] * 100);
                $(".max-price").val(ui.values[1] * 100);

                var perCentMinPrice = (parseInt($("#slider-range a:first-of-type").css('left')) / parseInt($('#slider-range').css('width')));
                var perCentMaxPrice = (parseInt($("#slider-range a:last-of-type").css('left')) / parseInt($('#slider-range').css('width')));

                $("#slider-range a:first-of-type").css('margin-left', "-" + (10 * perCentMinPrice) + "px");
                $("#slider-range a:last-of-type").css('margin-left', "-" + (10 * perCentMaxPrice) + "px");
            }
        });
        $( ".min-price" ).val( $( "#slider-range" ).slider( "values", 0 ) * 100 );
        $( ".max-price" ).val( $( "#slider-range" ).slider( "values", 1 ) * 100 );

        var perCentMinPrice = (parseInt($("#slider-range a:first-of-type").css('left')) / parseInt($('#slider-range').css('width')));
        var perCentMaxPrice = (parseInt($("#slider-range a:last-of-type").css('left')) / parseInt($('#slider-range').css('width')));

        $("#slider-range a:first-of-type").css('margin-left', "-" + (10 * perCentMinPrice) + "px");
        $("#slider-range a:last-of-type").css('margin-left', "-" + (10 * perCentMaxPrice) + "px");
    });
</script>

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
<!-- /carousel script -- <?=$TOP_DEPTH?> -->
<?if($TOP_DEPTH!=3):?>
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
            if(slideNum>0){slideSubmenu.goToSlide(slideNum);console.log('sNm='+slideNum);}
        });
    </script>
    <!-- /slider submenu -->
<?endif?>
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

<?$APPLICATION->ShowViewContent('script_cart_buttons');?>

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