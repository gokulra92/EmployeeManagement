<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        $this->load->library('../controllers/Common');
        $this->load->model("Employee_model");
    }
    public function index() {
        $this->load->view('404');
    }

}
