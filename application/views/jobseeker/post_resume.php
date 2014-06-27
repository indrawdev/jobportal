<script type="text/javascript">
function lookupCity(comboProvince,idCity){var province_id=comboProvince.options[comboProvince.selectedIndex].value;var comboCity=document.getElementById(idCity);if(province_id==''){comboCity.innerHTML="";var Item2=new Option(" --- Select City --- ","");comboCity.options[comboCity.length]=Item2}else{comboCity.innerHTML="";var Item=new Option(" Loading... ","");comboCity.options[comboCity.length]=Item;$.ajax({url:'<?php echo root().'jobseeker/lookupcity'; ?>',type:'POST',data:'province_id='+province_id,dataType:'json',success:function(json){comboCity.innerHTML="";var Item=new Option(" --- Select City --- ","");comboCity.options[comboCity.length]=Item;$.each(json,function(i,item){var Item=new Option(item.value,item.key);comboCity.options[comboCity.length]=Item})}})}}
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
                            $('#title').html(data.message.title);
                            $('#category').html(data.message.category);
                            $('#occupations').html(data.message.occupations);
                            $('#type').html(data.message.type);
                            $('#objective').html(data.message.objective);
							$('#skills').html(data.message.skills);
							$('#province').html(data.message.province);
							$('#city_error').html(data.message.city);
							$('#salary').html(data.message.salary);
							$('#photo').html(data.message.photo);
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
<script type="text/javascript" src="<?php echo base_url().'assets/js/tinymce/tinymce.min.js';?>"></script>
<script type="text/javascript">
tinymce.init({
    menubar:false,
    statusbar: false,
    selector: "textarea"
 });
</script>

<div class="container">
  <form id="form" class="form-horizontal block-form post-resume" method="post" enctype="multipart/form-data" action="<?php echo base_url().'jobseeker/saveResume';?>">
    <h2 class="form-signin-heading">Post Resume</h2>
    <br />
    <div class="row-fluid">
      <div class="span5">
        <div class="control-group">
          <label class="control-label" for="title">Title <span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="title" placeholder="Resume Title" class="span12">
            <div id="title"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="category">Category <span class="required">*</span></label>
          <div class="controls">
            <select multiple="multiple" name="category" class="span12">
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
                        echo '<input type="checkbox"';
                        echo 'value="'.$occupation->occupation_id.'">'.$occupation->name.'</label>';
                    }
                 ?>
            <div id="occupations"></div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="control-group">
          <label class="control-label" for="type">Job Type <span class="required">*</span></label>
          <div class="controls">
            <select multiple="multiple" name="type" class="span12">
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
          <label class="control-label" for="objective">Objective <span class="required">*</span></label>
          <div class="controls">
            <textarea rows="5" name="objective" class="span12"></textarea>
            <div id="objective"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="skills">Skills <span class="required">*</span></label>
          <div class="controls">
            <textarea rows="5" name="skills" class="span12"></textarea>
            <div id="skills"></div>
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
          <label class="control-label" for="salary">Salary</label>
          <div class="controls">
            <select class="span12" name="salary">
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
          <label class="control-label" for="photo">Add Photo <span class="required">*</span></label>
          <div class="controls">
            <input class="" type="file" name="photo">
            <div id="photo"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-actions">
      <button id="btn" type="submit" class="btn btn-warning btn-large">Post a Resume</button>
      <button type="button" class="btn btn-large">Cancel</button>
      <input type="hidden" name="package_id" value="">
    </div>
  </form>
</div>
