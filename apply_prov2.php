<?php
session_start();
$sess=$_SESSION["myuser"];
include("connection.php");
if(isset($_POST['addprov'])) {

  $name = $_POST["title"];
  $des = $_POST["des"];
  $cost= $_POST["cost"];
  $email = $_POST["uemail"];
  $city = $_POST["ucity"];
  $addr= $_POST["addr"];
  $pincode=$_POST["pin"];
  $state=$_POST["ustate"];
  $service = $_POST["category"];

$fetch_serv= mysqli_query($db, "select * from services where sname='$service'");
  if ($fetch_serv) {
    while ($data = mysqli_fetch_assoc($fetch_serv)) {
      $sid=$data['sid'];
      $category_id=$data['category_id'];
    } 
  }

$sel= mysqli_query($db, "select id from myrec where email='$sess'");
  if ($sel) {
    while ($data = mysqli_fetch_assoc($sel)) {
      $uid=$data['id'];
    } 
  }
 
  if(isset($_FILES["adhar"]) && $_FILES["adhar"]["error"] == 0) {
    $file_name = $_FILES["adhar"]["name"];
    $file_tmp = $_FILES["adhar"]["tmp_name"];
    $file_destination = "adhar/" . $file_name;

    // Move the uploaded file to the desired location
    if(move_uploaded_file($file_tmp, $file_destination)) {
        // Insert data into database
        $ins = "INSERT INTO prov (uid,sid,category_id,pname, pdes,cost, pemail, padress,pcity,state,pincode, p_aadhar) VALUES ($uid, $sid, $category_id,'$name', '$des',$cost,'$email','$addr', '$city','$state','$pincode','$file_destination')";
        $ins_res=mysqli_query($db, $ins);
        if($ins_res) {
            echo "<script>alert('Request Sent Successfully');location.href('home.php');</script>";
        } else {
            echo "<script>alert('Request Failed');</script>";
        }
    } else {
        // Error occurred while moving the uploaded file
        echo "<script>alert('Error uploading file.');</script>";
    }
} 
}
?>
