<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sit_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sit_id), array('view', 'id'=>$data->sit_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sit_descricao')); ?>:</b>
	<?php echo CHtml::encode($data->sit_descricao); ?>
	<br />


</div>