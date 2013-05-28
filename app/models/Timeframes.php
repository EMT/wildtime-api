<?php

namespace app\models;

class Timeframes extends \app\extensions\data\Model {

	public $validates = array();
	
	public $hasMany = array('Activities');
}

?>