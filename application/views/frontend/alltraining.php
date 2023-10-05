
<?php 
  $training_data = $this->db->get('training')->result_array();
?>



<div class="container campus-page my-md-5 my-3">
  <h2 class="text-center ">Apply for Upcoming Training</h2>
  <table class="table table-bordered mt-3">
    <tr>
      <th>Sr. no.</th>
      <th>Training name</th>
      <th>Last Date for Apply</th>
      <th>Training Start Date</th>
      <th>Training End Date</th>
      <th>Description</th>
      <th>View Available Courses</th>
    </tr>
    <?php $i=1; foreach($training_data as $value){ 
      
      if($value['registration_last_date'] >= date("Y-m-d")){
      ?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $value['training_name']?></td>
      <td><?php echo $value['registration_last_date']?></td>
      <td><?php echo $value['start_date']?></td>
      <td><?php echo $value['end_date']?></td>
      <td><?php echo $value['training_desc']?></td>
      <td><a href="<?php echo base_url()?>training/<?php echo $value['training_link']?>">View Available Courses</a></td>
    </tr>
  <?php }$i++;}?>
  </table>
</div>

