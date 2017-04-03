<?php
$this->breadcrumbs=array(
	'Funcaos'=>array('index'),
	$model->fun_id=>array('view','id'=>$model->fun_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Funcao', 'url'=>array('index')),
	array('label'=>'Create Funcao', 'url'=>array('create')),
	array('label'=>'View Funcao', 'url'=>array('view', 'id'=>$model->fun_id)),
	array('label'=>'Manage Funcao', 'url'=>array('admin')),
);
?>

<h1>Update Funcao <?php echo $model->fun_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>