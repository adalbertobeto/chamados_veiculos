<?php
$this->breadcrumbs=array(
	'Funcaos'=>array('index'),
	$model->fun_id,
);

$this->menu=array(
	array('label'=>'List Funcao', 'url'=>array('index')),
	array('label'=>'Create Funcao', 'url'=>array('create')),
	array('label'=>'Update Funcao', 'url'=>array('update', 'id'=>$model->fun_id)),
	array('label'=>'Delete Funcao', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fun_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Funcao', 'url'=>array('admin')),
);
?>

<h1>View Funcao #<?php echo $model->fun_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fun_id',
		'fun_descricao',
	),
)); ?>
