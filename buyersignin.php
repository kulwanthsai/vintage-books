<!DOCTYPE html><head>
    <meta charset="utf-8">
</head>
<body class="hell">
<div class="signin">
<center><form method="post" action="buyersignin.php">
    <h1><i>Login here...</i></h1>
    username :<input type="text" name="username"><br><br>
    password :<input type="password" name="password"><br><br><center>
    <input type="submit" name="submit" value="submit"></center><p id='fill'style="color:red;"></p>
    <center>Don't you have account?<a href="buyersignup.php">signup</a>
</center></div>
</form></div>
<?php
if(isset($_POST['submit'])){
$buyerusername=$_POST['username'];
$password=$_POST['password'];
if($buyerusername==""||$password==""){
    echo "<script>
    document.getElementById('fill').innerText='please fill all the details...';</script>";
}
else{
    $con=mysqli_connect("localhost","root","","books");
    $qu="select * from buyer where username='$buyerusername' && password='$password'";
    $re=mysqli_query($con,$qu);
    $row=mysqli_num_rows($re);
    if($row>0){
        
        $r="select name from buyer where username='$buyerusername'";
        $res=mysqli_query($con,$r);
        $nam=mysqli_fetch_row($res);
        session_start();
        $_SESSION['buyerusername']=$buyerusername;
        $_SESSION['buyername']=$nam[0];
        header("Location:buyerhome.php");
        exit;
    
    }
    else{
        echo "<script>
        document.getElementById('fill').innerText='Entered username or password doesnot match...';</script>";
    }
}
}
?>
<style>
    .signin{
        background:rgba(89, 101, 101, 0.247);
        border-radius: 20px;
        position:absolute;
        top:30%;
        left:50%;
        transform:translate(-50%,-50%);
        padding:20px;


    }
    body {
            background-color: #f5eadc;
            margin: 0;
            padding: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</html>