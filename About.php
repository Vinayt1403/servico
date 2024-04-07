<?php 
                session_start();
                if (isset($_SESSION['myuser'])) {
                  $sess= $_SESSION['myuser'];
                
                } else {
                  echo("<script>location.href('logout.php');</script>");
                  echo 'User not logged in or session expired.';
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic,700italic|Niconne' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .contact_desc {
padding: 2em 0 3em 0;
}
.content_bottompart {
padding: 1em 0;
}
.contact-section {
	background: #515151;
	padding: 5em 0;
}
.contact-section h3 {
	text-align: center;
	color: #fff;
	font-size: 3em;
	text-transform: uppercase;
	font-weight: 300;
	margin-bottom:1em;
}
.contact-form input[type="text"], .contact-form textarea {
	width: 100%;
	border: none;
	outline: none;
	background: #fff;
	padding: 17px 18px;
	font-weight: 400;
	font-size: 15px;
	text-transform: uppercase;
	color: #7e7e7e;
	margin: 0px 0 5px 0;
	box-shadow: inset 0px 0px 3px #999;
-webkit-box-shadow: inset 0px 0px 3px #999;
-moz-box-shadow: inset 0px 0px 3px #999;
-o-box-shadow: inset 0px 0px 3px #999;
}
form.left_form {
float: left;
width: 49%;
}
form.right_form {
float: right;
width: 49%;
}
.contact-form textarea {
	height:150px;
	resize:none;
	margin:0;
}
.contact-form input[type="submit"] {
	border: none;
	outline: none;
	padding: 21px 25px;
	color: #fff;
	background: #ff9900;
	text-transform: uppercase;
	font-weight: 400;
	font-size: 18px;
	border: double #ff9900;
	display:block;
	width:100%;
}
.contact-form input[type="submit"]:hover{
border:double#fff;
text-decoration: none;
}
.contact-info {
	width: 70%;
	margin: 0 auto;
}
.contact_info {
float: right;
width: 70%;
}

      </style>
</head>
<body>
<?php include "include/header.php"?>
 

<!--Page header & Title-->
<section id="overview" class="padding-top">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
         <h2 class="heading">Servico</h2>
         <hr class="heading_space">
         <p>Launched in Sindhudurg, Servico has grown from Idea to one of the well know buisness in the Sindhudurg. We are present in Sindhudurg and cities , enabling our vision of better Service Quality for more people. We not only connect people to provide services in every context but work closely with people to enable a sustainable ecosystem.</p>
      </div>
    </div>
  </div>
</section>

<div class="contact_desc">
		        <div class="container">
		        	<h2>Contact Us</h2>
			         <div class="contact-form">
				  	   <form method="post" class="left_form">
					    	<div>
						    	<span><label>First Name</label></span>
						    	<span><input required="true" name="fname" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Last Name</label></span>
						    	<span><input required="true" name="lname" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Contact Number</label></span>
						    	<span><input required="true" name="phone" pattern="[0-9]+" maxlength="10" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input required name="email" value="<?php echo($sess)?>" type="text" class="textbox" readonly></span>
						    </div>
						   					   
					        <div>					    	
						    	<span><label>Message</label></span>
						    	<span><textarea required="true" name="message"> </textarea></span>
						    </div>
						   <div>
						   		<input type="submit" value="Submit " name="submit" />
						  </div>
					    </form>
		</div>
   	</div>
		</div>
	
<div  style="margin-top:50px;
margin-left:50px;
width: 30%;">
              <h3>Location</h3>
						  <p>Servico,Kudal City,Sindhudurg,416520</p>				   		
				   		<p>Phone:9420288601</p>
				   		<p>Timing:9AM-5PM</p>
				 	 	<p>Email: <span><a href="mailto:buisness.contactvi08@gmail.com">buisness.contactvi08@gmail.com</a></span></p>
				   		
</div>
	

<?php include "include/footer.php"?>
	

</body>
</html>