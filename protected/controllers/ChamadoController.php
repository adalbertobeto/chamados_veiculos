<?php
include "validaData.php";


class ChamadoController extends Controller
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
				'actions'=>array('visualizar','create', 'carregarprocessos'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','fechar','resSearchporRealizados', 'visualizarTelaCheia'),
				'expression'=>"Yii::app()->user->getState('funcao') == '2'",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','atualizar','pegarchamado','fechar','index','resSearchporRealizados', 'resSearchporChamadosRealizados', 'resSearchporChamadosEmAberto', 'pdfresSearchChamado', 'visualizarTelaCheia'),
				'expression'=>"Yii::app()->user->getState('funcao') == '1'",
				
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','atualizar','pegarchamado','fechar','index','delete','resSearchporRealizados', 'visualizarTelaCheia'),
				'expression'=>"Yii::app()->user->getState('funcao') == '3'",
				
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
		$model = new Chamado;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Chamado']))
		{
			$erro = false;
			$model->attributes = $_POST['Chamado'];
			$model->cha_datacriacao = date('Y-m-d H:i');
			$model->sit_id = 1;
			$model->tec_id = 1;
			//$model->mun_id = $_POST['chamado']['mun_id'];
			if ($model->pro_id == 'empty')
				$model->pro_id = '';
            if (!validaData($model->dataMysql($model->cha_dtvolta)))
               $erro = true;
               $model->addError('cha_dtvolta',$model->dataBR($model->cha_dtvolta).' é uma data Inválida, favor corrigi-la.');
            if (!validaData($model->dataMysql($model->cha_dtsaida)))
               $erro = true;
               $model->addError('cha_dtsaida',$model->dataBR($model->cha_dtsaida).' é uma data Inválida, favor corrigi-la.');
            if (!$erro) {
				if($model->save()){
					
					$link = $this->createAbsoluteUrl("chamado/visualizar",array("id" => $model->cha_id));
					$tecnicos = Tecnico::model()->findAll();
					
					if ($model->cha_email <> ''){
						// Enviar email para quem abriu o chamado
						$msgusu = new YiiMailMessage;
						$msgusu->setBody(
									'<h2>Chamado Aberto no Sistema de Solicitação de Veiculos</h2>
									 <p>O N&uacute;mero do seu chamado &eacute; ' . $model->cha_id . '</p>
									 <p>Em breve estaremos solucionando o seu problema.</p>', 
									'text/html');
						$msgusu->subject = 'Chamado Aberto no Sistema de Solicitação de Veiculos';
					
						$msgusu->addTo($model->cha_email);	
					
						$msgusu->from = 'sistemas@admin.com';
						Yii::app()->mail->send($msgusu);
					}
					
					// Enviar para os técnicos
					
					foreach($tecnicos as $tecnico){ 	
						$msgtec = new YiiMailMessage;
						$msgtec->setBody(
										 '<h2>Chamado Aberto no Sistema de Solicitação de Veiculos</h2>
										 <p>Chamado aberto no sistema No ' . $model->cha_id . '</p>
										 <p>Link abaixo para acesso ao chamado.</p>
										 <p>' . $link . '</p>',
										 'text/html');
						$msgtec->subject = 'Chamado Aberto no Sistema de Solicitação de Veiculos';
						$msgtec->addTo($tecnico->tec_email);	
						$msgtec->from = 'sistemas@admin.com';
						Yii::app()->mail->send($msgtec);
					}

					$this->redirect(array('visualizar','id'=>$model->cha_id));
				}
		    }
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

		if(isset($_POST['Chamado']))
		{
                        //$debug = fopen('debug.txt', 'r+');
                        //fwrite($debug, print_r($modelAntes->attributes, true));
                        
			$model->attributes=$_POST['Chamado'];
                        //fwrite($debug, print_r($modelAntes->attributes, true));
			if($model->save()) {
                                if ($model->cha_email <> ''){
					// Enviar email para quem abriu o chamado
					$msgusu = new YiiMailMessage;
					$msgusu->setBody(
								'<h2>Chamado Atualizado no Sistema de Solicitação de Veiculos</h2>'.
                                                                '<b> Houveram atualizações no seu chamado </b> <br/>'.
								 '<b>Chamado: </b>'.$model->cha_id.'<br/>'.
								 '<b>Unidade: </b>'.$model->unidade->uni_nome.'<br/>'.
								 '<b>Departamento: </b>'.$model->processo->departamento->dep_nome.'<br/>'.
								 '<b>Gerência de Área: </b>'.$model->processo->pro_nome.'<br/>'.
								 '<b>Nome: </b>'.$model->cha_nomeusuario.'<br/>'.
								 '<b>Ramal/Telefone: </b>'.$model->cha_ramal.'<br/>'.
								 '<b>Data da Criacao: </b>'.$model->cha_datacriacao.'<br/>'.
								 '<b>Inicio do Atendimento: </b>'.$model->cha_inicio . '<br/>'.
								 '<b>Email: </b>'.$model->cha_email.'<br/>'.
								 '<b>Tecnico: </b>'.$model->tecnico->tec_nome . '<br/>'.
								 '<b>Descricao do Problema: </b>'.$model->cha_descricao . '<br/>',
								 'text/html');
					$msgusu->subject = 'Chamado Atualizado no Sistema de Solicitação de Veiculos';
				
					$msgusu->addTo($model->cha_email);
				
					$msgusu->from = 'sistemas@admin.com';
					Yii::app()->mail->send($msgusu);
				}
                                
                                if($model->tecnico->tec_id) {
                                    //fwrite($debug, $model->tecnico->tec_nome);
                                    $tecnicos = $model->tecnico;
                                }
                                else
                                    $tecnicos = Tecnico::model()->findAll();
                                foreach($tecnicos as $tecnico){ 	
					$msgtec = new YiiMailMessage;
					$msgtec->setBody(
									 '<h2>Chamado Atualizado no Sistema de Solicitação de Veiculos</h2>
									 <p>Chamado Atualizado no sistema No ' . $model->cha_id . '</p>
									 <p>Link abaixo para acesso ao chamado.</p>
									 <p>' . $link . '</p>',
									 'text/html');
					$msgtec->subject = 'Chamado Aberto no Sistema de Solicitação de Veiculos';
					$msgtec->addTo($tecnico->tec_email);	
					$msgtec->from = 'sistemas@admin.com';
					Yii::app()->mail->send($msgtec);
				}
                            
				$this->redirect(array('visualizar','id'=>$model->cha_id));
                        }
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
			throw new CHttpException(400,'Solicitação inválida!');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->redirect(array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Chamado('search');
		$model->unsetAttributes();  // clear any default values
		$model->sit_id = 1;
		
		if(isset($_GET['Chamado'])){
			$model->attributes=$_GET['Chamado'];
			$model->sit_id = $_GET['Chamado']['sit_id'];
			if ($model->cha_datacriacao <> ''){
				$datacriacao = explode('/',$model->cha_datacriacao);
				$model->cha_datacriacao = $datacriacao[2] . '-' . $datacriacao[1] . '-' . $datacriacao[0];
			}
		}
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Chamado::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='chamado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionPegarchamado($id)
	{
		$model = $this->loadModel($id);

		if(isset($_POST['Chamado']))
		{
			$model->attributes=$_POST['Chamado'];
			if (!isset($model->cha_inicio))
				$model->cha_inicio = date('Y-m-d H:i');
			if($model->save())
				if ($model->cha_email <> ''){
					// Enviar email informando ao solicitante para que tecnico foi direcionado o chamado
					$msgusu = new YiiMailMessage;
					$msgusu->setBody(
								'<h2>Chamado Atribuido a Tecnico</h2>
								 <p>Seu chamado foi processado e em breve o tecnico ' . $model->tecnico->tec_nome . ' estara lhe atendendo.</p>', 
								'text/html');
					$msgusu->subject = 'Chamado Aberto no Sistema de Solicitação de Veiculos';
				
					$msgusu->addTo($model->cha_email);	
				
					$msgusu->from = 'sistemas@admin.com';
					Yii::app()->mail->send($msgusu);
					
					// Enviar email para o tecnico informando sobre chamado aberto
					$msgusu = new YiiMailMessage;
					$msgusu->setBody(
								 '<h2>Chamado Atribuido a Tecnico</h2>'.
								 '<b>Chamado: </b>'.$model->cha_id . '<br/>'.
								 '<b>Unidade: </b>'.$model->unidade->uni_nome . '<br/>'.
								 '<b>Departamento: </b>'.$model->processo->departamento->dep_nome . '<br/>'.
								 '<b>Gerência de Área: </b>'.$model->processo->pro_nome . '<br/>'.
								 '<b>Nome: </b>'.$model->cha_nomeusuario. '<br/>'.
								 '<b>Ramal/Telefone: </b>'.$model->cha_ramal . '<br/>'.
								 '<b>Data da Criacao: </b>'.$model->cha_datacriacao. '<br/>'.
								 '<b>Inicio do Atendimento: </b>'.$model->cha_inicio . '<br/>'.
								 '<b>Email: </b>'.$model->cha_email. '<br/>'.
								 '<b>Tecnico: </b>'.$model->tecnico->tec_nome . '<br/>'.
								 '<b>Descricao do Problema: </b>'.$model->cha_descricao . '<br/>'.
								 'text/html');
					$msgusu->subject = 'Chamado Aberto no Sistema de Solicitação de Veiculos';
				
					$msgusu->addTo($model->tecnico->tec_email);	
				
					$msgusu->from = 'sistemas@admin.com';
					Yii::app()->mail->send($msgusu);
				}
				$this->redirect(array('visualizar','id'=>$model->cha_id));
		}
		$this->render('pegarchamado',array(
				'model' => $model,
			));
	}
	
	public function actionFechar($id)
	{
		$model = $this->loadModel($id);
		$model->cha_termino = date('Y-m-d h:i');
		$model->sit_id = 2;
		if(isset($_POST['Chamado']))
		{
			print_r($_POST['Chamado']);
			$model->attributes=$_POST['Chamado'];
			$model->cha_solucao = $_POST['Chamado']['cha_solucao'];
                        //$model->cha_naosolucao = $_POST['Chamado']['cha_naosolucao'];
            $solucao = $_POST['Chamado']['cha_solucao'];
                        //$naoSolucao = $_POST['Chamado']['cha_naosolucao'];
			if($model->save())
				if ($model->cha_email <> ''){
                                    if ($solucao <> ''){
					// Enviar email para quem abriu o chamado
					$msgusu = new YiiMailMessage;
					$msgusu->setBody(
								'<h2>Chamado Finalizado</h2>
								 <p>Solução do problema: '.$solucao.'</p>
                                 <p>Esperamos ter lhe atendido bem!</p>', 
								'text/html');
					$msgusu->subject = 'Chamado Aberto no Sistema de Solicitação de Veiculos';
				
					$msgusu->addTo($model->cha_email);	
				
					$msgusu->from = 'sistemas@admin.com';
					Yii::app()->mail->send($msgusu);
				}
                                /*if ($model->cha_email <> ''){
                                    if ($naoSolucao <> ''){
					// Enviar email para quem abriu o chamado
					$msgusu = new YiiMailMessage;
					$msgusu->setBody(
								'<h2>Chamado Finalizado</h2>
								 <p>Não foi solucionado o problema devido a: '.$naoSolucao.'</p>', 
								'text/html');
					$msgusu->subject = 'Chamado Aberto no Sistema de Refrigeracao';
				
					$msgusu->addTo($model->cha_email);	
				
					$msgusu->from = 'sistemas@amazonasenergia.gov.br';
					Yii::app()->mail->send($msgusu);
				}
                              }*/
                       } 
				$this->redirect(array('visualizar','id'=>$model->cha_id));
		}
		$this->render('finalizar',array(
				'model' => $model,
			));
	}
	
	public function actionCarregarprocessos($departamento){
		if ($departamento == '')
			$departamento = '0';
		
		$criteria = new CDbCriteria();
		$criteria->order='pro_nome';
		$criteria->condition = 'dep_id = ' . $departamento;
		echo CHtml::tag('option',
                   array('value'=>''),CHtml::encode('Selecione um Processo -->'),true);
		$data = Processo::model()->findAll($criteria);
 
    	$data = CHtml::listData($data,'pro_id','pro_nome');
    	foreach($data as $value=>$name)
    	{
        	echo CHtml::tag('option',
                   array('value'=>$value),CHtml::encode($name),true);
    	}	
	}  
          
       
         public function actionPdfresSearchChamado($render)	{
             //$debug = fopen("debug.txt", "a");
               //fwrite($debug, "\nChamadoManu - Chamado Controler - actionPdfresSearchChamado - render = ". $render);
               
	       //$html = $this->renderPartial($_GET['render'], array('id_contrato'=>$_GET['id_contrato'],), true);
               $html = $this->renderPartial($render, array(
				'model'=>new Chamado('search'),
				'depModel'=>new Departamento()
			   ), true);                              
               /* Diretorio que será salvo */
               $dir = dirname(__FILE__) . '/relchamado/';
               
               /* Nome do arquivo */        
               $file = $_GET['file'].time() . '.pdf';        
               
               /* Importando a classe */        
               Yii::import('application.extensions.mpdf.mpdf');
               
               $mpdf = new mpdf();
                
               # render (full page)                 
               //$mpdf->allow_charset_conversion=true;

               // permite a conversao (opcional)
               //$mpdf->charset_in='UTF-8';
               //Converte todo o PDF para utf-8

               $mpdf->WriteHTML($html);
               
               //echo $html;
                                           
               //$mpdf->Output($dir . $file, 'F');
               
               $mpdf->Output($dir . $file, 'D');
                /*$this->render('pdf',array(
			'models'=>$model,
		));*/
	}
	
	public function actionExportarExcel()
	{
	    $count=Yii::app()->db->createCommand("Select count(*)
                                            from (" .$_SESSION['excel'].
                                                ") T1")->queryScalar(); 

      
	  
	    $sql = $_SESSION['excel'];
	  
	  
      $dataProvider = new CSqlDataProvider($sql,array(        
      'totalItemCount'=>$count,                 
      'pagination'=>false,  
      /*'pagination'=>array(
        'pageSize'=>20,)*/
      ));  
	  
	    $factory = new CWidgetFactory(); 	 
		Yii::import('application.extensions.phpexcel.EExcelView');
		$widget = $factory->createWidget($this,'EExcelView', array(
            'dataProvider'=>$dataProvider,
            'grid_mode'=>'export',
            'title'=> $_SESSION['titulo'],
            'creator'=>'TNC',
            'autoWidth'=>false,
            'filename'=> trim($_SESSION['titulo']),
            'stream'=>true,
            'disablePaging'=>true,
            'exportType'=>'Excel5',
            /*'columns'=>array(
                'Nome_Funcionario', 'cpf', 'Cargo_Funcao', 'Departamento',
				'Area_Atuacao', 'Dt_Admissao', 'Dt_Demissao','Salario', 'Fator_k', 'Email', 'Telefone','observacao', 'Numero_Contrato','Objeto_Contrato',
				'Dt_Ini_Vigencia','Dt_Fim_Vigencia','Gestor',),*/
            'showTableOnEmpty' => false,
        ));

        $widget->init();
        $widget->run();

    }  
    public function actionResSearchporChamadosRealizados()
	{
                $depModel = new Departamento;
                $depModel->unsetAttributes();
        
				//$debug = fopen('debug.txt', 'r+');
                //fwrite($debug, print_r($_GET, true) . '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
        
                if(isset($_GET['type'])) {
                    if($_GET['type']=="pdf") {
						//$debug = fopen('debug.txt', 'r+');
						//fwrite($debug, 'PDF');
						$this->actionPdfresSearchChamado ($_GET['render']);
						}
                    if($_GET['type']=="excel") {
                        $this->actionExportarExcel ();
						}
                }
                else 
                    $this->render('resSearchporChamadosRealizados',array(
                        'model'=>new Chamado('search'),
                        'depModel'=>$depModel
                    ));
	}

	public function actionResSearchporChamadosEmAberto()
	{
                $depModel = new Departamento;
                $depModel->unsetAttributes();
        
				//$debug = fopen('debug.txt', 'r+');
                //fwrite($debug, print_r($_GET, true) . '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
        
                if(isset($_GET['type'])) {
                    if($_GET['type']=="pdf") {
						//$debug = fopen('debug.txt', 'r+');
						//fwrite($debug, 'PDF');
						$this->actionPdfresSearchChamado ($_GET['render']);
						}
                    if($_GET['type']=="excel") {
                        $this->actionExportarExcel ();
						}
                }
                else 
                    $this->render('resSearchporChamadosEmAberto',array(
                        'model'=>new Chamado('search'),
                        'depModel'=>$depModel
                    ));
	} 

    public function actionVisualizarTelaCheia()
    {
        $cs = Yii::app()->getClientScript(); 
        $file = dirname(Yii::app()->request->scriptFile) . '/css/screen.css';
        $url = Yii::app()->getAssetManager()->publish($file);
        $cs->registerCssFile($url);
        //$debug = fopen('debug.txt', 'r+');
        //fwrite($debug, $file);
        //fwrite($debug, $this->renderPartial('admin', array( 'model'=> new Chamado('search')), true, true));
        $model = new Chamado('search');
        $model->unsetAttributes();
        $model->sit_id = 1;
        $this->renderPartial('admin', array(
            'visualizarTelaCheia'=>true,
            'model'=> $model
            ), false, true);
    }
}