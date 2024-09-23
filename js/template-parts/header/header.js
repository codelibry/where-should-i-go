import $  from 'jquery';

function header(){
    $(document).ready(function(){
        $('.header__burger').click(function(){
            $('.header').toggleClass('menu-open');
        });
        var headerHeight = $('header').height();
        $(window).on('scroll', function(){
            if($(window).scrollTop() > headerHeight){
                $('header').addClass('hide');
            }
            else{
                $('header').removeClass('hide');
            }
        });
        

        $('.header__menu .menu-item.menu-item-has-children').on({
            mouseenter: function(){
                $(this).find('.sub-menu').stop().slideDown();
            },
            mouseleave: function() {
                $(this).find('.sub-menu').stop().slideUp();
            }
        });
    });
}


export { header };
