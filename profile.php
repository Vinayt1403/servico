<?php 
include("connection.php");
                session_start();
                if (isset($_SESSION['myuser'])) {
                  $sess= $_SESSION['myuser'];
                
                } else {
                  echo("<script>location.href('logout.php');</script>");
                  echo 'User not logged in or session expired.';
                }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link href="css/index.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .div1 {
      max-width: 100%;
      margin: 15px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

  table{
      margin: 7px;
  }
  
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    .profile-container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

  .profile-picture {
      max-width: 100%;
      height: auto;
      border-radius: 50%;
    }

    .profile-details {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .profile-details h2 {
      color: #333;
    }

    .profile-details p {
      color: #666;
    }
  </style>
</head>

<body>
<?php include "include/header.php"?>

  <div class="div1">
    <?php
    echo ("&nbsp Hello &nbsp&nbsp");
    echo ($sess);
    $sel=mysqli_query($db,"select * from myrec where email='$sess'");
    if($sel)
    {
      while($data=mysqli_fetch_assoc($sel))
      {
        $uid=$data["id"];
        $path=$data['profile_pic'];
      }
    }
    ?>
  </div>

  <div class="profile-container">
    <form method="POST" enctype="multipart/form-data">
    <div class="profile-details">
      <h2>Profile Details</h2>
      <table cellpadding="10px">
        <tr>
          <td><img class="profile-picture" height="10px" width="10px" src=" $path?>"></td>
          <td><input type="file" name='upload'></td>
          <td><input type="submit" name='sub' class="btn btn-info"></td>
        </tr>
        <?php
        if(isset($_POST['sub'])){
        if(isset($_FILES["upload"]) && $_FILES["upload"]["error"] == 0) {
          $file_name = $_FILES["upload"]["name"];
          $file_tmp = $_FILES["upload"]["tmp_name"];
          $file_destination = "profile-pic/" . $file_name;
      
          if(move_uploaded_file($file_tmp, $file_destination)) {
              // Insert data into database
              $ins = "update myrec set profile_pic='$file_destination' where id='$uid'";
              $ins_res=mysqli_query($db, $ins);
              if($ins_res) {
                  echo "<script>alert('Profile Updated');</script>";
              } else {
                  echo "<script>alert('Error');</script>";
              }
          } else {
              // Error occurred while moving the uploaded file
              echo "<script>alert('Error uploading file.');</script>";
          }
      } 
    }
        ?>
        <tr>
          <td>Name</td>
          <td>
            <?php
            include("connection.php");
            $res = mysqli_query($db, "select name from myrec where email='$sess'");
            if ($res) {
              while ($data = mysqli_fetch_assoc($res)) {
                echo ($data['name']);
              }
            }
            ?>
          </td>
          <td><button class="btn btn-info">Update</button></td>
        </tr>
        <tr>
          <td>Mobile</td>
          <td>
            <?php
            $res = mysqli_query($db, "select contact from myrec where email='$sess'");
            if ($res) {
              while ($data = mysqli_fetch_assoc($res)) {
                echo ($data['contact']);
              }
            }
            ?>
          </td>
          <td><button class="btn btn-info">Update</button></td>
        </tr>

        <tr>
          <td>Email</td>
          <td>
            <?php
            include("connection.php");
            $res = mysqli_query($db, "select email from myrec where email='$sess'");
            if ($res) {
              while ($data = mysqli_fetch_assoc($res)) {
                echo ($data['email']);
              }
            }
            ?>
          </td>
          <td><button class="btn btn-info">Update</button></td>
        </tr>

        <tr>
          <td>Username</td>
          <td>
            <?php
             $res = mysqli_query($db, "select username from myrec where email='$sess'");
            if ($res) {
              while ($data = mysqli_fetch_assoc($res)) {
                echo ($data['username']);
              }
            }
            ?>
          </td>
          <td><button class="btn btn-info">Update</button></td>
        </tr>
        <tr>
          <td>Password</td>
          <td>
            <?php
            $res = mysqli_query($db, "select password from myrec where email='$sess'");
            if ($res) {
              while ($data = mysqli_fetch_assoc($res)) {
                echo ($data['password']);
              }
            }
            ?>
          </td>
          <td><button class="btn btn-info"> Update </button></td>
        </tr>
      </table>
    </div>
  </form>
  </div>

  <?php include "include/footer.php"?>

</body>

</html>