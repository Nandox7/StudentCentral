<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    var $name = 'Events';

    var $paginate = array(
        'limit' => 15
    );

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['EventTypes']
        ];
        $this->set('events', $this->paginate($this->Events));
        $this->set('_serialize', ['events']);
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['EventTypes']
        ]);
        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $eventTypes = $this->Events->EventTypes->find('list', ['limit' => 200]);
        $this->set(compact('event', 'eventTypes'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $eventTypes = $this->Events->EventTypes->find('list', ['limit' => 200]);
        $this->set(compact('event', 'eventTypes'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    // The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
	function feed($id=null) {
		//$this->viewBuilder()->layout("ajax");
		$vars = $this->params['url'];
		$conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));
		$events = $this->Events->find()->all();

		foreach($events as $event) {
			if($event['all_day'] == 1) {
				$allday = true;
				$end = $event['start'];
			} else {
				$allday = false;
				$end = $event['end'];
			}
			$data[] = array(
					'id' => $event['id'],
					'title'=>$event['title'],
					'start'=>$event['start'],
					'end' => $end,
					'allDay' => $allday,
					'url' => '/events/view/'.$event['id'],
					'details' => $event['Event']['details'],
					'className' => $event['EventType']['color']
			);
		}
		
		$this->set("json", json_encode($data));
	}
	
	
    // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
	function update() {
	    //$events = $this->Events->find()->all();
	    // Get params from URL
		$vars = $this->params['url'];
		// Select correct event ID
		//$this->Events->id = $vars['id'];
		// Update & save new values
		//$this->Events->saveField('start', $vars['start']);
		//$this->Events->saveField('end', $vars['end']);
		//$this->Events->saveField('all_day', $vars['allday']);
		
		$event = $this->Events->get($vars['id'], [
            'contain' => []
        ]);
        
        $event->start = $vars['start'];
        $event->end = $vars['end'];
        $event->all_day = $vars['all_day'];
        $this->Events->save($event);
	}

}

?>