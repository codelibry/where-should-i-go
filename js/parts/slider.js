import $  from 'jquery';
import 'slick-carousel';

function basicSliders(){
    $('.favorities__slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
    })
}

export { basicSliders };
