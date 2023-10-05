<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
</style>

<?php if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'ON'){
                    $url = "https://";
                }else{
                    $url = "http://";
                }
                $url.= $_SERVER['HTTP_HOST'];
                $url.= $_SERVER['REQUEST_URI'];
               
            $parts = basename($url);
            
            $rerfe = explode("=",$parts);
                
            ?>

<?php

    $drive_applications = $this->db->where('drive_id',$rerfe[1])->get('drive_application')->result_array();

    // $student_info = $this->db->get('student')->result_array();


?>

<div class="all_post">
  <div class="container">
    <h3>All Applications</h3>
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
                  <th>Student Name</th>
                  <th>Father Name</th>
                  <th>Mother Name</th>
                  <th>Date of birth</th>
                  <th>Student Email</th>
                  <th>Student Gender</th>
                  <th>Student Number</th>
                  <th>City</th>
                  <th>District</th>
                  <th> State</th>
                  <th>Pincode</th>
                  <th>Aadhar No.</th>
                  <th>Round 1</th>
                  <th>Round 1 Result</th>
                  <th>Round 2</th>
                  <th>Round 2 Result</th>
                  <th>Round 3</th>
                  <th>Round 3 Result</th>
                  <th>Round 4</th>
                  <th>Round 4 Result</th>
                  <th>Round 5</th>
                  <th>Round 5 Result</th>
                  <th>Final Result</th>
                </tr>

              </thead>
              <tbody>

                <?php $i=1; foreach ($drive_applications as $value) { $drive_application_id = $value['application_id'];
                    $student_info = $this->db->where('student_id',$value['student_id'])->get('student')->result_array();    
                ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <?php foreach($student_info as $student){?>
                      <td><?php echo $student['student_name']; ?></td>
                      <td><?php echo $student['father_name']; ?></td>
                      <td><?php echo $student['mother_name']; ?></td>
                      <td><?php echo $student['student_dob']; ?></td>
                      <td><?php echo $student['student_email']; ?></td>
                      <td><?php echo $student['student_gender']; ?></td>
                      <td><?php echo $student['student_number']; ?></td>
                      <td><?php echo $student['city']; ?></td>
                      <td><?php echo $student['district']; ?></td>
                      <td><?php echo $student['state']; ?></td>
                      <td><?php echo $student['pincode']; ?></td>
                      <td><?php echo $student['student_aadhar']; ?></td>
                    <?php }?>
                      <td><input type="checkbox" name="" id="first" <?php if($value['round_1'] == 1){echo "checked";}else{echo '';}?>></td>
                      <td id="first_result"><?php if($value['round_1'] == 1){echo "Pass";}else{echo 'Fail / Result Pending';}?></td>
                      <td><input type="checkbox" name="" id="second" <?php if($value['round_2'] == 1){echo "checked";}else{echo '';}?>></td>
                      <td id="second_result"><?php if($value['round_2'] == 1){echo "Pass";}else{echo 'Fail / Result Pending';}?></td>
                      <td><input type="checkbox" name="" id="third" <?php if($value['round_3'] == 1){echo "checked";}else{echo '';}?>></td>
                      <td id="third_result"><?php if($value['round_3'] == 1){echo "Pass";}else{echo 'Fail / Result Pending';}?></td>
                      <td><input type="checkbox" name="" id="fourth" <?php if($value['round_4'] == 1){echo "checked";}else{echo '';}?>></td>
                      <td id="fourth_result"><?php if($value['round_4'] == 1){echo "Pass";}else{echo 'Fail / Result Pending';}?></td>
                      <td><input type="checkbox" name="" id="five" <?php if($value['round_5'] == 1){echo "checked";}else{echo '';}?>></td>
                      <td id="five_result"><?php if($value['round_5'] == 1){echo "Pass";}else{echo 'Fail / Result Pending';}?></td>
                      <td><?php if($value['round_1'] == 1 && $value['round_2'] == 1 && $value['round_3'] == 1 && $value['round_4'] == 1 && $value['round_5'] == 1){echo "Hired";}else{echo "Not Hired";}?></td>
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

    $('#first').click(function() {
        if(this.checked){
            var application_id = <?php echo $drive_application_id;?>;
            var round_no = 1;
            var result = 'pass';
            $.ajax({
                type: "POST",
                url: '<?php echo base_url()?>admin/reporting/applications/update_result',
                data: {application_id: application_id, round_no:round_no, result:result}, //--> send id of checked checkbox on other page
                success: function(data) {
                  var parseData = JSON.parse(data);
                  var resultobj = parseData.result;
                  var round_number = Object.keys(resultobj);
                  var result_value = Object.values(resultobj);

                  if(round_number[0] == "round_1"){
                    if(result_value[0] == 1){
                      $('#first_result').html("Pass");
                    }
                  }
                },
            });
        }else{
            var application_id = <?php echo $drive_application_id;?>;
            var round_no = 1;
            var result = 'fail';
            $.ajax({
                type: "POST",
                url: '<?php echo base_url()?>admin/reporting/applications/update_result',
                data: {application_id: application_id, round_no:round_no, result:result}, //--> send id of checked checkbox on other page
                success: function(data) {
                  var parseData = JSON.parse(data);
                  var resultobj = parseData.result;
                  var round_number = Object.keys(resultobj);
                  var result_value = Object.values(resultobj);

                  if(round_number[0] == "round_1"){
                    if(result_value[0] == 0){
                      $('#first_result').html("Fail / Result Pending");
                    }
                  }
                },
            });
        }
      });


      $('#second').click(function() {
        if(this.checked){
            var application_id = <?php echo $drive_application_id;?>;
            var round_no = 2;
            var result = 'pass';
            $.ajax({
                type: "POST",
                url: '<?php echo base_url()?>admin/reporting/applications/update_result',
                data: {application_id: application_id, round_no:round_no, result:result}, //--> send id of checked checkbox on other page
                success: function(data) {
                  var parseData = JSON.parse(data);
                  var resultobj = parseData.result;
                  var round_number = Object.keys(resultobj);
                  var result_value = Object.values(resultobj);

                  if(round_number[0] == "round_2"){
                    if(result_value[0] == 1){
                      $('#second_result').html("Pass");
                    }
                  }
                },
            });
        }else{
            var application_id = <?php echo $drive_application_id;?>;
            var round_no = 2;
            var result = 'fail';
            $.ajax({
                type: "POST",
                url: '<?php echo base_url()?>admin/reporting/applications/update_result',
                data: {application_id: application_id, round_no:round_no, result:result}, //--> send id of checked checkbox on other page
                success: function(data) {
                  var parseData = JSON.parse(data);
                  var resultobj = parseData.result;
                  var round_number = Object.keys(resultobj);
                  var result_value = Object.values(resultobj);

                  if(round_number[0] == "round_2"){
                    if(result_value[0] == 0){
                      $('#second_result').html("Fail / Result Pending");
                    }
                  }
                },
            });
        }
      });


      $('#third').click(function() {
        if(this.checked){
            var application_id = <?php echo $drive_application_id;?>;
            var round_no = 3;
            var result = 'pass';
            $.ajax({
                type: "POST",
                url: '<?php echo base_url()?>admin/reporting/applications/update_result',
                data: {application_id: application_id, round_no:round_no, result:result}, //--> send id of checked checkbox on other page
                success: function(data) {
                  var parseData = JSON.parse(data);
                  var resultobj = parseData.result;
                  var round_number = Object.keys(resultobj);
                  var result_value = Object.values(resultobj);

                  if(round_number[0] == "round_3"){
                    if(result_value[0] == 1){
                      $('#third_result').html("Pass");
                    }
                  }
                },
            });
        }else{
            var application_id = <?php echo $drive_application_id;?>;
            var round_no = 3;
            var result = 'fail';
            $.ajax({
                type: "POST",
                url: '<?php echo base_url()?>admin/reporting/applications/update_result',
                data: {application_id: application_id, round_no:round_no, result:result}, //--> send id of checked checkbox on other page
                success: function(data) {
                  var parseData = JSON.parse(data);
                  var resultobj = parseData.result;
                  var round_number = Object.keys(resultobj);
                  var result_value = Object.values(resultobj);

                  if(round_number[0] == "round_3"){
                    if(result_value[0] == 0){
                      $('#third_result').html("Fail / Result Pending");
                    }
                  }
                },
            });
        }
      });


      $('#fourth').click(function() {
        if(this.checked){
            var application_id = <?php echo $drive_application_id;?>;
            var round_no = 4;
            var result = 'pass';
            $.ajax({
                type: "POST",
                url: '<?php echo base_url()?>admin/reporting/applications/update_result',
                data: {application_id: application_id, round_no:round_no, result:result}, //--> send id of checked checkbox on other page
                success: function(data) {
                  var parseData = JSON.parse(data);
                  var resultobj = parseData.result;
                  var round_number = Object.keys(resultobj);
                  var result_value = Object.values(resultobj);

                  if(round_number[0] == "round_4"){
                    if(result_value[0] == 1){
                      $('#fourth_result').html("Pass");
                    }
                  }
                },
            });
        }else{
            var application_id = <?php echo $drive_application_id;?>;
            var round_no = 4;
            var result = 'fail';
            $.ajax({
                type: "POST",
                url: '<?php echo base_url()?>admin/reporting/applications/update_result',
                data: {application_id: application_id, round_no:round_no, result:result}, //--> send id of checked checkbox on other page
                success: function(data) {
                  var parseData = JSON.parse(data);
                  var resultobj = parseData.result;
                  var round_number = Object.keys(resultobj);
                  var result_value = Object.values(resultobj);

                  if(round_number[0] == "round_4"){
                    if(result_value[0] == 0){
                      $('#fourth_result').html("Fail / Result Pending");
                    }
                  }
                },
            });
        }
      });


      $('#five').click(function() {
        if(this.checked){
            var application_id = <?php echo $drive_application_id;?>;
            var round_no = 5;
            var result = 'pass';
            $.ajax({
                type: "POST",
                url: '<?php echo base_url()?>admin/reporting/applications/update_result',
                data: {application_id: application_id, round_no:round_no, result:result}, //--> send id of checked checkbox on other page
                success: function(data) {
                  var parseData = JSON.parse(data);
                  var resultobj = parseData.result;
                  var round_number = Object.keys(resultobj);
                  var result_value = Object.values(resultobj);

                  if(round_number[0] == "round_5"){
                    if(result_value[0] == 1){
                      $('#five_result').html("Pass");
                    }
                  }
                },
            });
        }else{
            var application_id = <?php echo $drive_application_id;?>;
            var round_no = 5;
            var result = 'fail';
            $.ajax({
                type: "POST",
                url: '<?php echo base_url()?>admin/reporting/applications/update_result',
                data: {application_id: application_id, round_no:round_no, result:result}, //--> send id of checked checkbox on other page
                success: function(data) {
                  var parseData = JSON.parse(data);
                  var resultobj = parseData.result;
                  var round_number = Object.keys(resultobj);
                  var result_value = Object.values(resultobj);

                  if(round_number[0] == "round_5"){
                    if(result_value[0] == 0){
                      $('#five_result').html("Fail / Result Pending");
                    }
                  }
                },
            });
        }
      });

      

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