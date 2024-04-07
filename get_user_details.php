<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.user-details {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
}

.user-details h2 {
    margin-top: 0;
    font-size: 24px;
    color: #333;
}

.detail {
    margin-bottom: 10px;
}

.label {
    font-weight: bold;
    color: #666;
}

.value {
    color: #333;
}

.aadhaar-img {
    width: 200px;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 5px;
}
</style>

</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<?php
include("connection.php");

if(isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    $query = "SELECT * FROM prov WHERE id = $userId";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $html = "<div>";
        $html .= "<p><strong>Provider ID:</strong> {$row['pid']}</p>";
        $html .= "<p><strong>User ID:</strong> {$row['uid']}</p>";
        $html .= "<p><strong>Category ID:</strong> {$row['category_id']}</p>";
        $html .= "<p><strong>Service ID:</strong> {$row['sid']}</p>";
        $html .= "<p><strong>Provider Title:</strong> {$row['pname']}</p>";
        $html .= "<p><strong>Service Description:</strong> {$row['pdes']}</p>";
        $html .= "<p><strong>Provider Email:</strong> {$row['pemail']}</p>";
        $html .= "<p><strong>Provider City:</strong> {$row['pcity']}</p>";
        $html .= "<p><strong>Aadhaar:</strong> <img src='{$row['p_aadhar']}' alt='Aadhaar Image' style='width: 200px; height: auto;'></p>"; 
        $html .= "</div>";
        echo $html;
    } else {
        echo "User not found";
    }
} else {
    echo "Invalid request";
}
?>
  
</body>
</html>
