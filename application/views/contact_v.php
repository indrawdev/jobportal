<script type="text/javascript" src="<?php echo root().'assets/js/jquery.form.js';?>"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#btn").click(function (e) {
        var t = $(this);
        var n = t.attr("class");
        var r = t.html();
        t.html("Please wait..");
        t.attr("class", "btn btn-large btn-block disabled");
        t.attr("disabled", "disabled");
        $("#loading").show();
        e.preventDefault();
        $("#form").ajaxSubmit({
            dataType: "json",
            complete: function (e) {
                t.attr("class", n);
                t.html(r)
            },
            success: function (e) {
                t.attr("class", n);
                t.html(r);
                t.removeAttr("disabled");
                if (e.response == "failed") {
                    $("#loading").hide();
                    $("#name").html(e.message.name);
                    $("#subject").html(e.message.subject);
                    $("#phone").html(e.message.phone);
                    $("#email").html(e.message.email);
					$("#level").html(e.message.email);
                    $("#message").html(e.message.message)
                } else {
                    $("#loading").hide();
                    msg = '<div class="alert alert-success fade in">' + '<a class="close" href="#" data-dismiss="alert">&times;</a>' + "<strong>Success</strong>" + "</div>";
                    $("#msg").html(msg)
                }
            }
        })
    })
})
	function isNumberKey(evt) {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
	}
</script>
<div class="container">
	<div class="row-fluid">
    	<form id="form" class="form-horizontal post-job" method="post" action="<?php echo base_url().'contact/submitMessage'; ?>">
            <div class="span12 block-form">
            <h2 class="form-signin-heading">Contact</h2>
               <div class="control-group">
                    <label class="control-label" for="name">Name <span class="required">*</span></label>
                    <div class="controls">
                    	<input type="text" name="name" placeholder="Name" class="span10">
                        <div id="name"></div>
                    </div>
               </div>
               <div class="control-group">
                    <label class="control-label" for="subject">Subject <span class="required">*</span></label>
                    <div class="controls">
                    	<input type="text" name="subject" placeholder="Subject" class="span10">
                        <div id="subject"></div>
                    </div>
               </div>
               <div class="control-group">
                    <label class="control-label" for="phone">Phone <span class="required">*</span></label>
                    <div class="controls">
                    	<input type="text" name="phone" maxlength="13" onKeyPress="return isNumberKey(event)" placeholder="Phone" class="span10">
                        <div id="phone"></div>
                    </div>
               </div>
               <div class="control-group">
                    <label class="control-label" for="email">Email <span class="required">*</span></label>
                    <div class="controls">
                    	<input type="text" name="email" placeholder="Email" class="span10">
                        <div id="email"></div>
                    </div>
               </div>               
               <div class="control-group">
                    <label class="control-label" for="level">Who are You? <span class="required">*</span></label>
                    <div class="controls">
                        <select name="level" class="span10">
                        	<option value=""> --- Please Select --- </option>
                            <?php 
                                foreach ($levels as $level) {
                                    echo '<option value="'.encrypt($level->level_id).'"';
                                    echo '>'.$level->name.'</option>';
                                }
                            ?>
                        </select>
                        <div id="level"></div>
                    </div>
               </div>                             
               <div class="control-group">
                    <label class="control-label" for="message">Message <span class="required">*</span></label>
                    <div class="controls">
                        <textarea rows="5" name="message" class="span10"></textarea>
                        <div id="message"></div>
                    </div>
               </div>
               <!--<div class="control-group">
                    <label class="control-label" for="captcha">Captcha</label>
                    <div class="controls">
                    <?php echo $captcha; ?>
                        <input id="captcha" name="captcha" type="text" />
                        <div id="captcha"></div>
                    </div>
               </div>-->               
               <div class="form-actions">
                  <button id="btn" type="submit" class="btn btn-primary btn-large">Send Message</button>
               </div>
            </div>
            </form>
    </div>
</div>