<?php

/**
 * This is the model class for table "{{employee}}".
 *
 * The followings are the available columns in table '{{employee}}':
 * @property string $employee_ID
 * @property string $employee_name
 * @property string $employee_email
 * @property string $employee_passwd
 * @property integer $employee_active
 */
class Employee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Employee the static model class
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
		return '{{employee}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_name, employee_email, employee_passwd, employee_active', 'required'),
			array('employee_active', 'numerical', 'integerOnly'=>true),
			array('employee_name, employee_passwd', 'length', 'max'=>32),
			array('employee_email', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_ID, employee_name, employee_email, employee_passwd, employee_active', 'safe', 'on'=>'search'),
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
			'employee_ID' => 'Employee',
			'employee_name' => 'Employee Name',
			'employee_email' => 'Employee Email',
			'employee_passwd' => 'Employee Passwd',
			'employee_active' => 'Employee Active',
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

		$criteria->compare('employee_ID',$this->employee_ID,true);
		$criteria->compare('employee_name',$this->employee_name,true);
		$criteria->compare('employee_email',$this->employee_email,true);
		$criteria->compare('employee_passwd',$this->employee_passwd,true);
		$criteria->compare('employee_active',$this->employee_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}