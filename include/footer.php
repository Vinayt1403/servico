<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <style>       
  .foot{
  padding:50px;
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


    </style>
</head>
<body>
<div class="foot">
          <div class="footer-item">
            <ul>
              <li style="font-size:large;">ABOUT US</li>
              <li><a href="providers.php">Services</a></li>
              <li>News</li>
              <li>Trends</li>
              <li>Categories</li>
            </ul>
          </div>
           <div class="footer-item">
              <li>CONTACT US</li>
              <li>Servico</li>
              <li>buisness.vi08@gmail.com</li> 
              <li>+919420288601</li>
          </div>
          <div class="footer-item">
          <ul><li>Follow Us</li></ul>
          <ul style="display:flex; flex-direction:row;">
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><img width="40px" height="40px" src="img/instagram.png"></a></li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><img width="40px" height="40px" src="img/twitter.png"></a></li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><img width="40px" height="40px" src="img/facebook.png"></a></li>
        </ul>
 </div>   
</body>
</html>
