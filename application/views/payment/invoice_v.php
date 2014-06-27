<<<<<<< HEAD
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.form.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/autoNumeric.js';?>"></script>
<script type="text/javascript">
 jQuery(function($) {
      $('.rupiah').autoNumeric('init');   
  });
</script>
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
<div class="container post-resume">
	<div class="row">
    	<div class="span12">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Date</th>
                  <th>Description</th>
<<<<<<< HEAD
                  <th>Total</th>
=======
                  <th>Amount</th>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
<<<<<<< HEAD
              <?php foreach($invoices as $invoice) : ?>
                <tr>
                  <td><?php echo $invoice->no_invoice; ?></td>
                  <td><?php echo $invoice->invoice_date; ?></td>
                  <td><?php echo $invoice->package_id; ?></td>
                  <td>
                  	<label for="amount" class="rupiah" data-a-sign="Rp. " data-a-dec="," data-a-sep="." style="font-weight:bold"><?php echo $invoice->total; ?></label>
                  </td>
                  <td><span class="label label-warning"><?php echo $invoice->status; ?></span></td>
=======
                <tr>
                  <td>1234567</td>
                  <td>02 Feb 2014</td>
                  <td>REGULAR (Resume Access + 10 Job Postings + Verified Account)</td>
                  <td>Rp. 150.000</td>
                  <td><span class="label label-warning">Pending</span></td>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
                  <td>
                  	<a href="#" class="btn btn-primary"><i class="icon-download icon-white"></i> Download PDF</a>
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