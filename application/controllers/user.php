<?php

class user extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->library('pagination');
    }

    function cetak_data()
    {
        $pilih = $this->input->post('pilih');
        if($pilih == 'pdf'){
            $this->cetak_data_pdf($this->input->post('nis'));
        }else if($pilih == 'excel'){
            $this->cetak_data_excel($this->input->post('nis'));
        }else{
            echo "<script>alert('Cetak Error!'); window.location = '".base_url('index.php/login/dashboard')."'</script>";
        }
    }

    function cetak_data_pdf($nis)
    {
        $mpdf = new \Mpdf\Mpdf();
        $result = $this->user_model->get_siswa($nis);
        $pdf='print';
        $output = "<h1>Data Siswa CENDERAWASIH 2</h1>";
        $output .= "<table border='1' width='100%' cellpadding='5'>
                   <tr>
                        <th>Nomor Induk Siswa</th>
                        <th>Nama Peserta Didik</th>
                        <th>NISN</th>
                    </tr>";
        $no = 1;
        foreach ($result as $data){
        $output .= "<tr>
                        <td>$data[0]</td>
                        <td>$data[1]</td>
                        <td>$data[2]</td>
                    </tr>";
        $no++;
        }
        $output .= "</table>";
        $nama = 'Data Siswa SMA CENDERAWASIH 2';
        $mpdf->WriteHTML($output);
        $mpdf->Output($nama.".pdf", 'I');
    }

    function cetak_data_excel($nis)
    {
        $data['title']= 'Biodata Siswa '.$nis;
        $data['result'] = $this->user_model->get_siswa($nis);

        $this->load->view('datasiswaxlsx',$data);
    }

    function ubahpass_siswa()
    {
        $this->load->view('user_view/updatepasssiswa');
    }

    function updatepass_siswa()
    {
        $oldpass = md5($this->input->post('passold'));
        $newpass = md5($this->input->post('passnew'));
        $username = $this->session->userdata('userid');
        if($oldpass == $this->session->userdata('password')){
            $this->user_model->updatepass($newpass,$username);
            echo "<script>alert('Password Kamu Berhasil di Perbarui!'); window.location = '".base_url('index.php/login/dashboard')."'</script>";
        }else{
            echo "<script>alert('Password Lama Kamu Salah!'); window.location = '".base_url('index.php/siswa/ubahpass_siswa')."'</script>";
        }
    }

    function tampil_raport()
    {
        $username = $this->session->userdata('userid');
        $config = array();
		$config['base_url'] = base_url()."index.php/admin/tampil_raport_siswa/";
		$config['total_rows'] = $this->user_model->record_count_raport_siswa($username);
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['results'] = $this->user_model->fetch_raport_siswa($config['per_page'], $page, $username);
		$data['links'] = $this->pagination->create_links();
		$data['page'] = $page;
        $this->load->view('user_view/raport_siswa',$data);
    }



    function cetak_rapor()
    {
        $pilih = $this->input->post('pilih');
        if($pilih == 'pdf'){
            $this->cetak_rapor_pdf($this->input->post('nis'));
        }else if($pilih == 'excel'){
            $this->cetak_rapor_excel($this->input->post('nis'));
        }else{
            echo "<script>alert('Cetak Error!'); window.location = '".base_url('index.php/admin/tampil_mapel')."'</script>";
        }
    }

    function cetak_rapor_pdf($nis)
    {
        $mpdf = new \Mpdf\Mpdf();
        $result = $this->user_model->get_raport_siswa($nis);
        $pdf='print';
        $output = "<h1>Laporan Hasil Belajar</h1>";
        foreach($result as $data){
        $output .= "<table border='0' width='100%'>
                    <tr>
                    <td valign='top'>
                    NIS :".$data[0]."<br>
                    Nama:".$data[1]."<br>
                    </td>
                    </tr>
                    </table>";
                    break;}
        $output .= "<table border='1' width='100%' cellpadding='5'>
                   <tr>
                   <th>No.</th>
                   <th>Nama Mata Pelajaran</th>
                   <th>KKM</th>
                   <th>Pengetahuan</th>
                   <td>Praktik</th>
                   <th>Sikap</th>
                   </tr>";
        $no = 1;
        $jum = 0;
        foreach ($result as $data){
            $output .= "<tr>
            <td>$no</td>
            <td>$data[2]</td>
            <td>$data[3]</td>
            <td>$data[4]</td>
            <td>$data[5]</td>
            <td>$data[6]</td>
            </tr>";
        $no++;
        }
        $output .= "</table>";
        $nama = 'Laporan Hasil Belajar - ' .$data[0];
        $mpdf->WriteHTML($output);
        $mpdf->Output($nama.".pdf", 'I');
    }

    function cetak_rapor_excel($nis)
    {
        $data['title']= 'Rapor Siswa '.$nis;
        $data['result'] = $this->user_model->get_raport_siswa($nis);

        $this->load->view('raportsiswaxlsx',$data);
    }
}
?>