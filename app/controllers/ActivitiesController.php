<?php

namespace app\controllers;

use app\models\Activities;
use app\models\Timeframes;
use lithium\action\DispatchException;

class ActivitiesController extends \lithium\action\Controller {

	public function index() {
		$conditions = array();
		if (!empty($this->request->timeframe_id)) {
			$conditions['timeframe_id'] = $this->request->timeframe_id;
		}
		$activities = Activities::all(array(
			'conditions' => $conditions,
			'with' => array('Timeframes')));
		return compact('activities');
	}

	public function view() {
		$activity = Activities::first(array(
			'conditions' => array('Activities.id' => $this->request->id),
			'with' => array('Timeframes')));
		return compact('activity');
	}
	
	public function populate() {
		Activities::remove();
		Timeframes::remove();
		$items = explode("\n## ", str_replace("\n\r", "\n", file_get_contents('../config/activities.md')));
		echo 'Populating...<br />';
		foreach ($items as $item) {
			if ($item) {
				$tf = explode('### ', $item);
				$timeframe = Timeframes::create();
				$time = explode(':', array_shift($tf));
				$timeframe->human = trim($time[1]);
				$timeframe->minutes = (int)$time[0];
				if ($timeframe->save()) {
					echo '<br />Added Timeframe: ' . $timeframe->human;
					$count = 0;
					$errors = 0;
					foreach ($tf as $a) {
						$activity = Activities::create();
						$act = explode("\n", $a, 3);
						$activity->title = $act[0];
						$activity->image_url = trim(str_replace('Image URL:', '', $act[1]));
						$activity->text = trim($act[2]);
						$activity->timeframe_id = $timeframe->id;
						if ($activity->save()) {
							$count ++;
						}
						else {
							$errors ++;
						}
					}
					echo ' with ' . $count . ' activities and ' . $errors . ' errors.';
				}
			}
		}
		echo '<br /><br />Done.';
		exit();
	}

/*
	public function add() {
		$activity = Activities::create();

		if (($this->request->data) && $activity->save($this->request->data)) {
			return $this->redirect(array('Activities::view', 'args' => array($activity->id)));
		}
		return compact('activity');
	}

	public function edit() {
		$activity = Activities::find($this->request->id);

		if (!$activity) {
			return $this->redirect('Activities::index');
		}
		if (($this->request->data) && $activity->save($this->request->data)) {
			return $this->redirect(array('Activities::view', 'args' => array($activity->id)));
		}
		return compact('activity');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Activities::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		Activities::find($this->request->id)->delete();
		return $this->redirect('Activities::index');
	}
*/
}

?>