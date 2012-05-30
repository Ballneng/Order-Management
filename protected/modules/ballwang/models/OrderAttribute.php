<?php

/**
 * This is the model class for table "{{order_attribute}}".
 *
 * The followings are the available columns in table '{{order_attribute}}':
 * @property integer $order_attribute_id
 * @property string $order_attribute_color
 * @property string $order_attribute_size
 */
class OrderAttribute extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderAttribute the static model class
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
		return '{{order_attribute}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('order_attribute_color, order_attribute_size', 'required'),
			array('order_attribute_color, order_attribute_size', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('order_attribute_id, order_attribute_color, order_attribute_size', 'safe', 'on'=>'search'),
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
			'order_attribute_id' => 'Order Attribute',
			'order_attribute_color' => 'Order Attribute Color',
			'order_attribute_size' => 'Order Attribute Size',
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

		$criteria->compare('order_attribute_id',$this->order_attribute_id);
		$criteria->compare('order_attribute_color',$this->order_attribute_color,true);
		$criteria->compare('order_attribute_size',$this->order_attribute_size,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}