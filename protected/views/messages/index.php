<?php
/* @var $this MessagesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Messages',
	
);


$this->menu=array(
	//array('label'=>'view avatar', 'url'=>array('avatars/index')),
	array('label'=>'Set Avatar', 'url'=>array('avatars/update', 'id'=>$model->id)),
);

?>

<?php if(!Yii::app()->user->isGuest) {$this->actionCreate(); }?>

<h1>Messages</h1>


<?php 
	

	
	
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	
	'template'=>"{items}\n{pager}",
)); 
?>
