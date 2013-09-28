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
</li>
<?php endforeach; ?>
</ul>

<h2>Add Plan</h2>
<?php echo $this->Html->link('Add plan', array('controller'=>'plans', 'action'=>'add'));