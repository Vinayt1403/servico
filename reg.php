<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="vin.css">
    <style>  
    @import url('https://fonts.googleapis.com/css2?family=Nunito&family=Prompt:wght@300&family=Roboto+Mono:wght@400;500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Nunito&family=Prompt:wght@300&family=Roboto+Mono:wght@400;500&family=Rokkitt&family=Zilla+Slab:wght@500&display=swap');

.popup{
        width:450px;
        right:35%;
        background-color: white;
        box-shadow:0px 0px 10px 3px gray;
        transition:0.5s;
        border-radius:10px;
    }
    .forhover:hover{
    transform:perspective(20px)scale3d(1,1.11,1);
}
.main{
    display:flex;
        flex-wrap:wrap;
        align-items:center;
        justify-content:space-around;
}

body{ 
    background:url("img/login.webp");
        background-repeat:no-repeat;
        background-size:100% 100%;
        height:100vh; 
        width:100%;
    }
#btn1{
        background-color:red;
        border-color:red;
        border-radius:5px;
        box-shadow:1px 1px 3px 1px gray;
        color:white;
    }
   
    

    </style>
</head>
<body>
<!-- Header section -->
<div>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:blue;">Serv<font style="color:black;">ico</font></a>
    <div>
    <ul class="navbar-nav me-auto mb-2 mb-lg-2">
      <li class="nav-item" style="padding:3px;">
          <input type="button" onclick="fun()" class="forhover" id="btn1" value="Log In" >
          <script>
            function fun()
            {
            location.href="log.php";
            }
            </script> 
        </li>
        </ul> 
        </div>
        </div>
</nav>
</div>

<!-- Body Section-->
<div class="main">
<div style="cursor:pointer;" class="popup">
<form method="POST">
<table style="left:720px;  text-align:center; margin:50px;"  cellpadding="10px">
<tr><td colspan="2" bgcolor="" style="border-radius:10px;"><font size="5" style="margin:20px;"><b>Sign Up</b></font</td></tr>
<tr>
<td>Enter Name</td>
<td><input type="text" class="form-control" name="n1" required></td>
</tr>
<tr>
<td>City
</td>
<td>
            <?php
                include "connection.php";
                 $sql ="SELECT * FROM city";
                 $result = mysqli_query($db,$sql);
                 if ($result->num_rows > 0) {
                  echo '<select class="form-select" id="ucity" name="ucity"  class="form-control">';
                  echo '<option selected>Select City</option>';
                  while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option>'.$row["city_name"].'</option>';
                  }}
                   echo '</select>';
                ?>
</td>
</tr>
<tr>
<td>Enter Email</td>
<td><input type="email" class="form-control"  name="ename" required></td>
</tr>
<tr>
<td>Enter Mobile</td>
<td><input type="number" class="form-control" name="num" required></td>
</tr>
<tr>
<td>Enter Password</td>
<td><input type="password" class="form-control" name="pname" required></td>
</tr>
<tr>
<td>Enter Username</td>
<td><input type="text" class="form-control" name="uname" required></td>
</tr>
<tr>
<td colspan="2"><input type="submit" class="forhover" style="width:145px;height:40px; background-color:#0099cc; border-color:#0099cc; border-radius:10px;" id="sub" name="sub2" Value="Sign In"></td>
</tr>
</table>
</form>
</div>

</div>
</body>
</html>

<?php
//include("connection.php");
if(isset($_POST['sub2']))
{
    
    $name=$_POST['n1'];
    $email=$_POST['ename'];
    $number=$_POST['num'];
    $pass=$_POST['pname'];
    $username=$_POST['uname'];
    $city=$_POST['ucity'];

$db=mysqli_connect('localhost','root','');
$createdb=mysqli_query($db,'create database if not exists serv');

mysqli_close($db);
$db=mysqli_connect('localhost','root','','servo');
$tbl="create table if not exists myrec(id integer primary key AUTO_INCREMENT,name varchar(15) not null,email varchar(30) unique,contact integer(10) unique,password varchar(15) not null,username varchar(15),role int(1))";
$tblres=mysqli_query($db,$tbl);


$ins = "insert into myrec(id,name, email, contact, password, username, ucity) values ('','$name','$email','$number', '$pass', '$username','$city')";
$res=mysqli_query($db,$ins);
if($res)
{
echo("<script>
alert('Signup Success');
location.href='log.php';
</script>");
}
else
{
echo("<script>alert('Already Exists Or Error')</script>");
}
}
?>

</body>
</html>