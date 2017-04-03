<?php
$this->breadcrumbs=array(
	'Chamados'=>array('index'),
	$model->cha_id=>array('view','id'=>$model->cha_id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'List Chamado', 'url'=>array('index')),
	array('label'=>'Create Chamado', 'url'=>array('create')),
	array('label'=>'View Chamado', 'url'=>array('view', 'id'=>$model->cha_id)),
	array('label'=>'Manage Chamado', 'url'=>array('admin')),
);
?>

<h1>Update Chamado <?php echo $model->cha_id; ?></h1>

<?php echo $this->renderPartial('_formAtualiza', array('model'=>$model)); ?>