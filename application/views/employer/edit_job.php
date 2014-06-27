<script type="text/javascript" src="<?php echo root().'assets/js/jquery.form.js';?>"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#btn').click(function(event){
		var btn = $(this);
        var css =  btn.attr("class");
        var text = btn.html();
        
        btn.html("Please wait...");
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
                            $('#title').html(data.message.title);
                            $('#category').html(data.message.category);
                            $('#occupations').html(data.message.occupations);
                            $('#type').html(data.message.type);
                            $('#jobdesc').html(data.message.jobdesc);
							$('#requirements').html(data.message.requirements);
							$('#province').html(data.message.province);
							$('#city').html(data.message.city);
							$('#email').html(data.message.email);
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
</script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/tinymce/tinymce.min.js';?>"></script>
<script type="text/javascript">
tinymce.init({
    menubar:false,
    statusbar: false,
    selector: "textarea"
 });
</script>
<div class="container">
  <form id="form" class="form-horizontal post-job" method="post" enctype="multipart/form-data" action="<?php echo base_url().'employer/saveJob';?>">
    <div class="row-fluid">
      <div class="span6">
        <div class="control-group">
          <label class="control-label" for="title">Title</label>
          <div class="controls">
            <input type="text" id="title" name="title" placeholder="Job Title" class="span12">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="category">Category</label>
          <div class="controls">
            <select multiple="multiple" name="category" class="span12">
				<?php 
					foreach ($categories as $category) {
						echo '<option value="'.$category->category_id.'"';
						echo '>'.$category->name.'</option>';
					}
				?>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="occupations">Occupations</label>
          <div class="controls">
				<?php 
                     foreach($occupations as $occupation) {
                          echo '<label class="checkbox">';
                          echo '<input type="checkbox"';
                          echo 'value="'.$occupation->occupation_id.'">'.$occupation->name.'</label>';
                     }
                 ?>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="control-group">
          <label class="control-label" for="type">Employment Type</label>
          <div class="controls">
            <select multiple="multiple" name="type" class="span12">
				<?php 
					foreach ($types as $type) {
						echo '<option value="'.$type->type_id.'"';
						echo '>'.$type->name.'</option>';
					}
				?>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="jobdesc">Job Description</label>
          <div class="controls">
            <textarea rows="5" name="jobdesc" class="span12"></textarea>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="requirements">Job Requirements</label>
          <div class="controls">
            <textarea rows="5" name="requirements" class="span12"></textarea>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="salary">Salary</label>
          <div class="controls">
            <select name="salary" class="span12">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="province">Province</label>
          <div class="controls">
            <select name="province" class="span12">
				<?php 
					foreach ($provinces as $province) {
						echo '<option value="'.$province->province_id.'"';
						echo '>'.$province->name.'</option>';
					}
				?>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="city">City</label>
          <div class="controls">
            <select name="city" class="span12">
				<?php 
					foreach ($cities as $city) {
						echo '<option value="'.$city->city_id.'"';
						echo '>'.$city->name.'</option>';
					}
				?>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="zipcode">Zip Code</label>
          <div class="controls">
            <input name="zipcode" type="text" class="input-mini" placeholder="Zip Code">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="email">Send applications to this e-mail</label>
          <div class="controls">
            <input type="email" name="email" placeholder="Email">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="url">Redirect to this URL</label>
          <div class="controls">
            <input type="text" name="url" placeholder="URL">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="province">Add Pictures</label>
          <div class="controls">
            <input type="file" name="picture">
          </div>
        </div>
      </div>
    </div>
    <div class="form-actions">
      <button id="btn" type="submit" class="btn btn-primary btn-large" data-loading-text="Please wait...">Post a Job</button>
      <button type="button" class="btn btn-large">Cancel</button>
      <input type="hidden" name="job_id" value="<?php echo encrypt($job->job_id); ?>">
      <input type="hidden" name="package_id" value="<?php echo encrypt(); ?>">
    </div>
  </form>
</div>