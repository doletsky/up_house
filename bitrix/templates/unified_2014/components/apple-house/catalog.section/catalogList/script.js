setTimeout(function(){

    $(document).ready(function(e) {
        $('.oneClickBuyLink').click(function(e) {
            e.preventDefault();
            $('#modal_overlay').bPopup({
                content: 'ajax',
                contentContainer:'#modal_overlay_cont',
                loadUrl: '/include/tools/buyoneclick.php?buy_id=' + $(this).attr('data-buyid'),
                closeClass: 'modal_oneClickBuy_close',
                speed: 450,
                transition: 'slideDown',
                modalClose: false,
                onOpen: function() {

                },
                loadCallback: function() {

                }
            });
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



        $('.catalog-pr-item a.b_button.button_green, .product-card a.b_button.button_green').click(function(e){
            e.preventDefault();
            var clickedBtn = this;
            //var productId = $('.b_button.button_green').eq(0).attr('product_id');
            var productId = $(this).attr('product_id');
            $.post(
                '/formrequest.php',
                {productId: productId},
                function( data ) {

                    $imgProduct = $(clickedBtn).closest('.catalog-pr-item').find('img.catalog-pr-picture-img').clone();
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
    });
}, 3000)

