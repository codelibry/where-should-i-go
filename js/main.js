import $  from 'jquery';

// import { lottie } from './lottie';

import { header } from './template-parts/header/header';

// Animations
import { appearence } from './animations/appearence';
import { parrallax_images } from './animations/images-paralax'
// Blocks
import { videoBlock } from './template-parts/blocks/video';
import { ctaAnimation } from './template-parts/blocks/cta';
import { imagesSlider } from './template-parts/blocks/images_slider';
import { accordion } from './template-parts/blocks/accordion';
import { testimonialsSlider } from './template-parts/blocks/testimonials';
// Parts
import { initPopups } from './parts/popups';
import { basicSliders } from './parts/slider';


header();

//animations
appearence();
parrallax_images();

//blocks
videoBlock();
ctaAnimation();
imagesSlider();
accordion();
testimonialsSlider();

// Parts
initPopups();
basicSliders();