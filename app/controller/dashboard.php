<?php
class dashboard extends controller
{
    Public function Profile()
    {
        $username = htmlspecialchars($_SESSION['user']);
        $data['Profile'] = $this->model('dashboardModel')->getUsers($username);
            if ($data['Profile']['provinsi'] != '0' && $data['Profile']['city'] != '0') {
                $provinsi = $this->cekProvince($data['Profile']['provinsi']);
                $city = $this->cekKota($data['Profile']['provinsi'], $data['Profile']['city']);
                $data['provinsi'] = $provinsi['rajaongkir']['results']['province'];
                $data['city'] = $city['rajaongkir']['results']['type'].' '.$city['rajaongkir']['results']['city_name'];
            }
        $allprovinsi = $this->rajaOngkirloadprovinsi($action='province', $method='GET');
        $data['allprovinsi'] = $allprovinsi['rajaongkir']['results'];
        return $data;
    }
    Public function editProfile($dataPOST, $dataFILES)
    {
        if ($dataFILES['err'] != 4) {
            $pptype = $dataFILES['type'];
            $pptmp = $dataFILES['tmp'];
            $ppsize = $dataFILES['size'];
            $validext = ['jpg', 'png', 'jpeg'];
            $extfile = $dataFILES['ext'];
            if ($ppsize > 1200000) {
                $error = array('pesan'=>'Photo kebesaran', 'tipe'=>'danger');
                return $error;
            }else {
                if (in_array($extfile, $validext)) {
                    $NamePP	= "PP" . uniqid();
                    $NamePP .= '.';
                    $NamePP .= $extfile;
                    $data = array('filename'=>$NamePP, 'username'=>$_SESSION['user']);
                    $imgNow = $this->model('dashboardModel')->callimg($data['username']);
                    if (file_exists(dirname(dirname(dirname(__FILE__))).'/assets/img/users/pp/'.$imgNow['img'])) {
                        unlink(dirname(dirname(dirname(__FILE__))).'/assets/img/users/pp/'.$imgNow['img']);
                        $this->model("dashboardModel")->uploadGambar($data);
                        move_uploaded_file($pptmp, dirname(dirname(dirname(__FILE__))).'/assets/img/users/pp/'.$NamePP);
                    }else {
                        $this->model("dashboardModel")->uploadGambar($data);
                        move_uploaded_file($pptmp, dirname(dirname(dirname(__FILE__))).'/assets/img/users/pp/'.$NamePP);   
                    }
                }else {
                    $error = array('pesan'=>'extensi file tidak valid', 'tipe'=>'danger');
                    return $error;
                }         
            }
        }

        $firstname = $dataPOST['firstname'];
        $lastname = $dataPOST['lastname'];
        $address = $dataPOST['address'];
        $provinsi = $dataPOST['provinsi'];
        $kota = $dataPOST['kota'];
        $postal = $dataPOST['postal'];

        $user = $this->model('dashboardModel')->getUsers($_SESSION['user']);
        
        if ($firstname == '') {
            $firstname = $user['firstname'];
        }
        if ($lastname == '') {
            $lastname = $user['lastname'];
        }
        if ($address == '') {
            $address = $user['alamat'];
        }
        if ($provinsi == '') {
            $provinsi = $user['provinsi'];
        }else {
            $provinsi = base64_decode($provinsi);
        }
        if ($kota == '') {
            $kota = $user['city'];
        }else {
            $kota = base64_decode($kota);
        }
        if ($postal == '') {
            $postal = $user['postal'];
        }

        $data = array('firstname'=>$firstname, 'lastname'=>$lastname, 'address'=>$address, 'provinsi'=>$provinsi, 'kota'=>$kota, 'postal'=>$postal, 'username'=>$_SESSION['user']);
        $this->model('dashboardModel')->UpdateUsers($data);
        $error = array('pesan'=>'Berhasil Update Profile', 'tipe'=>'success');
        return $error;
    }
 
