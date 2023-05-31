<div class="home-page"> 
    <div class="modal" id="myModal">
        <div class="modal-inner">
            <div class="modal-body">
                <button class="modal-closebtn"><i class="fa-solid fa-circle-xmark"></i></button>
                <figure class="mb-0">
                    <img src="<?php echo base_url()?>assets/image/modal-img.jpeg" alt="">
                </figure>
            </div>
        </div>
    </div> 
    <section class="homebanner">
        <img src="<?php echo base_url()?>assets/image/banner.png" alt="img"> 
        <ul class="info-list">
            <li>
                <img src="<?php echo base_url()?>assets/image/img1.png" alt="img">
                <div class="text-box">
                    <h2>Hon'ble Chief Minister</h2>
                    <p>Shri Ashok Gehlot</p>
                </div>
            </li>
            <li>
                <img src="<?php echo base_url()?>assets/image/img3.png" alt="img"
                    style="padding: 10px; background-color: #e0e5ee; border-radius: 4px 0 0 4px;">
                <div class="text-box">
                    <h2> Hon'ble Minister Technical Education</h2>
                    <p>Dr. Subhash Garg </p>
                </div>
            </li>
        </ul>
    </section>

    <section class="aboutinfo-section">
        <ul class="aboutinfo-part">
            <li>
                <ul class="info-list">
                    <li>
                        <img src="<?php echo base_url()?>assets/image/BhawaniJi.png" alt="img">
                        <div class="text-box">
                            <h2>Principal Secretary, Higher & Tech. Education Dept.</h2>
                            <p>Shri Bhawani Singh Detha (IAS)</p>
                        </div>
                    </li>
                    <li>
                        <img src="<?php echo base_url()?>assets/image/ManishGupta.png" alt="img">
                        <div class="text-box">
                            <h2> Director</h2>
                            <p> Dr. Manish Gupta</p>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="aboutceg-text">
                <h2>About CEG</h2>
                <p>Centre for Electronic Governance (CEG), Jaipur is established in 2006 by Department of Technical
                    Education,
                    Government of Rajasthan in SFS mode under Society. </p>
                <p>The affairs of the society are carried by two councils:</p>
                <ul>
                    <li>Governing Council (GC)</li>
                    <li>Executive Council (EC)</li>
                </ul>
                <p>
                    The president of GC is Honorable Minister, Technical Education and the chairman of the EC is
                    Honorable Secretary Department of Technical Education, GOR.
                </p><br />
                <p>
                    The CEG has been established with a sole aim to provide a conducive environment for creating
                    industry employable IT professionals by the way of arranging seminars lecturers, vocational
                    trainings and industry relevant software trainings as well as faculty development program. At the
                    same time it provides a readymade platform for interaction between the industry and the trained
                    workforce through the different placement activities.
                </p>
                <p>
                    CEG is working as State Level Central Placement Cell (CPC) Nodal Agency on behalf of Department of
                    Technical Education Govt. of Rajasthan. State Level Central Placement Cell works for placement of
                    Engineering, Diploma and Non Technical students of Rajasthan.
                </p>
                <p>
                    CEG is also a common platform for Centralized Admission Process for Engineering/MBA/MCA etc.
                </p>
                <h3>The Objective of CEG</h3>
                <ul>
                    <li>
                        To promote interaction between the Government, Universities and the Industry.
                    </li>
                    <li> To provide conducive environment of learning by doing in colleges.
                    </li>
                    <li> To promote the dissemination of knowledge and fostering the innovative thoughts of the
                        students.
                    </li>
                    <li> To develop and deploy e-Governance applications in a cost-effective manner, thus upgrading the
                        quality of life of the citizen.
                    </li>
                    <li> To organize engineering seminars and lectures of eminent engineers and scientists.
                    </li>
                    <li> To update the curriculum as per the needs of the Industries.
                    </li>
                    <li> To empower student living in rural areas so as to bridge the urban-rural gap.
                    </li>
                    <li> To undertake research and apply these fruit full results for the benefit of the public.
                    </li>
                    <li> To produce readily employable graduates by imparting industry grade skills.
                    </li>
                    <li> To produce industry ready IT professionals.
                    </li>
                    <li> To update the curriculum as per the needs of the Industries.
                    </li>
                    <li> To organize engineering seminars and lectures of eminent engineers and scientists.
                    </li>
                    <li> To perform such other functions and to carry out such other duties as the society may be
                        assigned to it by the State Government from time to time.
                    </li>
                </ul>
            </li>

            <li class="aboutceg-img">
                <img src="<?php echo base_url()?>assets/image/aboutceg-img.png" alt="img">
            </li>

            <li class="news-part">
                <div class="news-header">
                    <h3>Latest News</h3>
                    <button>Know More</button>
                </div>
                <marquee onMouseOver="this.stop()" onMouseOut="this.start()" direction="up" scrolldelay="10">
                    <ul>
                    <?php
                    foreach($news_details as $value){
                    ?>
                    <li> <a href="<?php echo $value['link']?>"><?php echo $value['title']?></a></li>

                    <?php } ?>
                        
                    </ul>
                </marquee>
            </li>
        </ul>
    </section>    
</div> 

   