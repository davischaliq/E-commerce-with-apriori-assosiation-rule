<?php
class product extends controller
{
    private $category;
    Public function getProductbyCategory($data)
    { 
        switch ($data) {
            case 'Fashion':
                $this->category = 'Pakaian gunung';
                $product = $this->model('productModel')->tampilProduct($this->category);
                return $product;
                break;
            case 'Tas':
                $this->category = 'Tas';
                $product = $this->model('productModel')->tampilProduct($this->category);
                return $product;
                break;
            case 'Sepatu':
                $this->category = 'Sepatu';
                $product = $this->model('productModel')->tampilProduct($this->category);
                return $product;
                break;
            case 'Penerangan':
                $this->category = 'Penerangan';
                $product = $this->model('productModel')->tampilProduct($this->category);
                return $product;
                break;
            case 'Perlengkapan':
                $this->category = 'Perlengkapan';
                $product = $this->model('productModel')->tampilProduct($this->category); 
                return $product;
                break;
            case 'Tenda':
                $this->category = 'Tenda';
                $product = $this->model('productModel')->tampilProduct($this->category);
                return $product;
                break;
            default:
                return $err = 1;
                break;
            }   
    }

    Public function cariProduct($cari)
    {
        $result = $this->model('productModel')->getCari($cari);
        $count = count($result); 
        if ($count > 0) {
            return $result;
        }else{
            $err = 0;
            return $err;
        }
    }

    Public function getProduct()
    {
        $result = $this->model('productModel')->Allproduct();
        $count = count($result);
        if ($count > 0) {
            return $result;
        }else{
            $err = 1;
            return $err;
        }
    }

    Public function getProductDetails($id)
    {
        $result = $this->model('productModel')->Detailproduct($id);
        $count = count($result);
        if ($count > 0) {
            return $result;
        }else{
            $err = 1;
            return $err;
        }
    }
    Public function tambahproduct($dataPOST, $dataFILES)
    {
        if ($dataFILES['err'] != 4) {
            $validext = ['jpg', 'png', 'jpeg'];
            if ($dataFILES['size'] > 1200000) {
                $error = array('pesan'=>'Photo kebesaran', 'tipe'=>'danger');
                return $error;
            }else {
                if (in_array($dataFILES['ext'], $validext)) {
                    $NamePP	= "product" . uniqid();
                    $NamePP .= '.';
                    $NamePP .= $dataFILES['ext'];
                    $data = array('judul'=>$dataPOST['judul'], 'harga'=>$dataPOST['hargajual'], 'kategori'=>$dataPOST['kategori'], 'warna'=>$dataPOST['warna'], 'ukuran'=>$dataPOST['ukuran'], 'desc'=>$dataPOST['desc'], 'berat'=>$dataPOST['berat'], 'stock'=>$dataPOST['stock'], 'filename'=>$NamePP);
                    $databarangmasuk = array('judul'=>$dataPOST['judul'], 'harga'=>$dataPOST['hargabeli'], 'stock'=>$dataPOST['stock'], 'tgl'=>date('Y-m-d'));
                    $inputbarangmasuk = $this->model('productModel')->inputbarangmasuk($databarangmasuk);
                    $input = $this->model("productModel")->tambahproduct($data);
                    if ($input > 0 && $inputbarangmasuk > 0) {
                        move_uploaded_file($dataFILES['tmp'], dirname(dirname(dirname(__FILE__))).'/assets/img/products/'.$NamePP);
                        $error = array('pesan'=>'Berhasil menambahkan data product', 'tipe'=>'success');
                        return $error;
                    }
                }else {
                    $error = array('pesan'=>'extensi file tidak valid', 'tipe'=>'danger');
                    return $error;
                }         
            }
        } 
    }
    Public function listbarangmasuk()
    {
        $list = $this->model('productModel')->listbarangmasuk();
        return $list;
    }
    Public function listbarangkeluar()
    {
        $list = $this->model('productModel')->listbarangkeluar();
        return $list;
    }
    Public function list()
    {
        $list = $this->model('productModel')->list();
        return $list;
    }
    Public function listdetail($id)
    {
        $id = base64_decode($id);
        $list = $this->model('productModel')->listdetail($id);
        return json_encode($list);
    }
    Public function updateproduct($dataPOST, $dataFILES)
    {
        if ($dataFILES['err'] != 4) {
            $validext = ['jpg', 'png', 'jpeg'];
            if ($dataFILES['size'] > 1200000) {
                $error = array('pesan'=>'Photo kebesaran', 'tipe'=>'danger');
                return $error;
            }else {
                if (in_array($dataFILES['ext'], $validext)) {
                    $NamePP	= "product" . uniqid();
                    $NamePP .= '.';
                    $NamePP .= $dataFILES['ext']; 
                    // cek kategori ////
                    if ($dataPOST['kategori'] == 'default') {
                        // ambil nilai kategori jika tidak ada yang dimasukan user
                        $kategori = $this->model('productModel')->carikategori($dataPOST['id']);
                    }else {
                        $kategori = array('category'=>$dataPOST['kategori']);
                    }
                    $data = array('id'=>$dataPOST['id'], 'judul'=>$dataPOST['judul'], 'harga'=>$dataPOST['harga'], 'warna'=>$dataPOST['warna'], 'ukuran'=>$dataPOST['ukuran'], 'desc'=>$dataPOST['desc'], 'berat'=>$dataPOST['berat'], 'filename'=>$NamePP);
                    $imgNow = $this->model('productModel')->callimg($dataPOST['id']);
                    // prosess unlink gambar product lama
                    if (file_exists(dirname(dirname(dirname(__FILE__))).'/assets/img/products/'.$imgNow['gambar'])) {
                        unlink(dirname(dirname(dirname(__FILE__))).'/assets/img/products/'.$imgNow['gambar']);
                        $input = $this->model("productModel")->updateproduct($data);
                        move_uploaded_file($dataFILES['tmp'], dirname(dirname(dirname(__FILE__))).'/assets/img/users/pp/'.$NamePP);
                    }else {
                        $input = $this->model("productModel")->updateproduct($data);
                        $this->model("dashboardModel")->uploadGambar($data);
                        move_uploaded_file($dataFILES['tmp'], dirname(dirname(dirname(__FILE__))).'/assets/img/users/pp/'.$NamePP);   
                    }
                    $error = array('pesan'=>'Berhasil update data product', 'tipe'=>'success');
                    return $error;
                }else {
                    $error = array('pesan'=>'extensi file tidak valid', 'tipe'=>'danger');
                    return $error;
                }         
            }
        }else {
            // cek kategori ////
        if ($dataPOST['kategori'] == 'default') {
            // ambil nilai kategori jika tidak ada yang dimasukan user
            $kategori = $this->model('productModel')->carikategori($dataPOST['id']);
        }else {
            $kategori = array('category'=>$dataPOST['kategori']);
        }
            $imgNow = $this->model('productModel')->callimg($dataPOST['id']);
            $data = array('id'=>$dataPOST['id'], 'judul'=>$dataPOST['judul'], 'harga'=>$dataPOST['harga'], 'kategori'=>$kategori['category'], 'warna'=>$dataPOST['warna'], 'ukuran'=>$dataPOST['ukuran'], 'desc'=>$dataPOST['desc'], 'berat'=>$dataPOST['berat'], 'filename'=>$imgNow['gambar']);
            $input = $this->model("productModel")->updateproduct($data);
            $error = array('pesan'=>'Berhasil update data product', 'tipe'=>'success');
            return $error;
        }
    }

