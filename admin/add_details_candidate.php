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
		<div class="col-sm-6">
	   <h3>Add Candidate</h3>
     <form method ="POST">
      <?php
      $conn=new mysqli("localhost","root","","votingsystem_db");
      $election_name=$_GET['election_name'];
      $total_candidate=$_GET['total_candidate'];
      


      ?>
        <label>Election Name</label>
        <input type="text" name="election_name" value="<?php echo $election_name;?>" class="form-control" readonly="readonly">


      <?php

      for ($i=1; $i<=$total_candidate ; $i++) { 
        ?>

        <div class="form-group">
          <label>Candidate Name <?php echo $i;?></label>
          <input type="text" name="candidate_name<?php echo $i;?>" class="form-control">
          

        </div>

        <?php

      }


      ?>
      <input type="submit" name="add_details_candidate" class="btn btn-success">
  
       </form> 
</div>
</div>
</body>
</html>
<?php

if(isset($_POST['add_details_candidate'])){
  
   $total_candidate=$_GET['total_candidate'];
   $election_name=$_POST['election_name'];

   for ($i=1; $i<=$total_candidate ; $i++) { 
     $candidate_name[]=$_POST['candidate_name'.$i];
   }
   for ($i=0; $i<$total_candidate; $i++) { 
     $insert="INSERT into candidate_tbl (candidate_name,election_name) values('$candidate_name[$i]','$election_name')";
     $run=$conn->query($insert);
   }
   if($run){
      echo "Success";
   }
   else{
    echo "Error";
   }


}


?>
