<?php
class M_login extends CI_Model{
public function getUser($username){
    return $this->db->get_where("account",['username'=>$username])->row_array();
}

}


?>