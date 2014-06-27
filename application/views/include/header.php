<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>KerjaKita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/bootstrap-responsive.min.css'; ?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/custom.css'; ?>" rel="stylesheet">
	
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
    <![endif]-->
	
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/icon/favicon.ico">
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