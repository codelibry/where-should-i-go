import $ from 'jquery';

function imagesSlider() {
    $(document).ready(function(){
        $('.imagesSlider__list').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '.imagesSlider__arrowBefore',
            nextArrow: '.imagesSlider__arrowAfter',
        });
        $('.imagesSlider__arrow').click(function(){
            var slideIndex = parseInt($('.imagesSlider__list').find('.slick-active').attr('data-slick-index'));
            $('.imagesSlider__currentSlide').html(slideIndex + 1);
        })
    });
}

export{imagesSlider};