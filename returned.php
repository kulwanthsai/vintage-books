<?php
$con=mysqli_connect("localhost","root","","books");
session_start();
$name=$_GET['name'];
$mobile=$_GET['mobile'];
$mail=$_GET['mail'];
$address=$_GET['address'];
$pin=$_GET['pin'];
$bname=$_GET['bname'];
$bmobile=$_GET['bmobile'];
$id=$_GET['id'];
$qu="select status from buyeraddress where id='$id' && name='$name' && sc1='$mobile' && sc2='$mail'&&address='$address'&&pin='$pin'&&bname='$bname'&&bcon1='$bmobile'";
$re=mysqli_query($con,$qu);
$status=mysqli_fetch_row($re);
if($status[0]=='Cancelled'){
    echo "<script>alert('book has already been cancelled...You cannot return the book... ');document.location='orders.php'</script>";
}
elseif($status[0]=='Delivered'){
$q="update buyeraddress set status='Returned', returned=CURDATE(),days=DATEDIFF(returned,delivered),price=days where id='$id'";
$r=mysqli_query($con,$q);
header('location:orders.php');}
else{
    echo "<script>alert('book is not delivered yet...');document.location='orders.php'</script>";

}
?>  
