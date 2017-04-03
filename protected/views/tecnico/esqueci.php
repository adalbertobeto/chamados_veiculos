<style>
	#info{
		width: 800px;
		height: 40px;
		text-align: center;
		color: #060;
		font-size: 18px;
		border: 1px #060 solid;
		padding-top: 20px;
	}

</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tecnico-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php
		if ($troca == 'yes'){
			echo '<div id="info">Senha enviada para seu email!</div>';
		}
	?>
	

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Enviar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->