<h1>update your post<h1>

<?php
	echo $this->Form->crate('Form');
	echo $this->Form->input('title');
	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('save Post');
?>