<<<<<<< HEAD
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.form.js';?>"></script>
<!--<script type="application/javascript">
$(document).ready(function() {
	reloadlist();
});
var loading = '<div class="row-fluid"><div class="span12 pagination-centered"><img src="<?php echo root()?>files/ajax-loader.gif"  /></div></div>';
function reloadlist()
{
	$('#list').html(loading);
	$.post("<?php echo root()?>payment",function(data) 
	{
		$('#list').html(data);
	});
}
</script>-->
<script type="text/javascript" src="<?php echo base_url().'assets/js/autoNumeric.js';?>"></script>
<!--<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#table').dataTable( {
		"bDestroy": true,
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	});
	
});
</script>-->
<script type="text/javascript">
 jQuery(function($) {
      $('.rupiah').autoNumeric('init');   
  });
</script>
<!--<script type="text/javascript">
var loading = '<div class="row-fluid"><div class="span12 pagination-centered"><img src="<?php echo root()?>files/ajax-loader.gif"  /></div></div>';
$(document).ready(function() {
	
			$('#btnadd').click(function(event) {
		
	     		event.preventDefault();
				
	 			
					mdl = $('#mdl_payment');
					mdl.modal('show');
					uri = $(this).attr('href');
					mdl.find("div[class=modal-body]").html(loading);
					$.post(uri,{ajax:true},function(data) {
  			 		mdl.find("div[class=modal-body]").html(data);
 					});
				
		   });
			
			acction = $('#table'); 
			acction.find('a').live("click",function(event) 
			{ 
					event.preventDefault();
					linkObj = $(this);
					uri = $(this).attr('uri');
					title = $(this).attr('title');
					dataid = $(this).attr('data-id');
					if (title=='Edit') 
					{						
						mdl = $('#mdl_payment');
						mdl.modal('show');
						mdl.find("div[class=modal-body]").html(loading);
							$.post(uri,{ajax:true},function(data) { // CONTAINER PARENT DIV NYA
									mdl.find("div[class=modal-body]").html(data);
 							});
					}
					else if(title=='Delete')
					{
						console.log('test jalan');
						var isDelete = confirm('Are you sure to delete data ?');
						if(isDelete)
						{
							$.ajax({
								url:uri,
								type:'POST',
								data: 'ajax=true',
								dataType: 'json',
								success: function( json ) {
										if(json.response == 'success')
										{
											$('#'+dataid).remove();
											reloadactivecart();
										}
										else
										{
											alert('No right click');
										}
									}
							});
					  	}
		          	}
 			});
		});
</script>-->
<div class="container post-resume">
	<div class="row">
    	<div class="span12">
        <div id="list">
            <table id="table" class="table table-bordered table-striped">
=======
<div class="container post-resume">
	<div class="row">
    	<div class="span12">
            <table class="table table-bordered table-striped">
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
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
              <?php foreach($payments as $payment) : ?>
                <tr>
                  <td><?php echo $payment->no_payment; ?></td>
                  <td><?php echo $payment->payment_date; ?></td>
                  <td><?php echo $payment->package_id; ?></td>
                  <td>
                  	<label for="amount" class="rupiah" data-a-sign="Rp. " data-a-dec="," data-a-sep="." style="font-weight:bold"><?php echo $payment->total; ?></label>
                  </td>
                  <td><span class="label label-warning"><?php echo $payment->status; ?></span></td>
                  <td>
                  	<a href="<?php echo base_url().'payment/';?>" class="btn btn-primary">Confirmation</a>
                  </td>
              <?php endforeach; ?> 
              </tbody>
            </table>
            </div>  
        </div>
    </div>
</div>

<!--<div id="mdl_payment" class="modal hide fade" style="display: none;">
    <div class="modal-header">
    <a class="dismiss close" data-dismiss="modal" rel="tooltip" data-original-title="Close" data-placement="bottom"><i class="close-medium"></i></a>
    <h3>xxx</h3>
    </div>
    <div class="modal-body">
		<div class="row-fluid">
			<div class="span12 pagination-centered"><img src="<?php echo root()?>files/ajax-loader.gif"  /></div>
        </div> 
	</div>
	<div class="modal-footer">
        <div class="row-fluid" id="loading" style="display:none">
             <div class="span12 pagination-centered">Saving <img src="<?php echo root()?>files/ajax-loader.gif"  />
   		</div>
    </div>
</div>-->
=======
                <tr>
                  <td>1234567</td>
                  <td>02 Feb 2014</td>
                  <td>REGULAR (Resume Access + 10 Job Postings + Verified Account)</td>
                  <td>Rp. 150.000</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>
                  	<a href="#" class="btn btn-primary disabled">Confirmation</a>
                  </td>
                </tr>
              </tbody>
            </table>   
        </div>
    </div>
</div>
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
