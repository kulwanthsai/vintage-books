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
    body{ background-color: #f5eadc;
    margin: 0;
    padding: 0;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;}
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
    </style><br><br><br><br>
<center>    Hello...!<?php
session_start();
echo $_SESSION['buyername'];
$usn=$_SESSION['buyerusername'];
echo "<br>";echo "<br>";echo "<br>";
$con=mysqli_connect("localhost","root","","books");
$qu="select name,author,pages,price,quantity_remaining,mobile,mailid,type from book where quantity_remaining>0";
$re=mysqli_query($con,$qu);
if (mysqli_num_rows($re)==0){
    echo "At present there are no books available...";
    echo "<br>";
    echo "We will update the books when any seller adds books..";
}
else{
echo "<table border='1'>
<tr>
<th>Boook Name</th>
<th>Author</th>
<th>Pages</th>
<th>Price</th>

<th>Type</th>

<th>Operation</th>
</tr>";
while(($resu=mysqli_fetch_assoc($re))){
    echo "
    <tr>
    <td>".$resu['name']."</td>
    <td>".$resu['author']."</td>
    <td>".$resu['pages']."</td>
    <td>".$resu['price']."/-</td>

    <td>".$resu['type']."</td>
    <td><a href='cart.php?name=$resu[name]&author=$resu[author]&pages=$resu[pages]&price=$resu[price]&mobile=$resu[mobile]&mail=$resu[mailid]&type=$resu[type]'>Add to cart</a></td>
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
</html>