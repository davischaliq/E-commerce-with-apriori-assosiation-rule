<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))).'/app/init.php';
session_start();
if (!isset($_SESSION['admin']) && $_SESSION['admin'] == '') {
    header('Location:' . BASEURL . 'admin/');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="<?=BASEURL?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=BASEURL?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?=BASEURL?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php 
        
        require_once dirname(dirname(dirname(dirname(__FILE__)))).'/app/views/template/side-menu.php';

        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                </nav>
                <!-- End of Topbar -->
                <?php 
                $order = new Order();
                $order_pelanggan = $order->showOrder();
                // var_dump($order_pelanggan);
                // $order = getOrder();
                
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Order</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Order id</th>
                                            <th>Nama lengkap</th>
                                            <th>Alamat</th>
                                            <th>Provinsi</th>
                                            <th>Kota</th>
                                            <th>Postal</th>
                                            <th>No telpn</th>
                                            <th>Jasa pengiriman</th>
                                            <th>Resi</th>
                                            <th>Total Harga</th>
                                            <th>Pesanan</th>
                                            <th>Payment</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    if (count($order_pelanggan) > 5) :
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <th>Order id</th>
                                            <th>Nama lengkap</th>
                                            <th>Alamat</th>
                                            <th>Provinsi</th>
                                            <th>Kota</th>
                                            <th>Postal</th>
                                            <th>No telpn</th>
                                            <th>Jasa pengiriman</th>
                                            <th>Resi</th>
                                            <th>Total Harga</th>
                                            <th>Pesanan</th>
                                            <th>Payment</th>
                                            <th>Edit</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    endif;
                                    ?>
                                    <tbody>
                                        <?php 
                                        for ($i=0; $i < count($order_pelanggan); $i++) { ?>
                                            <tr>
                                            <td><?=$order_pelanggan[$i]['order_id']?></td>
                                            <td><?=$order_pelanggan[$i]['penerima']?></td>
                                            <td><?=$order_pelanggan[$i]['alamat']?></td>
                                            <td><?=$order_pelanggan[$i]['provinsi']?></td>
                                            <td><?=$order_pelanggan[$i]['city']?></td>
                                            <td><?=$order_pelanggan[$i]['postal']?></td>
                                            <td><?=$order_pelanggan[$i]['phone']?></td>
                                            <td><?=$order_pelanggan[$i]['jasa_pengiriman']?></td>
                                            <td><?=$order_pelanggan[$i]['resi']?></td>
                                            <td>Rp. <?= number_format($order_pelanggan[$i]['total_harga'], 0, ",", ".")?></td>
                                            <td><button class="btn btn-success btn-circle" id="tampilpesanan" data-orderid="<?= base64_encode($order_pelanggan[$i]['order_id'])?>"><i class="fas fa-clipboard-list"></i></button></td>
                                            <td><?=$order_pelanggan[$i]['payment']?></td>
                                            <?php if ($order_pelanggan[$i]['status'] == 'Sampai tujuan' OR $order_pelanggan[$i]['status'] == 'Di batalkan') : ?> 
                                                <td><button class="btn btn-primary btn-circle disabled" id="editpesanan"><i class="far fa-edit"></i></button></td>
                                            <?php else : ?>
                                                <td><button class="btn btn-primary btn-circle" id="editpesanan" data-orderid="<?= base64_encode($order_pelanggan[$i]['order_id'])?>"><i class="far fa-edit"></i></button></td>
                                            <?php endif; ?>
                                            <tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <div class="modal fade" id="infopesanan" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body" id="modalpesanan">
                </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
        </div>
            </div>
                </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <div class="message"> 
                        <?php 
                            flash::showflash();
                        ?>
                        </div>
                        <div class="formcustome">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Order id</label>
                                <input type="email" class="form-control" id="orderid" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama</label>
                                <input type="text" class="form-control" id="nama" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="3" disabled readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kota</label>
                                <input type="text" class="form-control" id="kota" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Postal</label>
                                <input type="text" class="form-control" id="postal" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="text" class="form-control" id="phone" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Jasa pengiriman</label>
                                <input type="text" class="form-control" id="jasa" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Resi</label>
                                <input type="text" class="form-control" id="resi">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" id="status">
                                    <option select="selected">Silahkan pilih status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Sedang diproses">Sedang diproses</option>
                                    <option value="Dalam perjalanan">Dalam perjalanan</option>
                                    <option value="Sampai tujuan">Sampai tujuan</option>
                                    <option value="Di batalkan">Batalkan</option>
                                </select>
                            </div>
                            <button type="submit" id="btnupdate" class="btn btn-primary">Save</button>
                        </div>
                        </div>             
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div> 
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=BASEURL?>assets/vendor/JQ/jquery3.6.0.js"></script>
    <script src="<?=BASEURL?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=BASEURL?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=BASEURL?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=BASEURL?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=BASEURL?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=BASEURL?>assets/js/demo/datatables-demo.js"></script>
    <script src="<?=BASEURL?>assets/js/admin-order.js"></script>
</body>

</html>