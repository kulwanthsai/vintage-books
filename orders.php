<!DOCTYPE html><head>
    <meta charset="utf-8">
</head>
<body class="hell">
<nav >
    <ul>               
    <li><a href="home.php">home</a></li>
    <li><a href="sellingbook.php">sell a book</a></li>
    <li><a href="contactus.html">contact us</a></li>
    <li><a href="orders.php">orders</a></li>
    <li><a href="profile.php">profile</a></li>
        
</ul>
</nav>
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
    body {
            background-color: #f5eadc;
            margin: 0;
            padding: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }


    </style><br><br><br>
<center>    Hello...!<?php
session_start();
echo $_SESSION['name'];
$na=$_SESSION['name'];
$usn=$_SESSION['username'];
echo "<br>";
$con=mysqli_connect("localhost","root","","books");
$que="select mobile,mailid from user where username='$usn'";
$resul=mysqli_query($con,$que);
$m=mysqli_fetch_row($resul);
$mo=$m[0];
$ma=$m[1];
$q="select * from buyeraddress where seller='$na' && sc1='$mo' && sc2='$ma' && required='Delivery'";
$r=mysqli_query($con,$q);
$b=mysqli_num_rows($r);
echo "<br>";
echo "Number of orders for the books you have to sell :";
echo "$b";
echo "<br>";echo "<br>";echo "please confirm your order with the customer by contacting them...";echo "<br>";
echo "the customer contact is given below...";echo "<br>";echo "<br>";
if($b==0){
echo "Your book has not been bought by any user...";echo "<br>";
echo "We will notify you if your book has bought by any customer..";
echo "<br>";
}
else if($b>0){

    $qu="select id,name,bname,address,village,pin,state,bcon1,bcon2,ppu,price,author,required_quantity,status,ordered,delivered from buyeraddress where seller='$na'&&sc1='$mo'&&sc2='$ma' && required='Delivery'";
    $re=mysqli_query($con,$qu);
    echo "<table border='1'>
    <tr>
    <th>Order id</th>
    <th>Book Name</th>
    <th>Author</th>
    <th>Buyerr</th>
    <th>Address</th>
    <th>Town/Village</th>
    <th>Pin code</th>
    <th>State</th>
    <th>Buyer contact(mobile)</th>
    <th>Buyer contact(mail)</th>
    <th>Price(per unit)</th>
    <th>Quantity</th>
    <th>Total Price</th>
    <th>cancelled?</th>
    <th>Delivered?</th>
    <th>Status</th>
    <th>Ordered</th>
    <th>Delivered</th>

    </tr>";
    while(($resu=mysqli_fetch_assoc($re))){
        echo "
        <tr>
        <td>".$resu['id']."</td>
        <td>".$resu['name']."</td>
        <td>".$resu['author']."</td>
        <td>".$resu['bname']."</td>
        <td>".$resu['address']."</td>
        <td>".$resu['village']."</td>
        <td>".$resu['pin']."</td>
        <td>".$resu['state']."</td>
        <td>".$resu['bcon1']."</td>
        <td>".$resu['bcon2']."</td>
        <td>".$resu['ppu']."/-</td>
        <td>".$resu['required_quantity']."</td>
        <td>".$resu['price']."/-</td>
        <td><a href='cancelled.php?id=$resu[id]&name=$resu[name]&mobile=$mo&mail=$ma&address=$resu[address]&pin=$resu[pin]&bname=$resu[bname]&bmobile=$resu[bcon1]'>yes</a></td>
        <td><a href='recieved.php?id=$resu[id]&name=$resu[name]&mobile=$mo&mail=$ma&address=$resu[address]&pin=$resu[pin]&bname=$resu[bname]&bmobile=$resu[bcon1]'>yes</a></td>
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
$quer="select * from buyeraddress where seller='$na' && sc1='$mo' && sc2='$ma' && required='Rent'";
$re=mysqli_query($con,$quer);
$be=mysqli_num_rows($re);
echo "<br><br>";
echo "No of books ordered for renting are :";
echo "$be";
if($be>0){
echo "<br><b>Books for Rent...</b><br><br>";
$qu="select id,name,bname,address,village,pin,state,bcon1,bcon2,price,author,required_quantity,status,ordered,delivered,returned,days from buyeraddress where seller='$na'&&sc1='$mo'&&sc2='$ma'&&required='Rent'";
$re=mysqli_query($con,$qu);
echo "<table border='1'>
<tr>
<th>Order id</th>
<th>Book Name</th>
<th>Author</th>
<th>Quantity</th>
<th>Buyerr</th>
<th>Address</th>
<th>Town/Village</th>
<th>Pin code</th>
<th>State</th>
<th>Buyer contact(mobile)</th>
<th>Buyer contact(mail)</th>
<th>Price</th>
<th>cancelled?</th>
<th>Delivered?</th>
<th>Returned?</th>
<th>Status</th>
<th>Ordered</th>
<th>Delivered</th>
<th>Returned</th>
<th>Days</th>



</tr>";
while(($resu=mysqli_fetch_assoc($re))){
    echo "
    <tr>
    <td>".$resu['id']."</td>
    <td>".$resu['name']."</td>
    <td>".$resu['author']."</td>
    <td>".$resu['required_quantity']."</td>
    <td>".$resu['bname']."</td>
    <td>".$resu['address']."</td>
    <td>".$resu['village']."</td>
    <td>".$resu['pin']."</td>
    <td>".$resu['state']."</td>
    <td>".$resu['bcon1']."</td>
    <td>".$resu['bcon2']."</td>
    <td>".$resu['price']."/-</td>
    <td><a href='cancelled.php?id=$resu[id]&name=$resu[name]&mobile=$mo&mail=$ma&address=$resu[address]&pin=$resu[pin]&bname=$resu[bname]&bmobile=$resu[bcon1]'>yes</a></td>
    <td><a href='recieved.php?id=$resu[id]&name=$resu[name]&mobile=$mo&mail=$ma&address=$resu[address]&pin=$resu[pin]&bname=$resu[bname]&bmobile=$resu[bcon1]'>yes</a></td>
    <td><a href='returned.php?id=$resu[id]&name=$resu[name]&mobile=$mo&mail=$ma&address=$resu[address]&pin=$resu[pin]&bname=$resu[bname]&bmobile=$resu[bcon1]'>yes</a></td>
    <td>".$resu['status']."</td>
    <td>".$resu['ordered']."</td>
    <td>".$resu['delivered']."</td>
    <td>".$resu['returned']."</td>
    <td>".$resu['days']."</td>


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
body {
    background-color: #f5eadc;
    margin: 0;
    padding: 0;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
    </style>
";}


?>
</center>
</body>
</html>