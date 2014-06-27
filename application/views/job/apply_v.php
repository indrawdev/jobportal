<script type="text/javascript" src="<?php echo root().'assets/js/jquery.form.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/tinymce/tinymce.min.js';?>"></script>
<script type="text/javascript">
tinymce.init({
    menubar:false,
    statusbar: false,
    selector: "textarea"
 });
</script>
<div class="container">
  <div class="row-fluid">
    <div class="span12">
  	<form id="form" class="form-horizontal post-resume" method="post" enctype="multipart/form-data" action="<?php echo base_url().'jobseeker/applyJob';?>">
      <div class="control-group">
        <label class="control-label" for="title">Select Resume</label>
        <div class="controls">
            <select name="resume" class="span12">
   				<?php 
					foreach ($resumes as $resume) {
						echo '<option value="'.$resume->resume_id.'"';
						echo '>'.$resume->title.'</option>';
					}
				?>         
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="title">Education</label>
        <div class="controls">
            <select name="education" class="span12">
   				<?php 
					foreach ($educations as $education) {
						echo '<option value="'.$education->education_id.'"';
						echo '>'.$education->name.'</option>';
					}
				?>         
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="title">Cover Letter</label>
        <div class="controls">
          <textarea rows="5" name="cover_letter" class="span12"></textarea>
        </div>
      </div>
    <div class="form-actions">
      <button id="btn" type="submit" class="btn btn-primary btn-large">Apply Job</button>
      <button type="button" class="btn btn-large">Cancel</button>
      <input type="hidden" name="job_id" value="" />
    </div>      
      </form>          
    </div>
  </div>
</div>
