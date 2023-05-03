<?php $user_id = $_SESSION['uid'];
if ($user_id == 1) {

?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-heading">User Menu</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="create-nid.php">
          <i class=" bi-file-earmark-diff"></i>
          <span>Create New</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="recharge.php">
          <i class=" bi bi-currency-exchange"></i>
          <span>Recharge</span>
        </a>
      </li>

      <li class="nav-heading">Admin Menu</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="recharge_requests.php">
          <i class=" bi bi-currency-exchange"></i>
          <span>Pending Recharge</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users.php">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li>

      <li class="nav-heading">Help</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="https://api.whatsapp.com/send/?phone=8801307955197&text&type=phone_number&app_absent=0">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log-out</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside>
<?php } else { ?>


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="create-nid.php">
          <i class=" bi-file-earmark-diff"></i>
          <span>Create New</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="recharge.php">
          <i class=" bi bi-currency-exchange"></i>
          <span>Recharge</span>
        </a>
      </li>

      <li class="nav-heading">Help</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="https://api.whatsapp.com/send/?phone=8801307955197&text&type=phone_number&app_absent=0">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log-out</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside>
<?php }?>
