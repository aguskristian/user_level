<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			<br></br>
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_sub_unit');?>
			<br></br>
    		<table align="center" border="1" cellpadding="0" cellspacing="0" style="font-size:12px" class="table table-bordered">

                <tr align="center" bgcolor="#CCCCCC">
				
                    <td> <strong>Sub Unit Code</strong></td>
                    <td> <strong>Sub Unit Name</strong></td>
					<td> <strong>Unit Code</strong></td>
                    <td> <strong>Sub Unit Level </strong></td>
 					<td colspan="2" > Pilihan </td>
								
                </tr> 
		
<!------------------------------------------------------------------------------------------------------>

                <?php foreach ($records as $key ): ?>                    
                
				<tr>    	
                        <td> <?php echo $key->vsu_code; ?> </td>
                        <td> <?php echo $key->vsu_name; ?> </td>
                        <td> <?php echo $key->vsu_vu_code; ?> </td>
						 <td> <?php echo $key->vsu_level; ?> </td>
							
						<td>

						<a href="<?php echo base_url().'index.php/form_sub_unit/edit_sub_unit/' . $key->vsu_code ?>"><alt="Edit"></a>
						
						<a href="<?php echo base_url().'index.php/form_sub_unit/delete_sub_unit/' . $key->vsu_code ?>"><alt="Delete"></a>
                        
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