<?php

/**
 * This is the model class for table "{{site}}".
 *
 * The followings are the available columns in table '{{site}}':
 * @property integer $site_id
 * @property string $site_name
 * @property string $site_prefix
 * @property string $site_db_host
 * @property string $site_db_name
 * @property string $site_db_password
 * @property integer $site_attribute_id
 */
class Site extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Site the static model class
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
		return '{{site}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('site_name, site_prefix, site_db_host, site_db_name, site_db_password, site_attribute_id', 'required','message'=>'{attribute}内容不能为空！'),
			array('site_attribute_id', 'numerical', 'integerOnly'=>true),
			array('site_name, site_prefix, site_db_host, site_db_name, site_db_password', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('site_id, site_name, site_prefix, site_db_host, site_db_name, site_db_password, site_attribute_id', 'safe', 'on'=>'search'),
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
			'site_id' => '网站ID',
			'site_name' => '站点名称',
			'site_prefix' => '网站代码',
			'site_db_host' => '数据库地址',
			'site_db_name' => '数据库帐号',
			'site_db_password' => '数据库密码',
			'site_attribute_id' => '网站类型',
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

		$criteria->compare('site_id',$this->site_id);
		$criteria->compare('site_name',$this->site_name,true);
		$criteria->compare('site_prefix',$this->site_prefix,true);
		$criteria->compare('site_db_host',$this->site_db_host,true);
		$criteria->compare('site_db_name',$this->site_db_name,true);
		$criteria->compare('site_db_password',$this->site_db_password,true);
		$criteria->compare('site_attribute_id',$this->site_attribute_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}