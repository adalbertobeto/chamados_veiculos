<?php

/**
 * This is the model class for table "processo".
 *
 * The followings are the available columns in table 'processo':
 * @property string $pro_id
 * @property string $pro_nome
 * @property string $dep_id
 *
 * The followings are the available model relations:
 * @property Departamento $dep
 */
class Processo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Processo the static model class
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
		return 'processo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pro_nome, dep_id', 'required'),
			array('pro_nome', 'length', 'max'=>45),
			array('dep_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pro_id, pro_nome, dep_id', 'safe', 'on'=>'search'),
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
			'departamento' => array(self::BELONGS_TO, 'Departamento', 'dep_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pro_id' => 'Id',
			'pro_nome' => 'Nome',
			'dep_id' => 'Departamento',
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

		$criteria->compare('pro_id',$this->pro_id,true);
		$criteria->compare('pro_nome',$this->pro_nome,true);
		$criteria->compare('dep_id',$this->dep_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}