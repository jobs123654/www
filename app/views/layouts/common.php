<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>welcome</title>
</head>
<body>
<?=$content?>
<?php 
echo  $this->blocks['layout_block'];
?>
<?php if(isset($this->blocks['index_block']))?>
<?=$this->blocks['index_block']?>
<?php else?>
<h1>no blicks</h1>
<?php endif;?>
</body>
</html>