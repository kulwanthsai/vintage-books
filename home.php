<!DOCTYPE html><head>
    <meta charset="utf-8">
</head>
<body class="hell">
<nav>
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

<center><pre style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ; font-size: 40px; margin-top: 10px;">Welcome to Vintage Books</pre>
<pre style="font-size: 18px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">                                                             -----Your Gateway to Preloved Literary Treasures!</pre></center>
        <div class="slider-wrapper">
            <div class="slider">
                <img id="img1" src="sage1.jpeg">
                <img id="img2" src="img2.jpg">
                <img id="img3" src="img.jpg">
            </div>
            <div class="slider-nav">
                <a href="#img1"></a>
                <a href="#img2"></a>
                <a href="#img3"></a>
            </div>
        </div>
   
   
    <h3>Discover a world of captivating stories, hidden within the pages of gently used books. At BookBazaar, we are passionate about connecting book lovers and providing a platform for the exchange of cherished tales. Whether you're seeking a beloved classic, a rare edition, or simply looking to declutter your bookshelf, our virtual marketplace is the ideal destination.</h3>
    <div class="intro"><h2 style="color:green;"><img src="why.png"> Why BookBazaar?</h2>
    <h4>Unearth Literary Gems:</h4> <i>Dive into an expansive collection of second-hand books, ranging from timeless classics to contemporary masterpieces. Our diverse selection caters to every genre and taste, ensuring you'll find a captivating read that resonates with your soul.</i>
    <h4>Eco-Conscious Reading:</h4><i>By embracing preloved books, you're not only indulging in an affordable reading experience but also contributing to sustainable practices. Join us in reducing waste and extending the lifespan of these literary treasures.</i></div>
    <div class="introduction">    <h4>Connect with Fellow Bibliophiles:</h4> <i>BookBazaar is more than just a marketplace; it's a thriving community of book enthusiasts. Engage in lively discussions, share recommendations, and interact with like-minded readers who share your passion for the written word.</i>
    
    <h4>Easy Buying and Selling:</h4> <i>With our user-friendly platform, buying and selling preloved books has never been easier. List your books effortlessly, browse through detailed descriptions, and communicate directly with sellers to negotiate the perfect deal.</i>
    
<h4>Secure Transactions:</h4><i> Rest assured that your transactions are protected on BookBazaar. We prioritize your safety and privacy, implementing robust security measures to ensure a seamless and trustworthy shopping experience.</i><br><br></div>
    <div class="foot"><footer>
    Join BookBazaar today and embark on a literary adventure like no other. Uncover hidden treasures, forge meaningful connections, and breathe new life into stories waiting to be discovered. Let the pages turn and the magic unfold as you delve into the captivating world of preloved books.<br>
    <center><a href="">about us</a><br><br>
    <a href="">sell a book</a><br><br>
    <a href="">buy a book</a><br><br>
<a href="">contact us?</a></center>
</footer></div>
</i>
    </p></body>
    <style>
          body {
            background-color: #f5eadc;
            margin: 0;
            padding: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .container{
            width: 600px;
            height: 20px;
            left: 300px;
            display: flex;
            justify-content: center;
            border-radius: 100px;
            padding: 20px;
            background-color: rgb(182, 192, 199);
            align-items: center;
            position: relative;  
            margin-top: 2%;

        }
        .container input{
            background: transparent;
            flex: 1;
            border: 0;
            outline: none;
            font-size: 20px;
        }
        .container button img{
            width: 25px; 
            border-radius: 200px;
        }
        .container button{
            background:transparent;
            border:0;
            cursor: pointer;           
            
                }
        .slider-wrapper{
            position: relative;
            max-width: 48rem;
            margin: 0 auto;
        }
        .slider{
            display: flex;
            aspect-ratio: 16/9;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            border-radius: 10px;
            box-shadow: 0 1.5rem 3rem --0.75rem hsla(0, 0%, 0%, 0.25);
        }
        .slider img{
            opacity: 0.75;
            flex:1 0 100%;
            scroll-snap-align: start;
        }
        .slider-nav{
            display: flex;
            column-gap: 1rem;
            position: absolute;
            bottom: 1.25rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
        }
        .slider-nav a{
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            background-color: white;
            opacity: 0.75;
            transition: opacity ease 250ms;
        }

        .foot{
            height: fit-content;
            width: 95%;
            margin-top: 1%;
            background-color: rgba(89, 101, 101, 0.247);
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;

        }
        .intro{
            height: fit-content;
            width: 95%; 
            border-radius: 30px;
            padding: 20px;
        }
        .intro img{
            width: 55px;
            background: transparent;
            padding-right: 5px;
        }
        .introduction{
            height: fit-content;
            width: 95%;
            padding: 20px;
        }

    </style>


</html>
