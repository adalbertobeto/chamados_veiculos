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

 echo "<br>"; 

 /*<p>
Use os operadores (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) para melhorar os resultados da busca.
</p>*/

?>

<div id="printable1"> <!-- this is where you specify name of section you want to print -->
<center>


<h1>Relatórios Em Aberto</h1>




<?php //echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/exportar.jpg'),CController::createUrl('?r=chamado/pdfresSearchChamado&render=resSearchporChamadosRealizados&file=Relatorio_Cha_Por_Realizados')); ?>
<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/exportar.jpg'),'?r=chamado/resSearchporChamadosEmAberto&render=resSearchporChamadosEmAberto&type=pdf&file=Relatorio_Cha_Por_Em_Aberto'); ?>
<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/exportarXLS.jpg'),'?r=chamado/resSearchporChamadosEmAberto&type=excel'); ?>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_searchrealizados_1',array(
	'model'=>$model,
        'depModel'=>$depModel
)); ?>
</div><!-- search-form -->

<?php  
// ------ Código para a pesquisa personalizada de chamados -------
$depQuery = '';
$cha_terminoQuery = '';
if(isset($_GET['Departamento'])) {
    if($_GET['Departamento']['dep_id'])
        $depQuery = 'AND depto.dep_id=' . $_GET['Departamento']['dep_id'];
}

if(isset($_GET['Chamado'])) {
    if($_GET['Chamado']['cha_termino']) {
        if($_GET['Chamado']['cha_termino'] == 12) {
                $nextMonth = 1;
                if($_GET['Chamado']['ano_termino']) {
                  $nextYear = $_GET['Chamado']['ano_termino'] + 1;
                  $cha_terminoQuery = 'AND cha.cha_datacriacao >= "' .$_GET['Chamado']['ano_termino'] . '-0' . $_GET['Chamado']['cha_termino'].'-01" AND cha.cha_datacriacao < "' .$nextYear. '-0' .$nextMonth.'-01"';
              }
        }      
        else{
              if($_GET['Chamado']['ano_termino']) {
                $nextMonth=$_GET['Chamado']['cha_termino']+1;
                  $year = $_GET['Chamado']['ano_termino'];
                  $cha_terminoQuery = 'AND cha.cha_datacriacao >= "' .$year.'-0' . $_GET['Chamado']['cha_termino'].'-01" AND cha.cha_datacriacao < "' .$year. '-0' .$nextMonth.'-01"';
              }
        }
    }
    else if($_GET['Chamado']['ano_termino']) {
        $cha_terminoQuery = 'AND cha.cha_datacriacao >= "'. $_GET['Chamado']['ano_termino'] . '-01-01" AND cha.cha_datacriacao < "' . $_GET['Chamado']['ano_termino'] . '-12-31"';
    }
}

//$debug = fopen('debug.txt', 'r+');
//      fwrite($debug, print_r($_GET, true));

// ------ Código para a pesquisa personalizada de chamados -------

$sqlCount = 'Select count(*)
              from (SELECT   cha.cha_id AS Chamado,
                cha.cha_nomeusuario AS Usuario,
                proc.pro_nome AS Processo,
                depto.dep_nome AS Departamento,
                cha.cha_inicio AS Inicio,
                cha.cha_termino AS Termino,
                cha.cha_solucao AS Solucao,
                cha.cha_naosolucao
FROM chamado cha, processo proc, departamento depto
WHERE cha.sit_id = 1  AND proc.dep_id=depto.dep_id AND proc.pro_id = cha.pro_id '. $depQuery . ' ' . $cha_terminoQuery . ') T1';
      
      $sql = 'SELECT   cha.cha_id AS Chamado,
                cha.cha_nomeusuario AS Usuario,
                proc.pro_nome AS Processo,
                depto.dep_nome AS Departamento,
                cha.cha_inicio AS Inicio,
                cha.cha_termino AS Termino,
                cha.cha_solucao As Solucao,
                cha.cha_naosolucao
FROM chamado cha, processo proc, departamento depto
WHERE cha.sit_id = 1 AND proc.dep_id=depto.dep_id AND proc.pro_id = cha.pro_id '. $depQuery . ' ' . $cha_terminoQuery;
      
      //$debug = fopen('debug.txt', 'r+');
      //fwrite($debug, $sql);
      
      $queryArray = array(
          'keyField'=>'Chamado',
          'totalItemCount'=>Yii::app()->db->createCommand($sqlCount)->queryScalar(),
          'sort'=>array(
          'attributes'=>array(
                'Chamado',
                'Usuario',
                'Processo',
                'Departamento',
                'Inicio',
        ),
      ),
          'pagination'=>array(
          'pageSize'=>20,)
      );
      
      //$debug = fopen('debug.txt', 'r+');
      //fwrite($debug, Yii::app()->db->createCommand($sqlCount)->queryScalar());
      
      $_SESSION['excel'] = $sql;
      $_SESSION['titulo'] = "Relatório de Chamados Realizados";
      $dataProvider = new CSqlDataProvider($sql, $queryArray);
      //$data = new CActiveDataProvider($model);
      //$data->data = $dataProvider->data;
      
      //$model = new Chamado('search');
      $this->widget('zii.widgets.grid.CGridView', array(
	   'id'=>'chamado-grid',
	   'dataProvider'=>  $dataProvider,
           'columns'=>array(
                'Chamado',
                'Usuario',
                'Processo',
                'Departamento',
                'Inicio',
                //'cha_naosolucao'
                /*array(
			'class'=>'CButtonColumn',
		),*/
	                   ),
           ));   
          
?>
</div>