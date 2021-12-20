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
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Product</h1>
                    <!-- DataTales Example -->
                    <?php 
                
                $product = new product();
                $list = $product->list();
                
                ?>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama barang</th>
                                            <th>Kategori</th>
                                            <th>Pilihan warna</th>
                                            <th>Pilihan ukuran</th>
                                            <th>Berat</th>
                                            <th>Harga</th>
                                            <th>Jumlah Stock</th>
                                            <th>Lihat</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    if (count($list) > 5) :
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <th>Nama barang</th>
                                            <th>Kategori</th>
                                            <th>Pilihan warna</th>
                                            <th>Pilihan ukuran</th>
                                            <th>Berat</th>
                                            <th>Harga</th>
                                            <th>Jumlah Stock</th>
                                            <th>Lihat</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    endif;
                                    ?>
                                    <tbody>
                                        <?php for ($i=0; $i < count($list); $i++) { ?>
                                            <tr>
                                            <td><?=$list[$i]['judul']?></td>
                                            <td><?=$list[$i]['category']?></td>
                                            <?php if ($list[$i]['warna'] != 'NULL') : ?>
                                                <td><?= $list[$i]['warna']?></td>
                                            <?php else: ?>
                                                <td></td>
                                            <?php endif; ?>
                                            <?php if ($list[$i]['ukuran'] != 'NULL') : ?>
                                                <td><?= $list[$i]['ukuran']?></td>
                                            <?php else: ?>
                                                <td></td>
                                            <?php endif; ?>
                                            <td><?= $list[$i]['berat'] ?></td>
                                            <td>Rp. <?=number_format($list[$i]['harga'], 0, ",", ".") ?></td>
                                            <td><?= $list[$i]['jumlah_stock'] ?></td>
                                            <td><a href="<?=BASEURL?>product/product-detail.php?id=<?=$list[$i]['id']?>" class="btn btn-primary btn-circle"><i class="far fa-eye"></i></a></td>
                                            <td><button id="editpesanan" data-id="<?= base64_encode($list[$i]['id']) ?>" class="btn btn-primary btn-circle"><i class="far fa-edit"></i></button></td>
                                            <?php if ($list[$i]['jumlah_stock'] == 0) : ?>
                                            <td><button id="hapuspesanan" data-id="<?= base64_encode($list[$i]['id']) ?>" class="btn btn-danger btn-circle"><i class="far fa-trash-alt"></i></button></td>
                                            <?php else: ?>
                                                <td><button class="btn btn-danger btn-circle" disabled><i class="far fa-trash-alt"></i></button></td>
                                            <?php endif; ?>
                                            </tr>
                                      <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <div class="modal fade" id="hapusproduct" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body" id="modalproduct">
                        <p>Apakah anda yakin ingin menghapus product ini ? </p>
                </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="confirmhapus" class="btn btn-danger" data-id="0">Hapus</button>
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
                        <form class="formcustome" action="<?= BASEURL; ?>app/tambah_barang/tambah.php?update" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id barang</label>
                                <input type="text" class="form-control" name="productid" id="id" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama barang</label>
                                <input type="text" class="form-control" name="judul" id="barang">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Harga satuan</label>
                                <input type="text" class="form-control" name="harga" id="price">
                            </div> 
                            <!-- <div class="form-group">
                                <label for="exampleFormControlSelect1">Category</label>
                                <select class="form-control" name="kategori" id="category">
                                    <option select="selected" value="default">Silahkan pilih category</option>
                                    <option value="Pakaian gunung">Pakaian gunung</option>
                                    <option value="Sepatu">Sepatu</option>
                                    <option value="Penerangan">Penerangan</option>
                                    <option value="Tas">Tas</option>
                                    <option value="Tenda">Tenda</option>
                                    <option value="Perlengkapan">Perlengkapan</option>
                                </select>
                            </div> -->
                            <div class="form-group" id="warna">
                                <label for="exampleInputPassword1">Pilihan warna</label>
                                <input type="text" class="form-control" name="color" id="colour">
                                <small id="emailHelp" class="form-text text-muted">Contoh : biru,merah,orange</small>
                            </div>
                            <div class="form-group" id="size">
                                <label for="exampleInputPassword1">Pilihan ukuran</label>
                                <input type="text" class="form-control" name="ukuran" id="sized">
                                <small id="emailHelp" class="form-text text-muted">Contoh : S,M,L,XL</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Perkiran berat</label>
                                <input type="text" class="form-control" name="berat" id="berat">
                                <small id="emailHelp" class="form-text text-muted">Masukan dalam jumlah gram</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="3" id="desc"></textarea>
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
    <script src="<?=BASEURL?>assets/js/admin-update-product.js"></script>

</body>

</html>