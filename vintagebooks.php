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

    </style>


    <center>
       <h2><pre style=" font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><b>             At present these books are only available for online reading...</pre></i></b></h2>
        <h2><b><i>We are trying to bring the hard copy of the books soon...</i></b></h2>
        <h4>To access them click <a href="https://drive.google.com/drive/folders/1XuVODZez1hFZ03TvtpBs_aaibWSgMyPm">here</a></h4>
        
        <br><br>
        <?php
            $con=mysqli_connect("localhost","root","","books");
            $q="select sno,name from vintagebooks";
            $re=mysqli_query($con,$q);
            
            echo "<table border='1'>
                <tr>
                <th>Sno</th>
                <th>Name</th>
                </tr>";
                while(($res=mysqli_fetch_assoc($re))){
                    echo "
                    <tr>
                    <td>".$res['sno']."</td>
                    <td>".$res['name']."</td>
                    </tr>
                        
                    ";
            
                }echo "</table>";
            echo "<style> 
            table,th,td{
                border-collapse:collapse;
                width: 300px;
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
            
            
        ?>
    </center>
    </html>