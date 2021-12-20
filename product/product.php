<?php  

require_once "../app/init.php";
include_once "../app/views/template/header.php";
    $product = new product();
if (isset($_GET['category'])) {
    $keyword = htmlspecialchars($_GET['category']);
    $result = $product->getProductbyCategory($keyword);
    if ($result == 1) {
        header('Location: '. BASEURL .'404/404.php');
    }
}


if (isset($_POST['cari'])) {
    $keyword = htmlspecialchars($_POST['cari']);
    $cari = "%" . $keyword . "%";
    $result = $product->cariProduct($cari);
    if ($result == 0) { 
        header('Location: '. BASEURL .'404/404.php');
    }
} 

if (!isset($_GET['category']) && !isset($_POST['cari'])) {
    $result = $product->getProduct();
    $keyword = 'All Product';
}

?>
<!------------------------------------------
    Page Header
    ------------------------------------------->
    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=BASEURL?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$keyword?></li>
            </ol>
        </div>
    </section>
    <section class="products-grid pb-4 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="sidebar">
                        <!-- <div class="sidebar-widget">
                            <div class="widget-title">
                                <h3>Shop by Price</h3>
                            </div>
                            <div class="widget-content shop-by-price">
                                <form method="GET" action="/tesas">
                                    <div class="price-filter">
                                        <div class="price-filter-inner">
                                            <div id="slider-range"></div>
                                            <div class="price_slider_amount">
                                                <div class="label-input">
                                                    <input type="text" id="amount" name="price"
                                                        placeholder="Add Your Price" />
                                                    <button type="submit">Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                        <div class="sidebar-widget">
                            <div class="widget-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="widget-content widget-categories">
                                <ul>
                                    <li><a href="<?= BASEURL ?>product/product.php?category=Fashion">Pakaian gunung</a></li>
                                    <li><a href="<?= BASEURL ?>product/product.php?category=Sepatu">Sepatu</a></li>
                                    <li><a href="<?=BASEURL ?>product/product.php?category=Tas">Tas</a></li>
                                    <li><a href="<?=BASEURL ?>/product/product.php?category=Penerangan">Penerangan</a></li>
                                    <li><a href="<?= BASEURL ?>product/product.php?category=Perlengkapan">Perlengkapan</a></li>
                                    <li><a href="<?=BASEURL?>product/product.php?category=Tenda">Tenda</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="sidebar-widget">
                            <div class="widget-title">
                                <h3>Brands</h3>
                            </div>
                            <div class="widget-content widget-brands">
                                <ul>
                                    <li><a href="#">Apple</a></li>
                                    <li><a href="#">Samsung</a></li>
                                    <li><a href="#">Lenovo</a></li>
                                    <li><a href="#">Asus</a></li>
                                    <li><a href="#">Xiaomi</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="products-top">
                                <div class="products-top-inner">
                                    <div class="products-found">
                                        <p><span><?= count($result)?></span> Produk ditemukan</p>
                                    </div>
                                    <div class="products-sort">
                                        <span><?=$keyword?></span>
                                        <!-- <select>
                                            <option>Default</option>
                                            <option>Price</option>
                                            <option>Recent</option>
                                        </select> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php for ($i=0; $i < count($result); $i++) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12 mb-4">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="<?= BASEURL?>product/product-detail.php">
                                    <img src="<?= BASEURL?>assets/img/products/<?= $result[$i]['gambar'] ?>" class="img-fluid" />
                                </a>
                            </div>
                            <div class="product-content">
                                <h3><a href="<?= BASEURL?>product/product-detail.php?id=<?= $result[$i]['id'] ?>"><?= $result[$i]['judul'] ?></h3>
                            <div class="product-price">
                                <span>Rp. <?= number_format($result[$i]['harga'], 0, ",", ".") ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                    </div>
                    <!-- <div class="row">
                        <div class="col-12">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <?php 
    
    include_once "../app/views/template/footer.php";

    ?>