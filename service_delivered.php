<?php
include("connection.php");
if(isset($_POST['id'])) {
    $bid = $_POST['id'];
    $update_status=mysqli_query($db,"UPDATE booking_requests SET status='delivered' WHERE id='$bid'");  
    if( $update_status) {
        echo "<script>alert('Thank You Visit Again!!') location.href('notification.php')</script>";
    } else {
        echo "<script>alert('Error');</script>";
    }
}
?>