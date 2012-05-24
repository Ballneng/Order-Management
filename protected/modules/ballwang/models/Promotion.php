<?php

/**
 * This is the model class for table "{{promotion}}".
 *
 * The followings are the available columns in table '{{promotion}}':
 * @property integer $promotion_id
 * @property double $promotion_price
 * @property double $promotion_percent
 * @property integer $promotion_type
 * @property string $promotion_start_at
 * @property string $promotion_end_at
 * @property integer $promotion_status
 * @property integer $promotion_group_id
 * @property integer $promotion_product_id
 */
class Promotion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Promotion the static model class
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
		return '{{promotion}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('promotion_price, promotion_percent, promotion_type, promotion_start_at, promotion_end_at, promotion_status, promotion_group_id, promotion_product_id', 'required'),
			array('promotion_type, promotion_status, promotion_group_id, promotion_product_id', 'numerical', 'integerOnly'=>true),
			array('promotion_price, promotion_percent', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('promotion_id, promotion_price, promotion_percent, promotion_type, promotion_start_at, promotion_end_at, promotion_status, promotion_group_id, promotion_product_id', 'safe', 'on'=>'search'),
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
			'promotion_id' => 'Promotion',
			'promotion_price' => 'Promotion Price',
			'promotion_percent' => 'Promotion Percent',
			'promotion_type' => 'Promotion Type',
			'promotion_start_at' => 'Promotion Start At',
			'promotion_end_at' => 'Promotion End At',
			'promotion_status' => 'Promotion Status',
			'promotion_group_id' => 'Promotion Group',
			'promotion_product_id' => 'Promotion Product',
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

		$criteria->compare('promotion_id',$this->promotion_id);
		$criteria->compare('promotion_price',$this->promotion_price);
		$criteria->compare('promotion_percent',$this->promotion_percent);
		$criteria->compare('promotion_type',$this->promotion_type);
		$criteria->compare('promotion_start_at',$this->promotion_start_at,true);
		$criteria->compare('promotion_end_at',$this->promotion_end_at,true);
		$criteria->compare('promotion_status',$this->promotion_status);
		$criteria->compare('promotion_group_id',$this->promotion_group_id);
		$criteria->compare('promotion_product_id',$this->promotion_product_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}