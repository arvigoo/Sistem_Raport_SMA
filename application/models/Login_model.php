<?php

class Login_model extends CI_Model
{
    function cek($userid, $password){
		$this->db->where('userid', $userid);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
		return $query;
	}

	function detail($username){
		$this->db->where('userid',$username);
		$query = $this->db->get('data_siswa');
		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->nis,
					$content->nama_siswa,
					$content->nisn,
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}
}

?>