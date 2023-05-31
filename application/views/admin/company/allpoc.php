<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>
<style>
    td img{
        width:100px;
    }
    .ad{
        width:3rem;
        height:auto;
        padding: .3rem .3rem;
        float:right;
        border:none;
        color:white;
        outline:none;
        background-color:rgb( 239, 69, 84 );
        font-size:20px;
        font-weight:600;
    }
    .ad:hover{
        opacity:.7;
    }
</style>

<?php 
    $poc_data = $this->db->get('company_poc')->result_array();

?>

<div class="all_post">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>All Point Of Content</h3>
            </div>    
            <div class="col-md-6">
                <a href="<?php echo base_url();?>admin/company/poc"><button class="ad">+</button></a>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-12">
                <div class="card-box table-responsive">
                    <table id="lowinventory" data-order='[[ 0, "desc" ]]'  style="width:100%" class="table table-striped table-bordered table_shop_custom display">
                        <thead>
                            <tr> 
                                <th >SR. NO.</th>
                                <th>Company Name</th>
                                <th>Company Logo</th>
                                <th>Name of contact person</th>
                                <th>Designation</th>
                                <th>Mobile No</th>
                                <th>Alternate Mobile No</th>
                                <th>Email</th>
                                <!-- <th>Password</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($poc_data as $value){
                                $company_data = $this->db->where('company_id',$value['company_id'])->get('company')->result_array();
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <?php foreach($company_data as $company){?>
                                <td><?php echo $company['company_name']?></td>
                                <td><img src="<?php echo base_url()?>upload/company/<?php echo $company['company_logo']?>" width="100px"></td>
                                <?php }?>
                                <td><?php echo $value['poc_name']?></td>
                                <td><?php echo $value['designation']?></td>
                                <td><?php echo $value['phone']?></td>
                                <td><?php echo $value['alternate_no']?></td>
                                <td><?php echo $value['poc_email']?></td>
                             
                                <td><a href="<?php echo base_url()?>admin/company/updatepoc?id=<?php echo $value['poc_id']?>"  ><i class="fas fa-edit" style="color: #009cff !important;cursor: pointer; margin-right:10px;"></i></a><a class="delete_sliders" data-id="<?php echo $value['poc_id']?>"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>
                            <?php $i++;}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>    


<div id="deletePurchaseModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open(base_url('admin/company/allpoc/deletepost'), array('method'=>'post'));?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h4 class="modal-title">Delete Poc</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="deletesliderId" name="deletesliderId"/>
                        <h4><b>Do you really want to Delete this Poc ?</b></h4>
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
    $('#lowinventory').DataTable( {
    } );
   
    $(document).on('click','.delete_sliders',function(){

     $('.deletesliderId').val($(this).attr('data-id'));
        $('#deletePurchaseModal').modal('show');

    });

});

  </script>