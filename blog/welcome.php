<?php require'includes/connect.php' ?>
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
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>| Document |</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="welcome.php">Softwarez Solutions : Admin </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                      
                        <ul class="nav pull-right">						 <li><a href="includes/logout.php">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">																<a href="form.php" class="btn-box small span4"><i class="icon-envelope"></i><b>Add new post</b></a>                                   <a href="table.php" class="btn-box small span4"><i class="icon-group"></i><b>All Posts</b></a>                                       
                                   <a href="#" class="btn-box big span4"><b>Upload File and get url</b>
                                        <p class="text-muted">
                                                  <form method="post" enctype="multipart/form-data">
                                             <input name="uploadedfile" type="file" >
                                              <input type="submit" value="Upload" name="submit">
                                        </form>

<?php
if(isset($_POST['submit'])){
$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "<script>alert('The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded')</script>";
} else{
    echo "There was an error uploading the file, please try again!";
}
?>
url:<a href=" uploads/<?php echo $_FILES['uploadedfile']['name'];  ?>" target="_blank"> https://www.naipathya.in/admin/uploads/<?php echo $_FILES['uploadedfile']['name'];  ?>
<?php } ?>


                                            </p>
                                    </a>
                                </div>
                            <div class="module hide">
                                <div class="module-head">
                                    <h3>
                                        Adjust Budget Range</h3>
                                </div>
                                <div class="module-body">
                                    <div class="form-inline clearfix">
                                        <a href="#" class="btn pull-right">Update</a>
                                        <label for="amount">
                                            Price range:</label>
                                        &nbsp;
                                        <input type="text" id="amount" class="input-" />
                                    </div>
                                    <hr />
                                    <div class="slider-range">
                                    </div>
                                </div>
                            </div>
                         
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        DataTables</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    IP                                                
                                                </th>
                                                <th>
                                                    Id                                                
                                                </th>
                                                <th>
                                                    Affliate 
                                                </th>
                                                <th>
                                                    Referral
                                                </th>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    Url
                                                </th>

                                            </tr>
                                        </thead>
        
                                        <tbody>
                                <?php
			$query="SELECT * FROM `naipathya_tracker` ORDER BY id DESC";	
			$run =mysql_query($query);
		    while($row=mysql_fetch_array($run)){
	    	$Id=$row['id'];		
	    	$server=$row['server'];		
		    $browser=$row['browser'];
		    $refral=$row['refral'];
		    $ipadr=$row['ipadr'];
		    $date=$row['date_time'];
		    $creferral=$row['creferral'];
		    $uri=$row['uri'];
								
	?>							
			                                <tr class="odd gradeX">
                                                <td>
                                                    <?php echo "$ipadr" ?>
                                                </td>
                                                <td>
                                                    <?php echo "$Id" ?>
                                                </td>
                                                <td>
                                                     <?php echo "$creferral" ?>
                                                </td>
                                                <td>
                                                    <?php echo "$refral" ?>              
                                                </td>
                                                <td class="center">
                                                    <?php echo "$date" ?>
                                                </td>
                                                <td class="center">
                                                    <?php echo "$uri" ?>
                                                </td>
                                            </tr>
                                        <?php } ?>	                                       
                                    </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                    Rendering engine
                                                </th>
                                                <th>
                                                    Browser
                                                </th>
                                                <th>
                                                    Platform(s)
                                                </th>
                                                <th>
                                                    Engine version
                                                </th>
                                                <th>
                                                    CSS grade
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2014 Admin - naipathya.in </b>All rights reserved.
            </div>
        </div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>
</html>
<?php } ?>