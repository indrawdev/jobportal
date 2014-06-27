<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.form.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/autoNumeric.js';?>"></script>
<script type="text/javascript">
 jQuery(function($) {
      $('.rupiah').autoNumeric('init');   
  });
</script>
<div class="container post-resume">
	<div class="row">
    	<div class="span12">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($invoices as $invoice) : ?>
                <tr>
                  <td><?php echo $invoice->no_invoice; ?></td>
                  <td><?php echo $invoice->invoice_date; ?></td>
                  <td><?php echo $invoice->package_id; ?></td>
                  <td>
                  	<label for="amount" class="rupiah" data-a-sign="Rp. " data-a-dec="," data-a-sep="." style="font-weight:bold"><?php echo $invoice->total; ?></label>
                  </td>
                  <td><span class="label label-warning"><?php echo $invoice->status; ?></span></td>
                  <td>
                  	<a href="#" class="btn btn-primary"><i class="icon-download icon-white"></i> Download PDF</a>
                  </td>
                </tr>
              <?php endforeach; ?>  
              </tbody>
            </table>   
        </div>
    </div>
</div>