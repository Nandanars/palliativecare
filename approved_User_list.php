<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/header.php'); 
include('include/checklogin.php');
check_login_admin();
if(isset($_REQUEST['delete']))
    {
	$a = $_POST['user_id'];	
$query = "UPDATE tbl_user SET u_status='2' WHERE users_id='$a'";
$res = mysql_query($query);
	if($res>0)
		{
			echo '<script language="javascript">';
				echo 'alert("Successfully Deleted");location.href="approved_User_list.php"';
                echo '</script>';
		}
			else 
			{
				echo '<script language="javascript">';
				echo 'alert("Something went wrong, try again later...");location.href="approved_User_list.php"';
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
							<li class="active"> Approved Users List</li>
						</ul><!-- /.breadcrumb -->


					</div>
					
							<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue"> Approved Users List</h3>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Results for "Patient list"
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
					
											
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
													
													<th>Sl no</th>
													<th>Name</th>
                                                    <th>Address</th>
													<th>Date of Birth</th>
													<th>Gender</th>
													<th>contact_no</th>
													<th>mail_id</th>
													<th>Ration copy</th>
													<th>Class</th>
													<th>Patient Details</th>
													<th>Medical Details</th>
													<th>Required Service</th>
												    <th>Action</th>

													</tr>
												   </thead>

												<tbody>
											<?php
$sql=mysql_query("select * from  tbl_user INNER JOIN tbl_class ON tbl_user.u_class=tbl_class.class_id where u_status='1'");
$i=1;
while($row=mysql_fetch_array($sql))
{
?>		
													
										<tr>
										<td><?php echo $i++;?></td>			
										<td><?php echo $row['u_name'];?></td>
												<td><?php echo $row['u_address'];?></td>
												<td><?php echo $row['u_dob'];?></td>
												<td><?php echo $row['u_gender'];?></td>
												<td><?php echo $row['u_contact_no'];?></td>
												<td><?php echo $row['u_mail_id'];?></td>
												<td><img src="<?php echo ("../images/");if($row['u_ration_copy']) echo $row['u_ration_copy']; else echo "no-img.jpg"; ?>"  alt="" height="50" width="50"/>
												</td>
												<td><?php echo $row['class_name'];?></td>
												<td><?php echo $row['u_patient_detail'];?></td>
												<td><?php echo $row['u_medical_detail'];?></td>
												<td><?php echo $row['u_required_service'];?></td>
											
													
																		
									<td>
															 <div class="btn-group">
		<button type="button" class="btn btn-info btn-flat">Action</button>
		
									  <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <ul class="dropdown-menu" role="menu">
									<li><a data-toggle="modal" data-target="#delete-<?=$row['users_id']?>" href="#"><i class="fa fa-trash-o">Delete</i></a></li>
									
									  </ul>
									  </div>
														</td>
		<div class="modal fade" id="delete-<?=$row['users_id']?>" role="dialog" >
     <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete User</h4>
      </div>
         <div class="modal-body">
		  <br>
		 <h3 class="modal-title custom_align" id="Heading" style="margin-left:200px;color:#e85c68">Do You Want Delete This User?</h3>
		 <br>
		  <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		 <input type="hidden" class="form-control"  value="<?php echo $row['users_id'];?>"  name="user_id"> 	 
		 <div class="box-content">
		
<button name="delete" type="submit" class="btn btn-success" ><span class="glyphicon 
		glyphicon-ok-sign"></span>Submit</button>
	<button type="reset" class="btn btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
								</div> 
</div>								
      </div>
      
	  </form>
	     <div class="modal-footer ">
        
      </div> 
        </div>
    <!-- /.modal-content --> 
  </div>									
									</tr>
																	
							<?php 

								 }?>
						
						</tbody>
					
					</table>
					
					
					
					
				</div>
              </div> 		
			</div>
            </div>			
					
	</div>
</div>				
					
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;	
<?php
include('include/footer.php'); 
?>