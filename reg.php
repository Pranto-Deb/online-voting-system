<?php
include("includes/header.php");
?>
<?php
require("includes/db.php");
$emailError="";
$accountSuccess="";
if(isset($_POST['register'])){
	 $user_name=$_POST['fullname'];
	 $user_email=$_POST['email'];
	 $user_gender=$_POST['gender'];
	 $user_province=$_POST['province'];
	 $user_password=$_POST['password'];


	$select="select * from users_db where user_email='$user_email'";
	$exe=$conn->query($select);
	if($exe->num_rows>0){
		$emailError="<p class='text text-center text-danger'>Email already registed</p>";
	}
	else{

	$insert="insert into users_db (user_name,user_email,user_gender,user_province,user_password) values ('$user_name','$user_email','$user_gender','$user_province','$user_password')";
	$run=$conn->query($insert);
	if($run){
		$accountSuccess="<p class='text text-center text-success'>Account Create Successfully</p>";
	}
	else{
		echo"Error";

	 }
	}

}
?>

<body>
<hr>
    <div class="container">
   	    <div class="row">
   	    	<div class="col-sm-8 col-sm-offset-2 alert alert-success">
   	    		
   	    		<h3 class="text text-center alert bg-primary" style="color:white;">User Registration </h3>
   	    		<?php
   	    		    if($emailError!=""){
   	    		    	echo $emailError;
   	    		    }
   	    		    if($accountSuccess!=""){
   	    		    	echo $accountSuccess;
   	    		    }

   	    		?>
   	    		<form method="post">
   	    		    <div class="form-group">
   	    			    <label for="exampleInputEmail">Full Name</label>
   	                    <input type="text" class="form-control" id="exampleInputEmail" name="fullname" placeholder="Enter Full Name" required>
   	    			</div>
   	    			<div class="form-group">
   	    			    <label for="exampleInputEmail">Email Address</label>
   	    			    <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Enter email" required>
   	    			</div>
   	    			<div class="form-group">
   	    				<label for="gender">Gender</label>
   	    				<select name="gender" class="form-control">
   	    					<option value="">select</option>
   	    					<option value="Male">Male</option>
   	    					<option value="Female">Female</option>
   	    				</select>
   	    			</div>
   	    			<div class="form-group">
   	    				<label for="province">Province</label>
   	    				<select name="province" class="form-control">
   	    					<option value="">select</option>
   	    					<option value="jamalpur">Jamalpur</option>
   	    					<option value="sherpur">Sherpur</option>
   	    					<option value="mymensingh">Mymensingh</option>
   	    				</select>
                    </div>
                    <div class="form-group">
   	    				<label for="password">Password</label>
   	    				<input type="password" name="password" class="form-control">
   	    			</div>
   	    		    <div class="form-group">
   	    	            <button type="submit" class="btn btn-success btn-block" name="register">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
</body>
</html> 