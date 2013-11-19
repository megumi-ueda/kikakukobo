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

  function login(){
    $user = $this->facebook->getUser();
    if ($user) {
      error_log('already logged-in');
      $this->redirect(array('action'=>'callback'));
    }else{
      error_log('go to facebook login.');
      $this->autoRender = false;
      $next = 'http://*****/facebook/callback/';
      $url = $this->facebook->getLoginUrl(array('redirect_uri' => $callback, 'scope' => 'email,publish_actions'));
      $this->redirect($url);
    }
  }
 
  function callback(){
    $user = $this->facebook->getUser();
    if ($user) {
      try {
        $user_profile = $this->facebook->api('/me');
        error_log('got user!');
        $this->set('user_profile', $user_profile);
      } catch (FacebookApiException $e) {
        error_log(json_encode($e));
        $user = null;
      }
    }else{
      error_log('fail to login?');
    }
  }
