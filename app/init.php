<?php 
session_start();

$pages = (isset($_GET['pages'])) ? $_GET['pages'] : "";
// require_once 'core/App.php';
// require_once 'core/Controller.php';
// require_once 'View/home/home.php';
// require_once 'View/ADMIN/Dashboard/Admindashboard.php';
// require_once 'View/ADMIN/login/Adminlogin.php';
// require_once 'View/protected/rahasia.php';
?>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="./public/style.css?v=<?php echo time(); ?>">
    <script src="./public/script.js"></script>
</head>

<body>
  <nav class="w-full">
    
  </nav>
  <div class="p-10">
    <?php

      if ($pages == "" || $pages == "home") {

        if ( isset( $_SESSION['username'] )) {

          include "View/home/home.php"; // Sesuaikan path
        
        } else {

          echo "<script>window.location.href='signin'</script>";
        
        }
      } 
      
      
      elseif ($pages == "signin") {
        if(isset($_SESSION['username'])){
          echo "<script>window.location.href='home'</script>";
        } else {
          include "View/ADMIN/login/AdminLogin.php"; // Sesuaikan path
        }
      } elseif ($pages == "protected") {
        protected_index();
      } else if ($pages == "logout") {
        session_destroy();
        echo "<script>window.location.href='home'</script>";
      } else if ($pages == "user"){
        // Panggil index() dari controller user
        user_index();
      } else if ($pages == "about"){
        include "Views/about.php";
      } else if ($pages == "dashboard"){
        dashboard_index();
      } else {
        include "Views/404.php";
      }
    ?>
  </div>
</body>
