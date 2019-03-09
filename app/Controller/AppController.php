<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $layout = 'clean';
    public $components = array(
        'Session',
        'RememberMe',
        'Security',
        'RequestHandler',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            )
        ));
    public $helpers = array('Form', 'Html', 'Time', 'Session');

    function beforeFilter(){
        $this->Auth->redirectUrl("/dashboards/index");
        $this->Auth->loginAction = "/pages/home";
        $this->RememberMe->check();

        $this->Security->validatePost = false;
        $this->Security->csrfCheck = false;
        $user = $this->Auth->user();

        $this->set('user', $user);
        if($user !== null){

            $this->set('demo_user', false);
            if (substr($this->Auth->user('email'), 0, 14) === 'jSlateDemoUser'){
                $this->set('demo_user', true);
            }

            $this->loadModel('Dashboard');
            $this->set('dblist', $this->Dashboard->find('list', array(
                'conditions' => array(
                    'user_id' => $this->Auth->user('id')
                )
            )));
        }
    }
}
