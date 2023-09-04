import $  from 'jquery';
import 'slick-carousel';

function basicSliders(){
    $(window).on('load', function(){
        $('.favorities__slider').addClass('active');
    });
    
    $(document).ready(function(){
        //Slider Arrows 
        $('.favorities__sliderItem:first-child').addClass('active');
        $(".favorities__leftArrow").click(function () { 
            var leftPos = $('.favorities__slider').scrollLeft();
            var activeSlide = $('.favorities__sliderItem.active').index() + 1;
            var prevSlide = activeSlide - 1;
            $('.favorities__sliderItem').removeClass('active');
            $('.favorities__sliderItem:nth-child(' + prevSlide + ')').addClass('active');
            $(".favorities__slider").animate({scrollLeft: leftPos + $('.favorities__sliderItem.active').offset().left}, 300); 
        });
        $(".favorities__rightArrow").click(function () { 
            var leftPos = $('.favorities__slider').scrollLeft();
            var activeSlide = $('.favorities__sliderItem.active').index() + 1;
            if(activeSlide == 0){
                var nextSlide = activeSlide + 2;
            }
            else{
                var nextSlide = activeSlide + 1;
            }
            $('.favorities__sliderItem').removeClass('active');
            $('.favorities__sliderItem:nth-child(' + nextSlide + ')').addClass('active');
            $(".favorities__slider").animate({scrollLeft: leftPos + $('.favorities__sliderItem.active').offset().left}, 300); 
        });

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
