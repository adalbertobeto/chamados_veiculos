<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'chamado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> sao obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'uni_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'uni_id',
											CHtml::listData(Unidade::model()->findAll(), 'uni_id', 'uni_nome'),
                                          	array(
												'empty'=>'Selecione uma Unidade -->',
											)
										);?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cha_dpto'); ?>
		<?php
			$criteria = new CDbCriteria();
			$criteria->order='dep_nome';
		?>
		<?php echo CHtml::activeDropDownList($model->processo,'dep_id',
											CHtml::listData(Departamento::model()->findAll($criteria), 'dep_id', 'dep_nome'),
                                          	array(
												'empty'=>'Selecione teste um Departamento -->',
												'ajax' => array(
													'type'=>'GET', //request type
													'url'=>CController::createUrl('carregarprocessos'), //url to call.
													'update'=>'#Chamado_pro_id', //selector to update
													'data'=>array(
															'departamento' => 'js:this.value',
														)
													)
											)
										);?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mun_id'); ?>
		<?php
			$criteria = new CDbCriteria();
			$criteria->order='mun_nome';
		?>
		<?php echo CHtml::activeDropDownList($model->processo,'mun_id',
											CHtml::listData(Departamento::model()->findAll($criteria), 'mun_id', 'mun_nome'),
                                          	array(
												'empty'=>'Selecione municipio -->',
												'ajax' => array(
													'type'=>'GET', //request type
													'url'=>CController::createUrl('carregarprocessos'), //url to call.
													'update'=>'#Chamado_pro_id', //selector to update
													'data'=>array(
															'municipio' => 'js:this.value',
														)
													)
											)
										);?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pro_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'pro_id', CHtml::listData(Processo::model()->findAll(), 'pro_id', 'pro_nome'),
                                          	array('empty'=>'Selecione uma Gerência de Área -->'));?>
		<?php echo $form->error($model,'pro_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cha_nomeusuario'); ?>
		<?php echo $form->textField($model,'cha_nomeusuario',array('size'=>45,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'cha_nomeusuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cha_ramal'); ?>
		<?php echo $form->textField($model,'cha_ramal',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'cha_ramal'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'cha_email'); ?>
		<?php echo $form->textField($model,'cha_email',array('size'=>45,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'cha_email'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'cha_tipo'); ?>
		<?php echo CHtml::activeDropDownList($model,'cha_tipo',
                                          	array(
                                          		'' => 'Selecione o Tipo -->',
                                          		'HIDRÁULICO' => 'Hidráulico',
                                          		'MARCENARIA' => 'Marcenaria',
                                          		'ELÉTRICO' => 'Elétrico'
                                          	));?>
		<?php echo $form->error($model,'cha_tipo'); ?>
	</div>
	
    <div class="row">
		<?php echo $form->labelEx($model,'cha_descricao'); ?>
		<?php echo $form->textArea($model,'cha_descricao',array('cols'=>35,'rows'=>5,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'cha_descricao'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->