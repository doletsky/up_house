

var cur_name;
var i = 0;
var regexp = new RegExp('^CLOUDFLARE::', 'i');
var len = localStorage.length;
for (i; i<len; i++) {
 cur_name = localStorage.key(i);
 if (cur_name && cur_name.match(regexp) ) {
  localStorage.removeItem(cur_name);
 }
}

$(document).on('ready',function(){
	$('.seorazum_link').attr('href','http://www.seorazum.ru');
});

function redrawMenu()
{
    $('.b_main-menu_list').each(function(){
        var $this=$(this),
            menuWidth=$this.width(),
            menuItems=$this.children('.b_main-menu_list-item'),
            menuItemsCount=menuItems.size(),
            menuItemsSumWidth=0;


        /* Корректировка ширины пунктов главного меню */
        menuItems.each(function(){
            menuItemsSumWidth+=$(this).outerWidth();
        });
        if(menuItemsSumWidth < menuWidth){
            var menuDeltaWidth=menuWidth - menuItemsSumWidth,
                menuItemDeltaWidth=Math.round(menuDeltaWidth / menuItemsCount);

            menuItemsSumWidth=0;
            menuItems.each(function(){
                $(this).css('width','+='+menuItemDeltaWidth);
                menuItemsSumWidth+=$(this).outerWidth();
            });

            /* Добавление класса модификатора последнему пункту и корректировка ширины последнего пункта */
            menuItems.filter(':last-child').addClass('main-menu_list-item_last').css('width','+=' + (menuWidth - menuItemsSumWidth));
        }
    });

    /***************************************** позционирование подменю последних пунктов *********************************************/
    $('.main-menu_list-item_last').find('.b_main-submenu').css('margin-left', '-' + (parseInt($('.main-menu_list-item_last').find('.b_main-submenu').css('width')) - parseInt($('.main-menu_list-item_last').css('width'))) + 'px');

    $('.b_main-submenu').each(function(){
        if($('.wrapper-outer .wrapper').offset().left + parseInt($('.wrapper-outer .wrapper').css('width')) + 60 < $(this).offset().left + parseInt($(this).css('width'))){
            $(this).css('margin-left', '-' + (parseInt($(this).closest('.b_main-submenu_list-item').css('width')) + parseInt($(this).css('width'))) + 'px');
        }
    });
}

function redrawTabs()
{
    $('.b_tabs_menu').each(function(){
        var $this=$(this),
            menuWidth=$this.width(),
            menuItems=$this.children('.b_tabs_menu-item'),
            menuItemsCount=menuItems.size(),
            menuItemsSumWidth=0;


        /* Корректировка ширины пунктов главного меню */
        menuItems.each(function(){
            menuItemsSumWidth+=$(this).outerWidth();
        });
        if(menuItemsSumWidth < menuWidth){
            var menuDeltaWidth=menuWidth - menuItemsSumWidth,
                menuItemDeltaWidth=Math.round(menuDeltaWidth / menuItemsCount);

            menuItemsSumWidth=0;
            menuItems.each(function(){
                $(this).css('width','+='+menuItemDeltaWidth);
                menuItemsSumWidth+=$(this).outerWidth();
            });

            /* Добавление класса модификатора последнему пункту и корректировка ширины последнего пункта */
            menuItems.filter(':last-child').addClass('tabs_menu-item_last').css('width','+=' + (menuWidth - menuItemsSumWidth));
        }
    });
}

