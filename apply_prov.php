<?php 
                session_start();
                if (isset($_SESSION['myuser'])) {
                  $sess= $_SESSION['myuser'];
               
                }
                ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <!-- Link to Bootstrap CSS for card styling -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <link href="css/index.css"  rel="stylesheet"> 
   <style>
   /*  .container {
    max-width: 800px;
    margin: 10 auto; 
    padding: 20px; 
    background-color:blueviolet;
    box-sizing: border-box; 
    border-radius: 10px; 
}
.container-item{
  padding: 20px; 
    background-color:white; 
    color:black; 
    margin:20px;
    border-radius: 10px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 

}
 Responsive styles 
@media screen and (max-width: 600px) {
    .container {
        padding: 10px; 
    }
}*/
         /*End*/


  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.container {
  background: rgb(130, 106, 251);
  position: relative;
  max-width: 700px;
  width: 100%;
  background: #fff;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}
.container header {
  font-size: 1.5rem;
  color: #333;
  font-weight: 500;
  text-align: center;
}
.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  color: #333;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #707070;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 15px;
}
.form .gender-box {
  margin-top: 20px;
}
.gender-box h3 {
  color: #333;
  font-size: 1rem;
  font-weight: 400;
  margin-bottom: 8px;
}
.form :where(.gender-option, .gender) {
  display: flex;
  align-items: center;
  column-gap: 50px;
  flex-wrap: wrap;
}
.form .gender {
  column-gap: 5px;
}
.gender input {
  accent-color: rgb(130, 106, 251);
}
.form :where(.gender input, .gender label) {
  cursor: pointer;
}
.gender label {
  color: #707070;
}
.address :where(input, .select-box) {
  margin-top: 15px;
}
.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #707070;
  font-size: 1rem;
}
.form .button {
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
.form .button:hover {
  background: rgb(88, 56, 250);
}
/*Responsive*/
/*@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }
  .form :where(.gender-option, .gender) {
    row-gap: 15px;
  }
}*/
    </style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  <!-- Navbar -->

<?php include "include/header.php"?>
 <!--Body -->
 <h1 style="color: #333; font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color: #f0f0f0; border-radius: 10px;">Apply As A Provider</h1>
<div>
<section class="container">
      <header>Registration Form</header>
      <form method="POST" action="apply_prov2.php" class="form" enctype="multipart/form-data">
        <div class="input-box">
          <label>Enter Title</label>
          <input name="title" type="text" class="form-control" placeholder="Enter Buisness Title" required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" name="uemail"  class="form-control" placeholder="Enter Email address" required />
        </div>

          <div class="select-box">
               <?php
                include "connection.php";
                 $sql ="SELECT * FROM services";
                 $result = mysqli_query($db,$sql);
                 if ($result->num_rows > 0) {
                  echo '<select class="form-select" id="category" name="category" class="form-control" required>';
                  echo '<option selected>Select Service</option>';
                  while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option>'.$row["sname"].'</option>';
                  }}
                   echo '</select>';
                ?>
                </div>
        <div class="input-box">
          <label>Provide Description</label>
          <textarea  name="des" placeholder="Tell Us What Your Service Containes?" class="form-control" cols="30" rows="10" required></textarea>
        </div>

        <div class="input-box">
          <label>Enter Charges</label>
          <input type="text" name="cost"  class="form-control" placeholder="Per Day Charges You Bear" required />
        </div>

        <div class="input-box address">
          <label>Address</label>
          <input type="text" name="addr" placeholder="Enter street address" required />
          <div class="column">
            <div class="select-box">
              <select name="ustate"  class="form-control">
                <option hidden>State</option>
                <option>Maharashtra</option>
                <option>Goa</option>
                <option>Karnataka</option>
                <option>Gujrat</option>
              </select>
            </div>
            <div class="select-box">
            <?php
                include "connection.php";
                 $sql ="SELECT * FROM city";
                 $result = mysqli_query($db,$sql);
                 if ($result->num_rows > 0) {
                  echo '<select class="form-select" id="ucity" name="ucity"  class="form-control">';
                  echo '<option selected>Select City</option>';
                  while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option>'.$row["city_name"].'</option>';
                  }}
                   echo '</select>';
                ?>
              </div>
          </div>
          <div class="input-box">
           <label>Enter Pincode</label>
            <input type="number" name="pin"  class="form-control" placeholder="Enter postal code" required />
          </div>
          <div class="input-box">
          <label>Upload Aadhar</label>
          <input name="adhar"  class="form-control" type="file">
          </div>
        </div>
        <input type="submit" class="button" name='addprov'>       
      </form>
    </section>
</div>

<?php include "include/footer.php"?>

</body>
</html>

<!-- <input type="submit"  class="btn btn-success" name='addprov'> -->
