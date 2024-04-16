<?php

function protected_index(){
    if(isset($_SESSION['email'])){
        require_once "View/protected/rahasia";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}