<?php
    $drive_application = $this->db->get('drive_application')->result_array();
    
    $poc_data = $this->db->where('poc_id',$_SESSION['user_id'])->get('company_poc')->result_array();

    foreach($poc_data as $poc){
        $company_id = $poc['company_id'];
    }

?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Drive Applications</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Student Number</th>
                            <th>Student DOB</th>
                            <th>Student Gender</th>
                            <th>Student Resume</th>
                            <th>Designation</th>
                            <th>Drive Date</th>
                            <th>Department</th>
                            <th>View Drive</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($drive_application as $drive){ 
                            $drive_data = $this->db->where('drive_id',$drive['drive_id'])->get('drive')->result_array();
                            $student_data = $this->db->where('student_id',$drive['student_id'])->get('student')->result_array();
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <?php foreach($student_data as $student){?>
                                <td><?php echo $student['student_name']?></td>
                                <td><?php echo $student['student_email']?></td>
                                <td><?php echo $student['student_number']?></td>
                                <td><?php echo $student['student_dob']?></td>
                                <td><?php echo $student['student_gender']?></td>
                                <td><a href="<?php echo base_url()?>upload/student/<?php echo $student['resume']?>" target="_blank">View Resume</a></td>
                            <?php }?>
                            <?php foreach($drive_data as $value){if($value['company_id'] == $company_id){?>
                            <td><?php echo $value['designation']?></td>
                            <td><?php echo $value['drive_date']?></td>
                            <td><?php echo $value['department']?></td>
                            <td><a href="<?php echo base_url()?>drive/<?php echo $drive['drive_id']?>" target="_blank"><button>View Drive</button></a></td>
                            <?php }}?>
                        </tr>
                        <?php $i++;}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>