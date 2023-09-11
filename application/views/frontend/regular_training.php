<?php 
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else  
        $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
  
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];   
    $course_id = basename($url); 
   
    $course_data = $this->db->where('course_id',$course_id)->get('course')->result_array();
    
    foreach($course_data as $value){
        $training_id = $value['training_id'];
    }

    $training_data = $this->db->where('training_id',$training_id)->get('training')->result_array();
?>



<div class="container my-4">
    <h3 class="text-center "> Training Information</h3>
    <?php foreach($training_data as $training){?>
    <p> <b>Training Name:</b> <?php echo $training['training_name']?> </p>
    <p> <b> Training description:</b> <?php echo $training['training_desc']?> </p>
    <p> <b>Training Start Date:</b> <?php echo $training['start_date']?> </p>
    <p> <b>Training End Date:</b> <?php echo $training['end_date']?> </p>
    <?php }?>

    <h3 class="text-center mt-4 "> Course Information</h3>
    <?php foreach($course_data as $value){?>
    <p> <b>Course Name: </b> <?php echo $value['course_name']?></p>
    <p> <b>Course Description:</b> <?php echo $value['course_desc']?></p>
    <p> <b>Course Type:</b> <?php echo $value['course_type']?></p>
    <p> <b>Form Amount:</b> <?php if($value['form_amount'] == null){echo '0';}else{echo $value['form_amount'];}?></p>
    <p> <b>Course Amount:</b> <?php if($value['course_amount'] == null){echo '0';}else{echo $value['course_amount'];}?></p>
    



    <form action="" method="post">
        <input type="checkbox" name="agree" id="" required> I have agree with all the term & conditions.
        <input type="hidden" name="student_id" value="<?php echo $_SESSION['user_id']?>">
        <input type="hidden" name="course_id" value="<?php echo $value['course_id']?>">
        <br><br><button class="btn btn-primary mt-2">Apply Now</button>
    </form>
    <?php }?>
</div>