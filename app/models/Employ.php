<?php
namespace  app\models;
use yii\db\ActiveRecord;
class Employ extends ActiveRecord
{
    public  $id=1;
    public  function rules()
    {
    	return [
    	['aId','integer'],
	    ['uname','string','length'=>[1,4]]
    	];
    }
}