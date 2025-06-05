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
    $path="";
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
            <table class="table table-bordered">
                <tr>
                    <td><img class="profile-picture" height="100px" width="100px" src="<?php echo $path ?>"></td>
                    <td><input type="file" name='upload'></td>
                    <td><input type="submit" name='sub' class="btn btn-info"></td>
                </tr>
                <?php
                $name = "";
                $contact = "";
                $email = "";
                $username = "";
                $password = "";
                $res = mysqli_query($db, "SELECT * FROM myrec WHERE email='$sess'");
                if ($res) {
                    $data = mysqli_fetch_assoc($res);
                    $name = $data['name'];
                    $contact = $data['contact'];
                    $email = $data['email'];
                    $username = $data['username'];
                    $password = $data['password'];
                }
                ?>

                <tr>
                    <td>Name</td>
                    <td><input type="text" name="new_name" class="form-control" value="<?php echo $name; ?>"></td>
                    <td><button class="btn btn-info" name="update_name">Update</button></td>
                </tr>

                <tr>
                    <td>Mobile</td>
                    <td><input type="text" name="new_mobile" class="form-control" value="<?php echo $contact; ?>"></td>
                    <td><button class="btn btn-info" name="update_mobile">Update</button></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type="text" name="new_email" class="form-control" value="<?php echo $email; ?>"></td>
                    <td><button class="btn btn-info" name="update_email">Update</button></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="new_username" class="form-control" value="<?php echo $username; ?>"></td>
                    <td><button class="btn btn-info" name="update_username">Update</button></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="new_password" class="form-control" value="<?php echo $password; ?>"></td>
                    <td><button class="btn btn-info" name="update_password">Update</button></td>
                </tr>
            </table>
        </div>
    </form>
</div>

<?php
if(isset($_POST['sub'])){
    if(isset($_FILES["upload"]) && $_FILES["upload"]["error"] == 0) {
        $file_name = $_FILES["upload"]["name"];
        $file_tmp = $_FILES["upload"]["tmp_name"];
        $file_destination = "profile-pic/" . $file_name;

        if(move_uploaded_file($file_tmp, $file_destination)) {

          $ins = "update myrec set profile_pic='$file_destination' where email='$sess'";
            $ins_res=mysqli_query($db, $ins);
        }
    } 
}
?>


<!-- Updation Logic-->
<?php

if(isset($_POST['update_name'])) {
    $newName = $_POST['new_name'];
    $updateQuery = "UPDATE myrec SET name='$newName' WHERE email='$sess'";
    $result = mysqli_query($db, $updateQuery);
    if($result) {
        echo "<script>alert('Name Updated');</script>";
    } else {
        echo "<script>alert('Error updating name');</script>";
    }
}

if(isset($_POST['update_mobile'])) {
    $newMobile = $_POST['new_mobile'];
    $updateQuery = "UPDATE myrec SET contact='$newMobile' WHERE email='$sess'";
    $result = mysqli_query($db, $updateQuery);
    if($result) {
        echo "<script>alert('Mobile Updated');</script>";
    } else {
        echo "<script>alert('Error updating mobile');</script>";
    }
}

if(isset($_POST['update_email'])) {
    $newEmail = $_POST['new_email'];
    $updateQuery = "UPDATE myrec SET email='$newEmail' WHERE email='$sess'";
    $result = mysqli_query($db, $updateQuery);
    if($result) {
        echo "<script>alert('Email Updated');</script>";
    } else {
        echo "<script>alert('Error updating email');</script>";
    }
}

if(isset($_POST['update_username'])) {
    $newUsername = $_POST['new_username'];
    $updateQuery = "UPDATE myrec SET username='$newUsername' WHERE email='$sess'";
    $result = mysqli_query($db, $updateQuery);
    if($result) {
        echo "<script>alert('Username Updated');</script>";
    } else {
        echo "<script>alert('Error updating username');</script>";
    }
}

if(isset($_POST['update_password'])) {
    $newPassword = $_POST['new_password'];
    $updateQuery = "UPDATE myrec SET password='$newPassword' WHERE email='$sess'";
    $result = mysqli_query($db, $updateQuery);
    if($result) {
        echo "<script>alert('Password Updated');</script>";
    } else {
        echo "<script>alert('Error updating password');</script>";
    }
}
?>



  <?php include "include/footer.php"?>

</body>

</html>






