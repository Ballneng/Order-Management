<?php

/**
 * This is the model class for table "{{country}}".
 *
 * The followings are the available columns in table '{{country}}':
 * @property integer $country_id
 * @property string $name
 * @property integer $zone_id
 * @property string $ISO_code
 * @property integer $active
 * @property integer $contain_states
 */
class Country extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Country the static model class
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
		return '{{country}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, zone_id, ISO_code, active, contain_states', 'required'),
			array('zone_id, active, contain_states', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('ISO_code', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('country_id, name, zone_id, ISO_code, active, contain_states', 'safe', 'on'=>'search'),
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
			'country_id' => 'Country',
			'name' => 'Name',
			'zone_id' => 'Zone',
			'ISO_code' => 'Iso Code',
			'active' => 'Active',
			'contain_states' => 'Contain States',
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

		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('zone_id',$this->zone_id);
		$criteria->compare('ISO_code',$this->ISO_code,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('contain_states',$this->contain_states);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}