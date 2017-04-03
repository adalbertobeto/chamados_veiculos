<?php
$this->breadcrumbs=array(
	'Tecnicos'=>array('admin'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'List Tecnico', 'url'=>array('index')),
	array('label'=>'Create Tecnico', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tecnico-grid', {
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

<h1>Gerenciar Técnicos</h1>



<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/add.jpg'),'index.php?r=tecnico/create'); ?>&nbsp;
<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pesquisar.jpg'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tecnico-grid',
	'dataProvider'=>$model->search(),

	'columns'=>array(
		'tec_id',
		'tec_nome',
		//'tec_tipo',
		'tec_email',
		'tec_telefone',
		array( 
            'name'=>'Fun&ccedil;&atilde;o',
            'value'=>'$data->funcao->fun_descricao',
        ),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('class'=>'CGridViewTable'),
             'header' => 'Op&ccedil;&otilde;es',
		),
	),
)); ?>
