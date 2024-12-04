<?php
$con=mysqli_connect("localhost","root","","books");
$name=$_GET['name'];
$mobile=$_GET['mobile'];
$mail=$_GET['mail'];
$q="delete from book where name='$name'";
$r=mysqli_query($con,$q);
$qu="delete from buyercart where name='$name' && sellercontact2='$mail' && sellercontact1='$mobile'";
$re=mysqli_query($con,$qu);
if($r & $re){
    header("Location:profile.php");
}

?>