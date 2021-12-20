<?php 
// include header
include_once "app/views/template/header.php";
$product = $home->getProduct();

?>
<!------------------------------------------
    SLIDER
    ------------------------------------------->
    <section class="slider-section pt-4 pb-4">
        <div class="container">
            <div class="slider-inner">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="nav-category">
                            <h2>Categories</h2>
                            <ul class="menu-category">
                                <li><a href="<?= BASEURL ?>product/product.php?category=Fashion">Pakaian Gunung</a></li>
                                <li><a href="<?= BASEURL ?>product/product.php?category=Sepatu">Sepatu</a></li>
                                <li><a href="<?= BASEURL ?>product/product.php?category=Penerangan">Penerangan</a></li>
                                <li><a href="<?= BASEURL ?>product/product.php?category=Tas">Tas</a></li>
                                <li><a href="<?= BASEURL ?>product/product.php?category=Tenda">Tenda</a></li>
                                <li><a href="<?= BASEURL ?>product/product.php?category=Perlengkapan">Perlengkapan</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-9">
                        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner shadow-sm rounded">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="./assets/img/slides/slide1.jpg" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Mountains, Nature Collection</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./assets/img/slides/slide2.jpg" alt="Second slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Freedom, Sea Collection</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./assets/img/slides/slide3.jpg" alt="Third slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Living the Dream, Lost Island</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Slider -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="media">
                        <div class="iconbox iconmedium rounded-circle text-info mr-4">
                            <i class="fa fa-truck"></i>
                        </div>
                        <div class="media-body">
                            <h5>Fast Shipping</h5>
                            <p class="text-muted">
                                All you have to do is to bring your passion. We take care of the rest.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="iconbox iconmedium rounded-circle text-purple mr-4">
                            <i class="fa fa-credit-card-alt"></i>
                        </div>
                        <div class="media-body">
                            <h5>COD Payment</h5>
                            <p class="text-muted">
                                All you have to do is to bring your passion. We take care of the rest.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="iconbox iconmedium rounded-circle text-warning mr-4">
                            <i class="fa fa-refresh"></i>
                        </div>
                        <div class="media-body">
                            <h5>Free Return</h5>
                            <p class="text-muted">
                                All you have to do is to bring your passion. We take care of the rest.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services -->
    <section class="products-grids trending pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Items</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <?php 
                // var_dump($product);
                for ($i=0; $i < count($product); $i++) { ?>
                <div class="col-xl-3 col-lg-4 col-md-4 col-12 mb-4">
                    <div class="single-product">
                        <div class="product-img">
                            <a href="<?= BASEURL?>product/product-detail.php">
                                <img src="<?= BASEURL?>assets/img/products/<?= $product[$i]['gambar'] ?>" class="img-fluid" />
                            </a>
                        </div>
                        <div class="product-content">
                            <h3><a href="<?= BASEURL?>product/product-detail.php?id=<?= $product[$i]['id'] ?>"><?= $product[$i]['judul'] ?></h3>
                            <div class="product-price">
                                <span>Rp. <?= number_format($product[$i]['harga'], 0, ",", ".") ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <?php
    
    include_once "app/views/template/footer.php";

    ?>