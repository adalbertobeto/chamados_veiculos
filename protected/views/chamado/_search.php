<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cha_id'); ?>
		<?php echo $form->textField($model,'cha_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cha_dpto'); ?>
		<?php echo $form->textField($model,'cha_dpto',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pro_id'); ?>
		<?php echo $form->textField($model,'pro_id',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cha_nomeusuario'); ?>
		<?php echo $form->textField($model,'cha_nomeusuario',array('size'=>60,'maxlength'=>90)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cha_datacriacao'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', 
						array(
    						'name'=>'Chamado[cha_datacriacao]',
    						// additional javascript options for the date picker plugin
    						'options'=>array(
        						'showAnim'=>'fold',
								'dateFormat'=>'dd/mm/yy'
    						),
    						'htmlOptions'=>array(
        						'style'=>'height:20px;'
    						),
						)
					); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cha_inicio'); ?>
		<?php echo $form->textField($model,'cha_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cha_termino'); ?>
		<?php echo $form->textField($model,'cha_termino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cha_email'); ?>
		<?php echo $form->textField($model,'cha_email',array('size'=>60,'maxlength'=>90)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tec_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'tec_id',
											CHtml::listData(Tecnico::model()->tec()->findAll(), 'tec_id', 'tec_nome'),
                                          	array('empty'=>'TODOS'));?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cha_tipo'); ?>
		<?php echo CHtml::activeDropDownList($model,'cha_tipo',
                                          	array(
                                          		'empty' => 'TODOS',
                                          		'HIDRÁULICO' => 'Hidráulico',
                                          		'MARCENARIA' => 'Marcenaria',
                                          		'ELÉTRICO' => 'Elétrico'
                                          	));?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sit_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'sit_id',
											CHtml::listData(Situacao::model()->findAll(), 'sit_id', 'sit_descricao'),
                                          	array('empty'=>'TODOS'));?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Pesquisar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->