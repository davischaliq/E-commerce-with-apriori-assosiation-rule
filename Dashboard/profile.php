<?php 
include_once dirname(dirname(__FILE__)) . "/app/views/template/header.php";

if (!isset($_SESSION['user'])) {
  header('Location: ' . BASEURL);
}

?>
 
 
<main id="main">
<?php 
  $pp = new dashboard();
  $data = $pp->Profile();
  // var_dump($data['Profile']);
?>
<section class="inner-page">
  <div class="container" data-aos="fade-up">
  <div class="row">
  <div class="media mt-5 border-ebook">
        <?php if ($data['Profile']['img'] != 'NULL') : ?>
          <img class="rounded align-self-start mr-3" width="200" src="<?= BASEURL;?>assets/img/users/pp/<?= $data['Profile']['img']; ?>" alt="Generic placeholder image">
          <?php else : ?>
            <img class="rounded align-self-start mr-3" width="200" src="<?= BASEURL;?>assets/img/icons/pp/pp.png">
        <?php endif; ?>
      <div class="media-body media-Ebook">
        <h4 class="mt-0"><?= $data['Profile']['firstname'].' '.$data['Profile']['lastname']; ?></h4>
        <?php if ($data['Profile']['alamat'] != 'NULL') : ?>
          <h5 class="mt-4"><?= $data['Profile']['alamat']?></h5>
        <?php else : ?>
          <h5 class="mt-4">Alamat:</h5>
       <?php endif; ?>
        <?php if (isset($data['provinsi']) && isset($data['city'])) : ?>
          <h5 class="mt-4"><?= $data['provinsi'] ?>, <?= $data['city'] ?></h5>
          <?php else : ?>
            <h5 class="mt-4">Provinsi:  , kota:   .</h5>
        <?php endif; ?>
        <?php if ($data['Profile']['postal'] != 'NULL') : ?>
          <h5 class="mt-4"><?= $data['Profile']['postal']?></h5>
        <?php else : ?>
          <h5 class="mt-4">Postal:</h5>
       <?php endif; ?>
       <?php if ($data['Profile']['country'] != 'NULL') : ?>
          <h5 class="mt-4"><?= $data['Profile']['country']?></h5>
        <?php else : ?>
          <h5 class="mt-4">Negara: </h5>
       <?php endif; ?>
      </div>
    </div>
    </div>

    <div class="row mt-5 mb-5">
        <nav class="container-fluid">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="nav-profile-tab" data-toggle="tab" href="#navProfile" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="nav-campaign-tab" data-fix="<?= $username = base64_encode($_SESSION['user']); ?>" data-toggle="tab" href="#navCampaign" role="tab" aria-controls="nav-campaign" aria-selected="false">Pesanan</a>
            </li>
          </ul>
          </nav>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="navProfile" role="tabpanel" aria-labelledby="navprofile-tab">
            <div class="row p-3">
                <div class="container">
                <?php 
                flash::showflash();
                 ?>
                </div>
              </div>
              <div class="row">
              <form class="mx-auto p-4" action="<?= BASEURL; ?>edit/edit.php?PPusers" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <div class="row">
                      <h3 class="ml-4">Edit Profile</h3></div>
                   </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">First Name</label>
                      <input type="text" name="firstname" class="form-control" id="inputFirstname">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Last Name</label>
                      <input type="text" name="lastname" class="form-control" id="inputLastname">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-5">
                      <label for="inputState">Provinsi</label>
                      <select id="provinsi" name="provinsi" class="form-control">
                        <option value="" selected>Pilih provinsi anda tinggal...</option> 
                        <?php for ($i=0; $i < count($data['allprovinsi']); $i++) { ?>
                        <option value="<?= base64_encode($data['allprovinsi'][$i]['province_id']) ?>"><?= $data['allprovinsi'][$i]['province'] ?></option>
                        <?php  }?>
                      </select>
                    </div>
                    <div class="form-group col-md-5">
                      <label for="inputState">Kota</label>
                      <select id="city" name="kota" class="form-control">
                        <option value="" selected>Pilih kota tujuan....</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputZip">Zip</label>
                      <input type="text" name="postal" class="form-control" id="inputZip">
                    </div>
                  </div>
                  <div class="form-group mb-3">
                  <label for="inputState">Photo Profile</label>
                    <div class="custom-file">
                      <input type="file" name="pp" class="custom-file-input" id="inputGroupFile01"/>
                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                      </div>
                      </div>
                  <button type="submit" class="mt-3 btn btn-primary rounded text-white">Save</button>
              </form>
              </div>
            </div>
            <div class="tab-pane fade" id="navCampaign" role="tabpanel" aria-labelledby="nav-campaign-tab">
              <!-- <div class="container"> -->
                <div class="row" id="campaign">

                </div>
              <!-- </div> -->
            </div>
              <!-- Modal details order -->
            <div class="modal fade" id="detailpesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Biling Address</h5>
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

        <!-- Modal Rating Product -->
        <div class="modal fade" id="ratingmodal">
          <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Rate product ini</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <div class="modal-body">
      <div class="p-3">
            <div class="form-group">
              <label for="exampleInputName">Full Name</label>
              <input type="text" class="form-control" name="fullname" id="fullname" data-id="0" placeholder="Full Name">
            </div>
            <div class="form-group">
            <i class="fas fa-star star-light submit_star" id="submit_star_0" data-rating="1"></i>
						<i class="fas fa-star star-light submit_star" id="submit_star_1" data-rating="2"></i>
						<i class="fas fa-star star-light submit_star" id="submit_star_2" data-rating="3"></i>
						<i class="fas fa-star star-light submit_star" id="submit_star_3" data-rating="4"></i>
						<i class="fas fa-star star-light submit_star" id="submit_star_4" data-rating="5"></i>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Your Comment</label>
              <textarea class="form-control" name="comment" id="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          </div>
            </div>
              </div>
                  </div>
                </section>
              </main>
            <script src="<?= BASEURL?>assets/js/loadcity.js"></script>
            <script>
              $(document).ready(function(){
                    $('#nav-campaign-tab').click(function(){
                      $('#campaign').html('');
                        $('#campaign').html('<div class="spinner-border text-danger" role="status" style="margin: 50px 200px 50px 50px;"><span class="sr-only">Loading...</span></div>');
                      var fix = $('#nav-campaign-tab').data('fix');
                      $.ajax({
                        url: "http://localhost/joki-nana/edit/edit.php?orderuser",
                        method: "POST",
                        dataType: "json",
                        data: {sending:fix},  
                        success:function(data){
                          // console.log(data); 
                          var string = '<div class="row">'; 
                          if (data != '') {
                            $.each(data, function(index, item) {
                                string += '<div class="col p-5">';
                                string += '<div class="card single-product" style="width: 16rem;">';
                                string += '<img class="card-img-top product-img" src="<?= BASEURL; ?>assets/img/products/'+ item.gambar +'" alt="Card image cap">';
                                string += '<div class="product-content">';
                                string += '<h6 class="card-title">';
                                string += item.judul;
                                string += '</h6>';
                                if (item.warna == 'NULL') {
                                  
                                }else {
                                  string += '<p class="card-text">';
                                  string += 'Warna : '+item.warna;
                                  string += '</p>';
                                }

                                if (item.ukuran == 'NULL') {
                                  
                                }else {
                                  string += '<p class="card-text">';
                                  string += 'Ukuran : '+item.ukuran;
                                  string += '</p>';
                                }
                                string += '<p class="card-text">';
                                string += 'Quantity : '+item.qty;
                                string += '</p>';
                                string += '<p class="card-text">';
                                string += 'Total Harga : '+new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(item.harga);
                                string += '</p>';
                                string += '<p class="card-text">';
                                string += 'Payment : '+item.payment;
                                string += '</p>';
                                string += '<p class="card-text">';
                                string += 'Status : '+item.status;
                                string += '</p>';
                                string += '<p class="card-text">';
                                string += '<button class="btn btn-primary rounded text-white" data-order="'+ item.orderid +'" id="showmodal">Billing address</button>';
                                string += '</p>';
                                if (item.status == 'Sampai tujuan') {
                                string += '<p class="card-text">';
                                string += '<button class="btn btn-success rounded text-white p-3" data-id="'+ item.id +'" id="giverate">Beri nilai product</button>';
                                string += '</p>';
                                }
                                string += '</div>';
                                string += '</div>';
                                string += '</div>'; 
                            })
                            string += '</div>';
                          }else{
                            string += '<div class="card mx-auto text-center" style="width: 1200px;">';
                            string += '<div class="card-body">';
                            string += '<h5 class="card-title">Anda belum terlibat dalam kolaborasi event</h5>';
                            string += '</div>';
                            string += '</div>';
                          }
                          setTimeout(function(){
                            $('#campaign').html('');
                            $('#campaign').append(string);
                          }, 5000);
                        }
                      })
                    })
                 })


                 $(document).on('click', '#showmodal', function(){
                  $('#detailpesanan').modal('show');
                    $('#modalpesanan').html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>');
                    var orderid = $(this).attr('data-order');
                    $.ajax({  
                      url: "http://localhost/joki-nana/edit/edit.php?orderdetail",
                      method: "POST",
                      data: {orderid:orderid}, 
                      success:function(data){ 
                        setTimeout(function(){
                          $('#modalpesanan').html('');
                          $('#modalpesanan').html(data);
                          }, 5000);
                      }
                    });
                  })
            </script>
            <script src="<?= BASEURL ?>assets/js/rating.js" type="text/javascript"></script>
<?php 

include_once dirname(dirname(__FILE__)) . "/app/views/template/footer.php";

?>
<!-- End #main -->