var arrCaptureMouse = new Array();
var bFlagCapturing = true;
var arrLoadedImgs = new Array();
$(document).ready(function(){
    $('html').removeClass('no-js');

    /* Перемещение картинки в поле input-text */
    $('.b_input-text_glyph').each(function(){
        var $this=$(this),
            glyph=$this.prev(),
            glyphWidth=glyph.outerWidth(),
            glyphHeight=glyph.outerHeight(),
            glyphMargin=Math.round(glyph.outerWidth() / 4),
            glyphNewOffset={},
            inputWidth=$this.outerWidth(),
            inputHeight=$this.outerHeight(),
            inputWidthDelta=glyphWidth + 2 * glyphMargin,
            inputOffset=$this.offset(),
            inputNewOffset={};

        $this.css({
            'width':'-=' + inputWidthDelta,
            'padding-right':'+=' + inputWidthDelta
        });
        glyph.css({
            'display':'inline-block',
            'height':'18px'
        });

        glyphNewOffset.left=inputOffset.left + inputWidth - glyphWidth - glyphMargin;
        glyphNewOffset.top=inputOffset.top + Math.round((inputHeight - glyphHeight) / 2);
        glyph.offset(glyphNewOffset);
    });

    /* Главное меню */
    redrawMenu();
    /* Tabs */
    redrawTabs();

    $('.b_tabs').each(function(){
        var $this=$(this),
            items=$('.b_tabs_content',$this),
            links=$('.b_tabs_link',$this);

            items.hide();
            links.each(function(){
                $(this).bind('click.b_tabs',function(){
                    items.hide();
                    links.each(function(){
                        $(this).parent().removeClass('tabs_menu-item_active');
                    });
                    $($(this).attr('href'),$this).show();
                    $(this).parent().addClass('tabs_menu-item_active');
                    return false;
                });
            });
            links.first().trigger('click');
    });


    /* Tiny Carousel */
    $('#promo-slider').tinycarousel({
        controls:false,
        pager:true,
        interval:true,
        intervaltime:1000
    });
    $('.tiny-carousel_goods-slider').tinycarousel({
        pager:true,
        display:4
    });
    $('.tiny-carousel_goods-slider-mini').tinycarousel({
        pager:true,
        display:4
    });

    $('.b_catalog-items-container').each(function(){
        var $this=$(this),
            items=$('.b_catalog-item',$this),
            maxImageHeight=0,
            maxTextHeight=0,
            maxCharsHeight=0,
            maxPriceHeight=0;
            items.each(function(){
                var image=$('.b_catalog-item_image',$(this)),
                    imageHeight=image.height(),
                    text=$('.b_catalog-item_text',$(this)),
                    textHeight=text.height(),
                    chars=$('.b_catalog-item_chars',$(this)),
                    charsHeight=chars.height(),
                    price=$('.b_catalog-item_price',$(this)),
                    priceHeight=price.height();
                if(imageHeight>maxImageHeight) maxImageHeight=imageHeight;
                if(textHeight>maxTextHeight) maxTextHeight=textHeight;
                if(charsHeight>maxCharsHeight) maxCharsHeight=charsHeight;
                if(priceHeight>maxPriceHeight) maxPriceHeight=priceHeight;

            });


            $('.b_catalog-item_image-container',$this).css('height',maxImageHeight + 'px');
            $('.b_catalog-item_text',$this).css('height',maxTextHeight + 'px');
            $('.b_catalog-item_chars',$this).css('height',maxCharsHeight + 'px');
            $('.b_catalog-item_price',$this).css('height',maxPriceHeight + 'px');

    });

    $('.tiny-carousel_goods-slider').each(function(){
        var $this=$(this),
            items=$('.b_goods-slider-item',$this),
            maxImageHeight=0,
            maxTextHeight=0,
            maxPriceHeight=0;
            items.each(function(){
                var image=$('.b_goods-slider-item_image',$(this)),
                    imageHeight=image.height(),
                    text=$('.b_goods-slider-item_text',$(this)),
                    textHeight=text.height(),
                    price=$('.b_goods-slider-item_price',$(this)),
                    priceHeight=price.height();

                if(maxImageHeight==0)maxImageHeight=200;
                if(imageHeight>maxImageHeight) maxImageHeight=imageHeight;
                if(textHeight>maxTextHeight) maxTextHeight=textHeight;
                if(priceHeight>maxPriceHeight) maxPriceHeight=priceHeight;

            });
            $('.b_goods-slider-item_image-container',$this).css('height',maxImageHeight + 'px');
            $('.b_goods-slider-item_text',$this).css('height',maxTextHeight + 'px');
            $('.b_goods-slider-item_price',$this).css('height',maxPriceHeight + 'px');

    });

    $('.b_tiny-carousel').each(function(){
        var $this=$(this),
            viewport=$('.b_tiny-carousel_viewport',$this),
            overview=$('.b_tiny-carousel_overview',$this);
            viewport.css('height',overview.outerHeight() + 'px');
    });

   /* Cart */
    $('.b_spin-edit').each(function(){
        var $this=$(this),
            oPlus=$('.spin-edit_button_plus',$this),
            oMinus=$('.spin-edit_button_minus',$this),
            oInput=$('.b_spin-edit_input',$this),
            oValue=$('.b_spin-edit_value',$this),
            iValue=parseInt(oInput.attr('value'));
            if(!iValue) iValue=0;

            oInput.attr('value',iValue);
            oValue.html(iValue);

            oPlus.bind('click.b_spin-edit',function(){
                iValue++;
                oInput.attr('value',iValue);
                oValue.html(iValue);
                $('#basket_submit_links').append('<input type="hidden" value="Y" name="BasketRefresh">');
                $('#basket_form').submit();
                return false;
            });
            oMinus.bind('click.b_spin-edit',function(){
                if(iValue>0)
                {
                    iValue--;
                    oInput.attr('value',iValue);
                    oValue.html(iValue);
                }
                $('#basket_submit_links').append('<input type="hidden" value="Y" name="BasketRefresh">');
                $('#basket_form').submit();
                return false;
            });
    });

    /* Scroll Top */
    $('.scroll-top').each(function(){
        $(this).bind('click.scroll-top',function(){
            e.preventDefault();
            $("html,body").animate({"scrollTop":0},"1000");
        });
    });

    /* news month */
    $('.b_news-month_month').not('.lt-ie9 .b_news-month_month,.ie9 .b_news-month_month').each(function(){
        var width=$('.b_news-month_month-span',$(this)).width();
        $(this).css('top',width+37+'px');
    });

    /* Left Right Col */
    function promofix () {
    $('.right-col').css('right',parseInt(($('.wrapper-outer').width()-$('.wrapper').width())/2)-$('.right-col').width()+'px');
    $('.left-col').css('left',parseInt(($('.wrapper-outer').width()-$('.wrapper').width())/2)-$('.left-col').width()+'px');
    }
    promofix();

    $( window ).resize(function() {
        promofix();
        /* Главное меню */
        redrawMenu();
        /* Tabs */
        redrawTabs();
    });

    // ============================================= custom part ===============================================
    $("a.grouped_elements").fancybox({
   // $("a.grouped_elements").fancybox(arrLoadedImgs, {

        'padding' : 0,
        'transitionIn' : 'none',
        'transitionOut' : 'none',
        'type' : 'image',
        'changeFade' : 0
        /*
        'transitionIn'  :   'elastic',
        'transitionOut' :   'elastic',
        'speedIn'       :   600,
        'speedOut'      :   200,
        'overlayShow'   :   true*/
    });

    /*if($.cookie('overlay_showed') == 1 || ($('.b_catalog-items-container')[0] == 0 && $('#basket_form')[0] == 0)){
        $('#mouse-capture-area').remove();
        $('.b-overlay').remove();
    }*/


    $('.b-overlay_cart').find('.overlay_cart_img').append($('#main-img').clone());
    $('.b-overlay_cart').find('.overlay_cart_img #main-img').attr('id', 'overlay_cart_item_img');
    $('#overlay_cart_item_img').css('max-width', '80px');
    $('#overlay_cart_item_img').css('max-height', '90px;');
    $('.b-overlay_cart').find('.cart_item_name').text($('h1 span').text());
    $('.b-overlay_cart').find('.cart_item_price').text($('#elementPrice span').text());

    $('.overlay_cart_accessories').append($('#accessories').clone().html());
    $('.overlay_cart_accessories .catalog-top td').show();
    $('.overlay_cart_accessories td[valign=top] a').click(function(){
        ga('send', 'event', 'Acc window', 'Item open', '');
    });
    /*
    $('.overlay_cart_accessories .catalog-top a.b_button.button_green').click(function(){
        $.post($(this).attr('href'), function(){});
        $(this).text('В корзине');
        $(this).removeClass('button_green').removeClass('b_button').addClass('catalog-price');
        $(this).attr('href', '/personal/basket/');
        $(this).attr('onclick', '');
        $(this).unbind();

        _gaq.push(['_trackEvent', 'Acc window', 'Item buy', '']);
        return false;
    });
*/
    $('#addElementLink').click(function(){
        if(!$('.catalog-top').length)
            return true;

        $('.b-overlay_cart').show();
        $.post($(this).attr('href'), function(){});
        return false;
    });

    //$('.b_catalog-item_price span').click(function(){
    $('.b_catalog-item a.b_button.button_green, .product-card a.b_button.button_green').click(function(){
        var clickedBtn = this;
        //var productId = $('.b_button.button_green').eq(0).attr('product_id');
        var productId = $(this).attr('product_id');
        $.post(
            '/formrequest.php',
            {productId: productId},
            function( data ) {

                $imgProduct = $(clickedBtn).closest('.b_catalog-item').find('.b_catalog-item_image-container img').clone();
                $imgProduct.attr('width', '').attr('height', '').css('max-width', '80px').css('max-height', '100px');
                $('.overlay_cart_img').html($imgProduct);
                $('.overlay_cart_name').html($(clickedBtn).closest('.b_catalog-item').find('.b_catalog-item_text a').clone());
                $('.overlay_cart_price').html($(clickedBtn).closest('.b_catalog-item').find('.b_catalog-item_price .fs_bold').text());
                $('.b-overlay_cart .overlay_cart_accessories').html(data);

                if(!$('.b-overlay_cart .overlay_cart_accessories').find('.catalog-top').length){
                    document.location.href = $(clickedBtn).attr('href');
                    return true;
                }


                $('.b-overlay_cart').show();
                $.post($(clickedBtn).attr('href'), function(){});


                $('.overlay_cart_accessories .catalog-top a.b_button.button_green').unbind('click');
                $('.overlay_cart_accessories .catalog-top a.b_button.button_green').click(function(e){
                    e.preventDefault();
                    //_gaq.push(['_trackEvent', 'Acc tab', 'Buy', '']);
                    AddToBasketAjax($(this).attr('data-product-id'));
                });

                return false;

            }/*,
            'json'*/
        );
        return false;
    });

    $('.b-overlay_cart .b-popup-close, .dop_footer_close').click(function(){
        $('.b-overlay_cart').hide();
        ga('send', 'event', 'Exit form', 'Close', '');
    })

    $('.header').mousemove(function(event){
/*
        $('.header').unbind('mouseleave');

        //var element = $('.content').elementFromPoint(event.pageX, event.pageY);

        $('.header').bind("mouseleave", function() {
            TrackMouse(event);
        })
*/
        //$('#mouse-capture-area').css('cursor', $(element).css('cursor'));

        arrCaptureMouse[arrCaptureMouse.length] = {mouseX: event.pageX, mouseY: event.pageY};
        if(arrCaptureMouse.length > 2)
            arrCaptureMouse.splice(0, 1);
    });

    //$('#mouse-capture-area').show().bind("mouseleave", function() {
    //$('.header').bind("mouseleave", function() {
    $('.header').mouseleave(function(event) {
        TrackMouse(event);
    })


    $('.b-overlay .b-popup-close').click(function(){
        $('#mouse-capture-area').remove();
        $('.b-overlay').remove();
        ga('send', 'event', 'Exit form', 'Close', '');
    });

    var tabHash = window.location.hash.substr(1);
    if(tabHash == "accessories"){
        //$('a[href="#'+ tabHash +'"]').click();
        //$(".b_tabs_menu").scrollTo();
        $('.tabs_menu-item_active').removeClass('tabs_menu-item_active');
        $('a[href="#'+ tabHash +'"]').closest('li').addClass('tabs_menu-item_active');

        $('.b_tabs_content').hide();
        $('#accessories').show();

    }

    $('a[href="#accessories"]').bind("click", function(){
        ga('send', 'event', 'Acc tab', 'Open', '');
    });

    // маска для поля "телефон" в форме обртаной связи
    $('#cb_phone').mask('+7 ?(999) 999-99-99');

    // обработчки нажатия кнопки "перезвоните мне"
    $('.call_back_button').click(function(){
        if($('#cb_phone').val()!=''){
            $.ajax({
                type: "POST",
                url: '/formrequest.php',
                data: { phone:$('#cb_phone').val(), type:'callback' }
            }).done( function(data){ alert('Ваша заявка отправлена, мы скоро вам перезвоним!'); });

            $('.call_back').click();
        }else{
            alert('Нужно ввести номер телефона');
        }
    });

    // обработчик спрятать/показать форму обратной связи
    $('.call_back').bind("click", function(){
        var bFlagShowed = $("#call_back_form").css('display') == 'block';
        if(!bFlagShowed)
            $('#call_back_form').show();

        $("#call_back_form").animate({
            height: (bFlagShowed ? '0px' : '60px'),
            opacity: (bFlagShowed ? '0' : '1'),
            'padding-top': (bFlagShowed ? '0px' : '15px'),
            'padding-bottom': (bFlagShowed ? '0px' : '15px')
        }, 500, function() {
            if(bFlagShowed)
                $('#call_back_form').hide();
        });

    });

    // jovosite мазолит глаза и сбивает firebug, #jivo-remove - выводит только под админом
    if($('#jivo-remove').length){
        setTimeout(function(){
            $('#jivo_top_wrap').remove();
            /*$('head script[src="//code.jivosite.com/script/widget/129325"]').remove();*/
        }, 5000);
    }

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

    // обработчик на нажатие превьюшек
    //$("#img-preview-selector-border").css('left', $('#img-preview-selector img').eq(0).offsetLeft + 'px');
    $('#img-preview-selector img').click(function(){
        var aClicked = this;
        $("#img-preview-selector-border").animate({left: aClicked.offsetLeft + 'px'}, '5000');
        $("#main-img").fadeTo("fast", 0.1, function() {
            $('#main-img').attr('src', $(aClicked).attr('src'));
            $('#main-img').css('margin-top', ((parseInt($('#main-img-container').css('height')) - parseInt($('#main-img').css('height')))/2) + 'px');
            if($(aClicked).attr('class') == 'img_showed'){
                $('#loading-process').show();
                $('#main-img').attr('imgcode', $(aClicked).attr('imgcode'));
            }
            else{
//                $('#main-img').css('margin-top', '0px');
                $('#loading-process').hide();
            }
            $("#main-img").fadeTo("medium", 1);
        });

        return false;
    });

    // подгрузка полных версий всех изображений товара
    if($('#img-preview-selector').length){
        setTimeout(function(){
            $allPreviews = $('#img-preview-selector img');
            for (i = 1; i < $allPreviews.length; i++)
                GetFullImg($allPreviews.eq(i).attr('imgcode'), i);
        }, 3000);
    }


    if($('#img-preview-selector').length)
        setTimeout(function(){
            //$('#img-preview-selector img').eq(0).click();
            $("#img-preview-selector-border").css('left', $('#img-preview-selector img')[0].offsetLeft + 'px');
            $("#img-preview-selector-border").css('display', 'block');

        }, 2500);

    /*
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = '/bitrix/templates/shop_white/private/js/jquery-ui-1.10.4.custom.js';
        head.appendChild(script);
    */
    // ============================================= custom part ===============================================

    $('.smartfilter .filtren .lvl2 span').click(function (){
        if($(this).closest('li').find('input').attr('checked') == 'checked'){
            $(this).closest('li').find('input').attr('checked', '');
            $(this).closest('li').find('input').removeAttr('checked');
        }
        else
            $(this).closest('li').find('input').attr('checked', 'checked');
    });


    $('.dropdown select').click(function (){
        if($(this).attr('active_state') == '1'){
            $(this).attr('active_state', '');
            $(this).removeAttr('active_state');
            $(this).css('background', 'url("/bitrix/templates/shop_white/private/images/smartfiler/arrows.png")  no-repeat scroll right 0 rgba(0, 0, 0, 0)');
            $(this).focus();
        }
        else{
            $(this).attr('active_state', '1');
            $(this).css('background', 'url("/bitrix/templates/shop_white/private/images/smartfiler/arrows_active.png")  no-repeat scroll right 0 rgba(0, 0, 0, 0)');
        }
    });

    $('.dropdown select').focusout(function (){
        $(this).css('background', 'url("/bitrix/templates/shop_white/private/images/smartfiler/arrows.png")  no-repeat scroll right 0 rgba(0, 0, 0, 0)');
        $(this).attr('active_state', '');
        $(this).removeAttr('active_state');
       // $(this).attr('active', '1');
    });


    $lvls = $('.filtren .lvl1');
    for(var i=0; i< $lvls.length; i++){
        $smart_filter_containers = $lvls.eq(i).find('.smart-filter-container');
        if($smart_filter_containers.length == 2)
            $lvls.eq(i).find('.smart_filter_select_liar_container').show();
        else
            $lvls.eq(i).find('.smart_filter_select_liar_container').hide();
    }


    if(!$('#img-preview-selector').length){
        $('#fancy-box-phantom').fancybox({
            'padding' : 0,
            'transitionIn' : 'none',
            'transitionOut' : 'none',
            'type' : 'image',
            'changeFade' : 0

        });
    }

    $('#fancy-box-phantom').unbind("click");
    $('#fancy-box-phantom').click(function(){
        var clickedId = $(this).attr('data-id');

        if($('#img-preview-selector').length)
            $('#img-preview-selector a.grouped_elements').eq(clickedId|0).click();
        else{
            $(this).fancybox({
                'padding' : 0,
                'transitionIn' : 'none',
                'transitionOut' : 'none',
                'type' : 'image',
                'changeFade' : 0

            });
        }

        return false;
    });

    if(!$('#img-preview-selector').length){
        $('#fancy-box-phantom').click();
    }

    $('#arrFilter_P1_MIN, #arrFilter_P1_MAX, .smart-filter, #set_filter, #del_filter, .ui-slider-handle, .checkbox-visible, li.lvl2 label').click(function(){
        ga('send', 'event', 'Filter', 'Used', '');
    });

    $('.delivery_city_select select').change(function(){
        $('.delivery_item_container').hide();
        $('.delivery_item_container.region_' + $(this).val()).show();
    });

    $('.delivery_link').click(function(){
        $('.delivery_item_description').css('height', '0px');

        var needHeight = parseInt($(this).closest('.delivery_item_container').find('.delivery_item_description span').css('height'));
        needHeight = (needHeight != 0 ? needHeight + 10 : 0);
        $(this).closest('.delivery_item_container').find('.delivery_item_description').animate(
            {height: needHeight},
            500
        );
    });

    /***************************************** раскрывашки в faq *********************************************/
    // получили высоту каждого блока, скрыли блоки
    if($('.faq_answer').length){
        $('.faq_answer').each(function(){
            $(this).attr('data-height', parseInt($(this).height()));
        });

        $('.faq_answer').css('height', '0px');
    }

    // по клику скрываем все что можно и раскрывает кликнутый
    $('.faq_question').click(function(){
        $faq_answer_clicked = $(this).closest('.faq_block').find('.faq_answer');

        $('.faq_answer').animate({
            height: 0,
            'padding-bottom': 0
        }, 500, function(){
        });

        setTimeout(function(){
            $faq_answer_clicked.animate({
                height: $faq_answer_clicked.attr('data-height'),
                'padding-bottom': 20
            }, 1000);
        }, 500);
    });
    /***************************************** раскрывашки в faq *********************************************/

    /***************************************** обновление корзины *********************************************/
    $('.overlay_cart_accessories .catalog-top a.b_button.button_green').unbind('click');
    $('.overlay_cart_accessories .catalog-top a.b_button.button_green').click(function(e){
        e.preventDefault();
        //_gaq.push(['_trackEvent', 'Acc tab', 'Buy', '']);
        AddToBasketAjax($(this).attr('data-product-id'));
    });

    $('.b-popup-close, .dop_footer_close').click(function(){
        RefreshBasketAmount();
    });
    /***************************************** обновление корзины *********************************************/



    /***************************************** карта из доставки в карточе товара *********************************************/
    $('#delivery_map_krasnodar_btn, #delivery_map_moscow_btn').fancybox({
        'titlePosition'     : 'inside',
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        // fix inline bug
        'onCleanup': function () {
            var myContent = this.href;
            $(myContent).unwrap();
        }
    });
    /***************************************** карта из доставки в карточе товара *********************************************/

    CookieSave();

});

