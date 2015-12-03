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
        // Get current user id
        $user_id =  $this->Auth->user('id');
        
        // Load model for the Group Users
        $this->loadModel('Groups');
        
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            $event['user_id'] = $user_id;
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $eventTypes = $this->Events->EventTypes->find('list', ['limit' => 200]);
        $this->set(compact('event', 'eventTypes'));
        $this->set('groups', $this->Groups);
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

        $user_id =  $this->Auth->user('id');
        
        // Get params from URL for start and end date		
		$startdate = $this->request->query('start');
		$enddate = $this->request->query('end');
		
		// Fetch all results withing the specified dates
        $events = $this->Events->find('all')
            ->where([
                'start >=' => $startdate, 
                'end <=' => $enddate,
                'user_id =' => $user_id,
                'active =' => 1
                ]);
		
		// Enable to output SQL query
		//debug($events);

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
					//'details' => $event['details'],
					'color' => $event['EventType']['color']
			);
		}
		
		// Ouput json formated data
		$this->set("json", json_encode($data));
	}
	
	
    // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
	function update() {
        
        // Get the event id from the request URL
        $event_id = $this->request->query('id');
        
        // Find the event and load it using the id
        $event = $this->Events->get($event_id, [
            'contain' => []
        ]);
        
        // Update the values
        $event->start = $this->request->query('start');
        $event->end = $this->request->query('end');
        $event->all_day = (bool) $this->request->query('all_day');
        
        // Save the changes
        $this->Events->save($event);
	}

}

?>