<?php
session_start();
include_once 'connection.php';
if (isset($_SESSION['myuser'])) {
    $sess= $_SESSION['myuser'];
  }
   else {
    // Handle the case where 'myuser' is not set in the session.
    echo 'User not logged in or session expired.';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .note{
    background-color: #f2f2f2; 
    background-image: linear-gradient(45deg, #ff8a00, #e52e71);
    border-radius: 10px; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Drop shadow */
    padding: 20px; 
    margin: 20px; 
    color: #333; 
    height:fit-content;
    width: fit-content;
}

/*table*/
.view-bookings {
    display: inline-block;
    max-width: 100%;
    overflow-x: auto;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px; 
    background-color: #f9f9f9; 
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 8px;
    border: 1px solid #ddd; 
    text-align: left;
}

.table thead th {
    background-color: #343a40; 
    color: #fff; /* Header text color */
}

.table tbody tr:nth-child(even) {
    background-color: #f2f2f2; 
}

.table-striped tbody tr:nth-child(odd) {
    background-color: #ffffff; 
}

.table-striped tbody tr:nth-child(even) {
    background-color: #f2f2f2; 
}

.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.button {
  height: 55px;
  width: 100%;
  color: #fff;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 30px;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  background: rgb(130, 106, 251);
}
.button:hover {
  background: rgb(88, 56, 250);
}

    </style>
</head>

<body>
<?php include "include/header.php"?>
   
<h1 style="color: #333; font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color: #f0f0f0; border-radius: 10px;">Notifications</h1>
<div class="note">  
<?php
include("connection.php");

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    echo "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Notifications</title>";
    echo "<style>body { font-family: Arial, sans-serif; margin: 20px; } ul { list-style-type: none; padding: 0; } li { margin-bottom: 10px; } .unread { font-weight: bold; } a { color: blue; text-decoration: none; } a:hover { text-decoration: underline; } .mark-all-read { margin-top: 20px; display: inline-block; }</style>";
    echo "</head><body>";

    // Fetch only unread notifications
    $query = "SELECT * FROM notifications WHERE user_id = ? AND status = 'unread' ORDER BY created_at DESC";

    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($notification = $result->fetch_assoc()) {
                echo "<li class='unread'>" . htmlspecialchars($notification['message']) . " - <a href='mark_as_read.php?id=" . $notification['id'] . "'>Mark as Read</a></li>";
            }
            echo "</ul>";
            // Link to mark all notifications as read
            echo "<a href='mark_all_as_read.php' class='mark-all-read'>Mark all as read</a>";
        } else {
            echo "No notifications.";
        }
    }

    echo "</body></html>";
} else {
    echo "Please log in to view notifications.";
}
?>
</div>


<!--View Bookings Section-->
<h1 style="color: #333; font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color: #f0f0f0; border-radius: 10px;">Your Bookings</h1>

<div class="view-bookings">
   
            <?php
            $res = mysqli_query($db, "select * from booking_requests where user_id='$userId' and status='accept'");
            if ($res) {
                while ($data = mysqli_fetch_assoc($res)) {
                    echo("<table class='table table-bordered table-striped'>
                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>Transaction ID</th>
                            <th scope='col'>Time Of Request</th>
                            <th scope='col'>Date Of Delivery</th>
                            <th scope='col'>Approx Cost</th>
                            <th scope='col'>Status</th>
                            <th scope='col'>Actions</th> 
                        </tr>
                    </thead>
                    <tbody>");
                    echo("<tr>");
                    echo("<td>" . "BK" . $data['id'] . "</td>");
                    echo("<td>" . $data['created_at'] . "</td>");
                    echo("<td>" . $data['service_date'] . "</td>");
                    echo("<td>" . "Rs" . $data['expected_cost'] . "</td>");
                    echo("<td>" . $data['status'] . "</td>");
                    echo("<td>
                    <form action='service_delivered.php' method='post'>
                        <input type='hidden' name='id' value='{$data['id']}'>
                        <button type='submit' class='btn btn-success'>Mark As Delivered</button>               
                    </form>
                    </td>");
                    echo("</tr> </tbody>
                    </table>");
                }
            }
            else{
                echo "<div class='alert alert-success' role='alert'><marquee behavior='scroll' direction='left' scrollamount='10' scrolldelay='100' loop='-1'>No Pending Requests!!</marquee></div>";
                echo("No Pending Requests");
            }
            ?>     
</div>



<h1 style="color: #333; font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color: #f0f0f0; border-radius: 10px;">Previous Bookings</h1>

<div class="view-bookings">
   
            <?php
            $res = mysqli_query($db, "select * from booking_requests where user_id='$userId' and status='delivered'");
            if ($res) {
                while ($data = mysqli_fetch_assoc($res)) {
                    echo("<table class='table table-bordered table-striped'>
                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>Transaction ID</th>
                            <th scope='col'>Time Of Request</th>
                            <th scope='col'>Date Of Delivery</th>
                            <th scope='col'>Approx Cost</th>
                            <th scope='col'>Status</th>
                            <th scope='col'>Feedback</th> 
                        </tr>
                    </thead>
                    ");
                    echo("<tbody><tr>");
                    echo("<td>" . "BK" . $data['id'] . "</td>");
                    echo("<td>" . $data['created_at'] . "</td>");
                    echo("<td>" . $data['service_date'] . "</td>");
                    echo("<td>" . "Rs" . $data['expected_cost'] . "</td>");
                    echo("<td>" . $data['status'] . "</td>");
                    echo("<td>
                    <form action='feedback.php' method='get'>
                        <input type='hidden' name='did' value='{$data['user_id']}'>
                        <input type='hidden' name='pid' value='{$data['provider_id']}'>
                        <input type='hidden' name='id' value='{$data['id']}'>
                        <button type='submit' class='btn btn-info'>Give Feedback</button> 
                    </form>                        
                    </td>");
                    echo("</tr> </tbody>
                    </table>");
                }
            }
            else{
                echo "<div class='alert alert-success' role='alert'><marquee behavior='scroll' direction='left' scrollamount='10' scrolldelay='100' loop='-1'>No Pending Requests!!</marquee></div>";
  
            }
            ?>     
</div>

<!-- Feedback Modal -->
<div class="modal fade" id="feedModal" tabindex="-1" role="dialog" aria-labelledby="feedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedModalLabel">Provide Your Opinions</h5>
            </div>
            <div class="modal-body">
                 <form action="feedback.php" method="POST" class="form" >
                 <div class="input-box">
                     <textarea  name="des" placeholder="Tell Us Your Exerience?" class="form-control" cols="30" rows="10" required></textarea>
                 </div>
                 <input type="submit" class="button" name='feed'>       
                </form>
             </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to handle click event and open modal
    $(document).ready(function() {
        $('.make-payment-btn').click(function() {
            $('#paymentModal').modal('show');
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

<?php include "include/footer.php"?>

</body>
</html>

