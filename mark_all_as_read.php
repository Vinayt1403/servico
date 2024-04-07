<?php
session_start();
include("connection.php");

if(isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $query = "UPDATE notifications SET status = 'read' WHERE user_id = ?";
    if($stmt = $db->prepare($query)) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
    }
    $query2=mysqli_query($db,"UPDATE bookings_request SET status='Accepted' WHERE user_id=?");

}

header("Location: notification.php");
exit;
?>
