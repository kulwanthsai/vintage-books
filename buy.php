<?php
$con=mysqli_connect("localhost","root","","books");
session_start();
$usn=$_SESSION['username'];
$name=$_GET['name'];
$author=$_GET['author'];
$pages=$_GET['pages'];
$price=$_GET['price'];
$mobile=$_GET['mobile'];
$mail=$_GET['mail'];
$qu="select username from book where name='$name' && mobile='$mobile'";
$re=mysqli_query($con,$qu);
$user=mysqli_fetch_row($re);
$query="select name from user where username='$user[0]'";
$res=mysqli_query($con,$query);
$nam=mysqli_fetch_row($res);

$q="insert into buying values('$usn','$name','$author','$pages','$price','$nam[0]','$mobile','$mail')";
$r=mysqli_query($con,$q);
echo "<script>alert('book has been purchased successfully...');document.location='buyingbook.php'</script>";


?>