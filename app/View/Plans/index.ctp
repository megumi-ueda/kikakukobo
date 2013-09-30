<h2>企画一覧</h2>

<ul>
<?php foreach ($plans as $plan) : ?>
<li>
<?php 
//	debug($plan);
// echo h($plan['Plan']['title']);
//
echo $this->Html->link($plan['Plan']['title'], '/plans/view/'.$plan['Plan']['id']);
?> 
<?php echo $this->Html->link(' 編集', array('action'=>'edit', $plan['Plan']['id'])); ?> 
<?php
	echo $this->Form->postLink('削除', array('action'=>'delete', $plan['Plan']['id']), 	array('confirm'=>'sure?'));
?>
</li>
<?php endforeach; ?>
</ul>

<h2>Add Plan</h2>
<?php echo $this->Html->link('Add plan', array('controller'=>'plans', 'action'=>'add'));
