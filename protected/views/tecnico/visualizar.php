<?php
$this->breadcrumbs=array(
	'Tecnicos'=>array('admin'),
	$model->tec_id,
);

$this->menu=array(
	array('label'=>'List Tecnico', 'url'=>array('index')),
	array('label'=>'Create Tecnico', 'url'=>array('create')),
	array('label'=>'Update Tecnico', 'url'=>array('update', 'id'=>$model->tec_id)),
	array('label'=>'Delete Tecnico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tec_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tecnico', 'url'=>array('admin')),
);
?>

<h1>Visualizando Técnico #<?php echo $model->tec_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tec_id',
		'tec_nome',
		'tec_email',
		'tec_telefone',
	),
)); ?>
