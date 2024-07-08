<?php 
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/dbconnection.php');

$id = $_GET['id'];
$fetch_query = mysqli_query($connection, "SELECT * FROM doctor_schedule WHERE id='$id'");
$row = mysqli_fetch_array($fetch_query);

if(isset($_POST['save-schedule']))
{
      $doctor_name = $_POST['doctor_name'];
      $specialization = $_POST['specialization'];
      $days = implode(", ",$_POST['days']);
      $start_time = $_POST['start_time'];
      $end_time = $_POST['end_time'];
      $message = $_POST['msg'];
      $status = $_POST['status'];

      $update_query = mysqli_query($connection, "UPDATE doctor_schedule SET doctor_name='$doctor_name', specialization='$specialization', available_days='$days', start_time='$start_time', end_time='$end_time', msg='$message', status='$status' WHERE id='$id'");

      if($update_query>0)
      {
          $msg = "Schedule updated successfully";
          $fetch_query = mysqli_query($connection, "SELECT * FROM doctor_schedule WHERE id='$id'");
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
                        <h4 class="page-title">Edit Schedule</h4>
                    </div>
                    <div class="col-sm-8  text-right m-b-20">
                        <a href="schedule.php" class="btn btn-primary btn-rounded float-right">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                         <form method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor Name</label>
                                        <input class="form-control" type="text" name="doctor_name" value="<?php  echo $row['doctor_name'];  ?>">
                                    </div>
                                </div>
                            
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Specialization <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="specialization" value="<?php  echo $row['specialization'];  ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Available Days</label>
                                        <select class="form-control" multiple name="days[]" required>
                                        <option value="">Select Days</option>
                                            <?php
                                        
                                        $days = explode(", ", $row["available_days"]);
                                        $fetch_query = mysqli_query($connection, "SELECT * FROM tbl_week");
                                        while ($rows = mysqli_fetch_array($fetch_query))
                                         {
                                        if (in_array($rows["name"], $days))
                                        $selected = "selected";
                                        else
                                        $selected = "";
                                        ?>
                                            <option value="<?=$rows["name"];?>" <?php echo $selected; ?>><?=$rows["name"];?>
                                            </option>
                                            <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <div class="icon">
                                            <input type="text" class="form-control" id="datetimepicker3" name="start_time" value="<?php  echo $row['start_time'];  ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <div class="icon">
                                            <input type="text" class="form-control" id="datetimepicker4" name="end_time" value="<?php  echo $row['end_time'];  ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="10" rows="2" class="form-control" name="msg" required><?php echo $row['message'];  ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Schedule Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="1" <?php if($row['status']==1) { echo 'checked' ; } ?>>
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0" <?php if($row['status']==0) { echo 'checked' ; } ?>>
                                    <label class="form-check-label" for="product_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="save-schedule">Save</button>
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