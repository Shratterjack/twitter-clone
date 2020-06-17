<?php

namespace App\Controller;

class UsersController extends AppController
{

    public function add()
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post']);
        $postdata = $this->request->getData();
        if ($postdata['password'] == $postdata['confirmPassword']) {
            $result = [
                'status'=>false,
                'info'=>''
            ];
            $user = $this->Users->newEmptyEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($user->getErrors()) {
                // Entity failed validation.
                $error = $user->getErrors();
                $result['error'] = $error;
            }
            if ($this->Users->save($user)) {
                $result['status'] = true;
                $result['info'] = 'User Saved!';
            }
            else{
                $result['info'] = 'An Error Occured!';
            }
        }
        $this->response = $this->response->withType('application/json');
        $response = $this->response->withStringBody(json_encode($result));
        return $response;
    }

    // public function profile(){
    //     $this->autoRender = false;
    //     $this->request->allowMethod(['get']);
    //     $getData = $this->request->getData();
    //     $result = $this->Users->findAllByEmail($getData['email'])->toArray();
    //     $this->response = $this->response->withType('application/json');
    //     $response = $this->response->withStringBody(json_encode($result));
    //     return $response;
    // }

    public function profile(){
        $this->autoRender = false;
        $this->request->allowMethod(['get']);
        $getData = $this->request->getQueryParams();
        $query = $this->Users->find('userprofile',[
            'userId'=>$getData['userId']
        ])->toArray();      
        $this->response = $this->response->withType('application/json');
        $response = $this->response->withStringBody(json_encode($query));
        return $response;
    }

    public function follow(){
        $this->autoRender = false;
        $this->request->allowMethod(['post']);
        $this->loadModel('Connections');
        $postdata = $this->request->getData();
            $result = [
                'status'=>false,
                'info'=>''
            ];
            $connection = $this->Connections->newEmptyEntity();
            $connection = $this->Connections->patchEntity($connection, $this->request->getData());
            if ($connection->getErrors()) {
                // Entity failed validation.
                $error = $Connections->getErrors();
                $result['error'] = $error;
            }
            if ($this->Connections->save($connection)) {
                $result['status'] = true;
                $result['info'] = 'Connection Saved!';
            }
            else{
                $result['info'] = 'An Error Occured!';
            }
        $this->response = $this->response->withType('application/json');
        $response = $this->response->withStringBody(json_encode($result));
        return $response;
    }


    public function login(){
        $this->autoRender = false;
        $this->request->allowMethod(['post']);
        $postdata = $this->request->getData();
    }
}
