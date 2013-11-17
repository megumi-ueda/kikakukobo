<h2>企画一覧</h2>
<?php foreach ($plans as $plan) : ?>
<table cellpadding="0" cellspacing="0" border=1 align=center>
	<tr>
		<td rowspan="2" width=50>アイコン</td>
		<td colspan="2" rowspan="2" width=250 style="padding-left:1.0em;">
			<?php 
				echo $this->Html->link($plan['Plan']['title'], '/plans/view/'.$plan['Plan']['id']);
			?> 
		</td>
		<td><br></td>
	</tr>
	<tr>
		<td width="200">いいね</td>
	</tr>
	<tr>
		<td colspan="2" width="300" style="padding-left:1.0em;">
			作成日時：
			<?php
				echo h($plan['Plan']['created']);
			?>
		</td>
		<td colspan="2" width="300" style="padding-left:1.0em;">
			更新日時：
			<?php
				echo h($plan['Plan']['modified']);
			?>
		</td>
	</tr>	
</table>
<?php endforeach; ?>

<ul>
<?php foreach ($plans as $plan) : ?>
<li>
<?php 
//	debug($plan);
// echo h($plan['Plan']['title']);
//
echo $this->Html->link($plan['Plan']['title'], '/plans/view/'.$plan['Plan']['id']);
?> 
<?php
	echo h($plan['Plan']['created']);
?>
<?php echo $this->Html->link(' 編集', array('action'=>'edit', $plan['Plan']['id'])); ?> 
<?php
	echo $this->Form->postLink('削除', array('action'=>'delete', $plan['Plan']['id']), 	array('confirm'=>'sure?'));
?>
</li>
<?php endforeach; ?>
</ul>