    Public function loadKota($id_provinsi)
    {
        $id_provinsi = base64_decode($id_provinsi);
        $data = $this->loadkotaasal($id_provinsi);
        $jumlah_city = count($data['rajaongkir']['results']);
        for ($i=0; $i < $jumlah_city; $i++) { 
        $string[$i] = array('city_id'=>base64_encode($data['rajaongkir']['results'][$i]['city_id']),'type'=>$data['rajaongkir']['results'][$i]['type'],'city_name'=>$data['rajaongkir']['results'][$i]['city_name']);
        }
        return print_r(json_encode($string));
    }

    Public function orderusers($username)
    {
        $username = base64_decode($username);
        $data = $this->model('dashboardModel')->getOrderusers($username);
        $countdata = count($data);
        if ($countdata > 0) {
            for ($i=0; $i < $countdata; $i++) { 
                $string[$i] = array('id'=>$data[$i]['product_id'], 'orderid'=>$data[$i]['order_id'],'judul'=>$data[$i]['judul'], 'ukuran'=>$data[$i]['ukuran'], 'warna'=>$data[$i]['warna'], 'qty'=>$data[$i]['qty'], 'harga'=>(intval($data[$i]['harga']) * intval($data[$i]['qty'])), 'payment'=>$data[$i]['payment'], 'status'=>$data[$i]['status'], 'gambar'=>$data[$i]['gambar']);
            } 
        }else {
            $string = '';
        }
        return print_r(json_encode($string));
    }
    public function GetDetailsOrders($orderid)
    { 
    //   $this->updatetransaksi($orderid);
      $order_details = $this->model("dashboardModel")->getOrders($orderid);
    //   $imgproduct = $this->model("TransaksiModel")->getProducts($productid);
    //   $data = array('orderid'=>$orderid, 'bank'=>$order_details['bank']);
    //   $getTransaksi = $this->model("TransaksiModel")->getTransaksi($data);
      $string = '<ul class="list-group">';
      $string .='<li class="list-group-item disabled" aria-disabled="true">Billing address</li>';
      $string .='<li class="list-group-item">Order id : '.$order_details['order_id'].'</li>';
      $string .='<li class="list-group-item">Penerima : '.$order_details['penerima'].'</li>';
      $string .='<li class="list-group-item">Alamat : '.$order_details['alamat'].'</li>';
      $string .='<li class="list-group-item">Provinsi : '.$order_details['provinsi'].'</li>'; 
      $string .='<li class="list-group-item">Kota : '.$order_details['city'].'</li>';
      $string .='<li class="list-group-item">Kode Pos : '.$order_details['postal'].'</li>';
      $string .='<li class="list-group-item">No Hp : '.$order_details['phone'].'</li>';
      $string .='<li class="list-group-item">Metode Pembayaran : '.$order_details['payment'].'</li>';
      $string .='<li class="list-group-item">Jasa pengiriman : '.$order_details['jasa_pengiriman'].' | Resi : '.$order_details['resi'].'</li>';
      $string .='</ul>';    
            return print_r($string);
    } 
    // Private function updatetransaksi($orderid)
    // {
    //   $cekbank = $this->model("TransaksiModel")->cekbank($orderid);
    //   $status = $this->model("TransaksiModel")->cekstatus($orderid, $cekbank['bank']);
    //     if ($status['status'] == 'pending') {      
    //       $transaki = $this->checkMidtransTransaksi($orderid);
    //         if (isset($transaki['settlement_time'])) {
    //           $settlement_time = $transaki['settlement_time'];
    //         }else {
    //           $settlement_time = '';
    //         }
    //           $data = array('orderid'=>$orderid, 'status'=>$transaki['transaction_status'], 'bank'=>$cekbank['bank'], 'paid_time'=>$settlement_time);
    //           $this->model('TransaksiModel')->UpdateStatus($data);
    //     }
    // }  

    Public function SentRate($data)
    {
        $rating = intval($data['rating']);
        $date = date("Y-m-d");
        $username = htmlspecialchars($_SESSION['user']);
        $data = array('id'=>$data['id'], 'fullname'=>$data['fullname'], 'comment'=>$data['comment'], 'rating'=>$rating, 'date'=>$date, 'username'=>$username);
        $err = $this->model('dashboardModel')->InputRate($data);
        // return var_dump($err);
        if ($err > 0) {
            return print_r($err);
        }else{
            $err = 0;
            return print_r($err);
        }
    }
}
