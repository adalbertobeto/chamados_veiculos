<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="pt" />

	<!-- blueprint CSS framework -->
    <?php
    	Yii::app()->setLanguage('pt');
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
    	<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
                array('label'=>'Início', 'url'=>array('/chamado/')),
                array('label'=>'Cadastros Auxiliares',
                  'items'=>array(
                	array('label'=>'Departamentos',
                  		'items'=>array(
                    		array('label'=>'Gerenciar', 'url'=>array('/departamento/admin')),
                    		array('label'=>'Novo', 'url'=>array('/departamento/create')),
                  		),
                	),
                	array('label'=>'Processos',
                  		'items'=>array(
                    		array('label'=>'Gerenciar', 'url'=>array('/processo/admin')),
                    		array('label'=>'Novo', 'url'=>array('/processo/create')),
                  		),
                	),
                	array('label'=>'Unidades',
                  		'items'=>array(
                    		array('label'=>'Gerenciar', 'url'=>array('/unidade/admin')),
                    		array('label'=>'Novo', 'url'=>array('/unidade/create')),
                  		),
                	),
                	array('label'=>'Técnicos',
                  		'items'=>array(
                    		array('label'=>'Gerenciar', 'url'=>array('/tecnico/admin')),
                    		array('label'=>'Novo', 'url'=>array('/tecnico/create')),
                  		),
                  	
                	),
                ),
                ),
                array('label'=>'Chamados',
                  'items'=>array(
                    array('label'=>'Gerenciar', 'url'=>array('/chamado/admin')),
                    array('label'=>'Novo', 'url'=>array('/chamado/create')),
                  ),
                ),
                array('label'=>'Troca de Senha', 'url'=>array('/tecnico/trocasenha'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
    )); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Eletrobras Amazonas Energia.<br/>
		Todos os direitos reservados.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>