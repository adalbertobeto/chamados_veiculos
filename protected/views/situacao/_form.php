<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'situacao-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sit_descricao'); ?>
		<?php echo $form->textField($model,'sit_descricao',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'sit_descricao'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->