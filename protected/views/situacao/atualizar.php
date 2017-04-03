<?php
$this->breadcrumbs=array(
	'Situacaos'=>array('index'),
	$model->sit_id=>array('view','id'=>$model->sit_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Situacao', 'url'=>array('index')),
	array('label'=>'Create Situacao', 'url'=>array('create')),
	array('label'=>'View Situacao', 'url'=>array('view', 'id'=>$model->sit_id)),
	array('label'=>'Manage Situacao', 'url'=>array('admin')),
);
?>

<h1>Update Situacao <?php echo $model->sit_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>