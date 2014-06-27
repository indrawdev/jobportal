<div class="container post-resume">
  <div class="row">
  	<div class="span12">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Title</th>
          <th>Resume ID</th>
          <th>Posted</th>
<<<<<<< HEAD
=======
          <th>Active</th>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
          <th>No of Views</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
<<<<<<< HEAD
      	<?php foreach($resumes as $resume) : ?>
        <tr>
          <td><a href="#"><?php echo $resume->title; ?></a></td>
          <td><?php echo $resume->number; ?></td>
          <td><?php echo $resume->posted; ?></td>
          <td><?php echo $resume->viewed; ?></td>
          <th><span class="label label-info"><?php echo $resume->status; ?></span></th>
=======
        <tr>
          <td><a href="#">My Resume</a></td>
          <td># 48400</td>
          <td>02 Feb 2014</td>
          <td>1</td>
          <td>2</td>
          <th><span class="label label-info">Active</span></th>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
          <td>
          		<a href="#" class="btn btn-primary">Active</a>
                <a href="#" class="btn">Deactive</a>
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
          </td>
        </tr>
<<<<<<< HEAD
        <?php endforeach; ?>
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
      </tbody>
    </table>
    </div>
  </div>
</div>
