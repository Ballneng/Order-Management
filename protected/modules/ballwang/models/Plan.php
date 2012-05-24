<?php

/**
 * This is the model class for table "{{plan}}".
 *
 * The followings are the available columns in table '{{plan}}':
 * @property integer $plan_id
 * @property string $plan_name
 * @property double $plan_min
 * @property double $plan_free
 * @property integer $plan_percent
 * @property string $plan_time_begin
 * @property string $plan_time_end
 * @property integer $plan_active
 */
class Plan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Plan the static model class
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
		return '{{plan}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plan_name, plan_min, plan_free, plan_percent, plan_time_begin, plan_active', 'required'),
			array('plan_percent, plan_active', 'numerical', 'integerOnly'=>true),
			array('plan_min, plan_free', 'numerical'),
			array('plan_name', 'length', 'max'=>255),
			array('plan_time_end', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('plan_id, plan_name, plan_min, plan_free, plan_percent, plan_time_begin, plan_time_end, plan_active', 'safe', 'on'=>'search'),
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
			'plan_id' => 'Plan',
			'plan_name' => 'Plan Name',
			'plan_min' => 'Plan Min',
			'plan_free' => 'Plan Free',
			'plan_percent' => 'Plan Percent',
			'plan_time_begin' => 'Plan Time Begin',
			'plan_time_end' => 'Plan Time End',
			'plan_active' => 'Plan Active',
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

		$criteria->compare('plan_id',$this->plan_id);
		$criteria->compare('plan_name',$this->plan_name,true);
		$criteria->compare('plan_min',$this->plan_min);
		$criteria->compare('plan_free',$this->plan_free);
		$criteria->compare('plan_percent',$this->plan_percent);
		$criteria->compare('plan_time_begin',$this->plan_time_begin,true);
		$criteria->compare('plan_time_end',$this->plan_time_end,true);
		$criteria->compare('plan_active',$this->plan_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}