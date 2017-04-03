<?php
$this->breadcrumbs=array(
	'Chamados'=>array('admin'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'List Chamado', 'url'=>array('index')),
	array('label'=>'Create Chamado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('chamado-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar Chamados</h1>

<p>
Use os operadores (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) para melhorar os resultados da busca.
</p>

<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/add.jpg'),'create'); ?>&nbsp;
<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pesquisar.jpg'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'chamado-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		'cha_id',
		array( 
            'name'=>'Departamento',
            'value'=>'$data->processo->departamento->dep_nome',
        ),
		array( 
            'name'=>'Processo',
            'value'=>'$data->processo->pro_nome',
        ),
		'cha_nomeusuario',
		'cha_ramal',
		'cha_numCP',
		'cha_datacriacao',
		/*
		'cha_inicio',
		'cha_termino',
		'cha_email',
		'tec_id',
		*/
		array( 
            'name'=>'T&eacute;cnico',
            'value'=>'$data->tecnico->tec_nome',
        ),
		array( 
            'name'=>'Situa&ccedil;&atilde;o',
            'value'=>'$data->situacao->sit_descricao',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
