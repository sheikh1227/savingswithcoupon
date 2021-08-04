$(document).ready(function () {
    $("a[href='" + getPageName(window.location.pathname) + "']").parent().addClass("active");

    function getPageName(url) {
        var index = url.lastIndexOf("/");
        var filename = url.substr(index);
        return filename;
    }
});

