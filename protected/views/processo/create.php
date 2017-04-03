<?php
$this->breadcrumbs=array(
	'Processos'=>array('index'),
	'Novo',
);

$this->menu=array(
	array('label'=>'List Processo', 'url'=>array('index')),
	array('label'=>'Manage Processo', 'url'=>array('admin')),
);
?>

<h1>Novo Processo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>