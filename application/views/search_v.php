<<<<<<< HEAD
<script type="text/javascript">
function lookupCity(comboProvince,idCity){var province_id=comboProvince.options[comboProvince.selectedIndex].value;var comboCity=document.getElementById(idCity);if(province_id==''){comboCity.innerHTML="";var Item2=new Option(" --- Select City --- ","");comboCity.options[comboCity.length]=Item2}else{comboCity.innerHTML="";var Item=new Option(" Loading... ","");comboCity.options[comboCity.length]=Item;$.ajax({url:'<?php echo root().'register/lookupcity'; ?>',type:'POST',data:'province_id='+province_id,dataType:'json',success:function(json){comboCity.innerHTML="";var Item=new Option(" --- Select City --- ","");comboCity.options[comboCity.length]=Item;$.each(json,function(i,item){var Item=new Option(item.value,item.key);comboCity.options[comboCity.length]=Item})}})}}
</script>
<div class="container">
	<form class="form-horizontal search-resumes">
		<div class="row-fluid">
			<div class="span12 block-form">
            <h2>Search Resumes</h2>
				<div class="control-group">
				  <label class="control-label" for="keywords">Keywords</label>
				  <div class="controls">
					<input type="text" id="keywords" placeholder="Keywords" class="span6">
=======
<div class="container">
	<form class="form-horizontal search-resumes">
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group">
				  <label class="control-label" for="keywords">Keywords</label>
				  <div class="controls">
					<input type="text" id="keywords" placeholder="Keywords" class="span10">
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="category">Category</label>
				  <div class="controls">
<<<<<<< HEAD
                    <select multiple="multiple" name="category" class="span6">
						<?php 
                            foreach ($categories as $category) {
                                echo '<option value="'.$category->category_id.'"';
                                echo '>'.$category->name.'</option>';
                            }
                        ?>
                    </select>
=======
					   <select multiple="multiple" class="span10">
						  <option>Accounting</option>
						  <option>Admin-Clerical</option>
						  <option>Automotive</option>
						  <option>Banking</option>
						  <option>Biotech</option>
						  <option>Business Development</option>
						  <option>Construction</option>
						  <option>Consultant</option>
						  <option>Customer Service</option>
						  <option>Design</option>
						  <option>Distribution-Shipping</option>
						  <option>Education</option>
						  <option>Engineering</option>
						  <option>Entry Level</option>
						  <option>Executive</option>
						  <option>Facilities</option>
						  <option>Finance</option>
						  <option>Franchise</option>
						  <option>General Business</option>
						  <option>General Labor</option>
						  <option>Government</option>
						  <option>Grocery</option>
						  <option>Health Care</option>
						  <option>Hospitality-Hotel</option>
						  <option>Human Resources</option>
						  <option>Information Technology</option>
						  <option>Installation-Maint-Repair</option>
						  <option>Insurance</option>
						  <option>Inventory</option>
						  <option>Legal</option>
						  <option>Management</option>
						  <option>Manufacturing</option>
						  <option>Marketing</option>
						  <option>Media-Journalism</option>
						  <option>Nonprofit-Social Services</option>
						  <option>Nurse</option>
						  <option>Other</option>
						  <option>Pharmaceutical</option>
						  <option>Professional Services</option>
						  <option>Purchasing-Procurement</option>
						  <option>QA-Quality Control</option>
						  <option>Real Estate</option>
						  <option>Research</option>
						  <option>Restaurant-Food Service</option>
						  <option>Retail</option>
						  <option>Sales</option>
						  <option>Skilled Labor</option>
						  <option>Strategy-Planning</option>
						  <option>Supply Chain</option>
						  <option>Telecommunications</option>
						  <option>Training</option>
						  <option>Transportation</option>
						  <option>Veterinary Services</option>
						  <option>Warehouse</option>
						</select>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="occupations">Occupations</label>
				  <div class="controls">
<<<<<<< HEAD
						<?php 
                            foreach($occupations as $occupation) {
                                echo '<label class="checkbox">';
                                echo '<input type="checkbox"';
                                echo 'value="'.$occupation->occupation_id.'">'.$occupation->name.'</label>';
                            }
                        ?>
=======
					<label class="checkbox">
					<input type="checkbox" id="inlineCheckbox1" value="option1">
					Accounting-Finance </label>
					<label class="checkbox">
					<input type="checkbox" id="inlineCheckbox2" value="option2">
					Administrative-Clerical </label>
					<label class="checkbox">
					<input type="checkbox" id="inlineCheckbox3" value="option3">
					Banking-Mortgage Professionals </label>
					<label class="checkbox">
					<input type="checkbox" id="inlineCheckbox3" value="option3">
					Biotech-R&D-Science </label>
					<label class="checkbox">
					<input type="checkbox" id="inlineCheckbox3" value="option3">
					Building Construction </label>
					<label class="checkbox">
					<input type="checkbox" id="inlineCheckbox3" value="option3">
					Business-Strategic Management </label>
					<label class="checkbox">
					<input type="checkbox" id="inlineCheckbox3" value="option3">
					Creative-Design </label>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="province">Province</label>
				  <div class="controls">
<<<<<<< HEAD
                    <select class="span6" name="province" onChange="lookupCity(this,'city');">
                    <option value=""> --- Select Province --- </option>
                        <?php 
                            foreach ($provinces as $province) {
                                echo '<option value="'.$province->province_id.'"';
                                echo '>'.$province->name.'</option>';
                            }
                        ?>
                    </select>
=======
					<select class="span10">
					  <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					</select>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="province">City</label>
				  <div class="controls">
<<<<<<< HEAD
                    <select id="city" class="span6" name="city">
                    	<option value=""> --- Select City --- </option>
                    </select>
=======
					<select class="span10">
					  <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					</select>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="province">Posted Within</label>
				  <div class="controls">
<<<<<<< HEAD
					<select class="span6">
=======
					<select class="span10">
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
					  <option>Any Date</option>
					  <option>Last 30 days</option>
					  <option>Last 7 days</option>
					  <option>Last 3 days</option>
					  <option>Since Yesterday</option>
					</select>
				  </div>
				</div>
<<<<<<< HEAD
            
            <div class="form-actions">
				<button class="btn btn-warning btn-large" type="submit">Search Resumes</button>
			</div>
			
            </div>
		</div>	
       </form>
=======
			</div>
			<div class="span6">
			
			</div>
		</div>
			<div class="form-actions">
				<button class="btn btn-primary btn-large" type="submit">Search Resumes</button>
			</div>
	</form>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
</div>