function CookieSave(){
/*    $refferer = 'test';
    if(!$.cookie('HTTP_REFFERER'))
        $.cookie('HTTP_REFFERER', $refferer, { path: "/", expires: 1});
*/
    /*if($.cookie('HTTP_REFERER')){
        $('#ORDER_FORM').append('<input type="hidden" name="REFERER" value="' + JSON.stringify({referer_id : parseInt($.cookie('HTTP_REFERER')), referer_host : parseInt($.cookie('REFERER_HOST'))}) + '" />');
    }*/
//        $('#ORDER_FORM').append('<input type="hidden" name="REFERER" value="' + $.cookie('HTTP_REFERER') + '" />');
}

function RefreshBasketAmount(){
    $.ajax({
        type: "POST",
        url: '/formrequest.php',
        data: { action: 'BASKET_AMOUNT' }
    }).done(function(data){
        if(data.length)
            $('.header .new_basket a').text(data);
    });
}

function AddToBasketAjax(productId){
    $.ajax({
        type: "POST",
        url: '/formrequest.php',
        data: { action: 'ADD2BASKET', id: productId }
    }).done(function(data){
        if(parseInt(data) > 0){
            $buyBtn = $('a[data-product-id='+ productId +']');
            $buyBtn.replaceWith('<span data-product-id="'+ productId +'" class="b_button button_green">В корзине</span>');
            //$buyBtn.text('В корзине');

        }

        else
            alert('Ошибка добавления товара в корзину. Попробуйте позже');

    });
}

