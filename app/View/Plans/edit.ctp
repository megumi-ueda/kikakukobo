<h2>Edit Plan</h2>

<?php
echo $this->Form->create('Plan', array('action'=>'edit'));
echo $this->Form->input('from');
echo $this->Form->input('to');
echo $this->Form->input('title');
echo $this->Form->input('contents', array('rows'=>3));
echo $this->Form->end('Save!');
