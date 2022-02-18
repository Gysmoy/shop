$.ajax({
    url: 'assets/php/session.php',
    dataType: 'JSON'
}).done(res => {
    if (location.href.includes('login.php')) {
        location.href = 'home.php';
    }
    var session = res.data;
    $('[session="user_image"]')
        .attr({
            'src': `assets/php/image.php?id=${session.user.id}`,
            'alt': session.user.name
        });
    $('[session="user_name"]').text(session.user.name);
    $('[session="rol_name"]').text(session.rol.name)
        .attr('title', session.rol.description);
}).fail(e => {
    var res = e.responseJSON;
    location.href = `login.php?p=${location.href}`;
})