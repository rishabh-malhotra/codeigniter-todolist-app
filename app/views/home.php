<?php if($this->session->flashdata('registered')) : ?>
    <p class="alert alert-dismissable alert-success"><?php $this->session->flashdata('registered');?></p>
<?php endif; ?>
<?php if($this->session->flashdata('login_success')) : ?>
    <p class="alert alert-dismissable alert-success"><?php print_r($this->session->flashdata('login_success'));?></p>
<?php endif; ?>
<?php if($this->session->flashdata('noaccess')) : ?>
    <p class="alert alert-dismissable alert-danger"><?php print_r($this->session->flashdata('noaccess'));?></p>
<?php endif; ?>


<h1>Welcome to MyTodo!</h1>
	<p>Mytodo is a simple and helpful application to help you manage your day to day tasks.You can add as many lists as you want and as many tasks as you want.</p>