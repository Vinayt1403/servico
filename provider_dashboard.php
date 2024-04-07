<?php
session_start();
include("connection.php");
$uid = $_SESSION["myuser2"];
//echo "Logged in as: " . htmlspecialchars($uid, ENT_QUOTES, 'UTF-8'); // Safely display user ID
$res = mysqli_query($db, "SELECT p.pid FROM prov p WHERE p.uid = '$uid'");
if ($res) {
    while ($data = mysqli_fetch_assoc($res)) {
        $provider_id = $data['pid'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }
        header {
            background: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #444;
            color: #fff;
        }
        td {
            background: #fff;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            font-size: 1.2em;
        }
        .message-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .message {
            margin: 20px auto;
            padding: 10px;
            border-radius: 5px;
            color: #ffffff;
            font-size: 1.1em;
            width: fit-content;
        }
        .accepted {
            background-color: #4CAF50;
        }
        .rejected {
            background-color: #f44336;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
        }
        .action-button {
            padding: 5px 10px;
            margin: 0 5px;
            cursor: pointer;
            border: none;
            color: white;
        }
        .accept-btn {
            background-color: #4CAF50;
        }
        .reject-btn {
            background-color: #f44336;
        }

    /*service details*/
    .box-container {
    width: 80%;
    margin: 50px auto;
    background-color:#EAF2D4;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  .box-container h1 {
    color: #333;
    text-align: center;
    padding: 20px;
    margin: 0;
    border-radius: 10px;
    background-color: beige;
  }
  .form-group {
    margin-bottom: 20px;
  }
  .form-control {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }
  button[name="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  button[name="submit"]:hover {
    background-color: #0056b3;
  }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-light bg-dark">
      <div class="container-fluid justify-content-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">   <!--flex-grow-0: Used For center Alignment-->
        <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>        
         <ul class="navbar-nav">
         <li class="nav-item"> 
         <a class="navbar-brand nav-link" href="#" style="color:yellow;">Serv<font style="color:white;">ico</font></a>
      </li>
             <li class="nav-item">
              <a class="nav-link" href="#">
              <?php 
                echo($uid);
                ?>
                </a>
            </li>&nbsp;&nbsp;

       <li class="nav-item">
         <a class="nav-link" href="#"> 
         <button onclick="fun()" class="btn1" name='log'>Logout</button>
        <script>
        function fun()
        {
          const response=confirm('Are You Sure To Logout');
          if(response)
          {
            location.href="logout.php";
          }
        }
        </script>
      </a>
            </li>&nbsp;&nbsp;
          </ul>
        </div>
      </div>
    </nav>
 </header>

 <main>

 <div class="box-container">
 <h1 style="color: #333; font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color:beige; border-radius: 10px;"><marquee behavior="scroll" direction="left" scrollamount="10" scrolldelay="100" loop="-1">Your Service Details</marquee></h1>
 <?php 
$sqli=mysqli_query($db,"select * from prov where uid='$uid'");
while($data=mysqli_fetch_array($sqli))
{
?>
<h4><?php echo htmlentities($data['pname']);?>'s Service Details</h4>
<hr />													
<form role="form" name="edit" method="post">
												
	<div class="form-group">
		<label for="fname">
		</label>
		<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['pemail']);?>" >
	</div>

    <div class="form-group">
	  <label for="address">Description</label>
       <textarea name="address" class="form-control"><?php echo htmlentities($data['pdes']);?></textarea>
      </div>

     <div class="form-group">
	  <label for="address">Address</label>
       <textarea name="address" class="form-control"><?php echo htmlentities($data['padress']);?></textarea>
      </div>

      <div class="form-group">
	     <label for="city">City</label>
		<input type="text" name="city" class="form-control" required="required"  value="<?php echo htmlentities($data['pcity']);?>" >
      </div>
     <div class="form-group">
		<label for="bg">Cost</label>
		<input type="text" name="bg" class="form-control" value="<?php echo htmlentities($data['cost']);?>" >
      </div>

      <div class="form-group">
		<label for="bg">Pincode</label>
		<input type="text" name="bg" class="form-control" value="<?php echo htmlentities($data['pincode']);?>" >
      </div>

      <button onclick="window.location.href='edit-details.php'" class="btn btn-o btn-primary">Edit Details</button>
 </form>
   <?php } ?>
</div>



        <?php if (isset($_SESSION['message'])): ?>
            <div class="message-container">
                <div class="message <?php echo htmlspecialchars($_SESSION['message_type'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8'); ?>
                </div>
            </div>
            <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
        <?php endif; ?>



        <section class="booking-records">
            <h2>Booking Records</h2>
            <div id="bookingRecords">
                <?php
                    if (isset($db) && $provider_id !== null) {
                        $stmt = $db->prepare("SELECT myrec.name, myrec.email, myrec.contact, myrec.ucity, booking_requests.id as request_id FROM booking_requests JOIN myrec ON booking_requests.user_id = myrec.id WHERE provider_id = ? AND status = 'pending'");
                        $stmt->bind_param("i", $provider_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        if ($result->num_rows > 0) {
                            echo "<table>";
                            echo "<tr><th>Name</th><th>Email</th><th>Contact</th><th>City</th><th>Actions</th></tr>";
                            while ($user = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td>" . htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td>" . htmlspecialchars($user['contact'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td>" . htmlspecialchars($user['ucity'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td class='action-buttons'>";
                                echo "<button type='button' onclick=\"window.location.href='service_details_form.php?request_id=" . $user['request_id'] . "&action=accept'\" class='action-button accept-btn'>Accept</button>";
                                echo "<form method='post' action='handle_request.php' style='display:inline;'>";
                                echo "<input type='hidden' name='request_id' value='" . $user['request_id'] . "'>";
                                echo "<button type='submit' name='action' value='reject' class='action-button reject-btn'>Reject</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "<div class='no-data'>No pending booking requests.</div>";
                        }
                    } else {
                        echo "<div class='no-data'>Database connection not established.</div>";
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>