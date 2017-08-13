<?php
class db
{
	protected $name;
	public function __construct($name)
	{
		$this->name=$name;
	}
	public function __get($name)
	{
		return $this->name;
	}
}
class Mysql extends db{
	function __construct($name)
	{
		parent::__construct($name);
	}
}
class Oracle extends db{
	function __construct($name)
	{
		parent::__construct($name);
	}
}
/*------  */
	class Test{
		public  static  function index(db $db)
		{
			echo  $db->name;
		}
	}
	
	$m=new Mysql('mysql');
	Test::index($m);
	$o=new Oracle('oracle');
	Test::index($o);