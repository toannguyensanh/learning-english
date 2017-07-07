$(document).ready(function() {
    $("#delete_url_avatar").click(function() {
        $("#url_avatar_for_user").val('');
        $(this).parents(".wrapper-avatar").find('img').remove();
    });

    if($("#url_avatar_for_user").val() != '') {
        $("#url_avatar_for_user").parents(".wrapper-avatar").append("<img src='"+$("#url_avatar_for_user").val()+"' class='m-t'>");
    }

    $("#url_avatar_for_user").change(function() {
        $(this).parents(".wrapper-avatar").find('img').remove('img');
        $(this).parents(".wrapper-avatar").append("<img src='"+$("#url_avatar_for_user").val()+"' class='m-t'>");
    });
});

/*
 * use the Filemanager from a simple textfield
 */
var urlobj;

function BrowseServer(url, obj) {
    urlobj = obj;
    OpenServerBrowser(
        url,
        screen.width * 0.7,
        screen.height * 0.7);
}

function OpenServerBrowser(url, width, height) {
    var iLeft = (screen.width - width) / 2;
    var iTop = (screen.height - height) / 2;
    var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes";
    sOptions += ",width=" + width;
    sOptions += ",height=" + height;
    sOptions += ",left=" + iLeft;
    sOptions += ",top=" + iTop;
    var oWindow = window.open(url, "BrowseWindow", sOptions);
}

function SetUrl(url, width, height, alt) {
    document.getElementById(urlobj).value = url;
    oWindow = null;

    var idName = '#'+urlobj;
    $(idName).trigger("change");
}

