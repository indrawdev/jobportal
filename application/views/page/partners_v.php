<script type="text/javascript" src="<?php echo base_url().'assets/js/autoNumeric.js';?>"></script>
<script type="text/javascript">
 jQuery(function($) {
      $('.rupiah').autoNumeric('init');   
  });
</script>
<div class="container">
	<div class="row-fluid">
        <div class="span12">
			<h2>Jenis Paket</h2>
          	<p>Pilih Paket</p>
          <table class="table table-bordered table-striped">
            <colgroup>
              <col class="span1">
              <col class="span7">
            </colgroup>
            <thead>
              <tr>
                <th>Jenis Paket</th>
                <th>Informasi</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>
              	<?php foreach($employers as $employer) {
					echo '<tr>';
                    echo '<td>'.$employer->name.'</td>';
                    echo '<td>'.$employer->description.'</td>';
                    echo '<td><label for="amount" class="rupiah" data-a-sign="Rp. " data-a-dec="," data-a-sep="." style="font-weight:bold">'.$employer->price.'</label></td>';
					echo '</tr>';
					} 
                 ?>
            </tbody>
          </table>
          
          <table class="table table-bordered table-striped">
            <colgroup>
              <col class="span1">
              <col class="span7">
            </colgroup>
            <thead>
              <tr>
                <th>Jenis Paket</th>
                <th>Informasi</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>
              	<?php foreach($jobseekers as $jobseeker) {
					echo '<tr>';
                    echo '<td>'.$jobseeker->name.'</td>';
                    echo '<td>'.$jobseeker->description.'</td>';
                    echo '<td><label for="amount" class="rupiah" data-a-sign="Rp. " data-a-dec="," data-a-sep="." style="font-weight:bold">'.$jobseeker->price.'</label></td>';
					echo '</tr>';
					} 
                 ?>
            </tbody>
          </table>          
        </div>
    </div>
</div>