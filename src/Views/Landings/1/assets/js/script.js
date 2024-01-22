// $(document).ready(function() {
    
//     $(document).on('gesturestart', function(event) {
//         event.preventDefault();
//     });

//     $(document).on('contextmenu', function(event) {
//         event.preventDefault();
//     });

//     $('.check-icon').each(function() {
//         var contentBefore = $(this).css('content');
//         if (contentBefore === 'none') {
//             $(this).addClass('bxs-widget');
//         }
//     });

// });

// $(window).on('load', function() {
//     var loadingRing = $('.lds-ring');
//     loadingRing.css({
//         'transition': 'opacity 500ms',
//         'opacity': '0'
//     });
//     setTimeout(function() {
//         loadingRing.remove();
//     }, 500);
// });

// // For menu scroll
// $(".menu-scroll").on("click", function(e) {
//     e.preventDefault();
//     $($(this).attr("href")).get(0).scrollIntoView({
//         behavior: "smooth"
//     });
// });

// function initAcc(elem, option) {
//     $(document).on('click', elem + ' .faq-btn', function() {
//         var $target = $(this).parent();
//         if (!$target.hasClass('active')) {
//             if (option) {
//                 $(elem + ' .faq').removeClass('active');
//             }
//             $target.addClass('active');
//         } else {
//             $target.removeClass('active');
//         }
//     });
// }

// // Activate accordion function
// initAcc(".faqs", true);

$('#contactForm').submit(function(event) {
    event.preventDefault();

    let hasEmptyField = false;
    $(this).find('input, textarea').each(function() {
        if (!$(this).val()) {
            hasEmptyField = true;
            return false;
        }
    });
    if (hasEmptyField) {
        alert('Please fill out all fields before submitting.');
        return;
    }

    let formData = $(this).serialize();

    let e = $(this).find(':submit');

    e.prop('disabled', true);
    $(this).find('input, textarea').prop('disabled', true);
    $(this).removeAttr('id');

    $.ajax({
        url: 'http://localhost/lando3/src/endpoints/shared/landings/contact.php',
        type: 'POST',
        data: formData,
        beforeSend: function() {
            e.html('<i class="bx bx-loader bx-spin text-2xl"></i>');
        },
        success: function(response) {
            e.fadeOut(500, function() {
                if(response.success) {
                    e.html("Thank you for reaching out! We'll get back to you soon.");
                } else {
                    e.html('Something went wrong. Please try again later.');
                }
                e.fadeIn(500);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            e.fadeOut(500, function() {
                e.html('Something went wrong. Please try again later.').fadeIn(500);
            });
        }
    });
});
