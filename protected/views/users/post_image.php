<?php
/* @var $this UsersController */
/* @var $model Users */

/*$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
*/
//<h1>Update Users <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<div class="form">
	  <?php echo $form->labelEx($model,'icon'); ?>
	  <?php // Вывод уже загруженной картинки или изображения No_photo
		echo $this->post_image($model->id, $model->username, $model->avatar, '150','small_img left');?>
		<br clear="all">
		<?php //Если картинка для данного товара загружена, предложить её удалить, отметив чекбокс 
		  if(isset($model->image) && file_exists($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.'/images/'.'/'.$model->image)){
			echo $form->checkBox($model,'del_img',array('class'=>'span-1'));
			echo $form->labelEx($model,'del_img',array('class'=>'span-2'));
		  }?>
		<br />
		<?php //Поле загрузки файла 
		  echo CHtml::activeFileField($model, 'icon'); ?> 
</div>	