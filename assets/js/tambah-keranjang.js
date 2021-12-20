$(document).on('click', '#addcart', function(){
            $('#addcart').html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>');
            if ($('#ukuran option:selected').val()) {
                var ukuran = $('#ukuran option:selected').val();
            }else{
                var ukuran = 'NULL';
            }
            if ($('#color option:selected').val()) {
                var warna = $('#color option:selected').val();
            }else{
                var warna = 'NULL';
            }
            var qty = $('#quanty').val();
            var id = $('#addcart').data('idproduct');
            // console.log(warna);
                $.ajax({
                    url: 'http://localhost/joki-nana/order/order.php?pesanan',
                    method: "POST",
                    dataType: "JSON",
                    data: {pesanan:id, ukuran:ukuran, color:warna, qty:qty}, 
                success:function(data){
                    if (data != 0) {
                    setTimeout(function(){
                        $('#addcart').html(''); 
                        $('#addcart').html('Cart');
                        alert('Berhasil menambahkan ke keranjangt');
                        window.location.reload();
                    }, 5000);
                    }
                }
            })
        })        