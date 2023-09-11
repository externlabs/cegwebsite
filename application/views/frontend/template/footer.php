<?php $website_data = $this->db->get('websetting')->result_array();?>
<footer>
    <div class="container-box">      
        <ul class="footer-row">
            <li> 
                <?php foreach($website_data as $data){?>
                <h2> <?php echo $data['web_name']?></h2>
                <p><?php echo $data['address']?> </p>
                <p> Phone No. : <a href="tel:<?php echo $data['contact']?>"><?php echo $data['contact']?></a> </p>
                <p> Email: <a href="<?php echo $data['email']?>"><?php echo $data['email']?></a>
                <?php }?>
            </li>
            <li class="quicklink"> 
                <h2> Quick Link </h2>
                <ul> 
                    <li> <a href="https://www.rtu.ac.in/index/" target="_blank"> https://www.rtu.ac.in/ </a> </li>
                    <li> <a href="https://btu.ac.in/home/" target="_blank"> https://btu.ac.in/</a> </li>
                    <li> <a href="https://www.aicte-india.org/" target="_blank"> https://www.aicte-india.org/ </a> </li>
                    <li> <a href="https://dte.rajasthan.gov.in/" target="_blank"> https://dte.rajasthan.gov.in/ </a> </li>
                    <li> <a href="https://hte.rajasthan.gov.in/" target="_blank"> https://hte.rajasthan.gov.in/ </a> </li>
                </ul>
            </li>
            <li> 
                <ul> 
                    <li> <a href="#"> Home </a> </li>
                    <li> <a href="#"> Gallery</a> </li>
                    <li> <a href="#"> Staff List </a> </li>
                    <li> <a href="#"> Tender </a> </li>
                    <li> <a href="#"> REAP </a> </li>
                    <li> <a href="#"> B.Arch </a> </li>
                    <li> <a href="#"> RMCAAP </a> </li>
                    <li> <a href="#"> RMAP </a> </li>                    
                </ul>
            </li>
            <li>
                <p> Copyright &copy; Centre for Electronic </p>
                <p> Governance, ,Jaipur  </p>
                <p> Last Updated :3/4/2023, 10:34:32 PM  </p>
                <p> <b>Visitor Number : 262615 </b>  </p>
            </li>
        </ul>
    </footer>
</body>

<script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"
   ></script>
<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url()?>assets/js/custom.js"></script>

</html>