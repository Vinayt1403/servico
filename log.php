<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito&family=Prompt:wght@300&family=Roboto+Mono:wght@400;500&display=swap');
        * {
            font-family: 'Nunito', sans-serif;
            font-family: 'Prompt', sans-serif;
            font-family: 'Roboto Mono', monospace;
        }
        #btn1 {
            background-color: red;
            border-color: red;
            border-radius: 5px;
            box-shadow: 1px 1px 3px 1px gray;
            color: white;
        }
        body {
            background: url("img/login.webp") no-repeat;
            background-size: 100% 100%;
            height: 100vh;
            width: 100%;
        }
        #container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;
        }
        #flex-item {
            height: 100%;
        }
    </style>
</head>
<body>
<div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:blue;">Serv<font style="color:black;">ico</font></a>
            <div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-2">
                    <li class="nav-item" style="padding:3px;">
                        <input type="button" onclick="location.href='reg.php';" class="forhover" id="btn1" value="Sign Up">
                    </li>
                </ul> 
            </div>
        </div>
    </nav>
</div>
<div class="whole-body">
    <div id="container">  
        <div id="flex-item">
            <form method="POST">
                <table style="text-align:center; margin:5px; background-color:aliceblue;box-shadow: 2px 2px 2px 2px gray; height:500px; width:430px; border-radius:10px;" cellpadding="15px">
                    <tr><td colspan="2" style="border-radius:10px; border-style:solid; border:gray;"><font size="5" style="margin:20px;"><b>Log In</b></font></td></tr>
                    <tr>
                        <td style="font-family:calibri;  margin:10px;">Email</td>
                        <td><input type="text" placeholder="Enter Email" class="form-control" name="ename" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" placeholder="Enter Password" class="form-control" name="pname" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" class="forhover" name="sub" Value="Sign In" style="color:white; width:100px; height:40px; background-color:#0099cc;border-color:#0099cc; border-radius:10px; box-shadow:2px 3px 3px gray;"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div style="color:red;" id="message"></div></td>
                    </tr>
                    <tr>
                        <td><article style="color:green;">Forgot Password</article></td>
                        <td><article class="forhover" style="color:blue;"><a href="forgot.php">Click Here</a></article></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
session_start();
include("connection.php");
if(isset($_POST['sub'])){
    $em = mysqli_real_escape_string($db, $_POST["ename"]);
    // The password should be verified, not directly matched. This is a placeholder.
    $pa = $_POST["pname"];
    
    $stmt = $db->prepare("SELECT id, password, role FROM myrec WHERE email = ?");
    $stmt->bind_param("s", $em);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $user = $result->fetch_assoc();
        // Here, you'd use password_verify($pa, $user['password']) in a real scenario
        if($pa == $user['password']){ // Placeholder comparison
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            
            switch($user['role']){
                case 0:
                    $_SESSION['myadmin'] = $em;
                    header("location:admin.php");
                    break;
                case 1:
                    $_SESSION['myuser'] = $em;
                    header("location:home.php");
                    break;
                case 2:
                    $_SESSION['myuser2'] = $user['id'];
                    header("location:provider_dashboard.php");
                    break;
            }
            exit();
        } else {
            echo "<script>document.getElementById('message').innerHTML = 'Invalid Email Or Password!!!';</script>";
        }
    } else {
        echo "<script>document.getElementById('message').innerHTML = 'Invalid Email Or Password!!!';</script>";
    }
}
?>
