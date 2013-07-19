<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			<br></br>
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_station');?>
			<br></br>
    		
		<table width="0" border="0" style="font-size:12px;" align="center" cellpadding="3" >
			
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