function GetFullImg(imgCode, iNum){
    $.ajax({
        type: "POST",
        url: '/formrequest.php',
        data: { imgCode: imgCode, imgNum: iNum }
    }).done(function(data){
        var data = $.parseJSON(data);

        var dataHTML = '<a class="grouped_elements" rel="group1" href="">';
        dataHTML += data.imgHTML;
        dataHTML += '</a>';

        $('#img-preview-selector').find('img[imgcode='+ data.imgCode +'].img_showed').after(dataHTML);

        $('#img-preview-selector').find('img[imgcode='+ data.imgCode +'].img_hided').one('load', function(){
            //arrLoadedImgs[arrLoadedImgs.length] = 'http://' + document.domain + $(this).attr('src');
            $(this).closest('a').attr('href', 'http://' + document.domain + $(this).attr('src'));
            $("a.grouped_elements").fancybox({
                // $("a.grouped_elements").fancybox(arrLoadedImgs, {

                'padding' : 0,
                'transitionIn' : 'none',
                'transitionOut' : 'none',
                'type' : 'image',
                'changeFade' : 0
                /*
                 'transitionIn' :   'elastic',
                 'transitionOut'    :   'elastic',
                 'speedIn'      :   600,
                 'speedOut'     :   200,
                 'overlayShow'  :   true*/
            });
            $('#img-preview-selector').find('img[imgcode='+ data.imgCode +'].img_showed').hide();
            $('#img-preview-selector').find('img[imgcode='+ data.imgCode +'].img_hided').show();

            $('#img-preview-selector img').unbind("click");
            $('#img-preview-selector img').click(function(){
                var aClicked = this;
                $("#img-preview-selector-border").animate({left: aClicked.offsetLeft + 'px'}, '5000');
                $("#main-img").fadeTo("fast", 0.1, function() {
                    $('#main-img').attr('src', $(aClicked).attr('src'));

                    /*if($(this).attr('src') == $('#img-preview-selector img').eq(0).attr('src'))
                        $('#img-preview-selector img').eq(0).removeClass('class');*/
                    $('#main-img').closest('a').attr('href', $(aClicked).closest('a').attr('href'));
                    $('#main-img').closest('a').attr('data-id', $('#img-preview-selector a[rel=group1]').index($(aClicked).closest('a')));
                    if($(aClicked).attr('class') == 'img_showed'){
                        $('#loading-process').show();
                        $('#main-img').attr('imgcode', $(aClicked).attr('imgcode'));
                    }
                    else{
                        //$('#main-img').css('margin-top', '0px');
                        $('#loading-process').hide();
                    }
                    $("#main-img").fadeTo("medium", 1);
                    $('#main-img').css('margin-top', ((parseInt($('#main-img-container').css('height')) - parseInt($('#main-img').css('height')))/2) + 'px');
                });
                return false;
            });


            $('#fancy-box-phantom').unbind("click");
            $('#fancy-box-phantom').click(function(){
                var clickedId = $(this).attr('data-id');

                $('#img-preview-selector a.grouped_elements').eq(clickedId|0).click();
                return false;
            });
            // если подгруженная картинка относится к той, что сейчас показывается в превью
            //if($('#main-img').attr('src') == $('#img-preview-selector').find('img[imgcode='+ data.imgCode +'].img_hided').attr('src'))
            if($('#main-img').attr('imgcode') == data.imgCode)
                    $('#img-preview-selector').find('img[imgcode='+ data.imgCode +'].img_hided').click();
        }).each(function() {
            if(this.complete)
                $(this).load();
        });
    });
}

