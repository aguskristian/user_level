<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_subunit');?>
			<br></br>
    	
			<?php echo form_open_multipart('sub_unit/submit'); ?>
			<?php echo form_hidden('vsu_code',$fvsu_code); ?>
        
        
			<tr>
				<td> <strong><?php echo form_label('Sub Unit Code'); ?></strong></td>
				<td> <?php echo form_input('vsu_code',$fvsu_code,'id="vsu_code"'); ?></td>
			</tr>
			
			<tr>
				<td> <strong><?php echo form_label('Sub Unit Name '); ?></strong></td>
				<td> <?php echo form_input('vsu_name',$fvsu_name,'id="vsu_name"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Unit Code '); ?></strong></td>
				<td> <?php echo form_input('vsu_vu_code',$fvsu_vu_code,'id="vsu_vu_code"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Sub Unit Level'); ?></strong></td>
				<td> <?php echo form_input('vsu_level',$fvsu_level,'id="vsu_level" '); ?></td>
			</tr>
			
			<br></br>
			<tr>
				<td> <?php echo form_submit('submit','Update','id="submit"'); echo form_close(); ?> </td>
			</tr>

       
		
			<div class="clear"></div>
	</div>
	</article><!-- end of stats article -->
	
    <div id="extended-form-container"></div>
			
	<div class="clear"></div>
		<?php $this->load->view ('footer')?>
