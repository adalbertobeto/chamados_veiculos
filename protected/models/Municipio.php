<?php

/**
 * This is the model class for table "municipio
".
 *
 * The followings are the available columns in table 'municipio
':
 * @property string $mun_id
 * @property string $mun_nome
 
 *
 * The followings are the available model relations:
 * @property Tecnico $tec
 */
class Municipio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return municipio
 the static model class
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
		return 'municipio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mun_id, mun_nome', 'required'),
			/*array('cha_nomeusuario, cha_email', 'length', 'max'=>90),
			array('cha_ramal', 'length', 'max'=>20),
			array('tec_id', 'length', 'max'=>10),
			array('cha_email', 'email'),*/
			array('mun_id, mun_nome', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mun_id, mun_nome', 'safe', 'on'=>'search'),
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
			'chamado'  => array(self::BELONGS_TO, 'Chamado', 'mun_id'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mun_id' => 'Id_Municipio',
			'mun_nome' => 'Nome'
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

		$criteria->compare('mun_id',$this->mun_id,true);
		$criteria->compare('mun_nome',$this->mun_nome,true);		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			)
		);
	}
}