function loading(btn, status) {
    if (status === true) {
        $(btn).html(`
            <i class="mdi mdi-spin mdi-rotate-right"></i>
        `).prop('disabled', true);
    } else {
        $(btn).text(status).prop('disabled', false);
    }
}