<h2>Add plan</h2>

<?php
echo $this->Form->create('Plan');
echo $this->Form->input('from');
echo $this->Form->input('to');
echo $this->Form->input('title');
echo $this->Form->input('contents', array('rows'=>2));
echo $this->Form->end('Submit');

