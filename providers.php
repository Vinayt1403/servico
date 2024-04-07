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
  $fetch_uid =mysqli_query($db, "SELECT * FROM myrec WHERE email='$sess'");
 if($fetch_uid){
    while($result=mysqli_fetch_assoc($fetch_uid))
    {
        $userid=$result["id"];
    }
 }
// Assuming you've already established a $db connection in connection.php
// Fetch providers from database
/*$result = $db->query("SELECT * FROM prov");
$providers = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $providers[] = $row;
    }
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Providers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .provider-container {
            max-width: 100%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product-card {
            width: 300px;
            margin-bottom: 20px;
        }
        .product-card img {
            width: 100%;
            height: auto;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn1{
        background-color:red;
        border-color:red;
        border-radius:5px;
        box-shadow:1px 1px 3px 1px gray;
        color:white;
    }  
      .btn1:hover{
        background-color:lime;
        border-color:aqua;
        border-radius:5px;
        box-shadow:1px 1px 3px 1px gray;
        color:white;
    }    
    .btns{
      padding:1%;
      margin:1%;
    }
    .product{
        padding:5%;
        background-color:azure;
    }

    .service-item {
    background-color: #f2f2f2;
    padding: 20px;
    text-align: center;
    border-radius:10px;
    height:fit-content;
  }
  .service-item:hover{
    transform:perspective(1px)scale3d(1,1.04,1.05);
  }
    </style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

<?php include "include/header.php"?>

 <h1 style="color: #333; font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color: #f0f0f0; border-radius: 10px;">List of Providers</h1>
 <form id="search-form" method="POST">
    <div class="row justify-content-center mb-4">
        <div class="col-auto">
            <?php
                include "connection.php";
                 $sql ="SELECT * FROM city";
                 $result = mysqli_query($db,$sql);
                 if ($result->num_rows > 0) {
                  echo '<select class="form-select" id="ucity" name="ucity"  class="form-control">';
                  echo '<option selected>Serach By City</option>';
                  while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option>'.$row["city_name"].'</option>';
                  }}
                   echo '</select>';
                ?>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>

<?php
  $selectedCity =null; 
if(!empty($selectedCity)) {
    $query = "SELECT * FROM prov WHERE status='valid'";
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $selectedCity = $_POST['ucity'];

  }  // Construct the SQL query based on whether a city has been selected
?> 


<div class="modal fade" id="problemModal" tabindex="-1" role="dialog" aria-labelledby="problemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="problemModalLabel">Booking Information</h5>
            </div>
            <div class="modal-body">
                <form id="problemForm"> <!-- Add a form to capture the problem description -->
                    <div class="form-group">
                        <label for="problemDescription">Problem Description</label>
                        <textarea class="form-control" id="problemDescription" rows="5"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="submitProblemBtn">Submit</button> <!-- Add submit button -->
            </div>
        </div>
    </div>
</div>
    

 <?php
include_once 'connection.php';

// Fetch products from database
$result = $db->query("SELECT * FROM prov where status='valid' and pcity='$selectedCity'");
$providers = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $providers[] = $row;
    }
}
?>

<div class="product">
    <?php if (!empty($providers)): ?>
        <div class="row">
            <?php foreach ($providers as $provider): ?>
                <div class="col-md-4">
                <div class="service-item">
                        <img src="" alt="<?php echo $provider['pname']; ?>"> <!-- Placeholder for provider image -->
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $provider['pname']; ?></h3>
                            <p class="card-text"><?php echo $provider['pdes']; ?></p>
                            <h5>Charges/Day:<?php echo "Rs".$provider['cost']; ?></h5>
                            <h5>City: <?php echo $provider['pcity']; ?></h5>
                            <h5>Pincode: <?php echo $provider['pincode']; ?></h5>
                            <button class='btn btn-success book-now' data-provider-id="<?php echo $provider['pid']; ?>" data-toggle='modal' data-target='#problemModal'>Proceed Booking</button></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No providers found.</p>
    <?php endif;?>

<!--data-toggle='modal' data-target='#problemModal'-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.book-now').click(function() {
        var providerId = $(this).data('provider-id');
        sessionStorage.setItem('providerId', providerId); // Store provider ID in sessionStorage
        $('#providerId').text(providerId);
        $('#problemModal').modal('show');
    });

    $('#submitProblemBtn').click(function() {
        var problemDescription = $('#problemDescription').val();
        var providerId = sessionStorage.getItem('providerId');
        var userId = <?php echo json_encode($_SESSION['user_id']); ?>;

        if (providerId) { 
            $.ajax({
                url: 'create_booking_request.php',
                method: 'POST',
                data: {
                    provider_id: providerId,
                    user_id: userId,
                    problem_description: problemDescription
                },
                success: function(response) {
                    alert('Request Sent Successfully!');
                    $('#problemModal').modal('hide'); // Hide the modal after successful submission
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while processing the request.');
                    console.error(xhr.responseText);
                }
            });
        } else {
            alert('Provider ID not set.'); // Handle case where provider ID is not set
        }
    });
});
</script>
</div>


<?php include "include/footer.php"?>

</body>
</html>
