<?php
$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	'Novo',
);

$this->menu=array(
	array('label'=>'List Departamento', 'url'=>array('index')),
	array('label'=>'Manage Departamento', 'url'=>array('admin')),
);
?>

<h1>Novo Departamento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>