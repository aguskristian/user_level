<article class="module width_full">
		<div class="module_content">
			
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_station');?>
			
			<br></br>
			<?php echo form_open_multipart('station/submit'); ?>
			<?php echo form_hidden('vs_code',$fvs_code); ?>
        
			<tr>
				<td> <strong><?php echo form_label('Code Station'); ?></strong></td>
				<td> <?php echo form_input('vs_code',$fvs_code,'id="vs_code"'); ?></td>
			</tr>
			
			<tr>
				<td> <strong><?php echo form_label('Station Name '); ?></strong></td>
				<td> <?php echo form_input('vs_name',$fvs_name,'id="vs_name"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Station Level'); ?></strong></td>
				<td> <?php echo form_input('vs_level',$fvs_level,'id="vs_level" '); ?></td>
			</tr>
			<br></br>
			
		<tr>	
			
				<td> <?php echo form_submit('update','UPDATE','id="submit"'); echo form_close(); ?> </td>
			
		</tr>

       
		
			<div class="clear"></div>
	</div>
	</article><!-- end of stats article -->
	
    <div id="extended-form-container"></div>
			
		   
	<div class="clear"></div>
		<?php $this->load->view ('footer')?>

 <div class="clear"></div>