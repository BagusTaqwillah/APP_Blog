<?php
class Dashboard extends CI_Controller{

    public function index(){
        $data['blog']=$this->db->get_where('post')->result_array();
        $data['judul']="Blog Lumut";
       $this->load->view('temp_bootstrap/header',$data); 
       $this->load->view('user/dashboard',$data); 
       $this->load->view('temp_bootstrap/footer'); 
    }
    public function detail($id){
        $data['blog']=$this->db->get_where('post',['id_post'=>$id])->row_array();
        $data['judul']="Detail Post";
       $this->load->view('temp_bootstrap/header',$data); 
       $this->load->view('user/detail',$data); 
       $this->load->view('temp_bootstrap/footer'); 
    }
}


?>