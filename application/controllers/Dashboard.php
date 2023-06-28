<?php
class Dashboard extends CI_Controller{

    public function index(){
        $data['blog']=$this->db->get_where('post')->result_array();
        $data['judul']="Blog Lumut";
       $this->load->view('temp_bootstrap/header',$data); 
       $this->load->view('user/dashboard',$data); 
       $this->load->view('temp_bootstrap/footer'); 
    }
}


?>