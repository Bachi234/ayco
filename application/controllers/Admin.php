<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModAdmin');
        $this->load->library('form_validation');
    }
    public function index()
    {
        if($this->session->userdata('adminID')){
        $this->load->model('ModAdmin'); 
        $data['numCategories'] = $this->ModAdmin->countCategories();    
        $this->load->view('admin/header/header');
        $this->load->view('admin/header/css');
        $this->load->view('admin/header/navtop');
        $this->load->view('admin/header/navleft');
        $this->load->view('admin/home/index',$data);
        $this->load->view('admin/header/footer');
        $this->load->view('admin/header/htmlclose');
        }
        else{
            setFlashData('alert-warning', 'Invalid action. Login via admin first!!!', 'admin/login');
        }
    }
    public function login()
    {
        $this->load->view('admin/login');
    }
    public function signup()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('adminFirstName', 'First Name', 'trim|required');
            $this->form_validation->set_rules('adminLastName', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('adminEmail', 'Email', 'trim|required|valid_email|is_unique[admins.adminEmail]', array(
                'is_unique' => 'This email address is already registered.'
            ));
            $this->form_validation->set_rules('adminPassword', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/signup');
            } else {
                $data = array(
                    'adminFirstName' => $this->input->post('adminFirstName', true),
                    'adminLastName' => $this->input->post('adminLastName', true),
                    'adminEmail' => $this->input->post('adminEmail', true),
                    'adminPassword' => password_hash($this->input->post('adminPassword', true), PASSWORD_DEFAULT),
                    'adminDate' => date('Y-m-d H:i:s')
                );
                $signupResult = $this->ModAdmin->signUpAdmin($data);
                if ($signupResult) {
                    $this->session->set_flashdata('alert', array('type' => 'success', 'message' => 'Admin account created successfully. Please login.'));
                    redirect('admin/login');
                } else {
                    $this->session->set_flashdata('alert', array('type' => 'danger', 'message' => 'Failed to create admin account.'));
                    redirect('admin/signup');
                }
            }
        } else {
            $this->load->view('admin/signup');
        }
    }
    public function checkAdmin()
    {
        $data['adminEmail'] = $this->input->post('email',true);
        $data['adminPassword'] = $this->input->post('password',true);

        if(!empty($data['adminEmail']) && !empty($data['adminPassword']))
        {
           $admindata = $this->modAdmin->checkAdmin($data);
           if(count($admindata) == 1){
               $forSession = array(
                    'adminID' => $admindata[0]['adminID'],
                    'adminName' => $admindata[0]['adminName'],
                    'adminPassword' => $admindata[0]['adminPassword'],
               );
               $this->session->set_userdata($forSession);
               if($this->session->userdata('adminID')){
                    redirect ('admin');
               }
               else{
                    echo 'session not created';
               }
                // var_dump($admindata);
           }
           else{ 
            setFlashData('alert-warning', 'Email/Password incorrect. Try again.', 'admin/login');
           }
        }
        else{
            setFlashData('alert-warning', 'Credentials are incorrect.', 'admin/login');
        }
    }
    public function Logout()
    {
        if($this->session->userdata('adminID')){
            $this->session->set_userdata('adminID','');
            $this->session ->set_flashdata('error','Logged out.');
            redirect ('admin/login');
        }
        else{
            $this->session ->set_flashdata('error','Please login!');
            redirect ('admin/login');
        }
    }
    public function newCategory()
    {
        if(adminLoggedIn()){
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/newCategory');
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        }
        else{
            setFlashData('alert-warning', 'Invalid action. Login via admin to add categories.', 'admin/newCategory');
        }
    }
    public function addCategory()
    {
        if(adminLoggedIn()){
            $data['categoryName'] = $this->input->post('categoryName',true);
            $data['categoryCPU'] = $this->input->post('categoryCPU',true);
            $data['categoryRam'] = $this->input->post('categoryRam',true);
            $data['categoryCooler'] = $this->input->post('categoryCooler',true);
            $data['categoryFans'] = $this->input->post('categoryFans',true);
            $data['categoryCase'] = $this->input->post('categoryCase',true);
            if(!empty($data['categoryName'])){
                $path = realpath(APPPATH.'../assets/images/categories');
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'png|jpg|jpeg';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('categoryDp')){
                   $error = $this->upload->display_errors();
                   setFlashData('alert-warning', $error, 'admin/newCategory');
                }
                else{
                    $fileName = $this->upload->data();
                    $data['categoryDp'] = $fileName['file_name'];
                    $data['categoryDate'] = date('Y-M-d h:s:sa');
                    $data['adminId'] = getAdminId();
                }
                $addData = $this->modAdmin->checkCategory($data);
              if($addData->num_rows() > 0){
                setFlashData('alert-danger', 'Category already exists.', 'admin/newCategory');
              }
              else{
                    $addData = $this->modAdmin->addCategory($data);
                    if($addData){
                        setFlashData('alert-success', 'Category inserted.', 'admin/newCategory');
                    }
                    else{
                        setFlashData('alert-warning', 'Something went wrong...', 'admin/newCategory');
                    }
              }
            }
            else{
                setFlashData('alert-warning', 'Category name is required.', 'admin/newCategory');
            }
        }
        else{
            setFlashData('alert-warning', 'Invalid action. Login via admin to add categories.', 'admin/login');
        }
    }

    public function viewCategories()
    {
        if(adminLoggedIn()){
            $config['base_url'] = site_url('admin/viewCategories');
            $totalRows = $this->modAdmin->viewAllCategories();
            
            $config['total_rows'] = $totalRows;
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $this->load->library('pagination');
            $this->pagination->initialize($config);
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3):0;  
            $data['viewCategories'] = $this->modAdmin->fetchAllCategories($config['per_page'],$page); 
            $data['links'] = $this->pagination->create_links();

            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/viewCategories', $data);
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        }else{
            setFlashData('alert-warning', 'Invalid action. Login via admin to add categories.', 'admin/login');
        }
    }
    
    public function editCategory($categoryID){
        if(adminLoggedIn()){
            if(!empty($categoryID) && isset($categoryID)){
                $data['category'] = $this->modAdmin->checkCatById($categoryID);
                if(count($data['category'])==1){
                    $this->load->view('admin/header/header');
                    $this->load->view('admin/header/css');
                    $this->load->view('admin/header/navtop');
                    $this->load->view('admin/header/navleft');
                    $this->load->view('admin/home/editCategory',$data);
                    $this->load->view('admin/header/footer');
                    $this->load->view('admin/header/htmlclose');
                }else{
                    setFlashData('alert-warning', 'Category not found.', 'admin/viewCategories');
                }
            }else{
                setFlashData('alert-warning', 'Nuh uh you cannot do that.', 'admin/viewCategories');
            }
        }
        else{
            setFlashData('alert-warning', 'Invalid action. Login via admin to add categories.', 'admin/login');
        }
    }

    public function updateCategory(){
        if(adminLoggedIn()){
           $data['categoryName'] = $this->input->post('categoryName',true);
           $data['categoryCPU'] = $this->input->post('categoryCPU',true);
           $data['categoryRam'] = $this->input->post('categoryRam',true);
           $data['categoryCooler'] = $this->input->post('categoryCooler',true);
           $data['categoryFans'] = $this->input->post('categoryFans',true);
           $data['categoryCase'] = $this->input->post('categoryCase',true);
           $categoryID = $this->input->post('xid',true);
           $xImage = $this->input->post('xImage',true);
           if(!empty($data['categoryName']) && isset( $data['categoryName'])){
                if(isset($_FILES['categoryDp']) && is_uploaded_file($_FILES['categoryDp']['tmp_name'])){
                    $path = realpath(APPPATH.'../assets/images/categories');
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'png|jpg|jpeg';
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('categoryDp')){
                       $error = $this->upload->display_errors();
                       setFlashData('alert-warning', $error, 'admin/viewCategories');
                    }
                    else{
                        $fileName = $this->upload->data();
                        $data['categoryDp'] = $fileName['file_name'];
                    }
                }//imgChk
                $reply = $this->modAdmin->updateCategory($data,$categoryID);
                if($reply){
                    if(!empty($data['categoryDp']) && isset($data['categoryDp'])){
                        if(file_exists($path.'/'. $xImage)){
                            unlink($path.'/'. $xImage);
                        }
                    }
                    setFlashData('alert-success', 'Category updated!!!', 'admin/viewCategories');
                }else{
                    setFlashData('alert-warning', 'Something went wrong....', 'admin/viewCategories');
                }
           }
           else{
            setFlashData('alert-warning', 'Category name is required.', 'admin/viewCategories');
           }
        }
        else{
            setFlashData('alert-warning', 'Invalid action. Login via admin to add categories.', 'admin/login');
        }
    }

    public function deleteCategory(){
        if(adminLoggedIn()){
            if($this->input->is_ajax_request()){
                $this->input->post('id',true); 
                $categoryID = $this->input->post('text',true); 
                if(!empty($categoryID) && isset($categoryID)){
                    $categoryID = $this->encryption->decrypt($categoryID);  
                    $checkMd= $this->modAdmin->deleteCategory($categoryID);
                    if($checkMd){
                        echo 'nadale';
                        // setFlashData('alert-success', 'Category deleted. Refresh the page.', 'admin/viewCategories');
                    }else{
                        echo 'nuh uh';
                        setFlashData('alert-warning', 'Something went wrong....', 'admin/viewCategories');
                    }
                }else{
                    echo 'nuh uh';
                }
            }else{
                setFlashData('alert-warning', 'Something went wrong....', 'admin/viewCategories');
            }
        }else{
            setFlashData('alert-warning', 'Invalid action. Login via admin to add categories.', 'admin/login');
        }
    }
    
    public function viewAccounts(){
        if(adminLoggedIn()){
            $config['base_url'] = site_url('admin/viewAccounts');
            $totalRows = $this->modAdmin->viewAllAccounts();
            
            $config['total_rows'] = $totalRows;
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $this->load->library('pagination');
            $this->pagination->initialize($config);
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3):0;  
            $data['viewCategories'] = $this->modAdmin->fetchAllUsers($config['per_page'],$page); 
            $data['links'] = $this->pagination->create_links();

            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/viewCategories', $data);
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        }else{
            setFlashData('alert-warning', 'Invalid action. Login via admin to view users.', 'admin/login');
        }
    }
}