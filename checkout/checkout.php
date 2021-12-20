<?php 
session_start();
ob_start();
require_once "../app/init.php";
$order = new checkout();
if (isset($_SESSION['user'])) {
    $pesanan = $order->getOrderTMP();
    for ($z=0; $z < count($pesanan); $z++) { 
      $datacategory[$z] = $pesanan[$z]['category'];
      $category = array($datacategory[$z]);
    }
    $countpesanan = $order->countOrderTMP();
    $provinsi = $order->provinsi();
    if ($countpesanan == 0) {
        header('Location: '.BASEURL);
    }
    $support = 30;
    $confidence = 70;
    $apriori = new mining($support, $confidence);
    $predict = $apriori->startpredict($category);
    // var_dump($predict);
    $rekomendasi = $order->rekomendasi($predict);
    // var_dump($rekomendasi);
}else {
    header('Location: '.BASEURL);
}

?>
<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Snippet - BBBootstrap</title>
                                <!-- Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
    rel="stylesheet">

<!-- Icons -->
<link href="<?= BASEURL; ?>assets/css/nucleo-icons.css" rel="stylesheet">

<!-- Jquery UI -->
<link type="text/css" href="<?= BASEURL; ?>assets/css/jquery-ui.css" rel="stylesheet">

<!-- Argon CSS -->
<link type="text/css" href="<?= BASEURL; ?>assets/css/argon-design-system.min.css" rel="stylesheet">

<!-- Main CSS-->
<link type="text/css" href="<?= BASEURL; ?>assets/css/style.css" rel="stylesheet">
<link type="text/css" href="<?= BASEURL; ?>assets/css/checkout.css" rel="stylesheet">

