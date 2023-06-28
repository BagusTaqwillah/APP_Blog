<?php
class Admin extends  CI_Controller{
    public function __construct(){
        parent::__construct();
        $user=$this->db->get_where('account',['username'=>$this->session->userdata('username')])->row_array();
        if ($user==NULL) {
          redirect('login','refresh');
          
        }
        if (!$user['role']=='admin') {
          # code...
          redirect('login','refresh');
      }
      }
    public function index(){
        $countAdmin = $this->db->query("SELECT * FROM account WHERE role='admin' ");
        $data['countAdmin'] = $countAdmin->num_rows();
        $countBiasa = $this->db->query("SELECT * FROM account WHERE role='pengguna' ");
        $data['countBiasa'] = $countBiasa->num_rows();
        $countBiasa = $this->db->query("SELECT * FROM post ");
        $data['countPost'] = $countBiasa->num_rows();
        $data['judul']="Dashboard Admin";
        $data['user']=$this->db->get_where('account',['username'=>$this->session->userdata('username')])->row_array();
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar',$data);
        $this->load->view('temp_admin/topbar',$data);
        $this->load->view('admin/dashboard',$data);
        $this->load->view('temp_admin/footer');
    }
    public function blogPost(){
        # code...
        $data['judul']="Data Blog";
        $data['user']=$this->db->get_where('account',['username'=>$this->session->userdata('username')])->row_array();
        $data['post']=$this->db->get_where('post')->result_array();
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar',$data);
        $this->load->view('temp_admin/topbar',$data);
        $this->load->view('admin/blogpost',$data);
        $this->load->view('temp_admin/footer');
      }
      public function addPost(){
        $data['user']=$this->db->get_where('account',['username'=>$this->session->userdata('username')])->row_array();
        $user=$data['user'];
        $id_user=$user['id_user'];
        $title=$this->input->post('title');
        $tgl_post=$this->input->post('date');
        $content=$this->input->post('content');
        $foto=$_FILES['img']['name'];
        if ($foto = "") {
            var_dump($foto);
            die();
            echo "data tidak ada";
        } else {
            $config['upload_path'] = './assets/img_post';
            $config['allowed_types'] = 'jpeg|jpg|png|gif|pdf|docx';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img')) {
                echo "upload gagal";
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
            $data=[
                'img'=>$foto,
                'content'=>$content,
                'title'=>$title,
                'date'=>$tgl_post,
                'id_user'=>$id_user

            ];
            $this->db->insert('post', $data);
        }
        $this->session->set_flashdata("pesan",'<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Post Di Tambah</strong>.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>');
        redirect('adm_blog');
      }
      public function hapusPost($id){
        $this->db->where('id_post',$id);
         $this->db->delete('post') ;
         $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Post Terhapus</strong>.
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>');
         redirect('adm_blog');
      }
      public function updatePost($id){
        $this->form_validation->set_rules('title', 'title', 'required',[
          'required'=>"nama barang tidak boleh kosong"
      ]);
      
      if ($this->form_validation->run()==false) {
            $data['post']=$this->db->get_where('post',['id_post'=>$id])->row_array();
            $data['user']=$this->db->get_where('account',['username'=>$this->session->userdata('username')])->row_array();
           $data['judul']="Update Post";
           $this->load->view("temp_admin/header",$data);
           $this->load->view("temp_admin/sidebar",$data);
           $this->load->view("temp_admin/topbar",$data);
           $this->load->view("admin/editPost",$data);
           $this->load->view("temp_admin/footer");
      }else{
        $data['user']=$this->db->get_where('account',['username'=>$this->session->userdata('username')])->row_array();
        $user=$data['user'];
        $id_user=$user['id_user'];
        $title=$this->input->post('title');
        $tgl_post=$this->input->post('date');
        $content=$this->input->post('content');
        $foto=$_FILES['img']['name'];
          if ($foto) {
              $config['upload_path']          = './assets/img_post/';
              $config['allowed_types']        = 'gif|jpg|png|JPG|PNG|jpeg';
              $this->load->library('upload', $config);
              $this->upload->do_upload('img');
              $data=[
                'img'=>$foto,
                'content'=>$content,
                'title'=>$title,
                'date'=>$tgl_post,
                'id_user'=>$id_user
              ];
              $this->db->where('id_post',$id);
              $this->db->update('post',$data);
      
                  $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Post Di Update</strong>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>');
              redirect('adm_blog');
          }
          }
        }
        public function Crud_user(){
          $this->form_validation->set_rules('name', 'Nama', 'required',[
              'required'=>"nama tidak boleh kosong"
          ]);
          
          if ($this->form_validation->run() ==  FALSE) {
              # code...
              $data['judul']="Data User";
              $data['user']=$this->db->get_where('account',['username'=>$this->session->userdata('username')])->row_array();
              $data['data_user']=$this->db->get_where('account')->result_array();
              $this->load->view('temp_admin/header',$data);
              $this->load->view('temp_admin/sidebar',$data);
              $this->load->view('temp_admin/topbar',$data);
              $this->load->view('admin/data_user',$data);
              $this->load->view('temp_admin/footer');
          } else {
             $nama=$this->input->post('name');
             $username=$this->input->post('username');
             $pass=$this->input->post('pass');
             $role=$this->input->post('role');
             $passHash=password_hash($pass,PASSWORD_DEFAULT);
             $data=[
              'name'=>$nama,
              'username'=>$username,
              'password'=>$passHash,
              'role'=>$role,
             ];
             $this->db->insert('account',$data);
             $this->session->set_flashdata("pesan",'<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>User Di Tambahkan</strong>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                      redirect('adm_user','refresh');
                      
          }
          
       }
       public function hapus_user($id){
        $this->db->where('id_user',$id);
       $this->db->delete('account');
       $this->session->set_flashdata("pesan",'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>User Di hapus</strong>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('adm_user','refresh');
    }
    public function editUser($id){
      $this->form_validation->set_rules('name', 'name', 'required');
      
      if ($this->form_validation->run()==false) {
        $data['user']=$this->db->get_where('account',['username'=>$this->session->userdata('username')])->row_array();
        // $user=$data['user'];
        // $email=$user['email'];
        $data['data_user']=$this->db->get_where('account',['id_user'=>$id])->row_array();
         $data['judul']="Update Lapangan";
         $this->load->view("temp_admin/header",$data);
         $this->load->view("temp_admin/sidebar",$data);
         $this->load->view("temp_admin/topbar",$data);
         $this->load->view("admin/editUser",$data);
         $this->load->view("temp_admin/footer");
      }else{
        $nama=$this->input->post('name');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $passHash=password_hash($password,PASSWORD_DEFAULT);
        $role=$this->input->post('role');
            $data=[
                'name'=>$nama,
                'username'=>$username,
                'password'=>$passHash,
                'role'=>$role
            ];
            $this->db->where('id_user',$id);
            $this->db->update('account', $data);
            $this->session->set_flashdata("pesan",'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>User Di update</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
       redirect('adm_user');

      }
     }
}


?>