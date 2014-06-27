<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.form.js';?>"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#btn').click(function(event){
		var btn = $(this);
        var css =  btn.attr("class");
        var text = btn.html();
        
        btn.html("Please wait..");
        btn.attr("class","btn btn-large btn-block disabled");
		btn.attr("disabled", "disabled");
    	$('#loading').show();
        event.preventDefault();
		$('#form').ajaxSubmit({ 
                dataType: "json", 
                complete: function(data) {
                     btn.attr("class",css);
                     btn.html(text);
                },
                success: function(data) {
                    
                     btn.attr("class",css);
                     btn.html(text);
                     btn.removeAttr("disabled");
                        if(data.response == 'failed') {
                            $('#loading').hide();
							$('#company_name').html(data.message.company_name);
							$('#contact_name').html(data.message.contact_name);
							$('#province').html(data.message.province);
							$('#city_error').html(data.message.city);
							$('#address').html(data.message.address);
							$('#phone_number').html(data.message.phone_number);
							$('#company_description').html(data.message.company_description);
							$('#logo').html(data.message.logo);
                        }
                        else {
                        $('#loading').hide();
                        msg = '<div class="alert alert-success fade in">'+
                               '<a class="close" href="#" data-dismiss="alert">&times;</a>'+
                               '<strong>Success</strong>'+
                               '</div>'
                        $('#message').html(msg);
                         
                        }
                
                }
		});
	});			
});
</script>
<div class="container">
	<div class="row-fluid">
        
        <div class="span3 bs-docs-sidebar">
            <ul class="nav nav-list bs-docs-sidenav">
              <li><a href="#"> Employer Name</a></li>            
            </ul>
            <ul class="nav nav-list bs-docs-sidenav">
              <li><a href="#"><i class="icon-chevron-right"></i> Security and privacy</a></li>
              <li><a href="#"><i class="icon-chevron-right"></i> Password</a></li>
              <li><a href="#"><i class="icon-chevron-right"></i> Profile</a></li>
              <li><a href="#"><i class="icon-chevron-right"></i> Apps</a></li>
            </ul>
        </div>
            	
        <div class="span9">
        <form id="form" class="form-horizontal block-form post-job" method="post" enctype="multipart/form-data" action="<?php echo base_url().'employer/updateAccount'; ?>">
        <h2 class="form-signin-heading">Account</h2>
        <div id="loading"></div>
        <div id="message"></div>
        <div class="control-group">
          <label class="control-label" for="company_name">Company Name</label>
          <div class="controls">
            <input type="text" name="company_name" class="span10" value="<?php echo $account->company_name; ?>">
            <div id="company_name"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="contact_name">Contact Name</label>
          <div class="controls">
            <input type="text" name="contact_name" class="span10" value="<?php echo $account->contact_name; ?>">
            <div id="contact_name"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="website">Website</label>
          <div class="controls">
            <input type="text" name="website" class="span10" value="<?php echo $account->website; ?>">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="province">Province</label>
          <div class="controls">
            <select class="span10" name="province">
				<?php 
					foreach ($provinces as $province) {
						echo '<option value="'.$province->province_id.'"';
						echo '>'.$province->name.'</option>';
					}
				?>
            </select>
            <div id="province"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="city">City</label>
          <div class="controls">
            <select class="span10" name="city">
				<?php 
					foreach ($cities as $city) {
						echo '<option value="'.$city->city_id.'"';
						echo '>'.$city->name.'</option>';
					}
				?>
            </select>
            <div id="city_error"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="address">Address</label>
          <div class="controls">
            <textarea rows="3" name="address" class="span10"><?php echo $account->address; ?></textarea>
            <div id="address"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="zipcode">Zip Code</label>
          <div class="controls">
            <input type="text" name="zipcode" class="span10" value="<?php echo $account->zipcode; ?>">
          </div>
        </div>           
        <div class="control-group">
          <label class="control-label" for="phone_number">Phone Number</label>
          <div class="controls">
            <input type="text" name="phone_number" class="span10" value="<?php echo $account->phone_number; ?>">
            <div id="phone_number"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="company_description">Company Description</label>
          <div class="controls">
            <textarea rows="3" name="company_description" class="span10"><?php echo $account->company_description; ?></textarea>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="logo">Logo</label>
          <div class="controls">
            <input type="file" name="logo" placeholder="Logo" class="span10">
            <div id="logo"></div>
          </div>
        </div>
        <div class="form-actions">
            <button id="btn" type="submit" class="btn btn-warning btn-large">Save Changes</button>
            <button type="reset" class="btn btn-large">Cancel</button>
        </div>
        </form>
        </div>
    </div>
</div>