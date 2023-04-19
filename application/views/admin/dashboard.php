
<?php 
    $company_data = $this->db->get('company')->result_array();
    $student_data = $this->db->get('student')->result_array();
    $student_count = count($student_data);
    $company_count = count($company_data);
?>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <p class="text-center">Registered Company</p>
                </div>
                <div class="card-body">
                    <p class="text-center"><?php echo $company_count?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <p class="text-center">Registered Students</p>
                </div>
                <div class="card-body">
                    <p class="text-center"><?php echo $student_count?></p>
                </div>
            </div>
        </div>
    </div>
</div>