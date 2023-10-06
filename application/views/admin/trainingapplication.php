<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>admin/assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>admin/assets/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>admin/assets/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>admin/assets/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>admin/assets/js/buttons.html5.min.js"></script>


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

<?php $transaction_list = $this->db->get('transactions')->result_array()?>



<div class="all_post">
  <div class="container">
    <h3>All Training Applications</h3>
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
                  <th>User Name</th>
                  <th>User Email</th>

                  <th>User Type</th>
                  <th>Order Id</th>
                  <th>Amount</th>
                  <th>Payment Status</th>

                  <th>Training Name</th>
                  <th>Training Description</th>
                  <th>Training Start Date</th>
                  <th>Training End Date</th>

                  <th>Course Name</th>
                  <th>Course Description</th>
                  <th>Course Type</th>
                  <th>Course Amount</th>
                  <th>Form Amount</th>
                </tr>

              </thead>
              <tbody>

                <?php $i=1; foreach($transaction_list as $value){ 
                    $userId = $value['user_id'];
                    $userType = $value['user_type'];

                    if($userType == "student"){
                        $userData = $this->db->where('student_id', $userId)->get('student')->result_array();
                    }else{
                        $userData = $this->db->where('faculity_id', $userId)->get('faculity')->result_array();
                    }

                    $course_data = $this->db->where('course_id',$value['course_id'])->get('course')->result_array();

                        foreach( $course_data as $course){
                            $training_data = $this->db->where('training_id',$course['training_id'])->get('training')->result_array();
                        }

                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <?php foreach($userData as $user){?>
                        <td><?php echo $user[$userType.'_name']?></td>
                        <td><?php echo $user[$userType.'_email']?></td>
                    <?php }?>
                    <td><?php echo $value['user_type']?></td>
                    <td><?php echo $value['transaction_id']?></td>
                    <td><?php echo $value['amount']?></td>
                    <td><?php echo $value['status']?></td>

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
                        <td><?php echo $new_course['course_amount']?></td>
                        <td><?php echo $new_course['form_amount']?></td>
                    <?php }?>
                  </tr>
                <?php $i++; } ?>
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
    <?php echo form_open(base_url('admin/training/alltraining/deletecontactdetail'), array('method' => 'post')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title">Delete Training Data</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" class="deletesliderId" name="deletesliderId" />
            <h4><b>Do you really want to Delete this Training ?</b></h4>
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
      dom: 'Bfrtip',
              buttons: [
            'csv', 'excel', 'pdf'
        ]
     
    });


    $(document).on('click', '.delete_sliders', function() {

      $('.deletesliderId').val($(this).attr('data-id'));
      $('#deletePurchaseModal').modal('show');

    });

  });
</script>