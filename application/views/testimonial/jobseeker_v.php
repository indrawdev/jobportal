<script type="text/javascript" src="<?php echo root().'assets/js/jquery.form.js';?>"></script>
<script type="text/javascript" src="<?php echo root().'assets/js/jquery.tinylimiter.js';?>"></script>
<script type="text/javascript">

</script>
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
                            $('#content').html(data.message.content);
                        }
                        else {
                        $('#loading').hide();
                        msg = '<div class="alert alert-success fade in">'+
                               '<a class="close" href="#" data-dismiss="alert">&times;</a>'+
                               '<strong>Success</strong>'+
                               '</div>'
                        $('#msg').html(msg);
                         
                        }
                
                }
		});
	});			
});
</script>

<div class="container">
  <div class="row-fluid">
    <div class="span10">
      <form id="form" class="form-horizontal block-form post-job" method="post" action="<?php echo base_url().'jobseeker/submitTestimonial';?>">
        <h2 class="form-signin-heading">Testimonial</h2>
        <div id="msg"></div>
        <div class="control-group">
          <label class="control-label" for="content">Your Testimonial</label>
          <div class="controls">
            <textarea id="text" rows="5" name="content" class="span10"></textarea>
            <div id="content"></div>
            <div id="chars"></div>
          </div>
        </div>
        <div class="form-actions">
          <button id="btn" type="submit" class="btn btn-warning btn-large">Submit Testimonial</button>
          <button type="reset" class="btn btn-large">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
