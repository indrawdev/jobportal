<script type="text/javascript">
	$(document).ready( function() 
	{
		$('#btn').click(function(event)
		{
			event.preventDefault();
			uri = $('#form').attr('action');
			$.ajax
			({
				type: 'POST',
				url: uri,
				data: $('#form').serialize(),
				success: function(data) 
				{
					if(data.response == 'failed')
					{	
						msg = '<div class="alert alert-error fade in">'+
							'<a class="close" href="#" data-dismiss="alert">&times;</a>'+
							'<strong>'+data.message+'</strong>'+
							'</div>'
							$('#message').html(msg);	
					}
					else if (data.response == 'success')
					{
						msg = '<div class="alert alert-success fade in">'+
							'<a class="close" href="#" data-dismiss="alert">&times;</a>'+
							'<strong>Your password has been sent, please check your email</strong>'+
							'</div>'
							$('#message').html(msg);	
							window.setInterval(function(){
								self.location='<?php echo base_url().'login/forgotpassword'; ?>';
							}, 20000);
					}
				},
				dataType: "json"
			});
		});
	});
</script>
<div class="container">
	<form id="form" class="form-signin" method="post" action="<?php echo base_url().'login/sendPassword';?>">
        <h2 class="form-signin-heading">Forgot Password</h2>
        <div id="message"></div>
        <input type="text" class="input-block-level" placeholder="Email address" required name="email">
        <button id="btn" class="btn btn-large btn-primary" type="submit">Send Password</button>
    </form>
</div>