<<<<<<< HEAD
<script type="text/javascript">
function lookupCity(comboProvince,idCity){var province_id=comboProvince.options[comboProvince.selectedIndex].value;var comboCity=document.getElementById(idCity);if(province_id==''){comboCity.innerHTML="";var Item2=new Option(" --- Select City --- ","");comboCity.options[comboCity.length]=Item2}else{comboCity.innerHTML="";var Item=new Option(" Loading... ","");comboCity.options[comboCity.length]=Item;$.ajax({url:'<?php echo root().'register/lookupcity'; ?>',type:'POST',data:'province_id='+province_id,dataType:'json',success:function(json){comboCity.innerHTML="";var Item=new Option(" --- Select City --- ","");comboCity.options[comboCity.length]=Item;$.each(json,function(i,item){var Item=new Option(item.value,item.key);comboCity.options[comboCity.length]=Item})}})}}
</script>
<script type="text/javascript" src="<?php echo root().'assets/js/jquery.form.js';?>"></script>
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
                            $('#email').html(data.message.email);
							$('#password').html(data.message.password);
							$('#company_name').html(data.message.company_name);
							$('#contact_name').html(data.message.contact_name);
							$('#province').html(data.message.province);
							$('#city_error').html(data.message.city);
							$('#address').html(data.message.address);
							$('#phone_number').html(data.message.phone_number);
							$('#company_description').html(data.message.company_description);
							$('#logo').html(data.message.logo);
							$('#accept').html(data.message.accept);
                        }
                        else {
                        $('#loading').hide();
                        msg = '<div class="alert alert-success fade in">'+
                               '<a class="close" href="#" data-dismiss="alert">&times;</a>'+
                               '<strong>Success</strong>'+
                               '</div>'
                        $('#message').html(msg);
                         window.location="<?php echo root();?>";
                         
                        }
                
                }
		});
	});			
});

	function isNumberKey(evt) {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
	}
</script>
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
<div class="container">
	<div class="row-fluid">
	<div class="span3"></div>
    <div class="span6">
<<<<<<< HEAD
	<form id="form" class="form-horizontal block-form register" method="post" enctype="multipart/form-data" action="<?php echo base_url().'register/createEmployer'; ?>">
        <h2 class="form-signin-heading">Register</h2>
        <div class="control-group">
          <label class="control-label" for="email">Email <span class="required">*</span></label>
          <div class="controls">
            <input type="email" name="email" placeholder="Email" class="span10" required>
            <div id="email"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="password">Password <span class="required">*</span></label>
          <div class="controls">
            <input type="password" name="password" placeholder="Password" class="span10">
            <div id="password"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="company_name">Company Name <span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="company_name" placeholder="Company Name" class="span10">
            <div id="company_name"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="contact_name">Contact Name <span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="contact_name" placeholder="Contact Name" class="span10">
            <div id="contact_name"></div>
=======
	<form class="form-horizontal">
        <h2 class="form-signin-heading">Register</h2>
        <div class="control-group">
          <label class="control-label" for="username">Username</label>
          <div class="controls">
            <input type="text" id="username" placeholder="Username" class="span10">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="password">Password</label>
          <div class="controls">
            <input type="password" id="password" placeholder="Password" class="span10">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="email">Email</label>
          <div class="controls">
            <input type="email" id="email" placeholder="Email" class="span10" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="company_name">Company Name</label>
          <div class="controls">
            <input type="text" id="company_name" placeholder="Company Name" class="span10">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="contact_name">Contact Name</label>
          <div class="controls">
            <input type="text" id="contact_name" placeholder="Contact Name" class="span10">
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="website">Website</label>
          <div class="controls">
<<<<<<< HEAD
            <input type="text" name="website" placeholder="Website" class="span10">
            <div id="website"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="province">Province <span class="required">*</span></label>
          <div class="controls">
            <select class="span10" name="province" onChange="lookupCity(this,'city');">
            <option value=""> --- Select Province --- </option>
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
          <label class="control-label" for="city">City <span class="required">*</span></label>
          <div class="controls">
            <select id="city" class="span10" name="city">
            	<option value=""> --- Select City --- </option>
            </select>
            <div id="city_error"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="address">Address <span class="required">*</span></label>
          <div class="controls">
            <textarea rows="3" name="address" class="span10"></textarea>
            <div id="address"></div>
=======
            <input type="text" id="website" placeholder="Website" class="span10">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="province">Province</label>
          <div class="controls">
            <select class="span10">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="city">City</label>
          <div class="controls">
            <select class="span10">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="address">Address</label>
          <div class="controls">
            <textarea rows="3" class="span10"></textarea>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="zipcode">Zip Code</label>
          <div class="controls">
<<<<<<< HEAD
            <input type="text" id="zipcode" name="zipcode" maxlength="5" onKeyPress="return isNumberKey(event)" placeholder="Zip Code" class="span10">
          </div>
        </div>           
        <div class="control-group">
          <label class="control-label" for="phone_number">Phone Number <span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="phone_number" maxlength="12" onKeyPress="return isNumberKey(event)" placeholder="Phone Number" class="span10">
            <div id="phone_number"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="company_description">Company Description <span class="required">*</span></label>
          <div class="controls">
            <textarea rows="3" name="company_description" class="span10"></textarea>
            <div id="company_description"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="logo">Logo <span class="required">*</span></label>
          <div class="controls">
            <input type="file" name="logo" placeholder="Logo" class="span10">
            <div id="logo"></div>
          </div>
        </div> 
        <div class="control-group">
          <label class="control-label" for="accept">Agree to Terms <span class="required">*</span></label>
          <div class="controls">
            <label class="checkbox">
            <input type="checkbox" name="accept" value="1" >
             I understand and agree to the <a href="<?php echo base_url().'page/terms'; ?>">Kerjakita user Agreement</a>  and incorporated <a href="<?php echo base_url().'page/privacy'; ?>">Privacy Policy</a>.
            </label>
            <div id="accept"></div>            
          </div>
        </div>
        <div class="form-actions">
            <button id="btn" type="submit" class="btn btn-warning btn-large">Create Employer</button>
            <button type="reset" class="btn btn-large">Cancel</button>
=======
            <input type="text" id="zipcode" placeholder="Zip Code" class="span10">
          </div>
        </div>           
        <div class="control-group">
          <label class="control-label" for="phone_number">Phone Number</label>
          <div class="controls">
            <input type="text" id="phone_number" placeholder="Phone Number" class="span10">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="phone_number">Company Description</label>
          <div class="controls">
            <textarea rows="3" class="span10"></textarea>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="phone_number">Logo</label>
          <div class="controls">
            <input type="file" id="logo" placeholder="Logo" class="span10">
          </div>
        </div> 
        <div class="control-group">
          <label class="control-label" for="phone_number">Accept terms of use</label>
          <div class="controls">
            <label class="checkbox">
            <input type="checkbox" name="accept" id="accept" value="" >
            <a href="#">Read terms of use</a>
            </label>
          </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-large">Create Employer</button>
            <button type="button" class="btn btn-large">Cancel</button>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
        </div>                                                                        
    </form>
    </div>
    <div class="span3"></div>
    </div>
</div>