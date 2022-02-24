$('#profile-input').on('change', function() {
    var file = this.files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        var arrayBuffer = reader.result;
        reader.result;
        $('.profile-picture').attr('src', arrayBuffer);
        sessionStorage('profile', arrayBuffer);
    }
    if (file) {
        reader.readAsDataURL(file);
    }
})