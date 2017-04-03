<?php
$this->breadcrumbs=array(
	'Chamados'=>array('admin'),
	$model->cha_id=>array('view','id'=>$model->cha_id),
	'Finalizar Chamado',
);

?>

<h1>Finalizar Chamado</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'atribuir-chamado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'cha_solucao'); ?>
		<?php echo $form->textArea($model,'cha_solucao',array('cols'=>45,'rows'=>5)); ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'cha_naosolucao'); ?>
		<?php echo $form->textArea($model,'cha_naosolucao',array('cols'=>45,'rows'=>5)); ?>
	</div>
    
    <div class="row buttons">
		<?php echo CHtml::submitButton('Salvar'); ?>
	</div>
    
<?php $this->endWidget(); ?>
</div>