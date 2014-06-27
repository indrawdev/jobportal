<div class="container">
	<div class="row-fluid">
    	<div class="span9">
        	<form id="form" class="form-horizontal post-resume" method="post" enctype="multipart/form-data" action="<?php echo base_url().'message/replyMessage'; ?>">
             <div class="control-group">
                <label class="control-label" for="name">Name</label>
                <div class="controls">
                	<input type="text" id="name" name="name" class="span10" value="">
                </div>
             </div>
             <div class="control-group">
                <label class="control-label" for="subject">Subject</label>
                <div class="controls">
                	<input type="text" id="subject" name="subject" class="span10" value="">
                </div>
             </div>    
             <div class="control-group">
                <label class="control-label" for="message">Message</label>
                <div class="controls">
                	<textarea rows="3" name="message" class="span10"></textarea>
                </div>
             </div>
             <div class="form-actions">
               <button id="btn" type="submit" class="btn btn-primary btn-large">Send Message</button>
               <button type="button" class="btn btn-large">Cancel</button>
             </div>                    
            </form>
        </div>
        <div class="span3"></div> 
    </div>
</div>