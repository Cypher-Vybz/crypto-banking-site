<?php
ob_start();
session_start();
if(!isset($_SESSION["id"])){
   header("location:../user-login");
}
include_once("../damn.php");
$stmt = $connect->prepare("SELECT * FROM `admin` WHERE `id` = ?");
$stmt->bind_param("s",$_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows >=1) {

 $row = $result->fetch_assoc();

   $_SESSION['id'] = $row['id'];
  $_SESSION['email'] = $row['email'];
  $_SESSION['fullname'] = $row['fullname'];
  $_SESSION['country'] = $row['country'];
  $_SESSION['totalbalance'] = $row['totalbalance'];
  $_SESSION['gender'] = $row['gender'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intez</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.bootstrap5.css">
<link rel="stylesheet" href="datatables.min.css">
<link rel="stylesheet" href="datatables.css">      


</head>

<body class="dashboard">
<!--
<div id="preloader">
    <i>.</i>
    <i>.</i>
    <i>.</i>
</div>
 -->

<div id="main-wrapper">


    <div class="header">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12">
             <div class="header-content">
                <div class="header-left">
                   <div class="brand-logo"><a class="mini-logo" href="Dashboard"><img src="images/logoi.png" alt="" width="40"></a></div>
                   <div class="search">
                      <form method="get">
                         <div class="input-group"><input type="text" class="form-control" placeholder="Search Here"><span class="input-group-text"><i class="ri-search-line"></i></span></div>
                      </form>
                   </div>
                </div>
                <div class="header-right">
                   <div class="dark-light-toggle"><span class="dark"><i class="ri-moon-line"></i></span><span class="light"><i class="ri-sun-line"></i></span></div>
                   <div class="nav-item dropdown notification dropdown">
                      <div data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                         <div class="notify-bell icon-menu"><span><i class="ri-notification-2-line"></i></span></div>
                      </div>
                      <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu notification-list dropdown-menu dropdown-menu-right">
                         <h4>Recent Notification</h4>
                         <div class="lists">
                            <a class="" href="Dashboard">
                               <div class="d-flex align-items-center">
                                  <span class="me-3 icon success"><i class="ri-check-line"></i></span>
                                  <div>
                                     <p>Account created successfully</p>
                                     <span>2020-11-04 12:00:23</span>
                                  </div>
                               </div>
                            </a>
                            <a class="" href="Dashboard">
                               <div class="d-flex align-items-center">
                                  <span class="me-3 icon fail"><i class="ri-close-line"></i></span>
                                  <div>
                                     <p>2FA verification failed</p>
                                     <span>2020-11-04 12:00:23</span>
                                  </div>
                               </div>
                            </a>
                            <a class="" href="Dashboard">
                               <div class="d-flex align-items-center">
                                  <span class="me-3 icon success"><i class="ri-check-line"></i></span>
                                  <div>
                                     <p>Device confirmation completed</p>
                                     <span>2020-11-04 12:00:23</span>
                                  </div>
                               </div>
                            </a>
                            <a class="" href="Dashboard">
                               <div class="d-flex align-items-center">
                                  <span class="me-3 icon pending"><i class="ri-question-mark"></i></span>
                                  <div>
                                     <p>Phone verification pending</p>
                                     <span>2020-11-04 12:00:23</span>
                                  </div>
                               </div>
                            </a>
                            <a href="notifications">More<i class="ri-arrow-right-s-line"></i></a>
                         </div>
                      </div>
                   </div>
                   <div class="dropdown profile_log dropdown">
                      <div data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                         <div class="user icon-menu active"><span><i class="ri-user-line"></i></span></div>
                      </div>
                      <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu dropdown-menu-right">
                         <div class="user-email">
                            <div class="user">
                               <span class="thumb"><img src="images/profile/3.png" alt=""></span>
                               <div class="user-info">
                                  <h5><?php echo $_SESSION['fullname']; ?></h5>
                                  <span><?php echo $_SESSION['email']; ?></span>
                               </div>
                            </div>
                         </div>
                         <a class="dropdown-item" href="profile"><span><i class="ri-user-line"></i></span>Profile</a>
                         <a class="dropdown-item" href="Balance"><span><i class="ri-wallet-line"></i></span>Balance</a>
                         <a class="dropdown-item" href="settings"><span><i class="ri-settings-3-line"></i></span>Settings</a>
                         <a class="dropdown-item" href="Activities"><span><i class="ri-time-line"></i></span>Activity</a>
                         <a class="dropdown-item" href="../user-login"><span><i class="ri-lock-line"></i></span>Lock</a>
                         <a class="dropdown-item logout" href="../user-login"><i class="ri-logout-circle-line"></i>Logout</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

    <div class="sidebar">
    <div class="brand-logo"><a class="full-logo" href="Dashboard"><img src="images/logoi.png" alt="" width="30"></a></div>
    <div class="menu">
        <ul>
            <li><a href="Dashboard">
                    <span><i class="ri-home-5-line"></i></span>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="Balance">
                    <span><i class="ri-wallet-line"></i></span>
                    <span class="nav-text">Wallet</span>
                </a>
            </li>
            <li><a href="Bills">
                    <span><i class="ri-secure-payment-line"></i></span>
                    <span class="nav-text">Payment</span>
                </a>
            </li>
            <li><a href="invoice">
                    <span><i class="ri-file-copy-2-line"></i></span>
                    <span class="nav-text">Invoice</span>
                </a>
            </li>
            <li><a href="Transfer-History">
                    <span><i class="ri-file-copy-2-line"></i></span>
                    <span class="nav-text">Transfer History</span>
                </a>
            </li>

            <li><a href="settings">
                    <span><i class="ri-settings-3-line"></i></span>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
            <li class="logout"><a href="../user-login">
                    <span><i class="ri-logout-circle-line"></i></span>
                    <span class="nav-text">Signout</span>
                </a>
            </li>
        </ul>
    </div>
</div>

    <div class="content-body">
        <div class="container">
            <div class="page-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4">
                        <div class="page-title-content">
                            <h3>Dashboard</h3>
                            <p class="mb-2">Welcome Intez Dashboard</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="breadcrumbs"><a href="Dashboard">Home </a>
                        <span><i class="ri-arrow-right-s-line"></i></span>
                        <a href="Dashboard">Dashboard</a></div>
                    </div>
                </div>
            </div>
            