<?php
   //resend_email_otp.php
   
   include('database_connection.php');
   
   $message = '';
   
   session_start();
   
   if(isset($_SESSION["user_id"]))
   {
   	header("location:home.php");
   }
   
   if(isset($_POST["resend"]))
   {
   	if(empty($_POST["user_email"]))
   	{
   		$message = '<div class="alert alert-danger">Email Address is required</div>';
   	}
   	else
   	{
   		$data = array(
   			':user_email'	=>	trim($_POST["user_email"])
   		);
   
   		$query = "
   		SELECT * FROM register_user 
   		WHERE user_email = :user_email
   		";
   
   		$statement = $connect->prepare($query);
   
   		$statement->execute($data);
   
   		if($statement->rowCount() > 0)
   		{
   			$result = $statement->fetchAll();
   			foreach($result as $row)
   			{
   				if($row["user_email_status"] == 'verified')
   				{
   					$message = '<div class="alert alert-info">Email Address already verified, you can login into system</div>';
   				}
   				else
   				{
   					require 'class/mail/PHPMailerAutoload.php';
   					
   					//require 'class.smtp.php';
   
   					$mail = new PHPMailer;
   
   			        $mail->From = 'contact@cloudesign.com';
   			        
   			        $mail->FromName = 'AmitBauriya';
   			        
   			        $mail->AddAddress($row["user_email"]);
   			        
   			        $mail->addReplyTo("reply@cloudesign.com", "Reply"); //CC and BCC
   
   					$mail->WordWrap = 50;
   
   					$mail->IsHTML(true);
   					$mail->Subject = 'Verification code for Verify Your Email Address';
   					$message_body = '
   					<p>For verify your email address, enter this verification code when prompted: <b>'.$row["user_otp"].'</b>.</p>
   					<p>Sincerely,</p>
   					';
   					$mail->Body = $message_body;
   
   					if($mail->Send())
   					{
   									
   				echo '<script type="text/javascript">alert("Please Check Your Email for Verification Code \n Note: Using server mail to send all emails to your inbox sometime take time but you will receive shortly, the register OTP on ur mail will be: '.$row["user_otp"].'");</script>';
   						echo '<script type="text/javascript">window.location="email_verify.php?code='.$row["user_activation_code"].'";</script>';
   					}
   					else
   					{
                       $message = $mail->ErrorInfo;
   					}
   				}
   			}
   		}
   		else
   		{
   			$message = '<div class="alert alert-danger">Email Address not found in our record</div>';
   		}
   	}
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
         <h3 align="center">Resend Email Verification OTP Page</h3>
         <br />
         <div class="col-md-3">&nbsp;</div>
         <div class="col-md-6">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title">Resend Email Verification OTP</h3>
               </div>
               <div class="panel-body">
                  <?php echo $message; ?>
                  <form method="post">
                     <div class="form-group">
                        <label>Enter Your Email</label>
                        <input type="email" name="user_email" class="form-control" />
                     </div>
                     <div class="form-group" align="right">
                        <input type="submit" name="resend" class="btn btn-success" value="Send" />
                     </div>
                  </form>
               </div>
            </div>
            <div style="display: flex;width: 100%;position: relative;">
               <div style="padding-right: 15px;"><b><a href="login.php">Login</a></b></div>
               <div style="padding-right: 15px;"><b><a href="index.php">Not a user? Register!</a></b></div>
            </div>
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