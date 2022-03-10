 
<?php
session_start();

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:../login/login.php");
    exit();
}
include '../db.php';
$id=$_SESSION['id'];
$sql="SELECT * FROM users WHERE id='$id'";
$results=mysqli_query($conn,$sql);
if($results){
        $data=mysqli_num_rows($results);
        if($data==1){
            while($row=mysqli_fetch_assoc($results)){
                 $fname=$row['fname'];
                 $sname=$row['sname'];
                 $lname=$row['lname'];
                 $email=$row['email'];
                 $pnumber=$row['pnumber'];
                 $usertype=$row['usertype'];
                 $profile=$row['profile'];
                 $password=$row['password'];
                 $factoryid=$row['factoryid'];
                 $bankname=$row['bankname'];
                 $bankbranch=$row['bankbranch'];
                 $accountnumber=$row['accountnumber'];
                 $accountname=$row['accountname'];
                 $collectioncenter=$row['collectioncenter'];
                
                
                        $_SESSION['fname']=$fname;
                        $_SESSION['email']=$email;
                        $_SESSION['factoryid']=$factoryid;
                        $_SESSION['profile']=$profile;
                        $_SESSION['usertype']=$usertype;
                        $_SESSION['pnumber']=$pnumber;
                        $_SESSION['usertype']=$usertype;
                        $_SESSION['sname']=$sname;
                        $_SESSION['lname']=$lname;
                        $_SESSION['bankbranch']=$bankbranch;
                        $_SESSION['bankname']=$bankname;
                        $_SESSION['acountnumber']=$accountnumber;
                        $_SESSION['accountname']=$accountname;
                        $_SESSION['collectioncenter']=$collectioncenter;
            }
        }
}

?>
<?php
include '../db.php';
$id=$_SESSION['id'];
$sql="SELECT * FROM users WHERE id='$id'";
$results=mysqli_query($conn,$sql);
if($results){
        $data=mysqli_num_rows($results);
        if($data==1){
            while($row=mysqli_fetch_assoc($results)){
                 $firstname=$row['fname'];
                 $secondname=$row['sname'];
                 $lastname=$row['lname'];
                 $emailaddress=$row['email'];
                 $phonenumber=$row['pnumber'];
                 $type=$row['usertype'];
                 $photo=$row['profile'];
            }
        }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>farmers page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

 
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

 
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../uploads/<?php echo $photo?>" alt="Profile" class="rounded-circle"style='width:40px; height:50px;'>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $firstname; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $firstname; ?></h6>
              <span><?php echo $type; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="farmer_user_profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
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
        <a class="nav-link " href="farmers.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="farmer_user_profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="vtp.php">
          <i class="bi bi-person-plus-fill"></i>
          <span>View Tea Produce</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="farmer_user_profile.php">
          <i class="bi bi-card-list"></i>
          <span>Reset Password</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-left"></i>
          <span>Logout</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->
    <main id="main">

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
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Tea Produce <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        
        <?php

          

     $id = '$factoryid';
     $query =mysqli_query($conn,"SELECT * FROM produce WHERE factoryid='$factoryid' ORDER BY id DESC LIMIT 31");
     $count =1;
     $total = 0;
     while($row = mysqli_fetch_array($query)){
      
        ?>

        <?php
        $total = $total + $row['weight'];
    $count++;
    } ?>
    <tr>
    <td><?php echo $total; ?></td> <span style="color:green;">Kilograms</span>

                        
                        </h6>
                      

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash-stack"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                          <?php

          

     $id = '$factoryid';
     $query =mysqli_query($conn,"SELECT * FROM produce WHERE factoryid='$factoryid' ORDER BY id DESC LIMIT 31");
     $count =1;
     $total = 0;
     while($row = mysqli_fetch_array($query)){
      
        ?>

        <?php
        $total = $total + $row['dtpay'];
    $count++;
    } ?>
    <tr>
    <td><?php echo $total; ?></td> <span style="color:green;">KSH</span>
                        
                        </h6>
                  

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Tea Produce Records</h5>
                    <?php
 $sql="SELECT * FROM produce WHERE factoryid='$factoryid' ORDER BY id DESC LIMIT 10";
            $results=mysqli_query($conn,$sql);
            if($results){
            $data=mysqli_num_rows($results);
            if($data>0){
                echo "<table class='table table-strip-hover'>";
                echo "<tr style='background:transparent;'>";
                
                echo "<th scope='col'>Date</th>";
                echo "<th scope='col'>Factory Payrate</th>";
                echo "<th scope='col'>Weight(Kgs)</th>";
                echo "<th scope='col'>Total(Ksh)</th>";
                
                
                echo "</tr>";
                while ($row=mysqli_fetch_array($results)){
                   echo "<tr>";
                   echo "<td>".$row['date']."</td>" ;
                   echo "<td>".$row['payrates']."</td>" ;
                   echo "<td>".$row['weight']."</td>" ;
                    echo "<td>".$row['dtpay']." Ksh"."</td>" ;
                    
            

               echo "</tr>";
                }
                echo "</table>";
                
                    
            }else{
                echo " no data found";
            }
            }else{
                echo "error executing query $sql";
            }

?>

<a href="vtp.php">See all <i class='fa fa-long-arrow-right'></i></a>
                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- News & Updates Traffic -->
          <div class="card">
            
            <div class="card-body pb-0">
              <h5 class="card-title">Recent News &amp; Events </h5>
                <?php
 $sql="SELECT * FROM news ORDER BY timestamp DESC LIMIT 5";
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
                echo "No news found";
            }
            }else{
                echo "error executing query $sql";
            }

?>


              

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
 <footer id="footer" class="footer" style="background-color: forestgreen;">
    <div class="copyright" style=" color:white;">
      &copy; Copyright <strong><span>Tea Factoy</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
    