<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // Cek apakah sesi sudah habis
        if (!$this->session->userdata('logged_in')) {
            // Redirect ke halaman login
            redirect('auth/login');
        }
    }
}
?>