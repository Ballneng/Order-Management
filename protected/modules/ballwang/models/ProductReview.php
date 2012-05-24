<?php

/**
 * This is the model class for table "{{product_review}}".
 *
 * The followings are the available columns in table '{{product_review}}':
 * @property integer $review_id
 * @property integer $review_product_id
 * @property string $review_product_sku
 * @property string $review_subject
 * @property string $review_content
 * @property string $review_reply
 * @property string $review_email
 * @property integer $review_customer_id
 * @property string $review_create_at
 * @property string $review_reply_at
 */
class ProductReview extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductReview the static model class
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
		return '{{product_review}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('review_product_id, review_product_sku, review_subject, review_content, review_reply, review_email, review_customer_id, review_create_at, review_reply_at', 'required'),
			array('review_product_id, review_customer_id', 'numerical', 'integerOnly'=>true),
			array('review_product_sku', 'length', 'max'=>64),
			array('review_subject, review_content, review_reply', 'length', 'max'=>255),
			array('review_email', 'length', 'max'=>96),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('review_id, review_product_id, review_product_sku, review_subject, review_content, review_reply, review_email, review_customer_id, review_create_at, review_reply_at', 'safe', 'on'=>'search'),
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
			'review_id' => 'Review',
			'review_product_id' => 'Review Product',
			'review_product_sku' => 'Review Product Sku',
			'review_subject' => 'Review Subject',
			'review_content' => 'Review Content',
			'review_reply' => 'Review Reply',
			'review_email' => 'Review Email',
			'review_customer_id' => 'Review Customer',
			'review_create_at' => 'Review Create At',
			'review_reply_at' => 'Review Reply At',
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

		$criteria->compare('review_id',$this->review_id);
		$criteria->compare('review_product_id',$this->review_product_id);
		$criteria->compare('review_product_sku',$this->review_product_sku,true);
		$criteria->compare('review_subject',$this->review_subject,true);
		$criteria->compare('review_content',$this->review_content,true);
		$criteria->compare('review_reply',$this->review_reply,true);
		$criteria->compare('review_email',$this->review_email,true);
		$criteria->compare('review_customer_id',$this->review_customer_id);
		$criteria->compare('review_create_at',$this->review_create_at,true);
		$criteria->compare('review_reply_at',$this->review_reply_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}