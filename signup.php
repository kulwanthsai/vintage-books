<!DOCTYPE html><head>
    <meta charset="utf-8">
</head>
<body class="hell">
<center><div class="signup">
<form method="post" action="signup.php">
    <h1><i>Signup here...</i></h1>
<label>Name :</label><input type="text" name="name"><br><br>
<label>Mobile :</label><input type="text" name="mobile"><br><br>
<label>Username :</label><input type="text" name="username"><br><br>
<label>Password :</label><input type="password" name="password"><br><br>
<label>Mailid :</label><input type="text" name="mailid"><br><br><center>
<input type="submit" name="submit" value="submit"><p id="fill"style="color:red;"></p><br><p id="fil"style="color:green;"></p></center></div>
</form><center>
<?php
$con=mysqli_connect("localhost","root","","books");

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $mailid=$_POST['mailid'];
    $row=0;
    $qu="select name from user where username='$username'";
        $re=mysqli_query($con,$qu);
        $row=mysqli_num_rows($re);
    if($name==""||$mobile==""||$username==""||$password==""||$mailid==""){
        echo "<script>
        document.getElementById('fill').innerText='please fill all the details...';</script>";
    }
    elseif($row>0){
        echo "<script>
        document.getElementById('fill').innerText='username already exists...please choose another username...';</script>";
    }
    else{
    $query="insert into user values('$name','$mobile','$username','$password','$mailid')";
    $r=mysqli_query($con,$query);
    if($r){
        echo "
        to signin click <a href='signin.php' >here</a>
        <script>
        document.getElementById('fil').innerText='registered successfully...';</script>";
        echo "<br>";
        
    }
}}


?>
<style>
    .signup{
        display:flex;
        background:rgba(89, 101, 101, 0.247);
        border-radius: 20px;
        position:absolute;
        top:40%;
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