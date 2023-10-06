<?php
    $qualification = $this->db->where('student_id',$_SESSION['user_id'])->get('qualification')->result_array();

    if($_SESSION['user_type'] == "student"){
        $user_type = 'student';
    }else{
        $user_type = 'faculity';
    }
?>

    <div class="qualifications_page">
        <h1 class="">My Qualifications</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Class</th>
                                <th>University Name</th>
                                <th>Institute Type</th>
                                <th>State</th>
                                <th>Start Year</th>
                                <th>Passing Year</th>
                                <th>Marks (%)</th>
                                <th>Branch</th>
                                <th>Back logs</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($qualification as $value){ if($user_type == $value['user_type']){?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $value['class']?></td>
                                <td><?php echo $value['university_name']?></td>
                                <td><?php echo $value['institute_type']?></td>
                                <td><?php echo $value['state']?></td>
                                <td><?php echo $value['start_year']?></td>
                                <td><?php echo $value['passing_year']?></td>
                                <td><?php echo $value['percentage']?></td>
                                <td><?php echo $value['branch']?></td>
                                <td><?php echo $value['backlog']?></td>
                                <td><a href="<?php echo base_url()?>user/editqualification?id=<?php echo $value['qualification_id']?>"><button type="button" class="fas fa-edit edit-btn"></button></a></td>
                            </tr>
                            <?php }$i++;}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
