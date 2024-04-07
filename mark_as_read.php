<?php
session_start();
include("connection.php");

if(isset($_GET['id']) && isset($_SESSION['user_id'])) {
    $notificationId = $_GET['id'];
    $userId = $_SESSION['user_id'];

    $query = "UPDATE notifications SET status = 'read' WHERE id = ? AND user_id = ?";
    if($stmt = $db->prepare($query)) {
        $stmt->bind_param("ii", $notificationId, $userId);
        $stmt->execute();
    }
}

header("Location: notification.php");
exit;
?>
