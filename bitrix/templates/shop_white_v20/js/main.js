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

        $(".input-checkbox label").click(function(){
            var className=$(this).parent().parent().parent().attr("class");
            if(className=='group-radio'){
                var eGroup=$(this).parent().parent().parent();
                var aFor=$(this).attr('for');
                eGroup.find("input").removeAttr("checked");
            }
        });

        $('select.product-select').change(function(){
            var regId=$('.product-item:selected').val();
            $('.product-delivery-item').css('display', 'none');
            $('.region_'+regId).css('display', 'block');
        });
    }

})