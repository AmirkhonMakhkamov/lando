$(document).ready( function () {
    $(document).on('gesturestart', function(event) {
        event.preventDefault();
    });

    $(document).on('contextmenu', function() {
        return false;
    });

    $('[data-bs-toggle="tooltip"]').tooltip();

    // setTimeout(function() {
    //     $('#loader-container').fadeOut('slow');
    // }, 1000);

    // alert($.cookie('dashboardPathSplit'));
    // $.cookie('page', 'messages/index.php');

});

function openSuccessToast(msg) {
    $('#successToastMsg').html(msg);
    $('#successToast').toast('show');
}

function openErrorToast(msg) {
    if (msg) $('#errorToastMsg').html(msg);
    $('#errorToast').toast('show');
}

function clearBeforeunload() {
    $(window).off('beforeunload');
}

const filePath = $.cookie('dashboard_filePath');
const rootPath = $.cookie('dashboard_rootPath');