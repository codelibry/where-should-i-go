import $  from 'jquery';
import 'slick-carousel';

function basicSliders(){
    $(window).on('load', function(){
        $('.favorities__slider').addClass('active');
    });
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
        var w = $(window).width();
        if(w >= 993){
            var listImgHeight = $('.favoritiesBlock__list').find('.favoritiesBlock__listItem:nth-child(1) .favoritiesBlock__listItem__image img').height();
            $('.favoritiesBlock__list .favoritiesBlock__listItem__image img').css('height', listImgHeight);
            $('.favoritiesBlock__list .favoritiesBlock__listItem__content').css('height', listImgHeight);
        }
        else{
            /*$('.favoritiesBlock__list .favoritiesBlock__row').each(function(){
                console.log('123');
                $(this).find('.favoritiesBlock__listItem').each(function(){
                    var firstItem = $(this).first().find('.favoritiesBlock__listItem__title').height();
                    var secondItem = $(this).last().find('.favoritiesBlock__listItem__title').height();
                    if(firstItem > secondItem){
                        $(this).last().find('.favoritiesBlock__listItem__title').css('height', firstItem);
                    }
                    else{
                        $(this).first().find('.favoritiesBlock__listItem__title').css('height', secondItem);

                    }
                });
            });*/
            $('.favoritiesBlock__list .favoritiesBlock__row').each(function(){
                var firstItem = $(this).find('.favoritiesBlock__listItem:nth-child(1) .favoritiesBlock__listItem__title').height();
                var secondItem = $(this).find('.favoritiesBlock__listItem:nth-child(2) .favoritiesBlock__listItem__title').height();
                if(firstItem > secondItem){
                    $(this).find('.favoritiesBlock__listItem:nth-child(2) .favoritiesBlock__listItem__title').css('height', firstItem);
                }
                else{
                    $(this).find('.favoritiesBlock__listItem:nth-child(1) .favoritiesBlock__listItem__title').css('height', secondItem);
                }
            });
        }
    })
    
}

export { basicSliders };
