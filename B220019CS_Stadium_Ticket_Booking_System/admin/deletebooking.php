<?php


include "dbconfigure.php";
@session_start();
$u = $_SESSION['sun'];

$id=$_GET['id'];


$query = "delete from booking where bookingid='$id'";
$n = my_iud($query);
//echo "$n record removed";  
header("Location:viewbooking.php");
?>