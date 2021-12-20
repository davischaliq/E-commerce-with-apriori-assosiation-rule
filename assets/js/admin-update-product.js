$(document).on('click', '#editpesanan', function(){
    $('html, body').animate({
        scrollTop: $('.formcustome').offset().top
    },1000);
        var id = $(this).attr('data-id');
        $('#id').val('Loading....');
        $('#barang').val('Loading....');
        $('#price').val('Loading.....');
        $('#colour').val('Loading.....');
        $('#sized').val('Loading.....');
        $('#berat').val('Loading.....');
        $('#jumlah').val('Loading.....');
        $('#desc').val('Loading.....');
        $.ajax({
            url: "http://localhost/joki-nana/app/tambah_barang/tambah.php?tampilupdate",
            method: "POST",
            dataType: "JSON", 
            data: {id:id}, 
            success:function(data){
                console.log(data);
                setTimeout(function(){
                $('#id').val('');
                $('#barang').val('');
                $('#price').val('');
                $('#colour').val('');
                $('#sized').val('');
                $('#berat').val('');
                $('#jumlah').val('');
                $('#desc').val('');

                $('#barang').val(data.judul);
                $('#price').val(data.harga);
                if (data.warna != 'NULL') {
                    $('#colour').val(data.warna);
                }else{
                    $('#warna').hide();
                }
                if (data.ukuran != 'NULL') {
                    $('#sized').val(data.ukuran);
                }else{
                    $('#size').hide();
                }
                $('#id').val(data.id);
                $('#berat').val(data.berat);
                $('#desc').val(data.deskripsi);
                }, 5000);
                }
            })
        })

        $(document).on('click', '#hapuspesanan', function(){
            var id = $(this).attr('data-id');
            $('#hapusproduct').modal('show');
                $('#confirmhapus').attr('data-id', id);
                    $('#confirmhapus').on('click', function(){
                        var id_product = $('#confirmhapus').attr('data-id');
                        $('#modalproduct').html('');
                        $('#modalproduct').html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>');
                        $.ajax({
                            url: 'http://localhost/joki-nana/app/tambah_barang/tambah.php?hapusproduct',
                            method: "POST",
                            data: {id:id},
                            dataType: 'json',
                            success:function(data){
                                var string = '';
                            if (data == 0) {
                                string = '<div class="alert alert-success" role="alert">';
                                string += 'Data product berhasil di hapus'; 
                                string += '</div>';
                            setTimeout(function(){
                                $('#modalproduct').html('');
                                $('#modalproduct').append(string);
                            setTimeout(function(){
                                window.location.reload();
                            }, 3000);
                            }, 5000); 
                            }
                            }
                        })
                    })
        })