$(document).ready(function() {
    $('#tombol-cari').hide();
    $('#keyword').on('keyup', function() {
        $.get('ajax/ajax-customer.php?keyword=' + $('#keyword').val(), function() {});
    });
});