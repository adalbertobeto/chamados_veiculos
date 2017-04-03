<?php
$this->breadcrumbs=array(
	'Chamados'=>array('admin'),
	$model->cha_id=>array('view','id'=>$model->cha_id),
	'Atribuir Chamado',
);

?>

<h1>Atribuir Chamado</h1>

<?php
	if ($model->tec_id <> 1){
?>
	<div align="center"><h2 class="alerta">Chamado já atribuído!</h2></div>		
<?php	}
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'atribuir-chamado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'tec_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'tec_id',
											CHtml::listData(Tecnico::model()->tec()->findAll(), 'tec_id', 'tec_nome'),
                                          	array('empty'=>'Selecione um Técnico -->'));?>

	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'cha_comentario'); ?>
		<?php echo $form->textArea($model,'cha_comentario',array('cols'=>35,'rows'=>5)); ?>
		<?php echo $form->error($model,'cha_comentario'); ?>
	</div> -->
    
    <div class="row buttons">
		<?php echo CHtml::submitButton('Salvar'); ?>
	</div>
    
<?php $this->endWidget(); ?>
</div>