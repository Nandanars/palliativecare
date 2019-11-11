

<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/header.php'); 
include('include/checklogin.php');
check_login_admin();


if(isset($_POST['submit']))
{

$unit_name=$_POST['unit_name'];

$sql="INSERT INTO  tbl_unit(`unit_name`)VALUES('$unit_name')";
$exe=mysql_query($sql);
if($exe>0)
		{
			echo '<script language="javascript">';
				echo 'alert("Unit inserted successfully");location.href="unit_list.php"';
                echo '</script>';
		}
			else 
			{
				echo '<script language="javascript">';
				echo 'alert("Something went wrong, try again later...");location.href="unit_list.php"';
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
							<li class="active">Add Unit</li>
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
												<h4 class="widget-title">Add Unit</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
								
									&nbsp; &nbsp; &nbsp;
								<!-- PAGE CONTENT BEGINS -->
							
								<form class="form-horizontal" role="form" name="ward"  method="post">


				
				
	         <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Unit Name</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Unit Name"  name="unit_name" class="col-xs-10 col-sm-7" />
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
</div>	</div></div>
	</div>	</div><!-- /.nav-search -->
<?php
include('include/footer.php'); 
?>