
<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/header.php'); 
include('include/checklogin.php');
check_login_admin();

if(isset($_POST['submit']))
{

$loc_name=$_POST['loc_name'];
$sql1=mysql_query("SELECT * from tbl_location where location_name='$loc_name'");
if(mysql_num_rows($sql1)==0)
{
$sql="INSERT INTO tbl_location(`location_name`)VALUES('$loc_name')";
$exe=mysql_query($sql);
if($exe>0)
		{
			echo '<script language="javascript">';
				echo 'alert("Location Successfully added");location.href="add_location.php"';
                echo '</script>';
		}
			else 
			{
				echo '<script language="javascript">';
				echo 'alert("Something went wrong, try again later...");location.href="add_location.php"';
                echo '</script>';
			}
}
else
{
echo '<script language="javascript">';
echo 'alert("Location Already Exist!!!");location.href="add_location.php"';
echo '</script>';	
}	
}
?>

<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Add location</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>


					<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Add Location</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
								
									&nbsp; &nbsp; &nbsp;
								<!-- PAGE CONTENT BEGINS -->
							
								<form class="form-horizontal" method="post" name="myForm" onsubmit="return validateForm();"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">


						                <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Location</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Location Name"  name="loc_name" class="col-xs-10 col-sm-7" value=""/>
										</div>
									</div>

                               		<div class="clearfix form-actions">
										
										<div class="col-md-offset-3 col-md-8">
											<button class="btn btn-info" name="submit" type="submit" value="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp;&nbsp; &nbsp;	&nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
							   
							   
							   </form>




</div>
</div>
</div>
</div>
</div>
</div>
</div><!-- /.nav-search -->
	<script type="text/javascript">
			 function validateForm()
     {
	 var x=document.forms["myForm"]["loc_name"].value;
	 var letters = /^[A-Z a-z ]+$/;
     if(!x.match(letters))
     {
             alert("Location should be Aphabet");
             return false;
     }
	 }
	 </script>
			

&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;	
<?php
include('include/footer.php'); 
?>