import $  from 'jquery';
import 'slick-carousel';

function basicSliders(){
    $(window).on('load', function(){
        $('.favorities__slider').addClass('active');
    });
    
    $(document).ready(function(){
        if ($('.favorities__slider').length) {
            //Slider Arrows 
            $('.favorities__sliderItem:first-child').addClass('active');
            var slideRange = $('.favorities__sliderItem').eq(2).offset().left - $('.favorities__sliderItem').eq(1).offset().left;
            console.log(slideRange);
            $(".favorities__leftArrow").click(function () { 
                var leftPos = $('.favorities__slider').scrollLeft();
                /*var activeSlide = $('.favorities__sliderItem.active').index() + 1;
                var prevSlide = activeSlide - 1;
                $('.favorities__sliderItem').removeClass('active');
                $('.favorities__sliderItem:nth-child(' + prevSlide + ')').addClass('active');
                $(".favorities__slider").animate({scrollLeft: leftPos + $('.favorities__sliderItem.active').offset().left}, 300); */
                $(".favorities__slider").animate({scrollLeft: leftPos - slideRange}, 300); 

            });
            $(".favorities__rightArrow").click(function () { 
                var leftPos = $('.favorities__slider').scrollLeft();
                /*var activeSlide = $('.favorities__sliderItem.active').index() + 1;
                if(activeSlide == 0){
                    var nextSlide = activeSlide + 2;
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
                    var nextSlide = activeSlide + 1;
                }
                $('.favorities__sliderItem').removeClass('active');
                $('.favorities__sliderItem:nth-child(' + nextSlide + ')').addClass('active');
                $(".favorities__slider").animate({scrollLeft: leftPos + $('.favorities__sliderItem.active').offset().left}, 300); */
                $(".favorities__slider").animate({scrollLeft: leftPos + slideRange}, 300); 

            });
            $('.favorities__slider').on('scroll', function(){
                $('.favorities__sliderItem').each(function(){
                    var sliderOffset = $(this).offset().left + $(this).width();
                    /*if($('.favorities__slider').scrollLeft() >= sliderOffset){
                        var slideIndex = $(this).index();
                        $('.favorities__sliderItem').removeClass('active');
                        $('.favorities__sliderItem').eq(slideIndex + 1).addClass('active'); 
                        return;
                    }




                    if($(this).index() == 0){
                        var itemIndex = $(this).index() + 2;
                    }
                    else{ 
                        var itemIndex = $(this).index() + 1;
                    }
                    var prevItemIndex = itemIndex - 1;
                    var nextItemIndex = itemIndex + 1;
                    console.log(prevItemIndex);
                    console.log(nextItemIndex);
                    var prevItem = $('.favorities__sliderItem').eq(prevItemIndex).offset().left;
                    var nextItem = $('.favorities__sliderItem').eq(nextItemIndex).offset().left;
                    //var prevItem = $(this).offset().left - 150;
                    //var nextItem = $(this).offset().left - 150;
                    

                    if($('.favorities__slider').scrollLeft() >= prevItem && $('.favorities__slider').scrollLeft() <= nextItem){
                        $('.favorities__sliderItem').removeClass('active');
                        $(this).addClass('active'); 
                    }
                    if(parseInt($(this).offset().left) == $(this).scrollLeft()){
                        $('.favorities__sliderItem').removeClass('active');
                        $(this).addClass('active');
                    }*/
                });
                //console.log($(this).scrollLeft());
            });
            
            var sliderImgHeight = $('.favorities__slider').find('.favorities__sliderItem:first-child .favorities__sliderItem__image .parallax-img-wrapper').outerHeight();
            console.log(sliderImgHeight);
            $('.favorities__slider .favorities__sliderItem .favorities__sliderItem__image .parallax-img-wrapper').css('height', sliderImgHeight);
            $('.favorities__slider .favorities__sliderItem .favorities__sliderItem__content').css('height', sliderImgHeight);
            var w = $(window).width();
            if(w >= 993){
                var listImgHeight = $('.favoritiesBlock__list').find('.favoritiesBlock__listItem:nth-child(1) .favoritiesBlock__listItem__image img').outerHeight();
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
                console.log(w);
                $('.favorities__sliderItem').each(function(){
                    var titleWidth = $(this).find('.favorities__sliderItem__content').outerWidth();
                    var slideWIdth = $(this).find('.favorities__sliderItem__head').outerWidth();
                    $(this).find('.favorities__sliderItem__image .parallax-img-wrapper').css('width', slideWIdth - titleWidth);
                    $(this).find('.favorities__sliderItem__image').css('margin-left', titleWidth);
                });
            }
        }
    })
}

export { basicSliders };
