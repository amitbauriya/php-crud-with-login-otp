<?php
   session_start();
   
   if(isset($_SESSION["user_id"]))
   {
   	header("location:home.php");
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
         <h3 align="center">Restaurant Login</h3>
         <br />
         <?php
            if(isset($_GET["register"]))
            {
            	if($_GET["register"] == 'success')
            	{
            		echo '
            		<h4 style="text-align: center;padding-bottom: 20px;" class="text-success">Email Successfully verified, Registration Process Completed...</h4>
            		';
            	}
            }
            ?>
         <div class="row">
            <div class="col-md-3">&nbsp;</div>
            <div class="col-md-6">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">User Login</h3>
                  </div>
                  <div class="panel-body">
                     <form method="POST" id="login_form">
                        <div class="form-group" id="email_area">
                           <label>Enter Email Address</label>
                           <input type="text" name="user_email" id="user_email" class="form-control" />
                           <span id="user_email_error" class="text-danger"></span>
                        </div>
                        <div class="form-group" id="password_area" style="display:none;">
                           <label>Enter password</label>
                           <input type="password" name="user_password" id="user_password" class="form-control" />
                           <span id="user_password_error" class="text-danger"></span>
                        </div>
                        <div class="form-group" id="otp_area" style="display:none;">
                           <label>Enter OTP Number</label>
                           <input type="text" name="user_otp" id="user_otp" class="form-control" />
                           <span id="user_otp_error" class="text-danger"></span>
                        </div>
                        <div class="form-group" align="right">
                           <input type="hidden" name="action" id="action" value="email" />
                           <input type="submit" name="next" id="next" class="btn btn-primary" value="Next" />
                        </div>
                     </form>
                  </div>
               </div>
               <div style="display: flex;width: 100%;position: relative;">
                  <div style="padding-right: 15px;"><b><a href="index.php">New User?</a></b></div>
                  <div style="padding-right: 15px;"><b><a href="forget_password.php?step1=1">Forgot Password?</a></b></div>
               </div>
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
<script>
   $(document).ready(function(){
   	$('#login_form').on('submit', function(event){
   		event.preventDefault();
   		var action = $('#action').val();
   		$.ajax({
   			url:"login_verify.php",
   			method:"POST",
   			data:$(this).serialize(),
   			dataType:"json",
   			beforeSend:function()
   			{
   				$('#next').attr('disabled', 'disabled');
   			},
   			success:function(data)
   			{
   				$('#next').attr('disabled', false);
   				if(action == 'email')
   				{
   					if(data.error != '')
   					{
   						$('#user_email_error').text(data.error);
   					}
   					else
   					{
   						$('#user_email_error').text('');
   						$('#email_area').css('display', 'none');
   						$('#password_area').css('display', 'block');
   					}
   				}
   				else if(action == 'password')
   				{
   					if(data.error != '')
   					{
   						$('#user_password_error').text(data.error);
   					}
   					else
   					{
   						$('#user_password_error').text('');
   						$('#password_area').css('display', 'none');
   						$('#otp_area').css('display', 'block');
   						 $('#user_otp_error').text(data.success);
   					
   					}
   				}
   				else
   				{
   				   
   					if(data.error != '')
   					{
   						$('#user_otp_error').text(data.error);
   					}
   					else
   					{
   						window.location.replace("home.php");
   					}
   				}
   
   				$('#action').val(data.next_action);
   			}
   		})
   	});
   });
   
</script>