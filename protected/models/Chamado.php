<?php

/**
 * This is the model class for table "chamado".
 *
 * The followings are the available columns in table 'chamado':
 * @property string $cha_id
 * @property string $cha_dpto
 * @property string $cha_processo
 * @property string $cha_nomeusuario
 * @property string $cha_ramal
 * @property string $cha_datacriacao
 * @property string $cha_inicio
 * @property string $cha_termino
 * @property string $cha_email
 * @property string $cha_numCP
 * @property string $tec_id
 * @property string $cha_solucao
 * @property string $cha_naosolucao
 * @property string $cha_dtvolta
 * @property string $cha_dtsaida
 * @property string $cha_municipio
 *
 * The followings are the available model relations:
 * @property Tecnico $tec
 */
class Chamado extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Chamado the static model class
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
		return 'chamado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cha_nomeusuario, cha_ramal, cha_datacriacao, cha_descricao, uni_id, pro_id, cha_email,cha_dtvolta,cha_dtsaida, cha_tipo, mun_id', 'required'),
			array('cha_nomeusuario, cha_email', 'length', 'max'=>90),
			array('cha_ramal', 'length', 'max'=>20),
			array('tec_id', 'length', 'max'=>10),
			array('cha_email', 'email'),
			array('cha_inicio, cha_termino, cha_dpto, mun_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cha_id, cha_nomeusuario, cha_ramal, cha_datacriacao, cha_inicio, cha_termino, cha_email, tec_id, pro_id, cha_comentario, cha_dpto, cha_tipo,cha_dtentrada,cha_dtsaida, mun_id', 'safe', 'on'=>'search'),
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
			'tecnico'  => array(self::BELONGS_TO, 'Tecnico', 'tec_id'),
			'situacao' => array(self::BELONGS_TO, 'Situacao', 'sit_id'),
			'processo' => array(self::BELONGS_TO, 'Processo', 'pro_id'),
			'unidade'  => array(self::BELONGS_TO, 'Unidade', 'uni_id'),
			'municipio'  => array(self::BELONGS_TO, 'Municipio', 'mun_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cha_id' => 'Chamado',
			'cha_tipo' => 'Tipo',
			'cha_dpto' => 'Departamento',
			'cha_processo' => 'Gerência de Área',
			'cha_nomeusuario' => 'Nome',
			'cha_ramal' => 'Ramal/Telefone',
			'cha_datacriacao' => 'Data de criação',
			'cha_inicio' => 'Início do Atendimento',
			'cha_termino' => 'Término do Atendimento',
			'cha_email' => 'Email',
			'cha_descricao' => 'Descrição do Problema',
			'tec_id' => 'Técnico',
			'pro_id' => 'Gerência de Área',
			'uni_id' => 'Unidade',
			'cha_solucao' => 'Solução',
            'cha_naosolucao' => 'Não Solução',
			'sit_id' => 'Situação',
			'cha_dtvolta' => 'Data Volta',
			'cha_dtsaida' => 'Data Saida',
			'mun_id' => 'Municipio'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function beforeSave(){           
            $this->cha_dtvolta= $this->dataMysql($this->cha_dtvolta);  
            $this->cha_dtsaida= $this->dataMysql($this->cha_dtsaida);                               
            return parent::beforeSave();
        } 
    public function dataMysql($data){
		return implode("-",array_reverse(explode("/",$data)));	
	}
        
    public function dataBR($data){
		return implode("/",array_reverse(explode("-",$data)));	
	}    
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cha_id',$this->cha_id,true);
		$criteria->compare('cha_dpto',$this->cha_dpto,true);
		$criteria->compare('mun_id',$this->mun_id,true);
		$criteria->compare('pro_id',$this->pro_id,true);
		$criteria->compare('cha_nomeusuario',$this->cha_nomeusuario,true);
		$criteria->compare('cha_ramal',$this->cha_ramal,true);
		$criteria->compare('cha_datacriacao',$this->cha_datacriacao,true);
		$criteria->compare('cha_inicio',$this->cha_inicio,true);
		$criteria->compare('cha_termino',$this->cha_termino,true);
		$criteria->compare('cha_email',$this->cha_email,true);
		$criteria->compare('tec_id',$this->tec_id,true);
		$criteria->compare('sit_id',$this->sit_id,true);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			)
		);
	}
}