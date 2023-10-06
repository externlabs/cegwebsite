
<?php 
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else  
        $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
  
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];   
    $training_link = basename($url); 
   
    $training_data = $this->db->where('training_link',$training_link)->get('training')->result_array();
    
    foreach($training_data as $value){
        $training_id = $value['training_id'];
        $regsitartion_last_date = $value['registration_last_date'];
    }

    $course_data = $this->db->where('training_id',$training_id)->get('course')->result_array();
?>



<div class="container campus-page my-md-5 my-3">
  <h2 class="text-center ">Course List For Apply</h2>
  <table class="table table-bordered mt-3">
    <tr>
      <th>Sr. no.</th>
      <th>Course name</th>
      <th>Description</th>
      <th>Course Type</th>
      <th>Form Amount</th>
      <th>Course Amount</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>registration last date</th>
      <th>View Details</th>
    </tr>
<?php $i=1; foreach($course_data as $value){
    if($value['course_status'] == 1){
  if($regsitartion_last_date >= date("Y-m-d")){

  ?>
  
    <tr>
      <td><?php echo $i;?></td>
      
      <td><?php echo $value['course_name']?></td>
      <td><?php echo $value['course_desc']?></td>
      <td><?php echo $value['course_type']?></td>
      <td><?php if($value['form_amount'] == null){echo '0';}else{echo $value['form_amount'];}?></td>
      <td><?php if($value['course_amount'] == null){echo '0';}else{echo $value['course_amount'];}?></td>
      <?php foreach($training_data as $training){?>
        <td style="width:100px;"><?php echo $training['start_date']?></td>
        <td style="width:100px;"><?php echo $training['end_date']?></td>
        <td><?php echo $training['registration_last_date']?></td>
        <td><a href="<?php echo base_url()?>training/<?php echo $training['training_link']?>/<?php echo $value['course_id']?>" class="btn text-primary">View Details & apply</a></td>
      <?php }?>
    </tr>
  <?php } }$i++;}?>
  </table>
</div>


