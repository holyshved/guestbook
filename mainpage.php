<?php  
	session_start();
	
	include("data.php");
	
	include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Guestbook</title>
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
		margin-top:80px;
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
	
	#ava {
		margin-top:70px;
	}
	
	img {
		width:90px;
		height:90px;
	}
	
	table {
		width:100%;
		border: 1px solid grey;
		border-radius:10px;
		margin:5px;
		
	}
	td {
		text-align: left;
		padding:5px;
		
	}
	
	.userM {
		width:20%;
	}
	
	.textM {
		width:80%;
	}
	
</style>

  <body>
  
  <div id="container">
    
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			
			<div class="navbar-header pull-left">
				
				<a class="navbar-brand" href="#">Guestbook</a>
			</div>
			
			<div class="pull-right" id="myNavbar">
				
				<ul class="navbar-nav nav ">
					<li><a href="index.php?logout=1">Log Out</a></li>
					
					
				</ul>
				
			</div>
		</div>
	</nav>
    
				
	
	<div class="container contentContainer" id="topContainer">
	
		<div class="row">
		  
		  <div class="col-md-3" id="leftrow">
			
			<form id="ava" action="avat.php" method="post" enctype="multipart/form-data">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Upload Image" name="submit">
			</form>

			<?
				$q="SELECT avatar, name FROM users WHERE id = '".$_SESSION['id']."'";
				$b=mysqli_query($link, $q);
				$c = mysqli_fetch_array($b);
				echo "<img src=\"{$c['avatar']}\" />";
				echo "<br/>username: {$c['name']}";
			?>
			
		  </div>
		  
		  <div class="col-md-6 " id="topRow">
		  
			<form class="messageForm" method="post">
				
				<div class="form-input">
					<textarea type="text" name="message" placeholder="message" class="form-control"></textarea>
				</div>
					
					<input type="submit" name="submit" class="btn btn-success" value="Leave Message" />
				
			</form>
					
					<?php
			
						if ($error) {
							
							echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
							
							
							
						}

			$per_page=10;
			if ( isset($_GET['page']) ) {
				  $page = (int)$_GET['page'];
				  if ( $page < 1 ) $page = 1;
				} else {
				  $page = 1;
				}
			$start=($page-1)*$per_page;
			
			
			$q="SELECT count(*) FROM `messages`";
				$res=mysqli_query($link, $q);
				$ron=mysqli_fetch_array($res);
				$total=$ron[0];
				$num_pages=ceil($total/$per_page);
			
			
			$query = ("SELECT messages.text, messages.date, users.name, users.avatar FROM messages INNER JOIN users ON users.id=messages.userid ORDER BY date DESC LIMIT $start,$per_page");
			$r = mysqli_query($link, $query);
			
				if ($r) {
					while ($row = mysqli_fetch_array($r))
					{
						echo	"<table class=\"table table-bordered\">";
						echo '<tr >';
						 echo "<td class=\"topM userM\">{$row['name']}</td>";
						 echo "<td class=\"topM textM\">{$row['date']}</td>";
						 echo '</tr>';
						 echo '<tr>';
						 echo "<td ><img src=\"{$row['avatar']}\" /></td>";
						 echo "<td class=\"botM\">{$row['text']}</td>";
						 echo '</tr>';
						 echo		"</table>";
					}
				}		
				
				
			if ( $num_pages > 1 )
{
    echo '<div style="margin:1em 0">&nbsp;Страницы: ';
    
    if ( $page > 3 )
        $startpage = '<a href="'.$_SERVER['PHP_SELF'].'?page=1"><<</a> ... ';
    else
        $startpage = '';
   
    if ( $page < ($num_pages - 2) )
        $endpage = ' ... <a href="'.$_SERVER['PHP_SELF'].'?page='.$num_pages.'">>></a>';
    else
        $endpage = '';

   
    if ( $page - 2 > 0 )
        $page2left = ' <a href="'.$_SERVER['PHP_SELF'].'?page='.($page - 2).'">'.($page - 2).'</a> | ';
    else
        $page2left = '';
    if ( $page - 1 > 0 )
        $page1left = ' <a href="'.$_SERVER['PHP_SELF'].'?page='.($page - 1).'">'.($page - 1).'</a> | ';
    else
        $page1left = '';
    if ( $page + 2 <= $num_pages )
        $page2right = ' | <a href="'.$_SERVER['PHP_SELF'].'?page='.($page + 2).'">'.($page + 2).'</a>';
    else
        $page2right = '';
    if ( $page + 1 <= $num_pages )
        $page1right = ' | <a href="'.$_SERVER['PHP_SELF'].'?page='.($page + 1).'">'.($page + 1).'</a>';
    else
        $page1right = '';

   
    echo $startpage.$page2left.$page1left.'<strong>'.$page.'</strong>'.$page1right.$page2right.$endpage;

    echo '</div>';
}	
				
			?>			
				
						
		  </div>
		 
		</div>
	
	</div>
	
	
  </div>
   
  
  <script>
	$(".contentContainer").css("min-height",$(window).height());
	
	
  </script>

  </body>
</html>