(function ($){
    var check=false; isRelative=true;

    $.fn.extend({
        elementFromPoint : function(x,y)
        {
            if(!document.elementFromPoint) return null;

            if(!check)
            {
                var sl;
                if((sl = $(document).scrollTop()) >0)
                {
                    isRelative = (document.elementFromPoint(0, sl + $(window).height() -1) == null);
                }
                else if((sl = $(document).scrollLeft()) >0)
                {
                    isRelative = (document.elementFromPoint(sl + $(window).width() -1, 0) == null);
                }
                check = (sl>0);
            }

            if(!isRelative)
            {
                x += $(document).scrollLeft();
                y += $(document).scrollTop();
            }

            return document.elementFromPoint(x,y);
        }
    })
})(jQuery);

function TrackMouse(event){

    if(DefineDirection())
        if($('.new_basket a').attr('class').indexOf('basket_active') > -1){
            $('.b-overlay').show();

            var date = new Date();
            date.setTime(date.getTime() + (15 * 60 * 1000));
            //date.setTime(date.getTime() + (1 * 60 * 60 * 1000));
            $.cookie('overlay_showed', 1,{ path: "/" , expires: date});

            ga('send', 'event', 'Exit form', 'Open', '');
        }

    //console.log(event.pageY);
}

function DefineDirection(){
    /*if($.cookie('overlay_showed') != 1)
        //if($('.b_catalog-items-container').length != 0)
        if($('.b_catalog-items-container')[0] != 0 && $('#basket_form')[0] != 0)
            if(arrCaptureMouse.length > 1)
                if(arrCaptureMouse[0].mouseY - arrCaptureMouse[1].mouseY > 0)
//                    if(arrCaptureMouse[1].mouseY < 10)
                        return true;*/
    return false;
}

