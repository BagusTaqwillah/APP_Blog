<?php

class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('M_login');

    }
    public function index(){
        $this->form_validation->set_rules('username','username','required',[
            'required'=>"username tidak boleh kosong",
        ]);
        $this->form_validation->set_rules('password','Password','required|min_length[6]',[
            'required'=>"password kosong",
            'min_length'=>"minimal 6 karakter"
        ]);
        if ($this->form_validation->run()==false) {
            $data['judul']="Login";
            $this->load->view('temp_bootstrap/header',$data);
            $this->load->view('login/login',$data);
            $this->load->view('temp_bootstrap/footer');
        }else{
          $this-> _login();
        }
    }

    private function _login(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $role=$this->input->post('role');
        $user=$this->M_login->getUser($username);
        if ($user) {
            
           if (password_verify($password,$user['password'])) {
            $data = [
                "username"=>$user['username']
            ];
            $this->session->set_userdata($data);
            
             if ($role==='pengguna'&&$user["role"]==="pengguna") {          
                redirect('admin','refresh'); 
             }else if($role==='admin'&&$user["role"]==="admin"){ 
                redirect('admin','refresh'); 
             }else{
                $this->session->set_flashdata("pesan",'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Pastikan Member sesuai</strong>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('login','refresh');
                
             }
           }else{
            $this->session->set_flashdata("pesan",'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Password Salah</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('login','refresh');
           }
        }else{
            $this->session->set_flashdata("pesan",'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>username Belum Terdaftar</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          
          redirect('login','refresh');
        }
    }
    public function logout(){
        
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Anda Telah Logout</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
       redirect('login');

    }
}


?>