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

  $diff = $obj->get_balance($user_id);


  $id =  $_SESSION['uid'];
  $username = $_SESSION['username'];

  if (isset($_POST['submit'])) {
    $deposit = $_POST['deposit'];
    $number = $_POST['number'];
    $txn_id = $_POST['txn_id'];

    $result = $obj->request_deposit($number, $txn_id, $deposit, $id, $username);
    if ($result) {
      echo "<script>alert('Recharge request send successfully. Wait for approve.');</script>";
    } else {
      echo "something went wrong ";
    }
  }




  ?>
  <?php include('includes/head.php');
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Recharge</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Recharge</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center card-title col-sm-10 col-md-8 mx-auto align-center text-center">সর্বনিম্ন রিচার্জ 300 টাকা <br>
রিচার্জের জন্য সরাসরি বিকাশ র্মাচেন্ট পেমেন্ট করুন (<a href="https://shop.bkash.com/minti-store01307955197/paymentlink">  Click Bkash  Payment </a>) </br>   টাকা পাঠিয়ে transaction ID. এবং আপনার বিকাশ নাম্বার,নিচের খালি বক্সে বসিয়ে সাবমিট করবেন ধন্যবাদ ।  <br><br> আমাদের আরো রয়েছে। Nid Auto Make Server <a href="https://firefoxpk.com/login.php">  Visit firefoxpk.com </a> </h5>

              <table class="table table-bordered">

                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-5">
                      <h4> Recharge Balance </h4>
                      <div class="mb-3 mt-3">
                        <label> bKash Number :</label>
                        <input type="number" class="form-control" name="number">
                      </div>

                      <div class="mb-3 mt-3">
                        <label> TXN id :</label>
                        <input type="text" class="form-control" name="txn_id">
                      </div>

                      <div class="mb-3 mt-3">
                        <label> Amount :</label>
                        <input type="number" class="form-control" name="deposit">
                      </div>

                      <input type="submit" name="submit" class="btn btn-primary" value="submit" />
                    </div>

                  </div>
                </form>

              </table>


              <div class="container">
                <div class="row">
                  <div class="col-sm-2">
                  </div>
                  <div class="col-md-8">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> User ID </th>
                          <th> Username</th>
                          <th> Deposit</th>
                          <th> Date</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = $obj->get_deposit($id);
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                          <tr>
                            <td> <?php echo $row['id']; ?> </td>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['deposit']; ?></td>
                            <td><?php echo $row['date']; ?></td>

                          </tr>
                        <?php
                          $cnt = $cnt + 1;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>









            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include('includes/footer.php');
  ?>
<?php } ?>