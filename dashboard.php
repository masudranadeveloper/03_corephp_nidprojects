<?php
session_start();
if (!isset($_SESSION['uid'])) {
  header('location:signin.php');
} else {

  $user_id = $_SESSION['uid'];
  include_once("function.php");
  $fetchdata = new DB_con();
?>
  <?php include('includes/head.php');
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Submission List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Submission List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">My Submission List</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Nationality</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $result = $fetchdata->fetchdata($user_id);
                  $cnt = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <th scope="row"> <?php echo $row['id']; ?> </th>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo date('d/m/Y', strtotime($row['date_birth'])); ?></td>
                      <td><?php echo $row['nationality']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                      <td>

                        <a href="edit_form.php?id=<?php echo $row['id']; ?>" class="btn btn-success"> Edit </a>|

                        <a href="delete_list.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> Del</a>|
                        <a href="print-details.php?id=<?php echo $row['id']; ?>" class="btn btn-info"> Download </a>

                      </td>
                    </tr>
                  <?php
                    $cnt = $cnt + 1;
                  } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include('includes/footer.php');
  ?>
<?php } ?>