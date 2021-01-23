<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['user_id_generated']){
	header("location:election.php");
exit();
}
?>
<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<form method="post" action="">
      <?php
      require("includes/db.php");
      $election_name=$_GET['election_name'];
      $election_name=str_replace('-',' ',$election_name);
      ?>

          <div class="form-group">
            <input type='text' value="<?php echo $election_name;?>" class='form-control' readonly/>

          </div>

       <?php

      $select="select * from candidate_tbl where election_name='$election_name'";
      $run=$conn->query($select);
      if($run->num_rows>0){
             while($row=$run->fetch_array()){
                 ?>
                 <div class="form-group">
                  <input type="radio" name="candidate_name" class="list-group" value="<?php echo $row['candidate_name'];?>">
                 <label><?php echo $row['candidate_name'];?></label>

                 </div>

                 <?php

             }

      }

      ?>  
      <input type="submit" name="vote_cast" class="btn btn-success" value="Now Cast Your Vote">
     
    </form>
	</div>
</div>
<?php
 if(isset($_POST['vote_cast'])){
   $candidate_name=$_POST['candidate_name'];
   $user_email=$_SESSION['user_email'];
   $select="select * from result_tbl where user_email='$user_email' and election_name='$election_name'";
   $exe1=$conn->query($select);
   if($exe1->num_rows>0){
    echo "You have already cast your vote against Election".$election_name;
   }
   else{

      $insert="insert into result_tbl (user_email,candidate_name,election_name) values('$user_email','$candidate_name','$election_name')";
   $run=$conn->query($insert);
   if($run){
      $update="update candidate_tbl set total_vote=`total_vote`+'1' where candidate_name='$candidate_name' and election_name='$election_name'";
      $exe=$conn->query($update);
      if($exe){
        echo "You have successfully cast your vote";
      }
      else{
        echo "You did not cast your vote successfully";
      }
    
   }
   else{
    echo "Error";
   }

   }

 
 }


?>
