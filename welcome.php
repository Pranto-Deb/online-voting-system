<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['user_email']){
	header("location:login.php");
    
}
?>
<div class="container">
	<div class="col-sm-6">
		<h4 class="text text-center text-info bg-primary alert">How to Cast Your Vote</h4>
		<u1>
			<li>Firstly select <b>"ID Generate"</b>From navigation bar.</li>
			
		</u1>

	</div>
		<div class="col-sm-6">
            <img src="images/vote7.png" class="img img-responsive"/>
    	</div>

	</div>
</div>

