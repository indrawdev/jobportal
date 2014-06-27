<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>KerjaKita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<<<<<<< HEAD
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/bootstrap-responsive.min.css'; ?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/custom.css'; ?>" rel="stylesheet">
=======
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
	
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
    <![endif]-->
	
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/icon/favicon.ico">
<<<<<<< HEAD
    <script src="<?php echo base_url().'assets/js/jquery-1.10.2.min.js'; ?>"></script>
    <script type="text/javascript">
	 $(function () {
		$("ul.nav li").click(function() {
			$('ul.nav li').removeClass('active');
			$(this).addClass("active");
		});
	});
	
    </script>
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">
=======
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Kerja Kita"/></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="<?php echo base_url(); ?>find">Find Jobs</a>
              </li>
              <li class="">
                <a href="<?php echo base_url(); ?>employer/postjob">Post Jobs</a>
              </li>
			  <li class="">
                <a href="<?php echo base_url(); ?>search">Search Resumes</a>
              </li>
			  <li class="">
                <a href="<?php echo base_url(); ?>jobseeker/postresume">Post Resumes</a>
              </li>
              <li class="">
                <a href="<?php echo base_url(); ?>contact">Contact</a>
              </li>
              <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Menu
					<b class="caret"></b>
				</a>
				 <ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>employer/joblist">Job List</a></li>                 
					<li><a href="<?php echo base_url(); ?>employer/application">Application</a></li>
                    <li><a href="<?php echo base_url(); ?>jobseeker/resume">Resume</a></li>
                    <li><a href="<?php echo base_url(); ?>jobseeker/jobalert">Job Alert</a></li>
                    <li><a href="<?php echo base_url(); ?>employer/resumealert">Resume Alert</a></li>
					<li><a href="<?php echo base_url(); ?>package/employer">Employer Package</a></li>
                    <li><a href="<?php echo base_url(); ?>package/jobseeker">Jobseeker Package</a></li>
				 </ul>
              </li>
              <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Billing
					<b class="caret"></b>
				</a>
				 <ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>payment">Payment</a></li>
                    <li><a href="<?php echo base_url(); ?>payment/invoice">Invoice</a></li>
                    <li><a href="<?php echo base_url(); ?>payment/confirmation">Confirmation</a></li>
				 </ul>
              </li> 
            </ul>
            <ul class=" nav navbar-text pull-right">
              <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Register
					<b class="caret"></b>
				</a>
				 <ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>jobseeker/register">Job Seeker</a></li>                 
					<li><a href="<?php echo base_url(); ?>employer/register">Employer</a></li>
				 </ul>
              </li>
              <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Login
					<b class="caret"></b>
				</a>
				 <ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>jobseeker/login">Job Seeker</a></li>                 
					<li><a href="<?php echo base_url(); ?>employer/login">Employer</a></li>
				 </ul>
              </li>
              <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> My Account
					<b class="caret"></b>
				</a>
				 <ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>jobseeker/account">Profile</a></li>                 
					<li><a href="<?php echo base_url(); ?>employer/account">Profile</a></li>
                    <li><a href="<?php echo base_url(); ?>jobseeker/changepassword">Change Password</a></li>
                    <li><a href="<?php echo base_url(); ?>employer/changepassword">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>">Logout</a></li>
				 </ul>
              </li>              
             </ul>
          </div>
        </div>
      </div>
    </div>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
