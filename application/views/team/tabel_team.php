<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			<br></br>
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_team');?>
			<br></br>
    		<table align="center" border="1" cellpadding="0" cellspacing="0" style="font-size:12px" class="table table-bordered">

                <tr align="center" bgcolor="#CCCCCC">
				
                    <td> <strong>Team Code</strong></td>
                    <td> <strong>Team Name </strong></td>
                    <td> <strong>Sub Unit Code </strong></td>
					<td> <strong>Team Level </strong></td>
 					<td colspan="2" > Pilihan </td>
								
                </tr> 
		
<!------------------------------------------------------------------------------------------------------>

                <?php foreach ($records as $key ): ?>                    
                
				<tr>    	
                        <td> <?php echo $key->vt_code; ?> </td>
                        <td> <?php echo $key->vt_name; ?> </td>
                        <td> <?php echo $key->vt_vsu_code; ?> </td>
						<td> <?php echo $key->vt_level; ?> </td>
							
						<td>

						<a href="<?php echo base_url().'index.php/form_team/edit_team/' . $key->vt_code ?>"><alt="Edit"></a>
						
						<a href="<?php echo base_url().'index.php/form_team/delete_team/' . $key->vt_code ?>"><alt="Delete"></a>
                        
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