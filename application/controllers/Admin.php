<?php

class Admin extends CI_Controller
{
    function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('Admin_model');
    }

    function tampil_siswa()
    {
        $config = array();
		$config['base_url'] = base_url()."index.php/admin/tampil_siswa/";
		$config['total_rows'] = $this->Admin_model->record_count_siswa();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['results'] = $this->Admin_model->fetch_sis($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		$data['page'] = $page;
        $this->load->view('admin_view/listsiswa',$data);
    }

    function submit_siswa()
    {
        $this->Admin_model->add_siswa($this->input->post('var'));
        echo "<script> window.location = '".base_url('index.php/admin/tampil_siswa')."'</script>";
    }

    function ubah_siswa()
    {
        $this->Admin_model->update_siswa($this->input->post('var'),$this->input->post('olduserid'));
        echo "<script> window.location = '".base_url('index.php/admin/tampil_siswa')."'</script>";
    }

    function hapus_siswa()
    {
        $this->Admin_model->delete_siswa($this->uri->rsegment(3));
        echo "<script> window.location = '".base_url('index.php/admin/tampil_siswa')."'</script>";
    }

    function cetak_siswa()
    {
        $pilih = $this->input->post('pilih');
        if($pilih == 'pdf'){
            $this->cetak_siswa_pdf();
        }else if($pilih == 'excel'){
            $this->cetak_siswa_excel();
        }else{
            echo "<script>alert('Cetak Error!'); window.location = '".base_url('index.php/admin/tampil_siswa')."'</script>";
        }
    }

    function cetak_siswa_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $result = $this->Admin_model->get_siswa();
        $output = "<h1>Data Siswa SMAS Cenderawasih 2 </h1>";
        $output .= "<table border='1' width='100%' cellpadding='5'>
                   <tr>
                        <th>No.</th>
                        <th>User ID</th>
                        <th>Nomor Induk Siswa</th>
                        <th>Nama Peserta Didik</th>
                        <th>NISN</th>
                    </tr>";
        $no = 1;
        foreach ($result as $data){
        $output .= "<tr>
                        <td>$no</td>
                        <td>$data[0]</td>
                        <td>$data[1]</td>
                        <td>$data[2]</td>
                        <td>$data[3]</td>
                    </tr>";
        $no++;
        }
        $output .= "</table>";
        $nama = 'Data Siswa SMAS Cenderawasih 2';
        $mpdf->WriteHTML($output);
        $mpdf->Output($nama.".pdf", 'I');
    }

    function cetak_siswa_excel()
    {
        $data['title']= 'Data Siswa SMAS Cenderawasih 2';
        $data['result'] = $this->Admin_model->get_siswa();

        $this->load->view('siswaxlsx',$data);
    }

    function tampil_mapel()
    {
        $config = array();
		$config['base_url'] = base_url()."index.php/admin/tampil_mapel/";
		$config['total_rows'] = $this->Admin_model->record_count_mp();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['results'] = $this->Admin_model->fetch_mp($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		$data['page'] = $page;
        $this->load->view('admin_view/listmatapelajaran',$data);
    }


    function submit_mapel()
    {
        $this->Admin_model->add_mapel($this->input->post('var'));
        echo "<script> window.location = '".base_url('index.php/admin/tampil_mapel')."'</script>";
    }

    function ubah_mapel()
    {
        $this->Admin_model->update_mapel($this->input->post('var'),$this->input->post('kode_mp'));
        echo "<script> window.location = '".base_url('index.php/admin/tampil_mapel')."'</script>";
    }

    function hapus_mapel()
    {
        $this->Admin_model->delete_mapel($this->uri->rsegment(3));
        echo "<script> window.location = '".base_url('index.php/admin/tampil_mapel')."'</script>";
    }
    function cetak_mapel()
    {
        $pilih = $this->input->post('pilih');
        if($pilih == 'pdf'){
            $this->cetak_mapel_pdf();
        }else if($pilih == 'excel'){
            $this->cetak_mapel_excel();
        }else{
            echo "<script>alert('Cetak Error!'); window.location = '".base_url('index.php/admin/tampil_mapel')."'</script>";
        }
    }

    function cetak_mapel_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $result = $this->Admin_model->get_mapel();
        $output = "<h1>Data Mata Pelajaran SMAS CENDERAWASIH 2</h1>";
        $output .= "<table border='1' width='100%' cellpadding='5'>
                   <tr>
                        <th>No.</th>
                        <th>Kode Mata Pelajaran</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>KKM</th>
                    </tr>";
        $no = 1;
        foreach ($result as $data){
        $output .= "<tr>
                        <td>$no</td>
                        <td>$data[0]</td>
                        <td>$data[1]</td>
                        <td>$data[2]</td>
                    </tr>";
        $no++;
        }
        $output .= "</table>";
        $nama = 'Data Mata Pelajaran SMAS CENDERAWASIH 2';
        $mpdf->WriteHTML($output);
        $mpdf->Output($nama.".pdf", 'I');
    }

    
    function cetak_mapel_excel()
    {
        $data['title']= 'Data Mapel';
        $data['result'] = $this->Admin_model->get_mapel();

        $this->load->view('mapelxlsx',$data);
    }

    function pilih_raport()
    {
        $data['siswa'] = $this->Admin_model->tampil_siswa();
        $data['mapel'] = $this->Admin_model->tampil_mapel();

        $this->load->view('admin_view/raportview',$data);
    }

    function tampil_raport_siswa()
    {
        $nis = $this->input->post('pilih');
        $config = array();
		$config['base_url'] = base_url()."index.php/admin/tampil_raport_siswa/";
		$config['total_rows'] = $this->Admin_model->record_count_raport_siswa($nis);
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['results'] = $this->Admin_model->fetch_rapor_siswa($config['per_page'], $page, $nis);
		$data['links'] = $this->pagination->create_links();
		$data['page'] = $page;
        $this->load->view('admin_view/raportsiswa',$data);
    }

    function submit_nilai()
    {
        $this->Admin_model->add_rapor($this->input->post('var'));
        echo "<script> window.location = '".base_url('index.php/admin/pilih_raport')."'</script>";
    }

    function hapus_nilai()
    {
        $this->Admin_model->delete_nilai($this->uri->rsegment(3),$this->uri->rsegment(4));
        echo "<script> window.location = '".base_url('index.php/admin/pilih_raport')."'</script>";
    }

    function cetak_nilai_siswa()
    {
        $pilih = $this->input->post('pilih');
        if($pilih == 'pdf'){
            $this->cetak_nilai_siswa_pdf($this->input->post('nis'));
        }else if($pilih == 'excel'){
            $this->cetak_nilai_siswa_excel($this->input->post('nis'));
        }else{
            echo "<script>alert('Cetak Error!'); window.location = '".base_url('index.php/admin/tampil_mapel')."'</script>";
        }
    }

    function cetak_nilai_siswa_excel($nis)
    {
        $data['title']= 'Laporan Hasil Belajar - '.$nis;
        $data['result'] = $this->Admin_model->get_nilai_siswa($nis);

        $this->load->view('raportsiswaxlsx',$data);
    }

    function cetak_nilai_siswa_pdf($nis)
    {
        $mpdf = new \Mpdf\Mpdf();
        $result = $this->Admin_model->get_nilai_siswa($nis);
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
                   <th>Nama Mapel</th>
                   <th>Kkm</th>
                   <th>Pengetahuan</th>
                   <th>Praktik</th>
                   <th>Sikap</th>

                   </tr>";
        $no = 1;
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
}
?>