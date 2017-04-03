<?php
$this->breadcrumbs=array(
	'Processos'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'List Processo', 'url'=>array('index')),
	array('label'=>'Create Processo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('processo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

/*<p>
Use os operadores (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) para melhorar os resultados da busca.
</p>*/

?>

<h1>Gerenciar Processos</h1>



<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/add.jpg'),'index.php?r=processo/create'); ?>&nbsp;
<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pesquisar.jpg'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'processo-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'pro_id',
		'pro_nome',
		array('name' => 'Id Departamento',
			  'value' => '$data->departamento->dep_id'
		),
		array(
			'name' => 'Departamento',
			'value' => '$data->departamento->dep_nome'
		),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('class'=>'CGridViewTable'),
             'header' => 'Op&ccedil;&otilde;es',
		),
	),
)); ?>
