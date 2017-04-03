<?php
$this->breadcrumbs=array(
	'Processos'=>array('index'),
	$model->pro_id=>array('view','id'=>$model->pro_id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'List Processo', 'url'=>array('index')),
	array('label'=>'Create Processo', 'url'=>array('create')),
	array('label'=>'View Processo', 'url'=>array('view', 'id'=>$model->pro_id)),
	array('label'=>'Manage Processo', 'url'=>array('admin')),
);
?>

<h1>Atualizar Processo #<?php echo $model->pro_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>