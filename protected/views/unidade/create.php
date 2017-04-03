<?php
$this->breadcrumbs=array(
	'Unidades'=>array('admin'),
	'Novo',
);

$this->menu=array(
	array('label'=>'List Unidade', 'url'=>array('index')),
	array('label'=>'Manage Unidade', 'url'=>array('admin')),
);
?>

<h1>Novo Unidade</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>