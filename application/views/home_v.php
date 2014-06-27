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
                    	<select class="home_select" name="city">
                        	<option value=""> --- Select City --- </option>
                        	<?php foreach($cities as $city) {
									echo '<option value="'.$city->city_id.'"';
									echo '>'.$city->name.'</option>';
								}
							?>
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
        <div class="span12 block-wrapper">
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
    </div>
    <div class="span3">
      <div class="row-fluid">
        <div class="span12">
          <h2></h2>
          <a class="btn btn-primary btn-large btn-block" href="<?php echo base_url().'employer/postjob'; ?>">Post a Job<br />
          <small>(It's Free!)</small></a> </div>
      </div>
      <br />
      <h2>Browse jobs</h2>
      <div class="row-fluid">
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
            <option value="">Today</option>
            <option value="">This week</option>
            <option value="">Last week</option>
            <option value="">This month</option>
          </select>
          <a class="btn btn-large pull-right search_btn" href="#">Search</a> </div>
      </div>
    </div>
  </div>
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
  
</div>
