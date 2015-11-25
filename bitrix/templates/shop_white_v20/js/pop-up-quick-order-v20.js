$(document).ready(function(e) {
    var positionStyle='absolute';
    if(!!('ontouchstart' in window)){
        positionStyle='fixed';
    }
    $('.button-credit').click(function(e) {
        e.preventDefault();
        $('#modal_overlay').bPopup({
            content: 'ajax',
            contentContainer:'#modal_overlay_cont',
            loadUrl: '/include/tools/buyoneclick_v20.php?buy_id=' + $(this).attr('data-buyid'),
            closeClass: 'modal_oneClickBuy_close_v20',
            speed: 450,
            transition: 'slideDown',
            positionStyle: positionStyle,
            modalClose: false,
            onOpen: function() {

            },
            loadCallback: function() {

            }
        });
        $('#modal_overlay').css('display','block');
    });


    $('.addElementPreorderLink').click(function(e) {
        e.preventDefault();
        $('#modal_overlay').bPopup({
            content: 'ajax',
            contentContainer:'#modal_overlay_cont',
            loadUrl: '/include/tools/preorder_v20.php?buy_id=' + $(this).attr('data-buyid')
                                         + '&product_url=' + encodeURIComponent($(this).attr('data-purl')),
            closeClass: 'modal_oneClickBuy_close_v20',
            speed: 450,
            transition: 'slideDown',
            positionStyle: positionStyle,
            modalClose: false,
            onOpen: function() {

            },
            loadCallback: function() {

            }
        });
        $('#modal_overlay').css('display','block');

    });
});

