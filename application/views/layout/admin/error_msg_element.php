<div class="custom_msg"><span></span><div class="delete-icon">Delete</div></div>
            
<?php 
$msg = '';
//echo $this->session->flashdata('custom_msg_succ');die;
if($this->session->flashdata('custom_msg_succ')){
	$msg = $this->session->flashdata('custom_msg_succ');
?>
	<script>
	$(window).load(function(){
		show_custom_msg("<?php echo $msg; ?>",'succ');
	});
	</script>
<?php
}else if($this->session->flashdata('custom_msg_error')){
	$msg = $this->session->flashdata('custom_msg_error');
?>
	<script>
	$(window).load(function(){
		show_custom_msg("<?php echo $msg; ?>",'error');
	});
	</script>
<?php
}
?>
