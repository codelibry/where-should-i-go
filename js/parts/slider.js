import $  from 'jquery';
import 'slick-carousel';

function basicSliders(){
    $('.favorities__slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
    })
    $(document).ready(function(){
        $('.favorities__slider').find('.slick-slide').each(function(){
            var imgHeight = $(this).find('.favorities__sliderItem__image img').height();
            $(this).find('.favorities__sliderItem__content').css('height', imgHeight);
        })

    })
}

export { basicSliders };
