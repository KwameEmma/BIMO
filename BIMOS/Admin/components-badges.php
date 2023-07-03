<?php
  // Start the session
  session_start();

  // include connection to the database
  include "connection.php";

  // Set a session variable
  $email = $_SESSION["email"];

  // Use a prepared statement to prevent SQL injection
  $stmt = mysqli_prepare($con, "SELECT * FROM admin_tbl WHERE email = ?");
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if(mysqli_num_rows($result) > 0) {
      // Retrieve the data
      $row = mysqli_fetch_assoc($result);
      // Access the data
    //  echo $row['course'];
      // echo $row['fullname'];
      // echo $row['image'];
      // exit();

  } else {
      echo "No results found";
  }

?>
<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
  document.oncontextmenu = function() {
    return false;
    //This line of code prevent rightclick on the screen so you can't view page source. Try it
  }
</script>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BIMO ADMIN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block">BIMO Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

      
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="images/<?= $row['image'];?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $row['fullname'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $row['fullname'];?></h6>
              <span><?= $row['email'];?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="dashboard.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="components-alerts.php">
          <i class="bi bi-circle"></i><span>Courses</span>
        </a>
      </li>
      <li>
        <a href="components-accordion.php">
          <i class="bi bi-circle"></i><span>Trainers</span>
        </a>
      </li>
      <li>
      <li>
        <a href="components-badges.php" class="active">
          <i class="bi bi-circle"></i><span>Trainees</span>
        </a>
      </li>
      <li>
        <a href="components-breadcrumbs.php">
          <i class="bi bi-circle"></i><span>Price</span>
        </a>
      </li>
      <li>
        <a href="components-buttons.php">
          <i class="bi bi-circle"></i><span>Services</span>
        </a>
      </li>
      <li>
        <a href="components-cards.php">
          <i class="bi bi-circle"></i><span>View Pictures</span>
        </a>
      </li>
      <li>
        <a href="components-carousel.php">
          <i class="bi bi-circle"></i><span>View Videos</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->
  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="register.html">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li>
  <!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Logout</span>
    </a>
  </li><!-- End Login Page Nav -->

  </ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Trainees</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Components</li>
          <li class="breadcrumb-item active">Trainees</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  <section class="section">
       <!-- Disabled Backdrop Modal -->
       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop" style="position: relative; left: 70%; bottom: 10px;">
       Add Trainee
      </button>
      <center>
        <!-- Table -->
       <div class="container card" style = "width: 100%;">
        <h5 class="card-title" style = "width: 100%;">Trainees Table</h5>

        <!-- Table with stripped rows -->
        <table id="example" class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Image</th>
              <th scope="col">Trainee Name</th>
              <th scope="col">Contact</th>
              <th scope="col">Gender</th>
              <th scope="col">Course</th>
              <th scope="col">Location</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              //Pagination for a page
                  // Establish a database connection
                  include "connection.php";

                  // Define the number of records to display per page
                  $records_per_page = 3;

                  // Get the current page number from the URL
                  $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                  // Calculate the offset for the SQL query
                  $offset = ($current_page - 1) * $records_per_page;

                  // Retrieve the total number of records in the database
                  $total_records_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM student_tbl");
                  $total_records = mysqli_fetch_assoc($total_records_query)['total'];

                  // Calculate the total number of pages
                  $total_pages = ceil($total_records / $records_per_page);

                  // Retrieve the records for the current page
                  $records_query = mysqli_query($con, "SELECT * FROM student_tbl LIMIT $offset, $records_per_page");
                  $counter = 0;
                 while($row = mysqli_fetch_array($records_query,MYSQLI_ASSOC)){

                    // $id = encryptor('encrypt',$id = $row['id']);
                     $counter++;
                     $sid = $row['sid'];
                     $fullname = $row['fullname'];
                     $contact = $row['contact'];
                     $gender = $row['gender'];
                     $course = $row['course'];
                     $location = $row['location'];
                     $image = $row['image'];

                    echo "<tr class='btnv'>
                    <td>$counter</td>
                    <td><img src = '../studentimage/$image' style = 'width: 80%; height: 70px; border-radius: 100%;'></td>
                    <td>$fullname</td>
                    <td>$contact </td>
                    <td>$gender</td>
                    <td>$course</td>
                    <td>$location</td>
                    <td>
                    <a href= 'deletetraineer.php?sid=$sid'>
                    <input type = 'submit' value = 'Delete' class = 'btn btn-outline-danger' style = 'margin: 3px;'>
                    </a>
                    </td>
                    </tr>";
                  }
            ?>
           
          </tbody>
        </table>
        <!-- End Table with stripped rows -->
        <?php
                // Display the pagination links
                echo '<nav aria-label="Page navigation" style="margin-bottom: 8px;"';
                echo '<ul class="pagination">';

                // Previous page link
                if ($current_page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page - 1) . '">Previous</a></li>';
                }

                // Page numbers
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<li class="page-item' . ($current_page == $i ? ' active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }

                // Next page link
                if ($current_page < $total_pages) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page + 1) . '">Next</a></li>';
                }

                echo '</ul>';
                echo '</nav>';

                // Close the database connection
                mysqli_close($con);

            ?>
    </div>
    </center>
  </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Zazzey</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#">Amani Studios</a>
    </div>
  </footer><!-- End Footer -->

<div class="">
    <div class="card-body">
      <form action="usersserver.php" method="POST" enctype="multipart/form-data">
      <h5 class="card-title">Add Trainee</h5>
     
      <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Trainee</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control" name="fullname" placeholder="Fullname" required><br>
              <input type="text" class="form-control" name="contact" placeholder="User Contact" required><br>
              <input type="date" class="form-control" name="gender" placeholder="Date of Birth" required><br>
              <input type="course" class="form-control" name="course" placeholder="course" required><br>
              <input type="password" class="form-control" name="password" placeholder="Password" required><br>
              <input type="file" class="form-control" name="filename" required><br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div><!-- End Disabled Backdrop Modal-->
    </form>
  </div>
</div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-contact-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>