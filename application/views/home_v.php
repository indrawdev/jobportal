<<<<<<< HEAD
<script type="text/javascript">
$(document).ready( function() {
		$('#btn_subscribe').click(function(event) {
			event.preventDefault();
			uri = $('#frm_subscribe').attr('action');
			$.ajax ({
				type: 'POST',
				url: uri,
				data: $('#frm_subscribe').serialize(),
				success: function(data) {
					if(data.response == 'failed') {	
						msg = ' <div class="alert alert-block  alert-error fade in">'+
							'<a class="close" href="#" data-dismiss="alert">&times;</a>'+
							'<strong>'+data.message+'</strong>'+
							'</div>'
							$('#msg_subscribe').html(msg);	
					}
					else
					{
						msg = ' <div class="alert alert-block  alert-success fade in">'+
							'<a class="close" href="#" data-dismiss="alert">&times;</a>'+
							'<strong>Thank You!</strong>'+
							'</div>'
							$('#msg_subscribe').html(msg);	
					}
				},
				dataType: "json"
			});
		});
	});
</script>
<div class="jumbotron masthead carousel slide">
    <ol class="carousel-indicators">
        <li data-slide-to="0" class="active"></li>
        <li data-slide-to="1"></li>
        <li data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active"><img src="<?php echo base_url().'assets/images/job-posting.jpg';?>" /></div>
        <div class="item"><img src="<?php echo base_url().'assets/images/resume-posting.jpg';?>" /></div>
        <div class="item"><img src="<?php echo base_url().'assets/images/cv-online.jpg';?>" /></div>
    </div>
</div>
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
<div class="container">
<div class="row-fluid">
	<div class="span9 offset1">
    	<div class="row-fluid">
        	<div class="span11 offset1">
            	<div class="row-fluid">
                	<div class="span5">
                    	<h3>I'm looking for...</h3>
                    </div>
                    <div class="span5">
                    	<h3>Location</h3>
                    </div>
                </div>
                <div class="row-fluid">
                	<div class="span5">
                    	<input class="span12 search_input" type="text" placeholder="What type of job are you looking for?">
                    </div>
                    <div class="span4">
<<<<<<< HEAD
                    	<select class="home_select" name="city">
                        	<option value=""> --- Select City --- </option>
                        	<?php foreach($cities as $city) {
									echo '<option value="'.$city->city_id.'"';
									echo '>'.$city->name.'</option>';
								}
							?>
=======
                    	<select class="home_select">
                            <option value="0">London</option>
                            <option value="0">Paris</option>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
                        </select>
                    </div>
                    <div class="span2">
                    	<a class="btn btn-primary btn-success btn-block" href="#">Search</a>
                    </div>
                </div>
            </div>
        </div>
        <br />
    	<div class="row-fluid">
        
        </div>
    </div>
</div>
  <div class="row-fluid">
    <div class="span9">
      <div class="row-fluid">
<<<<<<< HEAD
        <div class="span12 block-wrapper">
