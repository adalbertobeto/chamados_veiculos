<?php
$this->breadcrumbs=array(
	'Unidades'=>array('admin'),
	$model->uni_id,
);

$this->menu=array(
	array('label'=>'List Unidade', 'url'=>array('index')),
	array('label'=>'Create Unidade', 'url'=>array('create')),
	array('label'=>'Update Unidade', 'url'=>array('update', 'id'=>$model->uni_id)),
	array('label'=>'Delete Unidade', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->uni_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Unidade', 'url'=>array('admin')),
);
?>

<h1>Visualizando Unidade #<?php echo $model->uni_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'uni_id',
		'uni_nome',
	),
)); ?>
