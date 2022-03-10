<?php
session_start();

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:../login/login.php");
    exit();
}
include '../db.php';
$id=$_GET['id'];
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
                        $_SESSION['accountnumber']=$accountnumber;
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

  <title>admin panel</title>
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
        <img src="assets/img/log.png" alt="">
        <span class="d-none d-lg-block">Only Admin</span>
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
              <a class="dropdown-item d-flex align-items-center" href="user_profile.php">
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
        <a class="nav-link " href="admin.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Farmers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_farmer.php">
              <i class="bi bi-person-plus bi-2x"></i><span>Add Farmer</span>
            </a>
          </li>
            <li>
            <a href="viewfarmers.php">
              <i class="bi bi-person-lines-fill"></i><span>View Farmers</span>
            </a>
                <a href="produce.php">
              <i class="bi bi-person-lines-fill"></i><span>Add Farmer's Produce</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Notice Board</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="news.php">
              <i class="bi bi-circle"></i><span>Add Notice Board</span>
            </a>
          </li>
          <li>
            <a href="updaten.php">
              <i class="bi bi-circle"></i><span>View and edit Notice/s</span>
            </a>
          </li>
        </ul>
      </li>
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-server"></i><span>Tenders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tendersform.php">
              <i class="bi bi-circle"></i><span>Add Tender</span>
            </a>
          </li>
          <li>
            <a href="editt.php">
              <i class="bi bi-circle"></i><span>Edit Tenders</span>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-heading">Useful Links</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="user_profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="admin_register.php">
          <i class="bi bi-person-plus-fill"></i>
          <span>Add Admin</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="reports.php">
          <i class="bi bi-card-list"></i>
          <span>Reports</span>
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
    
    
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active"><?php echo $fname;?> profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../uploads/<?php echo $_SESSION['profile']?>" alt="Profile" class="rounded-circle" style="width:150px; height:130px;">
              <h2><?php echo $_SESSION['fname'];?></h2>
              <h3><?php echo $_SESSION['usertype'];?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['fname']." ".$_SESSION['sname']." ".$_SESSION['lname'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['email'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['pnumber'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Factory Id</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['factoryid'];?></div>
                  </div>
                    
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label">bank name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['bankname'];?></div>
                  </div>
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label">bank branch</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['bankbranch'];?></div>
                  </div>
                    
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label">account number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['accountnumber'];?></div>
                  </div>
                    
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label">account name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['accountname'];?></div>
                  </div>
                    
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label">collection center</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['collectioncenter'];?></div>
                  </div>


                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="" method="post" enctype="multipart/form-data">
                      <?php


include "../db.php";



if (isset($_POST["update"])) {

    $fname= $_POST["fname"];
    $sname= $_POST["sname"];
    $lname= $_POST["lname"];
    $email = $_POST["email"];
    $pnumber = $_POST["pnumber"];
    $bankname = $_POST["bankname"];
    $bankbranch = $_POST["bankbranch"];
    $accountnumber = $_POST["accountnumber"];
    $accountname = $_POST["accountname"];
    $collectioncenter= $_POST["collectioncenter"];
    
    $id='';

    $profile=$_FILES['profile']['name'];
    $tempprofile=$_FILES['profile']['tmp_name'];
    $profilefolder="../uploads/".$profile;


    $up_sql = "UPDATE `users` SET  `fname`='$fname',`sname`='$sname',`lname`='$lname',
                    `email`='$email',`pnumber`='$pnumber',`profile`='$profile',`bankname`='$bankname',`bankbranch`='$bankbranch',`accountnumber`='$accountnumber',`accountname`='$accountname',`collectioncenter`='$collectioncenter' WHERE email ='$email'";

    $up_result=mysqli_query($conn,$up_sql);

    if ($up_result){

        echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-success'>Records have been updated!</p>";
        echo "</div>";


    }else{
        echo "Error executing query $up_sql".mysqli_error($conn);
    }



}


?>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../uploads/<?php echo $_SESSION['profile']?>" alt="Profile">
                        <div class="pt-2">
                            <a href="#" class="btn btn-primary btn-sm bg-danger" title="Upload new profile image" type="file"><i class="bi bi-trash"></i></a>
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image" type="file"><i class="bi bi-upload"></i></a>
                         <input class="text-primary"type="file" name="profile">
                            
                        </div>
                          
                              
                    
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fname" type="text" class="form-control" value="<?php echo $_SESSION['fname'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">second name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sname" type="text" class="form-control" value="<?php echo $_SESSION['sname'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">last name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lname" type="text" class="form-control" value="<?php echo $_SESSION['lname'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" value="<?php echo $_SESSION['email'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pnumber" type="tell" class="form-control" value="<?php echo $_SESSION['pnumber'];?>">
                      </div>
                    </div>
                      
                      <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">bank name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="bankname" type="text" class="form-control" value="<?php echo $_SESSION['bankname'];?>">
                      </div>
                    </div>
                      
                      <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">bank branch</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="bankbranch" type="text" class="form-control" value="<?php echo $_SESSION['bankbranch'];?>">
                      </div>
                    </div>
                      
                      <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">account number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="accountnumber" type="text" class="form-control" value="<?php echo $_SESSION['accountnumber'];?>">
                      </div>
                    </div>
                      
                      <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">account name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="accountname" type="text" class="form-control" value="<?php echo $_SESSION['accountname'];?>">
                      </div>
                        
                    </div>
                      
                      <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">collection center</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="collectioncenter" type="text" class="form-control" value="<?php echo $_SESSION['collectioncenter'];?>">
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" name='update' class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="" method="post">
                      
                      <?php


if(isset($_POST['reset'])){
    
    $password=md5($_POST['password']);
    $newpassword=$_POST['newpassword'];
    $renewpassword=$_POST['renewpassword'];
    $id=$_SESSION['id'];
    if($newpassword==$renewpassword){
        
        if(strlen($renewpassword)>=6){
            $storerenewpassword=md5($renewpassword);
    
    
    $rsql="SELECT password FROM users WHERE password='$password' and id='$id'";
    $rresults=mysqli_query($conn,$rsql);
    $datar=mysqli_num_rows($rresults);
    if($datar==1){
    if($rresults){
        
            
            $usql="UPDATE users SET password='$storerenewpassword' WHERE id='$id'";
            $uresults=mysqli_query($conn,$usql);
            if($uresults){
                echo "<div class='row m-2 text-center'>";
                echo "<p class='alert alert-success'>Password Changed successfully</p>";
                echo "</div>";
            }
            
        
    }
        
        
        
    }else{
        echo "<div class='row m-2 text-center'>";
           echo "<p class='alert alert-danger'>incorrect old password</p>";
           echo "</div>";
    }
        }else{
         echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-danger'>password should have atleast 6 characters</p>";
        echo "</div>";   
        }
        
        
}else{
        echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-danger'>new  and confirm new password mismatch.</p>";
        echo "</div>";
    }
    }




?>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="reset" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
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