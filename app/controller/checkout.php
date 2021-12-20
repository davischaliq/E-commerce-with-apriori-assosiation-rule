<?php

class checkout extends controller
{
    Public function provinsi()
    {
        $rajaOngkir = $this->TampilProvinsi('province', 'GET');
        $jumlah_provinsi = count($rajaOngkir['rajaongkir']['results']);
        for ($z=0; $z < $jumlah_provinsi; $z++) { 
            $data['provinsi'][$z] = $rajaOngkir['rajaongkir']['results'][$z];
        }
        return $data;
    }
    Public function tmpcheckout($datapost)
    {
        $insert = $this->model('checkoutModel')->inputcheckouttmp($datapost);
        return $insert;
    }
    Public function getOrderTMP()
    {
        $username = htmlspecialchars($_SESSION['user']);
        $checkout_tmp = $this->model('checkoutModel')->GetcheckoutUser($username);
        if (count($checkout_tmp) > 0) {
        for ($i=0; $i < count($checkout_tmp); $i++) { 
            $detailProduct[$i] = $this->model('checkoutModel')->getDetails($checkout_tmp[$i]['product_id']);
            $data[$i] = array('id'=>$checkout_tmp[$i]['product_id'], 'judul'=>$detailProduct[$i]['judul'],'berat'=>$detailProduct[$i]['berat'], 'gambar'=>$detailProduct[$i]['gambar'], 'harga'=>$detailProduct[$i]['harga'], 'ukuran'=>$checkout_tmp[$i]['ukuran'], 'warna'=>$checkout_tmp[$i]['warna'], 'qty'=>$checkout_tmp[$i]['qty'], 'category'=>$detailProduct[$i]['category']);
        }
    }else {
        $data = $checkout_tmp;
    }
        return $data;
    }
    Public function loadCity($id_province)
    { 
        $action = "city";
        $method = "GET";
        // $id_province = base64_decode($id_province);
        $data = $this->rajaOngkirloadcity($action, $method, $id_province);
        $jumlah_city = count($data['rajaongkir']['results']);
        for ($i=0; $i < $jumlah_city; $i++) { 
        $string[$i] = array('city_id'=>base64_encode($data['rajaongkir']['results'][$i]['city_id']),'type'=>$data['rajaongkir']['results'][$i]['type'],'city_name'=>$data['rajaongkir']['results'][$i]['city_name']);
        }
        return print_r(json_encode($string));
        // return print_r($data);
    }
    Public function loadOngkir($destination, $berat)
    {
        $username = $_SESSION['user'];
        $origin = 154;
        $destination = base64_decode($destination);
        $courier = array('jne', 'tiki', 'pos');
        $CekOngkirjne = $this->rajaOngkirCekOngkir($destination, $origin, $berat, $courier[0]);

        $CekOngkirjneCount = count($CekOngkirjne['rajaongkir']['results'][0]['costs']);
        if ($CekOngkirjneCount > 0) {
            for ($i=0; $i < $CekOngkirjneCount; $i++) { 
                $servicejne[$i] = array('service'=>'JNE '.$CekOngkirjne['rajaongkir']['results'][0]['costs'][$i]['service'],'value'=>$CekOngkirjne['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value'],'etd'=>'Estimasi '.$CekOngkirjne['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['etd'].' hari');
            }
        }else {
            $servicejne = 0;
        }

        $CekOngkirtiki = $this->rajaOngkirCekOngkir($destination, $origin, $berat, $courier[1]);
        // var_dump($CekOngkirtiki);
        $CekOngkirtikiCount = count($CekOngkirtiki['rajaongkir']['results'][0]['costs']);
        if ($CekOngkirtikiCount) {
            for ($z=0; $z < $CekOngkirtikiCount; $z++) { 
                $servicetiki[$z] = array('service'=>'TIKI '.$CekOngkirtiki['rajaongkir']['results'][0]['costs'][$z]['service'],'value'=>$CekOngkirtiki['rajaongkir']['results'][0]['costs'][$z]['cost'][0]['value'],'etd'=>'Estimasi '.$CekOngkirtiki['rajaongkir']['results'][0]['costs'][$z]['cost'][0]['etd'].' hari');
            }
        }else {
            $servicetiki = 0;
        }
        // var_dump($servicetiki);
        $CekOngkirpos = $this->rajaOngkirCekOngkir($destination, $origin, $berat, $courier[2]);
        $CekOngkirposCount = count($CekOngkirpos['rajaongkir']['results'][0]['costs']);
        if ($CekOngkirposCount > 0) {
            for ($p=0; $p < $CekOngkirposCount; $p++) { 
                $servicepos[$p] = array('service'=>'POS '.$CekOngkirpos['rajaongkir']['results'][0]['costs'][$p]['service'],'value'=>$CekOngkirpos['rajaongkir']['results'][0]['costs'][$p]['cost'][0]['value'],'etd'=>'Estimasi '.$CekOngkirpos['rajaongkir']['results'][0]['costs'][$p]['cost'][0]['etd']);
            }
        }else {
            $servicepos = 0;
        }
        $data = array($servicejne, $servicetiki, $servicepos);
        return print_r(json_encode($data));
    }
    Public function inputDatacheckout($data)
    {
        // khusus COD
        if ($data['payment'] == 'COD') {
            $err = $this->model('checkoutModel')->InputDataCheckout($data);
            if ($err > 0) {
                // ambil pesanan user
                $pesan= $this->model('checkoutModel')->GetcheckoutUser($data['username']);
                    if ($pesan != '') { 
                        # input data ke tb pesanan
                        for ($i=0; $i < count($pesan); $i++) { 
                            $pesanan[$i] = array('order_id'=>$data['order_id'], 'productid'=>$pesan[$i]['product_id'], 'ukuran'=>$pesan[$i]['ukuran'], 'warna'=>$pesan[$i]['warna'], 'qty'=>$pesan[$i]['qty'], 'username'=>$pesan[$i]['username']);
                            $input[$i] = $this->model('checkoutModel')->inputpesanan($pesanan[$i]);
                            $hapustmp[$i] = $this->model('checkoutModel')->hapusTMPsetelahpesan($pesanan[$i]['productid'], $pesanan[$i]['username']);
                        }

                    }
                return $err = 'COD';
            }else {
                $err = 0;
                return print_r($err);
            }
        }
    }
    Public function countOrderTMP()
    {
        $username = htmlspecialchars($_SESSION['user']);
        $checkout_tmp = $this->model('checkoutModel')->CountcheckoutUser($username);
        return $checkout_tmp['jumlah'];
    }
    Public function hapustmp($id)
    {
        $hapus = $this->model('checkoutModel')->hapusTMP($id);
        return $hapus;
    }
    Public function TampilProvinsi($action, $method) 
    {
        $data = $this->rajaOngkirloadprovinsi($action, $method);
        return $data;
    }
    Public function rekomendasi($param)
    {
        for ($i=0; $i < count($param); $i++) { 
            if (count($param[$i]) > 2) {
                $category[$i] = $param[$i];
                for ($z=0; $z < count($category[$i]); $z++) { 
                    $data[] = $this->model('checkoutModel')->rekomendasi($category[$i][$z]);
                }
            }
        }
        return $data;
        // return $category;
    }
}

