
<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/header.php'); 
include('include/checklogin.php');
check_login_admin();

if(isset($_POST['submit']))
{

$ward_name=$_POST['ward_name'];
$loc_name=$_POST['loc_name'];
$sql1=mysql_query("SELECT * from tbl_ward where ward_name='$ward_name' and location_id='$loc_name'");
if(mysql_num_rows($sql1)==0)
{
$sql="INSERT INTO  tbl_ward(`ward_name`,`location_id`)VALUES('$ward_name','$loc_name')";
$exe=mysql_query($sql);
if($exe>0)
		{
			echo '<script language="javascript">';
				echo 'alert("Ward Successfully Added");location.href="unit_list.php"';
                echo '</script>';
		}
			else 
			{
				echo '<script language="javascript">';
				echo 'alert("Something went wrong, try again later...");location.href="unit_list.php"';
                echo '</script>';
			}
}
{
				echo '<script language="javascript">';
				echo 'alert("Ward Is Already Exist!!!");location.href="unit_list.php"';
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
							<li class="active">Add Ward</li>
						</ul><!-- /.breadcrumb -->

			
					   </div>


					             <div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Add Ward</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
								
									&nbsp; &nbsp; &nbsp;
								<!-- PAGE CONTENT BEGINS -->
							
								<form class="form-horizontal" role="form" name="ward"  method="post">

		

						                <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ward</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Ward Name"  name="ward_name" class="col-xs-10 col-sm-7" />
										</div>
									</div>

                                    <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">location</label>

								<div class="col-sm-9">
											<select type="text" id="form-field-1" placeholder="Ward Name"  name="loc_name" class="col-xs-10 col-sm-7" />
										     <option value=""><--select Location--></option>
 <?php $ret=mysql_query("select * from tbl_location");
while($row=mysql_fetch_array($ret))
{
?>
	<option value="<?php echo htmlentities($row['loc_id']);?>">
												<?php echo htmlentities($row['location_name']);?>
																</option>
																<?php } ?>
										</select>
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
				

&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;	
<?php
include('include/footer.php'); 
?>