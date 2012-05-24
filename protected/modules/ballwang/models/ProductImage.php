<?php

/**
 * This is the model class for table "{{product_image}}".
 *
 * The followings are the available columns in table '{{product_image}}':
 * @property integer $image_id
 * @property string $image_path
 * @property string $image_alt
 * @property string $image_default
 * @property string $image_used
 * @property integer $image_product_id
 */
class ProductImage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductImage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product_image}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image_path, image_alt, image_default, image_used, image_product_id', 'required'),
			array('image_product_id', 'numerical', 'integerOnly'=>true),
			array('image_path', 'length', 'max'=>64),
			array('image_alt', 'length', 'max'=>100),
			array('image_default, image_used', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('image_id, image_path, image_alt, image_default, image_used, image_product_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'image_id' => 'Image',
			'image_path' => 'Image Path',
			'image_alt' => 'Image Alt',
			'image_default' => 'Image Default',
			'image_used' => 'Image Used',
			'image_product_id' => 'Image Product',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('image_id',$this->image_id);
		$criteria->compare('image_path',$this->image_path,true);
		$criteria->compare('image_alt',$this->image_alt,true);
		$criteria->compare('image_default',$this->image_default,true);
		$criteria->compare('image_used',$this->image_used,true);
		$criteria->compare('image_product_id',$this->image_product_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}