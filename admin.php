<?php
session_start();
include_once 'connection.php';
if (isset($_SESSION['myadmin'])) {
    $sess= $_SESSION['myadmin'];
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
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
 @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
     .popup{
    /*  background-color: #f0f0f0; */
      border-radius: 10px; 
      padding: 20px; 
    /*  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
      display:flex;
     }
    
   .btn1
   {
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
 body{
        background:linear-gradient(#DFD4EC,#E4E2E6);
        background-repeat:no-repeat;
        background-size:100% 100%;
        height:100%; 
        width:100%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;   
        }
        .col-6 {
            flex: 0 0 50%; 
            max-width: 50%;
            padding: 0 10px; 
            box-sizing: border-box; 
        }
        
        .col-6 {
            background-color: #f0f0f0;
            border: 3px solid #ddd;
            padding: 20px;
            box-sizing: border-box;
        }
        @media (max-width: 768px) {
            .col-6 {
                flex: 0 0 100%; 
                max-width: 100%;
            }
        }
        .modal-foot {
         display:flex;
         justify-content:center;
         padding:5px;
         flex-direction:row;
        }
        .modal-foot button{
          margin:5px;
        }
      /*scrollable pouop*/
      .modal-body {
    overflow-x: auto;
    max-height: 80vh;
  }
  .table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd; /* Border for the entire table */
    }

    /* CSS for table header */
    .table th {
        padding: 8px;
        text-align: left;
        background-color: #f2f2f2; /* Background color for table header */
        border: 1px solid #ddd; /* Border for table header */
    }
    .table td {
        padding: 8px;
        border: 1px solid #ddd; 
    }

    /* CSS for hover effect on table rows */
    .table tbody tr:hover {
        background-color: #f5f5f5; /* Background color on hover */
    }
  
    </style>
</head>
<body>
  <script src="logic.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div>
<header>
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
                echo($sess);
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
 <h1 style="color: #333; font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color: #f0f0f0; border-radius: 10px;">Dashboard</h1>
<div class="main-body">
<div class="row">
        <div class="col-6">
            <h2>No of Users</h2>
            <p style="font-size:50px"> 
            <?php include("connection.php");  
             $res = mysqli_query($db, "select id from myrec");
             $count=0;
             if ($res) {
                while ($data = mysqli_fetch_assoc($res)) {
                  $count++;
                }
             echo($count);
              }
            ?>
         </p>
        </div>
        <div class="col-6">
            <h2>No of Services</h2>
            <p style="font-size:50px">
            <?php include("connection.php");  
             $res = mysqli_query($db, "select pid from prov");
             $count=0;
             if ($res) {
                while ($data = mysqli_fetch_assoc($res)) {
                  $count++;
                }
             echo($count);
              }
            ?>
          </p>
        </div>
        <div class="col-6">
            <h2>No of Service Providers</h2>
            <p style="font-size:50px">
            <?php include("connection.php");  
             $res = mysqli_query($db, "select pid from prov");
             $count=0;
             if ($res) {
                while ($data = mysqli_fetch_assoc($res)) {
                  $count++;
                }
             echo($count);
              }
            ?>
          </p>
        </div>
        <div class="col-6">
            <h2>No of Happy Customers</h2>
            <p style="font-size:50px">
            <?php include("connection.php");  
             $res = mysqli_query($db, "select id from myrec");
             $count=0;
             if ($res) {
                while ($data = mysqli_fetch_assoc($res)) {
                  $count++;
                }
             echo($count);
              }
            ?>
          </p>
        </div>
  </div>

<!--Row No 2-->
<div class="row">
        <div class="col-6">
            <h2>Users</h2>
            <p><Button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2">Manage User</Button></p>
        </div>
        <div class="col-6">
            <h2>Providers And Services</h2>
            <p><Button id="btn1" class="btn btn-primary" data-toggle="modal" data-target="#modal1" >Manage Providers</Button>
            </p>
        </div>
  </div>


</div>
</div>

<!-- First Popup-->
<!-- Manage User -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="popup" id="popup1">
          <form action="#" method="post">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res = mysqli_query($db, "select * from myrec");
                  if ($res) {
                    while ($data = mysqli_fetch_assoc($res)) {
                      echo("<tr>");
                      echo("<td>" . $data['id'] . "</td>");
                      echo("<td>" . $data['name'] . "</td>");
                      echo("<td>" . $data['email'] . "</td>");
                      echo("<td>" . $data['contact'] . "</td>");
                      echo("<td>" . $data['username'] . "</td>");
                      echo("<td>" . $data['role'] . "</td>");
                      echo("</tr>");
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-foot">
        <button type="button" class="btn btn-success" id="btn1" data-toggle="modal" data-target="#user_add">Add User</button>
        <button type="button" id="btn1" class="btn btn-info" data-toggle="modal" data-target="#user_update">Update User</button>
        <button type="button" id="btn1" data-toggle="modal" data-target="#user_delete" class="btn btn-warning">Delete User</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Add-->
<div id="user_add" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form method="POST">
    <div class="form-group" style="padding:15px;">
    <label for="uid">Enter id</label>
    <input name="id" class="form-control" type="text" placeholder="Enter Id" required>
    <label for="exampleInputEmail1">Enter Name</label>
    <input name="name" class="form-control" type="text" placeholder="Enter Name" required >
   <label for="exampleInputEmail1">Enter Email</label>
    <input  name="uemail" type="email" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="Enter email" required>
    <label for="ucno">Enter Number</label>
    <input name="ucno" class="form-control" type="text" placeholder="Enter Number" required>
    <label for="exampleInputPassword1">Password</label>
    <input name="upass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required>
    <label for="uname">Enter Username</label>
    <input name="uname" class="form-control" type="text" placeholder="Enter Username" required>
    <label for="urole">Enter Role</label>
    <input name="urole" class="form-control" type="text" placeholder="Enter 1 for user 2 for provider" required>

  </div>
   <input type="submit"  class="btn btn-success" name='addsub'>
  </form>
    </div>
  </div>
  <?php
 include("connection.php");
 if(isset($_POST['addsub']))
 {
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["uemail"];
    $number=$_POST["ucno"];
    $pass=$_POST["upass"];
    $username=$_POST["uname"];
    $urole=$_POST["urole"];
 $ins="insert into myrec values('$id','$name','$email','$number','$pass','$username','1','')";
 mysqli_query($db,$ins);
 if($ins)
 {
echo("<script>
alert('User Added Succesfully');
</script>");
}
else
{
echo("<script>
alert('User Not Added');
</script>");
}
}
?>
</div>

<div  id="user_update" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form method="POST">
    <div class="form-group" style="padding:15px;">
    <label for="uid">Enter id</label>
    <input name="id" class="form-control" type="text" placeholder="Enter Id" required>
   </div>
   <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>---Select---</option>
        <option Value="Name">Name</option>
        <option Value="Email">Email</option>
        <option Value="cno">Contact Number</option>
        <option Value="pass">Password</option>
        <option Value="rid">Role Id</option>
      </select>
    </div>
    <script>
      var selectElement = document.getElementById('inputSelect');
      selectElement.addEventListener('change', function() {
        var selectedValue = selectedOption.value;
        if(selectedValue=="Name")
        {
          document.write("<input type='text' name='name' placeholder='Name' class='form-control'>");
        }
        elseif(selectedValue=="Email")
        {
          document.write("<input type='text' name='name' placeholder='Email' class='form-control'>");
        }
        elseif(selectedValue=="pass")
        {
          document.write("<input type='text' name='name' placeholder='Email' class='form-control'>");
        }
        elseif(selectedValue=="rid")
        {
          document.write("<input type='text' name='name' placeholder='Email' class='form-control'>");
        }
      });
    </script>
   <input type="submit"  class="btn btn-success" name='addsub'>
  </form>
    </div>
  </div>
</div>

<div  id="user_delete" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form method="POST">
    <div class="form-group" style="padding:15px;">
    <label for="uid">Enter id</label>
    <input name="id" class="form-control" type="text" placeholder="Enter Id" required>
   </div>
   <input type="submit" class="btn btn-success" name='delsub'>
    </form>
    </div>
  </div>
  <?php
  include("connection.php");
  if(isset($_POST['delsub']))
  {
  $id=$_POST["id"]; 
  $del="delete * from myrec where id='$id'";
  $res=mysqli_query($db,$del);
  if($res)
  {
  echo("<script>
  window.alert('User Deleted Succesfully');
  </script>");
 }
  else
  {
   echo("<script>
   window.alert('User Not Deleted');
   </script>");
 }
}
  ?>
</div>

<!-- Second Popup -->
<!-- Manage Providers -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body" style="overflow-x: auto; max-height: 60vh;">
        <div class="popup" id="popup1">
          <form action="#" method="post">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Provider ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Provider Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Email</th>
                    <th scope="col">Registration Date</th>
                    <th scope="col">City</th>
                    <th scope="col">Aadhar Number</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res = mysqli_query($db, "select * from prov");
                  if ($res) {
                    while ($data = mysqli_fetch_assoc($res)) {
                      echo("<tr>");
                      echo("<td>" . $data['pid'] . "</td>");
                      echo("<td>" . $data['uid'] . "</td>");
                      echo("<td>" . $data['pname'] . "</td>");
                      echo("<td>" . $data['pdes'] . "</td>");
                      echo("<td>" . $data['pemail'] . "</td>");
                      echo("<td>" . $data['pcity'] . "</td>");
                      echo("<td>" . $data['p_aadhar'] . "</td>");
                      echo("</tr>");
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-foot">
        <button type="button" class="btn btn-success" id="btn1" data-toggle="modal" data-target="#prov_add">Add Provider</button>
        <button type="button" id="btn1" class="btn btn-info" data-toggle="modal" data-target="#service_update">Update Provider</button>
        <button type="button" id="btn1" data-toggle="modal" data-target="#service_delete" class="btn btn-warning">Delete User</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Providers Request-->
<div id="prov_add" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

  </div>
    </div>
    </div>

  
<h1 style="color: #333; font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color: #f0f0f0; border-radius: 10px;">Provider's Request</h1>
<!-- HTML code for admin interface -->
<?php
// Fetch data from database
$query = "SELECT * FROM prov where status='invalid'";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>
            <th>Provider ID</th>
            <th>User ID</th>
            <th>Category ID</th>
            <th>Service ID</th>
            <th>Provider Title</th>
            <th>Service Description</th>
            <th>Provider Email</th>
            <th>City</th>
            <th>Adhaar</th>
            <th>Action</th>
          </tr>";
    echo "</thead>";
    echo "<tbody>";

    while($row = mysqli_fetch_assoc($result)) {        
        echo "<tr>";
        echo "<td>{$row['pid']}</td>";
        echo "<td>{$row['uid']}</td>";
        echo "<td>{$row['category_id']}</td>";
        echo "<td>{$row['sid']}</td>";
        echo "<td>{$row['pname']}</td>";
        echo "<td>{$row['pdes']}</td>";
        echo "<td>{$row['pemail']}</td>";
        echo "<td>{$row['pcity']}</td>";
        echo "<td><img src='{$row['p_aadhar']}' alt='User Image' style='width: 70px; height:70;'></td>";

        echo "<td>
            <form action='admin/provider_accept_request.php' method='post'>
                <input type='hidden' name='pid' value='{$row['pid']}'>
                <input type='hidden' name='uid' value='{$row['uid']}'>
                
                <button type='submit' class='btn btn-info'>Mark As Provider</button>
            </form>
            </td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<div class='alert alert-success' role='alert'><marquee behavior='scroll' direction='left' scrollamount='10' scrolldelay='100' loop='-1'>No Pending Requests!!</marquee></div>";
}
?>

</body>
</html>