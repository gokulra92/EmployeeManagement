<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PageNotFound extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        $this->load->library('../controllers/Common');
    }
    public function index() {
        $this->load->view('404');
    }

}
