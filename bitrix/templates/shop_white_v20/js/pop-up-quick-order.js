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

    /*validate form*/
    console.log($('#oneClickBuy_phone').val().length);
    var error = false;

    if($('#oneClickBuy_phone').val().length!=18){
        $('#oneClickBuy_phone').addClass('modal_error');
        $('#oneClickBuy_phone').val('Не корректный телефон');
        error = true;
    }

    if(!error){
        $('.pop-up-quick-order').css('display','none');

        $('.pop-up-quick-order-success').css('display','block');
    }



});


/*init form quick order*/

$('#oneClickBuy_phone').mask('+7 ?(999) 999-99-99');
$('#oneClickBuy_phone').focusout(function(){
    if($(this).val() == '+7 (___) ___-__-__')
        $(this).val('');
});