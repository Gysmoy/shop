function removeLoadingClass(img) {
    img.removeClass('loading');
}
function loadNotFoundImage(img) {
    $(img).attr('src', 'assets/img/imageNotFound.jpg');
}