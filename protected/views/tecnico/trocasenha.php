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
			echo '<div id="info">Troca de Senha realizada com sucesso!</div>';
		}
	?>
	

	<div class="row">
		<?php echo $form->labelEx($model,'tec_nome'); ?>
		<?php echo $form->textField($model,'tec_nome',array('size'=>60,'maxlength'=>90, 'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'tec_nome'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'senhaantiga'); ?>
		<?php echo $form->passwordField($model,'senhaantiga',array('size'=>60,'maxlength'=>90,'password'=>true)); ?>
		<?php echo $form->error($model,'senhaantiga'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'senha'); ?>
		<?php echo $form->passwordField($model,'senha',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'senha'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'confirma'); ?>
		<?php echo $form->passwordField($model,'confirma',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'confirma'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->