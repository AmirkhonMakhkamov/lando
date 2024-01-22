$(window).bind('beforeunload',function(){
    return '';
});

$(document).ready( function () {
    markAsVisited();
});

function desktopFrame() {
    $('.landing_framebox').css('width', '100%');
}

function mobileFrame() {
    $('.landing_framebox').css('width', '25%');
}

function tabletFrame() {
    $('.landing_framebox').css('width', '50%');
}

function save_to_publish(e) {
    let appStore_url = $('#appStore_url').val();
    let googlePlay_url = $('#googlePlay_url').val();
    let page_title = $('#page_title').val();
    let page_description = $('#page_description').val();

    $.ajax({
        type: 'POST',
        url: 'src/endpoints/home/data-publish.php',
        data: {
            appStore_url: appStore_url,
            googlePlay_url: googlePlay_url,
            page_title: page_title,
            page_description: page_description
        },
        beforeSend: function() {
            e.addClass('pe-none');
            e.html('<div class="spinner-border d-block mx-2" style="width: 22px; height: 22px; border-width: 2px;" role="status"><span class="visually-hidden">Loading...</span></div>');
        },
        success: function(data) {
            if (data.success) {
                e.removeClass('pe-none');
                e.html('Save & Go');
                $('#loginModal').modal('show');
            } else {
                e.removeClass('btn-success');
                e.removeClass('text-dark');
                e.addClass('btn-danger');
                e.html(data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            e.removeClass('btn-success');
            e.removeClass('text-dark');
            e.addClass('btn-danger');
            e.html('textStatus');
        }
    });
}

function markAsVisited() {
    $.ajax({
        url: 'src/endpoints/home/markVisited.php',
        beforeSend: function() {
            $('body').hide();
        },
        success: function(data) {
            if (data.success) {
                $('body').show();
            } else {
                location.reload();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            location.reload();
        }
    });
}
