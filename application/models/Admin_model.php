<?php

class Admin_model extends CI_Model{

    function hitung_siswa(){
		$this->db->where('role', 'user');
		$query = $this->db->get('users');
		return $query->num_rows();
    }
    
    function hitung_mapel(){
        $query = $this->db->get('data_mapel');
		return $query->num_rows();
    }
    
    public function record_count_siswa(){
        $this->db->select('*');
        $this->db->from('data_siswa');
        $this->db->join('users', 'users.userid = data_siswa.userid');
        $query = $this->db->get();
		return $query->num_rows();
	}

	public function fetch_sis($limit, $start){
		$this->db->limit($limit, $start);
		$this->db->select('*');
        $this->db->from('data_siswa');
        $this->db->join('users', 'users.userid = data_siswa.userid');
        $query = $this->db->get();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	function add_siswa($arg){
		$data = array(
			'userid' => $arg[1],
			'password'=> md5($arg[3]),
			'role'=> 'user',
			'nama' => $arg[2]
		);
		$this->db->insert('users',$data);
		$detail = array(
			'nis' => $arg[0],
			'userid'=> $arg[1],
			'nama_siswa'=> $arg[2],
			'nisn'=> $arg[3]
		);
		$this->db->insert('data_siswa',$detail);
	}

	function delete_siswa($id){
		$this->db->where('userid',$id);
		$this->db->delete('data_siswa');

		$this->db->where('userid',$id);
		$this->db->delete('users');
	}

	function update_siswa($form,$userid){
		$data = array(
			'userid' => $form[1],
			'a.nama'=> $form[2]
		);
		$detail = array(
			'b.nama_siswa'=> $form[2],
			'b.nisn'=> $form[4],
			'userid' => $form[1]
		);
		$this->db->where('a.userid',$userid);
		$this->db->update('users as a',$data);
		$this->db->where('b.userid',$userid);
		$this->db->update('data_siswa as b',$detail);
	}

	function get_siswa(){
		$this->db->select('*');
        $this->db->from('data_siswa');
        $this->db->join('users', 'users.userid = data_siswa.userid');
        $query = $this->db->get();

		if($query->num_rows() > 0){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->userid,
					$content->nis,
					$content->nama_siswa,
					$content->nisn
				);
			}
			return $data;
		}
		return false;
	}

	public function record_count_mp(){
        $this->db->select('*');
        $this->db->from('data_mapel');
        $query = $this->db->get();
		return $query->num_rows();
	}

	public function fetch_mp($limit, $start){
		$this->db->limit($limit, $start);
		$this->db->select('*');
        $this->db->from('data_mapel');
        $query = $this->db->get();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	function add_mapel($arg){
		$data = array(
			'kode_mp' => $arg[0],
			'nama_mp'=> $arg[1],
			'kkm'=> $arg[2]
		);
		$this->db->insert('data_mapel',$data);
	}
	function update_mapel($form,$kode_mp){
		$data = array(
			'nama_mp'=> $form[1],
			'kkm'=> $form[2]
		);
		$this->db->where('kode_mp',$kode_mp);
		$this->db->update('data_mapel',$data);
	}
	function delete_mapel($id){
		$this->db->where('kode_mp',$id);
		$this->db->delete('data_mapel');
	}
	function get_mapel(){
		$this->db->select('*');
        $this->db->from('data_mapel');
        $query = $this->db->get();

		if($query->num_rows() > 0){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->kode_mp,
					$content->nama_mp,
					$content->kkm
				);
			}
			return $data;
		}
		return false;
	}

	function tampil_siswa(){
		$this->db->select('*');
        $this->db->from('data_siswa');
		$this->db->join('users', 'users.userid = data_siswa.userid');
		$query = $this->db->get();

		if($query->result()){
            foreach ($query->result() as $content) {
                $data[] = array(
                    $content->nis,
                    $content->nama_siswa
                );
            }
            return $data;
        }else{
            return FALSE;
        }
	}

	function tampil_mapel(){
		$this->db->select('*');
        $this->db->from('data_mapel');
		$query = $this->db->get();

		if($query->result()){
            foreach ($query->result() as $content) {
                $data[] = array(
                    $content->kode_mp,
                    $content->nama_mp
                );
            }
            return $data;
        }else{
            return FALSE;
        }
	}

	function record_count_raport_siswa($nis){
		$this->db->select('*');
        $this->db->from('data_nilai');
		$this->db->join('data_mapel', 'data_mapel.kode_mp = data_nilai.kode_mp');
		$this->db->join('data_siswa', 'data_nilai.nis = data_siswa.nis');
		$this->db->join('users', 'users.userid = users.userid');	
		$this->db->where('data_nilai.nis',$nis);	
        $query = $this->db->get();
		return $query->num_rows();
	}

	public function fetch_rapor_siswa($limit, $start, $nis){
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('data_nilai');
		$this->db->join('data_mapel', 'data_mapel.kode_mp = data_nilai.kode_mp');
		$this->db->join('data_siswa', 'data_nilai.nis = data_siswa.nis');
		$this->db->join('users', 'users.userid = data_siswa.userid');
		$this->db->where('data_nilai.nis',$nis);		
        $query = $this->db->get();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	function add_rapor($arg){
		$data = array(
			'nis' => $arg[1],
			'kode_mp'=> $arg[0],
			'pengetahuan'=> $arg[2],
			'praktik'=> $arg[3],
			'sikap'=> $arg[4],
		);
		$this->db->insert('data_nilai',$data);
	}

	function delete_nilai($kode_mp,$nis){
		$this->db->where('kode_mp',$kode_mp);
		$this->db->where('nis',$nis);
		$this->db->delete('data_nilai');
	}

	function get_nilai_siswa($nis){
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