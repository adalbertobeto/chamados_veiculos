<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
    
    <div class="row">
		<?php echo $form->label($depModel,'dep_nome'); ?>
		<?php echo CHtml::activeDropDownList($depModel,'dep_id',CHtml::listData( $depModel->findAll(), 'dep_id', 'dep_nome' ),
                                          	array('empty'=>'Todos'));?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'cha_termino'); ?>
		<?php echo CHtml::activeDropDownList($model,'cha_termino',
                        array(
                            1=>'Janeiro',
                            2=>'Fevereiro',
                            3=>'Março',
                            4=>'Abril',
                            5=>'Maio',
                            6=>'Junho',
                            7=>'Julho',
                            8=>'Agosto',
                            9=>'Setembro',
                            10=>'Outubro',
                            11=>'Novembro',
                            12=>'Dezembro',
                        ),
                                          	array('empty'=>'Todos'));?>
	</div>
    
    <div class="row">
        <?php echo $form->label($model, "Ano de Termino"); ?>
        <?php $textField = CHtml::activeTextField($model,'ano_termino', array(
            'type'=>'number',
            'value'=>date('Y'),
            'min'=>'2012',
            'max'=>date('Y'),
            'type'=>'number'
        ));
        echo str_replace('type="text"', 'type="number"', $textField); // Essa linha faz o tipo padrão de <input> mudar de "text" para "number"
        ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Pesquisar'); ?>
	</div>

<?php $this->endWidget(); ?>
</div> 


