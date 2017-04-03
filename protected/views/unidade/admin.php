<?php
$this->breadcrumbs=array(
	'Unidades'=>array('admin'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'List Unidade', 'url'=>array('index')),
	array('label'=>'Create Unidade', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('unidade-grid', {
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

<h1>Gerenciar Unidades</h1>



<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/add.jpg'),'index.php?r=unidade/create'); ?>&nbsp;
<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pesquisar.jpg'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unidade-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'uni_id',
		'uni_nome',
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('class'=>'CGridViewTable'),
             'header' => 'Op&ccedil;&otilde;es',
		),
	),
)); ?>
