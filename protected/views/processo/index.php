<?php
$this->breadcrumbs=array(
	'Processos',
);

$this->menu=array(
	array('label'=>'Create Processo', 'url'=>array('create')),
	array('label'=>'Manage Processo', 'url'=>array('admin')),
);
?>

<h1>Processos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
