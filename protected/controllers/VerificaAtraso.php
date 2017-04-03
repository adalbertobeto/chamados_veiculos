<?php
function verificaAtraso($data) {
    //$debug = fopen('debug.txt', 'r+');
    
    $date = strtotime($data);
    //fwrite($debug, date('d/m/Y H:i:s',$date).' | ');
    if(time() - $date < (24*60*60))
        return CHtml::image(Yii::app()->request->baseUrl . "/images/sla1.png");
    if(time() - $date < (36*60*60))
        return CHtml::image(Yii::app()->request->baseUrl . "/images/sla2.png");
    else
        return CHtml::image(Yii::app()->request->baseUrl . "/images/sla3.png");
    //fwrite($debug, $date2);
}
?>
