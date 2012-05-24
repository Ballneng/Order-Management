<?php

/**
 * This is the model class for table "{{product_together}}".
 *
 * The followings are the available columns in table '{{product_together}}':
 * @property integer $together_id
 * @property integer $product_id
 * @property integer $relate_product_id
 * @property integer $price_id
 * @property string $together_status
 */
class ProductTogether extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductTogether the static model class
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
		return '{{product_together}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('together_id, product_id, relate_product_id, price_id, together_status', 'required'),
			array('together_id, product_id, relate_product_id, price_id', 'numerical', 'integerOnly'=>true),
			array('together_status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('together_id, product_id, relate_product_id, price_id, together_status', 'safe', 'on'=>'search'),
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
			'together_id' => 'Together',
			'product_id' => 'Product',
			'relate_product_id' => 'Relate Product',
			'price_id' => 'Price',
			'together_status' => 'Together Status',
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

		$criteria->compare('together_id',$this->together_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('relate_product_id',$this->relate_product_id);
		$criteria->compare('price_id',$this->price_id);
		$criteria->compare('together_status',$this->together_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}