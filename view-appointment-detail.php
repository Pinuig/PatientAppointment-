<?php
session_start();
error_reporting(0);
 include_once('header.php');
include('includes/dbconnection.php');
if (empty($_SESSION['name'])) {
  header('location:index.php');

  } else{

 $id = $_GET['id'];
$fetch_query = mysqli_query($connection, "SELECT * FROM tbl_appointment WHERE id='$id'");
$row = mysqli_fetch_array($fetch_query);

if(isset($_POST['submit']))
{
      $id=$_GET['id'];
    $aptid=$_GET['APT_num'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];

      $update_query = mysqli_query($connection, "UPDATE tbl_appointment SET status='$status',remark='$remark', WHERE id= '$id'");
      if($update_query>0)
      {
          echo '<script>alert("Remark and status has been updated")</script>';
          $fetch_query = mysqli_query($connection, "SELECT * FROM tbl_appointment WHERE id='$id'");
          $row = mysqli_fetch_array($fetch_query);   
          
      }
      else
      {
         echo "<script>window.location.href ='appointments.php'</script>";
      }

    }
  }
  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title> View Appointment Detail</title>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

  
    
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!-- endbuild -->
	
	
</head>
	

<!--============= start main area -->







<!-- APP MAIN ==========-->

			<!-- DOM dataTable -->
			<div class="page-wrapper">
				<div class="content">
					<div class="col-sm-4 col-3">
					<header class="widget-header">
						<h4 class="page-title" >Appointment Details</h4>
					</header>
				</div><!-- .widget-header -->
					<hr class="widget-separator">

					<div class="widget-body">
						<div class="table-responsive">
              <?php
              $update_query = mysqli_query($connection, "INSERT  tbl_appointment SET status='$status',remark='$remark', WHERE id= '$id'");
              ?>
							
							
							<table border="1" class="table table-bordered mg-b-0">
                  <th>Appointment Number</th>
                  <td><?php  echo $aptid=($row['APT_num']);?></td>
                  <th>Patient Name</th>
                  <td><?php  echo $row['Name'];?></td>
              
  
              <tr>
                <th>Mobile Number</th>
                <td><?php  echo $row['Phone'];?></td>
                <th>Email</th>
                <td><?php  echo $row['Email'];?></td>
              </tr>
               <tr>
                <th>Appointment Date</th>
                <td><?php  echo $row['Date'];?></td>
                <th>Doctor</th>
                <td><?php  echo $row['doctor_name'];?></td>
              </tr>
              <th>Appointment Final Status</th>
   
  <tr>
    

    <td colspan="4"> <?php  $status=$row['status'];

    
if($row['status']=="")
{
  echo "Not yet updated";
}

if($row['status']=="Approved")
{
 echo "Your appointment has been approved";
}


if($row['status']=="Cancelled")
{
  echo "Your appointment has been cancelled";
}



     ;?></td>
  </tr>
   <tr>
    
<th >Remark</th>
 <?php if($row['Remark']==""){ ?>

                     <td colspan="3"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td colspan="3"> <?php  echo ($row['Remark']);?>
                  </td>
                  <?php } ?>
   
  </tr>
 


</table> 
<br>

 
<?php 

if ($status=="" ){
?> 
<p align="center"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="Remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr> 
     
  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="Approved" selected="true">Approved</option>
     <option value="Cancelled">Cancelled</option>
     
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  </div>
  </form>
  



                      
                        </div>
                    </div>

						</div>

					</div><!-- .widget-body -->
					
   
				</div><!-- .widget -->
			</div><!-- END column -->
			
			
		</div><!-- .row -->
	</section><!-- .app-content -->
</div><!-- .wrap -->
  <!-- APP FOOTER -->

  <!-- /#app-footer -->
</main>
<!--========== END app main -->

	<!-- APP CUSTOMIZER -->

	<script src="libs/bower/jquery/dist/jquery.js"></script>
	<script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
	<script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
	<script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
	<script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
	<script src="libs/bower/PACE/pace.min.js"></script>
	<!-- endbuild -->

	<!-- build:js assets/js/app.min.js -->
	<script src="assets/js/library.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<!-- endbuild -->
	<script src="libs/bower/moment/moment.js"></script>
	<script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="assets/js/fullcalendar.js"></script>


	
		<!-- build:js assets/js/core.min.js -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>

</html>
