<h3>Login Form</h3>
<?php if($this->session->userdata('logged_in')) : ?>
	<p>You are logged in as <?php echo $this->session->userdata('username'); ?></p>
	<?php  $attributes=array('class'=> 'form-horizontal', 'id'=>'logout_form'  );   ?>
	<?php echo form_open('users/logout',$attributes); ?>
	<?php $data=array('name'             => 'Logout',
						'class'			 => 'btn btn-primary',
 						'value'          => 'submit'
					  ); ?>
	<?php echo form_submit($data); ?>
	<?php echo form_close();  ?>

<?php else : ?>
	<?php  $attributes=array('class'=> 'form-horizontal', 'id'=>'login_form'  );   ?>
	<?php echo form_open('users/login',$attributes); ?>

	<p>
		<?php echo form_label('Username:'); ?>
		<?php $data=array('name'        => 'username',
						  'placeholder' => 'Enter Usename',	
						  'style'          => 'width:90%;',
						  'value'       => set_value('username')
							);

							?>


		<?php echo form_input($data);  ?>
	</p>

	<p>

		<?php echo form_label('Password:'); ?>

		<?php $data=array('name'        => 'password',
						  'placeholder' => 'Enter Password',	
						  'style'          => 'width:90%;',
						  'value'       => set_value('password')
							);

							?>



		<?php echo form_password($data);  ?>

	</p>

	<p>
		<?php $data=array('name'        => 'password',
						  'placeholder' => 'Enter Password',	
						  'class'       => 'btn btn-primary',
						  'value'       => 'Submit'
							);

							?>



		<?php echo form_submit($data);  ?>
	</p>

	<?php echo form_close();  ?>
<?php endif; ?>	

