<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fun_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fun_id), array('view', 'id'=>$data->fun_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fun_descricao')); ?>:</b>
	<?php echo CHtml::encode($data->fun_descricao); ?>
	<br />


</div>