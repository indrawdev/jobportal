<script type="text/javascript">
function lookupCity(comboProvince,idCity){var province_id=comboProvince.options[comboProvince.selectedIndex].value;var comboCity=document.getElementById(idCity);if(province_id==''){comboCity.innerHTML="";var Item2=new Option(" --- Select City --- ","");comboCity.options[comboCity.length]=Item2}else{comboCity.innerHTML="";var Item=new Option(" Loading... ","");comboCity.options[comboCity.length]=Item;$.ajax({url:'<?php echo root().'register/lookupcity'; ?>',type:'POST',data:'province_id='+province_id,dataType:'json',success:function(json){comboCity.innerHTML="";var Item=new Option(" --- Select City --- ","");comboCity.options[comboCity.length]=Item;$.each(json,function(i,item){var Item=new Option(item.value,item.key);comboCity.options[comboCity.length]=Item})}})}}
</script>
<div class="container">
	<form class="form-horizontal find-jobs">
		<div class="row-fluid">
			<div class="span12 block-form">
            <h2>Find Jobs</h2>
				<div class="control-group">
				  <label class="control-label" for="keywords">Keywords</label>
				  <div class="controls">
					<input type="text" id="keywords" placeholder="Keywords" class="span6">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="category">Category</label>
				  <div class="controls">
                    <select multiple="multiple" name="category" class="span6">
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
				<div class="control-group">
				  <label class="control-label" for="province">Province</label>
				  <div class="controls">
                    <select class="span6" name="province" onChange="lookupCity(this,'city');">
                    <option value=""> --- Select Province --- </option>
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
				  <label class="control-label" for="province">City</label>
				  <div class="controls">
                    <select id="city" class="span6" name="city">
                    	<option value=""> --- Select City --- </option>
                    </select>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="type">Employment Type</label>
				  <div class="controls">
                    <select multiple="multiple" name="type" class="span6">
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
				  <label class="control-label" for="province">Posted Within</label>
				  <div class="controls">
					<select class="span6">
					  <option>Any Date</option>
					  <option>Last 30 days</option>
					  <option>Last 7 days</option>
					  <option>Last 3 days</option>
					  <option>Since Yesterday</option>
					</select>
				  </div>
				</div>
			<div class="form-actions">
				<button class="btn btn-warning btn-large" type="submit">Find Jobs</button>
			</div>
            
            </div>
		</div>
	</form>
</div>