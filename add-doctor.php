<?php
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}

include('header.php');
include('includes/dbconnection.php');
    
    if(isset($_REQUEST['add-doctor']))
    {
      
      $doctor_name = $_REQUEST['doctor_name'];
      $email = $_REQUEST['email'];
      $phone = $_REQUEST['phone'];
      $specialization = $_REQUEST['specialization'];
      $address = $_REQUEST['address'];
      $bio = $_REQUEST['bio'];
      $status = $_REQUEST['status'];

      
      $insert_query = mysqli_query($connection, "insert into doctor set doctor_name='$doctor_name', email='$email', phone='$phone', specialization= '$specialization', address='$address',  bio='$bio', status='$status'");

      if($insert_query>0)
      {
          $msg = "Doctor created successfully";
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
                        <h4 class="page-title">Add Doctor</h4>
                         
                    </div>
                    <div class="col-sm-8  text-right m-b-20">
                        <a href="doctors.php" class="btn btn-primary btn-rounded float-right">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" >
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Doctor Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="doctor_name" required> 
                                    </div>
                                </div>
                    
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" required>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" name="phone" required>
                                    </div>
                                </div>
                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Specialization </label>
                                        <input class="form-control" type="text" name="specialization" required>
                                    </div>
                                </div>
								
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" required>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
                                <label>Short Biography</label>
                                <textarea class="form-control" rows="3" cols="30" name="bio" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_active" value="1" checked>
									<label class="form-check-label" for="doctor_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="0">
									<label class="form-check-label" for="doctor_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">

                                <button name="add-doctor" class="btn btn-primary submit-btn">Create Doctor</button>
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