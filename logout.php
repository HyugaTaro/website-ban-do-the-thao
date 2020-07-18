<?php session_start(); 
 
if (isset($_SESSION['tendn'])){
    unset($_SESSION['tendn']); // xóa session login
    unset($_SESSION['giohang']);
}
header('location: index.php')
?>