<?php

/**
 * This is the model class for table "{{promo}}".
 *
 * The followings are the available columns in table '{{promo}}':
 * @property integer $promo_id
 * @property string $promo_name
 * @property double $promo_free
 * @property integer $promo_times
 * @property string $promo_time_begin
 * @property string $promo_time_end
 * @property integer $promo_active
 */
class Promo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Promo the static model class
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
		return '{{promo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('promo_name, promo_free, promo_times, promo_time_begin, promo_time_end, promo_active', 'required'),
			array('promo_times, promo_active', 'numerical', 'integerOnly'=>true),
			array('promo_free', 'numerical'),
			array('promo_name', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('promo_id, promo_name, promo_free, promo_times, promo_time_begin, promo_time_end, promo_active', 'safe', 'on'=>'search'),
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
			'promo_id' => 'Promo',
			'promo_name' => 'Promo Name',
			'promo_free' => 'Promo Free',
			'promo_times' => 'Promo Times',
			'promo_time_begin' => 'Promo Time Begin',
			'promo_time_end' => 'Promo Time End',
			'promo_active' => 'Promo Active',
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

		$criteria->compare('promo_id',$this->promo_id);
		$criteria->compare('promo_name',$this->promo_name,true);
		$criteria->compare('promo_free',$this->promo_free);
		$criteria->compare('promo_times',$this->promo_times);
		$criteria->compare('promo_time_begin',$this->promo_time_begin,true);
		$criteria->compare('promo_time_end',$this->promo_time_end,true);
		$criteria->compare('promo_active',$this->promo_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}