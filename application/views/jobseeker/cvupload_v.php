<div class="container">
  <div class="row-fluid">
    <div class="span8">
      <form id="form" class="form-horizontal block-form cvupload" method="post" enctype="multipart/form-data" action="<?php echo base_url().'jobseeker/uploadNow';?>">
          <h2>CV Upload</h2>
        <div class="control-group">
          <label class="control-label" for="job_title">Desired Job Title <span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="job_title" placeholder="Job Title" class="span6" required>
            <div id="job_title"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="job_title">Attach your CV <span class="required">*</span></label>
          <div class="controls">
            <div class="span5">
              <ul class="nav nav-list bs-docs-sidenav" style="margin: 0;">
                <li class=""> <a href="#"> <i class="icon-chevron-right"></i> <img src="<?php echo base_url().'assets/icon/folder-icon.png'; ?>" /> Browse for File
                  <input type="file" name="file" placeholder="File" class="span10">
                  </a> </li>
                <li class=""> <a href=""> <i class="icon-chevron-right"></i> <img src="<?php echo base_url().'assets/icon/dropbox-icon.png'; ?>" /> Choose from Dropbox </a> </li>
                <li class=""> <a href=""> <i class="icon-chevron-right"></i> <img src="<?php echo base_url().'assets/icon/googledrive-icon.png'; ?>" /> Choose from Google Drive </a> </li>
              </ul>
            </div>
            <div id="attach_cv"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="privacy">Privacy Settings <span class="required">*</span></label>
          <div class="controls">
            <label class="radio">
            <input type="radio" name="privacy" value="1" checked>
            <strong>Public :</strong> Allow employers to see my CV and contact information. </label>
            <label class="radio">
            <input type="radio" name="privacy" value="2">
            <strong>Anonymous :</strong> Allow employers to see my CV, but keep my contact information private. </label>
            <label class="radio">
            <input type="radio" name="privacy" value="3">
            <strong>Private :</strong> Keep my CV and contact information private. </label>
            <div id="privacy"></div>
          </div>
        </div>
        <div class="form-actions">
          <button id="btn" type="submit" class="btn btn-warning btn-large">Upload Now</button>
          <button type="reset" class="btn btn-large">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
