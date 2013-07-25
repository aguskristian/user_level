<p>Silakan masukkan alamat email Anda dan kami akan mengirimkan link untuk mereset password Anda.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/lupa_password");?>

      <p>Alamat Email:<br />
      <?php echo form_input($email);?>
      </p>
      
      <p><?php echo form_submit('submit', 'Submit');?></p>
      
<?php echo form_close();?>
