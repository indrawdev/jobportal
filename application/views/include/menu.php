    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'assets/images/logo.png'; ?>" alt="Kerja Kita"/></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="<?php echo base_url().'find'; ?>">Find Jobs</a>
              </li>
              <?php
			   //echo $this->session->userdata('login').'----'.$this->session->userdata('level_id');
				if ($this->session->userdata('login') == TRUE && $this->session->userdata('level_id') == 1) {
			   ?>
               <li class=""><a href="<?php echo base_url().'employer/postjob'; ?>">Post Jobs</a></li>  
              <?php
			  	} 
			   ?>
           
			  <li class="">
                <a href="<?php echo base_url().'search'; ?>">Search Resumes</a>
              </li>
              
			  <?php
				if ($this->session->userdata('login') == TRUE && $this->session->userdata('level_id') == 2) {
			   ?>
               <li class=""><a href="<?php echo base_url().'jobseeker/postresume'; ?>">Post Resumes</a></li>
               <li class=""><a href="<?php echo base_url().'jobseeker/cvupload'; ?>">CV Upload</a></li>
              <?php 
			  	} 
			   ?>
              
              <?php
			  	if ($this->session->userdata('login') == FALSE) {
			  ?>
              <li class="">
                <a href="<?php echo base_url().'company'; ?>">Company</a>
              </li>
              <li class="">
                <a href="<?php echo base_url().'resources'; ?>">Resources</a>
              </li>              
              <li class="">
                <a href="<?php echo base_url().'event'; ?>">Event</a>
              </li>
              <li class="">
                <a href="<?php echo base_url().'contact'; ?>">Contact</a>
              </li>
              <?php } ?>
              
			  <?php
			  	if ($this->session->userdata('login') == TRUE) {
			  ?>
              <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Menu
					<b class="caret"></b>
				</a>
				 <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url().'employer/joblist'; ?>">Job List</a></li>                 
					<li><a href="<?php echo base_url().'employer/application'; ?>">Application</a></li>
                    <li><a href="<?php echo base_url().'jobseeker/application'; ?>">Application</a></li>
                    <li><a href="<?php echo base_url().'jobseeker/resume'; ?>">Resume</a></li>
                    <li><a href="<?php echo base_url().'jobseeker/jobalert'; ?>">Job Alert</a></li>
                    <li><a href="<?php echo base_url().'employer/resumealert'; ?>">Resume Alert</a></li>
					<li><a href="<?php echo base_url().'employer/package'; ?>">Employer Package</a></li>
                    <li><a href="<?php echo base_url().'jobseeker/package'; ?>">Jobseeker Package</a></li>
                    <li><a href="<?php echo base_url().'employer/support'; ?>">Customer Support</a></li>
                    <li><a href="<?php echo base_url().'jobseeker/support'; ?>">Customer Support</a></li> 
				 </ul>
              </li>
              <?php
			  	}
			  ?>
              
              <?php
				if ($this->session->userdata('login') == TRUE) {
			  ?>     
              <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Billing
					<b class="caret"></b>
				</a>
				 <ul class="dropdown-menu">
					<li><a href="<?php echo base_url().'payment'; ?>">Payment</a></li>
                    <li><a href="<?php echo base_url().'payment/invoice'; ?>">Invoice</a></li>
                    <li><a href="<?php echo base_url().'payment/confirmation'; ?>">Confirmation</a></li>
				 </ul>
              </li> 
              <?php } ?>
            </ul>
            <ul class=" nav navbar-text pull-right">
			  <?php 
                if ($this->session->userdata('login') == FALSE) {
              ?>
              <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Register
					<b class="caret"></b>
				</a>
				 <ul class="dropdown-menu">
                 	<li><a href="<?php echo base_url().'register/employer'; ?>">Employer</a></li>
                    <li class="divider"></li>   
					<li><a href="<?php echo base_url().'register/jobseeker'; ?>">Job Seeker</a></li> 
				 </ul>
              </li>
              <li class="">
                <a href="<?php echo base_url().'login'; ?>">Login</a>
              </li>
              <?php
			  	}
			  ?>
     
              <?php
			  	if ($this->session->userdata('login') == TRUE) {
			  ?>
              
              <li class="dropdown">
				<?php
                  if ($this->session->userdata('login') == TRUE) {
                ?>	
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> My Account
					<b class="caret"></b>
				</a>
				<?php
                   }
                ?>
				 <ul class="dropdown-menu">
                 <?php
				 	if ($this->session->userdata('login') == TRUE && $this->session->userdata('level_id') == 1) {
				 ?>
                 	<li><a href="<?php echo base_url().'employer/account'; ?>">Profile</a></li>
                    <li><a href="<?php echo base_url().'employer/testimonial'; ?>">Testimonial</a></li> 
                    <li><a href="<?php echo base_url().'employer/changepassword'; ?>">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'employer/logout'; ?>">Logout</a></li>
                 <?php
				 	}
				 ?>
                 <?php
				 	if ($this->session->userdata('login') == TRUE && $this->session->userdata('level_id') == 2) {
				 ?>
                 	<li><a href="<?php echo base_url().'jobseeker/account'; ?>">Profile</a></li>
                    <li><a href="<?php echo base_url().'jobseeker/testimonial'; ?>">Testimonial</a></li> 
                    <li><a href="<?php echo base_url().'jobseeker/changepassword'; ?>">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'jobseeker/logout'; ?>">Logout</a></li> 
                 <?php
				 	}
				 ?>
				 </ul>
              </li>              
             <?php
			 	}
			 ?>
             </ul>
          </div>
        </div>
      </div>
    </div>