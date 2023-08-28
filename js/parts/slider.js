import $  from 'jquery';
import 'slick-carousel';

function basicSliders(){
    $('.favorities__slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: $('.favorities__leftArrow'),
        nextArrow: $('.favorities__rightArrow'),
        responsive: [
            {
                breakpoint: 2560,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                },
            },
        ]
    });
    $(document).ready(function(){
        var sliderImgHeight = $('.favorities__slider').find('.slick-slide[data-slick-index="0"] .favorities__sliderItem__image img').height();
        $('.favorities__slider .slick-slide .favorities__sliderItem__image img').css('height', sliderImgHeight);
        $('.favorities__slider .slick-slide .favorities__sliderItem__content').css('height', sliderImgHeight);
        var listImgHeight = $('.favoritiesBlock__list').find('.favoritiesBlock__listItem:nth-child(1) .favoritiesBlock__listItem__image img').height();
        $('.favoritiesBlock__list .favoritiesBlock__listItem__image img').css('height', listImgHeight);
        $('.favoritiesBlock__list .favoritiesBlock__listItem__content').css('height', listImgHeight);
    })
    
}

export { basicSliders };
