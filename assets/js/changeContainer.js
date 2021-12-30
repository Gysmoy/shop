$(document).ready(function() {
    $('#container-select').on('change', function() {
        var value = $(this).val();
        $.ajax({
            url: 'api/getDishes',
            type: 'POST',
            dataType: 'JSON',
            headers: {

            },
            data: request,
            success: res => {
                console.log(res);
            },
            error: e => {
                console.log(e);
            }
        })
    })
})