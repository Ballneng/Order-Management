<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $product_id
 * @property string $product_name
 * @property string $product_name_alias
 * @property string $product_sku
 * @property string $product_url
 * @property double $product_weight
 * @property integer $product_base_price
 * @property integer $product_orig_price
 * @property integer $product_special_price
 * @property integer $product_stock_qty
 * @property integer $product_stock_cart_min
 * @property integer $product_stock_cart_max
 * @property integer $product_stock_status
 * @property integer $product_status
 * @property integer $product_active
 * @property string $product_short_description
 * @property string $product_description
 * @property integer $product_seo_id
 * @property integer $product_category_id
 * @property integer $product_promotion
 * @property integer $product_wholesale
 * @property integer $product_feature
 * @property integer $product_freeshiping
 * @property string $product_accessory
 * @property string $product_together
 * @property string $product_create_at
 * @property string $product_last_update
 * @property integer $product_new_arrivals
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_name, product_name_alias, product_sku, product_url, product_weight, product_base_price, product_orig_price, product_special_price, product_stock_qty, product_stock_cart_min, product_stock_cart_max, product_stock_status, product_status, product_active, product_short_description, product_description, product_seo_id, product_category_id, product_promotion, product_wholesale, product_feature, product_freeshiping, product_accessory, product_together, product_create_at, product_last_update, product_new_arrivals', 'required'),
			array('product_base_price, product_orig_price, product_special_price, product_stock_qty, product_stock_cart_min, product_stock_cart_max, product_stock_status, product_status, product_active, product_seo_id, product_category_id, product_promotion, product_wholesale, product_feature, product_freeshiping, product_new_arrivals', 'numerical', 'integerOnly'=>true),
			array('product_weight', 'numerical'),
			array('product_name, product_name_alias, product_url', 'length', 'max'=>100),
			array('product_sku', 'length', 'max'=>64),
			array('product_short_description', 'length', 'max'=>512),
			array('product_accessory, product_together', 'length', 'max'=>96),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_id, product_name, product_name_alias, product_sku, product_url, product_weight, product_base_price, product_orig_price, product_special_price, product_stock_qty, product_stock_cart_min, product_stock_cart_max, product_stock_status, product_status, product_active, product_short_description, product_description, product_seo_id, product_category_id, product_promotion, product_wholesale, product_feature, product_freeshiping, product_accessory, product_together, product_create_at, product_last_update, product_new_arrivals', 'safe', 'on'=>'search'),
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
			'product_name' => 'Product Name',
			'product_name_alias' => 'Product Name Alias',
			'product_sku' => 'Product Sku',
			'product_url' => 'Product Url',
			'product_weight' => 'Product Weight',
			'product_base_price' => 'Product Base Price',
			'product_orig_price' => 'Product Orig Price',
			'product_special_price' => 'Product Special Price',
			'product_stock_qty' => 'Product Stock Qty',
			'product_stock_cart_min' => 'Product Stock Cart Min',
			'product_stock_cart_max' => 'Product Stock Cart Max',
			'product_stock_status' => 'Product Stock Status',
			'product_status' => 'Product Status',
			'product_active' => 'Product Active',
			'product_short_description' => 'Product Short Description',
			'product_description' => 'Product Description',
			'product_seo_id' => 'Product Seo',
			'product_category_id' => 'Product Category',
			'product_promotion' => 'Product Promotion',
			'product_wholesale' => 'Product Wholesale',
			'product_feature' => 'Product Feature',
			'product_freeshiping' => 'Product Freeshiping',
			'product_accessory' => 'Product Accessory',
			'product_together' => 'Product Together',
			'product_create_at' => 'Product Create At',
			'product_last_update' => 'Product Last Update',
			'product_new_arrivals' => 'Product New Arrivals',
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
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('product_name_alias',$this->product_name_alias,true);
		$criteria->compare('product_sku',$this->product_sku,true);
		$criteria->compare('product_url',$this->product_url,true);
		$criteria->compare('product_weight',$this->product_weight);
		$criteria->compare('product_base_price',$this->product_base_price);
		$criteria->compare('product_orig_price',$this->product_orig_price);
		$criteria->compare('product_special_price',$this->product_special_price);
		$criteria->compare('product_stock_qty',$this->product_stock_qty);
		$criteria->compare('product_stock_cart_min',$this->product_stock_cart_min);
		$criteria->compare('product_stock_cart_max',$this->product_stock_cart_max);
		$criteria->compare('product_stock_status',$this->product_stock_status);
		$criteria->compare('product_status',$this->product_status);
		$criteria->compare('product_active',$this->product_active);
		$criteria->compare('product_short_description',$this->product_short_description,true);
		$criteria->compare('product_description',$this->product_description,true);
		$criteria->compare('product_seo_id',$this->product_seo_id);
		$criteria->compare('product_category_id',$this->product_category_id);
		$criteria->compare('product_promotion',$this->product_promotion);
		$criteria->compare('product_wholesale',$this->product_wholesale);
		$criteria->compare('product_feature',$this->product_feature);
		$criteria->compare('product_freeshiping',$this->product_freeshiping);
		$criteria->compare('product_accessory',$this->product_accessory,true);
		$criteria->compare('product_together',$this->product_together,true);
		$criteria->compare('product_create_at',$this->product_create_at,true);
		$criteria->compare('product_last_update',$this->product_last_update,true);
		$criteria->compare('product_new_arrivals',$this->product_new_arrivals);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}