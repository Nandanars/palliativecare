<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/header.php'); 
include('include/checklogin.php');
check_login_admin();

 $sql=mysql_query("Select * from tbl_aknowlegment INNER JOIN tbl_charity ON tbl_aknowlegment.pass_id=tbl_charity.pay_id INNER JOIN tbl_follower ON tbl_charity.follow_id= tbl_follower.follo_id");
  $row1 = mysql_fetch_array($sql);

  if(isset($_POST['submit']))
{
 
  $id=$_POST['id']; //echo $id; die();
  $msg=$_POST['message'];

$sql="INSERT INTO  tbl_aknowlegment(`pass_id`, `msg`)VALUES($id,'$msg')";
$exe=mysql_query($sql);
if($exe>0)
		{
			echo '<script language="javascript">';
				echo 'alert("Successfully Sent Acknolegment");location.href="charity_list.php"';
                echo '</script>';
		}
			else 
			{
				echo '<script language="javascript">';
				echo 'alert("Something went wrong, try again later...");location.href="charity_list.php"';
                echo '</script>';
			}

}

if(isset($_GET['id']))
   {
   $id = $_GET['id']; 
   $query = "SELECT * FROM tbl_charity WHERE pay_id = '$id'"; 
   $queryrun= mysql_query($query);
   $row = mysql_fetch_array($queryrun);
   }
?>

  <div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="home.php">Home</a>
							</li>
							<li class="active">Add Acknolegment</li>
						</ul><!-- /.breadcrumb -->

			
					     </div>
			             <div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Add Acknolegment</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
								
									&nbsp; &nbsp; &nbsp;
								<!-- PAGE CONTENT BEGINS -->
							
								<form class="form-horizontal" role="form" name="ack"  method="post">

		     
				
				 <input type="hidden"  id="form-field-1" placeholder="id"  name="id" class="col-xs-10 col-sm-7" value="<?php echo $row['pay_id'] ?>"  />	
	                    
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Follower Name</label>

						<div class="col-sm-9">
							<input type="text" readonly id="form-field-1" placeholder="Follower Name"  name="na" class="col-xs-10 col-sm-7" value="<?php echo $row1['f_name'] ?>" />
							</div>
									</div>
			 
			 
			         <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Message</label>

						<div class="col-sm-9">
							<textarea type="text" id="form-field-1" placeholder="Message"  name="message" class="col-xs-10 col-sm-7" required /></textarea>
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