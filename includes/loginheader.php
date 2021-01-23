<!DOCTYPE html>
<html>
<head>
	<title>Online Voting System</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/mystyle.css" />
    <link rel="stylesheet" href="css/fonts.css" />
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
    <div class="container">
    	<nav class="navbar navbar-default">
    		<div class="container-fluid">
    			<div class="navbar-header">
    				<a href="" class="navbar-brand">Online Voting System</a>
    			</div>
    			<u1 class="nav navbar-nav">
    				<li><a href="">Home</a></li>
    				<li><a href="idgenerate.php">ID Generator</a></li>
    				<li><a href="election.php">Election</a></li>
    				<li><a href="result.php">Results</a></li>
    				<li><a href="vote.php">Vote</a></li>
    				<li><a href="logout.php">Logout</a></li>
                    <li><a href=""><?php echo $_SESSION['user_name'];?></a></li>
    			</u1>
    		</div>
    	</nav>
    </div>
    <div class ="container">

            <div class="col-sm-8 col-sm-offset-2 img-thumbnail" style="background-color:gray;">
                <img src="images/vote4.png" class="img img-responsive" />
            </div>
        
    </div>
  <br>
</body>
</html>