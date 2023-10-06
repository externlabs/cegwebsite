<?php
    $training_application = $this->db->where('user_id',$_SESSION['user_id'])->where('user_type', $_SESSION['profile_type'])->get('transactions')->result_array();
   
?>

<div class="subscriptions_page">
    <!-- Page Heading -->
    <h1 class="">My Training Applications</h1>
    <!-- DataTales Example -->
    <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
            unset($_SESSION['success']);
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            unset($_SESSION['error']);
        }
    ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Training Name</th>
                            <th>Training Description</th>
                            <th>Training Start Date</th>
                            <th>Training End Date</th>
                            <th>Course Name</th>
                            <th>Course Description</th>
                            <th>Course type</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($training_application as $value){ 
                            $course_data = $this->db->where('course_id',$value['course_id'])->get('course')->result_array();

                            foreach( $course_data as $course){
                                $training_data = $this->db->where('training_id',$course['training_id'])->get('training')->result_array();
                            }
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <?php foreach($training_data as $training){?>
                            <td><?php echo $training['training_name']?></td>
                            <td><?php echo $training['training_desc']?></td>
                            <td><?php echo $training['start_date']?></td>
                            <td><?php echo $training['end_date']?></td>
                            <?php }?>
                            
                            <?php foreach($course_data as $new_course){?>
                                <td><?php echo $new_course['course_name']?></td>
                                <td><?php echo $new_course['course_desc']?></td>
                                <td><?php echo $new_course['course_type']?></td>
                            <?php }?>
                            <td><?php echo $value['amount']?></td>
                        </tr>
                        <?php $i++;}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>