=======
        <div class="span12">
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
          <h2>Featured jobs</h2>
          <table class="table table-striped">
            <tbody>
              <tr>
                <td><span class="label label-warning">Full time</span> </td>
                <td><strong><a href="job/display">Mobile Software Engineer</a></strong><br />
                  <a href="#">Teleworm Corp</a> &ndash; Posted by <a href="#">Teleworm</a> </td>
                <td>Austin<br />
                  Texas, United States</td>
                <td > 10 Jan 2013</td>
              </tr>
              <tr>
                <td><span class="label label-success">Part time</span></td>
                <td><strong><a href="job/display">Lead UI Programmer</a></strong><br />
                  <a href="#">ArmySpy Corp</a> &ndash; Posted by <a href="#">ArmySpy</a> </td>
                <td>New York<br />
                  NY, United States</td>
                <td> 12 Jan 2013</td>
              </tr>
              <tr  class="">
                <td><span class="label label-info">Temporary</span></td>
                <td><strong><a href="job/display">PHP (Zend, Magento) Developer (Permanent)</a></strong><br />
                  <a href="#">DayRep Corp</a> &ndash; Posted by <a href="#">DayRep</a> </td>
                <td>Montreal<br />
                  QC, Canada</td>
                <td> 17 Jan 2013</td>
              </tr>
              <tr class="">
                <td><span class="label label-info">Temporary</span></td>
                <td><strong><a href="job/display">Node.js developer (6+ month project)</a></strong><br />
                  <a href="#">BioWare</a> &ndash; Posted by <a href="#">RevivalToys</a> </td>
                <td>London<br />
                  Tottenham, Great Britain</td>
                <td> 23 Jan 2013</td>
              </tr>
              <tr  class="">
                <td><span class="label label-inverse">Freelance</span></td>
                <td><strong><a href="job/display">Refrigeration Repair Technician</a></strong><br />
                  <a href="#">DietDisorder Corp</a> &ndash; Posted by <a href="#">DietDisorder</a> </td>
                <td>Cambridge<br />
                  Cambridge, Great Britain</td>
                <td> 23 Jan 2013</td>
              </tr>
              <tr  class="">
                <td><span class="label label-inverse">Freelance</span></td>
                <td><strong><a href="job/display">Senior Windows Administrator</a></strong><br />
                  <a href="#">BioWare</a> &ndash; Posted by <a href="#">RevivalToys</a> </td>
                <td>Hong Kong, China</td>
                <td> 23 Jan 2013</td>
              </tr>
            </tbody>
          </table>
<<<<<<< HEAD
            <div class="pagination">
                <ul>
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
      </div>
      <br />
      <div class="row-fluid">
        <div class="span12 block-wrapper">
=======
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
          <h2>Latest jobs</h2>
          <table class="table table-striped">
            <tbody>
              <tr>
                <td><span class="label label-success">Part time</span></td>
                <td><strong><a href="job/display">Refrigeration Repair Technician</a></strong><br />
                  <a href="#">Sears Corp</a> &ndash; Posted by <a href="#">appthemedemo</a> </td>
                <td>Austin<br />
                  Texas, United States</td>
                <td> 23 Jan 2013</td>
              </tr>
              <tr>
                <td><span class="label label-warning">Full time</span></td>
                <td><strong><a href="job/display">UI Developer</a></strong><br />
                  <a href="#">BioWare Intl</a> &ndash; Posted by <a href="#">Bio</a> </td>
                <td>New York<br />
                  NY, United States</td>
                <td> 23 Jan 2013</td>
              </tr>
              <tr>
                <td><span class="label label-success">Part time</span></td>
                <td><strong><a href="job/display">Refrigeration Repair Technician</a></strong><br />
                  <a href="#">Sears Corp</a> &ndash; Posted by <a href="#">Casino</a> </td>
                <td>London<br />
                  Tottenham, Great Britain</td>
                <td> 23 Jan 2013</td>
              </tr>
              <tr>
                <td><span class="label label-success">Part time</span></td>
                <td><strong><a href="job/display">Sr. Information Security Analyst</a></strong><br />
                  <a href="#">Pivotal Labs</a> &ndash; Posted by <a href="#">Paul Smith</a> </td>
                <td>Austin<br />
                  Texas, United States</td>
                <td> 23 Jan 2013</td>
              </tr>
              <tr>
                <td><span class="label label-inverse">Freelance</span></td>
                <td><strong><a href="job/display">Linux System Administrator</a></strong><br />
                  <a href="#">Poker Studios</a> &ndash; Posted by <a href="#">Moker man</a> </td>
                <td>London<br />
                  Tottenham, Great Britain</td>
                <td> 23 Jan 2013</td>
              </tr>
              <tr>
                <td><span class="label label-inverse">Freelance</span></td>
                <td><strong><a href="job/display">Front-end Developer</a></strong><br />
                  <a href="#">Scripts Snapper</a> &ndash; Posted by <a href="#">Snapper</a> </td>
                <td>Hong Kong, China</td>
                <td> 23 Jan 2013</td>
              </tr>
              <tr>
                <td><span class="label label-inverse">Freelance</span></td>
                <td><strong><a href="job/display">Software Developer PHP and/or C# and .NET</a></strong><br />
                  <a href="#">Sears Corp</a> &ndash; Posted by <a href="#">appthemedemo</a> </td>
                <td>Austin<br />
                  Texas, United States</td>
                <td> 23 Jan 2013</td>
              </tr>
            </tbody>
          </table>
