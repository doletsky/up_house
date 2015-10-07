$(document).ready(function(){
    $('.b_main-menu_list-item').click(function(eIn)
        {
            var subMenu = $(eIn.currentTarget).children(".b_main-submenu:first-of-type");
            if (subMenu.length == 0 || subMenu.css("visibility") == "visible")
            {
                return;
            }
            else
            {
                eIn.preventDefault();
                ResetMenuSelection(null);
                subMenu.css('visibility', 'visible');
                subMenu.css('opacity', '1');
            }
        }
    );

    $('.b_main-submenu_list-item').click(function(eIn)
        {
            var subMenu = $(eIn.currentTarget).children(".b_main-submenu");
            if (subMenu.length == 0 || subMenu.css("visibility") == "visible")
            {
                return;
            }
            else
            {
                eIn.preventDefault();
                $(eIn.currentTarget).offsetParent().find(".b_main-submenu").each(
                    function(id, elem)
                    {
                        elem = $(elem);
                        if (elem.length > 0 && elem.css("visibility") == "visible")
                        {
                            elem.css('visibility', 'hidden');
                            elem.css('opacity', '0');
                        }
                    }
                );
                subMenu.css('visibility', 'visible');
                subMenu.css('opacity', '1');
            }
        }
    );


/*    $('.container *').click(function(e){
        if($(this).hasClass('b_main-menu_link') || $(this).hasClass('b_main-submenu_link'))//)
            e.stopPropagation();
        else
            ResetMenuSelection(null);

        //:not(.b_main-menu_list-item):not(.b_main-menu_link):not(.b_main-menu_list):not(.b_main-menu):not(.header)
    });*/
});

function ResetMenuSelection($thisSubMenu){
    if($thisSubMenu){
        $('.b_main-submenu').not($thisSubMenu).not($thisSubMenu.parents('.b_main-submenu')).css('visibility', 'hidden');
        $('.b_main-submenu').not($thisSubMenu).not($thisSubMenu.parents('.b_main-submenu')).css('opacity', '0');
    }
    else{
        $('.b_main-submenu').css('visibility', 'hidden');
        $('.b_main-submenu').css('opacity', '0');
    }
}
