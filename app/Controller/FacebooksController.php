<?php
App::import('Vendor', 'facebook/src/facebook');
class FacebooksController extends AppController{
  protected $facebook = NULL;
 
  function beforeFilter(){
    $this->facebook = new Facebook(array(
        'appId'  => Configure::read('facebook.appid'),
        'secret' => Configure::read('facebook.secret'),
    ));
  }
  
  function index(){
  }

  public function login(){
   $this->autoRender = false;
  
    $url = $this->facebook->getLoginUrl(array('next' => 'http://localhost/facebooks/callback', 'req_perms' => 'email,publish_stream'));
    $this->redirect($url);
   }

  function callback(){

    $session = $this->facebook->getSession();
    $me = null;
  
    if ($session) {
        try {
            $uid = $this->facebook->getUser();
            $me = $this->facebook->api('/me');
        } catch (FacebookApiException $e) {
            error_log($e);
        }
    }
    $access_token = $this->facebook->getAccessToken();
    $user_data = array(
        'User' => array(
            'username' => $me['first_name'].'.'.$me['last_name'],
            'password' => $this->Auth->password(mt_rand()),
            'email' => $me['email'],
            'other_service_id' => array('facebook' => $me['id'], 'token' => $access_token)
        )
    );
  }
  }