$(window).load(function () {


});

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validatePhone(phone) {
    var re = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
    return re.test(phone);
}

function SendEmail(btn){
    var form = $(btn).closest('form');
    if(!validatePhone($(form).find('input[name=phone]').val())){
        alert('В номере телефона допущена ошибка');
        return false;
    }


    SendPost('EmailSend', {strMsg: $(form).find('textarea[name=msg]').val(), strPhone: $(form).find('input[name=phone]').val()}, 'ShowEmailSendResult');
    ga('send', 'event', 'Exit form', 'Send', '');
}

function SendPost(strFunc, params, strHadler){
    path = '/email_proc.php';
    $.post(
        path,
        {strFunc: strFunc, params: params, strHandler: strHadler},
        function( data ) {
            AjaxEventHandler(data);
        },
        'json'
    );
}

function AjaxEventHandler(data){
    if(data.strHandler){
        var fn = window[data.strHandler];
        if(typeof fn === 'function')
            fn(data.data);
    }
    else
        alert('No such func');
}

function ShowEmailSendResult(data){
    if(data.result){
        $('.b-popup-text .b-overlay-caption').text('Спасибо!');
        $('.b-popup-text .b-overlay-text').text('Ваше сообщение успешно отправлено!');
    }
    else{
        $('.b-popup-text .b-overlay-caption').text('Ошибка!');
        $('.b-popup-text .b-overlay-text').text('Ваше сообщение не удалось отправить!');
    }

    $('.b-popup-text #b-overlay-form').remove();
}

