$(document).ready(function(){
    $('#bulan').datepicker({
        format: "mm",
        viewMode: "months",
        startView: "months",
        minViewMode: "months",
        maxViewMode: "months"
    });
    $('#tahun').datepicker({
        format: 'yyyy',
        viewMode: 'years',
        minViewMode: 'years'
    });
    $('#tgl-setor').datepicker({
        format: 'yyyy/mm/dd'
    })
});