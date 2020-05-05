$(document).ready(function() {
    $('#tombol-cari').hide();
    $('#keyword').on('keyup', function() {
        $.get('ajax/ajax-produk.php?keyword=' + $('#keyword').val(), function() {});
    });
});