<div class="container">
	<div class="row-fluid">
		<div class="span12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Slot</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $user->user_id; ?></td>
                  <td><?php echo $user->email; ?></td>
                  <td><?php echo $user->level_id; ?></td>
                  <td><?php echo $user->slot; ?></td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>