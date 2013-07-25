<?php $this->load->view('header')?>




<h4>Silakan login dengan email dan password Anda.</h4>

	<div id="infoMessage"><?php echo $message;?></div>
		<?php echo form_open("auth/login");?>
					
				<div>
					
					<label for="email">Email:</label>
					
					<?php echo form_input($email);?>
					
				</div>
					
				<div>
					
					<label for="password">Password:</label>
					
					<?php echo form_input($password);?>
					
				</div>
					
				<div>
					
					<p><?php echo form_checkbox('remember', '1', FALSE);?> Remember me </p>
					
				</div>
				
				<div>
					 <?php echo form_submit('submit', 'Login');?>
				</div>
		
		<?php echo form_close();?>
			
			<table>			
				<tr>
					<td><a href="<?php echo site_url('auth/registrasi'); ?>">Buat akun baru</a> &middot; </td>
							
					<td><a href="<?php echo site_url('auth/lupa_password'); ?>">Lupa password?</a> </td>
				<tr>
			</table>
							
		<?php $this->load->view('footer')?>;
	</div>
</div>
</div>
