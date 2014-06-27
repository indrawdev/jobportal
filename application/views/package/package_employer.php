<<<<<<< HEAD
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
                            $('#package').html(data.message.package);
                        }
                        else {
                        $('#loading').hide();
                        msg = '<div class="alert alert-success fade in">'+
                               '<a class="close" href="#" data-dismiss="alert">&times;</a>'+
                               '<strong>Success</strong>'+
                               '</div>'
                        $('#message').html(msg);
                         window.location="<?php echo root().'employer/postjob';?>";
                         
                        }
                
                }
		});
	});			
});
</script>

<div class="container">
  <form id="form" class="form-horizontal block-form post-job" method="post" action="<?php echo base_url().'employer/choosePackage';?>">
    <fieldset>
    <div class="row-fluid">
      <div class="span6">
        <div class="control-group">
          <label class="control-label" for="package"> Select Package <span class="required">*</span> </label>
          <div class="controls">
            <?php
			foreach($packages as $package) {
				echo '<label class="radio">';
				echo '<input type="radio" name="package" value="'.encrypt($package->slot).'">';
				echo '<p>'.$package->name.' - '.$package->description.'</p></label>';
			}
			?>
          </div>
        </div>
        <div id="package"></div>
      </div>
      <div class="span6">
        <legend>Information Package</legend>
        <?php
				foreach ($packages as $package) {
					echo '<p>'.$package->name.' - '.$package->description.' - Rp. '.$package->price.'</p>';
				}
			?>
      </div>
    </div>
    <div class="form-actions">
      <button id="btn" type="submit" class="btn btn-warning btn-large">Choose Package</button>
      <button type="button" class="btn btn-large">Cancel</button>
    </div>
=======
<div class="container">
  <form class="form-horizontal">
  <fieldset>
    <div class="row-fluid">
      <div class="span6">
      	<legend>Select a Package</legend>
        <label class="radio">
        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
        <p>FREE (3 Job Postings)</p>
        </label>
        <label class="radio">
        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
        <p>REGULAR (Resume Access + 10 Job Postings + Verified Account)</p>
        </label>
        <label class="radio">
        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
        <p>PRIORITY (Resume Access + 20 Job Postings + Verified Account)</p>
        </label>
      </div>
      <div class="span6"> 
      	<legend>Information Package</legend>
        	<p>1. Package 1</p>
            <p>2. Package 2</p>
            <p>3. Package 3</p>
      </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary btn-large">Choose Package</button>
        <button type="button" class="btn btn-large">Cancel</button>
      </div>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
    </fieldset>
  </form>
</div>
