<?php

class User extends CI_Controller
{
    public function index()
    {
        if($this->session->userdata('userID')){
            $this->load->model('ModUser'); 
            $data['numUser'] = $this->ModUser->countUser();    
            $this->load->view('user/header/header');
            $this->load->view('user/header/css');
            $this->load->view('user/header/navtop');
            $this->load->view('user/header/navleft');
            $this->load->view('user/home/index',$data);
            $this->load->view('user/header/footer');
            $this->load->view('user/header/htmlclose');
        }
        else{
            setFlashData('alert-warning', 'Invalid action. Login via user first', 'user/login');
        }
    }
    public function login(){
        $this->load->view('user/login');
    }
    public function checkUser(){
        $data['userEmail'] = $this->input->post('email',true);
        $data['userPw'] = $this->input->post('password',true);

        if(!empty($data['userEmail']) && !empty($data['userPw']))
        {
           $userdata = $this->modUser->checkUser($data);
           if(count($userdata) == 1){
               $forSession = array(
                    'userID' =>  $userdata[0]['userID'],
                    'userFn' =>  $userdata[0]['userFn'],
                    'userPw' =>  $userdata[0]['userPw'],
               );
               $this->session->set_userdata($forSession);
               if($this->session->userdata('userID')){
                    redirect ('user');
               }
               else{
                    echo 'session not created';
               }
                // var_dump($admindata);
           }
           else{ 
            setFlashData('alert-warning', 'Email/Password incorrect. Try again.', 'user/login');
           }
        }
        else{
            setFlashData('alert-warning', 'Credentials are incorrect.', 'user/login');
        }
    }
    public function Logout()
    {
        if($this->session->userdata('userID')){
            $this->session->set_userdata('userID','');
            $this->session ->set_flashdata('error','Logged out.');
            redirect ('user/login');
        }
        else{
            $this->session ->set_flashdata('error','Please login!');
            redirect ('user/login');
        }
    }
}
