$(document).ready( function () {
    
});

function logOut() {
    $.ajax({
        url: filePath + 'src/endpoints/dashboard/logout.php',
        success: function(data) {
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus);
            openErrorToast();
        }
    });
}

function loadPage(p) {
    let page = filePath + "src/Views/Dashboard/pages/" + p + "/index.php";

    $.ajax({
        url: page,
        beforeSend: function() {
            $("#content").hide();
            $('#loading-content').html('<div class="d-flex justify-content-center py-3"><div class="spinner-border d-block content-spinner" role="status"><span class="visually-hidden">Loading...</span></div></div>');
        },
        success: function(data) {
            $('#loading-content').html('');
            $("#content").html(data).fadeIn();
            $('[data-bs-toggle="tooltip"]').tooltip();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('AJAX Error: Status - ' + jqXHR.status + ', ResponseText - ' + jqXHR.responseText);
            console.error('AJAX Error: Status -', jqXHR.status, 'ResponseText -', jqXHR.responseText, 'textStatus -', textStatus, 'errorThrown -', errorThrown);
        }
    });
}

function loadPageParam(p, param) {
    let page = filePath + "src/Views/Dashboard/pages/" + p + "/index.php";
    
    $.ajax({
        type: 'POST',
        url: page,
        data: {
            id: param
        },
        beforeSend: function() {
            $("#content").hide();
            $('#loading-content').html('<div class="d-flex justify-content-center py-3"><div class="spinner-border d-block content-spinner" role="status"><span class="visually-hidden">Loading...</span></div></div>');
        },
        success: function(data) {
            $('#loading-content').html('');
            $("#content").html(data).fadeIn();
            $('[data-bs-toggle="tooltip"]').tooltip();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('AJAX Error: Status - ' + jqXHR.status + ', ResponseText - ' + jqXHR.responseText);
            console.error('AJAX Error: Status -', jqXHR.status, 'ResponseText -', jqXHR.responseText, 'textStatus -', textStatus, 'errorThrown -', errorThrown);
        }
    });
}

function sendAjaxRequest({
    url,
    type = 'GET',
    data = {},
    dataType = 'json',
    successFn,
    errorFn,
    headers = {}
} = {}) {
    $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: dataType,
        headers: headers,
        success: function(response) {
            if (typeof successFn === 'function') {
                successFn(response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (typeof errorFn === 'function') {
                let errorMsg = 'AJAX Error: Status - ' + jqXHR.status + ', ResponseText - ' + jqXHR.responseText;
                errorFn(errorMsg);
            }
        }
    });
}

function startLoadingElem(e) {
    e.addClass('pe-none');
    e.html('<div class="spinner-border d-block mx-2" style="width: 22px; height: 22px; border-width: 2px;" role="status"><span class="visually-hidden">Loading...</span></div>');
}

function stopLoadingElem(e, text) {
    e.removeClass('pe-none');
    e.html(text);
}

function closeModal() {
    $('.modal').modal('hide');
}
