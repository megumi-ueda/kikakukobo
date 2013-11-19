<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $facebook;
    public $helper = array('Html', 'Form', 'Session');
     
    function beforeFilter(){
        App::import('Vendor', 'facebook/src/facebook');
        $this->facebook = new Facebook( array(
						'appId' => Configure::read('facebook.appid'),
						'secret' => Configure::read('facebook.secret'),
                        'cookie' => true 
                        ));
                  
    }
     
    // Facebookで接続するときにOAuthを通す
    public function authFacebook() {
        $login_url = $this->facebook->getLoginUrl(array('scope' => 'email,publish_stream,user_birthday,user_education_history,user_likes'));
        $this->redirect($login_url);
    }
     
    public function connectFb(){
        $fb = $this->facebook->getUser();
        if(empty($fb)){
            $this->authFacebook();
        }
        $this->Session->write('Facebook.id', $fb);
    }
}
