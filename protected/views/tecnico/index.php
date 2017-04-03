<?php
$this->breadcrumbs=array(
	'Tecnicos',
);

$this->menu=array(
	array('label'=>'Create Tecnico', 'url'=>array('create')),
	array('label'=>'Manage Tecnico', 'url'=>array('admin')),
);
?>

<h1>Tecnicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
