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



    

    .date_filter{
    width:100%;
    height:auto;
  }
  .date_filter .flex{
    display:flex;
  }
  .date_filter .flex .card{
    width:50%;
    margin-bottom:2rem; 
  }
  .date_filter .flex .card .date_class{
    width:100%;
    height:auto;
    padding:1rem;
    border:#cdcdcd;
    outline:none;
   
  }

  .buttons-excel {
    border:none !important;
    outline:none !important;
    background:#1D6F42 !important;
    color:white !important;
    border-radius:6px !important;
    margin-bottom:.5rem !important;
  }

  .btn{
    margin:0px !important;
  }

  .buttons-csv{
    border:none !important;
    outline:none !important;
    background:#33ba70 !important;
    color:white !important;
    border-radius:6px !important;
    margin-bottom:.5rem !important;
  }

  #change_status{
    width:20rem;
    height:auto;
    padding:.5rem;
    border:1px solid #cdcdcd;
    border-radius:6px;
    outline:none;
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
            unset($_SESSION['success']);
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            unset($_SESSION['error']);
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


    <div class="date_filter">
            <h5>Filter By Date</h5>
            <div class="row">
                <div class="col-md-5">
                    <div class="flex">
                        <div class="card">
                            <input type="text" class="date_class" name="min" id="min"  placeholder="Enter First date" autocomplete="off"/>
                        </div>
                        <div class="card">
                            <input type="text" name="max" class="date_class" id="max" placeholder="Enter Second date" autocomplete="off"/>
                        </div>
                    </div>    
                </div>
                <div class="col-md-7">
                    
                </div>
            </div>    
          
          
        </div>


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
                <th>Status</th>
                <th>Choose Action</th>
                <!-- <th>Change Status</th> -->
                <th>Action</th>
              </tr>

            </thead>
            <tbody>

              <!-- <?php $i=1; foreach($course_data as $value){   
                
                if($value['course_status'] == 0){
                  $course_status = '<span class="badge badge-pill badge-warning " style="font-size:14px">Disabled</span>';
              }else if($value['course_status'] == 1){
                  $course_status = '<span class="badge badge-pill badge-success" style="font-size:14px">Enabled</span>';
              }
                ?>
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

                <td><?php echo $course_status?></td>

                <form action="<?php echo base_url()?>admin/training/addcourse/update_course" method="post">
                  <td>
                    <select name="course_status" id="" required>
                      <option value="">Please select an option</option>
                      <option value="1" >Enable</option>
                      <option value="0" >Disable</option>
                    </select>
                  </td>
                  <input type="hidden" name="course_id" value="<?php echo $value['course_id']?>" required>
                  <td><button class="submit_btn">Change Status</button></td>
                </form>
                <td><a href="<?php echo base_url()?>admin/training/editcourse?id=<?php echo $value['course_id']?>"><i
                      class="fas fa-edit" style="color: #009cff !important;cursor: pointer; margin-right:10px;"></i></a>
                      <a class="delete_sliders" data-id="<?php echo $value['course_id']?>"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
                </form>
              </tr>
              <?php $i++; } ?> -->
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
    var buttonCommon = {
        exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                    // Strip $ from salary column to make it numeric
                    return column === 5 ?
                        data.replace( /[$,]/g, '' ) :
                        data;
                }
            }
        }
    };


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





<script type="text/javascript">
	$(document).ready(function(){
	   	var userDataTable = $('#lowinventory').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'pageLength':25,
	      	'ajax': {
	          'url':'<?=base_url()?>admin/training/addcourse/addinventory_api',
	          'data': function(data){
	          		data.startDate = $('#min').val();
	          		data.endDate = $('#max').val();
	          	// 	data.searchName = $('#searchName').val();
	          }
	      	},
	      	dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'excel',
                    "text": '<button class="excel_button btn" style="color:white;">Excel</button>',
                    "titleAttr": 'Excel',
                    "action": newexportaction,
                    "exportOptions": {
                        columns: ':not(:last-child)',
                    },
                    "filename": function () {
                        return 'course';
                    },
                },
                            
                {
                    "extend": 'csv',
                    "text": '<button class="btn"  style="color:white;">Csv</button>',
                    "titleAttr": 'Csv',
                    "action": newexportaction,
                    "exportOptions": {
                        columns: ':not(:last-child)',
                    },
                    "filename": function () {
                        return 'course';
                    },
                }
            ],
	      	
	   	});

	   	$('#min,#max').change(function(){
	   		userDataTable.draw();
	   	});
	   	
	   	
	   	function newexportaction(e, dt, button, config) {
            var self = this;
            var oldStart = dt.settings()[0]._iDisplayStart;
            dt.one('preXhr', function (e, s, data) {
                // Just this once, load all data from the server...
                data.start = 0;
                data.length = 2147483647;
                dt.one('preDraw', function (e, settings) {
                    // Call the original action function
                    if (button[0].className.indexOf('buttons-copy') >= 0) {
                        $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                        $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                        $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                        $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-print') >= 0) {
                        $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                    }
                    dt.one('preXhr', function (e, s, data) {
                        // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                        // Set the property to what it was before exporting.
                        settings._iDisplayStart = oldStart;
                        data.start = oldStart;
                    });
                    // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                    setTimeout(dt.ajax.reload, 0);
                    // Prevent rendering of the full data to the DOM
                    return false;
                });
            });
            // Requery the server with the new one-time export settings
            dt.ajax.reload();
        };
	});



  $(document).on('change', '#change_status', function() {
      var status = $("#change_status").val();
      var id = $("#course_id").val();  
      $.ajax({  
         type:"POST",  
         url:'<?=base_url()?>admin/training/addcourse/update_course_status',  
         data:{status: status, id:id},  
         success:function(data){  
          var parseData = JSON.parse(data);
          
          if(parseData.result.course_status == 1){
            $('#ajax_status').html('<span class="badge badge-pill badge-success" style="font-size:14px">Enabled</span>');
          }else{
            $('#ajax_status').html('<span class="badge badge-pill badge-warning " style="font-size:14px">Disabled</span>');
          }

         }  
      });
  });
</script>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/daterangepicker.css" />


<script>
$(function() {
  $('#min').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    locale: {
        format: 'YYYY-MM-DD'
    }
    // maxYear: parseInt(moment().format('YYYY'),10)
  }, function(start, end, label) {
    // var years = moment().diff(start, 'years');
    // alert("You are " + years + " years old!");
  });
});
</script>

<script>
$(function() {
  $('#max').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    locale: {
        format: 'YYYY-MM-DD'
    }
    // maxYear: parseInt(moment().format('YYYY'),10)
  }, function(start, end, label) {
    // var years = moment().diff(start, 'years');
    // alert("You are " + years + " years old!");
  });
});
</script>