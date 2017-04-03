<?php
$this->breadcrumbs=array(
	'Chamados',
);

$this->menu=array(
	array('label'=>'Create Chamado', 'url'=>array('create')),
	array('label'=>'Manage Chamado', 'url'=>array('admin')),
);
?>

<h1>Chamados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',#
)); ?>
