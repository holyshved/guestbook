<?php
/* @var $this AvatarsController */
/* @var $model Avatars */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'avatars-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	
	
	
	<?php echo $form->errorSummary($model); ?>
	
	<div>
	  <?php echo $form->labelEx($model,'icon'); ?>
	  <?php // Вывод уже загруженной картинки или изображения No_photo
		 echo $this->post_image($model->id, $model->image, '150','small_img left');?>
		<br clear="all">
		<?php //Если картинка для данного товара загружена, предложить её удалить, отметив чекбокс 
		  if(isset($model->image) && file_exists($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.'/images/'.$model->image)){
			//echo $form->checkBox($model,'del_img',array('class'=>'span-1'));
			//echo $form->labelEx($model,'del_img',array('class'=>'span-2'));
		  }?>
		<br />
		<?php //Поле загрузки файла 
		  echo CHtml::activeFileField($model, 'icon'); ?> 
	</div>

	<div class="row buttons">
		<?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->