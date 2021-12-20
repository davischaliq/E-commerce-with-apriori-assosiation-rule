<?php
use Phpml\Association\Apriori;
class mining extends Controller
{
  private $associator;
  Public function __construct($data=[], $labels=[], $support = 0.3, $confidence = 0.7)
  {
      $support = intval($support) / 100;
      $confidence = intval($confidence) / 100;
    $this->associator = new Apriori($support, $confidence);
  }
  Private function caridata()
  {
    $data_item = $this->model('aprioriModel')->data();
    $arr = [];
    for ($i = 0; $i < count($data_item); $i++) {
      $ar = [];
      $val = explode(",", $data_item[$i]["item"]);
    for ($j = 0; $j < count($val); $j++) {
      $ar[] = $val[$j];
    } 
    array_push($arr, $ar);
    }
    return $arr;
  }
  Public function start($support, $confidence){
    $support = intval($support) / 100;
    $confidence = intval($confidence) / 100;
    $data = $this->caridata();
    $this->traindata($data);
    // $length = $this->getLength();
    $rules = $this->Rules();
    for ($i=0; $i < count($rules); $i++) { 
      $consecuent[$i] = implode('=>', $rules[$i]['consequent']);
      $antecedent[$i] = implode('=>', $rules[$i]['antecedent']);
      if ($rules[$i]['support'] >= $support) {
        $frequensi[$i] = array('item'=>$consecuent[$i], 'support'=>$rules[$i]['support'], 'keterangan'=>'Lolos');
      }else {
        $frequensi[$i] = array('item'=>$consecuent[$i], 'support'=>$rules[$i]['support'], 'keterangan'=>'Gagal');
      }
      if ($rules[$i]['confidence'] >= $confidence) {
        $kombinasi[$i] = array('kombinasi'=>$antecedent[$i], 'confidence'=>$rules[$i]['confidence'], 'keterangan'=>'Lolos');
      }else {
        $kombinasi[$i] = array('kombinasi'=>$antecedent[$i], 'confidence'=>$rules[$i]['confidence'], 'keterangan'=>'Gagal');
      }
    }
    if ($frequensi != '' AND $kombinasi != '') {
      $this->TRUNCATE();
      for ($u=0; $u < count($frequensi); $u++) { 
          $inputfrequensi[$u] = $this->inputfrequensi($frequensi[$u]);
      }
      for ($p=0; $p < count($kombinasi); $p++) { 
          $inputkombinasi[$u] = $this->inputkombinasi($kombinasi[$p]);
      }
      $pesan = array('pesan'=>'Selesai melakukan proses mining', 'type'=>'success');
    }else {
      $pesan = array('pesan'=>'Gagal melakukan proses mining', 'type'=>'danger');
    }
    return $pesan;
  }
  Public function startpredict($param)
  {
    $this->model('aprioriModel')->TRUNCATEbelanjaan();
    // menyiapkan dataset
    $this->semuatransaksi();
    // mengambil dataset
    $data = $this->caridata();
    // traindataset
    $this->traindata($data);
    $prediksi = $this->predik($param);
    return $prediksi;
  }
  Private function semuatransaksi()
  {
      $this->model('OrderModel')->truncatebelanjaan();
      $databarang = $this->model('aprioriModel')->carisemuatransaksi();
      if ($databarang != '') {
          for ($i=0; $i < count($databarang); $i++) {
              $tobulus[$i] = $this->model('OrderModel')->belanjaan($databarang[$i]);
          }
      }
  }
  Public function traindata($arr){
    return $this->associator->train($arr, $labels=[]);
  }
  Public function getLength()
  {
    return $this->associator->apriori();
  }
  Public function Rules()
  {
    return $this->associator->getRules();
  }
  Public function predik($data)
  {
    return $this->associator->predict($data);
  }
  Public function TRUNCATE()
  {
    $this->model('aprioriModel')->TRUNCATErules();
    $this->model('aprioriModel')->TRUNCATEfrequensi();
  }
  Public function inputfrequensi($frequensi)
  {
    $inputfrequensi = $this->model('aprioriModel')->inputfrekuensi($frequensi);
    return $inputfrequensi;
  }
  Public function inputkombinasi($kombinasi)
  {
    $inputrules = $this->model('aprioriModel')->inputrules($kombinasi);
    return $inputrules;
  }
}
 