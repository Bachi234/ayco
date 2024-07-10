<?php

class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Profile_model');
}
    public function index() {
    if (!$this->session->userdata('logged_in')) {
        redirect('Login');
    }    

    $page_config = array(
        'base_url' => base_url('Profile'),
        'total_rows' => $this->Profile_model->get_count(),
        'per_page' => 4,

        'full_tag_open' => '<div class="d-flex justify-content-center"><ul class="pagination">',
        'full_tag_close' => '</ul></div>',

        'next_link' => '&raquo',
        'next_tag_open' => '<li class="page-item">',
        'next_tag_close' => '</li>',

        'prev_link' => '&laquo',
        'prev_tag_open' => '<li class="page-item">',
        'prev_tag_close' => '</li>',

        'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
        'cur_tag_close' => '</span></li>',

        'num_tag_open' => '<li class="page-item">',
        'num_tag_close' => '</li>',

        'attributes' => ['class' => 'page-link']
    );
    
    $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
    $this->pagination->initialize($page_config);

    $data['title'] = 'Profile';
    $data['users'] = $this->Profile_model->get_user_table($page_config['per_page'], $page);
    $this->load->view('include/header', $data);
    $this->load->view('profile_view', $data);
    $this->load->view('include/footer');    
}
    public function edit_user($id){
        $data['user'] = $this->Profile_model->get_user_row($id);
        $data['title'] = 'Edit User';
        $this->load->view('include/header', $data);
        $this->load->view('user_view', $data);
        $this->load->view('include/footer');
    }

    public function insert_user() {
        $img_config = array(
            'allowed_types' => 'gif|jpg|png',
            'max_size' => 2000000,
            'max_width' => 2048,
            'max_height' => 2048
        );

        $this->form_validation->set_rules('first_name', 'First Name', 'required|alpha', array(
            'required' => 'Please provide a %s.',
            'alpha' => '%s should only contain alphabets.'
        ));
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha', array(
            'required' => 'Please provide a %s.',
            'alpha' => '%s should only contain alphabets.'
        ));
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user_information.username]', array(
            'required' => 'Please provide a %s.',
            'is_unique' => 'This %s is already taken.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array(
            'required' => 'Please provide a %s.',
            'min_length' => '%s should have a minimum of 8 characters.'
        ));
        
        if($this->upload->do_upload('avatar') == FALSE){
            $this->form_validation->set_rules('avatar', 'Avatar', 'required');
        }

        if ($this->form_validation->run() == FALSE) {
            var_dump($this->upload->data());
            $this->add_user();
        } else {
            $img_name = (!$this->upload->do_upload('avatar')) ? null : $this->upload->data('file_name');

            $info = array(
                'first_name' => $this->input->post('first_name'), 
                'last_name' => $this->input->post('last_name'), 
                'username' => $this->input->post('username'), 
                'password' => $this->input->post('password'),
                'avatar' => $img_name
            );

            $this->Profile_model->insert_user($info);
            
            redirect('Profile');
        } 
    }

    public function add_user() {
        $data['title'] = 'Add User';
        $this->load->view('include/header', $data);
        $this->load->view('user_view');
        $this->load->view('include/footer');
    }

    public function delete_user($id) {
        $this->Profile_model->delete_user($id);
        redirect('Profile');
    }

    
}
?>   