function ReShowSelected($selectPlace, $smart_filter_select){
    // выбрать все, что не от Битрикса
    $custom = $selectPlace.find('option[custom=1]');
    // активировать их
    $custom.attr('custom', false).prop("disabled", false);

    // выбрать одного от битрикса, участвующего именно в этом блоке
    $thisnocustom = $smart_filter_select.find('option[custom=2]');
    // активировать его
    $selectPlace.find('option[filter-name=' + $thisnocustom.attr('filter-name') + ']').prop('disabled', false);

    // остальные все активные и выбранные позиции
    $selectedOptions = $selectPlace.find('option:selected[disabled!=disabled]');

    // все активные и невыбранные позиции
    $unselectedOptions = $selectPlace.find('select:not(#smart_filter_select_origin) option:not(:selected)[disabled!=disabled]');

    // у всех невыбранных позиций деактивировать все совпадения выбранных
    for(var i=0; i < $selectedOptions.length; i++)
        $unselectedOptions.filter('option[filter-name=' + $selectedOptions.eq(i).attr('filter-name') + ']').attr('disabled', 'disabled').attr('custom', '1');
}

function SmartFilterSelected(smart_filter_select, liar){
    // есть два блока: оригинал - скрыт (используется для генерации новых), ложный - не меняется (используется для подставновки)

    // защита от ложного срабатывание
    if(!$(smart_filter_select).is(":focus"))
        return;

    // пригодится сама форма, выбранная позиция, область выбора(все селекты относящиеся к одному свойству) и скрытый блок оригинала для клонирования
    $form = $(smart_filter_select).closest('form');
    $selectedOption = $(smart_filter_select).find(":selected");
    $selectPlace = $(smart_filter_select).closest('li');
    $smart_filter_select_origin_container = $selectPlace.find('div.smart_filter_select_origin_container');
    $smart_filter_select_liar_container = $selectPlace.find('div.smart_filter_select_liar_container');

    // если сработал блок, который не участвовал в выборе изначально (ложный)
    if(liar){

        // добавить клон и инициализировать
        var divCount = $selectPlace.find('div.smart-filter-container').length - 1; // кроме оригинала
        $newDiv = $smart_filter_select_origin_container.clone(true);
        $newDiv.attr('select-for-id', $newDiv.attr('select-for-id') + '_' + divCount);
        $newDiv.removeClass('smart_filter_select_origin_container');
        $newDiv.find('select').removeAttr('id');

        // перенесем выбранную позицию с ложного блока
        $newDiv.find('option[filter-name='+ $selectPlace.find('.smart_filter_select_liar_container').find('option:selected[disabled!=disabled]').attr('filter-name') +']').attr('selected', 'selected');
        // вставим перед ложным блоком
        $newDiv.insertBefore($selectPlace.find('.smart_filter_select_liar_container'));
        // у ложного блока вернем изначальное "не выбранное" значение
        $selectPlace.find('.smart_filter_select_liar_container select')[0].selectedIndex = 0;

        // покажем новый(клонированный) блок
        $newDiv.show();
        // получим input клона для отсылки битриксу
        $input = $newDiv.find('input');

        $smart_filter_select_liar_container.hide();

    }
    else
        // получим input существующий для отсылки битриксу
        $input = $(smart_filter_select).closest('div').find('input');

    // изменим input
    $input.attr('name', $selectedOption.attr('filter-name')).attr('value', $selectedOption.attr('value'));


    // деактивируем все выбранные позиции со всех блоков
    ReShowSelected($selectPlace, $(smart_filter_select));

    $(smart_filter_select).attr('active_state', '');
    $(smart_filter_select).removeAttr('active_state');
    $(smart_filter_select).css('background', 'url("/bitrix/templates/shop_white/private/images/smartfiler/arrows.png")  no-repeat scroll right 0 rgba(0, 0, 0, 0)');
}

