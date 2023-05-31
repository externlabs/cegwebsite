<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>admin/assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>admin/assets/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>admin/assets/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>admin/assets/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>admin/assets/js/buttons.html5.min.js"></script>

<style>
  .new-post {
    width: 100%;
    height: auto;
    padding-top: 2rem;
    padding-bottom: 2rem;
  }

  .new-post .box {
    width: 100%;
    height: auto;
    background-color: white;
    box-shadow: 0 3px 3px -2px rgb(0 0 0 / 40%);
    border: 1px solid #cdcdcd;
    padding-top: 2rem;
    padding-bottom: 2rem;
    padding-left: 1rem;
    padding-right: 1rem;
    margin-bottom: 2rem;
  }

  .new-post input[type="text"],
  input[type="file"],
  select,
  input[type="email"],
  input[type="number"],
  input[type="date"],
  textarea {
    width: 100%;
    height: auto;
    padding-top: .5rem;
    padding-bottom: .5rem;
    padding-left: 1rem;
    border: 1px solid #cdcdcd;
    margin-bottom: 1rem;
  }

  .new-post button {
    width: 10rem;
    height: auto;
    padding-top: .6rem;
    padding-bottom: .6rem;
    color: white;
    background-color: rgb(239, 69, 84);
    outline: none;
    border: none;
    transition: .5s;
  }

  .new-post button:hover {
    opacity: .7;

  }

  .new-post p {
    margin-top: -.5rem;
    color: #666;
    font-size: 12px;
    font-weight: 300;
    font-style: italic;
  }
</style>

<?php 
    $training_data = $this->db->get('training')->result_array();
?>

<div class="new-post">
  <div class="container">
    <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
    <h3>Add Course</h3>
    <form method="post" action="<?php echo base_url()?>admin/training/addcourse/add_course"
      enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <label for="name" class="form-label">Select Training <span style="color:red;">*</span></label>
            <select name="training_id" id="">
              <option value="">Select Training</option>
              <?php foreach($training_data as $value){?>
              <option value="<?php echo $value['training_id']?>">
                <?php echo $value['training_name']?>
              </option>
              <?php }?>
            </select>
            <label for="name" class="form-label">Course Name <span style="color:red;">*</span></label>
            <input type="text" name="course_name" placeholder="Enter Course Name" maxlength="255" required>
          
            <label for="name" class="form-label">Course Description <span style="color:red;">*</span></label>
            <textarea name="course_desc" id="" cols="30" rows="10" placeholder="Enter Course Description"></textarea>
            <label for="name" class="form-label">Paid / Free <span style="color:red;">*</span></label>
            <select name="course_type" id="course_type">
              <option value="">Select an option</option>
              <option value="paid">Paid</option>
              <option value="free">Free</option>
            </select>
            <div id="amount">
              <label for="name" class="form-label">Rregistration Fees <span style="color:red;">*</span></label>
              <input type="number" name="form_amount" id="" class="num" maxlength="5" placeholder="Please Enter Amount">
              <label for="name" class="form-label">Course fees <span style="color:red;">*</span></label>
              <input type="number" name="course_amount" id="" class="num" maxlength="5"
                placeholder="Please Enter Amount">
            </div>
             
            <button name="formSubmit">Add Course</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<?php $course_data = $this->db->get('course')->result_array();?>


<div class="all_post">
  <div class="container">
    <h3>All Courses</h3>

    <div class="row">
      <div class="col-md-12">

        <div class="card-box table-responsive">

          <table id="lowinventory" data-order='[[ 0, "desc" ]]' style="width:100%"
            class="table table-striped table-bordered table_shop_custom display">
            <thead>
              <tr>

                <th>Sr. No.</th>
                <th>Training Name</th>
                <th>Course Name</th>
                <th>Course Description</th>
                <th>Course Type</th>
                <th>Rregistration Fees</th>
                <th>Course fees</th> 
                <th>Choose Action</th>
                <th>Change Status</th>
                <th>Action</th>
              </tr>

            </thead>
            <tbody>

              <?php $i=1; foreach($course_data as $value){   ?>
              <tr>
                <td>
                  <?php echo $i; ?>
                </td>
                <?php foreach($training_data as $training){if($training['training_id'] == $value['training_id']){?>
                <td>
                  <?php echo $training['training_name']?>
                </td>
                <?php }}?>
                <td>
                  <?php echo $value['course_name']; ?>
                </td>
                <td>
                  <?php echo $value['course_desc']; ?>
                </td>
                <td>
                  <?php echo $value['course_type']?>
                </td>

                <td>
                  <?php if($value['form_amount'] == null){ echo "0";}else{ echo $value['form_amount'];} ?>
                </td>
                <td>
                  <?php  if($value['course_amount'] == null){ echo "0";}else{ echo $value['course_amount'];}?>
                </td>

                <form action="<?php echo base_url()?>admin/training/addcourse/update_course" method="post">
                  <td>
                    <select name="course_status" id="" required>
                      <option value="">Please select an option</option>
                      <option value="1" <?php if($value['course_status']==1){echo "selected disabled" ;}else{echo ""
                        ;}?>>Enable</option>
                      <option value="0" <?php if($value['course_status']==0){echo "selected disabled" ;}else{echo ""
                        ;}?>>Disable</option>
                    </select>
                  </td>
                  <input type="hidden" name="course_id" value="<?php echo $value['course_id']?>" required>
                  <td><button>Change Status</button></td>
                </form>
                <td><a href="<?php echo base_url()?>admin/training/editcourse?id=<?php echo $value['course_id']?>"><i
                      class="fas fa-edit" style="color: #009cff !important;cursor: pointer; margin-right:10px;"></i></a>
                      <a class="delete_sliders" data-id="<?php echo $value['course_id']?>"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
                </form>
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
    <?php echo form_open(base_url('admin/training/addcourse/deletecontactdetail'), array('method' => 'post')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title">Delete Course</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" class="deletesliderId" name="deletesliderId" />
            <h4><b>Do you really want to Delete this Course ?</b></h4>
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

<script>
  document.getElementById("amount").style.display = 'none';

  document.getElementById('course_type').onchange = function () {
    var course_type = this.value;

    if (course_type == "paid") {
      document.getElementById("amount").style.display = 'block';
    } else {
      document.getElementById("amount").style.display = 'none';
    }
  }

</script>


<script>
  $(document).ready(function () {
    $(".num").keypress(function () {
      if ($(this).val().length == $(this).attr("maxlength")) {
        return false;
      }
    });
  });
</script>