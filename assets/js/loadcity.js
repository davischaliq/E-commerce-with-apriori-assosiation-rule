$(document).ready(function() {
    $('#provinsi').change(function(){
        var provinsi = $('#provinsi option:selected').val();
          if (provinsi != '') {
            $.ajax({
            url: 'http://localhost/joki-nana/edit/edit.php?loadcity',
            method: "POST",
            dataType: "json",
            data: {id_provinsi:provinsi}, 
            success:function(data){
            var city = '';
            $.each(data, function(index, item) {
                $('#city').html('<option>Pilih kota tujuan....</option>');
                city += '<option value="'+item.city_id+'">';
                city += item.type+' '+item.city_name;
                city += '</option>';
            });
            $('#city').append(city);
            }
          })
         }
      })
})