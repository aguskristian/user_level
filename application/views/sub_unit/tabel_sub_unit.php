<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			<br></br>
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_subunit');?>
			
			<div>
			<strong>
			
				<?php 
				
					$search = $this->input->post( 'search' );
					
					echo $search ? "Menampilkan data pencarian '$search'" : 'Pencarian Data';
					
				?>
				
			</strong>
			</div>
     
                <form action="<?php echo site_url() ?>/sub_unit/tabel_sub_unit" method="post" class="navbar-search pull-left">
					
					<input type="search" name="search" class="input-medium search-query" placeholder="search" value="<?php echo $this->input->post( 'search' ) ?>" />
					
					
					<button class="btn" type="button">Search</button>
				
                </form>
				
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

						<a href="<?php echo base_url().'index.php/sub_unit/edit/' . $key->vsu_code ?>">Edit</a>
						&nbsp;|&nbsp;
						<a href="<?php echo base_url().'index.php/sub_unit/delete/' . $key->vsu_code ?>">Delete</a>
						</td>
						
						</td>
                    
					</tr>
         
          
                <?php endforeach; ?>
 
            </table>
		<?php $this->load->view ('footer')?>
            
            

		</div>
			
    </article><!-- end of stats article -->
	
	
	
 <div class="clear"></div>