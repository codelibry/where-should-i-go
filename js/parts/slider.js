import $  from 'jquery';
import 'slick-carousel';

function basicSliders(){
    $('.favorities__slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                },
            },
        ]
    });
    jQuery(function () {
      
        /*$(".favorities__slider").on('wheel', (function(e) {
            e.preventDefault();
          
            if (e.originalEvent.deltaX < 0) {
                var currentSlide = $(this).find('.slick-active').attr('data-slick-index');
                $(this).slick('slickGoTo', currentSlide - 1);
            } else {
                var currentSlide = $(this).find('.slick-active').attr('data-slick-index');
                $(this).slick('slickGoTo', currentSlide + 1);
            }
        }));*/
        var scrollCount = null;
        var scroll= null;
        $(".favorities__slider").on('wheel', (function(e) {
            e.preventDefault();
        
            clearTimeout(scroll);
            scroll = setTimeout(function(){scrollCount=0;}, 50);
            if(scrollCount) return 0;
            scrollCount=1;
        
            if (e.originalEvent.deltaX < 0) {
                $(this).slick('slickPrev');
            } else {
                $(this).slick('slickNext');
            }
        }));
      });
      
    $(document).ready(function(){
        /*$('.favorities__slider').find('.slick-slide').each(function(){
            var imgHeight = $(this).find('.favorities__sliderItem__image img').height();
            $(this).find('.favorities__sliderItem__content').css('height', imgHeight);
        });*/
        var imgHeight = $('.favorities__slider').find('.slick-slide[data-slick-index="0"] .favorities__sliderItem__image img').height();
        $('.favorities__slider .slick-slide .favorities__sliderItem__image img').css('height', imgHeight);
        $('.favorities__slider .slick-slide .favorities__sliderItem__content').css('height', imgHeight);
    })
}

export { basicSliders };
