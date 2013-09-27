<h2>企画一覧</h2>

<ul>
<?php foreach ($plans as $plan) : ?>
<li>
<?php 
//	debug($plan);
echo h($plan['Plan']['title']);
?>
</li>
<?php endforeach; ?>
</ul>