<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('uni_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->uni_id), array('view', 'id'=>$data->uni_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uni_nome')); ?>:</b>
	<?php echo CHtml::encode($data->uni_nome); ?>
	<br />


</div>