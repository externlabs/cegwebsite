<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('admin/assets/js/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('admin/assets/js/jquery/jquery-3.6.0.min.js')?>"></script>


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
    input[type="email"],input[type="number"],
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

<div class="new-post">
    <div class="container">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
        <h3>Add New Company</h3>
        <form method="post" action="add/add_company" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                   
                        <div class="form-group">
                        <label for="name">Add Company Logo <span style="color:red;">*</span></label>
                        <input type="file" id="myFile" name="images" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Company Name <span style="color:red;">*</span></label>
                        <input type="text" name="name" maxlength="50" placeholder="Enter Company Name" required>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Company Email <span style="color:red;">*</span></label>
                        <input type="email" name="email" maxlength="50" placeholder="Enter Company Email" required>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Landline No. <span style="color:red;">*</span></label>
                        <input type="number" name="landline" class="num" maxlength="12" placeholder="Enter Company Number" required>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Mobile No. <span style="color:red;">*</span></label>
                        <input type="number" name="number" class="num" maxlength="10"  placeholder="Enter Company Number" required>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Company Address <span style="color:red;">*</span></label>
                        <input type="text" name="address" maxlength="255" placeholder="Enter Company Address" required>
                        </div>
                        <div class="form-group">
                            <label class="pincode">Pincode <span style="color:red;">*</span></label>
                            <input type="number" name="pincode" class="num"   placeholder="Enter Pincode" required maxlength="6" minlength="6">
                            <p id="errorMsg" style="color:red; font-style:italic;font-size:10px;"></p>
                        </div>
                        <div class="form-group">
                            <label class="form-label">City / Village / B.O <span style="color:red;">*</span></label>
                            <input type="text" name="city"   placeholder="Enter City / Village / B.O" value="" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">District <span style="color:red;">*</span></label>
                            <input type="text" name="district"   placeholder="Enter District" value="" required>

                            <label class="form-label">State <span style="color:red;">*</span></label>
                            <input type="text" name="state"  placeholder="Enter State" value="" required>
                        </div>
                        
                        <div class="form-group">
                        <label class="form-label">Country <span style="color:red;">*</span></label>
                        <input type="text" name="country" placeholder="Enter Country" required>
                         </div>
                         <div class="form-group">
                         <label class="form-label">Parent Company <span style="color:red;">*</span></label>
                        <input type="text" name="groupcompany" maxlength="255" placeholder="Enter Parent Company" required>
                         </div>
                        <div class="form-group">
                        <label class="form-label">Description <span style="color:red;">*</span></label>
                        <textarea name="desc" id="" cols="30" rows="5" placeholder="description" required></textarea>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Website Link <span style="color:red;">*</span></label>
                        <input type="text" name="website" placeholder="Enter Website Link (Eg: https://domainname.com/)" required>
                        </div>
                        <button name="formSubmit"  >Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".num").keypress(function() {
            if ($(this).val().length == $(this).attr("maxlength")) {
                return false;
            }
        });
    });
    </script>

<script>
    function fetchPincode() {
        var pincodeValue = $('#pincode').val();
        var pincodelength = pincodeValue.toString().length; 
        if(pincodelength == 6){
            $.ajax({
                url:'<?php echo base_url('admin/company/add/getpincodedeatils');?>',
                type:'POST',
                data: {pincode:pincodeValue},
                success:function(data){
                    var parseData = JSON.parse(data);
                    if(parseData.status == "Success"){
                        $('#cityinput')
                            .find('option')
                            .remove()
                            .end();
                        for(var i=0; i<parseData.city.length; i++){
                            $('#cityinput').append(`<option value="${parseData.city[i].Name}">${parseData.city[i].Name}</option>`);
                        }
                        $("#district").val(parseData.district);
                        $("#state").val(parseData.state);
                    }else{
                        $("#pincode").css({"border-color":"red" });
                        $("#errorMsg").html(parseData.message);
                    }
                }
            });
            console.log('Correct Pincode!');
        }else{
            console.log('Please Enter Correct Pincode!');
        }
    }
</script>


