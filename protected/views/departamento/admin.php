<?php
$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'List Departamento', 'url'=>array('index')),
	array('label'=>'Create Departamento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('departamento-grid', {
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

<h1>Gerenciar Departamentos</h1>



<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/add.jpg'),'index.php?r=departamento/create'); ?>&nbsp;
<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pesquisar.jpg'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'departamento-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'dep_id',
		'dep_nome',
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('class'=>'CGridViewTable'),
             'header' => 'Op&ccedil;&otilde;es',
		),
	),
)); ?>
