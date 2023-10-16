<?php
session_start();
if(isset($_SESSION['logged_in_username'])){
    
} else {
    header('Location: http://localhost/plant/login.php');
}

?>
