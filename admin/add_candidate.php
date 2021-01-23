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
     <form method ="GET" action="add_details_candidate.php">
        <div class="form-group">
          <label>Select Election Name</label>
         <select class="form-control" name="election_name">
        <option value="" selected="selected">Select Election</option>

         <?php
         $conn=new mysqli("localhost","root","","votingsystem_db");
      
          $select="SELECT * from election_tbl";
          $run=$conn->query($select);
          if($run->num_rows>0){
            while($row=$run->fetch_array()){

            


      ?>
      <option value="<?php echo $row['election_name'];?>"><?php echo $row['election_name'];?></option>
      

      <?php
      }
          }

      ?>



      </select>
           
        </div>
        <div class="form-group">
            <label>No of Candidate</label>
            <input type="text" name="total_candidate" class="form-control">

          


        </div>
       
        <input type="submit" name="add_election" class="btn btn-success">
       </form> 
</div>
</div>
</body>
</html>
