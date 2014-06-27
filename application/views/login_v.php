<script type="text/javascript">
	$(document).ready( function() {
		$('#btn').click(function(event){
			event.preventDefault();
			uri = $('#form').attr('action');
			$.ajax
			({
				type: 'POST',
				url: uri,
				data: $('#form').serialize(),
				success: function(data) {
					if(data.response == 'failed'){	
						msg = ' <div class="alert alert-error fade in">'+
							'<a class="close" href="#" data-dismiss="alert">&times;</a>'+
							'<strong>'+data.message+'</strong>'+
							'</div>'
							$('#message').html(msg);	
					}
					else {
						uri = data.redirect;
						self.location=uri;
					}
				},
				dataType: "json"
			});
		});
	});
</script>
<div class="container">
	<form id="form" class="form-signin" method="post" action="<?php echo base_url().'login/processLogin';?>">
        <h2 class="form-signin-heading">Login</h2>
        <div id="message"></div>
        <input type="text" class="input-block-level" placeholder="Email address" required name="email">
        <div id="login"></div>
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <div id="password"></div>
        <label class="checkbox">
        <input type="checkbox" value="remember-me"> Remember me | <a href="<?php echo base_url().'login/forgotpassword'; ?>">Forgot password?</a>
        </label>
        <button id="btn" class="btn btn-large btn-warning" type="submit">Sign in</button>
		<hr />
		<a href="<?php echo base_url().'linkedin/login';?>"><img src="<?php echo base_url().'assets/images/linkdn_login_button.png'; ?>" /></a>
    </form>
</div>