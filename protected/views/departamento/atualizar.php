<?php
$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	$model->dep_id=>array('view','id'=>$model->dep_id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'List Departamento', 'url'=>array('index')),
	array('label'=>'Create Departamento', 'url'=>array('create')),
	array('label'=>'View Departamento', 'url'=>array('view', 'id'=>$model->dep_id)),
	array('label'=>'Manage Departamento', 'url'=>array('admin')),
);
?>

<h1>Atualizando Departamento #<?php echo $model->dep_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>