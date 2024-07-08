<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/ok/favicon.ico">
    <title>PATIENT APPOINTMENT</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
</head>

<body>
    <div class="main-wrapper" style="position: fixed;">
        <div class="header">
			<div class="header-left">
				<a href="dashboard.php" class="logo">
					<img src="assets/img/ok/logo.ico" width="35" height="35" alt=""> <span>PATIENT APPOINTMENT</span>
				</a>
			</div>

			<a id="toggle_btn" href="javascript:void(0);" role="button"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <div class="nav user-menu float-right">
                   <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <!-- <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
						</span> -->
                        <?php 
                        if($_SESSION['name']){ ?>
						<span>Admin</span>
                    <?php } else {?>
                        <span><?php echo $_SESSION['name']; ?></span>
                    <?php } ?>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
                </li>
                <li class="nav-item dropdown">
                    <a href="logout.php" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <!-- <span class="user-img">
                            <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
                        </span> -->
                        <?php 
                        if($_SESSION['name']){ ?>
                        <span>Logout</span>
                    <?php } else {?>
                        <span><?php echo $_SESSION['name']; ?></span>
                    <?php } ?>
                    </a>
                </li>

           
            <div class="dropdown-menu">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
            <!-- <div class="dropdown-menu">
                <a href="#" class="dropdown-item" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right" arial-labelledby="dropdownMenuButton">
                    
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </div> -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <?php
                    
                    if($_SESSION['name']){?>
                    <ul>
                        
                        <li class="active">
                            <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        
						<li>
                            <a href="doctors.php"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                        </li>
                         <li>
                            <a href="email.php"><i class="fa fa-envelope"></i> <span>Mailer</span></a>
                        </li>
                        
												                       
                    </ul>
                <?php } else {?>
                    <ul>
                        
                        <li class="active">
                            <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        
                        <li>
                            <a href="doctors.php"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                        </li>
                        <li>
                            <a href="patients.php"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>

                         <li>
                            <a href="schedule.php"><i class="fa fa-envelope"></i> <span>Mailer</span></a>
                        </li>
                                                             
                    </ul>
                <?php } ?>
                </div>
            </div>
      </div>
</div>
