<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			<br></br>
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_position');?>
			<br></br>
    		<table align="center" border="1" cellpadding="0" cellspacing="0" style="font-size:12px" class="table table-bordered">

                <tr align="center" bgcolor="#CCCCCC">
				
                    <td> <strong>Position Code</strong></td>
                    <td> <strong>Position Name</strong></td>
					<td> <strong>Team Code</strong></td>
					<td> <strong>Function Code</strong></td>
                    <td> <strong>Position Level </strong></td>
 					<td colspan="2" > Pilihan </td>
								
                </tr> 
		
<!------------------------------------------------------------------------------------------------------>

                <?php foreach ($records as $key ): ?>                    
                
				<tr>    	
                        <td> <?php echo $key->vp_code; ?> </td>
                        <td> <?php echo $key->vp_name; ?> </td>
						<td> <?php echo $key->vp_vt_code; ?> </td>
						<td> <?php echo $key->vp_vf_code; ?> </td>
                        <td> <?php echo $key->vp_level; ?> </td>
							
						<td>

						<a href="<?php echo base_url().'index.php/form_position/edit_position/' . $key->vp_code ?>"><alt="Edit"></a>
						
						<a href="<?php echo base_url().'index.php/form_position/delete_position/' . $key->vp_code ?>"><alt="Delete"></a>
                        
						<?php #echo anchor('controllersinventory/edit_inventory/' . $key->id_wo_pmi, 'Edit'); ?>
                        
						<?php #echo anchor('controllersinventory/delete_inventory/' . $key->id_wo_pmi, 'Delete'); ?>
						
						</td>
                    
					</tr>
         
          
                <?php endforeach; ?>
 
            </table>
		<?php $this->load->view ('footer')?>
            
            

		</div>
			
    </article><!-- end of stats article -->
	
	
	
 <div class="clear"></div>