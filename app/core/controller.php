<?php
Class Controller
{
    Public function model($models)
    {
        require_once dirname(dirname(__FILE__)) .'/models/'.$models.'.php';
        return new $models;
    }
    Public function rajaOngkirloadprovinsi($action, $method)
    {
        $curl = curl_init();
        $URL = "https://api.rajaongkir.com/starter/".$action."";
        curl_setopt_array($curl, array(
          CURLOPT_URL => $URL,
          CURLOPT_CUSTOMREQUEST => $method,
          CURLOPT_RETURNTRANSFER => "TRUE",
          CURLOPT_HTTPHEADER => array(
            "key: 330dc2fc9a1b42bf53e4083a9e101328"
          ),
        ));
        $response = curl_exec($curl);
        $data = json_decode($response, TRUE);
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        curl_close($curl);
        
        return $data;
    }

    Public function rajaOngkirloadcity($action, $method, $id_provinsi)
    {
        $curl = curl_init();
        $URL = "https://api.rajaongkir.com/starter/".$action."?province=".$id_provinsi;
        curl_setopt_array($curl, array(
          CURLOPT_URL => $URL,
          CURLOPT_CUSTOMREQUEST => $method,
          CURLOPT_RETURNTRANSFER => "TRUE",
          CURLOPT_HTTPHEADER => array(
            "key: 330dc2fc9a1b42bf53e4083a9e101328"
          ),
        ));
        $response = curl_exec($curl);
        $data = json_decode($response, TRUE);
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        curl_close($curl);
        
        return $data;
    }

    Public function rajaOngkirCekOngkir($destination, $origin, $weight, $courier)
    {
        $curl = curl_init();
        $URL = "https://api.rajaongkir.com/starter/cost";
        curl_setopt_array($curl, array(
          CURLOPT_URL => $URL,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=". $origin ."&destination=". $destination ."&weight=".$weight."&courier=".$courier,
          CURLOPT_RETURNTRANSFER => "TRUE",
          CURLOPT_HTTPHEADER => array(
            "key: 330dc2fc9a1b42bf53e4083a9e101328"
          ),
        ));
        $response = curl_exec($curl);
        $data = json_decode($response, TRUE);
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        curl_close($curl);
        
        return $data;
    }
    Public function cekProvince($id){
        $curl = curl_init();
        $URL = "https://api.rajaongkir.com/starter/province?id=".$id;
        curl_setopt_array($curl, array(
          CURLOPT_URL => $URL,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_RETURNTRANSFER => "TRUE",
          CURLOPT_HTTPHEADER => array(
          "key: 330dc2fc9a1b42bf53e4083a9e101328"
          ),
        ));
        $response = curl_exec($curl);
        $data = json_decode($response, TRUE);
        curl_close($curl);
      
        return $data;
    }
    Public function cekKota($provinsi, $kota){
      $curl = curl_init();
      $URL = "https://api.rajaongkir.com/starter/city?id=".$kota."&province=".$provinsi;
      curl_setopt_array($curl, array(
        CURLOPT_URL => $URL,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_RETURNTRANSFER => "TRUE",
        CURLOPT_HTTPHEADER => array(
        "key: 330dc2fc9a1b42bf53e4083a9e101328"
        ),
      ));
      $response = curl_exec($curl);
      $data = json_decode($response, TRUE);
      curl_close($curl);
    
      return $data;
  }
 
  Public function loadkotaasal($id_provinsi)
  {
      $curl = curl_init();
      $URL = "https://api.rajaongkir.com/starter/city?province=".$id_provinsi;
      curl_setopt_array($curl, array(
        CURLOPT_URL => $URL,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_RETURNTRANSFER => "TRUE",
        CURLOPT_HTTPHEADER => array(
          "key: 330dc2fc9a1b42bf53e4083a9e101328"
        ),
      ));
      $response = curl_exec($curl);
      $data = json_decode($response, TRUE);
      curl_close($curl);
      
      return $data;
  }
  // Class untuk ekseskusi apriori
  // Public function Traindatasample($data, $labels=[], $support = 0.5, $confidence = 0.5)
  // {
  //   $associator = new Apriori($support, $confidence);
  //   $associator->train($data, $labels);

  //   // dapatkan rules
  //   $assoate = $associator->apriori();
  //   $rules = $associator->getRules();
  //   return $assoate;
  // }
  // Public function GenerateTransaksi($data)
  // {
  //     //Set Your server key
  //     Config::$serverKey = "SB-Mid-server-4c3Xkk9ON-ziavZak4Rl-Bu0";

  //     // Uncomment for production environment
  //     // Config::$isProduction = true;

  //     // Uncomment to enable sanitization
  //     Config::$isSanitized = true;

  //     // Uncomment to enable 3D-Secure
  //     Config::$is3ds = true;

  //     // Required
  //     $transaction_details = array(
  //     'order_id' => $data['order_id'],
  //     // 'order_id' => rand(),
  //     'gross_amount' => $data['total'], // no decimal allowed for creditcard
  //     );

  //     // Optional
  //     $item1_details = array(
  //     'id' => $data['product_id'],
  //     'price' => intval($data['total_harga']),
  //     'quantity' => 1,
  //     'name' => $data['desc_product']
  //     );

  //   // Optional
  //   $item_details = array ($item1_details);

  //   // Optional
  //   $billing_address = array(
  //   'first_name'    => $data['firstname'],
  //   'last_name'     => $data['lastname'],
  //   'address'       => $data['alamat'],
  //   'city'          => $data['city'],
  //   'postal_code'   => $data['postal'],
  //   'phone'         => $data['phone'],
  //   'country_code'  => 'IDN'
  //   );

  //   $enable_payments = array('bank_transfer');

  //   // Fill SNAP API parameter
  //   $params = array(
  //   'enabled_payments' => $enable_payments,
  //   'transaction_details' => $transaction_details,
  //   'customer_details' => $billing_address,
  //   'item_details' => $item_details,
  //   );

  //   try {
  //     // Get Snap Payment Page URL
  //     $paymentUrl = Snap::createTransaction($params)->redirect_url;
    
  //     // Redirect to Snap Payment Page
  //     return $paymentUrl;
  //   }
  //   catch (Exception $e) {
  //     return $e->getMessage();
  //   }
  // }

  // Public function checkMidtransTransaksi($order_id)
  // { 
  //   $curl = curl_init();
  //   curl_setopt_array($curl, array(
  //     CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/".$order_id."/status",
  //     CURLOPT_CUSTOMREQUEST => "GET",
  //     CURLOPT_RETURNTRANSFER => "TRUE",
  //     CURLOPT_HTTPHEADER => array(
  //       "Authorization: Basic U0ItTWlkLXNlcnZlci00YzNYa2s5T04temlhdlphazRSbC1CdTA6"
  //     ),
  //   ));
  //     $response = curl_exec($curl);
  //     $data = json_decode($response, TRUE);
  //     // return $response;
  //     return $data;
  // }
}
?>