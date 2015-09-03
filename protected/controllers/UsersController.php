<?php

 

class UsersController extends Controller

{
	//public $layout='//layouts/column2';
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);	
	}		
 

    public function actions()

    {

        // captcha action renders the CAPTCHA image displayed on the contact page

        return array(



        );

    }

    public function actionIndex()

    {

        $model=new Users;

 

        if(isset($_POST['ajax']) && $_POST['ajax']==='users-index-form')

        {

            echo CActiveForm::validate($model);

            Yii::app()->end();

        }

        if(isset($_POST['Users']))

        {

            $model->attributes=$_POST['Users'];

            if($model->validate())

            {

                if($model->save())

                {
					
                    $this->redirect(array('site/login'));

                }

                return;

            }

        }

        $this->render('index',array('model'=>$model));

    }
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$id = $_GET['id'];
		$model=Users::model()->findByPk($id);
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionCreate($id, $create_year, $username, $avatar, $width='150', $class='post_img'){
		  if(isset($image) && file_exists($_SERVER['DOCUMENT_ROOT'].
			Yii::app()->urlManager->baseUrl.
			'/images/'.$create_year.'/'.$avatar))
			  return CHtml::image(Yii::app()->getBaseUrl(true).'/images/'.$create_year.'/'.$image, $title,
				array(
				  'width'=>$width,
				  'class'=>$class,
				)
			  );
		  else
			return CHtml::image(Yii::app()->getBaseUrl(true).'/images/pics/noimage.gif','no image',
			  array(
				'width'=>$width,
				'class'=>$class
			  )
			);
 }

	public function beforeAction($action)
    {
        Yii::app()->bootstrap->register();
        return parent::beforeAction($action);
    }
}
