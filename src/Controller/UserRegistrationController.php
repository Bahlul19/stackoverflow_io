<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
//use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Database\Query;
use Cake\Event\EventManager;

use Cake\Datasource\ConnectionManager;
/**
 * UserRegistration Controller
 *
 * @property \App\Model\Table\UserRegistrationTable $UserRegistration
 *
 * @method \App\Model\Entity\UserRegistration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserRegistrationController extends AppController
{        
        private $connection;
        private $table;

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
   
    
    //Initial the function
    
    public function initialize() 
    {
       parent::initialize();
        $this->table = TableRegistry::get('user_registration');
       // $this->connection = ConnectionManager::get('default');
        //$this->table = TableRegistry::get('user_registration');
        
        //$this->table = TableRegistry::get('user_registration');
        
//        $this->viewBuilder()->setLayout("main");
//        $this->loadModel("UserRegistration");
        
       // $this->table = TableRegistry::config('UserRegistration', ['table' => 'user_registration']);
        $this->viewBuilder()->setLayout("main");
        $this->loadModel("UserRegistration");
    }


    public function index()
    {
        $userRegistration = $this->paginate($this->UserRegistration);

        $this->set(compact('userRegistration'));
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    
   public function add()
   {
       $this->set("title","Registration Form");
   }
    
    
    
    /**
     * Save method
     *
     * @param string|null $id User Registration id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function save()
    {
        $this->autoRender = false;
        $userRegistration = $this->UserRegistration->newEntity($this->request->data);
        $formData = $this->request->data();
        $userRegistration->name = $formData['name'];
        $userRegistration->email = $formData['email'];
        $userRegistration->password = $formData['password'];
        
        if($this->UserRegistration->save($userRegistration))
        {
            $this->Flash->success(__('The user registration has been saved.'));
        }
        else
        {
            $this->Flash->error(__('The user registration could not be saved. Please, try again.'));
        }
    }
    
    
    

    /**
     * View method
     *
     * @param string|null $id User Registration id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userRegistration = $this->UserRegistration->get($id, [
            'contain' => []
        ]);

        $this->set('userRegistration', $userRegistration);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    /**
     * Edit method
     *
     * @param string|null $id User Registration id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userRegistration = $this->UserRegistration->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userRegistration = $this->UserRegistration->patchEntity($userRegistration, $this->request->getData());
            if ($this->UserRegistration->save($userRegistration)) {
                $this->Flash->success(__('The user registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user registration could not be saved. Please, try again.'));
        }
        $this->set(compact('userRegistration'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Registration id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userRegistration = $this->UserRegistration->get($id);
        if ($this->UserRegistration->delete($userRegistration)) {
            $this->Flash->success(__('The user registration has been deleted.'));
        } else {
            $this->Flash->error(__('The user registration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Login method
     *
     * @param string|null $id User Registration id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    public function login()
    {
        if($this->request->is('post'))
        {   
            $user = $this->Auth->identify();   
            
            //dd($user);
          
            if($user)
            {
                $this->Auth->setUser($user);
                //$this->Flash->success('You are successfully login to the system');
                //return $this->redirect(['controller'=>'UserRegistration','action'=>'index']);
            
                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                $this->Flash->error('Username and password not correct');
            }            
        }
    }
    
    /**
     * Logout method
     *
     * @param string|null $id User Registration id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    public function logout()
    {
        $this->redirect($this->Auth->logout());
        $this->Flash->success("Thanks for visiting");
    }
    
}
