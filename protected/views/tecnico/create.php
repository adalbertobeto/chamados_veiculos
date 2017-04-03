<?php
$this->breadcrumbs=array(
	'Tecnicos'=>array('admin'),
	'Novo',
);

$this->menu=array(
	array('label'=>'List Tecnico', 'url'=>array('index')),
	array('label'=>'Manage Tecnico', 'url'=>array('admin')),
);
?>

<h1>Novo Técnico</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>