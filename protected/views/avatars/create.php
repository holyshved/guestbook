<?php
/* @var $this AvatarsController */
/* @var $model Avatars */

$this->breadcrumbs=array(
	'Avatars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Avatars', 'url'=>array('index')),
	array('label'=>'Manage Avatars', 'url'=>array('admin')),
);
?>

<h1>Create Avatars</h1>

<?php $this->renderPartial('_form', array('model'=>$model=Avatars::model()->find('usersid=:usersid', array(':usersid'=>Yii::app()->user->id)))); ?>