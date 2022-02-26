$.ajax({
    async: false,
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
    $('[session="user_username"]').text(`@${session.user.username}`);
    $('[session="user_email"]').text(session.user.email);
    $('[session="rol_name"]').text(session.rol.name)
        .attr('title', session.rol.description);
    localStorage.setItem('session', JSON.stringify(res.data));
}).fail(e => {
    sessionStorage.clear();
    localStorage.clear();
    if (!location.href.includes('login.php')) {
        location.href = `login.php?p=${location.href}`;
    }
})