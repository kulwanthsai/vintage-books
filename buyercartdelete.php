<?php
$con=mysqli_connect("localhost","root","","books");
$name=$_GET['name'];
$seller=$_GET['seller'];
$sellercontact1=$_GET['sc'];


$q="delete from buyercart where name='$name'&& seller='$seller'&& sellercontact1='$sellercontact1'";
$r=mysqli_query($con,$q);
if($r){
    header("Location:buyercart.php");
}

?>