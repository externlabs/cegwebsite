
<?php 
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else  
        $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
  
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];   
    $driveId = basename($url); 
   
    $drive_data = $this->db->where('drive_id',$driveId)->get('drive')->result_array();
    
    foreach($drive_data as $value){
        $company_id = $value['company_id'];
    }
    $company_data = $this->db->where('company_id',$company_id)->get('company')->result_array();
?>



<div class="container my-4">
    <h3 class="text-center "> Comapny Information</h3>
    <?php foreach($company_data as $company){?>
    <p> <b>company Name:</b> <?php echo $company['company_name']?> </p>
    <p> <b> company description:</b> <?php echo $company['company_desc']?> </p>
    <p> <b>company website:</b> <?php echo $company['company_website']?> </p>
    <?php }?>
    <h3 class="text-center mt-4 "> Drive Information</h3>
    <?php foreach($drive_data as $value){?>
    <p> <b>Designation: </b> <?php echo $value['designation']?></p>
    <p> <b>No. Of Post:</b> <?php echo $value['post_no']?></p>
    <p> <b>Vanue:</b> <?php echo $value['vanue']?></p>
    <p> <b>Job Location:</b> <?php echo $value['job_location']?></p>
    <p> <b>Elegibility:</b> <?php echo $value['eligibility']?></p>
    <p> <b>Job Description:</b> <?php echo $value['job_desc']?></p>
    <p> <b>Drive Method: </b> <?php echo $value['drive_method']?></p>
    <p> <b>Drive Date: </b> <?php echo $value['drive_date']?></p>
    <p> <b>Start Date To Apply:</b> <?php echo $value['start_date']?></p>
    <p> <b>Last Date To Apply:</b> <?php echo $value['last_date']?></p>
    <p> <b>Salary:</b> <?php echo $value['salary']?></p>
    <p> <b>Department:</b> <?php echo $value['department']?></p>
    <p> <b>Benefits:</b> <?php echo $value['benefits']?></p>
    <p> <b>Selection Process :</b> <?php echo $value['selection_process']?></p>
    <p> <b>Others:</b> <?php echo $value['other']?></p>
    <?php }?>
</div>