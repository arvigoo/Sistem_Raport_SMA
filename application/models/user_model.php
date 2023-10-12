<?php

class user_model extends CI_Model{

    function get_siswa($nis){
		$this->db->select('*');
        $this->db->from('data_siswa');
		$this->db->join('users', 'users.userid = data_siswa.userid');
		$this->db->where('nis',$nis);
        $query = $this->db->get();

		if($query->num_rows() > 0){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->nis,
					$content->nama,
					$content->nisn
				);
			}
			return $data;
		}
		return false;
    }
    
    function updatepass($newpass,$username){
        $data = array(
            'password'=> $newpass
        );
        $this->db->where('userid',$username);
        $this->db->update('users',$data);
    }

    function record_count_raport_siswa($username){
		$this->db->select('*');
        $this->db->from('data_nilai');
		$this->db->join('data_mapel', 'data_mapel.kode_mp = data_nilai.kode_mp');
		$this->db->join('data_siswa', 'data_nilai.nis = data_siswa.nis');
		$this->db->join('users', 'users.userid = data_siswa.userid');	
		$this->db->where('users.userid',$username);	
        $query = $this->db->get();
		return $query->num_rows();
	}

	public function fetch_raport_siswa($limit, $start, $username){
		$this->db->limit($limit, $start);
		$this->db->select('*');
        $this->db->from('data_nilai');
		$this->db->join('data_mapel', 'data_mapel.kode_mp = data_nilai.kode_mp');
		$this->db->join('data_siswa', 'data_nilai.nis = data_siswa.nis');
		$this->db->join('users', 'users.userid = data_siswa.userid');	
		$this->db->where('users.userid',$username);		
        $query = $this->db->get();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}



	function get_raport_siswa($nis){
		$this->db->select('*');
        $this->db->from('data_nilai');
		$this->db->join('data_mapel', 'data_mapel.kode_mp = data_nilai.kode_mp');
		$this->db->join('data_siswa', 'data_nilai.nis = data_siswa.nis');
		$this->db->join('users', 'users.userid = data_siswa.userid');	
		$this->db->where('data_nilai.nis',$nis);	
		$query = $this->db->get();
		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->nis,
					$content->nama,
					$content->nama_mp,
					$content->kkm,
					$content->Pengetahuan,
					$content->Praktik,
                    $content->sikap,
                    $content->nisn
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}
}

?>