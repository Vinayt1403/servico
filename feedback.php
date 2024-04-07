<?php
session_start();
include_once 'connection.php';
if (isset($_SESSION['myuser'])) {
    $sess= $_SESSION['myuser'];
    $usid=$_GET['did'];
    $pfid=$_GET['pid']; 
    $bfid=$_GET['bid'];
  }
  $fetch_uid =mysqli_query($db, "SELECT * FROM myrec WHERE email='$sess'");
 if($fetch_uid){
    while($result=mysqli_fetch_assoc($fetch_uid))
    {
        $userid=$result["id"];
    }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give Feedback</title>
    <style>
        .button {
  height: 55px;
  width: 100%;
  color: #fff;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 30px;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  background: rgb(130, 106, 251);
}
.form .button:hover {
  background: rgb(88, 56, 250);
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  color: #333;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #707070;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

<?php include "include/header.php"?>
<section class="container">
<h1 style="color: #333; font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color: #f0f0f0; border-radius: 10px;">Give Opinion</h1>
<form method="POST" class="form" >
                 <div class="input-box">
                     <textarea  name="des" placeholder="Tell Us Your Exerience?" class="form-control" cols="30" rows="10" required></textarea>
                 </div>
                 <input type="submit" class="button" name='feed'>       
</form>
</section>
</body>
</html>
<?php
include("connection.php");
     
            if(isset($_POST['feed']))
                {     
                 $feed=$_POST['des'];
                    $fid_ins=mysqli_query($db,"insert into feedback(fid,uid,pid,booking_id,fdes)values('','$usid','$pfid','$bfid','$feed')");
                    if($fid_ins)
                    {
                        echo("<script>alert('Feedback Submmited! You Will be Informed Shortly!'); window.location.href='notification.php';</script>");
                    }
                    else{
                        echo("<script>alert('Error Submitting Feedback');</script>");
                    }
                }
                ?>
          