<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <style>
    .btn1{
        background-color:red;
        border-color:red;
        border-radius:5px;
        box-shadow:1px 1px 3px 1px gray;
        color:white;
    }  
    nav{
      padding:50px;
    }
    .btn1:hover{
        background-color:lime;
        border-color:aqua;
        border-radius:5px;
        box-shadow:1px 1px 3px 1px gray;
        color:white;
    }    
  
    </style>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-light bg-dark">
      <div class="container-fluid justify-content-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">   <!--flex-grow-0: Used For center Alignment-->     
         <ul class="navbar-nav">
           <li class="nav-item">
            <a class="navbar-brand" href="#" style="color:yellow;">Serv<font style="color:blue;">ico</font></a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="apply_prov.php">Apply</a>
            </li>&nbsp;
            <li class="nav-item">
              <a class="nav-link" href="providers.php">Providers</a>
            </li>&nbsp;&nbsp;
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="About.php">About</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " aria-current="page" href="notification.php">Notifications</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                Profile
             </a>
            </li>&nbsp;&nbsp;
             <li class="nav-item">
              <a class="nav-link" href="#">
                  <?php echo($sess); ?>
                </a>
            </li> 
       <li class="nav-item">
         <a class="nav-link" href="#"> 
         <button onclick="fun()" class="btn1" name='log'>Logout</button>
        <script>
        function fun()
        {
          const response=confirm('Are You Sure To Logout');
          if(response)
          {
            location.href="logout.php";
          }
        }
        </script>
      </a>
            </li>&nbsp;&nbsp;
          </ul>
        </div>
      </div>
    </nav>
 </header>

</body>
</html>