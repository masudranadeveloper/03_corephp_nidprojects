<?php
session_start();
if (strlen($_SESSION['uid']) == "") {
  header('location:logout.php');
} else {
?>

  <?php
  $user_id = $_SESSION['uid'];
  include_once('function.php');
  include('includes\charge.php');
  
  $obj = new DB_con();
  $fetchdata = new DB_con();


  $diff = $obj->get_balance($user_id);


  ?>
  <?php include('includes/head.php');
  ?>


<link rel="stylesheet" href="assets\mr\create_nid.css">

<div class="container" style="margin-top:5rem">

        <div class="ts-main-content mb-5">
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">NID BN</div>
                                        <div class="panel-body">
                                            <section class="bg-diffrent">
                                                <div style="padding: 2rem;">
                                                    <input type="hidden" name="_token" value="NFSY3z16x3NIoqlSUa5GeyTYBubibbD8buCJJGW7">
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-8">

                                                            <form enctype="multipart/form-data" id="myForm">
                                                                <div class="file-upload-contain">
                                                                    <div class="file-input theme-explorer-fas file-input-ajax-new">

                                                                        <div id="scrollAfterUpload" class="file-preview">
                                                                            <div class="file-drop-zone clickable">
                                                                                <div class="file-drop-zone-title">
                                                                                    <div class="upload-area">
                                                                                        <i class="far fa-images"></i>
                                                                                        <p>ব্রাউজ বা টেনে আনুন সাইন কপি পিডিএফ ফাইল</p>
                                                                                        <div><button type="button" class="btn btn-success">ব্রাউজ ফাইল</button></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <input style="opacity: 0" type="file" name="file" class="my_file">
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                    <form action="print-nid.php" method="POST">

                                                        <div>
                                                            <h3 style="text-align: center;">NID Info</h3>
                                                            <div class="row">
                                                                <div style="display: flex;align-items: center;justify-content: center;" class="col-6">
                                                                    <img id="profile_url" style="width:5rem;">
                                                                    <input type="hidden" name="nid_profile" id="hidden_nid_profile">
                                                                </div>
                                                                <div style="display: flex;align-items: center;justify-content: center;" class="col-6">
                                                                    <img id="sign_url" style="width:5rem;">
                                                                    <input type="hidden" name="nid_sign" id="hidden_nid_sign">
                                                                </div>

                                                                <div style="margin-bottom: 10px;" class="col-md-6 col-sm-4 mb-2">
                                                                    <label for="first" style="color: black;">NID Photo</label>
                                                                    <input id="profile" style="width: 100%;" type="file" name="nidphoto" class="form-control">
                                                                </div>
                                                                <div style="margin-bottom: 10px;" class="col-md-6 col-sm-4 mb-2">
                                                                    <label for="first" style="color: black;">NID Sign</label>
                                                                    <input id="sign" style="width: 100%;" type="file" class="form-control">
                                                                </div>
                                                                <!--  col-md-6   -->
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="first">Name (Bangla)</label>
                                                                        <input type="text" name="nameBangla" class="form-control" id="nameBangla">
                                                                    </div>
                                                                </div>
                                                                <!--  col-md-6   -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="last">Name (English)</label>
                                                                        <input type="text" name="nameEnglish" class="form-control" id="nameEnglish">
                                                                    </div>
                                                                </div>
                                                                <!--  col-md-6   -->
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="company">NID Number</label>
                                                                        <input type="text" class="form-control" id="nid" name="nid">
                                                                    </div>
                                                                </div>
                                                                <!--  col-md-6   -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="phone">PIN Number</label>
                                                                        <input type="text" class="form-control" name="pin" id="pin">
                                                                    </div>
                                                                </div>
                                                                <!--  col-md-6   -->
                                                            </div>
                                                            <!--  row   -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="email">Father Name</label>
                                                                        <input type="text" class="form-control" id="nameFather" name="nameFather">
                                                                    </div>
                                                                </div>
                                                                <!--  col-md-6   -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="url">Mother Name</label>
                                                                        <input type="text" class="form-control" name="nameMother" id="nameMother">
                                                                    </div>
                                                                </div>
                                                                <!--  col-md-6   -->
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="email">Birth Place</label>
                                                                        <input type="text" class="form-control" id="birthPlace" name="birthPlace">
                                                                    </div>
                                                                </div>
                                                                <!--  col-md-6   -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="url">Date Of Birth</label>
                                                                        <input type="text" class="form-control" id="dob" name="dob">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="url">Issue date</label>
                                                                        <input type="text" class="form-control" name="issued" value="<?php echo date('d/m/Y') ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="url">Blood Group</label>
                                                                        <input type="text" class="form-control" id="bloodGroup" name="bloodGroup">
                                                                    </div>
                                                                </div>
                                                                <!--  col-md-6   -->
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group"><label for="email">Full Address</label><textarea class="form-control" id="fulladdress" name="fulladdress" value="" rows="2"></textarea></div>
                                                                </div>
                                                            </div>
                                                            <!--  row   -->
                                                            <?php
                                                              if($diff > $charge){
                                                                ?>
                                                                  <div id="submit" style="width: 40%;" class="btn btn-success d-block m-auto mt-5">CREATE NID</div>
                                                                  <input type="submit" style="opacity:0" id="next_page">
                                                                <?php
                                                              }else{
                                                                ?>
                                                                <p class="text-danger mt-5 text-center">Please Recharge for create a nid card!</p>
                                                                <a href="recharge.php" style="width: 40%;" class="btn btn-success d-block m-auto">Recharge Now</a>
                                                                <?php
                                                              }
                                                            ?>

                                                        </div>
                                                    </form>
                                                </div>
                                            </section>
                                            <!-- Modal -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="display:none" class="hidden_wrapper">
            <div class="container_r">
                <img src="{{asset('images/icons/loadding.gif')}}" alt="">
            </div>
        </div>
        
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.min.js" integrity="sha512-Pv/SmxhkTB6tWGQWDa6gHgJpfBdIpyUy59QkbshS1948GRmj6WgZz18PaDMOqaEyKLRAvgil7sx/WACNGE4Txw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="assets\mr\create-nid.js"></script>


        <script>
          $('#submit').click(function(){
            $('#submit').html('Loadding...');
            $.ajax({
              "url" : "nid_charge.php",
              "method" : "POST",
              success:function(){
                $('#next_page').click();
                $('#submit').html('PROCCESSING...');
              }
            })
          });
        </script>


  <?php include('includes/footer.php');?>

<?php } ?>