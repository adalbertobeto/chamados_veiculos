<?php
$this->breadcrumbs=array(
	'Unidades',
);

$this->menu=array(
	array('label'=>'Create Unidade', 'url'=>array('create')),
	array('label'=>'Manage Unidade', 'url'=>array('admin')),
);
?>

<h1>Unidades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
