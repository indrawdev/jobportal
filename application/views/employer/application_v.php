<div class="container post-resume">
	<div class="row">
    	<div class="span12">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Date Applied</th>
                  <th>Job Title</th>
                  <th>Applicant's Name</th>
                  <th>Attached Resume</th>
                  <th>Status</th> 
                  <th>Actions</th>                  
                </tr>
              </thead>
              <tbody>
              <?php foreach($applications as $application) : ?>
                <tr>
                  <td><?php echo $application->posted; ?></td>
                  <td><?php echo $application->job_title; ?></td>
                  <td><?php echo $application->user_id; ?><br /> <a href="#">Send Private Message</a></td>
                  <td>My Resume</td>
                  <td><span class="label label-success"><?php echo $application->status; ?></span></td>
                  <td>
                    <a href="#" class="btn btn-danger">Delete</a>
                    <a href="#" class="btn btn-primary">Approve</a>
                    <a href="#" class="btn">Reject</a>
                  </td>
                </tr>
              <?php endforeach; ?>  
              </tbody>
            </table>   
        </div>
    </div>
</div>