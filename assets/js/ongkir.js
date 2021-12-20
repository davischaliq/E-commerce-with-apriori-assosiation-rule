$(document).ready(function() {
  $('#provinsi').change(function(){
    $('#city').html('<option>Loading......</option>');
      var provinsi = $('#provinsi option:selected').data('provinsitujuan');
        if (provinsi != '') {
          $.ajax({
          url: 'http://localhost/joki-nana/order/order.php?loadcity',
          method: "POST",
          dataType: "json",
          data: {id_provinsi:provinsi},  
          success:function(data){
          var city = '';
          $.each(data, function(index, item) {
            // $('#city').html('');
              $('#city').html('<option>Kabupaten / Kota</option>');
              city += '<option data-city="'+item.city_id+'" value="'+item.type+' '+item.city_name+'">';
              city += item.type+' '+item.city_name;
              city += '</option>';
          });
          $('#city').append(city);
          }
        })
       }
    })

  $('#city').change(function(){
    $('#ongkir').html('<option>Loading......</option>');
    var city = $('#city option:selected').data('city');
    var berat = $('#hargapesanan').attr('data-berat');
      if (city != '' && provinsi != "") {
        $.ajax({
          url: 'http://localhost/joki-nana/order/order.php?ongkir',
          method: "POST",
          dataType: "JSON",
          data: {id_city:city, weight:berat}, 
          success:function(data){
          var pengiriman = '';
          $.each(data, function(index) {
            $.each(this, function(name, value) {
              // $('#ongkir').html('');
              $('#ongkir').html('<option>Pilih layanan pengiriman</option>');
              pengiriman += '<option data-hargaongkir="'+value.value+'" value="'+value.service+' '+value.etd+'">';
              pengiriman += value.service+' '+new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(value.value)+' '+value.etd;
              pengiriman += '</option>';
            });
          });
          $('#ongkir').append(pengiriman);
          }
        })
       }
    })

    $('#ongkir').change(function(){
      // var jasaOngkir = $('#ongkir').val();
      var hargaOngkir = $('#ongkir option:selected').data('hargaongkir');
      // var Ongkir = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(hargaOngkir);
      // $('#descOngkir').html(jasaOngkir);
      // $('#hargaOngkir').html(Ongkir);
      // $('#hargaOngkir').attr('data-checkout-ongkir', hargaOngkir);
      var totalHarga = $('#hargapesanan').attr('data-hargapesanan');
      var fixharga = parseInt(totalHarga) + parseInt(hargaOngkir);
      $('#totalprice').data('fixtotal', fixharga);
      $('#totalprice').html(new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(fixharga));
    })
    
    $('#checkout').click(function(){
      $('#checkout').html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>'); 
      if ($('#penerima').val() != "" && $('#alamat').val() != "" && $('#phone').val() != "" && $('#provinsi option:selected').val() != "" && $('#city').val() != "" && $('#postal').val() != "" && $('#ongkir option:selected').val() != "") {
      // billing adress
      var penerima = $('#penerima').val();
      var address = $('#alamat').val();
      var province = $('#provinsi option:selected').val();
      var city = $('#city option:selected').val();;
      var zip = $('#postal').val();
      var phone = $('#phone').val();
      var ongkir = $('#ongkir option:selected').val();
      var payment = $('#payment option:selected').val();
      var harga = $('#totalprice').data('fixtotal');
      $.ajax({
        url: 'http://localhost/joki-nana/order/order.php?start',
        method: "POST",
        data: {penerima:penerima, address:address, phone:phone, provinsi:province, kota:city, postal:zip, pengiriman:ongkir, total:harga, payment:payment}, 
        success:function(data){
        // console.log(data);
        if (data > 0 ) {
          $('#checkout').html('CHECKOUT');
          window.location.href = 'http://localhost/joki-nana/order/success-payment.php'; 
        }else{
          alert("Gagal input data");
        }
        }
      })
    }else{
      $('#submit').html('Continue to checkout'); 
      alert("Please enter field billing address");
    }
    })
  })
