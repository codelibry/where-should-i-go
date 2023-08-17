import $  from 'jquery';

function header(){
    $(document).ready(function(){
        $('.header__burger').click(function(){
            $('.header').toggleClass('menu-open');
        });
    });
}


export { header };
