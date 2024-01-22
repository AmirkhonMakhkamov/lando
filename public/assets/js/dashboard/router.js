$(document).ready(function() {
    var pathnameSegments = window.location.pathname.split('/').filter(Boolean).slice($.cookie('dashboard_pageSlice'));
    
    var routes = {
        'dashboard': dashboard,
        'home': dashboard,
        'landings': {
            '_': landings,
            'new': {
                '_': new_landing
            },
            'preview': {
                '_': new_preview,
                ':id': new_preview_id
            }
        },
        'billing': billing,
        'settings': settings,
        'personal': personal,
        'notifications': notifications,
        'support': support,
        'faq': faq
    };

    function navigate(routeObj, segments, path = []) {
        if (segments.length === 0) {
            if (path.join('/') === "landings/preview") {
                landings();
                return;
            }
        }

        var segment = segments.shift();
        path.push(segment);

        if (routeObj.hasOwnProperty(segment)) {
            var nextRouteObj = routeObj[segment];
            if (typeof nextRouteObj === 'function') {
                nextRouteObj(segment);
            } else if (typeof nextRouteObj === 'object') {
                navigate(nextRouteObj, segments, path);
            } else {
                console.error("Unexpected configuration");
            }
        } else if (routeObj.hasOwnProperty(':id')) {
            routeObj[':id'](segment);
        } else if (routeObj.hasOwnProperty('_')) {
            routeObj['_']();
        } else {
            console.error("Page not found:", segment);
        }
    }

    if (pathnameSegments.length === 0) {
        dashboard();
    } else {
        navigate(routes, pathnameSegments);
    }
});

function activateBtn(btn) {
    $('.btn').removeClass('active pe-none');
    $('button[data-target="'+btn+'"]').addClass('active pe-none');
    $('button[data-target="'+btn+'"]').tooltip('hide');
    $('.offcanvas').offcanvas('hide');
}

function pushPath(page) {
    window.history.pushState({}, '', rootPath + page);
}

function dashboard() {
    pushPath('');
    activateBtn('dashboard');
    loadPage('dashboard');
}

function new_landing() {
    pushPath('landings/new');
    activateBtn('new_landing');
    loadPage('landings/new');
}

function new_preview() {
    pushPath('landings/preview');
    // activateBtn('new_landing');
}

function new_preview_id(id) {
    pushPath('landings/preview/' + id);
    activateBtn('landings');
    loadPageParam('landings/preview', id);
}

function landings() {
    pushPath('landings');
    activateBtn('landings');
    loadPage('landings');
}

function billing() {
    pushPath('billing');
    activateBtn('billing');
    loadPage('billing');
}

function settings() {
    pushPath('settings');
    activateBtn('settings');
    loadPage('settings');
}

function personal() {
    pushPath('personal');
    activateBtn('personal');
    loadPage('personal');
}

function notifications() {
    pushPath('notifications');
    activateBtn('notifications');
    loadPage('notifications');
}

function support() {
    pushPath('support');
    activateBtn('support');
    loadPage('support');
}

function faq() {
    pushPath('faq');
    activateBtn('faq');
    loadPage('faq');
}
