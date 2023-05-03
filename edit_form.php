<?php
session_start();
if (strlen($_SESSION['uid']) == "") {
  header('location:logout.php');
} else {

?>

  <?php
  include_once('function.php');
  $obj = new DB_con();
  $fetchdata = new DB_con();

  $user_id = $_SESSION['uid'];
  // for single user details 
  $cr_id = $_GET['id'];
  $sql = $obj->user_id($cr_id, $user_id);
  $count_cr_data = mysqli_num_rows($sql);
  if($count_cr_data < 1){
    echo "<script>alert('Invalid ID. Please try again');</script>";
    echo "<script>window.location.href='dashboard.php'</script>";
  }else{
    $user = mysqli_fetch_array($sql);
  }

  $diff = $obj->get_balance($user_id);
  // end single iser details 
  if (isset($_POST['update'])) {
    // get the value 
    $certi_no = $_POST['certi_no'];
    $type = $_POST['type'];
    if ($type == 'One') {
      $national_id = $_POST['national_id'];
    } else {
      $national_id = $_POST['birth_id'];
    }
    $passport_no = $_POST['passport_no'];
    $nationality = $_POST['nationality'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $d = $_POST['date_birth'];
    $date_birth = date('Y-m-d', strtotime($d));
    //for dose 
    $doseone_date = date('Y-m-d', strtotime($_POST['doseone_date']));
    $doseone_name = $_POST['doseone_name'];

    $dosetwo_date = date('Y-m-d', strtotime($_POST['dosetwo_date']));
    $dosetwo_name = $_POST['dosetwo_name'];

    $d3 = $_POST['dosethree_date'];
    $dosethree_date = date('Y-m-d', strtotime($d3));
    $dosethree_name = $_POST['dosethree_name'];

    $vacc_center = $_POST['vacc_center'];
    $vacc_by = $_POST['vacc_by'];
    $total_dose = $_POST['total_dose'];
    //update database
    $result = $obj->update_submission($certi_no, $type, $national_id, $passport_no, $nationality, $name, $gender, $date_birth, $doseone_date, $doseone_name, $dosetwo_date, $dosetwo_name, $dosethree_date, $dosethree_name, $vacc_center, $vacc_by, $total_dose, $user['id']);
    if ($result) {
      echo "<script>alert(' Your Card successfully Updated.');</script>";
    } else {
      echo "something is problem ";
    }
  }
  ?>

  <?php include('includes/head.php');
  ?>

  <main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Edit Card</h5>


              <div class="container mt-3">
                <p>
                  <?php
                  if ($diff > 40) {
                    echo " ";
                  } else {
                    echo ' <div class="alert alert-danger">
   <strong>Sorry !</strong> You  do not have enough balance.
 </div>';
                  }

                  ?>

                </p>

                <form action="" method="post">
                  <div class="row">

                    <div class="col-md-6">
                      <h4> Beneficiary Information </h4>
                      <div class="mb-3 mt-3">
                        <label>Certificate No :</label>
                        <input type="text" class="form-control" value="<?php echo $user['certi_no'] ?>" name="certi_no">
                      </div>

                      <?php
                      $type = $user['type'];
                      ?>
                      <div class="mb-3">
                        <label> Choose any :</label>
                        <input type="radio" name="type" value="One" <?php if ($type == 'One') echo 'checked'; ?> /> NID No.
                        <input type="radio" name="type" value="Two" <?php if ($type == "Two") echo 'checked'; ?> /> Birth No.
                      </div>

                      <?php
                      if ($type == 'One') { ?>
                        <div class="mb-3 myDiv" id="showOne">
                          <label>National ID :</label>
                          <input type="text" class="form-control" value="<?php echo $user['national_id']; ?>" name="national_id">
                        </div>

                      <?php  } else { ?>
                        <div class="mb-3 myDiv" id="showTwo">
                          <label> Birth No:</label>
                          <input type="text" class="form-control" value=" <?php echo $user['national_id']; ?>" name="birth_id">
                        </div>
                      <?php
                      }
                      ?>






                      <div class="mb-3 mt-3">
                        <label>Passport No.:</label>
                        <input type="text" class="form-control" value="<?php echo $user['passport_no'] ?>" name="passport_no">
                      </div>



                      <div class="mb-3">
                        <label>Nationality:</label>
                        <select class="form-select" name="nationality">
                          <option value="Bangladeshi">Bangladeshi</option>
                          <option value="India">India</option>

                        </select>
                      </div>



                      <div class="mb-3 mt-3">
                        <label for="email">Name:</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $user['name'] ?>">
                      </div>



                      <div class="mb-3">
                        <label for="pwd">Date of Birth:</label>
                        <input type="text" class="form-control" id="dob" value="<?php echo date('d-m-Y', strtotime($user['date_birth'])); ?>" name="date_birth">
                      </div>

                      <div class="mb-3">
                        <label for="pwd">Gender:</label>
                        <select class="form-select" name="gender">
                          <option value="Male" <?php if ($user['gender'] == "Male") echo 'selected="selected"'; ?>>Male</option>
                          <option value="Female" <?php if ($user['gender'] == "Female") echo 'selected="selected"'; ?>>Female</option>

                        </select>
                      </div>

                    </div>
                    <div class="col-md-6">
                      <h4> Vaccination Details </h4>

                      <div class="mb-3 mt-3">
                        <label>Date of vaccination (Dose 1):</label>
                        <input type="text" class="form-control" id="dose-1" value="<?php echo date('d-m-Y', strtotime($user['doseone_date'])); ?>" name="doseone_date">
                      </div>

                      <div class="mb-3">
                        <label> Name of vaccine:</label>
                        <input type="text" class="form-control" value="<?php echo $user['doseone_name'] ?>" name="doseone_name">

                        <!-- <select class="form-control" name="doseone_name" required="">

                          <option selected="" value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>

                          <option value="COVISHIELD">COVISHIELD (AstraZeneca) 1</option>

                          <option value="Moderna (Moderna)">Moderna (Moderna)</option>

                          <option value="Vero Cell (Sinopharm)">Vero Cell (Sinopharm)</option>

                          <option value="Janssen (Johnson &amp;">Janssen (Johnson &amp; Johnson) 1</option>

                        </select> -->
                      </div>

                      <div class="mb-3 mt-3">
                        <label>Date of vaccination (Dose 2):</label>
                        <input type="text" class="form-control" id="dose-2" value="<?php echo date('d-m-Y', strtotime($user['dosetwo_date'])); ?>" name="dosetwo_date">
                      </div>

                      <div class="mb-3">
                        <label> Name of vaccine:</label>
                        <input type="text" class="form-control" value="<?php echo $user['dosetwo_name'] ?>" name="dosetwo_name">
                        <!-- <select class="form-control" name="dosetwo_name" required="">
                          <option selected="" value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                          <option value="COVISHIELD">COVISHIELD (AstraZeneca) 1</option>
                          <option value="Moderna (Moderna)">Moderna (Moderna)</option>
                          <option value="Vero Cell (Sinopharm)">Vero Cell (Sinopharm)</option>
                          <option value="Janssen (Johnson &amp;">Janssen (Johnson &amp; Johnson) 1</option>

                        </select> -->
                      </div>


                      <div class="mb-3 mt-3">
                        <label>Date of vaccination (Dose 3):</label>
                        <input type="text" class="form-control" id="dose-3" value="<?php echo date('d-m-Y', strtotime($user['dosethree_date'])); ?>" name="dosethree_date">
                      </div>

                      <div class="mb-3">
                        <label> Name of vaccine:</label>
                        <input type="text" class="form-control" value="<?php echo $user['dosethree_name'] ?>" name="dosethree_name">
                        <!-- <select class="form-control" name="dosethree_name" required="">
                          <option selected="" value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                          <option value="COVISHIELD">COVISHIELD (AstraZeneca) 1</option>
                          <option value="Moderna (Moderna)">Moderna (Moderna)</option>
                          <option value="Vero Cell (Sinopharm)">Vero Cell (Sinopharm)</option>
                          <option value="Janssen (Johnson &amp;">Janssen (Johnson &amp; Johnson) 1</option>

                        </select> -->
                      </div>


                      <div class="mb-3 mt-3">
                        <label> vaccination Center:</label>
                        <input type="text" class="form-control" value="<?php echo $user['vacc_center'] ?>" name="vacc_center">
                      </div>

                      <div class="mb-3">
                        <label> vaccination By :</label>
                        <input type="text " class="form-control" value="<?php echo $user['vacc_by'] ?>" name="vacc_by">
                      </div>

                      <div class="mb-3">
                        <label> Total Dose Given :</label>
                        <input type="text " class="form-control" value="<?php echo $user['total_dose'] ?>" name="total_dose">
                      </div>


                      <input type="submit" name="update" class="btn btn-primary" value="update" />

                    </div>

                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include('includes/footer.php');
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script>
    $(document).ready(function() {
      $('input[type="radio"]').click(function() {
        var demovalue = $(this).val();
        $("div.myDiv").hide();
        $("#show" + demovalue).show();
      });


      $("#dob,#dose-1,#dose-2,#dose-3").datepicker({
        dateFormat: 'dd/mm/yy',
      });



    });
  </script>
<?php } ?>