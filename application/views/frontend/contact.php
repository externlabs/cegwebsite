<!--Section: Contact v.2-->

<section>
    
    <img src="<?php echo base_url()?>assets/image/contact.png" alt="" class="w-100" />
</section>

<?php $website_data = $this->db->get('websetting')->result_array();?>

<section class=" contactinfo-sec">
    <div class="container">
    <?php
    if ($this->session->flashdata('success')) {
      echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
    } else if ($this->session->flashdata('error')) {
      echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
    }
?>
        <div class="row">
            <div class="col-md-6">
                <h3> Get In Tuch </h3>
                <form action="<?php echo base_url()?>frontend/contact/insert" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form "> 
                                                         
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form ">
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email" require>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject"  require>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form ">
                                <input type="number" id="phoneNo" name="number" class="form-control" placeholder="Mob No" require>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <textarea type="text" id="message" name="msg" cols="8" rows="5"
                                    class="form-control md-textarea" placeholder="Message" require></textarea>

                            </div>

                        </div>
                    </div>

                <div>
                    <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Send Message</button>
                </div>

                
                </form>
                <div class="status"></div>
            </div>
            <div class="col-md-6 ">
                <div class="contact-list">
                    <ul class="">
                        <?php foreach($website_data as $data){?>
                        <li>
                            <span><i class="fas fa-phone  fa-2x"></i></span>
                             <a href="tel:<?php echo $data['contact']?>"> <?php echo $data['contact']?></a>
                        </li>

                        <li>
                            <span><i class="fas fa-envelope fa-2x"></i> </span> 
                             <a href="mailto:<?php echo $data['email']?>">  <?php echo $data['email']?> </a>
                        </li>
                        <li>
                             <span><i class="fas fa-map-marker-alt fa-2x"></i></span>
                             <p> <?php echo $data['address']?></p>
                        </li>
                        <?php }?>
                    </ul>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1779.416645210497!2d75.8135674983948!3d26.877037199999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db5d33aaaaaab%3A0xdabd50c1c19c1aed!2sCentre%20For%20Electronic%20Governance!5e0!3m2!1sen!2sin!4v1682591356908!5m2!1sen!2sin"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                </div>
            </div>
            
        </div>
    </div>
</section>




<!--Section: Contact v.2-->