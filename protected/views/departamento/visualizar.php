<?php
$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	$model->dep_id,
);

$this->menu=array(
	array('label'=>'List Departamento', 'url'=>array('index')),
	array('label'=>'Create Departamento', 'url'=>array('create')),
	array('label'=>'Update Departamento', 'url'=>array('update', 'id'=>$model->dep_id)),
	array('label'=>'Delete Departamento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->dep_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Departamento', 'url'=>array('admin')),
);
?>

<h1>Visualizando Departamento #<?php echo $model->dep_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'dep_id',
		'dep_nome',
	),
)); ?>
