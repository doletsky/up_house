var prevWith, currentWith;

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
        var   $this=$('.b_main-menu_list')
            , menuItems=$this.children('.b_main-menu_list-item')
            , menuItemsCount=menuItems.size();

        if (prevWith > 0)
        {
            var diff = currentWith * 100 / prevWith;
            menuItems.each(function(){
                var currW = $(this).outerWidth();
                var newW = Math.floor(currW * diff / 100);
                $(this).css('width', newW);
            });
        }
            var   menuWidth=$this.width()
                , menuItemsSumWidth=0;;
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


    /***************************************** позционирование подменю последних пунктов *********************************************/
    $('.main-menu_list-item_last').find('.b_main-submenu').css(
          'margin-left'
        , '-'
          + (
              parseInt($('.main-menu_list-item_last').find('.b_main-submenu').css('width'))
            - parseInt($('.main-menu_list-item_last').css('width'))
            )
          + 'px'
    );

    $('.b_main-submenu').each(function(){
        if(   $('.wrapper-outer .wrapper').offset().left + $('.wrapper-outer .wrapper').width() + 60
            < $(this).offset().left + $(this).width()
          )
        {
            $(this).css(
                'margin-left'
                , '-'
                  + (
                      $(this).offsetParent().width()
                      + 4
                      + $(this).width()
                    )
                  + 'px'
                );
        }
    });
}

function redrawTabs()
{
    $('.b_tabs_menu').ready(function()
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
    });
}

$(function(){
    $('html').removeClass('no-js');

    if (document.referrer.indexOf(location.hostname) < 0)
        setTimeout(function(){
            ga('send', 'event', "Новый посетитель", location.pathname);
        }, 15000);


    $('.tablebodytext').hide();
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
        intervalTime:5000,
        display:1,
        bullets: true

        //infinite: true
    });
    $('.tiny-carousel_goods-slider').tinycarousel({
        pager:true,
        display:4,
        bullets: true/*,
        interval:true,
        intervalTime:5000*/
    });
    $('.tiny-carousel_goods-slider-mini').tinycarousel({
        pager:true,
        display:4,
        bullets: true/*,
        interval:true,
        intervalTime:5000*/
    });

    $('.b_catalog-items-container').each(function(){
        var $this=$(this),
            items=$('.b_catalog-item',$this),
            maxImageHeight=0,
            maxTextHeight=0,
            maxPriceHeight=0;
            items.each(function(){
                var image=$('.b_catalog-item_image',$(this)),
                    imageHeight=image.height(),
                    text=$('.b_catalog-item_text',$(this)),
                    textHeight=text.height(),
                    price=$('.b_catalog-item_price',$(this)),
                    priceHeight=price.height();

                if(imageHeight>maxImageHeight) maxImageHeight=imageHeight;
                if(textHeight>maxTextHeight) maxTextHeight=textHeight;
                if(priceHeight>maxPriceHeight) maxPriceHeight=priceHeight;

            });

            $('.b_catalog-item_image-container',$this).css('height',maxImageHeight + 'px');
            $('.b_catalog-item_text',$this).css('height',maxTextHeight + 'px');
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

    $(window).resize(function(){
        prevWith = currentWith;
        currentWith = $(".header").width();
        promofix();
        /* Главное меню */
        redrawMenu();
        /* Tabs */
        redrawTabs();
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

    // маска для поля "телефон" в форме обртаной связи
    $('#cb_phone').mask('+7 ?(999) 999-99-99');

});

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
