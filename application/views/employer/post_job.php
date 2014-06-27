<script type="text/javascript">
function lookupCity(comboProvince,idCity){var province_id=comboProvince.options[comboProvince.selectedIndex].value;var comboCity=document.getElementById(idCity);if(province_id==''){comboCity.innerHTML="";var Item2=new Option(" --- Select City --- ","");comboCity.options[comboCity.length]=Item2}else{comboCity.innerHTML="";var Item=new Option(" Loading... ","");comboCity.options[comboCity.length]=Item;$.ajax({url:'<?php echo root().'employer/lookupcity'; ?>',type:'POST',data:'province_id='+province_id,dataType:'json',success:function(json){comboCity.innerHTML="";var Item=new Option(" --- Select City --- ","");comboCity.options[comboCity.length]=Item;$.each(json,function(i,item){var Item=new Option(item.value,item.key);comboCity.options[comboCity.length]=Item})}})}}
</script>
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
							$('#city_error').html(data.message.city);
							$('#email').html(data.message.email);
                        }
                        else {
                        $('#loading').hide();
                        msg = '<div class="alert alert-success fade in">'+
                               '<a class="close" href="#" data-dismiss="alert">&times;</a>'+
                               '<strong>Success</strong>'+
                               '</div>'
                        $('#message').html(msg);
                         //window.location="<?php echo root();?>";
                         
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
<script type="text/javascript" src="<?php echo base_url().'assets/js/tinymce/tinymce.min.js';?>"></script>
<script type="text/javascript">
tinymce.init({
    menubar:false,
    statusbar: false,
    selector: "textarea"
 });
</script>
<div class="container">
  <form id="form" class="form-horizontal block-form post-job" method="post" enctype="multipart/form-data" action="<?php echo base_url().'employer/saveJob';?>">
  <h2 class="form-signin-heading">Post a Job</h2>
  <br />
    <div class="row-fluid">
      <div class="span5">
        <div class="control-group">
          <label class="control-label" for="title">Title <span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="title" placeholder="Job Title" class="span12">
            <div id="title"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="category">Category <span class="required">*</span></label>
          <div class="controls">
            <select multiple="multiple" name="category[]" class="span12">
				<?php 
					foreach ($categories as $category) {
						echo '<option value="'.$category->category_id.'"';
						echo '>'.$category->name.'</option>';
					}
				?>
            </select>
            <div id="category"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="occupations">Occupations <span class="required">*</span></label>
          <div class="controls">
				<?php 
                     foreach($occupations as $occupation) {
                          echo '<label class="checkbox">';
                          echo '<input name="occupation[]" type="checkbox"';
                          echo 'value="'.$occupation->occupation_id.'">'.$occupation->name.'</label>';
                     }
                 ?>
                 <div id="occupations"></div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="control-group">
          <label class="control-label" for="type">Employment Type <span class="required">*</span></label>
          <div class="controls">
            <select multiple="multiple" name="type[]" class="span12">
				<?php 
					foreach ($types as $type) {
						echo '<option value="'.$type->type_id.'"';
						echo '>'.$type->name.'</option>';
					}
				?>
            </select>
            <div id="type"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="jobdesc">Job Description <span class="required">*</span></label>
          <div class="controls">
            <textarea rows="5" name="jobdesc" class="span12"></textarea>
            <div id="jobdesc"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="requirements">Job Requirements <span class="required">*</span></label>
          <div class="controls">
            <textarea rows="5" name="requirements" class="span12"></textarea>
            <div id="requirements"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="salary">Salary</label>
          <div class="controls">
            <select name="salary" class="span12">
                <option value=""> --- Select Salary --- </option>
                <?php
                    foreach ($salaries as $salary) {
                        echo '<option value="'.$salary->salary_id.'"';
                        echo '>'.$salary->monthly.'</option>';
                    }
                ?>
            </select>
            <div id="salary"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="province">Province <span class="required">*</span></label>
          <div class="controls">
            <select class="span12" name="province" onChange="lookupCity(this,'city');">
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
            <select id="city" class="span12" name="city">
            	<option value=""> --- Select City --- </option>
            </select>
            <div id="city_error"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="zipcode">Zip Code</label>
          <div class="controls">
            <input class="span12" type="text" name="zipcode" maxlength="5" onKeyPress="return isNumberKey(event)" placeholder="Zip Code">
            <div id="zipcode"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="email">Send applications to this e-mail <span class="required">*</span></label>
          <div class="controls">
            <input class="span12" type="email" name="email" placeholder="Email">
            <div id="email"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="url">Redirect to this URL</label>
          <div class="controls">
            <input class="span12" type="text" name="url" placeholder="URL">
            <div id="url"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="province">Add Pictures</label>
          <div class="controls">
            <input type="file" name="picture">
            <div id="picture"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-actions">
      <button id="btn" type="submit" class="btn btn-warning btn-large" data-loading-text="Please wait...">Post a Job</button>
      <button type="button" class="btn btn-large">Cancel</button>
      <input type="hidden" name="package_id" value="">
    </div>
  </form>
</div>