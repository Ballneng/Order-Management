<?php

/**
 * This is the model class for table "{{carrier}}".
 *
 * The followings are the available columns in table '{{carrier}}':
 * @property integer $carrier_id
 * @property string $carrier_name
 * @property string $carrier_url
 * @property integer $carrier_active
 * @property double $carrier_fee
 * @property integer $carrier_order
 * @property integer $carrier_chose
 * @property string $carrier_description
 */
class Carrier extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Carrier the static model class
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
		return '{{carrier}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('carrier_name, carrier_url, carrier_active, carrier_fee, carrier_order, carrier_chose, carrier_description', 'required'),
			array('carrier_active, carrier_order, carrier_chose', 'numerical', 'integerOnly'=>true),
			array('carrier_fee', 'numerical'),
			array('carrier_name', 'length', 'max'=>64),
			array('carrier_url, carrier_description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('carrier_id, carrier_name, carrier_url, carrier_active, carrier_fee, carrier_order, carrier_chose, carrier_description', 'safe', 'on'=>'search'),
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
			'carrier_id' => 'Carrier',
			'carrier_name' => 'Carrier Name',
			'carrier_url' => 'Carrier Url',
			'carrier_active' => 'Carrier Active',
			'carrier_fee' => 'Carrier Fee',
			'carrier_order' => 'Carrier Order',
			'carrier_chose' => 'Carrier Chose',
			'carrier_description' => 'Carrier Description',
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

		$criteria->compare('carrier_id',$this->carrier_id);
		$criteria->compare('carrier_name',$this->carrier_name,true);
		$criteria->compare('carrier_url',$this->carrier_url,true);
		$criteria->compare('carrier_active',$this->carrier_active);
		$criteria->compare('carrier_fee',$this->carrier_fee);
		$criteria->compare('carrier_order',$this->carrier_order);
		$criteria->compare('carrier_chose',$this->carrier_chose);
		$criteria->compare('carrier_description',$this->carrier_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}