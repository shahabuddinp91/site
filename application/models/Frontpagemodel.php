<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpagemodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function validate($username, $password) {
        $attr = array(
            'username' => $username,
            'password' => $password
        );
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('users');
        if ($result->num_rows() > 0) {
            $attr = array(
                'current_user_name' => $username,
                'current_user_id' => $result->row(0)->user_id,
                'current_user_level' => $result->row(0)->user_level,
                'logged_in' => TRUE,
            );
            return $attr;
        } else {
            return FALSE;
        }
    }

    public function is_user_logged_in() {
        return $this->session->userdata('current_user_id') != FALSE;
    }

    public function stdValidate($email, $password) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('addstudent');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function studentsinfo($stdemail) {
        $this->db->select('*');
        $this->db->from('addstudent');
        $this->db->join('addclass', 'addclass.class_id=addstudent.class_id');
        $this->db->join('addsection', 'addsection.section_id=addstudent.section_id');
        $this->db->where('addstudent.email', $stdemail);
        $query = $this->db->get();
        return $query->result();
    }

//    public function examwiseSubject($examid){
//        $this->db->select('*');
//        $this->db->from('managemarks');
//        $this->db->join('addsubject','addsubject.subject_id=managemarks.subject_id');
//        $this->db->where('managemarks.exam_id',$examid);
//        $query = $this->db->get();
//        return $query->result();
//    }
    public function getMarks($getClassID, $getStdID, $examid) {
        $this->db->select('*');
        $this->db->from('managemarks');
        $this->db->join('addsubject', 'addsubject.subject_id=managemarks.subject_id');
        $this->db->where('managemarks.class_id', $getClassID);
        $this->db->where('managemarks.student_id', $getStdID);
        $this->db->where('managemarks.exam_id', $examid);
        $query = $this->db->get();
        return $query->result();
    }

//    public function getMarks($getClassID, $getStdID, $examid){
//        $this->db->select('*');
//        $query = $this->db->get_where('managemarks', array('class_id' => $getClassID, 'student_id'=> $getStdID, 'exam_id'=> $examid));
//        return $query->result();
//    }

    public function teacherValidate($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('addteacher');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function teacherInfo($teacheremail) {
        $this->db->select('*');
        $this->db->from('addteacher');
        $this->db->where('email', $teacheremail);
        $query = $this->db->get();
        return $query->result();
    }

    public function getlogoSlogan() {
        $query = $this->db->get_where('settings', array('enable' => 1));
        return $query->result();
    }

    public function getCopyright() {
        $query = $this->db->limit(1)->order_by('id', 'desc')->get('copyright');
        return $query->result();
    }

    public function getSliders() {
        $query = $this->db->get('sliders');
        return $query->result();
    }

    public function getTestimonials() {
        $query = $this->db->limit(1)->order_by('testimonial_id', 'desc')->get('testimonial');
        return $query->result();
    }

    public function getManageDay() {
        $query = $this->db->get('manageday');
        return $query->result();
    }

    public function getManagePeriodTime() {
        $query = $this->db->get('managetime');
        return $query->result();
    }

    public function getPeriodClsSec($cls, $sec) {
        $this->db->select('*');
        $this->db->where('addroutine.class_id', $cls);
        $this->db->where('addroutine.section_id', $sec);
        $this->db->where('day', 1);
        $this->db->from('addroutine');
        $this->db->join('addsubject', 'addsubject.subject_id=addroutine.subject_id');
        $query = $this->db->get();
        return $query->result();
    }

}
