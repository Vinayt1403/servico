<?php
include("../connection.php");
if(isset($_POST['pid']) && isset($_POST['uid'])) {
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    $update_role=mysqli_query($db,"UPDATE myrec SET role='2' WHERE id='$uid'");
    $update_query = "UPDATE prov SET status='valid' WHERE pid='$pid' AND uid='$uid'";
    $update_result = mysqli_query($db, $update_query);
    
    if($update_result && $update_role) {
        echo "<script>alert('Provider Request Accepted');</script>";
    } else {
        echo "<script>alert('Error In Accepting Provider');</script>";
    }
}
?>
