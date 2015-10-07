$(document).ready(function(){

    $('.menu-catalog-list-item').children('a').addClass('touch');

    $('.menu-catalog-list-item').click(function(eIn)
        {
            if($(this).children('a').hasClass('touch')){
                $('.menu-catalog-list-item').children('a').addClass('touch');
                $(this).children('a').removeClass('touch');
                return false;
            }
        }
    );
    $('.submenu-catalog-item ul').parent('li').children('a').addClass('touch');
    $('.submenu-catalog-item').click(function(eIn)
        {
            if($(this).children('a').hasClass('touch')){
                $('.submenu-catalog-item ul').parent('li').children('a').addClass('touch');
                $(this).children('a').removeClass('touch');
                return false;
            }
        }
    );
});

