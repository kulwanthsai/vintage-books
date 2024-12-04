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
if($status[0]=='Delivered'){
    echo "<script>alert('book has already been delivered successfully...You cannot cancel the book... ');document.location='orders.php'</script>";
}
else{
$q="update buyeraddress set status='Cancelled' where id='$id'";
$r=mysqli_query($con,$q);
$qu="select required_quantity from buyeraddress where id='$id'";
$re=mysqli_query($con,$qu);
$resu=mysqli_fetch_row($re);
$quan=$resu[0];

$que = "UPDATE `book` SET `quantity_remaining` = `quantity_remaining`+$quan WHERE  `name`='$name' &&  mobile='$mobile' && mailid='$mail'";
$resul = mysqli_query($con, $que);
header('location:orders.php');
}

?>  
