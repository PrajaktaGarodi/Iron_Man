<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>IRON MAN - Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icons.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">

    </div>
    <!-- partial:partials/_sidebar.html -->
    <!----Include side bar here---->
    <?php
    include('common/sidebar.php');
    
    if(isset($_GET['done_id']))
    {
        $id = $_GET['done_id'];
        $query = "UPDATE clothes SET status = 'Done' WHERE id = $id";

        if(mysqli_query($conn, $query))
        {
            echo "<script>alert('Cloth marked as done successfully.'); window.location.href='cloths.php';</script>";
        }
        else
        {
            echo "<script>alert('Failed to mark cloth as done.'); window.location.href='cloths.php';</script>";
        }

    }
    ?>

    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">


        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All Cloths</h4>
                <!-- <p class="card-description"> Add class <code>.table</code> -->
                </p>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Customer Name</th>
                        <th>Date Cloths Given</th>
                        <th>Number of Cloths</th>
                        <th>Number of Cloths Done</th>
                        <th>Total Income</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <!-- <td><label class="badge badge-success">Completed</label></td> -->
                    <!-- <td><label class="badge badge-danger">Pending</label></td> -->
                    <!-- <td><label class="badge badge-info">Fixed</label></td> -->
                    <!-- <td><label class="badge badge-warning">In progress</label></td> -->
                    <!-- <td><label class="badge badge-warning">In progress</label></td> -->
                    <tbody>

                      <?php

                      $sql = "SELECT * FROM clothes";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>

                          <tr>
                            <td><?php echo $row['customer_name']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['cloth_count']; ?></td>
                            <td><?php echo $row['cloths_done']; ?></td>
                            <td><?php echo $row['total_income']; ?></td>
                            <td>
                              <?php
                              if ($row['status'] == "Pending") {
                                echo "<label class='badge badge-warning'>Pending</label>";
                              } elseif ($row['status'] == "Done") {
                                echo "<label class='badge badge-success'>Completed</label>";
                              } 
                              ?>
                            </td>
                            <td>
                              
                              <a href="cloths.php?done_id=<?php echo $row['id'] ?>" class="p-1" data-bs-toggle="tooltip" title="Complete" ><i class="text-success mdi mdi-check-all"></i></a>
                            </td>
                          </tr>


                      <?php
                        }
                      } else {
                        echo "<tr><td colspan=6>No Cloths Pending</td></tr>";
                      }


                      ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>


      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <?php
      include('common/footer.php');
      ?>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/chart.umd.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/proBanner.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>

</html>