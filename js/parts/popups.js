import $ from 'jquery';


function initPopups() {
    $('.popup-block').each(function () {
        var $popup = $(this);
        var $closeBtn = $popup.find('#popupClose');
        var $background = $popup.find('.popup-block__background');

        var id = $popup.attr('id');

        // Show popup when user clicked on element with id which the same to popup id
        $(`[href="#${id}"]`).on('click', function (e) {
            e.preventDefault();
            $popup.fadeIn();
        });

        // Hide popup when user click on background or close button
        [$background, $closeBtn].forEach(($element) => {
            $element.on('click', function (e) {
                e.preventDefault();
                $popup.fadeOut();
            });
        });

        $popup.find('.popup-block__wrapper').on('click', function (event) {
            event.stopPropagation();
        });
    });

    popupHotelLocation();
}

function popupHotelLocation() {
    // Here is code for popup Hotel Location
}

export { initPopups };
