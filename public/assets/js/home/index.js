// $('#generateForm').submit(function(event) {
//     event.preventDefault();

//     let loading_percentage = 0;
//     let timeouts = [];

//     for (let i = 0; i < 90; i++) {
//         let timeoutId = setTimeout(function() {
//             loading_percentage++;
//             $('#loader__generating').attr('aria-valuenow', loading_percentage);
//             $('#loader__generating').css('width', loading_percentage + '%');
//         }, i * 666.67);
//         timeouts.push(timeoutId);
//     }

//     $('#loader-G').show();
//     $('#contentGenerating').show();
//     $('#errorGenerating').hide();

//     let app_url = $('#url').val();

//     if (checkURL(app_url)) {
//         $.ajax({
//             type: 'POST',
//             url: 'src/endpoints/dashboard/landings/create.php',
//             data: { app_url: app_url },
//             success: function(data) {
//                 if (data.success) {
//                     timeouts.forEach(function(timeoutId) {
//                         clearTimeout(timeoutId);
//                     });
//                     $('#loader__generating').attr('aria-valuenow', '100');
//                     $('#loader__generating').css('width', '100%');
                    
//                     setTimeout(function() {
//                         location.reload();
//                     }, 600);
//                 } else {
//                     $('#errorGenerating_txt').html(data.error);
//                     $('#contentGenerating').hide();
//                     $('#errorGenerating').show();
//                 }
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 timeouts.forEach(function(timeoutId) {
//                     clearTimeout(timeoutId);
//                 });
//                 let errorMsg = 'Something went wrong: ' + errorThrown + '. Response: ' + jqXHR.responseText;
//                 $('#errorGenerating_txt').html(errorMsg);
//                 $('#contentGenerating').hide();
//                 $('#errorGenerating').show();
//             }
//         });
//     } else {
//         $('#contentGenerating').hide();
//         $('#errorGenerating_txt').html('The provided URL is either invalid or not from the Apple App Store or Google Play.<br/>Please ensure you are using a valid link from one of these platforms.')
//         $('#errorGenerating').show();
//     }
// });

$('#generateForm').submit(function(event) {
    event.preventDefault();

    let loading_percentage = 0;
    let timeouts = [];

    $(window).on('beforeunload', function() {
        return 'Loading is in progress. Are you sure you want to leave?';
    });

    for (let i = 0; i < 90; i++) {
        let timeoutId = setTimeout(function() {
            loading_percentage++;
            $('#loader__generating').attr('aria-valuenow', loading_percentage);
            $('#loader__generating').css('width', loading_percentage + '%');
        }, i * 666.67);
        timeouts.push(timeoutId);
    }

    $('#loader-G').show();
    $('#contentGenerating').show();
    $('#errorGenerating').hide();

    let app_url = $('#url').val();

    if (checkURL(app_url)) {
        $.ajax({
            type: 'POST',
            url: 'src/endpoints/dashboard/landings/create.php',
            data: { app_url: app_url },
            success: function(data) {
                $(window).off('beforeunload');

                timeouts.forEach(function(timeoutId) {
                    clearTimeout(timeoutId);
                });

                if (data.success) {
                    $('#loader__generating').attr('aria-valuenow', '100');
                    $('#loader__generating').css('width', '100%');
                    
                    setTimeout(function() {
                        location.reload();
                    }, 600);
                } else {
                    $('#errorGenerating_txt').html(data.error);
                    $('#contentGenerating').hide();
                    $('#errorGenerating').show();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $(window).off('beforeunload');

                timeouts.forEach(function(timeoutId) {
                    clearTimeout(timeoutId);
                });

                $('#loader__generating').attr('aria-valuenow', '0');
                $('#loader__generating').css('width', '0%');

                let errorMsg = 'Something went wrong: ' + errorThrown + '. Response: ' + jqXHR.responseText;
                $('#errorGenerating_txt').html(errorMsg);
                $('#contentGenerating').hide();
                $('#errorGenerating').show();
            }
        });
    } else {
        $(window).off('beforeunload');
        
        $('#contentGenerating').hide();
        $('#errorGenerating_txt').html('The provided URL is either invalid or not from the Apple App Store or Google Play.<br/>Please ensure you are using a valid link from one of these platforms.')
        $('#errorGenerating').show();
    }
});

$('#generateForm1').submit(function(event) {
    event.preventDefault();
    $('#loginModal').modal('show');
});


function checkURL(url) {
    let googlePlayPattern = /^https:\/\/play\.google\.com\/store\/apps\/details\?id=/;
    let appStorePattern = /^https:\/\/apps\.apple\.com\//;

    return googlePlayPattern.test(url) || appStorePattern.test(url);
}

function closeGeneratingLoading() {
    $('#loader-G').hide();
}

$('#url').on("keydown keyup paste", function(e) {
    let googlePlayPattern = /^https:\/\/play\.google\.com\/store\/apps\/details\?id=/;
    let appStorePattern = /^https:\/\/apps\.apple\.com\//;

    if ( appStorePattern.test( $(this).val() ) ) {
        $('#store-indicator').html(
            '<img src="public/assets/img/home/stores/app-store.png" width="25">'
        );
    }else if ( googlePlayPattern.test( $(this).val() ) ) {
        $('#store-indicator').html(
            '<img src="public/assets/img/home/stores/google-play.png" width="25">'
        );
    }else{
        $('#store-indicator').html(
            '<i class="lni lni-search font-25 d-block"></i>'
        );
    }
});

function markAsNotVisited(e) {
    $.ajax({
        url: 'src/endpoints/home/markNotVisited.php',
        beforeSend: function() {
            e.html('<div class="spinner-border d-block mx-2" style="width: 22px; height: 22px; border-width: 2px;" role="status"><span class="visually-hidden">Loading...</span></div>');
        },
        success: function(data) {
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            location.reload();
        }
    });
}
