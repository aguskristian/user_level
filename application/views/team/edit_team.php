<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_team');?>
			<br></br>
			
			<?php echo form_open_multipart('team/submit'); ?>
			<?php echo form_hidden('vt_code',$fvt_code); ?>
        
			<tr>
				<td> <strong><?php echo form_label('Team Code'); ?></strong></td>
				<td> <?php echo form_input('vt_code',$fvt_code,'id="vt_code"'); ?></td>
			</tr>
			
			<tr>
				<td> <strong><?php echo form_label('Team Name '); ?></strong></td>
				<td> <?php echo form_input('vt_name',$fvt_name,'id="vt_name"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Sub Unit Code '); ?></strong></td>
				<td> <?php echo form_input('vt_vsu_code',$fvt_vsu_code,'id="vt_vsu_code"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Team Level'); ?></strong></td>
				<td> <?php echo form_input('vt_level',$fvt_level,'id="vt_level" '); ?></td>
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