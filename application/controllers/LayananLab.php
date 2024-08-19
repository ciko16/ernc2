<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class LayananLab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Layanan_model');
        $this->load->library('pagination');
        $this->load->library('session');
    }

    public function index()
    {
    $config['base_url'] = site_url('LayananLab/index');
    $config['total_rows'] = $this->db->count_all('layanan_lab');
    $config['per_page'] = 5;
    $config['uri_segment'] = 3;
    $choice = $config['total_rows'] / $config['per_page'];
    $config['num_links'] = floor($choice);
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['next_link'] = 'Selanjutnya';
    $config['prev_link'] = 'Sebelumnya';
    $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center pagination-green">';
    $config['full_tag_close'] = '</ul></nav></div>';
    $config['num_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
    $config['num_tag_close'] = '</span></li>';
    $config['cur_tag_open'] = '<li class="page-item active pagination-green"><span class="page-link">';
    $config['cur_tag_close'] = '</span></li>';
    $config['next_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
    $config['next_tagl_close'] = '<span aria-hidden="true">&raquo</span></span></li>';
    $config['prev_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
    $config['prev_tagl_close'] = '</span>&raquo;</li>';
    $config['first_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
    $config['last_tagl_close'] = '</span></li>';

    // Fetch the current page number from the URL and ensure it's valid
    $page = $this->uri->segment($config['uri_segment']);
    if ($page === null) {
        $page = '0';
    } else if (!ctype_digit($page) || (int)$page < 1) {
        $page = '0';
    }

    // Convert the valid page string back to integer
    $page = (int)$page;

    // Initialize pagination with the validated page number
    $this->pagination->initialize($config);

    $data['page'] = $page;
    $data['judul'] = "Halaman Layanan Lab";
    // otentifikasi user dengan email
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    // Menerima input pengurutan dari pengguna
    // $order = $this->input->get('order') ?: 'desc';

    // Menambahkan opsi pengurutan ke base_url
//     if (!empty($order)) {
//     $config['base_url'] .= '?order=' . $order;
// }


    // Memanggil data dari model dengan batas 5 data per halaman dan urutan yang dipilih
    $data['layanan_lab'] = $this->Layanan_model->get($config['per_page'],$page);
    $data['pagination'] = $this->pagination->create_links();
    
    $this->load->view("layout/header", $data);
    $this->load->view("layananlab/vw_layananlab", $data);
    $this->load->view("layout/footer", $data);
}

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Layanan Lab";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['layanan_lab'] = $this->Layanan_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("layananlab/vw_detail_layananlab", $data);
        $this->load->view("layout/footer");
    }
    
    public function tambah()
{
    $data['judul'] = "Halaman Tambah Layanan Lab";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['layanan_lab'] = $this->Layanan_model->get();
    $data['biaya_layanan'] = $this->Layanan_model->get_by_category('Layanan');

    $this->form_validation->set_rules('nama', 'Nama', 'required', [
        'required' => 'Nama Wajib di Isi'
    ]);
    $this->form_validation->set_rules('asal_instansi', 'Asal Instansi', 'required', [
        'required' => 'Asal Instansi Wajib di Isi'
    ]);
    $this->form_validation->set_rules('keperluan', 'Keperluan', 'required', [
        'required' => 'Keperluan Wajib di Isi'
    ]);
    $this->form_validation->set_rules('jumlah_sampel', 'Jumlah Sampel', 'required|integer', [
        'required' => 'Jumlah Sampel Wajib di Isi',
        'integer' => 'Jumlah Sampel harus berupa angka'
    ]);
    $this->form_validation->set_rules('biaya', 'Biaya', 'required', [
        'required' => 'Biaya Wajib di Isi',
        'numeric' => 'Biaya harus berupa angka'
    ]);
    $this->form_validation->set_rules('no_whatsapp', 'Nomor Whatsapp', 'required', [
        'required' => 'Nomor Whatsapp Wajib di Isi'
    ]);
    $this->form_validation->set_rules('status', 'Status', 'required', [
        'required' => 'Status Wajib di Isi'
    ]);
    $this->form_validation->set_rules('target_selesai', 'Target Selesai', 'required', [
        'required' => 'Target Selesai Wajib di Isi'
    ]);

    if ($this->form_validation->run() == false) {
        $this->load->view("layout/header", $data);
        $this->load->view("layananlab/vw_tambah_layananlab", $data);
        $this->load->view("layout/footer");
    } else {
        $nama = $this->input->post('nama');
        $asal_instansi = $this->input->post('asal_instansi');
        $keperluan = $this->input->post('keperluan');
        $jumlah_sampel = $this->input->post('jumlah_sampel');
        $biaya = str_replace(['Rp ', '.'], '', $this->input->post('biaya')); // menghapus format rupiah ketika input data
        $no_whatsapp = $this->input->post('no_whatsapp');
        $status = $this->input->post('status');
        // mendapatkan nama admin yang melakukan konfirmasi
        $konfirmasi = $this->session->userdata('nama');
        $created_date = date('Y-m-d', time());
        $target_selesai = $this->input->post('target_selesai');

        $data = [
            'nama' => $nama,
            'asal_instansi' => $asal_instansi,
            'keperluan' => $keperluan,
            'jumlah_sampel' => $jumlah_sampel,
            'biaya' => $biaya,
            'no_whatsapp' => $no_whatsapp,
            'status' => $status,
            'konfirmasi' => $konfirmasi, // nama admin tersimpan
            'created_date' => $created_date,
            'target_selesai' => $target_selesai
        ];

        $upload_image = $_FILES['lampiran_sampel']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/layanan/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('lampiran_sampel')) {
                $new_image = $this->upload->data('file_name');
                $data['lampiran_sampel'] = $new_image;
            } else {
                echo $this->upload->display_errors();
                return;
            }
        }

        $upload_image = $_FILES['tagihan']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/layanan/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('tagihan')) {
                $new_image = $this->upload->data('file_name');
                $data['tagihan'] = $new_image;
            } else {
                echo $this->upload->display_errors();
                return;
            }
        }

        $this->Layanan_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Layanan Lab Berhasil Ditambah!</div>');
        redirect('LayananLab');
    }
}

    public function hapus($id)
    {
        $this->Layanan_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
        Layanan Lab Berhasil Dihapus!</div>');
        redirect('LayananLab');
    }
    
    public function edit ($id)
    {
        $data['judul'] = "Halaman Edit Layanan Lab";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['layanan_lab'] = $this->Layanan_model->getById($id);
        $data['biaya_layanan'] = $this->Layanan_model->get_by_category('Layanan');
        

        $this->form_validation->set_rules('nama','Nama','required',[
            'required'=> 'Nama Wajib di Isi'
        ]);
        $this->form_validation->set_rules('asal_instansi','Asal Instansi','required',[
            'required' => 'Asal Instansi Wajib di Isi'
        ]);
        $this->form_validation->set_rules('keperluan','Keperluan','required',[
            'required' => 'Keperluan Wajib di Isi'
        ]);
        $this->form_validation->set_rules('jumlah_sampel','Jumlah Sampel','required',[
            'required' => 'Jumlah Sampel Wajib di Isi'
        ]);
        $this->form_validation->set_rules('biaya', 'Biaya', 'required', [
            'required' => 'Biaya Wajib di Isi',
        ]);
        $this->form_validation->set_rules('no_whatsapp','Nomor Whatsapp','required',[
            'required' => 'Nomor Whatsapp Wajib di Isi'
        ]);
        $this->form_validation->set_rules('status','Status','required',[
            'required' => 'Status Wajib di Isi'
        ]);
        $this->form_validation->set_rules('target_selesai', 'Target Selesai', 'required', [
            'required' => 'Target Selesai Wajib di Isi'
        ]);
        if($this->form_validation->run()==false){
            $this->load->view("layout/header",$data);
            $this->load->view("layananlab/vw_ubah_layananlab", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'asal_instansi' => $this->input->post('asal_instansi'),
                'keperluan' => $this->input->post('keperluan'),
                'jumlah_sampel' => $this->input->post('jumlah_sampel'),
                'biaya' => str_replace(['Rp ','.'],'', $this->input->post('biaya')), // menghapus format rupiah ketika edit biaya
                'no_whatsapp' => $this->input->post('no_whatsapp'),
                'status' => $this->input->post('status'),
                'konfirmasi' => $this->session->userdata('nama'),
                'target_selesai' => $this->input->post('target_selesai')
            ];
            $upload_image = $_FILES['lampiran_sampel']['name'];
            if($upload_image){
                $config['allowed_types']='gif|png|jpg|jpeg';
                $config['max_sized']='2048';
                $config['upload_path']='./assets/img/layanan';
                $this->load->library('upload',$config);
                if($this->upload->do_upload('lampiran_sampel')){
                    $old_image = $data['layanan_lab']['lampiran_sampel'];
                    if($old_image != 'default.jpg'){
                        unlink(FCPATH.'./assets/img/layanan'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('lampiran_sampel',$new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $upload_image = $_FILES['tagihan']['name'];
            if($upload_image){
                $config['allowed_types']='gif|png|jpg|jpeg';
                $config['max_sized']='2048';
                $config['upload_path']='./assets/img/layanan';
                $this->load->library('upload',$config);
                if($this->upload->do_upload('tagihan')){
                    $old_image = $data['layanan_lab']['tagihan'];
                    if($old_image != 'default.jpg'){
                        unlink(FCPATH.'./assets/img/layanan'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('tagihan',$new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Layanan_model->update(['id'=>$id], $data, $upload_image);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Layanan Berhasil di Ubah!</div>');
            redirect('LayananLab'); 
        }
    }

    public function cari () {
        $data['judul'] = "Halaman Layanan Lab";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        // Mendapatkan keyword dari input post
        $keyword = $this->input->post('keyword');
    
        // Jika keyword kosong, redirect ke halaman utama
        if(empty($keyword)) {
            redirect('LayananLab');
        }
    
        // Load library pagination dan konfigurasi
        $this->load->library('pagination');
    
        // Konfigurasi pagination
        $config['base_url'] = base_url('LayananLab/cari');
        $config['total_rows'] = $this->Layanan_model->count_keyword($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
    
        // Style pagination (optional)
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
    
        // Initialize pagination
        $this->pagination->initialize($config);
    
        // Mendapatkan hasil pencarian dengan pagination
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['layanan_lab'] = $this->Layanan_model->get_keyword($keyword, $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
    
        // Load views
        $this->load->view("layout/header", $data);
        $this->load->view("layananlab/vw_layananlab", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah_data() {
        $this->load->library('form_validation'); // memanggil library form validation
        $category = 'Layanan';
        $data['biaya_layanan'] = $this->Layanan_model->get_by_category($category);
        // set validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('asal_instansi', 'Asal Instansi', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('jumlah_sampel', 'Jumlah Sampel', 'required|integer');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        $this->form_validation->set_rules('no_whatsapp', 'No Whatsapp', 'required');
        $this->form_validation->set_rules('target_selesai', 'Target Selesai', 'required|date');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/layananlab');
        } else {

            //proses form dan menyimpan data
            $data = [
                'nama' => $this->input->post('nama'),
                'asal_instansi' => $this->input->post('asal_instansi'),
                'keperluan' => $this->input->post('keperluan'),
                'jumlah_sampel' => $this->input->post('jumlah_sampel'),
                'biaya' => str_replace(['Rp ', '.'], '', $this->input->post('biaya')), // menghapus format rupiah ketika input data
                'no_whatsapp' => $this->input->post('no_whatsapp'),
                'status' => 'Menunggu Konfirmasi',
                'created_date' => date('Y-m-d', time()),
                'target_selesai' => $this->input->post('target_selesai'),
                'konfirmasi' => 'Harap Dikonfirmasi'
            ];

             // Handle file upload if there's any
             $upload_image = $_FILES['lampiran_sampel']['name'];
             if ($upload_image) {
             $config['allowed_types'] = 'gif|jpg|png|jpeg';
             $config['max_sizes'] = '2048';
             $config['upload_path'] = './assets/img/layanan/';
             $this->load->library('upload', $config);
            if ($this->upload->do_upload('lampiran_sampel')) {
             $new_image = $this->upload->data('file_name');
             $this->db->set('lampiran_sampel', $new_image);
            } else {
             echo $this->upload->display_errors();
             return;
        }
       }

            // menyimpan data ke database
            $this->Layanan_model->insert_data($data);

            // redirect kembali ke halaman
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan berhasil. Harap menunggu konfirmasi oleh admin.</div>');
            redirect('Home/layananlab');
        }
    }
}
?>