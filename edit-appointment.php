<?php 
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/dbconnection.php');

$id = $_GET['id'];
$fetch_query = mysqli_query($connection, "select * from tbl_appointment where id='$id'");
$row = mysqli_fetch_array($fetch_query);

if(isset($_POST['save-appointment']))
{
      $Name = $_POST['Name'];
      $Email = $_POST['Email'];
      $doctor_name = $_POST['doctor_name'];
      $specialization = $_POST['specialization'];
      $Date = $_POST['Date'];
      $Phone = $_POST['Phone'];
      $message = $_POST['message'];
      $status = $_POST['status'];


      $update_query = mysqli_query($connection, "update tbl_appointment set Name='$Name', Email='$Email', doctor_name='$doctor_name', specialization='$specialization', Date='$Date',  Phone='$Phone', message='$message', status='$status' where id='$id'");
      if($update_query>0)
      {
          $msg = "Appointment updated successfully";
          $fetch_query = mysqli_query($connection, "select * from tbl_appointment where id='$id'");
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
                        <h4 class="page-title">Edit Appointment</h4>
                    </div>
                    <div class="col-sm-8  text-right m-b-20">
                        <a href="appointments.php" class="btn btn-primary btn-rounded float-right">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Name</label>
                                        <select class="form-control" name="Name" >
                                            <option value="">Select</option>
                                        <?php
                                        $fetch_query = mysqli_query($connection, "select * from tbl_appointment where id='$id'");
                                        $row = mysqli_fetch_array($fetch_query);   
                                        $Name = explode(",", $row['Name']);
                                        $Name = $Name[0];

                                        $fetch_query = mysqli_query($connection, "select Name  from tbl_appointment");
                                        while($rows = mysqli_fetch_array($fetch_query)){
                                        ?>
                                            
                                    <option <?php if($rows['Name'] == $Name) { ?> selected="selected"; <?php } ?>><?php echo $rows['Name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <select class="form-control" name="Email" >
                                            <option value="">Select</option>
                                            <?php
                                        $fetch_query = mysqli_query($connection, "select Email from tbl_appointment");
                                        while($dept = mysqli_fetch_array($fetch_query)){
                                        ?>
                                            <option <?php if($dept['Email']==$row['Email'] ) { ?> selected="selected"; <?php } ?>><?php echo $dept['Email']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor Name</label>
                                        <select class="form-control" name="doctor_name" >
                                            <option value="">Select</option>
                                            <?php
                                        $fetch_query = mysqli_query($connection, "select doctor_name from doctor");
                                        while($doc = mysqli_fetch_array($fetch_query)){
                                        ?>
                                            <option <?php if($doc['doctor_name']==$row['doctor_name'] ) { ?> selected="selected"; <?php } ?>><?php echo $doc['doctor_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Specialization</label>
                                        <select class="form-control" name="specialization" >
                                            <option value="">Select</option>
                                            <?php
                                        $fetch_query = mysqli_query($connection, "select specialization from doctor");
                                        while($dept = mysqli_fetch_array($fetch_query)){
                                        ?>
                                            <option <?php if($dept['specialization']==$row['specialization'] ) { ?> selected="selected"; <?php } ?>><?php echo $dept['specialization']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="icon">
                                            <input type="date" class="form-control" name="Date" value="<?php  echo $row['Date'];  ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <select class="form-control" name="Phone" >
                                            <option value="">Select</option>
                                            <?php
                                        $fetch_query = mysqli_query($connection, "select Phone from tbl_appointment");
                                        while($dept = mysqli_fetch_array($fetch_query)){
                                        ?>
                                            <option <?php if($dept['Phone']==$row['Phone'] ) { ?> selected="selected"; <?php } ?>><?php echo $dept['Phone']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                <label>Message</label>
                                <textarea cols="90" rows="4" class="form-control" name="message" required><?php  echo $row['message'];  ?></textarea>
                            
                            <div class="form-group">
                                <label class="display-block">Appointment Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_Approved" value="1" <?php if($row['status']==1) { echo 'checked' ; } ?>>
                                    <label class="form-check-label" for="product_Approved">
                                    Approved
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_Canceled" value="0" <?php if($row['status']==0) { echo 'checked' ; } ?>>
                                    <label class="form-check-label" for="product_Canceled">
                                    Canceled
                                    </label>
                                </div>
                            </div>
                             
                            <div class="m-t-20 text-center">
                                <button name="save-appointment" class="btn btn-primary submit-btn">Save</button>
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