<?php
$this->breadcrumbs=array(
	'Unidades'=>array('admin'),
	$model->uni_id=>array('view','id'=>$model->uni_id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'List Unidade', 'url'=>array('index')),
	array('label'=>'Create Unidade', 'url'=>array('create')),
	array('label'=>'View Unidade', 'url'=>array('view', 'id'=>$model->uni_id)),
	array('label'=>'Manage Unidade', 'url'=>array('admin')),
);
?>

<h1>Atualizando Unidade #<?php echo $model->uni_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>