    Public function hapusproduct($id)
    {
        $id = base64_decode($id);
        return $this->model("productModel")->hapusproduct($id);
    }
    Public function caristock($id)
    {
        $cari = $this->model("productModel")->caristock($id);
        return $cari;
    }
    Public function updatestock($id, $stock, $harga)
    {
        $stockawal = $this->caristock($id);
        $tambahstock = intval($stockawal['jumlah_stock']) + intval($stock);
        $update = $this->model("productModel")->updatestock($id, $stock);
        $data = array('judul'=>$stockawal['judul'], 'harga'=>$harga, 'stock'=>$stock, 'tgl'=>date('Y-m-d'));
        $reportmasuk = $this->model("productModel")->inputbarangmasuk($data);
        if ($update == 0 && $reportmasuk > 0) {
            $error = array('pesan'=>'Berhasil update stock barang', 'tipe'=>'success');
        }else { 
            $error = array('pesan'=>'Gagal update stock barang', 'tipe'=>'danger');
        }
        return $error;
    }
    Public function review($id)
    { 
        $cari = $this->model("productModel")->review($id); 
        if (count($cari) > 0) {
            for ($i=0; $i < count($cari); $i++) { 
                $img[$i] = $this->model("productModel")->callimguser($cari[$i]['username']);
                $data[$i] = array('nama'=>$cari[$i]['nama'], 'comment'=>$cari[$i]['comment'], 'rating'=>$cari[$i]['rating'], 'img'=>$img[$i]['img']);
            }
        }else {
            $data = 0;
        }
        return $data;
    }
    Public function productterlaris() 
    {
        $cari = $this->model("productModel")->list();
        for ($i=0; $i < count($cari); $i++) {
            $img[$i] = $this->model("productModel")->callbintang($cari[$i]['id']);
            $data[$i] = array('judul'=>$cari[$i]['judul'], 'img'=>$cari[$i]['gambar'], 'rating'=>$img[$i]['rate']);
        }
        return $data;
    }
}
