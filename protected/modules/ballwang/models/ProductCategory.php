<?php

/**
 * This is the model class for table "{{product_category}}".
 *
 * The followings are the available columns in table '{{product_category}}':
 * @property integer $category_id
 * @property string $category_name
 * @property string $category_url
 * @property integer $category_level
 * @property integer $category_parent_id
 * @property integer $category_seo_id
 * @property string $category_path
 * @property integer $category_order
 * @property integer $category_active
 * @property string $category_introduce
 */
class ProductCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductCategory the static model class
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
		return '{{product_category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_name, category_url, category_level, category_parent_id, category_seo_id, category_path, category_order, category_active, category_introduce', 'required'),
			array('category_level, category_parent_id, category_seo_id, category_order, category_active', 'numerical', 'integerOnly'=>true),
			array('category_name, category_path', 'length', 'max'=>64),
			array('category_url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('category_id, category_name, category_url, category_level, category_parent_id, category_seo_id, category_path, category_order, category_active, category_introduce', 'safe', 'on'=>'search'),
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
			'category_id' => 'Category',
			'category_name' => 'Category Name',
			'category_url' => 'Category Url',
			'category_level' => 'Category Level',
			'category_parent_id' => 'Category Parent',
			'category_seo_id' => 'Category Seo',
			'category_path' => 'Category Path',
			'category_order' => 'Category Order',
			'category_active' => 'Category Active',
			'category_introduce' => 'Category Introduce',
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

		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('category_name',$this->category_name,true);
		$criteria->compare('category_url',$this->category_url,true);
		$criteria->compare('category_level',$this->category_level);
		$criteria->compare('category_parent_id',$this->category_parent_id);
		$criteria->compare('category_seo_id',$this->category_seo_id);
		$criteria->compare('category_path',$this->category_path,true);
		$criteria->compare('category_order',$this->category_order);
		$criteria->compare('category_active',$this->category_active);
		$criteria->compare('category_introduce',$this->category_introduce,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}