setTimeout(function() {
    $(document).ready(function(e) {
	$('#oneClickBuyLink').click(function(e) {
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


    $('#addElementPreorderLink').click(function(e) {
        e.preventDefault();
        $('#modal_overlay').bPopup({
            content: 'ajax',
            contentContainer:'#modal_overlay_cont',
            loadUrl: '/include/tools/preorder.php?buy_id=' + $(this).attr('data-buyid') + '&product_url=' + encodeURIComponent(window.location.pathname),
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

    if($('#delivery_block_place').length && $('.delivery_block').length)
        $('#delivery_block_place').replaceWith($('.delivery_block'));

});

}, 500);
