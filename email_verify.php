<?php
   //email_verify.php
   
   include('database_connection.php');
   include('function.php');
   
   $error_user_otp = '';
   $user_activation_code = '';
   $message = '';
   
   if(isset($_GET["code"]))
   {
   	$user_activation_code = $_GET["code"];
   
   	if(isset($_POST["submit"]))
   	{
   		if(empty($_POST["user_otp"]))
   		{
   			$error_user_otp = 'Enter OTP Number';
   		}
   		else
   		{
   			$query = "
   			SELECT * FROM register_user 
   			WHERE user_activation_code = '".$user_activation_code."' 
   			AND user_otp = '".trim($_POST["user_otp"])."'
   			";
   
   			$statement = $connect->prepare($query);
   
   			$statement->execute();
   
   			$total_row = $statement->rowCount();
   
   			if($total_row > 0)
   			{
   				$query = "
   				UPDATE register_user 
   				SET user_email_status = 'verified' 
   				WHERE user_activation_code = '".$user_activation_code."'
   				";
   
   				$statement = $connect->prepare($query);
   
   				if($statement->execute())
   				{
   					header('location:login.php?register=success');
   				}
   			}
   			else
   			{
   				$message = '<label class="text-danger">Invalid OTP Number</label>';
   			}
   		}
   	}
   }
   else
   {
   	$message = '<label class="text-danger">Invalid Url</label>';
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>PHP CRUD with Login/Registration OTP Validation</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="http://code.jquery.com/jquery.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <style>
         .footer {
         position: absolute;
         bottom: 0;
         width: 100%;
         height: 60px;
         line-height: 60px;
         background-color: #f5f5f5;
         display: block;
         }
         .text-muted {
         color: #6c757d!important;
         }
      </style>
   </head>
   <body>
      <br />
      <div class="container">
      <h3 align="center">Email Verification using OTP</h3>
      <br />
      <div class="col-md-3">&nbsp;</div>
      <div class="col-md-6">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">Enter OTP Number</h3>
            </div>
            <div class="panel-body">
               <?php echo $message; ?>
               <form method="POST">
                  <div class="form-group">
                     <label>Enter OTP Number</label>
                     <input type="text" name="user_otp" class="form-control" />
                     <?php echo $error_user_otp; ?>
                  </div>
                  <div class="form-group">
                     <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                  </div>
               </form>
            </div>
         </div>
         <div style="display: flex;width: 100%;position: relative;">
            <div style="padding-right: 15px;"><b><a href="login.php">Already a user?</a></b></div>
            <div style="padding-right: 15px;"><b><a href="register.php">New user? Register!</a></b></div>
         </div>
      </div>
      <br />
      <br />
      <footer class="footer">
         <div class="container">
            <span class="text-muted">Designed & Developed by Amit Bauriya. Follow on <a href="https://www.linkedin.com/in/amitbauriya/">Linkedin</a>&nbsp;&nbsp;<a href="https://github.com/amitbauriya">Github</a></span>
         </div>
      </footer>
   </body>
</html>