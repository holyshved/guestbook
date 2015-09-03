<?php
/* @var $this AvatarsController */

$this->breadcrumbs=array(
	'Avatars',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	<?php echo $this->post_image($model->id, $model->image, '150','small_img left');
		
	//echo	CHtml::image(Yii::app()->getBaseUrl(true).'/images/'.$model->image);
	?>
	
</p>
