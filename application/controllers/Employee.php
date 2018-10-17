<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Employee_model");
        $this->load->helper('url');
    }

    public function index() {
        $data['employees'] = $this->Employee_model->listData('employeedetails');
        $this->load->view('employeeList', $data);
    }

    public function addEmployee() {
        $name = $this->db->escape_str($this->input->post('name'));
        $mail = $this->db->escape_str($this->input->post('mail'));
        $password = $this->db->escape_str($this->input->post('password'));
        $rpassword = $this->db->escape_str($this->input->post('rpassword'));
        $dob = $this->db->escape_str($this->input->post('dob'));
        $gender = $this->db->escape_str($this->input->post('gender'));
        $empId = !empty($this->input->post('empId')) ? $this->db->escape_str($this->input->post('empId')) : "";
        $profileImage = isset($_FILES['profileImage']) ? $_FILES['profileImage'] : "";
        $data = [];
        if (!empty($name) && !empty($mail) && !empty($dob)) {
            $data = array(
                'empName' => $name,
                'empEmail' => $mail,
                'empPswd' => md5($password),
                'empDob' => $dob,
                'empGender' => $gender
            );
            if ($profileImage) {
                $data['empImgPath'] = self::uploadImage($profileImage, 'uploads/employee/');
            }
            if ($empId) {
                $result = $this->Employee_model->updateData('employeedetails', $data, array('empId' => $empId));
            } else {
                if ($password == $rpassword) {
                    $result = $this->Employee_model->insertData('employeedetails', $data);
                }
            }
            if ($result) {
                redirect('Employee', 'refresh');
            }
        }
        $this->load->view('addEmployee');
    }
    
    public function getEmployee() {
        $empId = $this->db->escape_str($this->input->post('id'));
        $where = array('empId' => $empId);
        $list = $this->Employee_model->listData('employeedetails', $where);
        echo json_encode($list[0]);
    }

    public function deleteEmployee() {
        $empId = $this->db->escape_str($this->input->post('id'));
        $where = array('empId' => $empId);
        $delete = $this->Employee_model->deleteData('employeedetails', $where);
        if ($delete) {
            echo'success';
            exit;
        }
        echo'failed';
    }

    public function uploadImage($fileData, $path) {
        if ($fileData['size'] > 0) {
            if (!is_dir($path)) {
                mkdir($path);
            }
            $target_file = $path . "" . basename($fileData["name"]);
            $isValid = 0;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $supportedFormats = array('jpg', 'png', 'gif', 'jpeg');
            if (getimagesize($fileData["tmp_name"]) !== false && in_array($fileType, $supportedFormats)) {
                $isValid = 1;
            }
            $customName = strtotime("now") . "" . mt_rand(1000, 99999) . "." . $fileType;
            $customFilePath = $path . "" . $customName;
            if ($isValid && move_uploaded_file($fileData["tmp_name"], $customFilePath)) {
                return $customFilePath;
            }
            return '';
        }
    }

}
