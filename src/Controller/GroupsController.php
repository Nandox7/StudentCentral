<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupUsersTable $GroupUsers
 */
class GroupsController extends AppController
{


    public function index()
    {
        // Get ID of current user
        $user_id = $this->Auth->user('id');
     
        // Load model for the Group Users
        $this->loadModel('GroupUsers');
        
        $my_groups = $this->GroupUsers->find("all", ['contain' => ['Groups', 'Users']])
            ->where(['user_id =' => $user_id]);
        
        $this->set('myGroups', $this->paginate($my_groups));
        $this->set('myGroups', $my_groups);
        //$this->set('_serialize', ['myGroups']);
    
    }

     /**
     * View method
     *
     * @param string|null $id Group id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Courses', 'GroupUsers']
        ]);
        
        // Load model for the Group Users
        $this->loadModel('GroupUsers');
        
        $groupUsers = $this->GroupUsers->find("all", ['contain' => ['Groups', 'Users']])
            ->where(['group_id =' => $id]);
        
        $this->set('groupUsers', $this->paginate($groupUsers));
        $this->set('groupUsers', $groupUsers);
        
        $this->set('group', $group);
        $this->set('_serialize', ['group', 'groupUsers']);
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        
        //Also add a new user for the group that is the admin that created it
        $groupUsersTable = TableRegistry::get('GroupUsers');
        $groupUser = $groupUsersTable->newEntity();
        
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            $group->course_id = $this->Auth->user('course_id');
            
            if ($this->Groups->save($group)) {
                // also save default admin user
                $groupUser->group_id = $group->id; // ID of the newly created grroup
                $groupUser->user_id = $this->Auth->user('id');;
                $groupUser->is_admin = 1;
                $groupUsersTable->save($groupUser);
                $this->Flash->success(__('The group has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
        
        //$groups = $this->GroupUsers->Groups->find('list', ['limit' => 200]);
        //$users = $this->GroupUsers->Users->find('list', ['limit' => 200]);
        
        //$this->set(compact('groupUser', 'groups', 'users'));
        //$this->set('_serialize', ['groupUser']);
        //$courses = $this->Groups->Courses->find('list', ['limit' => 200]);
        $this->set(compact('group', 'courses'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Groups->Courses->find('list', ['limit' => 200]);
        $this->set(compact('group', 'courses'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
