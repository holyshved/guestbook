<?php
/* @var $this AvatarsController */
/* @var $model Avatars 

$this->breadcrumbs=array(
	'Avatars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Avatars', 'url'=>array('index')),
	array('label'=>'Create Avatars', 'url'=>array('create')),
	array('label'=>'View Avatars', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Avatars', 'url'=>array('admin')),
);*/
?>

<h1>Update Avatar  </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>