<!-- Optional Plugins-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Bootsraps -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
<!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
<script src="<?= BASEURL; ?>assets/js/JQ/jquery3.6.0.js"></script>
                                
                                </head>
                                <body oncontextmenu='return false' class='snippet-body'>
                                <div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>Shopping Cart</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted"><?= $countpesanan?> items</div>
                </div>
            </div>
            <div class="row border-top border-bottom">
                <?php for ($i=0; $i < count($pesanan); $i++) { 
                        $harga[$i] = intval($pesanan[$i]['harga']) * intval($pesanan[$i]['qty']);
                        $totalberatsatuan[$i] = $pesanan[$i]['berat'];
                        $totalqty[$i] = $pesanan[$i]['qty'];
                    ?>
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="<?=BASEURL;?>assets/img/products/<?= $pesanan[$i]['gambar'] ?>"></div>
                    <div class="col">
                        <div class="row text-muted"><?= $pesanan[$i]['category'] ?></div>
                        <div id="barang" data-productid="<?= $pesanan[$i]['id'] ?>" class="row"><?= $pesanan[$i]['judul'] ?></div>
                    </div>
                    <div class="col"><a href="#" id="quanty" data-qty="<?= $pesanan[$i]['qty'] ?>" class="border"><?= $pesanan[$i]['qty'] ?></a></div>
                    <div id="price" data-harga<?= $i ?>="<?= $harga[$i] ?>" class="col">Rp. <?= number_format($harga[$i],2,',','.') ?> <a data-toggle="modal" style="cursor: pointer;" data-id="<?= $pesanan[$i]['id']?>" id="keranjanghapus"  data-target="#exampleModal" class="close">&#10005;</a></div>
                </div>
            <?php }
            $berat = array_sum($totalberatsatuan) * array_sum($totalqty);
            ?>
            </div>
             <div class="title mt-3">
               <h4><b>Mungkin anda suka</b></h4>
            </div>
            <div class="row border-top border-bottom">
                <?php for ($s=0; $s < count($rekomendasi); $s++) { 
                    ?>
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="<?=BASEURL;?>assets/img/products/<?= $rekomendasi[$s]['gambar'] ?>"></div>
                    <div class="col">
                        <div class="row text-muted"><?= $rekomendasi[$s]['category'] ?></div>
                        <div class="row"><?= $rekomendasi[$s]['judul'] ?></div>
                    </div>
                    <div class="col">
                      <div>Rp. <?= number_format($rekomendasi[$s]['harga'],2,',','.') ?></div>
                  </div>
                    <div class="col">
                    <a href="<?=BASEURL?>product/product-detail.php?id=<?=$rekomendasi[$s]['id']?>" style="cursor: pointer; color: #fff;" id="tambah" class="btn btn-primary">&#43;</a>
                    </div>
                </div>
            <?php } ?>
            </div>
              <div class="col back-to-shop"><a href="<?= BASEURL; ?>">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Summary</b></h5> 
            </div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS <?= $countpesanan?></div>
                <div id="hargapesanan" data-berat="<?= $berat ?>" data-hargapesanan="<?=array_sum($harga)?>" class="col text-right">Rp. <?= number_format(array_sum($harga),2,',','.') ;?></div>
            </div>
            <hr>
            <!-- <form> -->
                <div class="form-floating mb-3">
                    <p>Nama penerima</p> 
                    <input type="text" id="penerima" class="form-control" id="floatingInputValue" placeholder="Nama pengirim">
                </div>
                <div class="form-floating mb-3">
                    <p>No telpn</p> 
                    <input type="text" id="phone" class="form-control" id="floatingInputValue" placeholder="Nama pengirim">
                </div>
                <div class="form-floating mb-3">
                    <p>Alamat pengirim</p> 
                    <textarea class="form-control" id="alamat" placeholder="Alamat pengirim" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
                  <div class="form-floating">
                    <p>Provinsi</p> 
                    <select class="form-select" id="provinsi" aria-label="Floating label select example">
                      <option selected>Provinsi</option>
                      <?php for ($u=0; $u < count($provinsi['provinsi']); $u++) { 
                        echo '<option value="'.$provinsi['provinsi'][$u]['province'].'" data-provinsitujuan="'.$provinsi['provinsi'][$u]['province_id'].'">'.$provinsi['provinsi'][$u]['province'].'</option>';
                      }                      
                      ?>
                    </select>
                  </div>
                  <div class="form-floating">
                    <p>Kabupaten/Kota</p> 
                    <select class="form-select" id="city" aria-label="Floating label select example">
                      <option selected>Kabupaten / Kota</option>
                      <!-- <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option> -->
                    </select>
                  </div>
                <div class="form-floating">
                    <p>Jasa pengiriman</p> 
                    <select class="form-select" id="ongkir" aria-label="Floating label select example">
                      <option selected>Pilih layanan pengiriman</option>
                      <!-- <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option> -->
                    </select>
                  </div>
                  <div class="form-floating mb-3">
                    <p>Kode Pos</p> 
                    <input type="text" id="postal" class="form-control" id="floatingInputValue" placeholder="Nama pengirim">
                </div>
                  <div class="form-floating">
                    <p>Pembayaran</p>  
                    <select class="form-select" id="payment" aria-label="Floating label select example">
                      <option selected>Pilih methode pembayaran</option>
                      <!-- <option value="Bank">Bank Transfer</option> -->
                      <option value="COD">COD</option>
                    </select>
                  </div>
            <!-- </form> -->
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div id="totalprice" data-fixtotal="0" class="col text-right">Rp. <?=number_format(array_sum($harga),2,',','.')?></div>
            </div> <button class="btn" id="checkout" style="background-color: #dc3545; color: #ddd;">CHECKOUT</button>
        </div>
    </div>
</div>
    <!-- Delete keranjang modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Belanjaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalhapus">
        Apakah anda yakin ingin menghapus barang ini dari keranjang anda ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="delete" data-idhapus="" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
<script>
        $(document).on('click', '#keranjanghapus', function(){
            var id = $('#keranjanghapus').data('id');
              $('#delete').data('idhapus', id);
                var hapus = $('#delete').data('idhapus');
              $(document).on('click', '#delete', function(){
                $('#modalhapus').html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>');
                  $.ajax({
                            url: 'http://localhost/joki-nana/order/order.php?hapus',
                            method: "POST",
                            dataType: "JSON",
                            data: {id:hapus}, 
                        success:function(data){
                          var string = '';
                            if (data != 0) {
                              string = '<div class="alert alert-success" role="alert">';
                              string += 'belanjaan di keranjang anda berhasil di hapus'; 
                              string += '</div>';
                            setTimeout(function(){
                                $('#modalhapus').html('');
                                $('#modalhapus').append(string);
                                setTimeout(function(){
                                  window.location.reload();
                              }, 3000);
                            }, 5000); 
                            }
                        }
                      })
              })
        })
</script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src="<?= BASEURL ?>assets/js/ongkir.js"></script>
            </body>
                </html>
<?php ob_flush(); ?>