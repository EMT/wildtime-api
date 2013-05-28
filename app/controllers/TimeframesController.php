<?php

namespace app\controllers;

use app\models\Timeframes;
use lithium\action\DispatchException;

class TimeframesController extends \lithium\action\Controller {

	public function index() {
		$with = (empty($this->request->query['with'])) ? array() : $this->request->query['with'];
		$timeframes = Timeframes::all(array('with' => $with));
		return compact('timeframes');
	}

	public function view() {
		$with = (empty($this->request->query['with'])) ? array() : $this->request->query['with'];
		$timeframe = Timeframes::first(array(
			'conditions' => array('timeframes.id' => $this->request->id),
			'with' => $with));
		return compact('timeframe');
	}
	

/*
	public function add() {
		$timeframe = Timeframes::create();

		if (($this->request->data) && $timeframe->save($this->request->data)) {
			return $this->redirect(array('Timeframes::view', 'args' => array($timeframe->id)));
		}
		return compact('timeframe');
	}

	public function edit() {
		$timeframe = Timeframes::find($this->request->id);

		if (!$timeframe) {
			return $this->redirect('Timeframes::index');
		}
		if (($this->request->data) && $timeframe->save($this->request->data)) {
			return $this->redirect(array('Timeframes::view', 'args' => array($timeframe->id)));
		}
		return compact('timeframe');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Timeframes::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		Timeframes::find($this->request->id)->delete();
		return $this->redirect('Timeframes::index');
	}
*/
}

?>