<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'processo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> sao obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pro_nome'); ?>
		<?php echo $form->textField($model,'pro_nome',array('size'=>45,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'pro_nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dep_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'dep_id',
											CHtml::listData(Departamento::model()->findAll(), 'dep_id', 'dep_nome'),
                                          	array('empty'=>'Selecione um Departamento -->'));?>
		<?php echo $form->error($model,'dep_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->