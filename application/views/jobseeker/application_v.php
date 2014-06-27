
<div class="container post-resume">
	<div class="row">
    	<div class="span12">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Date Applied</th>
                  <th>Job Title</th>
                  <th>Company</th>
                  <th>Status</th>                   
                </tr>
              </thead>
              <tbody>
			  <?php foreach($applications as $application): ?>
                <tr>
                  <td><?php echo $application->date_applied; ?></td>
                  <td><?php echo $application->job_title; ?></td>
                  <td><?php echo $application->employer_id; ?> <br /> <a href="#">Send Private Message</a></td>
                  <td><span class="label label-success"><?php echo $application->status; ?></span></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>   
        </div>
    </div>
</div>