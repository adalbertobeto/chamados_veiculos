<?php
$this->breadcrumbs=array(
	'Tecnicos'=>array('admin'),
	$model->tec_id=>array('view','id'=>$model->tec_id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'List Tecnico', 'url'=>array('index')),
	array('label'=>'Create Tecnico', 'url'=>array('create')),
	array('label'=>'View Tecnico', 'url'=>array('view', 'id'=>$model->tec_id)),
	array('label'=>'Manage Tecnico', 'url'=>array('admin')),
);
?>

<h1>Atualizando Técnico #<?php echo $model->tec_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>