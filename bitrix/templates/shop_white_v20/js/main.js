var m_i = document.createElement('script');
m_i.type = 'text/javascript';
m_i.async = true;
if (!!('ontouchstart' in window))
{
    m_i.src = "/bitrix/templates/index_v20/js/touch_initialization.js";
}
//else
//{
//    m_i.src = "/private/js/regular_initialization.js";
//}
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(m_i, s);
console.log('ontouchstart' in window);

$(document).ready(function(){
    $('div#page-product-info').find('.font_style_16').removeClass('font_style_16');
    $('div#page-product-info').find('.font_style_19b').addClass('tab-title');
    $('div#page-product-info').find('.font_style_19b').removeClass('font_style_19b');

    var linkAddBasket=$('div.product-buy a.button-buy').attr('href');

    if($(".product-thumbnail.current").length>0){
        $(".product-thumbnail.current").css('left',$(".product-thumbnail:first").position().left+'px');
        $(".product-thumbnail").unbind("click");
        $(".product-thumbnail").click(function(){
            var aClicked = $(this).position().left;
            var imgSrc=$(this).attr('href');
            $(".product-thumbnail.current").css('left',aClicked+'px');
            $("#main-img").fadeTo("fast", 0.1, function(){
                $("#main-img").attr('src',imgSrc);
            });

            $("#main-img").fadeTo("medium", 1);
        });
    }

    if($(".input-checkbox label").length>0){

        $(".input-checkbox label").click(function(){
            var price=$('.price-num').data('price');
            var curVal=$(this).parent().children('input').val();
            var noVal='';
            var className=$(this).parent().parent().parent().attr("class");
            if(className=='group-radio'){
                var eGroup=$(this).parent().parent().parent();
                var aFor=$(this).attr('for');
                eGroup.find("input").removeAttr("checked");
            }
            else{
                if($(this).parent().children('input:checked').length>0){
                    noVal=curVal;
                    curVal='None';
                }
            }
            var option='';
            var oPrice=0;
            $(".input-checkbox input:checked").each(function(){
                var iVal=$(this).val();
                if(iVal!='None' && iVal!=noVal){
                    option+='option[]='+iVal+'&';
                    if($(this).data('price')!='undefined')oPrice+=$(this).data('price');
                }

            });
            if(curVal!='None'){
                option+='option[]='+curVal;
                oPrice+=$('#input-checkbox-'+curVal).data('price');
            }
            $('div.product-buy a.button-buy').attr('href', linkAddBasket+'&'+option);
            price+=oPrice;
            if(price.toString().length>3){
                var tmpPrice=price.toString().slice(0,-3)+' '+price.toString().slice(-3);
                price=tmpPrice;
                if(price.length>7){
                    var tmpPrice=price.slice(0,-7)+' '+price.slice(-7);
                    price=tmpPrice;
                }
            }
            $('.price-num').html(price+' <span class="rub">руб.</span>');
        });
    }
    if($('select.product-select').length>0){

        $('select.product-select').change(function(){
            var regId=$('.product-item:selected').val();
            $('.product-delivery-item').css('display', 'none');
            $('.region_'+regId).css('display', 'block');
        });
    }

    $('#add_cart_popup_content').find('.pop-up-close-icon').click(function(){
        $('#add_cart_popup').hide();
        $('#add_cart_popup_content').hide();
        return false;
    });

});

//function addCartPopup() {
//        ga('send', 'event', 'Acc window', 'Open', '');
//    $('#add_cart_popup_content').css('top',$(document).scrollTop());
//    $('#add_cart_popup').show();
//    $('#add_cart_popup_content').show();
//    return false;
//}
//
//function RefreshBasketAmount(){
//    $.ajax({
//        type: "POST",
//        url: '/formrequest.php',
//        data: { action: 'BASKET_AMOUNT' }
//    }).done(function(data){
//        if(data.length)
//            $('.header-section-5 .cart').text(data);
//    });
//}
//
//function AddToBasketAjax(productId){
//    $.ajax({
//        type: "POST",
//        url: '/formrequest.php',
//        data: { action: 'ADD2BASKET', id: productId }
//    }).done(function(data){
//        if(parseInt(data) > 0){
//            $buyBtn = $('input[data-product-id='+ productId +']');
//            $buyBtn.val('В корзине');
//            $buyBtn.attr('onclick','return false');
//
//        }
//
//        else
//            alert('Ошибка добавления товара в корзину. Попробуйте позже');
//
//    });
//}