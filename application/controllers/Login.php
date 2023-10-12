<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Login_model');
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$this->load->view('viewlogin');
	}

	function login()
	{
        $userid = $this->input->post('userid');
		$password =	md5($this->input->post('password'));
		$cek = $this->Login_model->cek($userid,$password);
		if($cek->num_rows()==1){
			foreach($cek->result() as $data){
				$sess_data['userid'] = $data->userid;
                $sess_data['password'] = $data->password;
				$sess_data['role'] = $data->role;
				$sess_data['nama'] = $data->nama;
				$this->session->set_userdata($sess_data);
			}
			echo "<script> window.location = '".base_url('index.php/login/dashboard')."'</script>";
		}else{
			echo "<script>alert('Username/Password Salah'); window.location = '".base_url('index.php')."'</script>";
		}
	}

	function logout()
	{
		$array_items = array('userid', 'password', 'role', 'nama');
		$this->session->unset_userdata($array_items);
		echo "<script> window.location = '".base_url()."'</script>";
	}

	function dashboard()
	{
        if($this->session->userdata('userid')==null){
			echo "<script>alert('Anda Belum Login!'); window.location = '".base_url('index.php/login/')."'</script>";
		}else{
            if($this->session->userdata('role')=='admin'){
				$data['jumsis'] = $this->Admin_model->hitung_siswa();
				$data['jumpel'] = $this->Admin_model->hitung_mapel();
				$this->load->view('admin_view/admindashboard',$data);
			}else{
				$data['data_siswa'] = $this->Login_model->detail($this->session->userdata('userid'));
				$this->load->view('user_view/userdashboard', $data);
			}
		}
    }
}
?>