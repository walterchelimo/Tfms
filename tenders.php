


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Flattern - v4.7.0
  * Template URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">teafactory@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+254 721977429</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a  class="active" href="index.html">Tea Factory</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a   href="index.php">Home</a></li>
           <li class="dropdown"><a href="#"><span>About Us</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  
                  <li><a href="board.php">Board Of Directors</a></li>
                  
                </ul>
              </li>
           
                <li><a  href="teas.php">Our Teas</a></li>
           
          <li><a class="active" href="tenders.php">Tenders</a></li>
          <li><a href="newsevent.php">News & Events</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="login/login.php">Login</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header><!-- End Header -->

  <main id="main">

    
    <section id="breadcrumbs" class="breadcrumbs" style="background-color:forestgreen;">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Supply and Procurement Opportunities</h2>
        </div>
          

      </div>
    </section>
      
      <div class="row mt-5 mb-5" style="width:80%; margin-left:auto; margin-right:auto;">
      <div class="col-8">
          
          <div class="card p-3" style="border:none;">
              <div class="body">
                  <h4>TENDERS</h4><hr>
                  <?php
                  include "db.php";
                  
                  $sql="SELECT * FROM tenders ORDER BY dos DESC LIMIT 15";
                  $results=mysqli_query($conn,$sql);
                  if($results){
                      $data=mysqli_num_rows($results);
                      if($data>0){
                          
                          echo "<table class='table table-hover'>";
                          echo "<tr>";
                          echo "<th></th>";
                          echo "</tr>";
                          
                      }
                      while($row=mysqli_fetch_array($results)){
                          $tenderfile=$row['tenderfile'];
                          $filepath = "uploads/$tenderfile";
                                                    
                          echo "<tr>";
                          echo "<td>".$row['tender']."<br>".$row['dos']."</td>";
                          echo "<td><a class='m-2' href='$filepath?id=".$row['tender']."'><span style='color:forestgreen;' class='fa fa-arrow-down'></span></a></td>";
                          echo "</tr>";
                          
                    
                        
                          
                      }
                      echo "</a>";
                      echo "</table>";
                      
                  }
                  
                  
                  ?>
              <p><a href="newsevent.php"> <span style="color: black;">« Older Entries</span> </a></p>
              </div>
              
          
          </div>
          </div>
          <div class="col-4">
          
          <div class="card p-3" style="border:none;">
              <div class="body">
                  <h4>RECENT NEWS AND EVENTS</h4><hr>
                            <?php
include "db.php";
 $sql="SELECT * FROM news ORDER BY timestamp DESC LIMIT 3 ";
            $results=mysqli_query($conn,$sql);
            if($results){
            $data=mysqli_num_rows($results);
            if($data>0){
                echo "<table class='table table-hover'>";
                echo "<tr>";
                
                echo "<th></th>";
                
                echo "</tr>";
                while ($row=mysqli_fetch_array($results)){
                   echo "<tr>";
                   echo "<td>".$row['title'].": ".$row['description']."<br>".$row['timestamp']."</td>" ;

            

               echo "</tr>";
                }
                echo "</table>";
                
                    
            }else{
                echo "no records found";
            }
            }else{
                echo "error executing query $sql";
            }

?>
              
              </div>
          
          </div>
          </div>
      
      
      </div>

  

  </main>

  
   <footer id="footer" style="background-color: #f4f5f6!important;">
      
      
      <div class="row pt-5" style=" width:80%;margin-left: auto;margin-right: auto;color:black;">
          <div class="col">
              <div class="card bg-transparent" style="border:none;">
                  <div class="card-body">
                      <h4>Tea Factory</h4>
                      <p>Tea Farmers Building<br>
                      Nyahurur-Nakuru Road<br>
                      11km From Nyahururu<br>
                      PO BOX 2 0300 (or 20300) NYAHURURU<br>
                      KENYA</p>
                  </div>
              </div>
          
          
          </div>
          <div class="col">
              
               <div class="card bg-transparent" style="border:none;">
                  <div class="card-body">
                      <h4>Contacts</h4>
                      <p><a href="mailto:info@teafactory.com" style="color:black">Infor@teafactory.com</a>
                          Call<br>
                          (+254) 0721977429<br>
                          (+254) 0721977429<br>
                          (+254) 0721977429<br>
              
              </p>
                  </div>
              </div>
          
          
          
          </div>
          <div class="col">
              
              <div class="card bg-transparent" style="border:none;">
                  <div class="card-body">
                      <h4>Useful Link</h4>
              
                      <a href="" style="color:black">Report a Bug</a><br>
                      <a href="" style="color:black">Login</a><br>
                      <a href="" style="color:black">Tenders</a><br>
                      <a href="" style="color:black">Staff webmail.</a><br>
                  </div>
              </div>
          
    
          </div>
      </div>
      

    

    <div class="contain d-md-flex py-4" style="background-color:forestgreen;color:white;width:100; padding-left:5%;padding-right:5%;">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Tea Factory</span></strong>. All Rights Reserved
        </div>
       
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a style="color:green; background-color:orange;" href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a  style="color:green; background-color:orange;" href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a  style="color:green; background-color:orange;" href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a  style="color:green; background-color:orange;" href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a  style="color:green; background-color:orange;" href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color:orange;"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  
  <script src="assets/js/main.js"></script>

</body>

</html>