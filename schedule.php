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
                        <h4 class="page-title">Schedule</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-schedule.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Schedule</a>
                    </div>
                </div>
                <div class="table-responsive">
                                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom ">
                                    <thead>
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>Specialization</th>    
                                            <th>Available Days</th>
                                            <th>Available Time</th>
                                            <th>Info</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_GET['ids'])){
                                        $id = $_GET['ids'];
                                        $delete_query = mysqli_query($connection, "DELETE FROM doctor_schedule WHERE id='$id'");
                                        }
                                        $fetch_query = mysqli_query($connection, "SELECT * FROM doctor_schedule");
                                        while($row = mysqli_fetch_array($fetch_query))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['doctor_name']; ?></td>
                                            <td><?php echo $row['specialization']; ?></td>
                                            <td><?php echo $row['available_days']; ?></td>
                                            <td><?php echo $row['start_time'].' - '.$row['end_time']; ?></td>
                                            <td><?php echo $row['message']; ?></td>
                                            <?php if($row['status']==1) { ?>
                                            <td><span class="custom-badge status-green">Active</span></td>
                                        <?php } else {?>
                                            <td><span class="custom-badge status-red">Inactive</span></td>
                                        <?php } ?>
                                         
                                            <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="edit-schedule.php?id=<?php echo $row['id'];?>" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-pencil m-r-5"></i></a>
                                                <a href="schedule.php?ids=<?php echo $row['id'];?>" onclick="return confirmDelete()" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-trash-o m-r-5"></i></a>
                                                
                                            </div>
                                        </td>
                                        
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
    return confirm('Are you sure want to delete this Schedule?');
}
</script>