<?php

/**
 * This is the model class for table "{{order}}".
 *
 * The followings are the available columns in table '{{order}}':
 * @property integer $order_id
 * @property integer $invoice_id
 * @property integer $customer_id
 * @property string $order_subtotal
 * @property string $order_trackingtotal
 * @property double $order_promo_free
 * @property string $order_grandtotal
 * @property integer $order_currency_id
 * @property integer $order_payment_id
 * @property integer $order_carrier_id
 * @property integer $order_address_id
 * @property integer $order_ship_id
 * @property integer $order_discount_id
 * @property integer $order_status
 * @property integer $order_valid
 * @property integer $order_export
 * @property integer $order_qty
 * @property string $order_ip
 * @property string $order_salt
 * @property string $order_comment
 * @property string $order_create_at
 * @property string $order_payment_at
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return '{{order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invoice_id, customer_id, order_subtotal, order_trackingtotal, order_promo_free, order_grandtotal, order_currency_id, order_payment_id, order_carrier_id, order_address_id, order_ship_id, order_discount_id, order_status, order_valid, order_export, order_ip, order_salt, order_create_at, order_payment_at', 'required'),
			array('invoice_id, customer_id, order_currency_id, order_payment_id, order_carrier_id, order_address_id, order_ship_id, order_discount_id, order_status, order_valid, order_export, order_qty', 'numerical', 'integerOnly'=>true),
			array('order_promo_free', 'numerical'),
			array('order_subtotal, order_trackingtotal, order_grandtotal', 'length', 'max'=>6),
			array('order_ip', 'length', 'max'=>15),
			array('order_salt', 'length', 'max'=>32),
			array('order_comment', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('order_id, invoice_id, customer_id, order_subtotal, order_trackingtotal, order_promo_free, order_grandtotal, order_currency_id, order_payment_id, order_carrier_id, order_address_id, order_ship_id, order_discount_id, order_status, order_valid, order_export, order_qty, order_ip, order_salt, order_comment, order_create_at, order_payment_at', 'safe', 'on'=>'search'),
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
			'order_id' => 'Order',
			'invoice_id' => 'Invoice',
			'customer_id' => 'Customer',
			'order_subtotal' => 'Order Subtotal',
			'order_trackingtotal' => 'Order Trackingtotal',
			'order_promo_free' => 'Order Promo Free',
			'order_grandtotal' => 'Order Grandtotal',
			'order_currency_id' => 'Order Currency',
			'order_payment_id' => 'Order Payment',
			'order_carrier_id' => 'Order Carrier',
			'order_address_id' => 'Order Address',
			'order_ship_id' => 'Order Ship',
			'order_discount_id' => 'Order Discount',
			'order_status' => 'Order Status',
			'order_valid' => 'Order Valid',
			'order_export' => 'Order Export',
			'order_qty' => 'Order Qty',
			'order_ip' => 'Order Ip',
			'order_salt' => 'Order Salt',
			'order_comment' => 'Order Comment',
			'order_create_at' => 'Order Create At',
			'order_payment_at' => 'Order Payment At',
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

		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('invoice_id',$this->invoice_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('order_subtotal',$this->order_subtotal,true);
		$criteria->compare('order_trackingtotal',$this->order_trackingtotal,true);
		$criteria->compare('order_promo_free',$this->order_promo_free);
		$criteria->compare('order_grandtotal',$this->order_grandtotal,true);
		$criteria->compare('order_currency_id',$this->order_currency_id);
		$criteria->compare('order_payment_id',$this->order_payment_id);
		$criteria->compare('order_carrier_id',$this->order_carrier_id);
		$criteria->compare('order_address_id',$this->order_address_id);
		$criteria->compare('order_ship_id',$this->order_ship_id);
		$criteria->compare('order_discount_id',$this->order_discount_id);
		$criteria->compare('order_status',$this->order_status);
		$criteria->compare('order_valid',$this->order_valid);
		$criteria->compare('order_export',$this->order_export);
		$criteria->compare('order_qty',$this->order_qty);
		$criteria->compare('order_ip',$this->order_ip,true);
		$criteria->compare('order_salt',$this->order_salt,true);
		$criteria->compare('order_comment',$this->order_comment,true);
		$criteria->compare('order_create_at',$this->order_create_at,true);
		$criteria->compare('order_payment_at',$this->order_payment_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}