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

<div class="all_post">
  <div class="container">
    <h3>All News</h3>
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
                  <th>News Image</th>
                  <th>News Title</th>
                  <th>News Description</th>
                  <th>News Link</th>
                  <th>Option</th>
                  <th>Change button</th>
                  <th>Action</th>
                </tr>

              </thead>
              
              <tbody>
              <?php $i=1; foreach($news_details as $value){ ?>
                <tr>
                   
                   <td><?php echo $i; ?></td>
                       <td><img src="<?php echo base_url()?>upload/news/<?php echo $value['cover']?>" width="100px"></td>
                       <td><?php echo $value['title']; ?></td>
                       <td><?php echo $value['description']; ?></td>
                       <td><a href="<?php echo base_url()?>home" target="_blank">View News</a></td>
 
                       <form action="<?php echo base_url()?>admin/news/allnews/update_news" method="post">
                       <td>
                         <select name="news_status" id="" required>
                             <option value="">Please select an Option</option>
                             <option value="1" <?php if($value['news_status'] == 1){echo "selected disabled";}else{echo "";}?>>Enable</option>
                             <option value="0" <?php if($value['news_status'] == 0){echo "selected disabled";}else{echo "";}?>>Disable</option>
                         </select>
                       <input type="hidden" name="news_id" value="<?php echo $value['news_id']?>" required>
 
                       </td>
                       <td><button>Change Status</button></td>
                      </form>
                      <td><a href="<?php echo base_url()?>admin/news/editnews?id=<?php echo $value['news_id']?>"><i
                      class="fas fa-edit" style="color: #009cff !important;cursor: pointer; margin-right:10px;"></i></a>
                      <a class="delete_sliders" data-id="<?php echo $value['news_id']?>"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
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
    <?php echo form_open(base_url('admin/news/allnews/delete_news'), array('method' => 'post')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title">Delete News Data</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" class="deletesliderId" name="deletesliderId" />
            <h4><b>Do you really want to Delete this News Data ?</b></h4>
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