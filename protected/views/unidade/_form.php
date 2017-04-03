<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'unidade-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> sao obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uni_nome'); ?>
		<?php echo $form->textField($model,'uni_nome',array('size'=>45,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'uni_nome'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->