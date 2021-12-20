<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))).'/app/init.php';
session_start();
if (!isset($_SESSION['admin']) && $_SESSION['admin'] == '') {
    header('Location:' . BASEURL);
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

<body id="page-top" onload="hideform()">

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
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah data barang</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <div class="message">
                        <?php 
                            flash::showflash();
                        ?>
                        </div>
                        <form class="formcustome" action="<?= BASEURL; ?>app/tambah_barang/tambah.php?tambah" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama barang</label>
                                <input type="text" class="form-control" name="judul">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Harga Jual</label>
                                <input type="text" class="form-control" name="hargajual">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Harga Beli</label>
                                <input type="text" class="form-control" name="hargabeli">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Category</label>
                                <select class="form-control" name="kategori" id="category">
                                    <option select="selected">Silahkan pilih category</option>
                                    <option value="Pakaian gunung">Pakaian gunung</option>
                                    <option value="Sepatu">Sepatu</option>
                                    <option value="Penerangan">Penerangan</option>
                                    <option value="Tas">Tas</option>
                                    <option value="Tenda">Tenda</option>
                                    <option value="Perlengkapan">Perlengkapan</option>
                                </select>
                            </div>
                            <div class="form-group" id="warna">
                                <label for="exampleInputPassword1">Pilihan warna</label>
                                <input type="text" class="form-control" name="color">
                                <small id="emailHelp" class="form-text text-muted">Contoh : biru,merah,orange</small>
                            </div>
                            <div class="form-group" id="size">
                                <label for="exampleInputPassword1">Pilihan ukuran</label>
                                <input type="text" class="form-control" name="ukuran">
                                <small id="emailHelp" class="form-text text-muted">Contoh : S,M,L,XL</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Perkiran berat</label>
                                <input type="text" class="form-control" name="berat">
                                <small id="emailHelp" class="form-text text-muted">Masukan dalam jumlah gram</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Jumlah Stock</label>
                                <input type="text" class="form-control" name="stock">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Pilih gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img" id="inputGroupFile01">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            </div> 
                            <button type="submit" id="btnupdate" class="btn btn-primary">Save</button>
                        </form>
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
    <script src="<?=BASEURL?>assets/js/inputfile.js"></script>
    <script>
        function hideform() {
            $('#warna').hide();
            $('#size').hide();   
        }
        $(document).ready(function() {
            $('#category').change(function() {
                var kategori = $('#category option:selected').val();
                if (kategori == 'Pakaian gunung') {
                    $('#warna').show();
                    $('#size').show();
                }
                if (kategori == 'Sepatu') {
                    $('#warna').hide()
                    $('#size').show();
                }
                if (kategori == 'Penerangan' || kategori == 'Tas' || kategori == 'Tas' || kategori == 'Tenda' || kategori == 'Perlengkapan') {
                    $('#warna').hide();
                    $('#size').hide();  
                }
            })
        })
    </script>

</body>

</html>