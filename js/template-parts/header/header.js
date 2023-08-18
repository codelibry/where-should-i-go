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
    });
    
}


export { header };
