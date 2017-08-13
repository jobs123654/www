<?php 
use yii\helpers\Html;
use yii\helpers\HTMLPurifier;
?>
<h2><?=Html::encode($name)?></h2>
<h2><?=HTMLPurifier::process($name)?></h2>
<?= Html::tag('p', Html::encode($name), ['class' => 'username']) ?>