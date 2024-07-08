<?php 
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/dbconnection.php');

$id = $_GET['id'];
$fetch_query = mysqli_query($connection, "select * from doctor where id='$id'");
$row = mysqli_fetch_array($fetch_query);

if(isset($_REQUEST['save-doc']))
{
      $doctor_name = $_REQUEST['doctor_name'];
      $email = $_REQUEST['email'];
      $phone = $_REQUEST['phone'];
      $specialization = $_REQUEST['specialization'];
      $address = $_REQUEST['address'];
      $bio = $_REQUEST['bio'];
      $status = $_REQUEST['status'];

      $update_query = mysqli_query($connection, "update doctor set doctor_name='$doctor_name', email='$email', phone='$phone', specialization= '$specialization' address='$address' ,  bio='$bio',  status='$status' where id='$id'");
      if($update_query > 0)
      {
          $msg = "Doctor updated successfully";
          $fetch_query = mysqli_query($connection, "select * from doctor where id='$id'");
          $row = mysqli_fetch_array($fetch_query);   
      }
      else
      {
          $msg = "Error!";
      }
  }

?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 ">
                        <h4 class="page-title">Edit Doctor</h4>
                    </div>
                    <div class="col-sm-8  text-right m-b-20">
                        <a href="doctors.php" class="btn btn-primary btn-rounded float-right">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Doctor Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="doctor_name" value="<?php  echo $row['doctor_name'];  ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" value="<?php echo $row['email']; ?>">
                                    </div>
                                </div>
                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" name="phone" value="<?php echo $row['phone']; ?>">
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Specialization </label>
                                        <input class="form-control" type="text" name="specialization" value="<?php echo $row['specialization']; ?>">
                                    </div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
											</div>
										</div>
									</div>
								</div>
                                </div>
							<div class="form-group">
                                <label>Short Biography</label>
                                <textarea class="form-control" rows="3" cols="30" name="bio"><?php echo $row['bio']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_active" value="1" <?php if($row['status']==1) { echo 'checked' ; } ?>>
									<label class="form-check-label" for="doctor_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="0" <?php if($row['status']==0) { echo 'checked' ; } ?>>
									<label class="form-check-label" for="doctor_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="save-doc">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
        </div>
    
<?php 
include('footer.php');
?>
<script type="text/javascript">
     <?php
        if(isset($msg)) {

              echo 'swal("' . $msg . '");';
          }
     ?>
</script> 