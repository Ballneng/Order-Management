<?php

/**
 * This is the model class for table "{{order_item}}".
 *
 * The followings are the available columns in table '{{order_item}}':
 * @property integer $item_id
 * @property integer $item_qty
 * @property string $item_price
 * @property double $item_weight
 * @property string $item_total
 * @property integer $item_attribute_id
 * @property integer $item_product_id
 * @property string $item_product_name
 * @property integer $order_id
 */
class OrderItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderItem the static model class
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
		return '{{order_item}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_qty, item_price, item_weight, item_total, item_attribute_id, item_product_id, item_product_name, order_id', 'required'),
			array('item_qty, item_attribute_id, item_product_id, order_id', 'numerical', 'integerOnly'=>true),
			array('item_weight', 'numerical'),
			array('item_price, item_total', 'length', 'max'=>6),
			array('item_product_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('item_id, item_qty, item_price, item_weight, item_total, item_attribute_id, item_product_id, item_product_name, order_id', 'safe', 'on'=>'search'),
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
			'item_id' => 'Item',
			'item_qty' => 'Item Qty',
			'item_price' => 'Item Price',
			'item_weight' => 'Item Weight',
			'item_total' => 'Item Total',
			'item_attribute_id' => 'Item Attribute',
			'item_product_id' => 'Item Product',
			'item_product_name' => 'Item Product Name',
			'order_id' => 'Order',
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

		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('item_qty',$this->item_qty);
		$criteria->compare('item_price',$this->item_price,true);
		$criteria->compare('item_weight',$this->item_weight);
		$criteria->compare('item_total',$this->item_total,true);
		$criteria->compare('item_attribute_id',$this->item_attribute_id);
		$criteria->compare('item_product_id',$this->item_product_id);
		$criteria->compare('item_product_name',$this->item_product_name,true);
		$criteria->compare('order_id',$this->order_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}