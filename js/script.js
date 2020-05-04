$(document).ready(function() {
    $('#tombol-cari').hide();
    $('#keyword').on('keyup', function() {
        $('.loader').show();

        //ajax menggunakan load
        //$('#container').load('ajax/kader.php?keyword=' + $('#keyword').val());

        //$.get()
        $.get('ajax/ajax-produk.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('.loader').hide();
        });
    });
});