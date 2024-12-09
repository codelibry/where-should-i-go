import $ from 'jquery';

function packagesFilter () {
    jQuery(document).ready(function(){
        const packagesList = $('.favoritiesBlock__list'),
              link = window.location.href.split('?country='),
              packagesClass = `country-${link[1]}`,
              btn = $('.favoritiesBlock__togglerItem');
        if(link != undefined) {
            $(`.favoritiesBlock__togglerItem[data-country="${link[1]}"]`).addClass('active');

            packagesList.addClass(packagesClass);
        }

        btn.click(function(){
            packagesList.find('.favoritiesBlock__listItem').addClass('in');
            
            if($(this).hasClass('active')){
                btn.removeClass('active')

                packagesList.attr('class', `${packagesList.attr('class').split(' ')[0]}`);

                history.replaceState(null, null, `${link[0]}`);
                
            } else {
                const country = $(this).attr('data-country');

                btn.removeClass('active')
                $(this).addClass('active');
                
                packagesList.attr('class', `${packagesList.attr('class').split(' ')[0]} country-${country}`);
                
                history.replaceState(null, null, `${link[0]}?country=${country}`);
            }
            
        })
    });

}

export {packagesFilter};