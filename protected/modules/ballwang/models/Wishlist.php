<?php

/**
 * This is the model class for table "{{wishlist}}".
 *
 * The followings are the available columns in table '{{wishlist}}':
 * @property integer $wish_id
 * @property integer $product_id
 * @property integer $attribute_id
 * @property integer $product_qty
 * @property integer $currency_id
 * @property integer $customer_id
 * @property string $wish_addtime
 */
class Wishlist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Wishlist the static model class
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
		return '{{wishlist}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, attribute_id, product_qty, currency_id, customer_id, wish_addtime', 'required'),
			array('product_id, attribute_id, product_qty, currency_id, customer_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('wish_id, product_id, attribute_id, product_qty, currency_id, customer_id, wish_addtime', 'safe', 'on'=>'search'),
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
			'wish_id' => 'Wish',
			'product_id' => 'Product',
			'attribute_id' => 'Attribute',
			'product_qty' => 'Product Qty',
			'currency_id' => 'Currency',
			'customer_id' => 'Customer',
			'wish_addtime' => 'Wish Addtime',
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

		$criteria->compare('wish_id',$this->wish_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('attribute_id',$this->attribute_id);
		$criteria->compare('product_qty',$this->product_qty);
		$criteria->compare('currency_id',$this->currency_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('wish_addtime',$this->wish_addtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}