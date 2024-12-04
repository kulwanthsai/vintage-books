<!DOCTYPE html><head>
    <meta charset="utf-8">
</head><center>
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

    </style>
<br><br><br>
    <div class="book">
    <form method="post" action="sellingbook.php">
    <h1><i>Enter book details...</i></h1><br>
<label>Name of the book : </label><input type="text" name="bookname"><br><br>
Author : <input type="text" name="author"><br><br>
Pages : <input type="text" name="pages"><br><br>
Price : <input type="text" name="price"><br><br>
Quantity : <input type="number" name="quantity"><br><br>

<center><select name='select'>
    <option value='Sell'>Selling</option>
    <option value='Donation'>Donate</option>
</select><br><br>
<br><input type="submit" name="submit"><p id="fill" style="color:red;"></p><p id="fil" style="color:green;"></p></center></center>
</form></div>
<?php
$con=mysqli_connect("localhost","root","","books");
session_start();
$username=$_SESSION['username'];
$qu="select mobile,mailid from user where username='$username'";
$re=mysqli_query($con,$qu);
$ro=mysqli_fetch_row($re);
if(isset($_POST['submit'])){
$name=$_POST['bookname'];
$author=$_POST['author'];
$pages=$_POST['pages'];
$price=$_POST['price'];
$type=$_POST['select'];
$mobile=$ro[0];
$mail=$ro[1];
$quantity=$_POST['quantity'];
if($name==""||$author==""||$pages==""||$price==""||$mobile==""||$mail==""||$quantity==""){
    echo "<script>
    document.getElementById('fill').innerText='please fill all the details...';</script>";
}
else{
    if ($type=='Donation'){
        $price=0;
    }
    $q="insert into book values('$username','$name','$author','$pages','$price','$quantity','$quantity','$mobile','$mail','$type')";
    $r=mysqli_query($con,$q);
    if($r){
        echo "<script>
        document.getElementById('fil').innerText='registered successfully...';</script>";
    }
}
}
?></body>
<style>
    body {
            background-color: #f5eadc;
            margin: 0;
            padding: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    .book{
        display:flex;
        text-align:right;
        justify-content:center;
    }
    .book input{
        background:transparent;
        border-radius:5px
    }
    </style>

    

</html>