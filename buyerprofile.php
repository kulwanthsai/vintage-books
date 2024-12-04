<!DOCTYPE html><head>
    <meta charset="utf-8">
    
</head>
<body class="hell">
<nav >
    <ul>               
    <li><a href="buyerhome.php">home</a></li>
    <li><a href="buyingbook.php">buy a book</a></li>
    <li><a href="vintagebooks.php">vintage books</a></li>
    <li><a href="buyercontactus.html">contact us</a></li>
    <li><a href="buyercart.php">cart</a></li>

        <li><a href="buyerprofile.php">profile</a></li>

</ul>
</nav>
<div class="log"><a href="buyerlogout.php">logout</a></div>

<style>
nav {
    background-color: rgba(29, 30, 30, 0.651);
    height:40px;
    border-radius:5px;
}
nav ul{
        display: flex;
        text-transform:uppercase; 
        list-style-type: none;     
        gap: 100px;
        justify-content: center; 
        padding-right: 40px; 
        padding-top: 10px;

    }
    nav ul li a{
        text-decoration:none;
        color:white;
    }
    .log{
        position: relative;
        top:20px;
        right:-1120px;
        border-radius:5px;
        background-color: rgb(154, 33, 33);
        padding:5px;
        text-transform:uppercase;
        display: inline-block;    
    }
    .log a{
        text-decoration: none;
        color :white
    }
    body {
            background-color: #f5eadc;
            margin: 0;
            padding: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style><br><br><br><br><br>
<center>    Hello...!<?php
session_start();
echo $_SESSION['buyername'];
$usn=$_SESSION['buyerusername'];
echo "<br>";
$con=mysqli_connect("localhost","root","","books");
$q="select * from buyeraddress where username='$usn' && required='Delivery'";
$r=mysqli_query($con,$q);
$b=mysqli_num_rows($r);
echo "<br>";
echo "Number of books you have ordered :";
echo "$b";
echo "<br>";echo "<br>";
if($b==0){
echo "Do you want to buy book?<a href='buyingbook.php'>click here</a>";
echo "<br>";
}
else if($b>0){
    echo "If you want to cancel the order, please contact the seller...";echo "<br>";
    echo "The seller details are given below...";echo "<br>";echo "<br>";

    $qu="select id,name,seller,address,village,pin,state,sc1,sc2,ppu,price,author,required_quantity,status,ordered,delivered from buyeraddress where username='$usn' && required='Delivery'";
    $re=mysqli_query($con,$qu);
    echo "<table border='1'>
    <tr>
    <th>Order id</th>
    <th>Book Name</th>
    <th>Author</th>
    <th>seller</th>
    <th>Address</th>
    <th>Town/Village</th>
    <th>Pin code</th>
    <th>State</th>
    <th>Seller contact(mobile)</th>
    <th>Seller contact(mail)</th>
    <th>Price(per unit)</th>
    <th>Quantity</th>
    <th>Total Price</th>
    <th>Status</th>
    <th>Ordered</th>
    <th>Delivered on</th>

    </tr>";
    while(($resu=mysqli_fetch_assoc($re))){
        echo "
        <tr>
        <td>".$resu['id']."</td>
        <td>".$resu['name']."</td>
        <td>".$resu['author']."</td>
        <td>".$resu['seller']."</td>
        <td>".$resu['address']."</td>
        <td>".$resu['village']."</td>
        <td>".$resu['pin']."</td>
        <td>".$resu['state']."</td>
        <td>".$resu['sc1']."</td>
        <td>".$resu['sc2']."</td>
        <td>".$resu['ppu']."/-</td>
        <td>".$resu['required_quantity']."</td>
        <td>".$resu['price']."/-</td>
        <td>".$resu['status']."</td>
        <td>".$resu['ordered']."</td>
        <td>".$resu['delivered']."</td>

        </tr>
            
        ";

    }echo "</table>";
    echo "<style> 
    table,th,td{
        border-collapse:collapse;
        width: 1000px;
        height: 50px;
        text-align:center;
        background-color: rgba(205, 207, 208, 0.112);
    
    }
    th{
        background-color: rgba(55, 56, 56, 0.555);
    
    }
    tbody tr:hover{
        background-color: rgba(89, 101, 101, 0.247);
    }
    table tr td a{
        text-decoration:none;
    }
        </style>
    ";

}
$qu="select * from buyeraddress where username='$usn' && required='Rent'";
$re=mysqli_query($con,$qu);
$be=mysqli_num_rows($re);
echo "<br><br>";
echo "No of books you have rented are :";
echo "$be";
if($be>0){
echo "<br><br> <b>Rented Books...</b><br><br>";
$que="select id,name,seller,address,village,pin,state,sc1,sc2,price,author,required_quantity,status,ordered,delivered,returned,days from buyeraddress where username='$usn' && required='Rent'";
$res=mysqli_query($con,$que);
echo "<table border='1'>
<tr>
<th>Order id</th>
<th>Book Name</th>
<th>Author</th>
<th>seller</th>
<th>Address</th>
<th>Town/Village</th>
<th>Pin code</th>
<th>State</th>
<th>Seller contact(mobile)</th>
<th>Seller contact(mail)</th>
<th>Price</th>
<th>Quantity</th>
<th>Status</th>
<th>Ordered</th>
<th>Delivered</th>
<th>Returned</th>
<th>Days</th>



</tr>";
while(($resul=mysqli_fetch_assoc($res))){
    echo "
    <tr>
    <td>".$resul['id']."</td>
    <td>".$resul['name']."</td>
    <td>".$resul['author']."</td>
    <td>".$resul['seller']."</td>
    <td>".$resul['address']."</td>
    <td>".$resul['village']."</td>
    <td>".$resul['pin']."</td>
    <td>".$resul['state']."</td>
    <td>".$resul['sc1']."</td>
    <td>".$resul['sc2']."</td>
    <td>".$resul['price']."/-</td>
    <td>".$resul['required_quantity']."</td>
    <td>".$resul['status']."</td>
    <td>".$resul['ordered']."</td>
    <td>".$resul['delivered']."</td>
    <td>".$resul['returned']."</td>
    <td>".$resul['days']."</td>



    </tr>
        
    ";

}echo "</table>";
echo "<style> 
table,th,td{
    border-collapse:collapse;
    width: 1000px;
    height: 50px;
    text-align:center;
    background-color: rgba(205, 207, 208, 0.112);

}
th{
    background-color: rgba(55, 56, 56, 0.555);

}
tbody tr:hover{
    background-color: rgba(89, 101, 101, 0.247);
}
table tr td a{
    text-decoration:none;
}

    </style>
";
}

?>
</center>

</html>