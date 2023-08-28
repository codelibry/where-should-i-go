import $ from 'jquery';

function imagesSlider() {
    $(document).ready(function(){
        $('#sbi_images').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '.imagesSlider__arrowBefore',
            nextArrow: '.imagesSlider__arrowAfter',
            responsive: [
                {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
            ]
        });
        $('.imagesSlider__arrow').click(function(){
            var slideIndex = parseInt($('#sbi_images').find('.slick-active').attr('data-slick-index'));
            $('.imagesSlider__currentSlide').html(slideIndex + 1);
        });
        $('#sbi_images').on('swipe', function(){
            var slideIndex = parseInt($('#sbi_images').find('.slick-active').attr('data-slick-index'));
            $('.imagesSlider__currentSlide').html(slideIndex + 1);
        })
        var lastSlider = parseInt($('.imagesSlider .slick-list .slick-slide:last-child').attr('data-slick-index')) + 1;
        $('.imagesSlider .imagesSlider__lastSlide').html(lastSlider / 2);
        
    });
}

export{imagesSlider};