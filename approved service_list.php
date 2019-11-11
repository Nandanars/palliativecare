<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/header.php'); 
include('include/checklogin.php');
check_login_admin();

if(isset($_POST['submit']))
{
$id=$_POST['id']; //echo $id; die();
$unit=$_POST['unit_name'];

$sql="INSERT INTO tbl_allot_work(`unit_n`,`rqst_id`)VALUES('$unit','$id')"; 
$exe=mysql_query($sql);
if($exe>0)
		{
			echo '<script language="javascript">';
				echo 'alert("Successfully added to Unit ");location.href="service_allot_list.php"';
                echo '</script>';
		}
			else 
			{
				echo '<script language="javascript">';
				echo 'alert("Something went wrong, try again later...");location.href="service_allot_list.php"';
                echo '</script>';
			}
}


   
   if(isset($_REQUEST['delete']))
    {
		$a = $_POST['reqst_id1'];	
$query = "DELETE FROM tbl_service_rqst WHERE reqst_id='$a'";
$res = mysql_query($query);
			     if($res>0)
		{
			echo '<script language="javascript">';
				echo 'alert("Successfully Deleted");location.href="approved service_list.php"';
                echo '</script>';
		}
			else 
			{
				echo '<script language="javascript">';
				echo 'alert("Something went wrong, try again later...");location.href="approved service_list.php"';
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
							<li class="active"> Approved Service List</li>
						</ul><!-- /.breadcrumb -->

				
					</div>
					
							<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">Approved Service Table</h3>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Results for "approved Service List"
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
								
								
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
													
													<th>Sl no</th>
													<th>Patient Name</th>
                                                    <th>Date</th>
													<th>Request</th>
												
                                                    <th>Action</th>
												   </tr>
												   </thead>

												<tbody>
											<?php
$sql=mysql_query("select tbl_service_rqst.*,tbl_user.* from  tbl_service_rqst INNER JOIN tbl_user ON tbl_service_rqst.user_id=tbl_user.users_id where status='1'");
$i=1;
while($row=mysql_fetch_array($sql))
{
?>		
													
										<tr>
										<td><?php echo $i++;?></td>			
									
										<td><?php echo $row['u_name'];?></td>
												<td><?php echo $row['date'];?></td>
												<td><?php echo $row['detail'];?></td>
			
		                                  <td>				
									<div class="btn-group">
		<button type="button" class="btn btn-info btn-flat">Action</button>
		
									  <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <ul class="dropdown-menu" role="menu">
									<li><a data-toggle="modal" data-target="#edit-<?=$row['reqst_id']?>" href="#"><i class="fa fa-trash-o">Add to Unit</i></a></li>
									<li><a data-toggle="modal" data-target="#delete-<?=$row['reqst_id']?>" href="#"><i class="fa fa-trash-o">Delete</i></a></li>
									  </ul>
									  </div>
														</td>	
	
	
	<div class="modal fade" id="edit-<?=$row['reqst_id']?>" role="dialog" >
     <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Add to Unit</h4>
      </div>
         <div class="modal-body">
		  <form class="form-horizontal" method="post" name="myForm" onsubmit="return validateForm();" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
		 <div class="box-content">
	
		 <div class="col-md-10 col-md-offset-2">
			
			  <input type="hidden" class="form-control"  value="<?php echo $row['reqst_id'];?>"  name="id"> 
                                    <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Unit</label>

								<div class="col-sm-9">
											<select type="text" id="form-field-1" placeholder="Unit Name"  name="unit_name" class="col-xs-10 col-sm-7" required />
										     <option value=""><--select Unit--></option>
 <?php $ret=mysql_query("select * from tbl_unit");
while($row1=mysql_fetch_array($ret))
{
?>
	<option value="<?php echo htmlentities($row1['unit_id']);?>">
												<?php echo htmlentities($row1['unit_name']);?>
																</option>
																<?php } ?>
										</select>
										</div>
									</div>			
						
							  
						<br>
									</div>
      <button name="submit" type="submit" class="btn btn-success" ><span class="glyphicon 
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
									  
	<div class="modal fade" id="delete-<?=$row['reqst_id']?>" role="dialog" >
     <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete Staff</h4>
      </div>
         <div class="modal-body">
		 <br>
		 <h3 class="modal-title custom_align" id="Heading" style="margin-left:200px;color:#e85c68">Are You Want Delete this request?</h3>
		 <br>
		  <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		 <input type="hidden" class="form-control"  value="<?php echo $row['reqst_id'];?>"  name="reqst_id1"> 	 
		 <div class="box-content">
		<button name="delete" type="submit" class="btn btn-success" ><span class="glyphicon 
		glyphicon-ok-sign"></span>Yes</button>
	<button type="reset" class="btn btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
							
</div>								
      </div>
      
	  </form>
	     <div class="modal-footer ">
        
      </div> 
        </div>
    <!-- /.modal-content --> 
  </div>
  </div>
    
  
		
	 
	
							
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
					
				
					
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;	
<?php
include('include/footer.php'); 
?>