function RemoveOption(a){
    // обработчик от "удалить"
    $selectPlace = $(a).closest('li');
    $smart_filter_containers = $selectPlace.find('.smart-filter-container');
    if($smart_filter_containers.length == 2)
        return false;


    // блок для удаления, область выбора(все селекты относящиеся к одному свойству), выбранная позиция
    $divToRemove = $(a).closest('div.smart-filter-container');
    $selectPlace = $divToRemove.closest('li');
    $optionSelected = $divToRemove.find('option:selected');

    // снимем выбранную позицию в этом блоке со всех селектов этой области выбора
    $selectPlace.find('select option[filter-name='+ $optionSelected.attr('filter-name') +']').prop("disabled", false);

    if($smart_filter_containers.length == 3)
        $selectPlace.find('.plus_from_smart_filter').click();

    // удалим блок
    $divToRemove.remove();


}

function ShowOption(a){
/*    $smart_filter_select = $(a).closest('.smart-filter-container').find('.dropdown select.smart-filter');

    $form = $smart_filter_select.closest('form');
    $selectedOption = $smart_filter_select.find(":selected");
    $selectPlace = $smart_filter_select.closest('li');
    $smart_filter_select_origin_container = $selectPlace.find('div.smart_filter_select_origin_container');


    // добавить клон и инициализировать
    var divCount = $selectPlace.find('div.smart-filter-container').length - 1; // кроме оригинала
    $newDiv = $smart_filter_select_origin_container.clone(true);
    $newDiv.attr('select-for-id', $newDiv.attr('select-for-id') + '_' + divCount);
    $newDiv.removeClass('smart_filter_select_origin_container');
    $newDiv.find('select').removeAttr('id');

    // перенесем выбранную позицию с ложного блока
    $newDiv.find('option[filter-name='+ $selectPlace.find('.smart_filter_select_liar_container').find('option:selected[disabled!=disabled]').attr('filter-name') +']').attr('selected', 'selected');
    // вставим перед ложным блоком
    $newDiv.insertBefore($selectPlace.find('.smart_filter_select_liar_container'));
    // у ложного блока вернем изначальное "не выбранное" значение
    $selectPlace.find('.smart_filter_select_liar_container select').eq(0).selectedIndex = 0;

    // покажем новый(клонированный) блок
    //$newDiv.show();
    // получим input клона для отсылки битриксу
    $input = $newDiv.find('input');

/*
    $(a).next('.smart_filter_select_liar_container').show();
    //$(a).prev('.smart_filter_select_liar_container').show();
    $(a).hide();*/
    $selectPlace = $(a).closest('li');
    $selectPlace.find('.smart_filter_select_liar_container').show();

}

var m_i = document.createElement('script');
m_i.type = 'text/javascript';
m_i.async = true;
if (!!('ontouchstart' in window))
{
    m_i.src = "/private/js/touch_initialization.js";
}
else
{
    m_i.src = "/private/js/regular_initialization.js";
}
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(m_i, s);
