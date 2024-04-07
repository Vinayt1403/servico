<?php
session_start();
// Include connection.php here
// Assuming $db is your database connection variable from "connection.php"

if (!isset($_GET['request_id']) || !isset($_GET['action']) || $_GET['action'] != 'accept') {
    // Redirect or show error if the request ID or action is not properly set or the action is not 'accept'
    echo "Invalid access.";
    exit;
}

$requestId = $_GET['request_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enter Service Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            min-width: 320px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="date"],
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="handle_request.php" method="post">
        <input type="hidden" name="request_id" value="<?php echo htmlspecialchars($requestId); ?>">
        <input type="hidden" name="action" value="accept">
        <div>
            <label for="service_date">Service Date:</label>
            <input type="date" name="service_date" required>
        </div>
        <div>
            <label for="expected_cost">Expected Cost:</label>
            <input type="number" name="expected_cost" step="0.01" required>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
