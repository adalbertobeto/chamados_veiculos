<?php
$this->breadcrumbs=array(
	'Situacaos',
);

$this->menu=array(
	array('label'=>'Create Situacao', 'url'=>array('create')),
	array('label'=>'Manage Situacao', 'url'=>array('admin')),
);
?>

<h1>Situacaos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
