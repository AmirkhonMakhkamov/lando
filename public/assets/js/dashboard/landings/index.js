function deleteLanding(e) {
    const id = e.attr('data-lid');

    $.ajax({
        url: filePath + 'src/endpoints/dashboard/landings/delete.php',
        type: 'POST',
        data: {
            landingId: id
        },
        dataType: 'json',
        beforeSend: function() {
            e.addClass('pe-none');
            e.html('<div class="spinner-border d-block mx-2" style="width: 22px; height: 22px; border-width: 2px;" role="status"><span class="visually-hidden">Loading...</span></div>');
        },
        success: function(response) {
            if(response.success) {
                $('.modal').modal('hide');

                openSuccessToast(response.data);

                landings();
            } else {
                // response.error
                openErrorToast();
                e.html('Delete');
                e.removeClass('pe-none');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            openErrorToast();
            e.html('Delete');
            e.removeClass('pe-none');

            // alert('AJAX Error: Status - ' + jqXHR.status + ', ResponseText - ' + jqXHR.responseText);
            // console.error('AJAX Error: Status -', jqXHR.status, 'ResponseText -', jqXHR.responseText, 'textStatus -', textStatus, 'errorThrown -', errorThrown);
        }
    });
}

function deleteLandingModal(e, id, title) {
    $('#deleteLandingConfirmBtn').attr('data-lid', id);
    $('#deleteLandingConfirmTitle').html(title);
    $('#deleteLandingModal').modal('show');
}