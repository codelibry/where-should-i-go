import $ from 'jquery';

function testimonialsSlider(){
    $('.testimonials__list').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnHover: true,
        adaptiveHeight: true,
    });
};

export{testimonialsSlider};