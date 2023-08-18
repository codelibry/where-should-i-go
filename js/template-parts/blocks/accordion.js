import $ from 'jquery';

function accordion(){
    $(document).ready(function(){
        $('.accordion__listItem__title').click(function(){
            $(this).parent().find('.accordion__listItem__content').slideToggle();
            $(this).parent().toggleClass('opened');
        });
    });
}

export{accordion};