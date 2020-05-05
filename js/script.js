$(document).ready(function() {
    $('#keyword').on('keyup', function() {
        $.get('ajax/ajax-produk.php?keyword=' + $('#keyword').val(), function(data) {});
    });
});