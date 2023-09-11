<link href="<?php echo base_url();?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>admin/assets/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url('admin/assets/js/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('admin/assets/js/jquery/jquery-3.6.0.min.js')?>"></script>
<style>

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

<?php 
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['profile_type'];
if($user_type =="student"){
    $student_data = $this->db->where('student_id',$user_id)->get('student')->result_array();
foreach($student_data as $value){

?>


<div class="stprofileupdate-page">
    <h2> My Profile </h2>
   
    
    <div class="profileupdate-sec">
        <div class="profileupdate-part">
            <div class="user-img"> 
                <?php if($value['photo'] == null){?>
                    <img src="<?php echo base_url()?>assets/image/user.png" alt="img"/> 
                <?php }else{?>
                    <img src="<?php echo base_url()?>upload/student/<?php echo $value['photo']?>" alt="img" /> 
                <?php }?>
            </div>

             <div class="user-inputform">
                <a href="<?php echo base_url()?>user/edit-profile?id=<?php echo $value['student_id']?>"><img src="<?php echo base_url()?>assets/image/edit.png" alt="edit" class="edit-btn"></a> 
                <form>
                    <div class="mb-3 row px-3">
                       <div class="col-md-2"> <label for="" class="form-label mb-0">Name <span style="color:red;">*</span></label> </div>
                       <div class="col-md-10">  <input type="name" class="form-control" value="<?php echo $value['student_name']?>"  placeholder="name" readonly /> </div>  
                    </div>
                    <div class="mb-3 row px-3">
                    <div class="col-md-2"> <label for="exampleFormControlInput1" class="form-label mb-0">Email <span style="color:red;">*</span></label> </div>  
                    <div class="col-md-10"> <input type="email" class="form-control" id="exampleFormControlInput1" value="<?php echo $value['student_email']?>" placeholder="name@example.com" readonly /> </div>  
                    </div>
                    <div class="mb-3 row px-3">
                    <div class="col-md-2"> <label for="" class="form-label mb-0">Mobile Number <span style="color:red;">*</span></label> </div>  
                    <div class="col-md-10"> <input type="number" class="form-control num" maxlength="10" id="" value="<?php echo $value['student_number']?>" placeholder="Mobile Number" readonly /> </div>  
                    </div>
                </form>
            </div>
        </div>


        <div class="mb-3">
            <label for="" class="form-label">Father Name <span style="color:red;">*</span></label>
            <input type="text" class="form-control" name="father_name" value="<?php echo $value['father_name']?>"  placeholder="address" readonly>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Mother Name <span style="color:red;">*</span></label>
            <input type="text" class="form-control" name="mother_name" value="<?php echo $value['mother_name']?>"  placeholder="city" readonly>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Date Of Birth <span style="color:red;">*</span></label>
            <input type="text" class="form-control" name="dob"  placeholder="district" value="<?php echo $value['student_dob']?>" readonly>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Gender <span style="color:red;">*</span></label>
            <input type="text" class="form-control" name="gender" placeholder="gender" value="<?php echo $value['student_gender']?>" readonly>
        </div>


        <div class="mb-3">
            <label for="name" class="form-label">Address <span style="color:red;">*</span></label>
            <input type="text" class="form-control" name="address"  placeholder="father" value="<?php echo $value['student_address']?>" readonly>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">City <span style="color:red;">*</span></label>
            <input type="text" class="form-control" name="city" placeholder="mother" value="<?php echo $value['city']?>" readonly>
        </div>

        <div class="form-group">
            <label for="name" class="form-label">District <span style="color:red;">*</span></label>
            <input type="text"  id="district" name="district"  class="form-control" value="<?php echo $value['district']?>" placeholder="aadhar" readonly>
        </div>

        <div class="form-group">
            <label for="name" class="form-label">State <span style="color:red;">*</span></label>
            <input type="text" name="state" id="state"  class="form-control" value="<?php echo $value['state']?>" placeholder="aadhar" readonly>
        </div>

        

        <div class="form-group">
            <label for="name" class="form-label">Pincode <span style="color:red;">*</span></label>
            <input type="text" name="pincode" id="pincode"  class="form-control" value="<?php echo $value['pincode']?>" placeholder="pincode" readonly>
        </div>


        <div class="form-group">
            <label for="name" class="form-label">Height <span style="color:red;">*</span></label>
            <input type="text" name="height" id="height"  class="form-control" value="<?php echo $value['height']?>" placeholder="height" readonly>
        </div>

        <div class="form-group">
            <label for="name" class="form-label">Weight <span style="color:red;">*</span></label>
            <input type="text" name="weight" id="weightr"  class="form-control" value="<?php echo $value['weight']?>" placeholder="weight" readonly>
        </div>

        <div class="form-group">
            <label for="name" class="form-label">Blood Group <span style="color:red;">*</span></label>
            <input type="text" name="bloodgroup" id="password" class="form-control" placeholder="password" value="<?php echo $value['bloodgroup']?>" readonly>                      
        </div>

        <div class="form-group">
            <label for="name" class="form-label">Aadhar / Janaadhar No. <span style="color:red;">*</span></label>
            <input type="number" name="aadhar" id="aadhar" maxlength="12" class="form-control num" placeholder="aadhar" value="<?php echo $value['student_aadhar']?>" readonly>                      
        </div>

        <div class="form-group">
            <label for="name" class="form-label">Addhar / Janaadhar <span style="color:red;">*</span></label></br>
            <img src="<?php echo base_url()?>upload/student/<?php echo $value['aadhar_front']?>" width="150px" alt="aadhar" /> 
            
        </div>
        
        <div class="form-group">
            <label for="name" class="form-label">Signature <span style="color:red;">*</span></label></br>
            <img src="<?php echo base_url()?>upload/student/<?php echo $value['signature']?>" width="150px" alt="signature"/>                    
        </div>            

        <div class="form-group">
            <label for="name" class="form-label">My Resume <span style="color:red;">*</span></label>
            <?php if($value['resume'] == ''){?>
            <a href="" >View Resume</a>
            <?php }else{?>
                <a href="<?php echo base_url()?>upload/student/<?php echo $value['resume']?>" target="_blank">View Resume</a>
            <?php }?>
        </div>
    </div>
    

</div>

<?php }}else if($user_type == "company"){
        $company_data = $this->db->where('poc_id',$user_id)->get('company_poc')->result_array();  
        foreach($company_data as $company){
?>
<div class="myprofileupdate-page">
        <div class=" myprofileupdate_data">
            <h1 class="">My Profile </h1>
            <div class="mb-3">
                <label for="" class="form-label">Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="poc_name" value="<?php echo $company['poc_name']?>"  placeholder="address" readonly>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email <span style="color:red;">*</span></label>
                <input type="email" class="form-control" name="poc_email" value="<?php echo $company['poc_email']?>"  placeholder="city" readonly>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Designation <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="designation"  placeholder="designation" value="<?php echo $company['designation']?>" readonly>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Phone <span style="color:red;">*</span></label>
                <input type="number" class="form-control" name="phone" placeholder="phone" value="<?php echo $company['phone']?>" readonly>
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Alternate No. <span style="color:red;">*</span></label>
                <input type="number" class="form-control" name="alternate_no"  placeholder="Alternate No." value="<?php echo $company['alternate_no']?>" readonly>
            </div>
            </div>

        </div>

<?php } }else if($user_type == "faculity"){
        $faculity_data = $this->db->where('faculity_id',$user_id)->get('faculity')->result_array();  
        foreach($faculity_data as $faculity){
?>

<div class="faprofileupdate-page">
        <div class="faprofileupdate_data">
            <h1 class="">My Profile</h1>
            <div class="mb-3">
            <label for="name" class="form-label">Name of the Participant <span style="color:red;">*</span></label>
            <input type="text" name="name" class="form-control" value="<?php echo $faculity['faculity_name']?>" placeholder="" readonly>
            </div>

            <div class="mb-3">
                 <label for="name" class="form-label">Designation <span style="color:red;">*</span></label>
                <input type="text" name="designation" id="designation"  class="form-control" value="<?php echo $faculity['faculity_designation']?>" placeholder="" readonly>
            </div>

            <div class="mb-3">
            <label for="name" class="form-label">Department <span style="color:red;">*</span></label>
            <input type="text" name="department" id="department"  class="form-control" value="<?php echo $faculity['faculity_department']?>" placeholder="" readonly>
            </div>

            <div class="mb-3">
            <label for="name" class="form-label">Organization/University <span style="color:red;">*</span></label>
            <input type="text" name="organization" id="organization"  class="form-control" value="<?php echo $faculity['faculity_organization']?>"placeholder="" readonly>
            </div>


            <div class="mb-3">
            <label for="name" class="form-label">Email <span style="color:red;">*</span></label>
            <input type="text" name="email" id="email"  class="form-control" value="<?php echo $faculity['faculity_email']?>" placeholder="" readonly>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">City <span style="color:red;">*</span></label>
                <input type="text" name="city" id="city"  class="form-control" value="<?php echo $faculity['city']?>" placeholder="" readonly>
                                        
            </div>
                                    
                <div class="mb-3">
                    <label for="name" class="form-label">Organization/University Address <span style="color:red;">*</span></label>
                    <input type="text" name="address" id="address"  class="form-control" value="<?php echo $faculity['address']?>" placeholder="" readonly>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">State <span style="color:red;">*</span></label>
                    <input type="text" name="state" id="state"  class="form-control" value="<?php echo $faculity['state']?>" placeholder="" readonly>
                  
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Mobile No.(Whatsapp) <span style="color:red;">*</span> </label>
                    <input type="number" name="phone" id="phone" maxlength="10" class="form-control num" value="<?php echo $faculity['phone']?>" placeholder="" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="name" class="form-label">Accommodation<span style="color:red;">*</span></label>
                    <input type="text" name="accommodation"  class="form-control" placeholder="" value="<?php echo $faculity['accommodation']?>" readonly>                      
        
                </div>
            </div>

        </div>


<?php } }?>
<script>
  $(document).ready(function () {
    $(".num").keypress(function () {
      if ($(this).val().length == $(this).attr("maxlength")) {
        return false;
      }
    });
  });
</script>


