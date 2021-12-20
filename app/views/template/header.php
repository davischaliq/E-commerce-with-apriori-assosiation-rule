<?php 
require_once dirname(dirname(dirname(__FILE__))) . "/init.php";
session_start();
ob_start();
$order = new checkout();
$home = new home();

if (isset($_SESSION['user'])) {
    $pesanan = $order->getOrderTMP();
    $countpesanan = $order->countOrderTMP();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>IndoMarket - Free E-Commerce Website Template built with Boostrap 4 and Argon Design System</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link href="<?= BASEURL; ?>assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>assets/css/font-awesome.css" rel="stylesheet">

    <!-- Jquery UI -->
    <link type="text/css" href="<?= BASEURL; ?>assets/css/jquery-ui.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="<?= BASEURL; ?>assets/css/argon-design-system.min.css" rel="stylesheet">

    <!-- Main CSS-->
    <link type="text/css" href="<?= BASEURL; ?>assets/css/style.css" rel="stylesheet">

    <!-- Optional Plugins-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
    <!-- Font Awesome -->
    <!-- <link href="<?= BASEURL; ?>assets/css/font-awesome.css" rel="stylesheet"> -->
    <script src="https://kit.fontawesome.com/e9dbc6e071.js" crossorigin="anonymous"></script>

    <!-- Bootsraps -->
    <script src="<?= BASEURL; ?>assets/js/JQ/jquery3.6.0.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</head>

<body>
    <header class="header clearfix">
        <div class="top-bar d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-6 text-left">
                    </div>
                    <div class="col-6 text-right">
                        <ul class="top-links account-links">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <li class="nav-item dropdown">       
                                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-expanded="false">My Account <i class="fa fa-user-circle-o"></i></a>
                                <!-- <a data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">My Account</a> -->
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="<?= BASEURL; ?>Dashboard/profile.php">Profile</a></li>
                                  <li><a class="dropdown-item" href="<?= BASEURL; ?>auth/authUser.php?keluar">Keluar</a></li>
                                </ul>
                            </li>
                             <?php else: ?>
                              <li><i class="fa fa-power-off"></i><a href="#signIn" data-toggle="modal" data-target="#signIn">Login</a></li>
                            <!-- <li><i class="fa fa-power-off"></i><a href="#signIn" data-bs-toggle="modal" data-bs-target="#signIn">Login</a></li> -->
                            <?php endif; ?>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main border-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-12 col-sm-6">
                        <a class="navbar-brand mr-lg-5" href="<?= BASEURL?>">
                            <i class="fa fa-shopping-bag fa-3x"></i> <span class="logo">IndoMarket</span>
                        </a>
                    </div>
                    <div class="col-lg-7 col-12 col-sm-6">
                        <form action="<?= BASEURL; ?>product/product.php" class="search" method="post">
                            <div class="input-group w-100">
                                <input type="text" name="cari" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-12 col-sm-6">
                        <div class="right-icons pull-right d-none d-lg-block">
                            <div class="single-icon shopping-cart">
                                <li class="nav-item dropdown dropleft ">
                                    <a data-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa fa-shopping-cart fa-2x"></i></a>
                                    <!-- <a data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa fa-shopping-cart fa-2x"></i></a> -->
                                    <?php if (isset($_SESSION['user'])) : ?>
                                    <span class="badge badge-default"><?= $countpesanan; ?></span>
                                    <?php endif;?> 
                                    <ul class="dropdown-menu p-3" style="width: 500px;">
                                    <?php if (isset($_SESSION['user'])) : ?>
                                      <?php if ($countpesanan > 0) : ?>
                                      <?php for ($i=0; $i < count($pesanan); $i++) { 
                                        $harga[$i] = intval($pesanan[$i]['harga']) * intval($pesanan[$i]['qty']);
                                        ?>
                                      <li>
                                        <div class="card mb-3" style="max-width: 490px;">
                                            <div class="row g-0 p-3">
                                              <div class="col-md-4">
                                                <img src="<?= BASEURL; ?>assets/img/products/<?= $pesanan[$i]['gambar'] ?>" class="img-fluid rounded-start" alt="...">
                                              </div>
                                            <div class="col-md-8">
                                            <div class="card-body">
                                                <h6 class="card-title product-content"><a href="product-detail.html"><?= $pesanan[$i]['judul'] ?></a></h6>
                                                <p class="card-text">Rp. <span><?= number_format($harga[$i],2,',','.') ?></span></p>
                                                <?php if ($pesanan[$i]['ukuran'] != 'NULL' && $pesanan[$i]['warna'] != 'NULL') : ?>
                                                <p class="card-text">Ukuran : <span><?= $pesanan[$i]['ukuran'] ?></span></p>
                                                <p class="card-text">Warna : <span><?= $pesanan[$i]['ukuran'] ?></span></p>
                                                <?php endif; ?>
                                                <p class="card-text">Quanty : <span><?= $pesanan[$i]['qty']; ?></span></p>
                                                <p class="card-text">
                                                <button type="button" class="btn btn-danger" data-id="<?= $pesanan[$i]['id']?>" id="keranjanghapus" data-toggle="modal" data-target="#exampleModal">
                                                <i class="far fa-trash-alt"></i>
                                                </button>
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </li>
                                    <?php }?>
                                    <li>
                                        <div class="row">
                                            <div class="m-3 p-3">
                                                <a class="btn btn-primary" href="<?= BASEURL; ?>checkout/checkout.php" role="button">Ayo bayar</a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php else: ?>
                                      <li>
                                        <div class="card text-center">
                                          <div class="card-body">
                                            <h5 class="card-title">Kamu belum memilih barang</h5>
                                              <p class="card-text">Silahkan pilih barang yang ingin di beli.</p>
                                            </div>
                                          </div>
                                      </li>
                                    <?php endif;?> 
                                    <?php else : ?>
                                      <li>
                                        <div class="card text-center">
                                          <div class="card-body">
                                            <h5 class="card-title">Kamu belum login</h5>
                                              <p class="card-text">Silahkan login terlebih dahulu.</p>
                                            </div>
                                          </div>
                                      </li>
                                   <?php endif;?> 
                                    </ul>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <nav class="navbar navbar-main navbar-expand-lg navbar-light border-top border-bottom"> -->
            <!-- <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                    aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">Pages</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="products.html">Products</a>
                                <a class="dropdown-item" href="product-detail.html">Product Detail</a>
                                <a class="dropdown-item" href="cart.html">Cart</a>
                                <a class="dropdown-item" href="checkout.html">Checkout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> -->
        <!-- </nav> -->
    </header>

    <!-- Delete keranjang modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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

    <!-- Modal Signin -->
<div class="modal fade" id="signIn" tabindex="1" aria-labelledby="signInLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Log in</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div id="alertlogin" class="p-3 row"></div>
          <div class="mx-auto p-4">
                <div class="form-group">
                  <div class="row">
                  <h3 class="mx-auto">Login</h3>
                </div>
               </div>
                <div class="mt-5 mb-3">
                  <label for="exampleInputEmail1">Username</label>     
                  <input type="text" class="form-control" name="username" id="username" placeholder="Username">
               </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="mb-3">
                  <a class="nav-link p-0 text-black" style="color:#076594;"href="#">Forgot your password ?</a>
                </div>
                <button type="submit" id="btnlogin" class="mt-3 btn rounded text-white" style="background-color: #076594; width: 100%;">Login</button>
                <div class="row">
                  <h6 class="mt-5 mx-auto">Pengunjug baru ? <a href="#signUp" data-toggle="modal" data-target="#signUp" style="color: #076594;">Sign up</a></h6>
                </div>       
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End of model Signin -->

      <!-- Signup -->
<div class="modal fade" id="signUp" tabindex="1" aria-labelledby="signUpLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="alertregist" class="p-3 row"></div>
        <div class="mx-auto p-4">
          <div class="form-group">
            <div class="row">
            <h3 class="mx-auto">Register</h3></div>
         </div>
          <div class="mt-5 mb-3 row">
            <div class="col-md-6">
              <label for="inputEmail4">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="First name">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="Last name">
            </div>
          </div>
          <div class="mb-3">
            <label for="inputAddress">Username</label>
            <input type="email" class="form-control" id="inputUsername" placeholder="your username">
          </div>
          <div class="mb-3">
            <label for="inputAddress">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="example@example.com">
          </div>
          <div class="mb-3">
            <label for="inputAddress2">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Enter your password">
          </div>
          <button type="submit" id="btnregist" class="mt-3 btn rounded text-white" style="background-color: #076594; width: 100%;">Sign up</button>
          <div class="row">
            <h6 class="mt-5 mx-auto">Do already had account ? <a href="#" data-bs-toggle="modal" data-bs-target="#signIn" style="color: #076594;">Login</a></h6>
          </div>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- End sign up Modal -->
 
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