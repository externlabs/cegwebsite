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

<?php if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'ON'){
                    $url = "https://";
                }else{
                    $url = "http://";
                }
                $url.= $_SERVER['HTTP_HOST'];
                $url.= $_SERVER['REQUEST_URI'];
                
                
                
            $parts = basename($url);
            
            $rerfe = explode("=",$parts);

 $course_data = $this->db->where('course_id',$rerfe[1])->get('course')->result_array();?>

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
    <h3>Edit Course</h3>
    <?php foreach($course_data as $course){?>
    <form method="post" action="<?php echo base_url()?>admin/training/editcourse/update_course"
      enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <label for="name" class="form-label">Select Training <span style="color:red;">*</span></label>
            <select name="training_id" id="" disabled>
              <option value="">Select Training</option>
              <?php foreach($training_data as $value){?>
              <option value="<?php echo $value['training_id']?>" <?php if($value['training_id'] == $course['training_id']){echo "selected";}else{echo "";}?>>
                <?php echo $value['training_name']?>
              </option>
              <?php }?>
            </select>
            <label for="name" class="form-label">Course Name <span style="color:red;">*</span></label>
            <input type="text" name="course_name" placeholder="Enter Course Name" maxlength="255" required value="<?php echo $course['course_name']?>">
            <label for="name" class="form-label">Course Description <span style="color:red;">*</span></label>
            <textarea name="course_desc" id="" cols="30" rows="10" placeholder="Enter Course Description"><?php echo $course['course_desc']?></textarea>
            <label for="name" class="form-label">Paid / Free <span style="color:red;">*</span></label>
            <select name="course_type" id="course_type">
              <option value="">Select an option</option>
              <option value="paid" <?php if($course['course_type'] == 'paid'){echo "selected";}else{echo "";}?>>Paid</option>
              <option value="free" <?php if($course['course_type'] == "free"){echo "selected";}else{echo "";}?>>Free</option>
            </select>
            <div id="amount">
              <label for="name" class="form-label">Rregistration Fees <span style="color:red;">*</span></label>
              <input type="number" name="form_amount" id="" class="num" maxlength="5" value="<?php echo $course['form_amount']?>" placeholder="Please Enter Amount">
              <label for="name" class="form-label">Course fees <span style="color:red;">*</span></label>
              <input type="number" name="course_amount" id="" class="num" value="<?php echo $course['course_amount']?>" maxlength="5"
                placeholder="Please Enter Amount">
            </div>

           
            
            <input type="hidden" name="course_id" value="<?php echo $course['course_id']?>">

            <button name="formSubmit">Update Course</button>
          </div>
        </div>
      </div>
    </form>
    <?php }?>
  </div>
</div>



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