<?php

/**
 * This is the model class for table "avatars".
 *
 * The followings are the available columns in table 'avatars':
 * @property integer $id
 * @property integer $usersid
 * @property string $avatar
 *
 * The followings are the available model relations:
 * @property Users $users
 */
class Avatars extends CActiveRecord
{
	public $icon; // атрибут для хранения загружаемой картинки статьи
	public $del_img; // атрибут для удаления уже загруженной картинки
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'avatars';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('usersid, avatar', 'required'),
			array('usersid', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>255),
			array('del_img', 'boolean'),
			array('icon', 'file',
			  'types'=>'jpg, gif, png',
			  'maxSize'=>1024 * 1024 * 5, // 5 MB
			  'allowEmpty'=>'true',
			  'tooLarge'=>'Файл весит больше 5 MB. Пожалуйста, загрузите файл меньшего размера.',
			),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, usersid, image', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'users' => array(self::BELONGS_TO, 'Users', 'usersid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usersid' => 'Usersid',
			'image' => 'Image',
			'icon' => 'Icon',
			'del_img'=>'Delete icon?',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('usersid',$this->usersid);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/*
	protected function beforeSave()
	{
    if(parent::beforeSave())
    {
        
            //$this->date=date('Y-m-d H:i:s');
            $this->usersid=Yii::app()->user->id;
        return true;
    }
    else
        return false;
	}*/

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Avatars the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
