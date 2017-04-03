<?php
$this->breadcrumbs=array(
'Report Package'=>array('/chamado'),
'Print',
);?>

<?php
$this->widget('ext.mPrint.mPrint', array(
'id' => 'mprint1', // !!!you have to set up this one if you want multiple prints per page
'title' => 'Overview de Chamado', //the title of the document. Defaults to the HTML title
'tooltip' => 'Overview de Chamado', //tooltip message of the print icon. Defaults to 'print'
'text' => 'Imprimir', //text which will appear beside the print icon. Defaults to NULL
'element' => '#printable1', //the element to be printed.
'exceptions' => array( //the element/s which will be ignored
'.summary',
'.search-form'
),
'publishCss' => true //publish the CSS for the whole page?
));
?>

<div id="printable1"> <!-- this is where you specify name of section you want to print -->
<center>
<h3> Overview de Conrato</h3>
</center>
<br />
<br />
<br />
<style>
    form{ float: left;}
    
</style>
<?php

$this->breadcrumbs=array(
	'resSearchContrato'=>array('resSearchContrato'),
	'resSearchContrato',
);


Yii::app()->clientScript->registerScript('resultado', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('votacao-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
//echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/pesquisar.jpg'),'#',array('class'=>'search-button')); ?>	<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/exportar.jpg'),'pdfresSearchContrato'); ?>	<?php //echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/novo.jpg'),'novo'); ?></div>
<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/exportarXLS.jpg'),'?r=contrato/ExportarExcel');?>
<?php 
      $count=Yii::app()->db->createCommand('Select count(*)
                                            from (Select c.id_contrato as "Id_Contrato",
       c.numero_contrato as "Numero_Contrato",
       C.objeto_contrato as "Objeto_Contrato",
       c.numero_aditivos as "Numero_Aditivos",
       f.nome_fornecedor as "Fornecedor",
       c.dt_inicio as "Dt_Inicio_Vigencia",
       c.dt_termino as "Dt_Fim_Vigencia",
       c.valor_aditivo as "Valor_Aditivo"
from contrato c, fornecedor f
where  c.id_fornecedor = f.id_fornecedor
and    c.id_contrato = '.$_GET['id_contrato'].'
) T1')->queryScalar(); 

      $sql ='Select c.id_contrato as "Id_Contrato",
       c.numero_contrato as "Numero_Contrato",
       C.objeto_contrato as "Objeto_Contrato",
       c.numero_aditivos as "Numero_Aditivos",
       f.nome_fornecedor as "Fornecedor",
       c.dt_inicio as "Dt_Inicio_Vigencia",
       c.dt_termino as "Dt_Fim_Vigencia",
       c.valor_aditivo as "Valor_Aditivo"
from contrato c, fornecedor f
where  c.id_fornecedor = f.id_fornecedor
and    c.id_contrato = '.$_GET['id_contrato'];
      $dataProvider = new CSqlDataProvider($sql,array(
      'keyField'=>'Id_Contrato',
      'keyField'=>'Numero_Contrato',
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'Id_Contrato', 'Numero_Contrato', 'Objeto_Contrato', 'Numero_Aditivos', 'Fornecedor', 'Dt_Inicio_Vigencia', 'Dt_Fim_Vigencia', 'Valor_Aditivo'
        ),
      ),
      'pagination'=>array(
        'pageSize'=>20,)
      ));
	  
	  $_SESSION['excel'] = $sql;
	  $_SESSION['titulo'] = "Relatorio de Contrato";
       
           //$dataProvider->params->keyField->Lotacao; 
           $this->widget('zii.widgets.grid.CGridView', array(
	   'id'=>'votacao-grid',
	   'dataProvider'=>$dataProvider,
          'columns'=>array(
                'Id_Contrato', 'Numero_Contrato', 'Objeto_Contrato', 'Numero_Aditivos', 'Fornecedor', 'Dt_Inicio_Vigencia', 'Dt_Fim_Vigencia', 'Valor_Aditivo',
                /*array(
			'class'=>'CButtonColumn',
		),*/
	                   ),
           ));   
          
      ?>
</div>