<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('dep_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->dep_id), array('view', 'id'=>$data->dep_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dep_nome')); ?>:</b>
	<?php echo CHtml::encode($data->dep_nome); ?>
	<br />


</div>