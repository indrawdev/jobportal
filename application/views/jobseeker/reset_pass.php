<div class="container">
  <div class="row-fluid">
    <div class="span3"></div>
    <div class="span6">
      <form id="form" class="form-horizontal block-form post-job" method="post" action="<?php echo base_url().'jobseeker/savePassword';?>">
        <h2 class="form-signin-heading">Change Password</h2>
        <div class="control-group">
          <label class="control-label" for="new_pass">New Password <span class="required">*</span></label>
          <div class="controls">
            <input class="span10" type="password" placeholder="New Password" name="new_pass">
            <div id="new_pass"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="confirm_pass">Confirm Password <span class="required">*</span></label>
          <div class="controls">
            <input class="span10" type="password" placeholder="Confirm Password" name="confirm_pass">
            <div id="confirm_pass"></div>
          </div>
        </div>
        <div class="form-actions">
          <button id="btn" class="btn btn-warning btn-large" type="submit">Save Changes</button>
          <button class="btn btn-large" type="reset">Cancel</button>
        </div>
      </form>
    </div>
    <div class="span3"></div>
  </div>
</div>
