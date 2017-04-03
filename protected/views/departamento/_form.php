<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'departamento-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> sao obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'dep_nome'); ?>
		<?php echo $form->textField($model,'dep_nome',array('size'=>45,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'dep_nome'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->