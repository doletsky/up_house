<!-- footer -->
<footer id="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/logo-footer.png" alt="up house" title="up house" class="footer-logo" />
            </div>

            <div class="col-xs-6">
                <div class="copy">
                    � UP-House, 2014<br />
                    ��� ����� ��������.<br />
                    ����������, �������������� �� ������ ����� �� �������� �������,<br />
                    ������������ ����������� ������ 435, 437 ������������ ������� ��
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

                <div class="footer-seo">����������� ����� - <a href="#">��������</a></div>
                <div class="footer-strangebrain">������ ����� - <a href="http://strangebrain.ru/" target="_blank">StrangeBrain</a></div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->
</div>

<!-- pop-up-quick-order -->
<div class="pop-up-bg"></div>
<div class="pop-up-section">
    <div class="pop-up-container">
        <div class="pop-up pop-up-quick-order">
            <div class="clearfix pop-up-header">
                <h1 class="pull-left pop-up-title">������� �����</h1>
                <div class="pull-right pop-up-close">
                    <a href="#"><i class="pop-up-close-icon"></i></a>
                </div>
            </div>
            <div class="horizontal-line horizontal-line-main"></div>

            <div class="pop-up-content clearfix">
                <div class="pull-left pop-up-picture">
                    <img src="img/pop-up-quick-order.jpg" class="pop-up-img" alt="�������� OnePlus One 16Gb White (�����)" />
                </div>
                <div class="pull-left pop-up-product">
                    <h1 class="pop-up-product-title">�������� OnePlus One 16Gb White (�����)</h1>
                    <div class="pop-up-product-price">15 990 <span class="cy">���.</span></div>
                </div>
            </div>

            <div class="pop-up-form-block clearfix">
                <div class="contact-details">
                    <input type="text" placeholder="�.�.�.*" required="" class="form-input form-input-name"><br>
                    <input type="email" placeholder="e-mail*" required="" class="form-input form-input-name"><br>
                    <input type="tel" placeholder="���������� �������*" required="" class="form-input form-input-name">
                </div>
                <div class="contact-details-2">
                    <textarea class="form-textarea" placeholder="����� � ����������� "></textarea>
                </div>
            </div>

            <div class="pop-up-buy clearfix">
                <div class="pop-up-buy-text pull-left">
                    �������� ������ �������� �������� � ���� ��� ��������� ������ � ������� ��������.
                </div>
                <div class="pop-up-buy-button pull-left">
                    <a href="#" class="button-bg">������</a>
                </div>
            </div>
        </div>
        <div class="pop-up pop-up-quick-order-success">
            <div class="pull-right pop-up-close">
                <a href="#"><i class="pop-up-close-icon"></i></a>
            </div>
            <h3>�������! ��� ����� ���������.</h3>
            �������� ������ �������� �������� � ���� � ��������� �����.
        </div>
    </div>
</div>
<!-- /pop-up-quick-order -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/pop-up-quick-order.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.mask.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.bxslider.min.js"></script>

<!-- slider script -->
<script>
    $(document).ready(function () {
        $('.bxslider').bxSlider({
            mode: 'fade',   // ��������, ������ ���������
            auto: true,     // ��������, �������������� ����� �������, ����� ������ 4 �������
            captions: true, // ��������, ������� � ������
            pause: 4000,    // ������� 2 �����
            speed: 1000     // �������� ������� ���������
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
    // ���������� ��������/�������� ����� �������� �����
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

    // ���������� ������� ������ "����������� ���"
    $('.call_back_button').click(function(){
        if($('#cb_phone').val()!=''){
            $.ajax({
                type: "POST",
                url: '/formrequest.php',
                data: { phone:$('#cb_phone').val(), type:'callback' }
            }).done( function(data){ alert('���� ������ ����������, �� ����� ��� ����������!'); });

            $('#call_back').click();
        }else{
            alert('����� ������ ����� ��������');
        }
    });

    // ����� ��� ���� "�������" � ����� �������� �����
    $('#cb_phone').mask('+7 ?(999) 999-99-99');
</script>



<!-- /menu catalog -->
</body>
</html>