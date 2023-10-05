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
</style>

<div class="all_post">
  <div class="container">
    <h3>Ongoing Drives</h3>
    <hr>

    <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
            unset($_SESSION['success']);

        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            unset($_SESSION['error']);

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
                  <th>View Applications</th>
                  
                </tr>

              </thead>
              <tbody>

                <?php $i=1; foreach ($drive_details as $value) { if($value['status'] == "approve"){ 
                    $company_data = $this->db->where('company_id',$value['company_id'])->get('company')->result_array();    
                ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <?php foreach($company_data as $company){?>
                      <td><?php echo $company['company_name']; ?></td>
                    <?php }?>
                      <td><?php echo $value['designation']; ?></td>
                      <td><?php echo $value['post_no']; ?></td>
                      <td><?php echo $value['vanue']; ?></td>
                      <td><?php echo $value['job_location']; ?></td>
                      <td><?php echo $value['drive_method']; ?></td>

                      <td><?php echo $value['drive_date']; ?></td>
                      <td><?php echo $value['salary']; ?></td>
                      <td><?php echo $value['department']; ?></td>
                      <td><?php echo $value['created_at']; ?></td>
                      <td><a href="<?php echo base_url()?>admin/reporting/applications?id=<?php echo $value['drive_id']?>">View Applications</a></td>
                     
                      
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

<div id="deletePurchaseModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <?php echo form_open(base_url('admin/contactdata/deletecontactdetail'), array('method' => 'post')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title">Delete Contact Data</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" class="deletesliderId" name="deletesliderId" />
            <h4><b>Do you really want to Delete this Contact Data ?</b></h4>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-info" name="deleteslider" value="Delete">
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>


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