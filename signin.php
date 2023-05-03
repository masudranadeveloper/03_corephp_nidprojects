<?php
session_start();
if(isset($_SESSION['uid'])) {
  header('location:create-nid.php');
}
// include Function  file
include_once('function.php');
// Object creation
$usercredentials = new DB_con();
if (isset($_POST['signin'])) {
  // Posted Values
  $uname = $_POST['username'];
  $pasword = md5($_POST['password']);
  //Function Calling
  $num = $usercredentials->signin($uname, $pasword);
  if ($num == 0) {
    // Message for unsuccessfull login
    echo "<script>alert('Invalid details. Please try again');</script>";
    echo "<script>window.location.href='signin.php'</script>";
  } else {
    $_SESSION['uid'] = $num['id'];
    $_SESSION['fname'] = $num['FullName'];
    $_SESSION['username'] = $uname;
    // For success
    echo "<script>window.location.href='create-nid.php'</script>";
  }
}
?>
<?php include('includes/head2.php');
?>


<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 needs-validation" novalidate action='' method="POST">

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" id="username" name="username" class="form-control" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="signin" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->

<?php include('includes/footer.php');
?>