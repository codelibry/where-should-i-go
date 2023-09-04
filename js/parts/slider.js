import $  from 'jquery';
import 'slick-carousel';

function basicSliders(){
    $(window).on('load', function(){
        $('.favorities__slider').addClass('active');
    });
    /*$('.favorities__slider').slick({
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
    });*/
    
    $(document).ready(function(){
        var slidesCount = $('.favorities__slider').find('.favorities__sliderItem').length;
        var sliderWidth = $('.favorities__sliderItem').width();
        var w = $(window).width();
        if(w <= 992){
            var sliderWidth = $('.favorities__sliderItem').width() * 0.95;
            console.log(321);
        }
        if(w <= 768){
            console.log(123);
            var sliderWidth = $('.favorities__sliderItem').width() * 1.04;
        }
        if(w <= 560){
            console.log(123);
            var sliderWidth = $('.favorities__sliderItem').width() * 1.08;
        }
        if(w <= 380){
            console.log(123);
            var sliderWidth = $('.favorities__sliderItem').width() * 1.12;
        }
        $(".favorities__leftArrow").click(function () { 
            var sliderIndex = parseInt($('.favorities__slider').attr('slide-index'));
            var leftPos = $('.favorities__slider').scrollLeft();
            if(sliderIndex != 1){
                var sliderIndex = sliderIndex - 1;
                $('.favorities__slider').attr('slide-index', sliderIndex);
            }
            if(sliderIndex == 1){
                $(".favorities__slider").animate({scrollLeft: leftPos - sliderWidth - 100}, 300);
            }
            else{
                $(".favorities__slider").animate({scrollLeft: leftPos - sliderWidth}, 300);
            }
            console.log(sliderIndex);
        });
        $(".favorities__rightArrow").click(function () { 
            var sliderIndex = parseInt($('.favorities__slider').attr('slide-index'));
            var leftPos = $('.favorities__slider').scrollLeft();
            if(sliderIndex != slidesCount) {
                var sliderIndex = sliderIndex + 1;
                $('.favorities__slider').attr('slide-index', sliderIndex);
            }
            if(sliderIndex == slidesCount){
                $(".favorities__slider").animate({scrollLeft: leftPos + sliderWidth + 100}, 300);
            }
            else{
                $(".favorities__slider").animate({scrollLeft: leftPos + sliderWidth}, 300);
            }
            console.log(sliderIndex);

        });




















        let blocked = false;
        let blockTimeout = null;
        let prevDeltaX = 0;
        $('.slick-track').attr('sliding-range', '-1354');
        $(".favorities__slider").on('mousewheel DOMMouseScroll wheel', (function(e) {
            let deltaX = e.originalEvent.deltaX;
            let deltaY = e.originalEvent.deltaY;

            if(typeof deltaY != 'undefined') {
                clearTimeout(blockTimeout);
                    blockTimeout = setTimeout(function(){
                    blocked = false;
                }, 70);
            
                if ((deltaY < 1 && deltaY > -1) && ((deltaX > 10 && deltaX > prevDeltaX) || (deltaX < -10 && deltaX < prevDeltaX) || !blocked)) {
                    e.preventDefault();
                    e.stopPropagation();

                    blocked = true;
                    prevDeltaX = deltaX;
                    console.log(deltaX);
                    /*if (deltaX > 0) {
                        $(this).slick('slickNext');
                    } else {
                        $(this).slick('slickPrev');
                    }*/
                    var slidingRange = parseInt($('.slick-track').attr('sliding-range'));
                    var sliding = deltaX * 20 + slidingRange;
                    console.log(sliding);
                    $('.slick-track').animate({transform: 'translate3d(' + sliding + 'px, 0px, 0px)'}, 100);
                }
            }
        }));
        var sliderImgHeight = $('.favorities__slider').find('.favorities__sliderItem:first-child .favorities__sliderItem__image img').height();
        $('.favorities__slider .favorities__sliderItem .favorities__sliderItem__image img').css('height', sliderImgHeight);
        $('.favorities__slider .favorities__sliderItem .favorities__sliderItem__content').css('height', sliderImgHeight);
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
        //Slide image width
        if(w <= 1200){
            $('.favorities__sliderItem').each(function(){
                var titleWidth = $(this).find('.favorities__sliderItem__content').outerWidth();
                var slideWIdth = $(this).find('.favorities__sliderItem__head').outerWidth();
                $(this).find('.favorities__sliderItem__image img').css('width', slideWIdth - titleWidth);
                $(this).find('.favorities__sliderItem__image').css('margin-left', titleWidth);
            });
        }
    })
    
}

export { basicSliders };
