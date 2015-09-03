<?php
/* @var $this AvatarsController */
/* @var $model Avatars */

$this->breadcrumbs=array(
	'Avatars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Avatars', 'url'=>array('index')),
	array('label'=>'Create Avatars', 'url'=>array('create')),
	array('label'=>'Update Avatars', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Avatars', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Avatars', 'url'=>array('admin')),
);
?>

<h1>View Avatars #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'usersid',
		'avatar',
	),
)); ?>
