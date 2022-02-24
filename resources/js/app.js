require('./bootstrap');

$('#loginModal').on('shown.bs.modal', function () {
    $('#loginInput').trigger('focus')
})