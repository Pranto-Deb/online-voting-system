<?php
session_start();
include("includes/header.php");
?>
<?php
require("includes/db.php");
$error="";
$success="";
if(isset($_POST['login'])){

   $user_email=$_POST['email'];
   $user_password=$_POST['password'];

   $select="select * from users_db where user_email='$user_email' and user_password='$user_password'";
   $run=$conn->query($select);
   if($run->num_rows>0){
      while ($row=$run->fetch_array()) {
          $_SESSION['user_name']=$user_name=$row['user_name'];
          $_SESSION['user_email']=$user_email=$row['user_email'];
          echo"<script>window.location.href='welcome.php'</script>";
      }
   }
   else{
      $error="Invalid Email or Password! Try Again";
   }
	
}
?>
<body>
  
<hr>
    <div class="container">
   	    <div class="row">
   	    	<div class="col-sm-8 col-sm-offset-2 alert alert-success">
   	    		
   	    		<h3 class="text text-center alert bg-primary" style="color:white;">User Login Area</h3>
   	    		<h5 class="text text-center text-danger"><?php
   	    		    if($error!=""){
   	    		    	echo $error;
   	    		    }
                    if($success!=""){
                        echo $success;
                    }

   	    		?><h5>
   	    		<form method="post">
   	    		    
   	    			<div class="form-group">
   	    			    <label for="exampleInputEmail">Email Address</label>
   	    			    <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Enter email" required>
   	    			</div>

                <div class="form-group">
   	    				<label for="password">Password</label>
   	    				<input type="password" name="password" class="form-control" placeholder="Enter password" required>
   	    	    </div>
   	    		    <div class="form-group">
   	    	            <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
</body>
</html> 