$('.pop-up-close-icon').click(function(){
    $('.pop-up-bg').css('display','none');
    $('.pop-up-section').css('display','none');
    $('.pop-up-quick-order').css('display','block');
});

$('.button-credit').click(function(){
    var imag=$(this).parent().parent().find('img');
    var price=$(this).parent().parent().children('div.product-price').html().slice(0,-3);

    $('.pop-up-img').attr('src',imag.attr('src'));
    $('.pop-up-img').attr('alt',imag.attr('alt'));
    $('.pop-up-product-title').html(imag.attr('alt'));
    $('.pop-up-product-price').html(price+' <span class="cy">руб.</span>');

    $('.pop-up-bg').css('display','block');
    $('.pop-up-section').css('display','block');
    $('.pop-up-quick-order-success').css('display','none');
});

$('.button-bg').click(function(){

    $('.pop-up-quick-order').css('display','none');

    $('.pop-up-quick-order-success').css('display','block');
});
