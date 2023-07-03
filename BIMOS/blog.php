<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
document.oncontextmenu = function() {
    return false;
}
</script>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BIMOS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/tescon.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/tescon.png" alt="" class="img-fluid"></a> -->

      <h1 class="logo me-auto"><a href="index.php">BIMO</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>

          <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.php">Services</a></li>
              <li><a href="team.html" class="active">Team</a></li>
              <li><a href="testimonials.html">Testimonials</a></li>

              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>          
          <li><a href="portfolio.html">Gallery</a></li>
          <li><a href="team.html">Installer</a></li>
          <li><a href="video.php">Videos</a></li>
          <li><a href="team.html">School</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Tescon</span></h2>
              <p class="animate__animated animate__fadeInUp"> Advocate for rule of law in the country with particular reference to
                issues militating against the economy,social, governance and general public.</p>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/4.jpeg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Co-operation understanding and friendship.</h2>
              <p class="animate__animated animate__fadeInUp">Promote cooperation understanding and friendship among other institutions.</p>
              <a href="about.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/5.jpeg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Common forum for the discussion of problems.</h2>
              <p class="animate__animated animate__fadeInUp">Offer a common forum for the discussion of problems affecting students
                especially(Tesconians) and generally to develop a spirit of solidarity among students.</p>
              <a href="about.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry" style="margin-bottom: 15px;">
              <?php
              include "connection.php";
              // Define how many results per page to display
          $results_per_page = 4;

          // Retrieve total number of records
          $sql = "SELECT COUNT(*) AS count FROM blog_tbl";
          $result = mysqli_query($con, $sql);
          $row = mysqli_fetch_assoc($result);
          $total_records = $row['count'];// thats fine

          // Calculate total number of pages
          $total_pages = ceil($total_records / $results_per_page);

          // Get current page number
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

          // Calculate offset for current page
          $offset = ($current_page - 1) * $results_per_page;

          // Retrieve records for current page
          $sql = "SELECT * FROM blog_tbl LIMIT $offset, $results_per_page";
          $result = mysqli_query($con, $sql);

          // Display records
          while ($row = mysqli_fetch_assoc($result)) {
              // Display record details here
          }

              $result = mysqli_query($con, "SELECT * FROM blog_tbl");
              $counter = 0;
                 while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                     $counter++;
                     $id = $row['id'];
                     $title = $row['title'];
                     $date = $row['date'];
                     $blog = $row['blog'];
                     $image = $row['image'];

               ?>
              <div class="row">

              </div>

              <div class="entry-img">
                <img src="Admin/blogimage/<?=$image?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.php?id=<?=$id?>"><?=$title?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <!-- <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li> -->
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.php?id=<?=$id?>"><?=$date?></a></li>
                  <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> -->
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  <?=$blog?>
                </p>
                <div class="read-more">
                  <a href="blog-single.php?id=<?=$id?>">Read More</a>
                </div>

              </div><br><br>
              <?php
            }
               ?>
            </article>
            <!-- End blog entry -->


            <!--some demo pagin-->

        <div class="col-md-12 d-flex justify-content-center">
              <?php
          $limit = 4;
          $total_records = $total_records;
          
          $total_pages = ceil($total_records / $limit);
          /* echo  $total_pages; */
          $pagLink = "<ul'>";

          $page = $_GET['page'] ? $_GET['page'] : $page = 1;

          $Next = $page + 1;

          $Previous = $page - 1;

          if($page == $total_pages){
            $Next = $total_pages;
          }

          if($page == 1){
            $Previous = 1;
          }

          echo $pagLink . "<li'><a class='page-link' href='blog.php?page=$Previous'><input type = 'button' class = 'btn btn-danger' value = 'Prev'></a></li>";

          for ($btn=1; $btn<=$total_pages; $btn++) {

            if($btn == $page){

                $pagLink .= "<li'><a class='page-link'  style='background-color:#aaa;color:white' href='blog.php?page=".$btn."'>".$btn."</a></li>";

            }else{

                $pagLink .= "<li'><a class='page-link btn btn-danger' href='blog.php?page=".$btn."'>".$btn."</a></li>";

            }

          }

          echo $pagLink . "<li'><a class='page-link' href='blog.php?page=$Next'><input type = 'button' class = 'btn btn-danger' value = 'Next'></a></li></ul>";
          ?>
        </div>

          <!---->

          </div><!-- End blog entries list -->

      <div class="col-lg-4">

        <div class="sidebar">

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <div class="row">
                  <?php
                  include "connection.php";
                   // Define how many results per page to display
          $results_per_page = 4;

          // Retrieve total number of records
          $sql = "SELECT COUNT(*) AS count FROM blog_tbl";
          $result = mysqli_query($con, $sql);
          $row = mysqli_fetch_assoc($result);
          $total_records = $row['count'];// thats fine

          // Calculate total number of pages
          $total_pages = ceil($total_records / $results_per_page);

          // Get current page number
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

          // Calculate offset for current page
          $offset = ($current_page - 1) * $results_per_page;

          // Retrieve records for current page
          $sql = "SELECT * FROM blog_tbl LIMIT $offset, $results_per_page";
          $result = mysqli_query($con, $sql);

          // Display records
          while ($row = mysqli_fetch_assoc($result)) {
              // Display record details here
          }

                  $result = mysqli_query($con, "SELECT * FROM blog_tbl");
                  $counter = 0;
                     while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                         $counter++;
                         $id = $row['id'];
                         $title = $row['title'];
                         $date = $row['date'];
                         $blog = $row['blog'];
                         $image = $row['image'];

                   ?>
                   <div class="post-item clearfix">
                     <img src="Admin/blogimage/<?=$image?>" alt="">
                     <h4><a href="blog-single.php?id=<?=$id?>"><?=$title?></a></h4>
                     <time datetime="2020-01-01"><?=$date?></time>
                   </div>

                   <?php
                 }
                    ?>
                </div>
                
              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

            <div class="col-md-12 d-flex justify-content-center">
              <?php
          $limit = 4;
          $total_records = $total_records;
          
          $total_pages = ceil($total_records / $limit);
          /* echo  $total_pages; */
          $pagLink = "<ul'>";

          $page = $_GET['page'] ? $_GET['page'] : $page = 1;

          $Next = $page + 1;

          $Previous = $page - 1;

          if($page == $total_pages){
            $Next = $total_pages;
          }

          if($page == 1){
            $Previous = 1;
          }

          echo $pagLink . "<li'><a class='page-link' href='blog.php?page=$Previous'><input type = 'button' class = 'btn btn-danger' value = 'Prev'></a></li>";

          for ($btn=1; $btn<=$total_pages; $btn++) {

            if($btn == $page){

                $pagLink .= "<li'><a class='page-link'  style='background-color:#aaa;color:white' href='blog.php?page=".$btn."'>".$btn."</a></li>";

            }else{

                $pagLink .= "<li'><a class='page-link btn btn-danger' href='blog.php?page=".$btn."'>".$btn."</a></li>";

            }

          }

          echo $pagLink . "<li'><a class='page-link' href='blog.php?page=$Next'><input type = 'button' class = 'btn btn-danger' value = 'Next'></a></li></ul>";
          ?>
        </div>

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
 <footer id="footer">
  <div class="footer-top bg-dark">
    <div class="container">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span style="color: red;">BIMOS</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="mailto:ezraboatengyeaboah1234@gmail.com">Zazzey</a>
        </div>
        <div class="social-links mt-3">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-whatsapp"></i></a>
        </div>
      </div>
    </div>
  </div>
 </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
