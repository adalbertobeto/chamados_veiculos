<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pro_id'); ?>
		<?php echo $form->textField($model,'pro_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pro_nome'); ?>
		<?php echo $form->textField($model,'pro_nome',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dep_id'); ?>
		<?php echo $form->textField($model,'dep_id',array('size'=>10,'maxlength'=>10)); echo ' Preencha com o Id do Departamento.';?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Pesquisar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->