<?php 
require_once "../app/init.php";
include_once "../app/views/template/header.php";
$product = new product();

if (isset($_GET['id'])) {
    $id = htmlentities($_GET['id']);
    $result = $product->getProductDetails($id);
    if ($result['ukuran'] != 'NULL') {
        $ukuran = explode(',', $result['ukuran']);
    }else {
        $ukuran = 0;
    }
    if ($result['warna'] != 'NULL') {
        $warna = explode(',', $result['warna']);
    }else {
        $warna = 0;
    }
}else {
    header('Location: '. BASEURL);
}
?>
<!------------------------------------------
    Page Header
    ------------------------------------------->
    <section class="product-page pb-4 pt-4">
        <div class="container">
            <div class="row product-detail-inner">
                <div class="col-lg-6 col-md-6 col-12">
                    <div id="product-images" class="carousel slide" data-ride="carousel">
                        <!-- slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active"> <img src="<?= BASEURL?>assets/img/products/<?= $result['gambar'] ?>" alt="Product 1"> </div>
                            <div class="carousel-item"> <img src="<?= BASEURL?>assets/img/products/<?= $result['gambar'] ?>" alt="Product 2"> </div>
                            <div class="carousel-item"> <img src="<?= BASEURL?>assets/img/products/<?= $result['gambar'] ?>" alt="Product 3"> </div>
                            <div class="carousel-item"> <img src="<?= BASEURL?>assets/img/products/<?= $result['gambar'] ?>" alt="Product 4"> </div>
                        </div> <!-- Left right -->
                        <a class="carousel-control-prev" href="#product-images" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#product-images" data-slide="next"> <span class="carousel-control-next-icon"></span> </a><!-- Thumbnails -->
                        <ol class="carousel-indicators list-inline">
                            <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#product-images"> <img src="<?= BASEURL?>assets/img/products/<?= $result['gambar'] ?>" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#product-images"> <img src="<?= BASEURL?>assets/img/products/<?= $result['gambar'] ?>" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#product-images"> <img src="<?= BASEURL?>assets/img/products/<?= $result['gambar'] ?>" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-3" data-slide-to="3" data-target="#product-images"> <img src="<?= BASEURL?>assets/img/products/<?= $result['gambar'] ?>" class="img-fluid"> </a> </li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="product-detail">
                        <h2 class="product-name"><?= $result['judul'] ?></h2>
                        <div class="product-price">
                            <span class="price">Rp. <?= number_format($result['harga'], 0, ",", ".") ?></span>
                            <!-- <span class="price-muted">IDR 499.000</span> -->
                        </div>
                        <div class="product-short-desc">
                            <?= $result['deskripsi'] ?>
                        </div>
                        <div class="product-select">
                            <!-- <form action="<?= BASEURL; ?>order/order.php?pesan='<?= base64_encode($id); ?>'"> -->
                                <?php if ($result['category'] == 'Pakaian gunung' OR $result['category'] == 'Sepatu') : ?>
                                <div class="form-group">
                                    <label>Size</label>
                                    <select id="ukuran" name="ukuran" class="form-control">
                                        <option>-- Size --</option>
                                        <?php for ($i=0; $i < count($ukuran); $i++) { ?>
                                        <option value="<?= $ukuran[$i]; ?>"><?= $ukuran[$i]; ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                                <?php endif;?>
                                <?php if ($result['category'] == 'Pakaian gunung' OR $result['category'] == 'Tas') : ?>
                                <div class="form-group">
                                    <label>Color</label>
                                    <select id="color" class="form-control">
                                        <option>-- Color --</option>
                                        <?php for ($i=0; $i < count($warna); $i++) { ?>
                                        <option value="<?= $warna[$i]; ?>"><?= $warna[$i]; ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                                <?php endif;?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="number" id="quanty" name="qty" class="form-control" placeholder="Jumlah"/>
                                    </div>
                                    <?php if (!isset($_SESSION['user'])) :?>
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#signIn">Add to Cart</button>
                                    </div>
                                    <?php else:?>
                                    <div class="col-md-5">
                                        <button type="button" id="addcart" data-idproduct="<?= base64_encode($id); ?>" class="btn btn-primary btn-block">Add to Cart</button>
                                    </div>
                                    <?php endif;?>
                                </div>
                            <!-- </form> -->
                        </div>
                        <div class="product-categories">
                            <ul>
                                <li class="categories-title">Categories :</li>
                                <li><a href="#"><?= $result['category'] ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-details">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                    <?= $result['deskripsi'] ?>
                                    </div>
                                    <?php $review = $product->review($id);
                                    ?> 
                                    <?php if ($review == 0) : ?>
                                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                        </div>
                                    <?php else : ?>
                                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                        <?php

                                            for ($z=0; $z < count($review); $z++) {
                                        ?>
                                    <div class="media p-2">
                                    <?php if ($review[$z]['img'] != 'NULL' AND file_exists(dirname(dirname(__FILE__)).'/assets/img/users/pp/'.$review[$z]['img'])) : ?>
                                        <img class="mr-3 rounded-circle" src="<?=BASEURL;?>assets/img/users/pp/<?= $review[$z]['img']?>" width="30" alt="Generic placeholder image">
                                    <?php  else: ?>
                                        <img class="mr-3 rounded-circle" src="<?=BASEURL;?>assets/img/icons/pp/pp.png" width="30" alt="Generic placeholder image">
                                    <?php  endif; ?>
                            <div class="media-body">
                                <h5 class="mt-0"><?= $review[$z]['nama'] ?></h5>
                                    <p class="text-muted mb-3"><?= $review[$z]['comment'] ?>.</p>
                                    <p>
                                    <?php for ($i=0; $i < $review[$z]['rating']; $i++) {?>
                                        <i class="fas fa-star" style="color: gold;"></i> 
                                    <?php } ?>
                                    </p>
                                <p><?= $review[$z]['comment'] ?>.</p>
                            </div>
                                </div>
                                    <?php } ?>
                                    </div>
                                        <?php endif ; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?= BASEURL ?>assets/js/tambah-keranjang.js" type="text/javascript"></script>
    <?php 
    
    include_once "../app/views/template/footer.php";
    
    ?>