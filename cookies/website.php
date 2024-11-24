<?php
session_start(); // Start session

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

if (isset($_SESSION['counter'])) {
    $_SESSION['counter'] += 1;
} else {
    $_SESSION['counter'] = 1;
}

$my_Msg = "Visited " . $_SESSION['counter'] . " time during this session.";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Team Profile</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap");

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-image: url("school.png");
    background-attachment: fixed;
    background-size: 200vh;
    background-position: center;
    background-repeat: no-repeat;
}


.wrapper .title {
    text-align: center;
}

.title h3{
    margin-left: 90px;
    display: inline-flex;
    padding: 20px;
    color: lightyellow;
    font-size: 30px;
    font-weight: 500;
    letter-spacing: 1.2px;
    word-spacing: 5px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    background-color: rgba(0,0,0,0.4);
    text-transform: uppercase;
     -webkit-backdrop-filter: blur(15px);
      backdrop-filter: blur(15px); 
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    word-wrap: break-word;
    
}
.logo {
    margin-top: 20px;
    text-align: right;
}

.logo img{
   
    display: inline-block;
    width: 90px;
    height: 90px;
}
.semi p{
    color: lightyellow;
    background-color: rgba(0, 0, 0, 0.4);
    padding: 20px;
    display: inline-block;
}
.header-wrapper {
    display: flex;
    justify-content: space-between; 
    align-items: center;
    padding: 0 20px;
    margin-top: 20px;
}
.wrapper{
    margin-bottom: 40px;
}

.wrapper .teamprofile{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin: 40px 0;
    margin-bottom: 80px;
}
.teamprofile{
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    background-color: rgba(0, 0, 0, 0.3);
    margin-bottom: 20px;


}

.teamprofile .card{
    position: relative;
    width: 230px;
    height: 300px;
    margin: 20px;
    overflow: hidden;
    box-shadow: 0 30px 30px -20px rgba(0, 0, 0, 1),
                inset 0 0 0 1000px rgba(67, 52, 109, .6);
    border-radius: 25px;
    display: flex;
    justify-content: center;
    align-items: center;

}

.card .members, .members img{
    width: 100%;
    height: 100%;

}
.mmembers.selected {
    border-color: #007bff;
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
}

.card .content{
    position: absolute;
    bottom: -160px;
    width: 100%;
    height: 160px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
   -webkit-backdrop-filter: blur(15px);
      backdrop-filter: blur(15px); 
    box-shadow: 0 -10px 10px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 25px;
    transition: bottom 0.5s;
    transition-delay: 0.65s;
}

.card:hover .content{
    bottom: 0;
    transition-delay: 0s;
    background-color: rgba(0, 0, 0, 0.3);
}

.content .contented h3 {
    text-transform: uppercase;
    color: lightyellow;
    letter-spacing: 2px;
    font-weight: 500;
    font-size: 18px;
    text-align: center;
    margin: 20px 0 15px;
    line-height: 1.1em;
    transition: 0.5s;
    transition-delay: 0.6s;
    opacity: 0;
    transform: translateY(-20px);
}

.card:hover .content .contented h3{
    opacity: 1;
    transform: translateY(0);
}


.content .contented h3 span{
    font-size: 12px;
    font-weight: 300;
    text-transform: initial;
}

.content .sci{
    position: relative;
    bottom: 10px;
    display: flex;
}

.content .sci li{
    list-style: none;
    margin: 0 10px;
    transform: translateY(40px);
    transition: 0.5s;
    opacity: 0;
    transition-delay: calc(0.2s * var(--i));
}

.card:hover .content .sci li{
    transform: translateY(0);
    opacity: 1;
}

.content .sci li a{
    color: #fff;
    font-size: 24px;
}

</style>

<body>
<div class="header-wrapper">
    <div class="semi">
        <p>INTPROG - Group 11</p>
    </div>
    <div class="logo">
        <img src="Pic/IMG_6284.PNG">
    </div>
</div>
	 <div class="wrapper">
       
        <div class="title">
            
            <h3>Group Members</h3>
        </div>

<div class="teamprofile">
<div class="card">
<div class="members">
	<img src="Pic/paul.jpg">
