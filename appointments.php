<?php
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/dbconnection.php');
?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Appointments</h4>
                    </div>
                    <?php 
                    if($_SESSION['name']){?>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-appointment.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Appointment</a>
                    </div>
                <?php } ?>
                </div>
                <div class="table-responsive">
                                    <table class="datatable table table-stripped ">
                                    <thead>
                                        <tr>
                                            <th>APT-Number</th>
                                            <th>Patient Name</th>
                                            <th>Email</th>
                                            <th>Doctor Name</th>
                                            <th>Specialization</th>
                                            <th>Date/Time</th>
                                            <th>Phone</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $id=$_SESSION['name'];
                                        if(isset($_GET['ids'])){
                                        $id = $_GET['ids'];
                                        $delete_query = mysqli_query($connection, "DELETE FROM tbl_appointment WHERE id='$id'");
                                        }
                                        $fetch_query = mysqli_query($connection, "SELECT * FROM tbl_appointment");
                                        while($row = mysqli_fetch_array($fetch_query))
                                        {    
                                        ?>
                                        <tr>
                                            <td><?php echo $row['APT_num']; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td><?php echo $row['doctor_name']; ?></td>
                                            <td><?php echo $row['specialization']; ?></td>
                                            <td><?php echo $row['Date'].'  '.$row['time']; ?></td>
                                            <td><?php echo $row['Phone']; ?></td>
                                            <td><?php echo $row['message']; ?></td>
                                            <?php if($row['status']==""){ ?>
                                            <td><?php echo "Not Updated Yet"; ?></td>
                                            <?php } else { ?>                  
                                             <td><?php  echo ($row['status']);?></td>
                                                <?php } ?>            
                                            <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="edit-appointment.php?id=<?php echo $row['id'];?>" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-pencil m-r-5"></i></a>
                                                 <a href="appointments.php?ids=<?php echo $row['id'];?>" onclick="return confirmDelete()" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-trash-o m-r-5"></i></a>
                                                
                                            </div>
                                        </td>
                                        <td><a href="view-appointment-detail.php?id=<?php echo $row['id'];?><?php echo $row['APT_num'];?>" class="btn btn-primary">View</a></td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                
            </div>
            
        </div>
        
   
<?php
include('footer.php');
?>
<script language="JavaScript" type="text/javascript">
function confirmDelete(){
    return confirm('Are you sure want to delete this Appointments?');
}
</script>