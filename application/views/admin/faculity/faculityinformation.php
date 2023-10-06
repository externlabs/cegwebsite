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


  .submit_btn{
        width: 11rem;
        background: #68d331;
        color: white;
        outline: none;
        border: none;
        border-radius: 4px;
        margin-top:1rem;
        padding:1rem;
        font-size:12px;
    }
</style>

<div class="all_post">
  <div class="container">
    <h3>Faculity Infomation</h3>
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
                                <th>MR. / Mrs. / Dr.</th>
                                <th>Faculity Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Orgenization</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Phone No.</th>
                                <th>Accommodation</th>
                                <th>Status</th>
                                <th>Option</th>
                                <th>Change button</th>
                                <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=1; foreach($faculity_details as $value){ 
                if($value['status'] == 0){
                    $faculity_status = '<span class="badge badge-pill badge-warning " style="font-size:14px">Disabled</span>';
                }else if($value['status'] == 1){
                    $faculity_status = '<span class="badge badge-pill badge-success" style="font-size:14px">Enabled</span>';
                }
                ?>
                  <tr>
                   
                  <td><?php echo $i; ?></td>
                      <td><?php echo $value['faculity']; ?></td>
                      <td><?php echo $value['faculity_name']; ?></td>
                      <td><?php echo $value['faculity_designation']; ?></td>
                      <td><?php echo $value['faculity_department']; ?></td>
                      <td><?php echo $value['faculity_organization']; ?></td>
                      <td><?php echo $value['faculity_email']; ?></td>
                      <td><?php echo $value['address']; ?></td>
                      <td><?php echo $value['city']; ?></td>
                      <td><?php echo $value['state']; ?></td>
                      <td><?php echo $value['phone']; ?></td>
                      <td><?php echo $value['accommodation']; ?></td>
                      <td><?php echo $faculity_status; ?></td>
                      <form action="<?php echo base_url()?>admin/faculity/faculityinformation/update_faculity" method="post">
                      <td>
                        <select name="faculity_status" id="" required>
                            <option value="">Please select an option</option>
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                      <input type="hidden" name="faculity_id" value="<?php echo $value['faculity_id']?>" required>

                      </td>
                      <td><button class="submit_btn">Change Status</button></td>
                     </form>
                     
                      <td><a class="delete_sliders" data-id="<?php echo $value['faculity_id']?>" style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  </tr>
                  <?php $i++; } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
</div>




<div id="deletePurchaseModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open(base_url('admin/faculity/faculityinformation/delete_faculity'), array('method'=>'post'));?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="deletesliderId" name="deletesliderId"/>
                        <h4><b>Do you really want to Delete this Faculity?</b></h4>
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