<?php

namespace App\Controller;


class TweetsController extends AppController{

    public function add(){
        $this->autoRender = false;
        $this->request->allowMethod(['post']);
        $postdata = $this->request->getData();
            $result = [
                'status'=>false,
                'info'=>''
            ];
            $tweet = $this->Tweets->newEmptyEntity();
            $tweet = $this->Tweets->patchEntity($tweet, $this->request->getData());
            if ($tweet->getErrors()) {
                // Entity failed validation.
                $error = $tweet->getErrors();
                $result['error'] = $error;
            }
            if ($this->Tweets->save($tweet)) {
                $result['status'] = true;
                $result['info'] = 'Tweet Saved!';
            }
            else{
                $result['info'] = 'An Error Occured!';
            }
        $this->response = $this->response->withType('application/json');
        $response = $this->response->withStringBody(json_encode($result));
        return $response;
    }

    public function fetch(){
        $this->autoRender = false;
        $this->request->allowMethod(['get']);
        $getData = $this->request->getQueryParams();
        $query = $this->Tweets->find('followertweets',[
            'userId'=>$getData['userId']
        ])->toArray();
        $this->response = $this->response->withType('application/json');
        $response = $this->response->withStringBody(json_encode($query));
        return $response;
    }
}