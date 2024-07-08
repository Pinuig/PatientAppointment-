<?php
    session_start();
    if(empty($_SESSION['name']))
    {
        header('location:index.php');
    }
    include('header.php');
    include('includes/dbconnection.php');
    ?>
<body>
<div class="page-wrapper">
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
         <form action="send_email.php" method="post"> 
			<div class="row">
			  <div class="col-sm-6">
                <div class="form-group">
                    <h1>Send Email to Users</h1>
                
                    <label for="to">To:</label>
                    <input type="email" class="form-control" id="too" name="too" required><br>

                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" required><br>

                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" name="message" required></textarea><br>

                    <?php
                    if (isset($_GET['status'])) {
                        echo "<p style='color: green;'>Email sent successfully!</p>";
                    } elseif (isset($_GET['error'])) {
                        echo "<p style='color: red;'>Failed to send email.</p>";
                    }
                    ?>

                    <button type="submit" class="btn btn-primary submit-btn">Send Email</button>
                    
                 </div>
                </div>
            </div>
            </form>    
        </div>
    </div> 
    </div> 
    </div>      
</body>    


