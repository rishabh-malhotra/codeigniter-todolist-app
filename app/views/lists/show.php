<ul id="actions">
	<h4>List Actions</h4>
	<li><a href="<?php echo base_url()?>tasks/add/<?php echo $list->id; ?>">Add Task</a></li>
	<li><a href="<?php echo base_url()?>lists/edit/<?php echo $list->id; ?>">Edit List</a></li>
	<li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url()?>lists/delete/<?php echo $list->id?>">Delete List</a></li>
</ul>

<h1><?php echo $list->list_name; ?></h1>
Created On: <strong><?php echo date("n-j-Y",strtotime($list->create_date)); ?></strong>
<br><br>
<div style="max-width: 500px;"><?php echo $list->list_body; ?></div>
<br><br>