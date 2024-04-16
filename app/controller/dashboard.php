<?php

function dashboard_index(){
    if(isset($_SESSION['email'])){
        require_once "/View/ADMIN/Dashboard/Admindashboard.php";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}