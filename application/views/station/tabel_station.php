<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			<br></br>
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_station');?>
			<br></br>
    		<table align="center" border="1" cellpadding="0" cellspacing="0" style="font-size:12px" class="table table-bordered">

                <tr align="center" bgcolor="#CCCCCC">
				
                    <td> <strong>Station Code</strong></td>
                    <td> <strong>Station Name</strong></td>
                    <td> <strong>Station Level </strong></td>
 					<td colspan="2" > Pilihan </td>
								
                </tr> 
		
<!------------------------------------------------------------------------------------------------------>

                <?php foreach ($records as $key ): ?>                    
                
				<tr>    	
                        <td> <?php echo $key->vs_code; ?> </td>
                        <td> <?php echo $key->vs_name; ?> </td>
                        <td> <?php echo $key->vs_level; ?> </td>
							
						<td>

						<a href="<?php echo base_url().'index.php/station/edit/' . $key->vs_code ?>">Edit</a>
						&nbsp;|&nbsp;
						<a href="<?php echo base_url().'index.php/station/delete/' . $key->vs_code ?>">Delete</a>
						</td>
                    
				</tr>
         
          
                <?php endforeach; ?>
 
            </table>
		<?php $this->load->view ('footer')?>
            
            

		</div>
			
    </article><!-- end of stats article -->
	
	
	
 <div class="clear"></div>