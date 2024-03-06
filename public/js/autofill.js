$(document).ready(function() {
    $('select[name="no-rek"]').change(function() {
        var kode_rekening = $(this).val(); 
        if (kode_rekening) {
            $.ajax({
                url: '/getNama/' + kode_rekening,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#nama_rekening').val(response.nama_rekening);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
});