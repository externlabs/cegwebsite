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
    <h3>Faculity Qualification</h3>
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
                            <th>Faculity Name</th>
                            <th>Faculity Email</th>
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
              <?php $i=1; foreach($faculityqulification_details as $value){
                  if($value['user_type'] == 'faculity'){
                  $faculity_details = $this->db->where('faculity_id',$value['student_id'])->get('faculity')->result_array();
                  foreach($faculity_details as $faculity){
                 ?>
              
                 

                            <td><?php echo $i;?></td>
                            
                            <td><?php echo $faculity['faculity_name']?></td>
                            <td><?php echo $faculity['faculity_email']?></td>
                            
                            <td><?php echo $value['class']?></td>
                            <td><?php echo $value['university_name']?></td>
                            <td><?php echo $value['institute_type']?></td>
                            <td><?php echo $value['state']?></td>
                            <td><?php echo $value['start_year']?></td>
                            <td><?php echo $value['passing_year']?></td>
                            <td><?php echo $value['percentage']?></td>
                            <td><?php echo $value['branch']?></td>
                            <td><?php echo $value['backlog']?></td>
                            <td><a class="delete_sliders" data-id="<?php echo $value['qualification_id']?>"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  </tr>
                  <?php }}$i++; } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
</div>

  <div id="deletePurchaseModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open(base_url('admin/faculity/faculityqulification/deletepost'), array('method'=>'post'));?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="deletesliderId" name="deletesliderId"/>
                        <h4><b>Do you really want to Delete this Qualification?</b></h4>
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
      console.log('gfgfgfg');

      $('.deletesliderId').val($(this).attr('data-id'));
      $('#deletePurchaseModal').modal('show');

    });

  });
</script>