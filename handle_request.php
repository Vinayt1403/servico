<?php
session_start();
include("connection.php");

if (isset($_POST['action']) && isset($_POST['request_id'])) {
    $request_id = $_POST['request_id'];
    $action = $_POST['action'];

    if ($action == 'accept') {
        // New data for accept action
        $service_date = isset($_POST['service_date']) ? $_POST['service_date'] : null;
        $expected_cost = isset($_POST['expected_cost']) ? $_POST['expected_cost'] : null;
    }
  
    // Initialize messages
    $messageForProvider = "";
    $messageForUser = "";

    // Fetch provider name and user_id from the booking_requests table
    $bookingInfoQuery = "SELECT br.user_id, p.pname FROM booking_requests br JOIN prov p ON br.provider_id = p.pid WHERE br.id = ?";
    if ($bookingInfoStmt = $db->prepare($bookingInfoQuery)) {
        $bookingInfoStmt->bind_param("i", $request_id);
        $bookingInfoStmt->execute();
        $bookingInfoResult = $bookingInfoStmt->get_result();
        if ($bookingInfo = $bookingInfoResult->fetch_assoc()) {
            $userId = $bookingInfo['user_id'];
            $providerName = $bookingInfo['pname'];

            // For accepting a request, update with additional details
            if ($action == 'accept' && $service_date && $expected_cost) {
                $updateQuery = "UPDATE booking_requests SET status = ?, service_date = ?, expected_cost = ? WHERE id = ?";
                if ($updateStmt = $db->prepare($updateQuery)) {
                    $updateStmt->bind_param("ssdi", $action, $service_date, $expected_cost, $request_id);
                    $updateStmt->execute();

                    // Prepare and insert notification message with service details
                    $messageForUser = "Your request has been accepted by $providerName. Service Date: $service_date, Expected Cost: $expected_cost.";
                }
            } elseif ($action == 'reject') { // For rejecting a request
                $updateQuery = "UPDATE booking_requests SET status = ? WHERE id = ?";
                if ($updateStmt = $db->prepare($updateQuery)) {
                    $updateStmt->bind_param("si", $action, $request_id);
                    $updateStmt->execute();

                    // Prepare notification message for rejection
                    $messageForUser = "Your request has been rejected by $providerName.";
                }
            }

            if (isset($messageForUser) && !empty($messageForUser)) {
                // Insert a notification for the user
                $insertNotif = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
                if ($notifStmt = $db->prepare($insertNotif)) {
                    $notifStmt->bind_param("is", $userId, $messageForUser);
                    $notifStmt->execute();
                }

                // Set session message to display to the provider after redirection
                $_SESSION['message'] = "The request has been processed.";
                $_SESSION['message_type'] = $action;
            }
        } else {
            $_SESSION['message'] = "Failed to retrieve booking information.";
        }
    } else {
        $_SESSION['message'] = "Error preparing to fetch booking information.";
    }
} else {
    $_SESSION['message'] = "Invalid action or request ID.";
}

// Redirect back to the dashboard page
header("Location: provider_dashboard.php");
exit;
?>
