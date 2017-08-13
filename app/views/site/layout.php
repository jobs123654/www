<h2>ddd</h2>
<?php 
/*调用其他的视图  */
echo  $this->render('about',array('name'=>'indx'));

?>
/* 数据块 */
<?php $this->beginBlock('layout_block'); ?>
<h1>data block</h1>
<?php $this->endBlock();?>