<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			<br></br>
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_unit');?>
			<br></br>
    		<table align="center" border="1" cellpadding="0" cellspacing="0" style="font-size:12px" class="table table-bordered">

                <tr align="center" bgcolor="#CCCCCC">
				
                    <td> <strong>Unit Code</strong></td>
                    <td> <strong>Unit Name</strong></td>
                    <td> <strong>station Code</strong></td>
					<td> <strong>Unit Level</strong></td>
 					<td colspan="2" > Pilihan </td>
								
                </tr> 
		
<!------------------------------------------------------------------------------------------------------>

                <?php foreach ($records as $key ): ?>                    
                
				<tr>    	
                        <td> <?php echo $key->vu_code; ?> </td>
                        <td> <?php echo $key->vu_name; ?> </td>
                        <td> <?php echo $key->vu_vs_code; ?> </td>
						<td> <?php echo $key->vu_level; ?> </td>	
						<td>

						<a href="<?php echo base_url().'index.php/form_station/edit_unit/' . $key->vu_code ?>">'Edit'</a>
						
						<a href="<?php echo base_url().'index.php/form_station/delete_unit/' . $key->vu_code ?>">'Delete'</a>
                        
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