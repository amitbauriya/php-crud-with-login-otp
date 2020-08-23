<?php
   //home.php
   
   session_start();
   
   if(!isset($_SESSION["user_id"]))
   {
   	header("location:login.php");
   }
   
   include('database_connection.php');
   
   include('function.php');
   
   $user_name = '';
   $user_id = '';
   
   if(isset($_SESSION["user_name"], $_SESSION["user_id"]))
   {
   	$user_name = $_SESSION["user_name"];
   	$user_id = $_SESSION["user_id"];
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>PHP CRUD with Login/Registration OTP Validation</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="http://code.jquery.com/jquery.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <style>
         .footer {
         position: absolute;
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
         <br />
         <br />
         <div class="row">
            <div class="col-md-9">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Restaurant Entries</h3>
                  </div>
                  <div class="panel-body">
                     <div class="table-responsive">
                        <br />
                        <div align="right">
                           <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
                        </div>
                        <br /><br />
                        <table id="user_data" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th width="10%">Image</th>
                                 <th width="35%">Restaurant Name</th>
                                 <th width="35%">Location Name</th>
                                 <th width="10%">Edit</th>
                                 <th width="10%">Delete</th>
                              </tr>
                           </thead>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Restaurant Dashboard</h3>
                  </div>
                  <div class="panel-body">
                     <h4 align="center">Welcome <?php echo $user_name; ?></h4>
                  </div>
               </div>
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">User Profile</h3>
                  </div>
                  <div class="panel-body">
                     <div align="center">
                        <?php
                           Get_user_avatar($user_id, $connect);
                           echo '<br /><br />';
                           echo $user_name;
                           ?>
                        <br />
                        <br />
                        <a href="logout.php" class="btn btn-default">Logout</a>
                     </div>
                  </div>
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
   <div id="userModal" class="modal fade">
      <div class="modal-dialog">
         <form method="post" id="user_form" enctype="multipart/form-data">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Restaurant</h4>
               </div>
               <div class="modal-body">
                  <label>Enter Restaurant Name</label>
                  <input type="text" name="restaurant_name" id="restaurant_name" class="form-control" />
                  <br />
                  <label>Enter Restaurant Location</label>
                  <input type="text" name="restaurant_location" id="restaurant_location" class="form-control" />
                  <br />
                  <label>Select Restaurant Image</label>
                  <input type="file" name="user_image" id="user_image" />
                  <span id="user_uploaded_image"></span>
               </div>
               <div class="modal-footer">
                  <input type="hidden" name="user_id" id="user_id" />
                  <input type="hidden" name="operation" id="operation" />
                  <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <script type="text/javascript" language="javascript" >
      $(document).ready(function(){
       $('#add_button').click(function(){
        $('#user_form')[0].reset();
        $('.modal-title').text("Add Restaurant");
        $('#action').val("Add");
        $('#operation').val("Add");
       });
       
       var dataTable = $('#user_data').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
         url:"fetch.php",
         type:"POST"
        },
        "columnDefs":[
         {
          "targets":[0, 3, 4],
          "orderable":false,
         },
        ],
      
       });
      
       $(document).on('submit', '#user_form', function(event){
        event.preventDefault();
        var restaurantName = $('#restaurant_name').val();
        var restaurantLocation = $('#restaurant_location').val();
        var extension = $('#user_image').val().split('.').pop().toLowerCase();
        if(extension != '')
        {
         if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
         {
          alert("Invalid Image File");
          $('#user_image').val('');
          return false;
         }
        } 
        if(restaurantName != '' && restaurantLocation != '')
        {
         $.ajax({
          url:"insert.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
           alert(data);
           $('#user_form')[0].reset();
           $('#userModal').modal('hide');
           dataTable.ajax.reload();
          }
         });
        }
        else
        {
         alert("Both Fields are Required");
        }
       });
       
       $(document).on('click', '.update', function(){
        var user_id = $(this).attr("id");
        $.ajax({
         url:"fetch_single.php",
         method:"POST",
         data:{user_id:user_id},
         dataType:"json",
         success:function(data)
         {
          $('#userModal').modal('show');
          $('#restaurant_name').val(data.restaurant_name);
          $('#restaurant_location').val(data.restaurant_location);
          $('.modal-title').text("Edit Restaurant Details");
          $('#user_id').val(user_id);
          $('#user_uploaded_image').html(data.user_image);
          $('#action').val("Edit");
          $('#operation').val("Edit");
         }
        })
       });
       
       $(document).on('click', '.delete', function(){
        var user_id = $(this).attr("id");
        if(confirm("Are you sure you want to delete this?"))
        {
         $.ajax({
          url:"delete.php",
          method:"POST",
          data:{user_id:user_id},
          success:function(data)
          {
           alert(data);
           dataTable.ajax.reload();
          }
         });
        }
        else
        {
         return false; 
        }
       });
       
       
      });
   </script>
</html>