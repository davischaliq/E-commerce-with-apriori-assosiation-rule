// $('#tgl').bootstrapMaterialDatePicker({format : 'DD-MM-YYYY', weekStart : 0, time: false });

$('#tgl-akhir').bootstrapMaterialDatePicker({ format : 'DD-MM-YYYY', weekStart : 0, time: false });
$('#tgl-mulai').bootstrapMaterialDatePicker({ format : 'DD-MM-YYYY', weekStart : 0, time: false }).on('change', function(e, date)
{
$('#tgl-akhir').bootstrapMaterialDatePicker('setMinDate', date);
});