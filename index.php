<?php include("login.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<style>
	#topContainer {
		background-image:url("images/technology.jpg");
		background-repeat: no-repeat;
		background-size:cover;
		width:100%;	
	}
	
	#topRow {
		margin-top:100px;
		text-align:center;
	}
	
	#topRow h1 {
		font-size:300%;
		color:#FBB917;
	}
	
	#topRow p {
		color:#FBB917;
	}
	
	.marginTop {
		margin-top:30px;
	}
	
	.center {
		text-align:center;
	}
	
	#footer {
		background-color:#B0D1FB;
	}
	
	.marginBottom {
		margin-bottom:30px;
	}
	
</style>

  <body>
  
  <div id="container">
    
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand" href="#">Guestbook</a>
			</div>
			
			<div class="collapse navbar-collapse" id="myNavbar">
				
				<form class="navbar-form navbar-right" method="post">
					<div class="form-group">
						<input type="email" name="loginemail" placeholder="email" class="form-control" value="<?php echo addslashes($_POST['loginemail']);?>"/>
					</div>
					<div class="form-group">
						<input type="password" name="loginpassword" placeholder="password" class="form-control" value="<?php echo addslashes($_POST['loginpassword']);?>"/>
					</div>
					<input type="submit" name="submit" class="btn btn-success" value="Log In" />
				</form>
				
			</div>
		</div>
	</nav>
    
				
	
	<div class="container contentContainer" id="topContainer">
	
		<div class="row">
		  
		  <div class="col-md-6 col-md-offset-3" id="topRow">
		  
			<h1 class="marginTop">Simple Guestbook</h1>
			
			<p class="lead marginTop">Sign up below!</p>
			
			<?php
			
				if ($error) {
					
					echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
					
					
					
				}
			
			?>
			
			<form class="marginTop" method="post">
				
				<div class="form-group">
					
					<label for="email">Email Address</label>
					
					<input type="email" name="email" class="form-control" placeholder="your email" value="<?php echo addslashes($_POST['email']);?>"/>
				
				</div>
				
				<div class="form-group">
					
					<label for="password">Password</label>
					
					<input type="password" name="password" class="form-control" placeholder="your password" value="<?php echo addslashes($_POST['password']);?>"/>
				
				</div>
				
				<div class="form-group">
					
					<label for="nickname">Nickname</label>
					
					<input type="text" name="nickname" class="form-control" placeholder="your nickname" value="<?php echo addslashes($_POST['nickname']);?>"/>
				
				</div>
					<input type="submit" name="submit" value="Sign Up" class="btn btn-success marginTop" />
			</form>	
		  
		  </div>
		 
		</div>
	</div>
	
	
  </div>
   
  
  <script>
	$(".contentContainer").css("min-height",$(window).height());
  </script>

  </body>
</html>