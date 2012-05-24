<?php

/**
 * This is the model class for table "{{order_history}}".
 *
 * The followings are the available columns in table '{{order_history}}':
 * @property integer $history_id
 * @property integer $history_employee_id
 * @property integer $history_order_id
 * @property integer $history_state
 * @property string $history_create
 */
class OrderHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderHistory the static model class
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
		return '{{order_history}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('history_employee_id, history_order_id, history_state, history_create', 'required'),
			array('history_employee_id, history_order_id, history_state', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('history_id, history_employee_id, history_order_id, history_state, history_create', 'safe', 'on'=>'search'),
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
			'history_id' => 'History',
			'history_employee_id' => 'History Employee',
			'history_order_id' => 'History Order',
			'history_state' => 'History State',
			'history_create' => 'History Create',
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

		$criteria->compare('history_id',$this->history_id);
		$criteria->compare('history_employee_id',$this->history_employee_id);
		$criteria->compare('history_order_id',$this->history_order_id);
		$criteria->compare('history_state',$this->history_state);
		$criteria->compare('history_create',$this->history_create,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}