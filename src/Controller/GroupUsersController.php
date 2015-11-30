<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GroupUsers Controller
 *
 * @property \App\Model\Table\GroupUsersTable $GroupUsers
 */
class GroupUsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Groups']
        ];
        $this->set('groupUsers', $this->paginate($this->GroupUsers));
        $this->set('_serialize', ['groupUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Group User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $groupUser = $this->GroupUsers->get($id, [
            'contain' => ['Users', 'Groups']
        ]);
        $this->set('groupUser', $groupUser);
        $this->set('_serialize', ['groupUser']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $groupUser = $this->GroupUsers->newEntity();
        if ($this->request->is('post')) {
            print_r($this->request->data); 
            $groupUser = $this->GroupUsers->patchEntity($groupUser, $this->request->data);
            if ($this->GroupUsers->save($groupUser)) {
                $this->Flash->success(__('The group user has been saved.'));
                return $this->redirect(['controller'=>'groups', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The group user could not be saved. Please, try again.'));
            }
        } else {
            // Load model for the  Users
            $this->loadModel('Users');
            // Get all the users that belong to the same course as the current user
            $users = $this->Users->find('all')
                                ->where([
                                    'course_id =' => $this->Auth->user('course_id'),
                                    'id <>' => $this->Auth->user('id'), // Make sure we don't list the current user
                                    ]);
        }
        //$users = $this->GroupUsers->Users->find('list', ['limit' => 200]);
        //$groups = $this->GroupUsers->Groups->find('list', ['limit' => 200]);
        $this->set('group_id', $id);
        $this->set(compact('groupUser', 'users', "group_id"));
        $this->set('_serialize', ['groupUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $groupUser = $this->GroupUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $groupUser = $this->GroupUsers->patchEntity($groupUser, $this->request->data);
            if ($this->GroupUsers->save($groupUser)) {
                $this->Flash->success(__('The group user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group user could not be saved. Please, try again.'));
            }
        }
        $users = $this->GroupUsers->Users->find('list', ['limit' => 200]);
        $groups = $this->GroupUsers->Groups->find('list', ['limit' => 200]);
        $this->set(compact('groupUser', 'users', 'groups'));
        $this->set('_serialize', ['groupUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $groupUser = $this->GroupUsers->get($id);
        if ($this->GroupUsers->delete($groupUser)) {
            $this->Flash->success(__('The group user has been deleted.'));
        } else {
            $this->Flash->error(__('The group user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Groups', 'action' => 'index']);
    }
}
