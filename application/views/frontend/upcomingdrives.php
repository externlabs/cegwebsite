
<?php 
  $drive_data = $this->db->get('drive')->result_array();
  $company_data = $this->db->get('company')->result_array();
?>



<div class="container campus-page my-md-5 my-3">
  <h2 class="text-center ">Apply for Upcoming Campus</h2>
  <table class="table table-bordered mt-3">
    <tr>
      <th>Sr. no.</th>
      <th>Company name</th>
      <th>Designation</th>
      <th>Vanue</th>
      <th>Job Location</th>
      <th>Elegibility</th>
      <th>Drive Method</th>
      <th>Drive Date</th>
      <th>View Drive</th>
      <th>Apply</th>
    </tr>
    <?php $i=1; foreach($drive_data as $drive){ if($drive['status'] == "approve"){ 
      
      if($drive['start_date'] <= date("Y-m-d")  && $drive['last_date'] >= date("Y-m-d")){
      ?>
    <tr>
      <td><?php echo $i;?></td>
      <?php foreach($company_data as $company){ if($drive['company_id'] == $company['company_id']){?>
      <td><?php echo $company['company_name']?></td>
      <?php }}?>
      <td><?php echo $drive['designation']?></td>
      <td><?php echo $drive['vanue']?></td>
      <td><?php echo $drive['job_location']?></td>
      <td><?php echo $drive['eligibility']?></td>
      <td><?php echo $drive['drive_method']?></td>
      <td style="width:100px;"><?php echo $drive['drive_date']?></td>
      <td style="width:150px;"><a href="<?php echo base_url()?>drive/<?php echo $drive['drive_id']?>" target="_blank" class="btn text-primary">View drive</a></td>
      <td>
         <?php 
          if(isset($_SESSION['user_id'])){
            $user_type=$_SESSION['profile_type'];
            if($user_type == "student" || $user_type == "faculity"){
              echo '<a href="'.base_url().'apply/'.$drive['drive_id'].'"><button class="btn text-primary">Apply Now</button></a>';
            }else if($user_type == "company"){
              echo '';
            }
          }else{
            echo '<a href="'.base_url().'auth/student?id=apply"><button class="btn text-primary">Apply Now</button></a>';
          }
        ?>
        </td>
    </tr>
  <?php } }$i++;}?>
  </table>
</div>

