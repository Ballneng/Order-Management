<?php

/**
 * This is the model class for table "{{product_collection}}".
 *
 * The followings are the available columns in table '{{product_collection}}':
 * @property integer $product_id
 * @property string $product_name
 * @property string $product_sku
 * @property integer $product_site_id
 */
class ProductCollection extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductCollection the static model class
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
		return '{{product_collection}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_name, product_sku, product_site_id', 'required'),
			array('product_site_id', 'numerical', 'integerOnly'=>true),
			array('product_name, product_sku', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_id, product_name, product_sku, product_site_id', 'safe', 'on'=>'search'),
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
			'product_sku' => 'Product Sku',
			'product_site_id' => 'Product Site',
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
		$criteria->compare('product_sku',$this->product_sku,true);
		$criteria->compare('product_site_id',$this->product_site_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}