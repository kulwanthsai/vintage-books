<!DOCTYPE html><head>
    <meta charset="utf-8">
</head>
<body class="hell">
    <div class="signin">

<center><form method="post" action="signin.php">
    <h1><i>Login here...</i></h1>
    Username :<input type="text" name="username"><br><br>
    Password :<input type="password" name="password"><br><br><center>
    <input type="Submit" name="submit" value="submit"></center><p id='fill'style="color:red;"></p>
</form>Don't you have account?<a href="signup.php">signup</a><center>
</div>
<?php
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
if($username==""||$password==""){
    echo "<script>
    document.getElementById('fill').innerText='please fill all the details...';</script>";
}
else{
    $con=mysqli_connect("localhost","root","","books");
    $qu="select * from user where username='$username' && password='$password'";
    $re=mysqli_query($con,$qu);
    $row=mysqli_num_rows($re);
    if($row>0){    
        $r="select name from user where username='$username'";
        $res=mysqli_query($con,$r);
        $nam=mysqli_fetch_row($res);
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['name']=$nam[0];
        echo $_SESSION['name'];
        header("Location:home.php");
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
        
        position:absolute;
        top:40%;
        left:50%;
        transform:translate(-50%,-50%);
        padding:20px;
        background-color:rgba(89, 101, 101, 0.247);
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