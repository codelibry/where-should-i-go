import $ from 'jquery';


function initPopups() {
    $(document).ready(function(){
        $('.show-product-popup').click(function(){
            var productTitle = $(this).closest('.product').find('.product-title').html();
            var productPrice = $(this).closest('.product').find('.product-price').html();
            var productText = $(this).closest('.product').attr('data-text');
            var productImage = $(this).closest('.product').find('.product-image img').attr('src');
            var productForm = $(this).closest('.product').attr('data-slug');
            $('.orderPopup__text').html(productText);
            $('.orderPopup__productTitle').html(productTitle);
            $('.orderPopup__productImage img').attr('src', productImage);
            $('.orderPopup__productPrice').html(productPrice);
            $('.orderPopup__formTitle input').val(productTitle);
            $('.orderPopup input[type="number"]').val($(this).closest('.product').find('.product-price span').html());
            $('.orderPopup__form').removeClass('active');
            $('.orderPopup__form.' + productForm).addClass('active');
            if($(this).closest('.product').find('.product-price span').html() == 'Free'){
                $('.orderPopup__form input[type="submit"]').attr('value', 'Submit');
            }
            else{
                $('.orderPopup__form input[type="submit"]').attr('value', 'Buy');
            }
            setTimeout(() => {
                var imageHeight = $('.orderPopup__productImage img').height();
            $('.orderPopup__productContent').css('height', imageHeight);
            }, 100);
            setTimeout(() => {
                $('body').addClass('opened-popup');
            }, 200);
            $("body").on('DOMSubtreeModified', ".nf-response-msg", function() {
                $('body').removeClass('opened-popup');
                $('body').addClass('submit-popup');
            });
        });
        $('.orderPopup__close').click(function(){
            $('body').removeClass('opened-popup');
            $('body').removeClass('full-popup');
        });
        $('.orderPopup__termsText__input').click(function(){
            $(this).toggleClass('checked');
            $('.orderPopup__submit .button').toggleClass('active');
            if($(this).hasClass('checked')){
                $(this).find('input').prop('checked', true);
            }
            else{
                $(this).find('input').prop('checked', false);
            }
        });
        // Updated to ensure we avoid undefined state
        if (window.location.href.indexOf("&") > -1) {
            var url = window.location.href.split('?'); 
            var urlPart = url[1].split('&');
            if(urlPart[1] == 'nfs_checkout=cancel'){
                window.location = url[0];
            }
        }
        if (window.location.href.indexOf("?") > -1) {
            var url = window.location.href.split('?'); 
            var urlPart = url[1].split('&');
            if(urlPart[1] == 'nfs_checkout=success'){
                $('body').addClass('submit-popup');
            }
        }
        
    });
}


export { initPopups };