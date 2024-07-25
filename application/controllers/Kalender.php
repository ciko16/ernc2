<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Kalender extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kalender_model');
    }

    public function index($year = null, $month = null)
    {
        $data['kalender'] = $this->Kalender_model->getcalendar($year, $month);
        // $this->load->view('layout/header');
        $this->load->view('jadwalkalender/kalender', $data);
        // $this->load->view('layout/footer');
    }
}
?>