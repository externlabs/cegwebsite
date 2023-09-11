<?php
    $poc_data = $this->db->where('poc_id',$_SESSION['user_id'])->get('company_poc')->result_array();

    foreach($poc_data as $value){
        $company_id = $value['company_id'];
    }
    $drive_data = $this->db->where('company_id',$company_id)->where('status',"cancel")->get('drive')->result_array();
?>

<div class="canceldrives">
    <!-- Page Heading -->
    <h1 class="">Cancel Drives</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
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
                        <?php $i=1; foreach($drive_data as $drive){?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $drive['designation']?></td>
                            <td><?php echo $drive['post_no']?></td>
                            <td><?php echo $drive['vanue']?></td>
                            <td><?php echo $drive['job_location']?></td>
                            <td><?php echo $drive['drive_method']?></td>
                            <td><?php echo $drive['drive_date']?></td>
                            <td><?php echo $drive['salary']?></td>
                            <td><?php echo $drive['department']?></td>
                            <td><a href="<?php echo base_url()?>drive/<?php echo $drive['drive_id']?>" target="_blank" class="btn text-primary">View Drive</a></td>
                        </tr>
                        <?php $i++;}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>