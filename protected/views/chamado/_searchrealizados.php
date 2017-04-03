<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/jquery/jquery.price_format.1.7.min.js');
      Yii::app()->clientScript->registerScript('jquery-priceformat', "
      $('input[id*=_valor]').priceFormat({    
               prefix: 'R$ ',    
               centsSeparator: ',',    
               thousandsSeparator: '.',    
               clearPrefix: false
      });
      ");
?>

	<div class="row">
		<?php echo $form->label($model,'id_contrato'); ?>
		<?php echo $form->textField($model,'id_contrato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_contrato'); ?>
		<?php echo $form->textField($model,'numero_contrato',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_fornecedor'); ?>
		<?php echo CHtml::activeDropDownList($model,'id_fornecedor',
											CHtml::listData(fornecedor::model()->findAll(), 'id_fornecedor', 'nome_fornecedor'),
                                          	array('empty'=>'TODOS'));?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objeto_contrato'); ?>
		<?php echo $form->textField($model,'objeto_contrato',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_aditivos'); ?>
		<?php echo $form->textField($model,'numero_aditivos',array('size'=>4,'maxlength'=>4)); ?>
	</div>
    
        <div class="row valor">
		<?php echo CHtml::activeLabelEx($model,'valor_aditivo'); ?>
		<?php echo $form->textField($model,'valor_aditivo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'valor_aditivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dt_inicio'); ?>
		<?php $this->widget('CMaskedTextField', array('model' => $model, 'attribute' => 'dt_inicio', 
							'mask' => '99/99/9999', 'htmlOptions' => array('size' => 10)));?>
		<?php echo $form->error($model,'dt_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dt_termino'); ?>
		<?php $this->widget('CMaskedTextField', array('model' => $model, 'attribute' => 'dt_termino', 
							'mask' => '99/99/9999', 'htmlOptions' => array('size' => 10)));?>
		<?php echo $form->error($model,'dt_termino'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Pesquisar'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>    

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contrato-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id_contrato',
		'numero_contrato',
		'id_fornecedor',
		'objeto_contrato',
		'numero_aditivos',
		'dt_inicio',
		/*
		'dt_termino',
		*/
		array( 'class'=>'CButtonColumn',                        
                        'template'=>'{Associar}',                       
                        'buttons'=>array(                                        
                                  'Associar' => array(  
                                                        'label'=>'Visualizar',     // text label of the button                                                                    
                                                        'url'=>'Yii::app()->createUrl("contrato/resSearchContrato", array("id_contrato" =>trim($data["id_contrato"])))',       // a PHP expression for generating the URL of the button                                                                    
                                                        'imageUrl'=>'images/botao_amarelo.jpg',  // image URL of the button. If not set or false, a text link is used                                                                    
                                                        'htmlOptions'=>array('title'=>'Visualizar'), // HTML options for the button tag                                                                    
                                                        'visible'=>'1',   // a PHP expression for determining whether the button is visible                                    
                                                        
                                                     ),                                                                        
                                           
	                                 ),
                      ), 
	),
)); ?>    


