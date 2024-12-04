<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head><body class="hell">
<div class="address">
    <form method="post" action="buyerbuy.php">
        <h1><i>please enter your address...</i></h1>
        <center>
        <?php       
        session_start();
        echo "<table border='1'>
        <tr>
        <th>Book Name</th>
        <th>Author</th>
        <th>Pages</th>
        <th>Price(per unit)</th>
        <th>Required Quantity</th>

        </tr>";
            echo "
            <tr>
            <td>".$_SESSION['bookname']."</td>
            <td>".$_SESSION['author']."</td>
            <td>".$_SESSION['pages']."</td>
            <td>".$_SESSION['price']."/-</td>
            <td><input type='number' id='required_quantity' name='required_quantity' style='background:transparent;border:none;' value=1 onchange='price_update()'></td>
            
            </tr>               
            ";
        ?>
    
        <label>Adddress :</label><input type="text" name="address"><br><br>
        <label>Town/Village :</label><input type="text" name="village"><br><br>
        <label>pincode :</label><input type="text" name="pin"><br><br>
        <label>state :</label><input type="text" name="state"><br><br>
        <select name='required' id='required' onchange='check()'>
            <option value='Delivery'>Buy</option>
            <option value='Rent'>Rent</option>

        </select><br><br><p id='days'></p>
        <center>
        <center><input type="submit" name="submit" value="submit"></center><p id="fill" style="color:red;"></p>
        Final price will be updated accordinng to the quantity you required in the profile section...
</form></div>
<script>

    
    function check(){
        if(document.getElementById('required').value==='Rent'){
            document.getElementById('days').innerText="We charge 1/- per day ";
        
    }
    else{
        document.getElementById('days').innerText="";
    }

    }
   
</script>
<?php
$con=mysqli_connect("localhost","root","","books");
$usn=$_SESSION['buyerusername'];
$qu="select mobile,mailid from buyer where username='$usn'";
$re=mysqli_query($con,$qu);
$resu=mysqli_fetch_row($re);

if(isset($_POST['submit'])){
    $required_quantity=$_POST['required_quantity'];
    $name=$_SESSION['bookname'];
    $seller=$_SESSION['sellername'];
    $sc1=$_SESSION['sc1'];
    $sc2=$_SESSION['sc2'];
    $ppu=$_SESSION['price'];
    $price=$_SESSION['price']*$required_quantity;
    $author=$_SESSION['author'];
    $address=$_POST['address'];
    $village=$_POST['village'];
    $pincode=$_POST['pin'];
    $state=$_POST['state'];
    $bname=$_SESSION['buyername'];
    $bcon1=$resu[0];
    $bcon2=$resu[1];
    $status='not deliverded';
    $required=$_POST['required'];
    $que="select quantity_remaining from book where name='$name' && mobile='$sc1' && mailid='$sc2'";
    $res=mysqli_query($con,$que);   
    $quan=mysqli_fetch_row($res);
    $quantity_remaining=$quan[0];
    if($required=='Rent'){
        $price='TBU';
    }
    if($address==""||$village==""||$pincode==""||$state==""){
        echo "<script>document.getElementById('fill').innerText='please fill all the details...';</script>";
    }
    else{
    $quantity_remaining_value_updated=$quantity_remaining-$required_quantity;
    if($quantity_remaining_value_updated<0){
        echo "<script>alert('We donot have the quantity you required...We have only $quantity_remaining units left...')</script>";
    }
    else{
    $qu = "UPDATE `book` SET `quantity_remaining` = $quantity_remaining_value_updated WHERE `name` = '$name' AND `mobile` = '$sc1' AND `mailid` = '$sc2'";
    $resul = mysqli_query($con, $qu);
    $q="insert into buyeraddress (`username`, `name`, `author`, `seller`, `address`, `village`, `pin`, `state`, `sc1`, `sc2`,`ppu`, `price`, `status`, `bname`, `bcon1`, `bcon2`,`required_quantity`,`required`, `ordered`) values('$usn','$name','$author','$seller','$address','$village','$pincode','$state','$sc1','$sc2','$ppu','$price','$status','$bname','$bcon1','$bcon2','$required_quantity','$required',CURDATE())";
    $r=mysqli_query($con,$q);
    $que="delete from buyercart where username='$usn' && name='$name' && author='$author' && sellercontact1='$sc1' && sellercontact2='$sc2'";
    $res=mysqli_query($con,$que);
    echo "<script>alert('book has been ordered successfully and will be delivered at the given address...');document.location='buyercart.php'</script>";
    }
}
    }
?>  

<style>
    .address{
        position:absolute;
        top:40%;
        left:50%;
        transform:translate(-50%,-50%);
        padding:20px;
        background-color:rgb(182, 192, 199);
        border-radius:20px;

    }
    body {
            background-color: #f5eadc;
            margin: 0;
            padding: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

    </style>
</html>