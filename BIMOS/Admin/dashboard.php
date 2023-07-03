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
    //  echo $row['email'];
      // echo $row['fullname'];
      // echo $row['image'];
      // exit();

  } else {
      echo "No results found";
  }

?>

<?php
    // Start or resume the session 
    // Check if the user is logged in and the last activity time is set 
    if (isset($_SESSION['email']) && isset($_SESSION['last_activity'])) {     
    // Get the current timestamp     
    $current_time = time();  
    // Calculate the elapsed time since the last activity     
    $elapsed_time = $current_time - $_SESSION['last_activity'];     
    // Check if the elapsed time is greater than 30 minutes (in seconds)    
     $timeout = 1 * 60; // 30 minutes in seconds     
     if ($elapsed_time > $timeout) {         
        // User has been inactive for too long, log them out  

        session_unset();  // Unset all session variables         
        session_destroy();  // Destroy the session   

        // Redirect the user to the login page or any other desired page         
        header("Location: index.html");         
        exit();     
    }      
    // Update the last activity time to the current timestamp    
     $_SESSION['last_activity'] = $current_time; 
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

  <title>BIMO Admin</title>
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
  <!-- Toastr -->
  <link rel="stylesheet" href="toastr/build/toastr.css">
  <link rel="stylesheet" href="toastr/build/toastr.min.css">

  
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
            </li> -->
            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li> -->
            <li>
              <hr class="dropdown-divider">
            </li>

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
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
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
            <a href="components-badges.php">
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
          <li>
            <a href="charts-apexcharts.php">
              <i class="bi bi-circle"></i><span>Chart</span>
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

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li> -->
      <!-- End Error 404 Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li> -->
      <!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Trainees Card -->
            <div class="col-xxl-4 col-md-3">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Trainees</span></h5>
                  <?php
                    include "connection.php";
                    $result = mysqli_query($con, "SELECT * FROM student_tbl");
                    $ezra = mysqli_num_rows($result);

                    $percentage = 600;
                    $tina = $ezra;
                    $stud = ($tina / $percentage)*100;
                  ?>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $ezra;?></h6>
                      <span style="font-weight: bold; color: red;"><?=$stud?>%</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Trainees Card -->

            <!-- Trainers Card -->
            <div class="col-xxl-4 col-md-3">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Trainers</span></h5>
                  <?php
                    include "connection.php";
                    $result = mysqli_query($con, "SELECT * FROM trainner_tbl");
                    $ezra = mysqli_num_rows($result);

                    $percentage = 50;
                    $tina = $ezra;
                    $stud = ($tina / $percentage)*100;
                  ?>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $ezra;?></h6>
                      <span style="font-weight: bold; color: red;"><?=$stud?>%</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Trainers Card -->

             <!-- Courses Card -->
             <div class="col-xxl-4 col-md-3">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Courses</span></h5>
                  <?php
                    include "connection.php";
                    $result = mysqli_query($con, "SELECT * FROM courses_tbl");
                    $ezra = mysqli_num_rows($result);

                    $percentage = 10;
                    $tina = $ezra;
                    $stud = ($tina / $percentage)*100;
                  ?>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $ezra;?></h6>
                      <span style="font-weight: bold; color: red;"><?=$stud?>%</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Courses Card -->

            <!-- Videos Card -->
            <div class="col-xxl-4 col-md-3">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Videos</span></h5>
                  <?php
                    include "connection.php";
                    $result = mysqli_query($con, "SELECT * FROM video_tbl");
                    $ezra = mysqli_num_rows($result);

                    $percentage = 300;
                    $tina = $ezra;
                    $stud = ($tina / $percentage)*100;
                  ?>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-camera"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $ezra;?></h6>
                      <span style="font-weight: bold; color: red;"><?=$stud?>%</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Videos Card -->
            
    </section>
    
    <section class = "section">
      <center>
                  <!-- Table -->
          <div class="container card" style = "width: 100%;">
            <h5 class="card-title" style = "width: 100%;">Course Table</h5>

            <!-- Table with stripped rows -->
            <table id="example" class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Courses Name</th>
                  <th scope="col">Courses Duration</th>
                  <th scope="col">Courses Price</th>
                  <th scope="col">Student ID</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  //Pagination for a page
                  // Establish a database connection
                  include "connection.php";

                  // Define the number of records to display per page
                  $records_per_page = 5;

                  // Get the current page number from the URL
                  $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                  // Calculate the offset for the SQL query
                  $offset = ($current_page - 1) * $records_per_page;

                  // Retrieve the total number of records in the database
                  $total_records_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM courses_tbl");
                  $total_records = mysqli_fetch_assoc($total_records_query)['total'];

                  // Calculate the total number of pages
                  $total_pages = ceil($total_records / $records_per_page);

                  // Retrieve the records for the current page
                  $records_query = mysqli_query($con, "SELECT * FROM courses_tbl LIMIT $offset, $records_per_page");
                  $counter = 0;
                    while($row = mysqli_fetch_array($records_query,MYSQLI_ASSOC)){

                        // $id = encryptor('encrypt',$id = $row['id']);
                        $counter++;
                        $cid = $row['cid'];
                        $courses_name = $row['courses_name'];
                        $courses_duration = $row['courses_duration'];
                        $courses_price = $row['courses_price'];
                        $student_id = $row['student_id'];

                        echo "<tr class='btnv'>
                        <td>$counter</td>
                        <td>$courses_name</td>
                        <td>$courses_duration </td>
                        <td>$courses_price</td>
                        <td>$student_id</td>
                        <td>
                        
                        <input type = 'submit' value = 'View' class = 'btn btn-outline-secondary' style = 'margin: 3px;'>
                        <input type = 'submit' value = 'Edit' class = 'btn btn-outline-primary' style = 'margin: 3px;'>
                       <a href = 'dashboarddelete.php?cid=$cid'>
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
      &copy; Copyright <strong><span>Ezra</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#">Amani Studios</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- toastr JS -->
  <script src="toastr/build/toastr.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>