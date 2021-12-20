$(document).on('click', '#tampilpesanan', function(){
            $('#infopesanan').modal('show');
                $('#modalpesanan').html('');
                    $('#modalpesanan').html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>');
                    // var orderid = $('#tampilpesanan').data('orderid');
                    var orderid = $(this).attr('data-orderid');
                $.ajax({
                    url: 'http://localhost/joki-nana/app/order/order.php?detailpesanan',
                    method: "POST",
                    data: {orderid:orderid},
                    dataType: 'json',
                success:function(data){
                    var string = '';
                    // var string = '<div class="row">';
                    $.each(data, function(index, value){
                        string += '<div class="row">';
                        string += '<div class="col">';
                        string += '<div class="card mb-3" style="max-width: 540px;">';
                        string += '<div class="row no-gutters">';
                        string += '<div class="col-md-4">';
                        string += '<img class="img-fluid" src="http://localhost/joki-nana/assets/img/products/'+value.gambar+'" alt="...">';
                        string += '</div>';
                        string += '<div class="col-md-8">';
                        string += '<div class="card-body">';
                        string += '<h5 class="card-title">'+value.judul+'</h5>';
                        if (value.ukuran != 'NULL') {
                            string += '<p class="card-text">Ukuran yang di pilih :'+value.ukuran+'</p>';   
                        }else{

                        }
                        if (value.warna != 'NULL') {
                            string += '<p class="card-text">Warna yang di pilih :'+value.warna+'</p>';   
                        }else{

                        }
                        string += '<p class="card-text">Jumlah pesanan : '+value.qty+'</p>'; 
                        string += '<p class="card-text">Harga satuan : '+new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(value.harga)+'</p>'; 
                        string += '<p class="card-text">Status pesanan : '+value.status+'</p>';   
                        string += '</div>';
                        string += '</div>';
                        string += '</div>';
                        string += '</div>';
                        string += '</div>';
                        string += '</div>';
                    })
                    setTimeout(function(){
                        $('#modalpesanan').html('');
                        $('#modalpesanan').append(string);
                    }, 4000);
                }
                })
        })


$(document).on('click', '#editpesanan', function(){
    $('html, body').animate({
        scrollTop: $('.formcustome').offset().top
    },1000);
        $('#message').html('');
        $('#orderid').val('Loading.....');
        $('#nama').val('Loading.....');
        $('#alamat').val('Loading.....');
        $('#provinsi').val('Loading.....');
        $('#kota').val('Loading.....');
        $('#postal').val('Loading.....');
        $('#phone').val('Loading.....');
        $('#jasa').val('Loading.....');
        $('#resi').val('Loading.....');
        var id = $(this).attr('data-orderid');
        // var id = $('#editpesanan').data('orderid');
        $.ajax({
            url: "http://localhost/joki-nana/app/order/order.php?tampilupdate",
            method: "POST",
            dataType: "JSON", 
            data: {orderid: id}, 
            success:function(data){
                console.log(data);
                setTimeout(function(){
                    $('#orderid').val('');
                    $('#nama').val('');
                    $('#alamat').val('');
                    $('#provinsi').val('');
                    $('#kota').val('');
                    $('#postal').val('');
                    $('#phone').val('');
                    $('#jasa').val('');
                    $('#resi').val('');
                    if (data.resi != 0) {
                        $('#resi').attr('readonly', true);
                        $('#resi').val(data.resi);                        
                    }else{

                    }
                    $('#orderid').val(data.order_id);
                    $('#nama').val(data.penerima);
                    $('#alamat').val(data.alamat);
                    $('#provinsi').val(data.provinsi);
                    $('#kota').val(data.city);
                    $('#postal').val(data.postal);
                    $('#phone').val(data.phone);
                    $('#jasa').val(data.jasa_pengiriman);
                }, 5000);
                }
            })
        })
    
    $(document).on('click', '#btnupdate', function(){
        var string = '';
        $(this).html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>');
        if ($('#status option:selected').val() != '') {
            var order_id = $('#orderid').val();
            var resi = $('#resi').val();
            var status = $('#status option:selected').val();
            console.log(status);
            $.ajax({
                url: "http://localhost/joki-nana/app/order/order.php?updateOrder",
                method: "POST",
                data:{orderid:order_id, status:status, resi:resi},
                success:function(data){ 
                    if (data == '1') {
                        setTimeout(function(){
                            $('#btnupdate').html('');
                            $('#btnupdate').html('Save');
                            window.location.reload();
                        }, 5000); 
                    }
                    if (data == '0') {
                        setTimeout(function(){
                            $('#btnupdate').html('');
                            $('#btnupdate').html('Save');
                            window.location.reload();
                        }, 5000);  
                    }
                }
            })
        }else{
            string += '<div class="alert alert-danger" role="alert">';
            string += 'Data di form masih kosong';
            string += '</div>'; 
            $('#message').html(string);
        }
    })