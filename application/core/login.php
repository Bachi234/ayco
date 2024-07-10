<?php

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('session');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('Profile');
        }

        $data['title'] = 'Login';
        $this->load->view('include/header', $data);
        $this->load->view('login_view');
        $this->load->view('include/footer');
    }

    public function validate() {
        $submit = $this->input->post('login');

        if(isset($submit)){
            $user = $this->input->post('username');
            $pass = $this->input->post('password');

            $this->load->model('Login_model');
            $account = $this->Login_model->login($user, $pass);

            if (isset($account)) {
                $sess_data = array(
                    'username' => $account->username,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($sess_data);
                redirect('Profile');
            }
            
            $error = 'Invalid username or password';
            $this->session->set_flashdata('error', $error);
            redirect('Login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
?>