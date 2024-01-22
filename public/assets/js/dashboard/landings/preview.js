function desktopFrame() {
    $('.landing_framebox').css('width', '100%');
}

function mobileFrame() {
    $('.landing_framebox').css('width', '30%');
}

function tabletFrame() {
    $('.landing_framebox').css('width', '50%');
}

$(document).on('submit', '#previewSettingUpdateForm', function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    var e = $('#previewSettingUpdateBtn');
    startLoadingElem(e);
    
    sendAjaxRequest({
        url: filePath + 'src/endpoints/dashboard/landings/update.php',
        type: 'POST',
        data: formData,
        successFn: function(response) {
            if (response.success) {
                $('#previewSettingUpdateCloseBtn').click();
                new_preview_id(
                    $(location).attr('href').split('/').pop()
                );
                openSuccessToast(response.data);
            } else {
                openErrorToast(response.error);
                stopLoadingElem(e, "Save")
            }
        },
        errorFn: function(error) {
            openErrorToast(error);
            stopLoadingElem(e, "Save")
        }
    });
});

$(document).on('submit', '#publishForm', function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    var e = $('#publishBtn');
    startLoadingElem(e);

    sendAjaxRequest({
        url: filePath + 'src/endpoints/dashboard/landings/update.php',
        type: 'POST',
        data: formData,
        successFn: function(response) {
            if (response.success) {
                closeModal();
                new_preview_id(
                    $(location).attr('href').split('/').pop()
                );
                openSuccessToast(response.data);
            } else {
                openErrorToast(response.error);
                stopLoadingElem(e, "Publish")
            }
        },
        errorFn: function(error) {
            openErrorToast(error);
            stopLoadingElem(e, "Publish")
        }
    });
});

$(document).on('click', '#previewPublish', function(event) {
    status = $(this).attr('data-status');
    domain = $(this).attr('data-domain');
    domainType = $(this).attr('data-domain-type');

    if (status == "publish") {
        $('#publishModal').modal('show');
    }else if (status == "preview") {
        if (domainType == "internal") {
            window.open("https://preview.landoai.com/" + domain, '_blank');
        }else if (domainType == "external") {
            window.open(domain, '_blank');
        }else{
            openErrorToast();
        }
    }else{
        openErrorToast();
    }
});

$(document).ready( function () {
    $('#previewPublish').click();
});
