<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tecnico-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tec_nome'); ?>
		<?php echo $form->textField($model,'tec_nome',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'tec_nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tec_email'); ?>
		<?php echo $form->textField($model,'tec_email',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'tec_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tec_telefone'); ?>
		<?php echo $form->textField($model,'tec_telefone',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'tec_telefone'); ?>
	</div>
<?php/*
	<div class="row">
		<?php echo $form->labelEx($model,'tec_tipo'); ?>
		<?php echo CHtml::activeDropDownList($model,'tec_tipo',
                                          	array(
                                          		'' => 'Selecione o Tipo -->',
                                          		'HIDRÁULICO' => 'Hidráulico',
                                          		'MARCENARIA' => 'Marcenaria',
                                          		'ELÉTRICO' => 'Elétrico'
                                          	));?>
		<?php echo $form->error($model,'tec_tipo'); ?>
	</div>*/
    ?>
    <div class="row">
		<?php echo CHtml::activeLabelEx($model,'fun_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'fun_id',
											CHtml::listData(Funcao::model()->findAll(), 'fun_id', 'fun_descricao'),
                                          	array('empty'=>'Selecione uma Função -->'));?>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->