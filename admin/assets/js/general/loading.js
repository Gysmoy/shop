function loading(btn, status) {
    if (status === true) {
        $(btn).html(`
            <i class="mdi mdi-spin mdi-rotate-right"></i>
        `);
    } else {
        $(btn).text(status);
    }
}