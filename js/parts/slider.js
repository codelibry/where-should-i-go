import $  from 'jquery';
import 'slick-carousel';

function basicSliders(){
    $(window).on('load', function(){
        $('.favorities__slider').addClass('active');
    });
    
    $(document).ready(function(){
        //Slider Arrows 
        var w = $(window).width();
        if($('.favorities__slider').length > 0){
            if(w >= 770){
                $('.favorities__sliderItem:first-child').addClass('active');
                var slideRange = $('.favorities__sliderItem').eq(2).offset().left - $('.favorities__sliderItem').eq(1).offset().left;
                $(".favorities__leftArrow").click(function () { 
                    var leftPos = $('.favorities__slider').scrollLeft();
                    $(".favorities__slider").animate({scrollLeft: leftPos - slideRange}, 300); 
        
                });
                $(".favorities__rightArrow").click(function () { 
                    var leftPos = $('.favorities__slider').scrollLeft();
                    $(".favorities__slider").animate({scrollLeft: leftPos + slideRange}, 300); 
                });
            }
            else{
                $('.favorities__slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    prevArrow: $('.favorities__leftArrow'),
                    nextArrow: $('.favorities__rightArrow'),
                });
            }
        }
        
        var sliderImgHeight = $('.favorities__slider').find('.favorities__sliderItem:first-child .favorities__sliderItem__image img').height();
        $('.favorities__slider .favorities__sliderItem .favorities__sliderItem__image img').css('height', sliderImgHeight);
        $('.favorities__slider .favorities__sliderItem .favorities__sliderItem__content').css('height', sliderImgHeight);

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
