import $ from 'jquery';

function ctaAnimation() {
    $(document).ready(function(){
        var topOffset = $('#cta').offset().top - 275;
        $(window).on('scroll', function(){
            if($(window).scrollTop() >= topOffset && $(window).scrollTop() <= topOffset + $('#cta').outerHeight() + 50 ){
                $('#cta img').addClass('img-animation');
            }
            else{
                $('#cta img').removeClass('img-animation');
            }
        });
    });
}

export{ctaAnimation};