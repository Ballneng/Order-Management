<?php

/**
 * This is the model class for table "{{product_statistic}}".
 *
 * The followings are the available columns in table '{{product_statistic}}':
 * @property integer $product_id
 * @property integer $product_viewed
 * @property integer $product_carted
 * @property integer $product_buyed
 * @property integer $product_reviewed
 * @property integer $product_wished
 */
class ProductStatistic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductStatistic the static model class
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
		return '{{product_statistic}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, product_viewed, product_carted, product_buyed, product_reviewed, product_wished', 'required'),
			array('product_id, product_viewed, product_carted, product_buyed, product_reviewed, product_wished', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_id, product_viewed, product_carted, product_buyed, product_reviewed, product_wished', 'safe', 'on'=>'search'),
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
			'product_id' => 'Product',
			'product_viewed' => 'Product Viewed',
			'product_carted' => 'Product Carted',
			'product_buyed' => 'Product Buyed',
			'product_reviewed' => 'Product Reviewed',
			'product_wished' => 'Product Wished',
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

		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('product_viewed',$this->product_viewed);
		$criteria->compare('product_carted',$this->product_carted);
		$criteria->compare('product_buyed',$this->product_buyed);
		$criteria->compare('product_reviewed',$this->product_reviewed);
		$criteria->compare('product_wished',$this->product_wished);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}