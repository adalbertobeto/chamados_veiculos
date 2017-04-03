<?php

/**
 * This is the model class for table "situacao".
 *
 * The followings are the available columns in table 'situacao':
 * @property string $sit_id
 * @property string $sit_descricao
 *
 * The followings are the available model relations:
 * @property Chamado[] $chamados
 */
class Situacao extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Situacao the static model class
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
		return 'situacao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sit_descricao', 'required'),
			array('sit_descricao', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sit_id, sit_descricao', 'safe', 'on'=>'search'),
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
			'chamados' => array(self::HAS_MANY, 'Chamado', 'sit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sit_id' => 'Sit',
			'sit_descricao' => 'Sit Descricao',
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

		$criteria->compare('sit_id',$this->sit_id,true);
		$criteria->compare('sit_descricao',$this->sit_descricao,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}