<?php

/**
 * This is the model class for table "unidade".
 *
 * The followings are the available columns in table 'unidade':
 * @property string $uni_id
 * @property string $uni_nome
 *
 * The followings are the available model relations:
 * @property Chamado[] $chamados
 */
class Unidade extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Unidade the static model class
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
		return 'unidade';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uni_nome', 'required'),
			array('uni_nome', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uni_id, uni_nome', 'safe', 'on'=>'search'),
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
			'chamados' => array(self::HAS_MANY, 'Chamado', 'uni_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uni_id' => 'Id',
			'uni_nome' => 'Nome',
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

		$criteria->compare('uni_id',$this->uni_id,true);
		$criteria->compare('uni_nome',$this->uni_nome,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}