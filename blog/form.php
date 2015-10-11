<?php require'includes/connect.php' ?><?php require'includes/admin.php' ?>
<?php
session_start();
if(!isset($_SESSION['email'])){
	
	header("location:index.php");
}
else{

//echo"$_SESSION['uname']";
?>

<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>| Document |</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<!--style sheet for header-->
		<link href="css/theme.css" rel="stylesheet" />	
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
	  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.php">
			  		Softwarez Solutions : Admin
			  	</a>

					<ul class="nav pull-right">					<li><a href="#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Add Post</h3>
							</div>
							<div class="module-body">							
	
<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}
		
		if($postKey ==''){
			$error[] = 'Please enter the content.';
		}
				if($postImg ==''){			$error[] = 'Please enter the content.';		}

		
		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}

		if(!isset($error)){


		$title=$_POST['postTitle'];
		$permalink=$_POST['permaLink'];				$keyword=$_POST['postKey'];		
		$img=$_POST['postImg'];
		$desc=$_POST['postDesc'];
		$count=$_POST['postCont'];				$dat=date('Y-m-d H:i:s');		$getid=new admin;				$aid=$getid->getuserid($_SESSION['email']);


				//insert into database
//$qry='INSERT INTO `naipathya_blog_posts`(`id`, `postTitle`, `postKey`, `postImg`, `postDesc`, `postCont`, `postDate`) VALUES ('','$_POST['postTitle']','$_POST['postKey']','$_POST['postImg']','$_POST['postDesc']','$_POST['postCont']','date('Y-m-d H:i:s')')' ;
//$qry="INSERT INTO `naipathya_blog_posts`(`id`, `postTitle`, `postKey`, `postImg`, `postDesc`, `postCont`, `postDate` , `postAuthor` , `status`) VALUES ('','$title','$keyword','$img','$desc','$count','$dat','$postAuthor','active')";		$qry="INSERT INTO `ss_post`(`pid`, `title`, `permalink`, `keywords`, `img`, `sdesc`, `ldesc`, `aid`, `status`, `date_posted`) VALUES ('','$title','$permalink','$keyword','$img','$desc','$count','$aid','active','$dat')";
			$var=mysql_query($qry);
			if($var>0){
				
			echo"<script>alert('Post Added Successfully')</script>";	
			header("location:welcome.php");			
			}
			else{
					echo"<script>alert('Please Retry')</script>";				
			}
		}

	}
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo'<div class="alert">								
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Warning!</strong> '.$error.'
				</div>';
			
		}
	}
	?>


	
							<br />
	
	<form action='' method='post'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' <?php echo isset($_POST['postTitle']) ? 'value="'.$_POST['postTitle'].'"' : '' ?> class="span8"></p>
		<p><label>Permalink</label><br />		<input type='text' name='permaLink' <?php echo isset($_POST['permaLink']) ? 'value="'.$_POST['permaLink'].'"' : '' ?> class="span8"></p>		
		<p><label>keyword</label><br />
		<input type='text' name='postKey' <?php echo isset($_POST['postKey']) ? 'value="'.$_POST['postKey'].'"' : '' ?> class="span8"></p>		<p><label>Image For Preview</label><br />		<input type='text' name='postImg' <?php echo isset($_POST['postImg']) ? 'value="'.$_POST['postImg'].'"' : '' ?> class="span8" ></p>
	
		<p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php echo isset($_POST['postDesc']) ? ''.$_POST['postDesc'].'' : '' ?></textarea></p>

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php echo isset($_POST['postCont']) ? ''.$_POST['postCont'].'' : '' ?></textarea></p>
	
		<p><input type='submit' name='submit' value='Submit'></p>

	</form>
	
	
							</div>
						</div>

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 
			<b class="copyright">&copy; Admin - naipathya.in </b> All rights reserved.
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
</html>

<?php
} 
?>		