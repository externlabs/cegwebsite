<link href="<?php echo base_url();?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>admin/assets/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url('admin/assets/js/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('admin/assets/js/jquery/jquery-3.6.0.min.js')?>"></script>
<style>

    .profileupdate-page {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }
    .profileupdate-page h2 {
        text-align: center;
        color: #000;
        font-size: 30px;
        font-weight: bold;
    }
    
    .profileupdate-part {
        display: flex;
        justify-content: space-between;
    }

    .profileupdate-part {
        margin: 25px 0 ;

    }
    .profileupdate-part .user-img{
        width: 200px;
    }
    .profileupdate-part .user-img img {
        width: 100%;
    }
    .profileupdate-part .user-inputform {
        width: calc(100% - 200px);
        padding-left: 20px;
        position: relative;
        padding-top: 25px;
    }
    .edit-btn {
        position: absolute;
        top: 0;
        right: 0;
        width: 15px;
        height: 15px;
        cursor: pointer;
        
    }

    .profileupdate-page hr {
        border-color: #000;
    }
    .profileupdate-page h3 {
        color: #000;
        font-size: 25px;
        font-weight: bold;
        text-align: center;
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
  
            $student_data = $this->db->where('student_id',$rerfe[1])->get('student')->result_array();
?>

<div class="profileupdate-page">



    <h2>Edit Profile</h2>
    
    <?php foreach($student_data as $value){?>
        <form action="<?php echo base_url()?>frontend/user/editprofile/update_student" method="post" enctype="multipart/form-data">
    <div class="profileupdate-sec">

            <div class="mb-3">
                <label for="" class="form-label">Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="name"  placeholder="Name" value="<?php echo $value['student_name']?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email address <span style="color:red;">*</span></label>
                <input type="email" class="form-control" name="email" placeholder="Email" readonly value="<?php echo $value['student_email']?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Mobile Number <span style="color:red;">*</span></label>
                <input type="number" class="form-control num"  maxlength="10" name="phone" placeholder="Mobile No." value="<?php echo $value['student_number']?>">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Father Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="father_name"  placeholder="father_name" value="<?php echo $value['father_name']?>">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Mother Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="mother_name"  placeholder="mother_name" value="<?php echo $value['mother_name']?>">
            </div>
       
            <div class="form-group">
                <label for="name" class="form-label">Aadhar Number <span style="color:red;">*</span></label>
                <input type="number" name="aadhar" id="aadhar" maxlength="12"  class="form-control num" placeholder="aadhar" value="<?php echo $value['student_aadhar']?>">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Address <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="address"  placeholder="address" value="<?php echo $value['student_address']?>">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">City <span style="color:red;">*</span></label>
                <input type="text" class="form-control"  name="city" placeholder="city" value="<?php echo $value['city']?>">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">District <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="district"  placeholder="district" value="<?php echo $value['district']?>">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">State <span style="color:red;">*</span></label>
                <input type="state" class="form-control" name="state"  placeholder="state" value="<?php echo $value['state']?>">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Pincode <span style="color:red;">*</span></label>
                <input type="number" class="form-control" name="pincode"  placeholder="pincode" value="<?php echo $value['pincode']?>">
            </div>

            <div class="form-group">
                <label for="gender" class="form-label">Gender:</label>
                <select name="gender" class="form-control">
                    <option value="">Please select one…</option>
                    <option value="female" <?php if($value['student_gender'] == "female"){echo "selected ";}else{echo "";}?>>Female</option>
                    <option value="male" <?php if($value['student_gender'] == "male"){echo "selected";}else{echo "";}?>>Male</option>
                    <option value="other" <?php if($value['student_gender'] == "other"){echo "selected";}else{echo "";}?>>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dob" class="form-label">DOB: <span style="color:red;">*</span></label>
                <input type="date" id="dob" name="dob" class="form-control" value="<?php echo $value['student_dob']?>">
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Height<span style="color:red;">*</span></label>
                <input type="number" name="height" id="height"  class="form-control" placeholder="height" value="<?php echo $value['height']?>">
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Weight <span style="color:red;">*</span></label>
                <input type="number" name="weight" id="weight"  class="form-control" placeholder="weight" value="<?php echo $value['weight']?>">
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Bloodgroup <span style="color:red;">*</span></label>
                <select name="bloodgroup" class="form-control <?php echo (form_error('bloodgroup') != "") ? 'is-invalid' : '';?>">
                                            <option value="">Please select one…</option>
                                            <option value="A+" <?php if($value['bloodgroup'] == "A+"){echo "selected";}else{echo "";}?>>A+</option>
                                            <option value="A-" <?php if($value['bloodgroup'] == "A-"){echo "selected";}else{echo "";}?>>A-</option> 
                                            <option value="AB+" <?php if($value['bloodgroup'] == "AB+"){echo "selected";}else{echo "";}?>>AB+</option>
                                            <option value="AB-" <?php if($value['bloodgroup'] == "AB-"){echo "selected";}else{echo "";}?>>AB-</option>
                                            <option value="B+" <?php if($value['bloodgroup'] == "B+"){echo "selected";}else{echo "";}?>>B+</option>
                                            <option value="B-" <?php if($value['bloodgroup'] == "B-"){echo "selected";}else{echo "";}?>>B-</option>
                                            <option value="O+" <?php if($value['bloodgroup'] == "O+"){echo "selected";}else{echo "";}?>>O+</option>
                                        </select>
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Old Photo</label></br>
                <img src="<?php echo base_url()?>upload/student/<?php echo $value['photo']?>" width="150px" alt="photo">                    
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Upload New Photo <span style="color:red;">*</span></label>
                <input type="file" name="photo" id="photo"  class="form-control" placeholder="weight" >
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Old Addhar / Janaadhar</label></br>
                <img src="<?php echo base_url()?>upload/student/<?php echo $value['aadhar_front']?>" width="150px" alt="aadhar">                    
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Upload New Addhar / Janaadhar <span style="color:red;">*</span></label>
                <input type="file" name="aadhar" id="aadhar_front"  class="form-control" placeholder="weight" >
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Old Signature</label></br>
                <img src="<?php echo base_url()?>upload/student/<?php echo $value['signature']?>" width="150px" alt="aadhar">                    
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Upload New Signature <span style="color:red;">*</span></label>
                <input type="file" name="signature" id="sign"  class="form-control" placeholder="weight" >
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Old Resume </label>
                  
                <?php if($value['resume'] == ''){?>
                <a href="" >View Resume</a>
                <?php }else{?>
                    <a href="<?php echo base_url()?>upload/student/<?php echo $value['resume']?>" target="_blank">View Resume</a>
                <?php }?>
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Upload New Resume <span style="color:red;">*</span></label>
                <input type="file" name="resume" id="resume"  class="form-control" placeholder="weight" >
            </div>
            
            <input type="hidden" name="student_id" value="<?php echo $value['student_id']?>">
            <button class="btn btn-block btn-primary">submit</button>
                
          
    </div>
    </form>
    
<?php }?>


</div>

<script>
  $(document).ready(function () {
    $(".num").keypress(function () {
      if ($(this).val().length == $(this).attr("maxlength")) {
        return false;
      }
    });
  });
</script>




