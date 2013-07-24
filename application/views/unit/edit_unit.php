<article class="module width_full" >
		<div class="module_content">
			
		
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_unit');?>
			
			<?php echo form_open_multipart('unit/submit'); ?>
			<?php echo form_hidden('vu_code',$fvu_code); ?>
    		
			<tr>
				<td> <strong><?php echo form_label('Code Unit'); ?></strong></td>
				<td> <?php echo form_input('vu_code',$fvu_code,'id="vu_code"'); ?></td>
			</tr>
			
			<tr>
				<td> <strong><?php echo form_label('Unit Name '); ?></strong></td>
				<td> <?php echo form_input('vu_name',$fvu_name,'id="vu_name"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Station Code '); ?></strong></td>
				<td> <?php echo form_input('vu_vs_code',$fvu_vs_code,'id="vu_vs_code"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Unit Level'); ?></strong></td>
				<td> <?php echo form_input('vu_level',$fvu_level,'id="vu_level" '); ?></td>
			</tr>
			<br></br>
			 
			 <tr>
				<td> <?php echo form_submit('update','Update','id="submit"'); echo form_close(); ?> </td>
			 </tr>
			 


		
				<div class="clear"></div>
	</div>
	</article><!-- end of stats article -->
	
    <div id="extended-form-container"></div>
			

		   
	<div class="clear"></div>
		<?php $this->load->view ('footer')?>

 <div class="clear"></div>