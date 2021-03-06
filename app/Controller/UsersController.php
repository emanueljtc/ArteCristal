<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $helpers = array('Html','Form','Time','Js');
	public $components = array('Paginator', 'Session','RequestHandler');
	public $paginate = array (
			'limit' => 5,
			'order' => array('User.fullname' => 'asc')
			);
	//public $layout = 'p_login';

/**
 * index method
 *
 * @return void
 */
	 /*public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','logout');
    }*/
    public function login() {

    if ($this->request->is('post')) {
	    	if ($this->Session->read('Auth.User')) {
	        $this->Session->setFlash(__('Ya esta Logueado'), 'alert-box', array('class'=>'alert-success'));


	        return $this->redirect('/');
	    }
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl());
	        }
	        $this->Session->setFlash(__('Usuario y/o Contraseña incorrectos!'), 'alert-box', array('class'=>'alert-warning'));

	    }
	}

	public function logout() {
	    $this->Session->setFlash(__('Cerrada la Sesion'), 'alert-box', array('class'=>'alert-success'));
		$this->redirect($this->Auth->logout());
	}
	public function index() {

		$this->set('users',$this->User->find('all'));
        	$this->Paginator->settings =$this->paginate;
		    $this->set('users',$this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario Invalido'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuario Registrado con Exito.'), 'alert-box', array('class'=>'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Usuario no ha sido Registrado. Intente de nuevo'), 'alert-box', array('class'=>'alert-danger'));
			}
		}
		$groups = $this->User->Group->find('list');

		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario Invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuario Actualizado con Exito.'), 'alert-box', array('class'=>'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Usuario no ha sido Actualizado. Intente de nuevo'), 'alert-box', array('class'=>'alert-danger'));

			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');

		$this->set(compact('groups'));


	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario Invalido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuario Eliminado con Exito.'), 'alert-box', array('class'=>'alert-success'));
		} else {
			$this->Session->setFlash(__('El Usuario no ha sido Eliminado. Intente de nuevo'), 'alert-box', array('class'=>'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function beforeFilter() {
    parent::beforeFilter();

    // For CakePHP 2.0
    //$this->Auth->allow('*');

    // For CakePHP 2.1 and up

    $this->Auth->allow('login','logout','peligro','add');
}
	//PARA ACTUALIZAR LOS PERMISOS DEBO RECORRER DESDE EL NAVEGADOR
	//ESTA FUNCION users/peligro
	public function peligro() {
    $group = $this->User->Group;

    // Acceso al grupo de administadores
    $group->id = 1;
    $this->Acl->allow($group, 'controllers');

    // Acceso al Grupo de Secretari@s
    $group->id = 2;

    $this->Acl->deny($group, 'controllers');
		$this->Acl->deny($group, 'controllers/Personals/delete');
		$this->Acl->deny($group, 'controllers/Wakes/delete');
		$this->Acl->allow($group, 'controllers/Personals/index');
		$this->Acl->allow($group, 'controllers/Personals/add');
		$this->Acl->allow($group, 'controllers/Personals/view');
		$this->Acl->allow($group, 'controllers/Personals/edit');
		$this->Acl->allow($group, 'controllers/Personals/search');
		$this->Acl->allow($group, 'controllers/Personals/searchjson');
		$this->Acl->allow($group,'controllers/Personals/getPalabraByPersonal');
		$this->Acl->allow($group, 'controllers/Positions/view');
		$this->Acl->allow($group, 'controllers/Wakes');

    // Acceso a otros grupos
    /*$group->id = 3;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Posts/add');
    $this->Acl->allow($group, 'controllers/Posts/edit');
    $this->Acl->allow($group, 'controllers/Widgets/add');
    $this->Acl->allow($group, 'controllers/Widgets/edit');
   */
    // allow basic users to log out
    $this->Acl->allow($group, 'controllers/users/logout');

    // si muestra este mensaje  no hubo error en obtener los nuevos permisos
    echo "Permisos Concedidos";
    exit;
}

}
