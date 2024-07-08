<?php
 require 'includes/dbconnection.php';

 if(isset($_POST['save']))

 	$fetch_query = mysqli_query($connection, "SELECT MAX(id) AS id FROM tbl_appointment");
    // $row = mysqli_fetch_row($fetch_query);

    //     if($row[0]==0)
    //   {
    //     $apt_id = 1;
    //   }
    //   else
    //   {
    //     $apt_id = $row[0] + 1;
    //   }
{

	// $APT_num = 'APT-'.$apt_id;
      $Name = mysqli_real_escape_string($connection, $_POST['Name']);
      $Email = mysqli_real_escape_string($connection, $_POST['Email']) ;
      $doctor_name = mysqli_real_escape_string($connection, $_POST['doctor_name']);
      $specialization = mysqli_real_escape_string ($connection, $_POST['specialization']);
      $Phone = mysqli_real_escape_string ($connection, $_POST['Phone']);
      $Date = mysqli_real_escape_string ($connection, $_POST['Date']);
      $time = mysqli_real_escape_string ($connection, $_POST['time']);
      $message = mysqli_real_escape_string ($connection, $_POST['message']);
      $status = mysqli_real_escape_string ($connection, $_POST['status']);

	

	$query = "INSERT INTO tbl_appointment (APT_num, Name, Email, doctor_name, specialization, Phone, Date, time, message, status) VALUES ( '$Name', '$Email', '$doctor_name', '$specialization', '$Phone', '$Date', '$time', '$message', '$status')";

	$query_run = mysqli_query($connection, $query);
	if($query_run)
	{
		 $message = "Appointment updated successfully";		
		 header("Location: admin/appointments.php");
		exit(0);
	}
	else
	{
		$message = "Error";
	}
}


?>