<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>


<style type="text/css">
  a.edit {
    display: none;
  }


  .btn-group,
  .btn-group-vertical {
    float: right;
  }

  .btn {
    color: #4e73df;
  }

  #lowinventory_filter label {
    color: grey;
    font-size: 15px;
  }

  #lowinventory_filter input[type=search] {
    border: 1px solid grey;
    outline: none;
    padding: 5px;
    font-size: 15px;
    margin-right: 5px;
  }

  .buu {
    width: 15rem;
    color: white !important;
    background-color: rgb(239, 69, 84);
    border: none;
    outline: none !important;
    padding-top: 1rem;
    padding-bottom: 1rem;
    font-size: 14px;
    margin-bottom: 1rem;
  }

  img {
    width: 70px;
    height: 70px;
  }

  table.dataTable thead th, table.dataTable thead td ,
  table.dataTable tbody th, table.dataTable tbody td {
    padding: 5px;
    font-size: 14px;
  }
</style>

<div class="all_post">
  <div class="container">
    <h3>Cancel Drives</h3>
    <hr>

    <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
    ?>
    
      <div class="row">
        <div class="col-md-12">

          <div class="card-box table-responsive">

            <table id="lowinventory" data-order='[[ 0, "desc" ]]' style="width:100%" class="table table-striped table-bordered table_shop_custom display">
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
                  <th>Salary</th>
                  <th>Department</th>
                  <th>Created Date</th>
                  <th>View Drive</th>
                  
                </tr>

              </thead>
              <tbody>

                <?php $i=1; foreach ($drive_details as $value) { if($value['status'] == "cancel"){ 
                    $company_data = $this->db->where('company_id',$value['company_id'])->get('company')->result_array();    
                ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <?php foreach($company_data as $company){?>
                      <td><?php echo $company['company_name']; ?></td>
                    <?php }?>
                      <td><?php echo $value['designation']; ?></td>
                      <td><?php echo $value['post_no']; ?></td>
                      <td style="width:110px;"><?php echo $value['vanue']; ?></td>
                      <td><?php echo $value['job_location']; ?></td>
                      <td><?php echo $value['drive_method']; ?></td>
                      <td style="width:150px;"><?php echo $value['drive_date']; ?></td>
                      <td><?php echo $value['salary']; ?></td>
                      <td style="width:110px;"><?php echo $value['department']; ?></td>
                      <td><?php echo $value['created_at']; ?></td>
                      <td><a href="<?php echo base_url()?>drive/<?php echo $value['drive_id']?>" target="_blank" class="btn text-primary p-1">View Drive Details</a></td>
                     
                  </tr>
                <?php }$i++; } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

  </div>
</div>






<!--Delete-->

<!--Delete-->




<script>
  $(document).ready(function() {
    $('#lowinventory').DataTable({
     
    });


    $(document).on('click', '.delete_sliders', function() {

      $('.deletesliderId').val($(this).attr('data-id'));
      $('#deletePurchaseModal').modal('show');

    });

  });
</script>