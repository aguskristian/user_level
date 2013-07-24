<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_position');?>
			<br></br>
    		
			<?php echo form_open_multipart('position/submit'); ?>
			<?php echo form_hidden('vp_code',$fvp_code); ?>
        
        
			<tr>
				<td> <strong><?php echo form_label('Position Code'); ?></strong></td>
				<td> <?php echo form_input('vp_code',$fvp_code,'id="vp_code"'); ?></td>
			</tr>
			
			<tr>
				<td> <strong><?php echo form_label('Position Name '); ?></strong></td>
				<td> <?php echo form_input('vp_name',$fvp_name,'id="vp_name"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Team Code '); ?></strong></td>
				<td> <?php echo form_input('vp_vt_code',$fvp_vt_code,'id="vp_vt_code"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Function Code '); ?></strong></td>
				<td> <?php echo form_input('vp_vf_code',$fvp_vf_code,'id="vp_vf_code"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Position Level'); ?></strong></td>
				<td> <?php echo form_input('vp_level',$fvp_level,'id="vp_level" '); ?></td>
			</tr>
			<br></br>
			 <tr>
				<td> <?php echo form_submit('update','Update','id="submit"'); echo form_close(); ?> </td>
			 </tr>
		
			<div class="clear"></div>
	</div>
	</article><!-- end of stats article -->
	
    <div id="extended-form-container"></div>
			
			<?php form_close(); ?>
		   
	<div class="clear"></div>
		<?php $this->load->view ('footer')?>
            
            

		</div>
			
    </article><!-- end of stats article -->
	
	
	
 <div class="clear"></div>