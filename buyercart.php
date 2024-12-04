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
echo $_SESSION['buyername'];
$usn=$_SESSION['buyerusername'];
echo "<br>";echo "<br>";echo "<br>";
$con=mysqli_connect("localhost","root","","books");
$q="select * from buyercart where username='$usn'";
$r=mysqli_query($con,$q);
$b=mysqli_num_rows($r);
echo "<br>";
echo "Number of books you have added to cart :";
echo "$b";
echo "<br>";echo "<br>";
if($b==0){
echo "Do you want to buy book?<a href='buyingbook.php'>click here</a>";
echo "<br>";
}
else if($b>0){

    $qu="select name,author,pages,price,seller,sellercontact1,sellercontact2,type from buyercart where username='$usn'";
    $re=mysqli_query($con,$qu);
    echo "<table border='1'>
    <tr>
    <th>Book Name</th>
    <th>Author</th>
    <th>Pages</th>
    <th>Price</th>
    <th>Type</th>

    <th>Operation1</th>
    <th>Operation2</th>
    </tr>";
    while(($resu=mysqli_fetch_assoc($re))){
        echo "
        <tr>
        <td>".$resu['name']."</td>
        <td>".$resu['author']."</td>
        <td>".$resu['pages']."</td>
        <td>".$resu['price']."/-</td>
        <td>".$resu['type']."</td>

        <td><a href='buyercartdelete.php?name=$resu[name]&seller=$resu[seller]&sc=$resu[sellercontact1]'>Remove</a></td>
        <td><a href='buyerddress.php?name=$resu[name]&seller=$resu[seller]&sc1=$resu[sellercontact1]&sc2=$resu[sellercontact2]&author=$resu[author]&price=$resu[price]&pages=$resu[pages]'>Buy</a></td>
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