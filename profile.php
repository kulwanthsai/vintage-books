<!DOCTYPE html><head>
    <meta charset="utf-8">
</head><body class="hell">
<nav>
    <ul>               
    <li><a href="home.php">home</a></li>
    <li><a href="sellingbook.php">sell a book</a></li>
    <li><a href="contactus.html">contact us</a></li>
    <li><a href="orders.php">orders</a></li>
    <li><a href="profile.php">profile</a></li>
</ul>
</nav>
<div class="log"><a href="logout.php">logout</a></div>

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
    </style><br><br><br>
<center>    Hello...!<?php
session_start();
echo $_SESSION['name'];
$usn=$_SESSION['username'];
echo "<br>";
$con=mysqli_connect("localhost","root","","books");
$q="select * from book where username='$usn'";
$r=mysqli_query($con,$q);
$b=mysqli_num_rows($r);
echo "<br>";
echo "Number of books you have registered to sell are :";
echo "$b";
echo "<br>";echo "<br>";
if($b==0){
echo "Do you want to sell a book?<a href='sellingbook.php'>click here</a>";
echo "<br>";
}
else if($b>0){

    $qu="select name,author,pages,price,quantity,quantity_remaining,mobile,mailid,type from book where username='$usn'";
    $re=mysqli_query($con,$qu);
    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Author</th>
    <th>Pages</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Quantity Remaining</th>
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
        <td>".$resu['quantity']."</td>
        <td>".$resu['quantity_remaining']."</td>
        <td>".$resu['type']."</td>

        <td><a href='delete.php?name=$resu[name]&mail=$resu[mailid]&mobile=$resu[mobile]'>delete</a></td>
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
";

}
?>
</center>
</body>
</html>