<!DOCTYPE html><head>
    <meta charset="utf-8">
</head>
<body class="hell">
<center>
    
<div class="signup">

<form method="post" action="buyersignup.php">
<h1><i>Signup here...</i></h1>
<label>Name :</label><input type="text" name="name"><br><br>
<label>Mobile :</label><input type="text" name="mobile"><br><br>
<label>username :</label><input type="text" name="username"><br><br>
<label>password :</label><input type="password" name="password"><br><br>
<label>mailid :</label><input type="text" name="mailid"><br><center><br>
<input type="submit" name="submit" value="submit"><p id="fill"style="color:red;"></p></center><br><p id="fil"style="color:green;"></p><p id="fi"style="color:green;"></p></div>
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
    $qu="select name from buyer where username='$username'";
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
    $query="insert into buyer values('$name','$mobile','$username','$password','$mailid')";
    $r=mysqli_query($con,$query);
    if($r){
        echo " to signin click <a href='buyersignin.php' >here</a>
        <script>
        document.getElementById('fil').innerText='Registered successfully...';</script>";
        
    }
    else{
        echo "registration unsuccessful...";
    }}
}

?>
<style>
    .signup{
        display:flex;
        flex-direction:column;
        background:rgba(89, 101, 101, 0.247);
        border-radius: 20px;
        position:absolute;
        top:40%;
        left:50%;
        transform:translate(-50%,-50%);
        padding:20px;


    }
    signup label{
        display:inline-block;
    }
    body {
            background-color: #f5eadc;
            margin: 0;
            padding: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</html>