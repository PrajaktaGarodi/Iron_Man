<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>IRON MAN - Add Cloths</title>
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

    include("common/connection.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // include 'db_connection.php'; // Include database connection

      $date = $_POST['date'];
      $customerName = $_POST['customerName'] ?? null;
      $clothCount = intval($_POST['clothCount']);
      $costPerCloth = floatval($_POST['costPerCloth']);
      $totalAmount = floatval($_POST['totalAmount']);

      $sql = "INSERT INTO clothes (date, customer_name, cloth_count, cost_per_cloth, total_income) 
            VALUES (?, ?, ?, ?, ?)";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param('ssidd', $date, $customerName, $clothCount, $costPerCloth, $totalAmount);

      if ($stmt->execute()) {
        echo "<script>alert('Cloth Added Successfully');</script>";
      } else {
        http_response_code(500);
        echo "<script>alert('Error');</script>"; ;
      }
    }
    ?>

    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">

        <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Add Cloths</h4>
                <!-- <p class="card-description"> Basic form layout </p> -->
                <form id="addClothesForm" method="post">
                  <div class="form-group">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="customerName" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Optional">
                  </div>
                  <div class="form-group">
                    <label for="clothCount" class="form-label">Number of Clothes</label>
                    <input type="number" class="form-control" id="clothCount" name="clothCount" required>
                  </div>
                  <div class="form-group">
                    <label for="costPerCloth" class="form-label">Cost Per Cloth</label>
                    <input type="number" class="form-control" id="costPerCloth" name="costPerCloth" value="10" required>
                  </div>
                  <div class="form-group">
                    <label for="totalAmount" class="form-label">Total Amount</label>
                    <input type="number" class="form-control" id="totalAmount" name="totalAmount" readonly>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </form>
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
  <script src="/assets/js/add_cloth_js/script.js"></script>
  <!-- End custom js for this page -->
</body>

</html>