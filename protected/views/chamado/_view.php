<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cha_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cha_id), array('view', 'id'=>$data->cha_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cha_dpto')); ?>:</b>
	<?php echo CHtml::encode($data->cha_dpto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cha_processo')); ?>:</b>
	<?php echo CHtml::encode($data->cha_processo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cha_nomeusuario')); ?>:</b>
	<?php echo CHtml::encode($data->cha_nomeusuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cha_ramal')); ?>:</b>
	<?php echo CHtml::encode($data->cha_ramal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cha_datacriacao')); ?>:</b>
	<?php echo CHtml::encode($data->cha_datacriacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cha_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->cha_tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->cha_inicio); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cha_termino')); ?>:</b>
	<?php echo CHtml::encode($data->cha_termino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cha_email')); ?>:</b>
	<?php echo CHtml::encode($data->cha_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tec_id')); ?>:</b>
	<?php echo CHtml::encode($data->tec_id); ?>
	<br />

	*/ ?>

</div>