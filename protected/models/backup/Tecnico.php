<?php

/**
 * This is the model class for table "tecnico".
 *
 * The followings are the available columns in table 'tecnico':
 * @property string $tec_id
 * @property string $tec_nome
 * @property string $tec_email
 * @property string $tec_telefone
 *
 * The followings are the available model relations:
 * @property Chamado[] $chamados
 */
class Tecnico extends CActiveRecord
{
	public $senha, $senhaantiga, $confirma, $email;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tecnico the static model class
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
		return 'tecnico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tec_nome, tec_email, senha, confirma, senhaantiga', 'required'),
			array('tec_nome, tec_email', 'length', 'max'=>90),
			array('tec_telefone', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('senha, senhaantiga, confirma', 'safe'),
			array('tec_id, tec_nome, tec_email, tec_telefone', 'safe', 'on'=>'search'),
			//array('senhaantiga', 'verificaSenha'),
			//array('confirma', 'confirmaSenha'),
			//array('senha', 'senhaAntiga')
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
			'chamados' => array(self::HAS_MANY, 'Chamado', 'tec_id'),
			'funcao' => array(self::BELONGS_TO, 'Funcao', 'fun_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tec_id' => 'Código',
			'tec_nome' => 'Nome',
			'tec_email' => 'Email',
			'tec_telefone' => 'Telefone',
			'fun_id' => 'Função',
			'senha' => 'Nova Senha',
			'confirma' => 'Confirme a Nova Senha',
			'senhaantiga' => 'Senha Antiga',
		);
	}
	
	public function scopes(){
		return array(
    		'tec'=>array(
          		'condition'=>'fun_id = 2',
    		),
			'gerente'=>array(
          		'condition'=>'fun_id = 3',
    		),
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

		$criteria->compare('tec_id',$this->tec_id,true);
		$criteria->compare('tec_nome',$this->tec_nome,true);
		$criteria->compare('tec_email',$this->tec_email,true);
		$criteria->compare('tec_telefone',$this->tec_telefone,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}