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

        <h3>Edit Company</h3>
        <form method="post" action="<?php echo base_url()?>admin/company/edit/update_company" enctype="multipart/form-data">
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
             <?php foreach( $fetch_content as $value){ if($value['company_id']==$rerfe[1]){?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <label for="name">Old Logo</label></br>
                        <img src="<?php echo base_url()?>upload/company/<?php echo $value['company_logo']?>" alt="" width="120px"></br>

                        <label for="name">Update Company Logo </label>
                        <input type="file" id="myFile" name="images" class="form-control">

                        <label class="form-label">Company Name <span style="color:red;">*</span></label>
                        <input type="text" name="name" placeholder="Enter Company Name" maxlength="50" value="<?php echo $value['company_name']?>" required>

                        <label class="form-label">Company Email <span style="color:red;">*</span></label>
                        <input type="email" name="email" placeholder="Enter Company Email" maxlength="50" value="<?php echo $value['company_email']?>" required readonly>

                        <label class="form-label">Landline No. <span style="color:red;">*</span></label>
                        <input type="number" name="landline" class="num" maxlength="12" placeholder="Enter Company Number"  value="<?php echo $value['company_landline']?>"required>

                        <label class="form-label">Mobile No. <span style="color:red;">*</span></label>
                        <input type="number" name="number" maxlength="10" class="num" placeholder="Enter Company Number"  value="<?php echo $value['company_number']?>"required>

                        <label class="form-label">Company Address <span style="color:red;">*</span></label>
                        <input type="text" name="address" maxlength="255" placeholder="Enter Company Address" value="<?php echo $value['company_address']?>" required>

                        <label class="form-label">Pincode <span style="color:red;">*</span></label>
                        <input type="text" name="pincode" placeholder="Enter Pincode"  class="num"  id="pincode" value="<?php echo $value['pincode']?>" required maxlength="6" minlength="6">
                        <p id="errorMsg" style="color:red; font-style:italic;font-size:10px;"></p>

                        <label class="form-label">City / Village / B.O <span style="color:red;">*</span></label>
                        <input type="text" name="city" placeholder="Enter City / Village / B.O" value="<?php echo $value['company_city']?>" required> 
                        <!-- <label class="form-label">City / Village / B.O <span style="color:red;">*</span></label>
                        <select name="city" id="cityinput" required>
                            <option value="">Select An Option</option>
                        </select> -->

                        <label class="form-label">District <span style="color:red;">*</span></label>
                        <input type="text" name="district" id="district"  placeholder="Enter District" value="<?php echo $value['district']?>" required>

                        <label class="form-label">State <span style="color:red;">*</span></label>
                        <input type="text" name="state" id="state"  placeholder="Enter State" value="<?php echo $value['state']?>" required>

                        <label class="form-label">Country <span style="color:red;">*</span></label>
                        <input type="text" name="country" placeholder="Enter Country" value="<?php echo $value['country']?>" required>

                        <label class="form-label">Parent Company <span style="color:red;">*</span></label>
                        <input type="text" name="groupcompany" maxlength="255" placeholder="Enter Company" value="<?php echo $value['groupcompany']?>" required>
                        
                        <label class="form-label">Description <span style="color:red;">*</span></label>
                        <textarea name="desc" id="" cols="30" rows="5" placeholder="description" required><?php echo $value['company_desc']?></textarea>

                        <label class="form-label">Website Link <span style="color:red;">*</span></label>
                        <input type="text" name="website" placeholder="Enter Website Link (Eg: https://domainname.com/)" value="<?php echo $value['company_website']?>" required>

                        <input type="hidden" name="company_id" value="<?php echo $value['company_id']?>" required>
                        <button name="formSubmit">Update</button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>


<?php 
    $city = $value['company_city'];
?>

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
    $(document).ready(function() {
        fetchPincode();
    });
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
                            var checkedd = ''
                            if("<?php echo $city ?>" == parseData.city[i].Name){
                                checkedd = "selected";
                            }else{
                                checkedd = '';
                            }

                            $('#cityinput').append(`<option value="${parseData.city[i].Name}" ${checkedd}>${parseData.city[i].Name}</option>`);
                        }
                        $("#district").val(parseData.district);
                        $("#state").val(parseData.state);
                    }else{
                        $("#pincode").css({"border-color":"red" });
                        $("#errorMsg").html(parseData.message);
                    }
                }
            });
        }else{
            console.log('Please Enter Correct Pincode!');
        }
    }
</script>

<?php }}?>