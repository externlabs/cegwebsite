<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>



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
        <h3>Add News</h3>
        <form method="post" action="<?php echo base_url()?>admin/news/addnews/add_news" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                         <div class="form-group">
                        <label for="name">Add News Image <span style="color:red;">*</span></label>
                        <input type="file" id="myFile" name="images" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Title<span style="color:red;">*</span></label>
                        <input type="text" name="title" maxlength="50" placeholder="Enter Title" required>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Description <span style="color:red;">*</span></label>
                        <textarea name="description" id="" cols="30" rows="5" placeholder="Enter Description" required></textarea>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Website Link <span style="color:red;">*</span></label>
                        <input type="text" name="link" placeholder="Enter Website Link (Eg: https://domainname.com/)" required>
                        </div>
                        <button name="formSubmit">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>




