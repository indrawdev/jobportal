<div class="container post-resume">
  <div class="row">
  	<div class="span12">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Title</th>
          <th>Resume ID</th>
          <th>Posted</th>
          <th>No of Views</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      	<?php foreach($resumes as $resume) : ?>
        <tr>
          <td><a href="#"><?php echo $resume->title; ?></a></td>
          <td><?php echo $resume->number; ?></td>
          <td><?php echo $resume->posted; ?></td>
          <td><?php echo $resume->viewed; ?></td>
          <th><span class="label label-info"><?php echo $resume->status; ?></span></th>
          <td>
          		<a href="#" class="btn btn-primary">Active</a>
                <a href="#" class="btn">Deactive</a>
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
</div>
