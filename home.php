<?php 
include("connection.php");
                session_start();
                if (isset($_SESSION['myuser'])) {
                  $sess= $_SESSION['myuser'];
                
                } else {
                  echo("<script>location.href('logout.php');</script>");
                  echo 'User not logged in or session expired.';
                }

$result = $db->query("SELECT * FROM prov");
$providers = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $providers[] = $row;
    }
}
?>

<?php
$current_hour = date('H');
if ($current_hour >= 5 && $current_hour < 12) {
    $greeting_message = "Good morning!";
    $color = "#FF5733";
} elseif ($current_hour >= 12 && $current_hour < 18) {
    $greeting_message = "Good Aternoon!";
    $color = "#2980B9";
} elseif($current_hour >= 18 && $current_hour <= 23) {
    $greeting_message = "Good Evening!";
    $color = "#6C3483";
}
else{
  $greeting_message = "Good Night!";
  $color = "#45718E";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="css/homepage_css.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito&family=Prompt:wght@300&family=Roboto+Mono:wght@400;500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Nunito&family=Prompt:wght@300&family=Roboto+Mono:wght@400;500&family=Rokkitt&family=Zilla+Slab:wght@500&display=swap');
  .service-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 20px;
  }
  .service-item {
    background-color: #f2f2f2;
    padding: 20px;
    text-align: center;
    border-radius:10px;
    height:500px;
  }
  .service-item:hover{
    transform:perspective(1px)scale3d(1,1.04,1.05);
  }
  /*css for welcome plummber image and div*/
  .welcome{
          display:flex;
          flex-direction:row;
          flex-wrap:wrap;
          justify-content:space-around;
          padding:2%;  
          background:url("img/food5.jpg") no-repeat center center/cover;
        
        }
  .hello{
           font-size:25px;
           color:rgba(223, 108, 26, 0.99);
           padding:3px;
         }
        .hobby{  
           font-size:21px;
           color:rgb(6, 108, 186);
           padding:6px;
         } 
      
  p{
    margin:10%;
  }
  .btn1{
        background-color:red;
        border-color:red;
        border-radius:5px;
        box-shadow:1px 1px 3px 1px gray;
        color:white;
    }  
    .btn1:hover{
        background-color:lime;
        border-color:aqua;
        border-radius:5px;
        box-shadow:1px 1px 3px 1px gray;
        color:white;
    }    
    .btns{
      padding:1%;
      margin:1%;
    }

    /*services*/
 

  /*footer*/
  .foot{
       width:100%;
       background-color:rgb(40, 35, 34);
       display: grid;
       grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
       gap: 20px;
        }
        .footer-item{
          display:flex;
          flex-wrap:wrap;
          flex-direction:column;
          margin:2%;     
        }
        li{
           list-style-type:none;
           color:azure;
           gap: 5px;
        }
        li:hover{
          transform:perspective(40px)scale3d(1.1,1.2,1.3);
        }

        /*animation*/
      
</style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  <!-- Navbar -->

<?php include "include/header.php"?>
<?php
$sel=mysqli_query($db,"select name from myrec where email='$sess'"); 
while($row=mysqli_fetch_assoc($sel))
{
  $username=$row['name'];
}
?>
<div class="alert alert-success" role="alert" style="color: <?php echo $color; ?>; font-weight: bold; animation: pulse 1s infinite;">
<marquee behavior='scroll' direction='left' scrollamount='10' scrolldelay='100' loop='-1'><?php echo $greeting_message, '&nbsp', $username; ?></marquee>
</div>

 <div class="welcome" style="margin-top:-15px;background-image: url(img/plumber-4427401_1920.jpg);  background-size: cover;
    height: calc(100vh + 10px);">
    <div class="welcome-des">
        <div class="hello">Servico</div>
        <div class="hobby">Explore The Nearby Services Here!</div>
        <div class="btns">
           <div class="container mt-3">
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Services Here" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
       </div>
        </div>
    </div>
    <div class="welcome-image">
      <p style="font-size:30px; color:white;">Customer's Happiness is our Aim</p>
    </div>
</div>


<!-- Slideshow-->

<!--Intro Manual-->
<h1 style="text-align: center; margin: 20px 0; background-color: gainsboro;">How This Works</h1>
    <div style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; margin-top: 20px;">
        <div style="background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin: 20px; padding: 20px; text-align: center; width: 300px;">
            <script src="https://cdn.lordicon.com/lordicon.js"></script>
            <lord-icon src="https://cdn.lordicon.com/egmlnyku.json" trigger="hover" style="width: 150px; height: 150px;"></lord-icon>
            <h5 style="font-size: 20px; margin-bottom: 10px;">Find An Expert</h5>
            <p style="font-size: 16px; margin: 0;">Find the perfect expert for your needs.</p>
        </div>
        <div style="background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin: 20px; padding: 20px; text-align: center; width: 300px;">
            <script src="https://cdn.lordicon.com/lordicon.js"></script>
            <lord-icon src="https://cdn.lordicon.com/mebvgwrs.json" trigger="hover" style="width: 150px; height: 150px;"></lord-icon>
            <h5 style="font-size: 20px; margin-bottom: 10px;">Create An Account</h5>
            <p style="font-size: 16px; margin: 0;">Create your account to access all features.</p>
        </div>
        <div style="background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin: 20px; padding: 20px; text-align: center; width: 300px;">
            <script src="https://cdn.lordicon.com/lordicon.js"></script>
            <lord-icon src="https://cdn.lordicon.com/iuqcjilb.json" trigger="hover" style="width: 150px; height: 150px;"></lord-icon>
            <h5 style="font-size: 20px; margin-bottom: 10px;">Explore</h5>
            <p style="font-size: 16px; margin: 0;">Explore a wide range of services available.</p>
        </div>
    </div>


<h1 class="text-primary" style="margin:10px">Trending Services</h1>

<?php include "include/footer.php"?>


</body>
</html>