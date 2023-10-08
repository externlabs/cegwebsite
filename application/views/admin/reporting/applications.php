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

  #lowinventory_filter{
    display: none;
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

    function getCheckboxId(checkbox) {
      var checkboxId = checkbox.id;

      var applicationId = checkbox.getAttribute("data-id");

      let inputString = checkboxId;
      let numericPart = inputString.match(/\d+/);  // Extract numeric part
      let stringPart = inputString.match(/[a-zA-Z]+/); // Extract string part

      if (numericPart !== null) {
        numericPart = numericPart[0];
      } else {
        numericPart = ""; // If no numeric part is found, set it to an empty string
      }

      if (stringPart !== null) {
        stringPart = stringPart[0];
      } else {
        stringPart = ""; // If no string part is found, set it to an empty string
      }

      $(document).on('click', '#'+checkboxId, function() {
        if(this.checked){
            var application_id = applicationId;
            var round_no = '';

            if(stringPart=="first"){
              round_no = 1;
            }else if(stringPart=="second"){
              round_no = 2;
            }else if(stringPart=="third"){
              round_no = 3;
            }else if(stringPart=="fourth"){
              round_no = 4;
            }else if(stringPart=="five"){
              round_no = 5;
            }

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

                  if(round_number[0] == "round_"+round_no){
                    if(result_value[0] == 1){
                      $('#result_'+stringPart+numericPart).html("Pass");
                    }
                  }
                },
            });
        }else{
            var application_id = applicationId;
            var round_no = '';

            if(stringPart=="first"){
              round_no = 1;
            }else if(stringPart=="second"){
              round_no = 2;
            }else if(stringPart=="third"){
              round_no = 3;
            }else if(stringPart=="fourth"){
              round_no = 4;
            }else if(stringPart=="five"){
              round_no = 5;
            }
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

                  if(round_number[0] == "round_"+round_no){
                    if(result_value[0] == 0){
                      $('#result_'+stringPart+numericPart).html("Fail / Result Pending");
                    }
                  }
                },
            });
        }
      });

    }
</script>

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





<script type="text/javascript">
	$(document).ready(function(){
	   	var userDataTable = $('#lowinventory').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'pageLength':25,
	      	'ajax': {
	          'url':'<?=base_url()?>admin/reporting/applications/addinventory_api',
	          'data': function(data){
	          		data.driveId = '<?php echo $rerfe[1];?>';
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
                        return 'Ongoing drives Applications';
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
                        return 'Ongoing Drive Applications';
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


</script>
