<?php

class TecnicoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','visualizar','create','atualizar','admin','delete'),
				'expression'=>"Yii::app()->user->getState('funcao') == '1'",
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','visualizar','create','atualizar','admin','delete'),
				'expression'=>"Yii::app()->user->getState('funcao') == '3'",
			),
			array('allow',
				'actions'=>array('trocasenha'),
				'users'=>array('@')
			),
			array('allow',
				'actions'=>array('esqueci'),
				'users'=>array('*')
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionVisualizar($id)
	{
		$this->render('visualizar',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tecnico;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tecnico']))
		{
			$model->attributes = $_POST['Tecnico'];
			$model->fun_id = $_POST['Tecnico']['fun_id'];
                        $model->tec_senha = md5('123456');
			$model->senha = '1';
			$model->senhaantiga = '1';
			$model->confirma = '1';
			if($model->save())
				$this->redirect(array('visualizar','id'=>$model->tec_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionAtualizar($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tecnico']))
		{
			$model->attributes = $_POST['Tecnico'];
			$model->fun_id = $_POST['Tecnico']['fun_id'];
			$model->senha = '1';
			$model->senhaantiga = '1';
			$model->confirma = '1';
			if($model->save())
				$this->redirect(array('visualizar','id'=>$model->tec_id));
		}

		$this->render('atualizar',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tecnico');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tecnico('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tecnico']))
			$model->attributes=$_GET['Tecnico'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionTrocasenha(){
		$model = Tecnico::model()->findByPk(Yii::app()->user->getState('id'));
		
		if(isset($_POST['Tecnico']))
		{
			$model->attributes = $_POST['Tecnico'];
			if ($model->tec_senha !== md5($model->senhaantiga))
				$model->addError('senhaantiga', 'Senha incorreta!');
			else
				if ($model->senha !== $model->confirma)
					$model->addError('confirma', 'Senhas não conferem!');
				else	
				if ($model->senha == $model->senhaantiga)
					$model->addError('senha', 'Senha nova deve ser diferente de senha antiga!');
				else{
					$model->tec_senha = md5($model->senha);
					if($model->save())
						$this->redirect(array('trocasenha','troca'=>'yes'));
				}
		}
		if(isset($_GET['troca']))
			$troca = $_GET['troca'];
		else
			$troca = '';
		$this->render('trocasenha',array(
			'model'=>$model,
			'troca'=> $troca,
		));
		
	}
	
	public function actionEsqueci(){
		$model = new Tecnico;
		
		if(isset($_POST['Tecnico']))
		{
			$model->email = $_POST['Tecnico']['email'];
			if ($model->email == ''){
				$model->addError('email', 'Informe um email!');
			}
			else{
				$tecnico = Tecnico::model()->findByAttributes(array('tec_email' => $model->email));
				if (!$tecnico)
					$model->addError('email', 'Email não encontrado!');
				else
				{
					$msgusu = new YiiMailMessage;
					$msgusu->setBody(
								'<h2>Recuperação de Senha do Sistema de Refrigeracao</h2>
								 <p>Sua senha é:' . $tecnico->tec_senha . '</p>', 
								'text/html');
					$msgusu->subject = 'Recuperação de Senha do Sistema de Refrigeracao';
				
					$msgusu->addTo($tecnico->tec_email);	
				
					$msgusu->from = 'sistemas@amazonasenergia.gov.br';
					Yii::app()->mail->send($msgusu);
				}
			}
		}
		$this->render('esqueci', array('model' => $model, 'troca' => 'no'));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Tecnico::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tecnico-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
