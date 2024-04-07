<?php
session_start();
include_once 'connection.php';

// Check if user is logged in and the provider_id is set
if(isset($_SESSION['user_id']) && isset($_POST['provider_id']) && isset($_POST['problem_description'])) {
    $user_id = $_SESSION['user_id'];
    $provider_id = $_POST['provider_id'];
    $problem_description = $_POST['problem_description'];

    // Insert the booking request
    $stmt = $db->prepare("INSERT INTO booking_requests (user_id, provider_id, problem_description) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $provider_id, $problem_description);
    if($stmt->execute()) {
        echo "Request Sent Successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error: User not logged in or provider ID missing.";
}
?>
