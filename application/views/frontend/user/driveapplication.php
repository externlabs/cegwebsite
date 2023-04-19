<?php
    $drive_application = $this->db->where('student_id',$_SESSION['user_id'])->get('drive_application')->result_array();
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Subscriptions</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Company Name</th>
                            <th>Designation</th>
                            <th>No. Of Post</th>
                            <th>Vanue</th>
                            <th>Job Location</th>
                            <th>Drive Method</th>
                            <th>Drive Date</th>
                            <th>Salaray</th>
                            <th>Department</th>
                            <th>View Drive</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($drive_application as $drive){ 
                            $drive_data = $this->db->where('drive_id',$drive['drive_id'])->get('drive')->result_array();
                            foreach($drive_data as $value){
                                $company_data = $this->db->where('company_id',$value['company_id'])->get('company')->result_array();
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <?php foreach($company_data as $company){?>
                            <td><?php echo $company['company_name']?></td>
                            <?php }?>
                            <td><?php echo $value['designation']?></td>
                            <td><?php echo $value['post_no']?></td>
                            <td><?php echo $value['vanue']?></td>
                            <td><?php echo $value['job_location']?></td>
                            <td><?php echo $value['drive_method']?></td>
                            <td><?php echo $value['drive_date']?></td>
                            <td><?php echo $value['salary']?></td>
                            <td><?php echo $value['department']?></td>
                            <td><a href="<?php echo base_url()?>drive/<?php echo $drive['drive_id']?>" target="_blank"><button>View Drive</button></a></td>
                        </tr>
                        <?php }$i++;}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>