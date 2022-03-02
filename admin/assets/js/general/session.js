$.ajax({
    async: false,
    url: 'assets/php/session.php',
    dataType: 'JSON'
}).done(res => {
    if (location.href.includes('login.php')) {
        location.href = './home.php';
    }
    var session = res.data;
    $('[session="user_image"]')
        .attr({
            'src': `../api/admin/image/mini/${session.user.id}`,
            'alt': session.user.name
        });
    $('[session="user_image_full"]')
        .attr({
            'src': `../api/admin/image/full/${session.user.id}`,
            'alt': session.user.name
        });
    $('[session="user_name"]').text(session.user.name);
    $('[session="user_username"]').text(`@${session.user.username}`)
        .attr('title', session.user.name);
    $('[session="user_email"]').text(session.user.email);
    $('[session="rol_name"]').text(session.rol.name)
        .attr('title', session.rol.description);
    $('[session="ip_client"]').text(session['ip-client']);
    localStorage.setItem('session', JSON.stringify(res.data));
}).fail(e => {
    sessionStorage.clear();
    localStorage.clear();
    if (!location.href.includes('login.php')) {
        var pattern = location.pathname.split('/').reverse();
        var url = pattern[0].replace('.php', '');
        location.href = `login.php?p=${url}`;
    }
})