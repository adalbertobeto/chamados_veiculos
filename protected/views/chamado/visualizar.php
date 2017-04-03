<?php
function FormatDate($date,$format){
	if (!isset($date))
		return null;
  return date($format,strtotime($date));
}
$this->breadcrumbs=array(
	'Chamados'=>array('admin'),
	$model->cha_id,
);
?>
<h1>Visualizando Chamado #<?php echo $model->cha_id; ?></h1>
<div class="info">
        <h2><?php echo Yii::app()->user->getFlash('success'); ?></h2>
</div>
<?php
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
?>



<?php
	if ($model->sit_id == 2){
?>
		<div align="center"><h2 class="alerta">Chamado já foi fechado!</h2></div>	
<?php	
	}else{
?>
		<div align="right">
			<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pegar.jpg'),Yii::app()->request->baseUrl. '/index.php?r=/chamado/pegarchamado/id/' . $model->cha_id); ?>
			<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/fechar.jpg'),Yii::app()->request->baseUrl. '/index.php?r=/chamado/fechar/id/' . $model->cha_id); ?>
			<?php 
    				$this->widget('application.extensions.print.printWidget', array(                   
                   					'cssFile' => 'print.css',
                   					'printedElement'=>'#yang_mau_diprint',
                   					)
                 	); 
?>
</div>
<?php }
?>
<div id="yang_mau_diprint">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cha_id',
		array(           
            'label'=>'Unidade',
            'type'=>'raw',
            'value'=> $model->unidade->uni_nome
        ),
		array(           
            'label'=>'Departamento',
            'type'=>'raw',
            'value'=> $model->processo->departamento->dep_nome
        ),
        array(           
            'label'=>'Municipio',
            'type'=>'raw',
            'value'=> $model->municipio->mun_nome
        ),
		array(           
            'label'=>'Processo',
            'type'=>'raw',
            'value'=> $model->processo->pro_nome
        ),
		'cha_nomeusuario',
		'cha_ramal',
		array(           
            'label'=>'Data da Cria&ccedil;&atilde;o',
            'type'=>'raw',
            'value'=> FormatDate($model->cha_datacriacao,"d/m/Y")
        ),
		array(           
            'label'=>'Saida',
            'type'=>'raw',            
            'value'=> FormatDate($model->cha_dtsaida,"d/m/Y")
        ),
		array(           
            'label'=>'Volta',
            'type'=>'raw',
            'value'=> FormatDate($model->cha_dtvolta,"d/m/Y")
        ),
		'cha_email',
        array(           
            'label'=>'T&eacute;cnico',
            'type'=>'raw',
            'value'=> $model->tecnico->tec_nome,
        ),
        array(           
            'label'=>'Descrição do Problema',
            'type'=>'raw',
            'value'=> $model->cha_descricao,
        ),
         array(           
            'label'=>'Tipo de Manutenção',
            'type'=>'raw',
            'value'=> $model->cha_tipo,
        ),
        array(           
            'label'=>'Solução do Problema',
            'type'=>'raw',
            'value'=> $model->cha_solucao,
        ),
	),
	
)); ?>