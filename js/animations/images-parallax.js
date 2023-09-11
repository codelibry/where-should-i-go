import $ from "jquery";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger)

function parrallax_images() {
    $(".parallax-img-wrapper").each(function(){
        let img = $(this).find('.parallax-img');
        let path = $(this).data('path');
        let disabled = false;

        //responsive
        let mm = ScrollTrigger.matchMedia();
        
        ScrollTrigger.matchMedia({
            '(min-width: 991px)': () => {

            gsap.to(img ,{
                yPercent: -35,
                //stagger: 0.5,
                scrollTrigger: {
                    trigger: img,
                    start: 'top bottom',
                    end: 'bottom top',
                    //markers: true,
                    scrub: true, 
                    //pin: true
                }
            });
            
        }});

    });
    // $('.favorities__sliderItem__image .parallax-img-wrapper').each(function(){
    //     let img = $(this).find('.parallax-img');
    //     let path = $(this).data('path');
    //     let disabled = false;

    //     //responsive
    //     console.log(ScrollTrigger.version)
    //     let mm = ScrollTrigger.matchMedia();
    //     console.log(mm);
        
    //     ScrollTrigger.matchMedia({
    //         '(min-width: 991px)': () => {

    //         gsap.to(img ,{
    //             yPercent: -15,
    //             //stagger: 0.5,
    //             scrollTrigger: {
    //                 trigger: img,
    //                 start: 'top bottom',
    //                 end: 'bottom top',
    //                 //markers: true,
    //                 scrub: true, 
    //                 //pin: true
    //             }
    //         });
            
    //     }});

    // });


    $(".sbi_photo_wrap").each(function(){ 
        let img = $(this).find('.sbi_photo');
        let path = $(this).data('path');
        let disabled = false;

        //responsive
        //let mm = gsap.matchMedia();
        gsap.to(img ,{
            yPercent: -30,
            //stagger: 0.5,
            scrollTrigger: {
                trigger: img,
                start: 'top bottom',
                end: 'bottom top',
                // markers: true,
                scrub: true,
                // pin: true
            }
        });
        /*mm.add("(min-width: 991px)", () => {
        
        });*/
    });
}

export {parrallax_images}