<<<<<<< HEAD
          	<div class="pagination">
                <ul>
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
        </div>
      </div>
    </div>
    <div class="span3">
      <div class="row-fluid">
        <div class="span12">
          <h2></h2>
<<<<<<< HEAD
          <a class="btn btn-primary btn-large btn-block" href="<?php echo base_url().'employer/postjob'; ?>">Post a Job<br />
=======
          <a class="btn btn-primary btn-large btn-block" href="#">Post a Job<br />
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
          <small>(It's Free!)</small></a> </div>
      </div>
      <br />
      <h2>Browse jobs</h2>
      <div class="row-fluid">
<<<<<<< HEAD
        <div class="span12 block-wrapper">
          <select class="span12" id="category" name="category">
          	<option value=""> --- Select Category --- </option>
            <?php 
				foreach ($categories as $category) {
					echo '<option value="'.$category->category_id.'"';
					echo '>'.$category->name.'</option>';
				}
			?>
          </select>
          <select class="span12" id="type" name="type" >
          	<option value=""> --- Select Type --- </option>
            <?php 
				foreach ($types as $type) {
					echo '<option value="'.$type->type_id.'"';
					echo '>'.$type->name.'</option>';
				}
			?>
          </select>
          <select class="span12" id="salary" name="salary">
            <option value=""> --- Select Salary --- </option>
            <?php
				foreach ($salaries as $salary) {
					echo '<option value="'.$salary->salary_id.'"';
					echo '>'.$salary->monthly.'</option>';
				}
			?>
          </select>
          <select class="span12" id="posted" name="posted">
           	<option > --- Select Posted --- </option>
=======
        <div class="span12">
          <select class="span12" id="job_term_cat" name="job_term_cat">
            <option value="">Job category...</option>
            <option value="38" class="level-0">Automotive</option>
            <option value="43" class="level-1">&nbsp;&nbsp;&nbsp;Electrical</option>
            <option value="40" class="level-1">&nbsp;&nbsp;&nbsp;Inspection</option>
            <option value="41" class="level-1">&nbsp;&nbsp;&nbsp;Painting</option>
            <option value="39" class="level-1">&nbsp;&nbsp;&nbsp;Service</option>
            <option value="42" class="level-1">&nbsp;&nbsp;&nbsp;Upholstry</option>
            <option value="20" class="level-0">Construction</option>
            <option value="29" class="level-1">&nbsp;&nbsp;&nbsp;Carpenter</option>
            <option value="44" class="level-1">&nbsp;&nbsp;&nbsp;Electrician</option>
            <option value="34" class="level-1">&nbsp;&nbsp;&nbsp;Flooring</option>
            <option value="36" class="level-1">&nbsp;&nbsp;&nbsp;Foundation Repair</option>
            <option value="33" class="level-1">&nbsp;&nbsp;&nbsp;General Maintence</option>
            <option value="37" class="level-1">&nbsp;&nbsp;&nbsp;Inspections</option>
            <option value="35" class="level-1">&nbsp;&nbsp;&nbsp;Insulation</option>
            <option value="31" class="level-1">&nbsp;&nbsp;&nbsp;Mason</option>
            <option value="32" class="level-1">&nbsp;&nbsp;&nbsp;Painter</option>
            <option value="30" class="level-1">&nbsp;&nbsp;&nbsp;Plumber</option>
            <option value="50" class="level-0">Fashion</option>
            <option value="23" class="level-0">Food Service</option>
            <option value="24" class="level-1">&nbsp;&nbsp;&nbsp;Bartender</option>
            <option value="28" class="level-1">&nbsp;&nbsp;&nbsp;Cook</option>
            <option value="25" class="level-1">&nbsp;&nbsp;&nbsp;Hosting</option>
            <option value="26" class="level-1">&nbsp;&nbsp;&nbsp;Waiter</option>
            <option value="21" class="level-0">Insurance</option>
            <option value="22" class="level-0">Realtors</option>
            <option value="19" class="level-0">Technology</option>
            <option value="45" class="level-1">&nbsp;&nbsp;&nbsp;Engineering</option>
            <option value="46" class="level-1">&nbsp;&nbsp;&nbsp;Programming</option>
            <option value="47" class="level-1">&nbsp;&nbsp;&nbsp;Sys Admin</option>
          </select>
          <select id="job_type" name="job_type" class="span12" >
            <option>Job type...</option>
            <option>&nbsp;&nbsp;&nbsp;Freelance</option>
            <option>&nbsp;&nbsp;&nbsp;Full-Time</option>
            <option>&nbsp;&nbsp;&nbsp;Internship</option>
            <option>&nbsp;&nbsp;&nbsp;Part-Time</option>
            <option>&nbsp;&nbsp;&nbsp;Temporary</option>
          </select>
          <select class="span12" id="job_term_salary" name="job_term_salary">
            <option value="">Job salary...</option>
            <option value="9" class="level-0">&nbsp;&nbsp;&nbsp;Less than 20,000</option>
            <option value="10" class="level-0">&nbsp;&nbsp;&nbsp;20,000 &ndash; 40,000</option>
            <option value="11" class="level-0">&nbsp;&nbsp;&nbsp;40,000 &ndash; 60,000</option>
            <option value="12" class="level-0">&nbsp;&nbsp;&nbsp;60,000 &ndash; 80,000</option>
            <option value="13" class="level-0">&nbsp;&nbsp;&nbsp;80,000 &ndash; 100,000</option>
            <option value="14" class="level-0">&nbsp;&nbsp;&nbsp;100,000 and above</option>
          </select>
          <select class="span12" id="job_term_salary2" name="job_term_salary2">
            <option value="">Date posted...</option>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
            <option value="">Today</option>
            <option value="">This week</option>
            <option value="">Last week</option>
            <option value="">This month</option>
          </select>
          <a class="btn btn-large pull-right search_btn" href="#">Search</a> </div>
      </div>
    </div>
  </div>
<<<<<<< HEAD
  <div class="row-fluid">
  	<div class="container">
    	<div class="social_stuff">
        	<div class="widget span6">
            	<div class="twitter">
                    <div class="stat">
                        <a rel="nofollow" target="_blank" title="Follow us on Twitter!" href="#">
                            <span class="count">8.5k</span>
                            <span class="desc">Followers</span>
                        </a>
                    </div>
                </div>
                <div class="facebook">
                	<div class="stat">
                        <a rel="nofollow" target="_blank" title="Follow us on Facebook!" href="#">
                            <span class="count">7.8k</span>
                            <span class="desc">Followers</span>
                        </a>
                	</div>  
                </div>
                <div class="rss">
                	<div class="stat">
                        <a rel="nofollow" target="_blank" title="Follow us on Facebook!" href="#">
                            <span class="count">7.8k</span>
                            <span class="desc">Followers</span>
                        </a>
                	</div>                
                </div>
                <div class="email">
                	<div class="stat">
                        <a rel="nofollow" target="_blank" title="Follow us on Facebook!" href="#">
                            <span class="count">7.8k</span>
                            <span class="desc">Followers</span>
                        </a>
                	</div>                
                </div>
            </div>
            <div class="newsletter span6">
                <p><strong>We Hate Spam:</strong></p>
                <form id="frm_subscribe" class="form-horizontal span10" method="post" action="<?php echo base_url().'subscribe/submit'; ?>">
                    <input class="span9" type="text" placeholder="Email address" name="email">
                    <button id="btn_subscribe" class="btn btn-danger span3" type="submit" style="float:right">Subscribe</button> 
                </form>
                <div id="msg_subscribe"></div>
            </div>
        </div>
    </div>
  </div>
  
  <div class="row-fluid">
  	<!-- company logo -->
  </div>
  
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
</div>
