<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 */
class CoursesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Colleges']
        ];
        $this->set('courses', $this->paginate($this->Courses));
        $this->set('_serialize', ['courses']);
    }

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => ['Colleges', 'Groups', 'Students']
        ]);
        $this->set('course', $course);
        $this->set('_serialize', ['course']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $course = $this->Courses->newEntity();
        if ($this->request->is('post')) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The course could not be saved. Please, try again.'));
            }
        }
        $colleges = $this->Courses->Colleges->find('list', ['limit' => 200]);
        $this->set(compact('course', 'colleges'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The course could not be saved. Please, try again.'));
            }
        }
        $colleges = $this->Courses->Colleges->find('list', ['limit' => 200]);
        $this->set(compact('course', 'colleges'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
