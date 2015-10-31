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
    $(".product-thumbnail").fancybox({
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
})