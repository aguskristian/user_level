<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_function');?>
			<br></br>
    		
		<table width="0" border="0" style="font-size:12px;" align="center" cellpadding="3" >
			
			
			<?php echo form_hidden('vf_code',$fvf_code); ?>
        
        
			<tr>
				<td> <strong><?php echo form_label('Function Code'); ?></strong></td>
				<td> <?php echo form_input('vf_code',$fvf_code,'id="vf_code"'); ?></td>
			</tr>
			
			<tr>
				<td> <strong><?php echo form_label('function Name '); ?></strong></td>
				<td> <?php echo form_input('vf_name',$fvf_name,'id="vf_name"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Function Level'); ?></strong></td>
				<td> <?php echo form_input('vf_level',$fvf_level,'id="vf_level" '); ?></td>
			</tr>

        </table>
		
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