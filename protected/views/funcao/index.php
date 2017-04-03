<?php
$this->breadcrumbs=array(
	'Funcaos',
);

$this->menu=array(
	array('label'=>'Create Funcao', 'url'=>array('create')),
	array('label'=>'Manage Funcao', 'url'=>array('admin')),
);
?>

<h1>Funcaos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
