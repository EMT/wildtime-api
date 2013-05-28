<?php


namespace app\extensions\data;


/*
use lithium\data\Connections;
Connections::get('default')->applyFilter('_execute', function($self, $params, $chain) {
    var_dump($params['sql']);
    return $chain->next($self, $params, $chain);
});
*/


class Model extends \lithium\data\Model {



	public function save($entity, $data = null, array $options = array()) {
		//	Set created and updated timestamps
	    $entity->updated = time();
	    if (!$entity->exists()) {
	    	$entity->created = $entity->updated;	
	    }
	    return parent::save($entity, $data, $options);
	}
	
	
	public static function exists($conditions) {
		return (self::first(array('conditions' => $conditions, 'fields' => array('id'))));
	}
	
	
	public function humanBoolean($entity, $field) {
		return ($entity->$field) ? 'Yes' : 'No';
	}
	
	
	public function humanDate($entity, $field, $format = 'j M Y') {
		if (time() - $entity->$field < 60*60*12*365) {
			$format = trim(str_replace('Y', '', $format));
		}
		return date($format, $entity->$field);
	}
	
	

}

?>