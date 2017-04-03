<?php
$this->breadcrumbs=array(
	'Processos'=>array('index'),
	$model->pro_id,
);

$this->menu=array(
	array('label'=>'List Processo', 'url'=>array('index')),
	array('label'=>'Create Processo', 'url'=>array('create')),
	array('label'=>'Update Processo', 'url'=>array('update', 'id'=>$model->pro_id)),
	array('label'=>'Delete Processo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pro_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Processo', 'url'=>array('admin')),
);
?>

<h1>View Processo #<?php echo $model->pro_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pro_id',
		'pro_nome',
		'dep_id',
	),
)); ?>
