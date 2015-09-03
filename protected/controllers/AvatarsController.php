<?php

class AvatarsController extends Controller
{
	public function actionIndex()
	{
		$this->render('index', array(
			'model'=>$this->loadModel($id),
		));
	}

	public function accessRules()
	{
		return array(
			array('allow', 
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);	
	}		
	
	public function actionCreate(){
	  $model=new Avatars;
	  // Uncomment the following line if AJAX validation is needed
	  // $this->performAjaxValidation($model);
	  if(isset($_POST['Avatars'])){
		$model->attributes=$_POST['Avatars'];
		//Полю icon присвоить значения поля формы icon
		$model->icon=CUploadedFile::getInstance($model,'icon');
		if ($model->icon){
		  $sourcePath = pathinfo($model->icon->getName());
		  $fileName =date('m-d').Yii::app()->user->name.'.'.$sourcePath['extension'];
		  $model->image = $fileName;
		}
		if($model->save()){
		  //Если поле загрузки файла не было пустым, то
		  if ($model->icon){
			//сохранить файл на сервере в каталог images/2013 под именем
			//month-day-alias.jpg
			$file = $_SERVER['DOCUMENT_ROOT'].
			  Yii::app()->urlManager->baseUrl.
			  '/images/'.$fileName;
			  $model->icon->saveAs($file);
		  }
		  $this->redirect(array('index','id'=>$model->id));
		}
		}
 
	  $this->render('create',array(
		'model'=>$model,
	  ));
	}
	
	public function actionUpdate(){
	  $model=$this->loadModel($id);
	 
	  if(isset($_POST['Avatars'])){
		$model->attributes=$_POST['Avatars'];
		$model->icon=CUploadedFile::getInstance($model,'icon');
		if ($model->icon){
		  $sourcePath = pathinfo($model->icon->getName());
		  $fileName = date('m-d').Yii::app()->user->name.'.'.$sourcePath['extension'];
		  $model->image = $fileName;
		}
		if($model->save()){
		  //Если отмечен чекбокс «удалить файл»
			if($model->del_img){
			  if(file_exists($_SERVER['DOCUMENT_ROOT'].
				Yii::app()->urlManager->baseUrl.
				'/images/'.$model->image)){
				//удаляем файл
				unlink('./images/'.$model->image);
				$model->image = '';
			  }
		}
	 
		//Если поле загрузки файла не было пустым, то
		if ($model->icon){
		  $file = './images/'.$fileName;
		  
		  $model->icon->saveAs($file);
			$image = Yii::app()->image->load($file);
			$image->resize(100, 100);
			$image->save();
		}
		$this->redirect(array('update','id'=>$model->id));
	  }
	}	
		$this->render('update',array(
		'model'=>$model,
	  )); 
	  
	
	}
	
	public function post_image($id, $image, $width='150', $class='post_img'){
	  if(isset($image) && file_exists(YiiBase::getPathOfAlias('webroot').
		'/images/'.$image))
		  return CHtml::image(Yii::app()->getBaseUrl(true).'/images/'.$image
		  );
	  else
		return CHtml::image(Yii::app()->getBaseUrl(true).'/images/noimage.png','no image',
		  array(
			'width'=>$width,
			'class'=>$class
		  )
		);
	}
	
	public function loadModel($id)
	{
		//$model=Avatars::model()->findByPk($id);
		$model=Avatars::model()->find('usersid=:usersid', array(':usersid'=>Yii::app()->user->id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function beforeAction($action)
    {
        Yii::app()->bootstrap->register();
        return parent::beforeAction($action);
    }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
