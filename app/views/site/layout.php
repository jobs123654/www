<h2>ddd</h2>
<?php 
/*������������ͼ  */
echo  $this->render('about',array('name'=>'indx'));

?>
/* ���ݿ� */
<?php $this->beginBlock('layout_block'); ?>
<h1>data block</h1>
<?php $this->endBlock();?>