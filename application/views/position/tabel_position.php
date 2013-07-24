<article class="module width_full" style="overflow-x: scroll;">
		<div class="module_content">
			<br></br>
			
			<?php $this->load->view('header');	?>
			<?php $this->load->view('main_header_position');?>
			<div>
			<strong>
			
				<?php 
				
					$search = $this->input->post( 'search' );
					
					echo $search ? "Menampilkan data pencarian '$search'" : 'Pencarian Data';
					
				?>
				
			</strong>
			</div>
     
                <form action="<?php echo site_url() ?>/position/tabel_position" method="post" class="navbar-search pull-left">
					
					<input type="search" name="search" class="input-medium search-query" placeholder="search" value="<?php echo $this->input->post( 'search' ) ?>" />
					
					
					<button class="btn" type="button">Search</button>
				
                </form>
				
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

						<a href="<?php echo base_url().'index.php/position/edit/' . $key->vp_code ?>">Edit</a>
						&nbsp;|&nbsp;
						<a href="<?php echo base_url().'index.php/position/delete/' . $key->vp_code ?>">Delete</a>
						
						</td>
                    
					</tr>
         
          
                <?php endforeach; ?>
 
            </table>
			</article><!-- end of stats article -->
		<?php $this->load->view ('footer')?>
