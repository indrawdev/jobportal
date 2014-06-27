<div class="container post-resume">
	<div class="row">
    	<div class="span12">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>From</th>
                  <th>Subject</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($messages as $message): ?>
                <tr>
                  <td><?php echo $message->user_id_from; ?></td>
                  <td><?php echo $message->subject; ?></td>
                  <td><?php echo $message->date; ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>   
        </div>
    </div>
</div>