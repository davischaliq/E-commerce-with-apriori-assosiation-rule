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

    <!-- Vendor datetime picker plugin -->
    <link rel="stylesheet" href="<?= BASEURL; ?>assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">Proses Apriori</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <!-- <form class="formcustome" action="<?= BASEURL; ?>app/order/order.php?caritransaksi" method="post"> -->
                           <div class="form-group"> 
                            <div class="row">
                                <div class="col"> 
                                    <input type="text" class="form-control" id="tgl-mulai" name="tanggal_mulai" placeholder="Tanggal Awal">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="tgl-akhir" name="tanggal_akhir" placeholder="Tanggal Akhir">
                                </div>
                            </div>
                            </div>
                            <button type="submit" id="cari" class="btn btn-primary">Cari</button>
                        <!-- </form> -->
                        </div>             
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <div class="message">
                        <?php 
                            flash::showflash();
                        ?>
                        </div>
                        <form class="formcustome" action="<?= BASEURL; ?>app/apriori/apriori.php?proses" method="post">
                           <div class="form-group"> 
                            <div class="row">
                                <div class="col">  
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="support" id="support" placeholder="Masukan min support">
                                            <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Min support</span>
                                    </div>
                                </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="confidence" id="confi" placeholder="Msukan min confident">
                                            <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Min confident</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div> 
                            <button type="submit" id="prosesapriori" class="btn btn-primary">Prosess</button>
                        </form>
                        </div>             
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
                        </div>
                        <div class="card-body" id="tabeltransaksi">
                            
                        </div>
                    </div>
                    <?php 
                    $order = new Order();
                    // $order->TRUNCATEmining();
                    $mining = $order->hasilmining();
                    $string = '';
                    if ($mining != 0) {
                        $string .='<div class="card shadow mb-4">';
                        $string .='<div class="card-header py-3">';
                        $string .='<h6 class="m-0 font-weight-bold text-primary">Itemset</h6>';
                        $string .='</div>';
                        $string .='<div class="card-body" id="itemset">';
                        $string .='<div class="table-responsive">';
                        $string .='<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                        $string .='<thead>';
                        $string .='<tr>';
                        $string .='<th>Itemset</th>';
                        $string .='<th>Support</th>';
                        $string .='<th>Keterangan</th>';
                        $string .='</tr>';
                        $string .='</thead>';
                        $string .='<tbody>';
                        for ($i=0; $i < count($mining['itemset']); $i++) { 
                            $string .='<tr>';
                            $string .='<td>'.$mining['itemset'][$i]['item'].'</td>';
                            $string .='<td>'.$mining['itemset'][$i]['support'].'</td>';
                            if ($mining['itemset'][$i]['keterangan'] == 'Lolos') {
                                $string .='<td><span class="badge badge-pill badge-success">'.$mining['itemset'][$i]['keterangan'].'</span></td>';
                            }
                            if ($mining['itemset'][$i]['keterangan'] == 'Gagal') {
                                $string .='<td><span class="badge badge-pill badge-danger">'.$mining['itemset'][$i]['keterangan'].'</span></td>';
                            }
                            $string .='</tr>';
                        }
                        $string .='</tbody>';
                        $string .='</table>';
                        $string .='</div>';
                        $string .='</div>';
                        $string .='</div>';

                        $string .='<div class="card shadow mb-4">';
                        $string .='<div class="card-header py-3">';
                        $string .='<h6 class="m-0 font-weight-bold text-primary">Kombinasi</h6>';
                        $string .='</div>';
                        $string .='<div class="card-body" id="kombinasi">';
                        
                        $string .='<div class="table-responsive">';
                        $string .='<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                        $string .='<thead>';
                        $string .='<tr>';
                        $string .='<th>Kombinasi</th>';
                        $string .='<th>Confidence</th>';
                        $string .='<th>Keterangan</th>';
                        $string .='</tr>';
                        $string .='</thead>';
                        $string .='<tbody>';
                        for ($p=0; $p < count($mining['kombinasi']); $p++) { 
                            $string .='<tr>';
                            $string .='<td>'.$mining['kombinasi'][$p]['item'].'</td>';
                            $string .='<td>'.$mining['kombinasi'][$p]['confidence'].'</td>';
                            if ($mining['kombinasi'][$p]['keterangan'] == 'Lolos') {
                                $string .='<td><span class="badge badge-pill badge-success">'.$mining['kombinasi'][$p]['keterangan'].'</span></td>';
                            }
                            if ($mining['kombinasi'][$p]['keterangan'] == 'Gagal') {
                                $string .='<td><span class="badge badge-pill badge-danger">'.$mining['kombinasi'][$p]['keterangan'].'</span></td>';
                            }
                            $string .='</tr>';
                        }
                        $string .='</tbody>';
                        $string .='</table>';
                        $string .='</div>';

                        $string .='</div>'; 
                        $string .='</div>';

                        $string .='<div class="card shadow mb-4">';
                        $string .='<div class="card-header py-3">';
                        $string .='<h6 class="m-0 font-weight-bold text-primary">Aturan</h6>';
                        $string .='</div>';
                        $string .='<div class="card-body" id="kombinasi">';
                        
                        $string .='<div class="table-responsive">';
                        $string .='<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                        $string .='<thead>';
                        $string .='<tr>';
                        $string .='<th>Rules</th>';
                        $string .='</tr>';
                        $string .='</thead>';
                        $string .='<tbody>';
                        for ($l=0; $l < count($mining['aturan']); $l++) { 
                            $string .='<tr>';
                            $newaturan[$l] = explode('=>', $mining['aturan'][$l]['item']);
                            if (count($newaturan[$l]) == 1) { 
                                    $string .= '<td>Customer hanya membeli '.$newaturan[$l][0].'</td>';
                            }
                            if (count($newaturan[$l]) == 2) {
                                    $string .= '<td>Jika customer membeli '.$newaturan[$l][0].' pasti membeli '.$newaturan[$l][1].'</td>';
                            }
                            if (count($newaturan[$l]) == 3) {
                                    $string .= '<td>Jika customer membeli '.$newaturan[$l][0].' pasti membeli '.$newaturan[$l][1].' dan juga '.$newaturan[$l][2].'</td>';
                            }
                            $string .='</tr>';
                        }
                        $string .='</tbody>';
                        $string .='</table>';
                        $string .='</div>';

                        $string .='</div>';
                        $string .='</div>';
                    }
                    echo $string;
                    ?>

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
    <!-- <script src="<?=BASEURL?>assets/js/demo/datatables-demo.js"></script> -->
    <!-- datetime -->
    <script src="<?= BASEURL; ?>assets/vendor/momentjs/node_modules/moment/moment.js"></script>
    <script src="<?= BASEURL; ?>assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?=BASEURL?>assets/js/setup-datetimepicker.js"></script>
    <script>

        $(document).on('click', '#cari', function(){
            $('#tabeltransaksi').html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>'); 
            var mulai = $('#tgl-mulai').val();
            var akhir = $('#tgl-akhir').val();
                $.ajax({
                    url: "http://localhost/joki-nana/app/order/order.php?caritransaksi",
                    method: "POST",
                    dataType: "JSON",
                    data: {tanggal_mulai:mulai, tanggal_akhir:akhir},
                    success:function(data){
                    var string = '<div class="table-responsive">';
                    string +='<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                    string +='<thead>';
                    string +='<tr>';
                    string +='<th>Order Id</th>';
                    string +='<th>Barang</th>';
                    string +='</tr>';
                    string +='</thead>';
                    string +='<tbody>';
                    $.each(data, function(index, item) {
                    string +='<tr>';
                    string +='<td>'+item.order_id+'</td>';
                    string +='<td>'+item.barang+'</td>';
                    string +='</tr>';
                    });
                    string +='</tbody>';
                    string +='</table>';
                    string +='</div>';
                    setTimeout(function(){
                        $('#tabeltransaksi').html(''); 
                        $('#tabeltransaksi').append(string);
                    }, 4000);
                    }
                })
        })

        // $(document).on('click','#prosesapriori', function(){
        //     $('#prosesapriori').html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>');
        //     var support = $('#support').val();
        //     var confidence = $('#confi').val();
        //         $.ajax({
        //             url: 'http://localhost/joki-nana/app/apriori/apriori.php?proses',
        //             method: 'POST',
        //             dataType: 'json',
        //             data : {support:support, confidence:confidence},
        //             success:function(data){
        //                 // console.log(data);
        //                 if (data == 0) {
        //                     setTimeout(function(){
        //                         $('#prosesapriori').html(''); 
        //                         $('#prosesapriori').html('Proses'); 
        //                         window.location.reload();
        //                     }, 4000);   
        //                 }
        //             }
        //         })
        // })

    </script>

</body>

</html>