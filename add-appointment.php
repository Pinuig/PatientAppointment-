<?php
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/dbconnection.php');
    
    //    $fetch_query = mysqli_query($connection, "select max(id) as id from tbl_appointment");
    //    $row = mysqli_fetch_row($fetch_query);

    //     if($row[0]==0)
    //   {
    //     $apt_id = 1;
    //   }
    //   else
    //   {
    //     $apt_id = $row[0] + 1;
    //   }
      
    // if(isset($_POST['add-appointment']))
    // {
      
    //   $APT_num = 'APT-'.$apt_id;
    //   $Name = $_POST['Name'];
    //   $Email = $_POST['Email'];
    //   $doctor_name = $_POST['doctor_name'];
    //   $specialization = $_POST['specialization'];
    //   $Phone = $_POST['Phone'];
    //   $Date = $_POST['Date'];
    //   $time = $_POST['time'];
    //   $message = $_POST['message'];
    //   $status = $_POST['status'];

      
    //   $insert_query = mysqli_query($connection, "INSERT INTO tbl_appointment SET APT_num='$APT_num' Name='$Name', doctor_name='$doctor_name', specialization='$specialization',Phone='$Phone', Date='$Date', time='$time',  message='$message', status='$status'");

    //   if($insert_query>0)
    //   {
    //       $msg = "Appointment created successfully";
    //   }
    //   else
    //   {
    //       $msg = "Error!";
    //   }
    // }
?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 ">
                        <h4 class="page-title">Add Appointment</h4>
                         
                    </div>
                    <div class="col-sm-8  text-right m-b-20">
                        <a href="appointments.php" class="btn btn-primary btn-rounded float-right">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="code.php" method="POST" >
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>APT-ID <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="APT_num" value="<?php if(!empty($apt_id)) { echo 'APT-'.$apt_id; } else { echo "APT-1"; } ?>" disabled> 
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient Name</label>
                                        <input type="text" name="Name" class="form-control" required>
                                    </div>
                                </div>
                            
                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="Email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Doctor Name</label>
                                        <select class="form-control" name="doctor_name" required>
                                            <option value="">Select</option>
                                            <?php
                                        $fetch_query = mysqli_query($connection, "SELECT doctor_name FROM doctor");
                                        while($row = mysqli_fetch_array($fetch_query)){
                                        ?>
                                            <option><?php echo $row['doctor_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Specialization</label>
                                        <select class="form-control" name="specialization" required>
                                            <option value="">Select</option>
                                            <?php
                                        $fetch_query = mysqli_query($connection, "SELECT specialization FROM doctor");
                                        while($row = mysqli_fetch_array($fetch_query)){
                                        ?>
                                            <option><?php echo $row['specialization']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <div class="icon">
                                            <input type="phone" class="form-control" name="Phone" required>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="Date" required>
                                        </div>
                                    </div>
                                </div>   
                           
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>time</label>
                                        <div class="time-icon">
                                            <input type="text" class="form-control" name="time" required>
                                        </div>
                                    </div>
                                </div>   
                            </div>

                            
                                <div class="row">
                                <label>Message</label>
                                <textarea cols="20" rows="4" class="form-control" name="message" required></textarea>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <label class="display-block" style="margin-right: 6px;">Appointment Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_Approved" value="1" checked>
                                    <label class="form-check-label" for="product_Approved">
                                    Approved
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_Canceled" value="0">
                                    <label class="form-check-label" for="product_Canceled">
                                    Canceled
                                    </label>
                                </div>
                            </div>
                             
                            <div class="m-t-20 text-center">
                                <button name="add-appointment" class="btn btn-primary submit-btn">Create Appointment</button>
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