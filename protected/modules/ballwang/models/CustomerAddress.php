<?php

/**
 * This is the model class for table "{{customer_address}}".
 *
 * The followings are the available columns in table '{{customer_address}}':
 * @property integer $address_id
 * @property integer $customer_id
 * @property integer $customer_gender
 * @property string $customer_firstname
 * @property string $customer_lastname
 * @property string $customer_name
 * @property string $address_company
 * @property string $address_street
 * @property string $address_city
 * @property string $address_state
 * @property integer $address_country
 * @property string $address_postcode
 * @property string $address_phonenumber
 * @property string $address_create_at
 */
class CustomerAddress extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CustomerAddress the static model class
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
		return '{{customer_address}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id, customer_gender, customer_firstname, customer_lastname, customer_name, address_street, address_city, address_state, address_country, address_postcode, address_phonenumber, address_create_at', 'required'),
			array('customer_id, customer_gender, address_country', 'numerical', 'integerOnly'=>true),
			array('customer_firstname, customer_lastname, address_company, address_city, address_state', 'length', 'max'=>64),
			array('customer_name', 'length', 'max'=>128),
			array('address_street', 'length', 'max'=>255),
			array('address_postcode, address_phonenumber', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('address_id, customer_id, customer_gender, customer_firstname, customer_lastname, customer_name, address_company, address_street, address_city, address_state, address_country, address_postcode, address_phonenumber, address_create_at', 'safe', 'on'=>'search'),
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
			'address_id' => 'Address',
			'customer_id' => 'Customer',
			'customer_gender' => 'Customer Gender',
			'customer_firstname' => 'Customer Firstname',
			'customer_lastname' => 'Customer Lastname',
			'customer_name' => 'Customer Name',
			'address_company' => 'Address Company',
			'address_street' => 'Address Street',
			'address_city' => 'Address City',
			'address_state' => 'Address State',
			'address_country' => 'Address Country',
			'address_postcode' => 'Address Postcode',
			'address_phonenumber' => 'Address Phonenumber',
			'address_create_at' => 'Address Create At',
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

		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('customer_gender',$this->customer_gender);
		$criteria->compare('customer_firstname',$this->customer_firstname,true);
		$criteria->compare('customer_lastname',$this->customer_lastname,true);
		$criteria->compare('customer_name',$this->customer_name,true);
		$criteria->compare('address_company',$this->address_company,true);
		$criteria->compare('address_street',$this->address_street,true);
		$criteria->compare('address_city',$this->address_city,true);
		$criteria->compare('address_state',$this->address_state,true);
		$criteria->compare('address_country',$this->address_country);
		$criteria->compare('address_postcode',$this->address_postcode,true);
		$criteria->compare('address_phonenumber',$this->address_phonenumber,true);
		$criteria->compare('address_create_at',$this->address_create_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}