</div>	
<div class="content">
    <div class="contented">
                        <h3>Paul Riceann Castro <br><span>Certified Loverboi</span></h3>
                    </div>
	  <ul class="sci">
                       	<li style="--i: 1">
                            <a href="https://www.facebook.com/profile.php?id=61550497588485"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li style="--i: 2">
                            <a href="https://github.com/PaulMiggy"><i class="fa-brands fa-github"></i></a>
                        </li>
                        <li style="--i: 3">
                            <a href="https://www.linkedin.com/in/paul-ricean-miguel-castro-53a696322/"><i class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>	
		
			</div>
    <div class="card">
<div class="members">
    <img src="Pic/jhercy.jpg">
</div>  
<div class="content">
    <div class="contented" >
                        <h3>Jhercy Combras <br><span>Certified Singer</span></h3>
                    </div>
      <ul class="sci">
                        <li style="--i: 1">
                            <a href="https://www.facebook.com/jhercy.combras.9"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li style="--i: 2">
                            <a href="https://github.com/JhercyCombras"><i class="fa-brands fa-github"></i></a>
                        </li>
                         <li style="--i: 3">
                            <a href="www.linkedin.com/in/jhercy-combras-a4a694322"><i class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>  
        
            </div>
<div class="card">
<div class="members">
    <img src="Pic/gab.jpg">
</div>  
<div class="content">
    <div class="contented">
                        <h3>Gabriel Edma <br><span>Certified skibidi</span></h3>
                    </div>
      <ul class="sci">
                        <li style="--i: 1">
                            <a href="https://www.facebook.com/cyberkidd.666"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li style="--i: 2">
                            <a href="https://github.com/Cracked-Potato?"><i class="fa-brands fa-github"></i></a>
                        </li>
                        <li style="--i: 3">
                            <a href="https://www.linkedin.com/in/john-gabriel-edma-189900213/"><i class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>  
        
            </div>
    <div class="card">
<div class="members">
    <img src="Pic/lorenz.jpg">
</div>  
<div class="content">
    <div class="contented">
                        <h3>Lorenz Diaropa <br><span>Certified Fanum Tax</span></h3>
                    </div>
      <ul class="sci">
                        <li style="--i: 1">
                            <a href="https://www.facebook.com/lorenz.diaropa.12"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li style="--i: 2">
                            <a href="https://github.com/LorenzGabriel"><i class="fa-brands fa-github"></i></a>
                        </li>
                        <li style="--i: 3">
                            <a href="https://ph.linkedin.com/in/lorenz-gabriel-9aa692322"><i class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>  
        
            </div>
            <div class="card">
<div class="members">
    <img src="Pic/adi.jpg">
</div>  
<div class="content">
    <div class="contented">
                        <h3>Adrian Javier <br><span>Certified Rizzler</span></h3>
                    </div>
      <ul class="sci">
                        <li style="--i: 1">
                            <a href="https://www.facebook.com/Adiitot17"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li style="--i: 2">
                            <a href="https://github.com/AdiJavier"><i class="fa-brands fa-github"></i></a>
                        </li>
                        <li style="--i: 3">
                            <a href="https://www.linkedin.com/in/adrian-javier-39348a322/"><i class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>  
             <script src="script.js"></script>
            </div>

		</div>
       
	</div>
</div>

<div class="footer">
    <?php include('./footer.php') ?>
    <?php

    if (isset($_COOKIE['Username'])) {
        $username = htmlspecialchars($_COOKIE['Username']);
        echo "<div class='welcome-message' style='color: black; font-size: 25px; position: fixed; bottom: 40px; right: 20px; text-transform: uppercase;'>Welcome, " . $username . "!</div>";
    } else {
        echo "<div class='welcome-message' style='color: black; font-size: 25px; position: fixed; bottom: 40px; right: 20px; text-transform: uppercase;'>Welcome, Guest!</div>";
    }


    echo "<div style='color: black; font-size: 15px; position: fixed; bottom: 20px; right: 20px;'>$my_Msg</div>";
    ?>
</div>

</body>
</html>
