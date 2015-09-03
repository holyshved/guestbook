<?php
/* @var $this MessagesController */
/* @var $data Messages */
?>

<div class="view">
	<table class="table table-bordered">
	<tr>
		<td class="userM"><?php echo CHtml::encode($data->user->username); ?></td>
		<td class="textM"><?php echo CHtml::encode($data->date); ?></td>
	</tr>
	<tr>
		<td><?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/'.$data->user->avatars->image); ?></td>
		<td><?php echo CHtml::encode($data->text); ?></td>
	</tr>
	</table>
	
	
	
	
</div>