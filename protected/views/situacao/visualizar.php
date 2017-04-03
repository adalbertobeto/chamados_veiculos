<?php
$this->breadcrumbs=array(
	'Situacaos'=>array('index'),
	$model->sit_id,
);

$this->menu=array(
	array('label'=>'List Situacao', 'url'=>array('index')),
	array('label'=>'Create Situacao', 'url'=>array('create')),
	array('label'=>'Update Situacao', 'url'=>array('update', 'id'=>$model->sit_id)),
	array('label'=>'Delete Situacao', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sit_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Situacao', 'url'=>array('admin')),
);
?>

<h1>View Situacao #<?php echo $model->sit_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sit_id',
		'sit_descricao',
	),
)); ?>
