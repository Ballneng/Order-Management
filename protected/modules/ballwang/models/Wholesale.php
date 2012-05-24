<?php

/**
 * This is the model class for table "{{wholesale}}".
 *
 * The followings are the available columns in table '{{wholesale}}':
 * @property integer $wholesale_id
 * @property integer $wholesale_product_id
 * @property integer $wholesale_product_interval1
 * @property integer $wholesale_product_interval2
 * @property integer $wholesale_type
 * @property integer $wholesale_active
 * @property string $wholesale_product_price
 * @property double $wholesale_product_percent
 * @property string $wholesale_create_at
 */
class Wholesale extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Wholesale the static model class
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
		return '{{wholesale}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('wholesale_product_id, wholesale_product_interval1, wholesale_product_interval2, wholesale_type, wholesale_active, wholesale_product_price, wholesale_product_percent, wholesale_create_at', 'required'),
			array('wholesale_product_id, wholesale_product_interval1, wholesale_product_interval2, wholesale_type, wholesale_active', 'numerical', 'integerOnly'=>true),
			array('wholesale_product_percent', 'numerical'),
			array('wholesale_product_price', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('wholesale_id, wholesale_product_id, wholesale_product_interval1, wholesale_product_interval2, wholesale_type, wholesale_active, wholesale_product_price, wholesale_product_percent, wholesale_create_at', 'safe', 'on'=>'search'),
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
			'wholesale_id' => 'Wholesale',
			'wholesale_product_id' => 'Wholesale Product',
			'wholesale_product_interval1' => 'Wholesale Product Interval1',
			'wholesale_product_interval2' => 'Wholesale Product Interval2',
			'wholesale_type' => 'Wholesale Type',
			'wholesale_active' => 'Wholesale Active',
			'wholesale_product_price' => 'Wholesale Product Price',
			'wholesale_product_percent' => 'Wholesale Product Percent',
			'wholesale_create_at' => 'Wholesale Create At',
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

		$criteria->compare('wholesale_id',$this->wholesale_id);
		$criteria->compare('wholesale_product_id',$this->wholesale_product_id);
		$criteria->compare('wholesale_product_interval1',$this->wholesale_product_interval1);
		$criteria->compare('wholesale_product_interval2',$this->wholesale_product_interval2);
		$criteria->compare('wholesale_type',$this->wholesale_type);
		$criteria->compare('wholesale_active',$this->wholesale_active);
		$criteria->compare('wholesale_product_price',$this->wholesale_product_price,true);
		$criteria->compare('wholesale_product_percent',$this->wholesale_product_percent);
		$criteria->compare('wholesale_create_at',$this->wholesale_create_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}