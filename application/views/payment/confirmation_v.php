<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.form.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/autoNumeric.js';?>"></script>
<script type="text/javascript">
jQuery(function($) {
      $('.rupiah').autoNumeric('init');   
});
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#btn').click(function(event){
		var btn = $(this);
        var css =  btn.attr("class");
        var text = btn.html();
        
        btn.html("Please wait..");
        btn.attr("class","btn btn-large btn-block disabled");
		btn.attr("disabled", "disabled");
    	$('#loading').show();
        event.preventDefault();
		$('#form').ajaxSubmit({ 
                dataType: "json", 
                complete: function(data) {
                     btn.attr("class",css);
                     btn.html(text);
                },
                success: function(data) {
                    
                     btn.attr("class",css);
                     btn.html(text);
                     btn.removeAttr("disabled");
                        if(data.response == 'failed') {
                            $('#loading').hide();
                            $('#transfer_method').html(data.message.transfer_method);
							$('#total').html(data.message.total);
							$('#to_bank').html(data.message.to_bank);
							$('#from_bank').html(data.message.from_bank);
							$('#name').html(data.message.name);
							$('#account').html(data.message.account);
                        }
                        else {
                        $('#loading').hide();
                        msg = '<div class="alert alert-success fade in">'+
                               '<a class="close" href="#" data-dismiss="alert">&times;</a>'+
                               '<strong>Success</strong>'+
                               '</div>'
                        $('#message').html(msg);
                         window.location="<?php echo root();?>";
                         
                        }
                
                }
		});
	});			
});
	function isNumberKey(evt) {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
	}
</script>

<div class="container">
  <div class="row-fluid">
    <div class="span3"></div>
    <div class="span6">
      <form id="form" class="form-horizontal block-form post-job" method="post" enctype="multipart/form-data" action="<?php echo base_url().'payment/submitConfirmation';?>">
        <h2 class="form-signin-heading">Confirmation</h2>
        <div class="control-group">
          <label class="control-label" for="transfer_method">Transfer Method <span class="required">*</span></label>
          <div class="controls">
             <select class="span10" name="transfer_method">
             	<option value=""> --- Transfer Melalui --- </option>
            	<?php foreach($methods as $method) {
					echo '<option value="'.encrypt($method->transfer_method_id).'"';
					echo '>'.$method->name.'</option>';
					}
				?>
            </select>
            <div id="transfer_method"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="total">Total Transfer <span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="total" placeholder="Total" class="rupiah span10" data-a-sign="Rp. " data-a-dec="," data-a-sep=".">
            <div id="total"></div>
          </div>
        </div>        
        <div class="control-group">
          <label class="control-label" for="to_bank">To Bank <span class="required">*</span></label>
          <div class="controls">
            <select class="span10" name="to_bank">
            	<option value=""> --- Ke Rekening --- </option>
            	<?php foreach($recs as $rec) {
					echo '<option value="'.encrypt($rec->rec_id).'"';
					echo '>'.$rec->name.'</option>';
					}
				?>
            </select>
            <div id="to_bank"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="from_bank">From Bank <span class="required">*</span></label>
          <div class="controls">
            <select class="span10" name="from_bank">
            	<option value=""> --- Dari Bank --- </option>
            	<?php foreach($banks as $bank) {
					echo '<option value="'.encrypt($bank->bank_id).'"';
					echo '>'.$bank->name.'</option>';
					}
				?>
            </select>
            <div id="from_bank"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="name">Your Name <span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="name" placeholder="Your Name" class="span10">
            <div id="name"></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="account">Account Number <span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="account" onKeyPress="return isNumberKey(event)" placeholder="Account Number" class="span10">
            <div id="account"></div>
          </div>
        </div>                      
        <div class="form-actions">
          <button id="btn" type="submit" class="btn btn-warning btn-large">Confirmation</button>
          <button type="reset" class="btn btn-large">Cancel</button>
          <input type="hidden" name="no_payment" value="">
          <!--<input type="hidden" name="payment_id" value="<?php echo encrypt($payment->payment_id); ?>">
          <input type="hidden" name="invoice_id" value="<?php echo encrypt($invoice->invoice_id); ?>">-->
        </div>
      </form>
    </div>
    <div class="span3"></div>
  </div>
</div>
