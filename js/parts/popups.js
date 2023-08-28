import $ from 'jquery';


function initPopups() {
    $(document).ready(function(){
        $('.show-product-popup').click(function(){
            var productTitle = $(this).closest('.product').find('.product-title').html();
            var productPrice = $(this).closest('.product').find('.product-price').html();
            var productText = $(this).closest('.product').attr('data-text');
            var productImage = $(this).closest('.product').find('.product-image img').attr('src');
            var productId = $(this).closest('.product').attr('data-id');
            var productSlug = $(this).closest('.product').attr('data-slug');
            $('.orderPopup__text').html(productText);
            $('.orderPopup__productTitle').html(productTitle);
            $('.orderPopup__productImage img').attr('src', productImage);
            $('.orderPopup__productPrice').html(productPrice);
            $('.orderPopup__formTitle input').val(productTitle);
            setTimeout(() => {
                var imageHeight = $('.orderPopup__productImage img').height();
            $('.orderPopup__productContent').css('height', imageHeight);
            }, 100);
            setTimeout(() => {
                $('body').addClass('opened-popup');
            }, 200);

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
    });
}


export { initPopups };
