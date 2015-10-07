$(document).ready(function(e) {
    $('.button-credit').click(function(e) {
        e.preventDefault();
        $('#modal_overlay').bPopup({
            content: 'ajax',
            contentContainer:'#modal_overlay_cont',
            loadUrl: '/include/tools/buyoneclick_v20.php?buy_id=' + $(this).attr('data-buyid'),
            closeClass: 'modal_oneClickBuy_close_v20',
            speed: 450,
            transition: 'slideDown',
            modalClose: false,
            onOpen: function() {

            },
            loadCallback: function() {

            }
        });
        $('.pop-up-bg').css('display','block');
        $('.pop-up-section').css('display','block');
    });


    $('.addElementPreorderLink').click(function(e) {
        e.preventDefault();
        $('#modal_overlay').bPopup({
            content: 'ajax',
            contentContainer:'#modal_overlay_cont',
            loadUrl: '/include/tools/preorder.php?buy_id=' + $(this).attr('data-buyid')
                                         + '&product_url=' + encodeURIComponent($(this).closest('.b_catalog-item').find('.cat_item_cont').find('.b_catalog-item_image-container').find('a').attr('href')),
            closeClass: 'modal_preOrder_close',
            speed: 450,
            transition: 'slideDown',
            modalClose: false,
            onOpen: function() {

            },
            loadCallback: function() {

            }
        });
        $('.modal_overlay_close_btn').attr('id', 'modal_preOrder_close');
        $('.modal_overlay_close_btn').removeClass('modal_oneClickBuy_close');
        $('.modal_overlay_close_btn').addClass('modal_preOrder_close');

    });
});

