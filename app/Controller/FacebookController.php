<?php
class FacebookController extends AppController {
    public function index(){
        if($this->request->is('post')){
            $this->redirect(array('action'=>'display'));
        }
    }
     
    public function display(){
        // Facebookへ接続
        $this->connectFb();
        $fb = $this->facebook->getUser();
         
        // Friend List を取得
        try {
            $me = $this->facebook->api('/me');
            $friend_list = $this->facebook->api("{$fb}/friends?fields=gender");
        } catch (FacebookApiException $e){
            error_log($e);
        }
        $this->set(compact('fb'));
        $this->set(compact('me'));
        $this->set(compact('friend_list'));
    }
}