<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tec_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tec_id), array('view', 'id'=>$data->tec_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tec_nome')); ?>:</b>
	<?php echo CHtml::encode($data->tec_nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tec_email')); ?>:</b>
	<?php echo CHtml::encode($data->tec_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tec_telefone')); ?>:</b>
	<?php echo CHtml::encode($data->tec_telefone); ?>
	<br />


</div>