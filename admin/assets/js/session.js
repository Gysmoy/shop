$.ajax({
    url: 'assets/php/session.php',
    dataType: 'JSON',
    success: res => {
        console.log(res);
    },
    error: e => {
        alert(e.responseJSON.message);
        location.href = 'login.php';
    }
})