<?php
/*if(isset($target)) {
    $debug = fopen('debug.txt', 'r+');
    fwrite($debug,$target);
    if($target != 'this')
        CHtml::link($this->renderPartial('admin',array( 
            'model'=> new Chamado('search'),
            'target'=>'this'), 
                true, 
                true
                ), Yii::app()->request->baseUrl . 'views/chamado/visualizarTelaCheia', array(
        'target'=>'_blank'
    ));
}*/

require_once("protected/controllers/VerificaAtraso.php");

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
<?php if(!isset($visualizarTelaCheia)): ?>

<h1>Gerenciar Chamados</h1>



<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/add.jpg'),'index.php?r=chamado/create'); ?>&nbsp;
<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pesquisar.jpg'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
    <?php endif ?>
    
</div><!-- search-form -->
<?php 
$dataProvider = $model->search();
$dataProvider->setPagination(array(
    'pageSize'=>20
));
    $this->widget('zii.widgets.grid.CGridView', array(
        	'id'=>'chamado-grid',
        	'dataProvider'=>$dataProvider,

        	'columns'=>array(
        		'cha_id',
                'cha_tipo',
        		array( 
                    'name'=>'Departamento',
                    'value'=>'$data->processo->departamento->dep_nome',
                    /*'htmlOptions'=>array('style'=>'height:35px')
                    <p>
        Use os operadores (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
        or <b>=</b>) para melhorar os resultados da busca.
        </p>
                    */
                    'htmlOptions'=>array('class'=>'CGridViewTable')
                ),
        		array( 
                    'name'=>'Ger&ecirc;ncia de &aacute;rea',
                    'value'=>'$data->processo->pro_nome',
                ),
        		'cha_nomeusuario',
        		'cha_ramal',
        		'cha_datacriacao',
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
                                 'visible'=> !isset($visualizarTelaCheia) ? true : false,
                                 'htmlOptions'=>array('class'=>'CGridViewTable'),
                                 
                      'header'=>'Op&ccedil;&otilde;es',
        		),
                    array(
                        'name'=>'Prazo',
                        'type'=>'html',
                        'value'=>'verificaAtraso("$data->cha_datacriacao");'
                    )
        	),
        )
    ); 
?>

<?php if(isset($visualizarTelaCheia)) 
    echo "<script type='text/javascript'>  setTimeout('location.reload(true)',30000); </script>"; 
?>