        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
        <?php 
        
        if (isset($_SESSION['admin']) && $_SESSION['admin']) :
        
        ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
                <a class="nav-link" href="<?= BASEURL ?>admin/Dashboard/admin/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL ?>admin/Dashboard/admin/order.php">
                <i class="fas fa-clipboard-list"></i>
                <span>Order</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-tshirt"></i>
                    <span>Product</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= BASEURL; ?>admin/Dashboard/admin/product.php">Tambah Product</a>
                        <a class="collapse-item" href="<?= BASEURL; ?>admin/Dashboard/admin/update_product.php">Update Product</a>
                        <a class="collapse-item" href="<?= BASEURL; ?>admin/Dashboard/admin/update_stock.php">Update Stock Barang</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#MBA"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-shopping-basket"></i>
                    <span>Market Basket Analysis</span>
                </a>
                <div id="MBA" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= BASEURL; ?>admin/Dashboard/admin/apriori.php">Apriori</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#KNN"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fab fa-product-hunt"></i>
                    <span>K-nearest Neighbor</span>
                </a>
                <div id="KNN" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= BASEURL; ?>admin/Dashboard/admin/apriori.php">Perbandingan brand</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-book-open"></i>
                    <span>Report</span>
                </a>
                <div id="collapseReport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= BASEURL; ?>admin/Dashboard/admin/report_product.php">Laporan Product Terlaris</a>
                        <a class="collapse-item" href="<?= BASEURL; ?>admin/Dashboard/admin/report_keuangan.php">Laporan keuangan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>app/auth/auth.php?logout">
                    <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
            </li>
            <?php 
            
            endif;
             ?>
        </ul>
        <!-- End of Sidebar -->