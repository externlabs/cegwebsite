<!--Section: Contact v.2-->

<section>
    
    <img src="<?php echo base_url()?>assets/image/contact.png" alt="" class="w-100" />
</section>


<section class=" contactinfo-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3> Get In Tuch </h3>
                <form id="contact-form" class="contact-form" name="contact-form" action="mail.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form ">                                
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form ">
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form ">
                                <input type="text" id="subject" name="subject" class="form-control"
                                    placeholder="Subject">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form ">
                                <input type="text" id="phoneNo" name="subject" class="form-control"
                                    placeholder="Mob No">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <textarea type="text" id="message" name="message" cols="8" rows="5"
                                    class="form-control md-textarea" placeholder="Message"></textarea>

                            </div>

                        </div>
                    </div>


                </form>

                <div>
                    <a class="btn" onclick="document.getElementById('contact-form').submit();">Send</a>
                </div>
                <div class="status"></div>
            </div>
            <div class="col-md-6 ">
                <div class="contact-list">
                    <ul class="">
                        <li>
                            <span><i class="fas fa-phone  fa-2x"></i></span>
                             <a href="tel:0123456789">    0141 270 23449</a>
                        </li>

                        <li>
                            <span><i class="fas fa-envelope fa-2x"></i> </span> 
                             <a href="mailto:contact@mdbootstrap.com">    contact@mdbootstrap.com </a>
                        </li>
                        <li>
                             <span><i class="fas fa-map-marker-alt fa-2x"></i></span>
                             <p> San Francisco, CA 94126, USA</p>
                        </li>
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