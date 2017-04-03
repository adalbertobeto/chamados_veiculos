<?php
$this->breadcrumbs=array(
	'Chamados'=>array('admin'),
	'Novo',
);

$this->menu=array(
	array('label'=>'List Chamado', 'url'=>array('index')),
	array('label'=>'Manage Chamado', 'url'=>array('admin')),
);
?>

<h1>Novo Chamado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>