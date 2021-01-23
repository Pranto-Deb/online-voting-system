<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['user_id_generated']){
	header("location:election.php");
    
}
?>
<div class="container">
	<div class="col-md-6 col-md-offset-3">
    <h3 class="text text-info text-center">Result Portion</h3>
    <p class="text text-danger">In this section those elections results display which are closed or date expired</p>
		<form method="post" action="">
      <div class="form-group">
          <select class="form-control" name="election_name">
              <option  selected="selected" value="">Select Election</option>
              <?php
              $current_ts=time();
          require("includes/db.php");
          $select="SELECT * from election_tbl";
          $run=$conn->query($select);
          if($run->num_rows>0){
            while($row=$run->fetch_array()){
              $election_name=$row['election_name'];
              $election_start_date=$row['election_start_date'];
              $election_end_date=$row['election_end_date'];
              ?>
              <?php

              $election_end_date_ts=strtotime($election_end_date);
              if($election_end_date_ts<$current_ts){

              

              ?>

               <option value="<?php echo $election_name;?>"><?php echo $election_name;?></option>

              <?php
            }
          }
           }

              ?>

          </select>
        </div>

          <div class="form-group">
            <input type="submit" name="search_result" class="btn btn-success" value="Search Result">
      </div>

    </form>
    <table class="table table-responsive table-hover table-bordered text-center">
       <tr>
         
          <td>#</td>
          <td>Candidate Name</td>
          <td>Obtain Votes</td>
          <td>Winning Status</td>

       </tr>
         <?php

     if(isset($_POST['search_result'])){
       $election_name=$_POST['election_name'];
       $select="Select * from result_tbl where election_name='$election_name'";
       $run=$conn->query($select);
       if($run->num_rows>0){
          $total_election_vote=0;
          while($row=$run->fetch_array()){
            $total_election_vote=$total_election_vote+1;
          }
       }

          $select1="select * from candidate_tbl where election_name='$election_name'";
          $run1=$conn->query($select1);
          if($run1->num_rows>0){
            $total=0;
            
            while($row2=$run1->fetch_array()){
              $total=$total+1;
              $candidate_name=$row2['candidate_name'];
              $total_vote=$row2['total_vote'];
              $percentage=(($total_vote/$total_election_vote)*100);

              
              ?>
                <tr>
                  <td><?php echo $total;?></td>
                  <td><?php echo $candidate_name;?></td>
                  <td><?php echo $total_vote;?></td>
                   <td>
                      <?php
                        if($percentage>50){
                          ?>
                          <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progress-bar" 
                            aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="<?php echo $percentage;?>"
                            style="width: <?php echo $percentage;?>%">
                              <?php echo round($percentage, 2);?>%


                           </div>
                         </div>

                          <?php
                         
                        }
                        else if($percentage>40){
                          ?>
                           <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progress-bar" 
                            aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="<?php echo $percentage;?>"
                            style="width: <?php echo $percentage;?>%">
                              <?php echo round($percentage, 2);?>%


                           </div>
                         </div>


                          <?php
                        }
                        else{
                          ?>
                               <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progress-bar" 
                            aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="<?php echo $percentage;?>"
                            style="width: <?php echo $percentage;?>%">
                              <?php echo round($percentage, 2);?>%


                           </div>
                         </div>

                          <?php
                       
                        }

                         ?>

                   </td>
                </tr>

              <?php
              }
              ?>
              <tr>
                <td colspan="2">Total Votes</td>
                <td><?php echo $total_election_vote;?></td>
                <td></td>

              </tr>

              <?php


            }
            else{
              ?>
              <tr>
                <td colspan="4">Record Not Found</td>

              </tr>

              <?php
            }
          }

?>

    </table>
  </div>

	</div>
 
</div>