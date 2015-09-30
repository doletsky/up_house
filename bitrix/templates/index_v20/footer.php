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
                <nav class="footer-nav" role="navigation">
                    <a href="#" class="footer-nav-item">� ��������</a>
                    <a href="#" class="footer-nav-item">�������</a>
                    <a href="#" class="footer-nav-item">FAQ</a>
                </nav>

                <div class="footer-seo">����������� ����� - <a href="#">��������</a></div>
                <div class="footer-strangebrain">������ ����� - <a href="http://strangebrain.ru/" target="_blank">StrangeBrain</a></div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
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