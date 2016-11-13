<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getlogoslogan() {
//        $query = $this->db->order_by('id','desc')->get('settings');
//        return $query->result();
        $query = $this->db->get('settings');
        return $query->result();
    }

    public function getSlider($limit, $start) {
        $this->db->select('*');
        $this->db->from('sliders');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function getTestimonials($limit, $start) {
        $this->db->select('*');
        $this->db->from('testimonial');
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('testimonial_id', 'desc')->get();
        return $query->result();
    }

    public function getTeacherlist($limit, $start) {
        $this->db->select('*');
        $this->db->from('addteacher');
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('teacher_id', 'desc')->get();
        return $query->result();
    }
    public function getSearchTeacherlist($limit, $start,$match) {
          $this->db->select('*');
        $this->db->from('addteacher');
        $this->db->like('addteacher.teacher_name', $match, 'after');
        $this->db->or_like('addteacher.mobile', $match, 'after');
        $this->db->or_like('addteacher.email',$match,'after');
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('teacher_id', 'desc')->get();
        return $query->result();
    }

    public function getTeacher() {
        $query = $this->db->get('addteacher');
        return $result = $query->result();
    }

    public function getTeacherid($tid) {
        if ($tid != FALSE) {
            $this->db->select('*');
            $this->db->from('addteacher');
            $this->db->where('teacher_id', $tid);
            $query = $this->db->get();
            return $query->row_array();
        }
    }

    public function getClasslist($limit, $start) {
        $this->db->select('*');
        $this->db->from('addclass');
        $this->db->limit($limit, $start);
        $this->db->order_by('class_id', 'asec');
        $query = $this->db->get();
        return $query->result();
    }

    public function searchClass($classname) {
        $this->db->select('*');
        $this->db->from('addclass');
        $this->db->like('class_name', $classname);
        $this->db->or_like('numeric_no', $classname);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function getclass() {
        //$this->db->select('class_id');
        //$this->db->select('class_name');
        //$this->db->from('addclass');
        $query = $this->db->get('addclass');
        return $result = $query->result();
        //array to store user class id & class name
        /* $classid = array('Select one');
          $classname = array('Select one');
          for ($i = 0; $i < count($result); $i++) {
          array_push($classid, $result[$i]->class_id);
          array_push($classname, $result[$i]->class_name);
          }
          return $class_result = array_combine($classid, $classname);
         * 
         */
    }

    public function getsectionlist($limit, $start) {
        $this->db->select('*');
        $this->db->from('addsection');
        $this->db->join('addclass', 'addclass.class_id=addsection.class_id');
        $this->db->join('addteacher', 'addteacher.teacher_id=addsection.teacher_id');
        $this->db->limit($limit, $start);
        $this->db->order_by('section_id', 'asce');
        $query = $this->db->get();
        return $query->result();
    }

    public function saveSection($allsection) {
        $this->db->insert('labour_information', $all_labInfo);
            $this->session->set_flashdata('msg', 'Data saved successfully!');
    }

    public function check_section_exist($section) {
        $this->db->where('section_name', $section);
        $this->db->from('addsection');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
            return FALSE;
        }
    }

    public function getsectionid($classid) {
        $this->db->where('class_id', $classid);
        $query = $this->db->get('addsection');
        return $query->result();
    }

    public function getsubject($classid) {
        $this->db->where('class_id', $classid);
        $query = $this->db->get('addsubject');
        return $query->result();
    }
    public function getallStd(){
       $query = $this->db->get('addstudent');
        return $result = $query->result();
    }
    public function getStdID($sectionID){
        $this->db->where('section_id',$sectionID);
        $query = $this->db->get('addstudent');
        return $query->result();
    }

    public function getStudentslist($limit, $start) {
        $this->db->select('*');
        $this->db->from('addstudent');
        $this->db->join('addclass', 'addclass.class_id=addstudent.class_id');
        $this->db->join('addsection', 'addsection.section_id=addstudent.section_id');
        $this->db->limit($limit, $start);
        $this->db->order_by('student_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function searchstudents($search) {
        $this->db->select('*');
        $this->db->from('addstudent');
        $this->db->join('addclass', 'addclass.class_id=addstudent.class_id');
        $this->db->join('addsection', 'addsection.section_id=addstudent.section_id');
        $this->db->like('student_name', $search);
        $this->db->or_like('class_name', $search);
        $this->db->or_like('phone', $search);
        $this->db->or_like('email', $search);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function getSubjectslist($limit, $start) {
        $this->db->select('*');
        $this->db->from('addsubject');
        $this->db->join('addclass', 'addclass.class_id=addsubject.class_id');
        $this->db->join('addteacher', 'addteacher.teacher_id=addsubject.teacher_id');
        $this->db->limit($limit, $start);
        $this->db->order_by('subject_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function searchsubjects($search) {
        $this->db->select('*');
        $this->db->from('addsubject');
        $this->db->join('addclass', 'addclass.class_id=addsubject.class_id');
        $this->db->join('addteacher', 'addteacher.teacher_id=addsubject.teacher_id');
        $this->db->like('subject_name', $search);
        $this->db->or_like('class_name', $search);
        $this->db->or_like('teacher_name', $search);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function getExamlist($limit, $start) {
        $this->db->select('*');
        $this->db->from('examlist');
        $this->db->limit($limit, $start);
        $this->db->order_by('exam_id', 'asce');
        $query = $this->db->get();
        return $query->result();
    }

    public function searchexam($search) {
        $this->db->select('*');
        $this->db->from('examlist');
        $this->db->like('exam_name', $search);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function getGradelist($limit, $start) {
        $this->db->select('*');
        $this->db->from('gradelist');
        $this->db->limit($limit, $start);
        $this->db->order_by('grade_id', 'asce');
        $query = $this->db->get();
        return $query->result();
    }

    public function searchgrade($search) {
        $this->db->select('*');
        $this->db->from('gradelist');
        $this->db->like('grade_name', $search);
        $this->db->or_like('grade_point', $search);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function getexam() {
        //$this->db->select('exam_id');
        //$this->db->select('exam_name');
        //$this->db->from('examlist');
        $query = $this->db->get('examlist');
        return $result = $query->result();
        //array to store user class id & class name
        /* $examid = array('Select one');
          $examname = array('Select one');
          for ($i = 0; $i < count($result); $i++) {
          array_push($examid, $result[$i]->exam_id);
          array_push($examname, $result[$i]->exam_name);
          }
          return $class_result = array_combine($examid, $examname);
         * 
         */
    }

    public function getsubjectid($classid) {
        $this->db->where('class_id', $classid);
        $query = $this->db->get('addsubject');
        return $query->result();
    }

    public function getclssecsub($clsid, $secid, $subid) {
        $this->db->select('*');
        $this->db->from('addstudent');
        $this->db->join('addsubject', 'addsubject.class_id=addstudent.class_id');
//        $this->db->join('examlist','');
        $this->db->where('addstudent.class_id', $clsid);
        $this->db->where('addstudent.section_id', $secid);
        $this->db->where('addsubject.subject_id', $subid);
        $query = $this->db->get();
        return $query->result();
    }

//    public function getclssecStdSub($clsid, $secid) {
//        $this->db->select('*');
//        $this->db->from('addstudent');
////        $this->db->join('addclass','addclass.class_id=addstudent.class_id');
////        $this->db->join('addsubject','addsubject.class_id=addstudent.class_id');
//        $this->db->where('class_id', $clsid);
//        $this->db->where('section_id', $secid);
////        $this->db->where('subject_id',$clsid);
//        $query = $this->db->get();
//        return $query->result();
//    }
//    public function getsubject(){
//        $this->db->select('*');
//        $this->db->from('addsubject');
////        $this->db->join('addclass','addclass.class_id=addsubject.class_id');
//        $this->db->where('class_id',24);
//        $query = $this->db->get();
//        return $query->result();
//    }
    public function getclasswisesubmarks($clsid) {
        $this->db->select('*');
        $this->db->from('managemarks');
        $this->db->join('addsubject', 'addsubject.subject_id=managemarks.subject_id');
        $this->db->join('addclass', 'addclass.class_id=managemarks.class_id');
        $this->db->where('managemarks.class_id', $clsid);
        $query = $this->db->get();
        return $query->result();
    }

    public function getManagemarksList($limit, $start) {
        $this->db->select('*');
        $this->db->from('managemarks');
        $this->db->join('addstudent', 'addstudent.student_id=managemarks.student_id');
        $this->db->join('addclass', 'addclass.class_id=managemarks.class_id');
        $this->db->join('addsection', 'addsection.section_id=managemarks.section_id');
        $this->db->join('addsubject', 'addsubject.subject_id=managemarks.subject_id');
        $this->db->join('examlist', 'examlist.exam_id=managemarks.exam_id');
        $this->db->limit($limit, $start);
        $this->db->order_by('marks_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function searchMngMrkStd($search) {
        $this->db->select('*');
        $this->db->from('managemarks');
        $this->db->join('addstudent', 'addstudent.student_id=managemarks.student_id');
        $this->db->join('addclass', 'addclass.class_id=managemarks.class_id');
        $this->db->join('addsection', 'addsection.section_id=managemarks.section_id');
        $this->db->join('addsubject', 'addsubject.subject_id=managemarks.subject_id');
        $this->db->join('examlist', 'examlist.exam_id=managemarks.exam_id');
        $this->db->like('addstudent.student_name', $search);
        $this->db->or_like('managemarks.roll_no', $search);
        $this->db->or_like('addclass.class_name', $search);
        $this->db->or_like('addsection.section_name', $search);
        $this->db->or_like('addsubject.subject_name', $search);
        $this->db->or_like('examlist.exam_name', $search);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function getManageDay($limit, $start) {
        $this->db->select('*');
        $this->db->from('manageday');
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('day_id', 'asce')->get();
        return $query->result();
    }

    public function checkManageDay($dayname) {
        $this->db->where('dayName', $dayname);
        $this->db->from('manageday');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
            return FALSE;
        }
    }

    public function saveManageDay($allDays) {
        $this->db->insert('manageday', $allDays);
        $this->session->set_flashdata('success', 'Data save successfully!');
    }

    public function saveTimePeriod($passTime) {
        $this->db->insert('manageTime', $passTime);
        $this->session->set_flashdata('success', 'Data save successfully!');
    }

    public function getManageTime($limit, $start) {
        $this->db->select('*');
        $this->db->from('manageTime');
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('time_id', 'asce')->get();
        return $query->result();
    }

    public function checkManageTime($time) {
        $this->db->where('time', $time);
        $this->db->from('manageTime');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function savevanu($passVanu) {
        $this->db->insert('manageVanu', $passVanu);
        $this->session->set_flashdata('success', 'Data save successfully!');
    }

    public function getManageVanu($limit, $start) {
        $this->db->select('*');
        $this->db->from('manageVanu');
        $this->db->join('managecampus', 'managecampus.campus_id=manageVanu.campus_id');
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('vanu_id', 'asce')->get();
        return $query->result();
    }

    public function getallDay() {
        $query = $this->db->get('manageday');
        return $query->result();
    }

    public function getTeachersid($subid) {
        $this->db->select('*');
        $this->db->from('addsubject');
        $this->db->join('addteacher', 'addteacher.teacher_id=addsubject.teacher_id');
        $this->db->where('addsubject.subject_id', $subid);
        $query = $this->db->get();
        return $query->result();
    }

    public function getTimeFrom() {
        $this->db->select('*');
        $this->db->from('managetime');
        $query = $this->db->get();
        return $query->result();
    }

    public function saveCampus($passCampus) {
        $this->db->insert('manageCampus', $passCampus);
        $this->session->set_flashdata('success', 'Data save successfully!');
    }

    public function check_campus($campus) {
        $this->db->where('campusName', $campus);
        $this->db->from('manageCampus');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function getCampus() {
        $this->db->select('*');
        $this->db->from('managecampus');
        $query = $this->db->get();
        return $query->result();
    }

    public function getRoomid($roomid) {
//        $this->db->where('campus_id',$roomid);
//        $this->db->select('*');
//        $this->db->from('managevanu');
//        $this->db->join('managecampus', 'managecampus.campus_id=managevanu.campus_id');
//        $query = $this->db->get();
//        return $query->result();
        $this->db->where('campus_id',$roomid);
        $query = $this->db->get('managevanu');
        return $query->result();
    }
    public function saveRoutine($passData){
        $this->db->insert('addroutine', $passData);
        $this->session->set_flashdata('success', 'Data save successfully!');
    }
    public function getRoutine($limit,$start){
        $this->db->select('*');
        $this->db->from('addroutine');
        $this->db->join('addclass', 'addclass.class_id=addroutine.class_id');
        $this->db->join('addsection', 'addsection.section_id=addroutine.section_id');
        $this->db->join('addsubject', 'addsubject.subject_id=addroutine.subject_id');
        $this->db->join('addteacher', 'addteacher.teacher_id=addroutine.teacher_id');
        $this->db->join('manageday', 'manageday.day_id=addroutine.day');
        $this->db->join('managecampus', 'managecampus.campus_id=addroutine.campus_name');
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('routine_id', 'desc')->get();
        return $query->result();
    }
    public function check_addFees($fees){
        $this->db->where('fees_name',$fees);
        $this->db->from('addfees');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        } else {
            return $query->result();
            return FALSE;
        }
    }
    public function saveFees($feesAdd) {
        $this->db->insert('addfees', $feesAdd);
        $this->session->set_flashdata('success', 'Data save successfully!');
    }
public function feesList($limit,$start){
    $this->db->select('*');
    $this->db->from('addfees');
    $this->db->limit($limit,$start);
    $this->db->order_by('fees_id','desc');
    $query = $this->db->get();
    return $query->result();
}
public function getFees(){
    $query = $this->db->get('addfees');
    return $query->result();
}
public function getAmount($feesID){
    $this->db->where('fees_id',$feesID);
    $query = $this->db->get('addfees');
    return $query->result();
}
    
}