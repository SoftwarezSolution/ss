<?php require'includes/connect.php' ?>
<?php //include config
session_start();
if(!isset($_SESSION['email'])){
	
	header("location:index.php");
}
else{

//echo"$_SESSION['uname']";

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Post</title>
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/main.css">
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

<div id="wrapper">

	
	<p><a href="welcome.php">Blog Admin Index</a></p>

	<h2>Add Post</h2>

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
		
		if($postImg ==''){
			$error[] = 'Please enter the content.';
		}
		
		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}

		if(!isset($error)){

		$title=$_POST['postTitle'];
		$keyword=$_POST['postKey'];
		$img=$_POST['postImg'];
		$desc=$_POST['postDesc'];
		$count=$_POST['postCont'];
		$dat=date('Y-m-d H:i:s');

				//insert into database
//$qry='INSERT INTO `naipathya_blog_posts`(`id`, `postTitle`, `postKey`, `postImg`, `postDesc`, `postCont`, `postDate`) VALUES ('','$_POST['postTitle']','$_POST['postKey']','$_POST['postImg']','$_POST['postDesc']','$_POST['postCont']','date('Y-m-d H:i:s')')' ;
$qry="INSERT INTO `naipathya_blog_posts`(`id`, `postTitle`, `postKey`, `postImg`, `postDesc`, `postCont`, `postDate`) VALUES ('','$title','$keyword','$img','$desc','$count','$dat')";		
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
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' <?php echo isset($_POST['postTitle']) ? 'value="'.$_POST['postTitle'].'"' : '' ?> ></p>
		
		<p><label>keyword</label><br />
		<input type='text' name='postKey' <?php echo isset($_POST['postKey']) ? 'value="'.$_POST['postKey'].'"' : '' ?> ></p>

		<p><label>Image For Preview</label><br />
		<input type='text' name='postImg' <?php echo isset($_POST['postImg']) ? 'value="'.$_POST['postImg'].'"' : '' ?>></p>

		<p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php echo isset($_POST['postDesc']) ? ''.$_POST['postDesc'].'' : '' ?></textarea></p>

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php echo isset($_POST['postDesc']) ? ''.$_POST['postDesc'].'' : '' ?></textarea></p>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

</div>
<?php } ?>