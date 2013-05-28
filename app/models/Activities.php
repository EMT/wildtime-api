<?php

namespace app\models;

class Activities extends \app\extensions\data\Model {

	public $validates = array();
	
	public $belongsTo = array('Timeframes');
}

?>