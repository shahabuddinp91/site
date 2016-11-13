<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends CI_Controller {

    public $baseurl;

    public function __construct() {
        parent::__construct();
        $this->baseurl = $this->config->item('base_url');
        $this->load->model('Frontpagemodel');
        $this->load->model('Dashboardmodel');
    }

    public function index() {
        $data['baseurl'] = $this->baseurl;
        //its for logo & slogan call from database
        $this->load->model('Frontpagemodel');
        $data['allsettings'] = $this->Frontpagemodel->getlogoSlogan();
        //its for copyright call from database
        $data['allcopyright'] = $this->Frontpagemodel->getCopyright();
        //its for sliders model
        $data['allslider'] = $this->Frontpagemodel->getSliders();
        //its for testimonials model
        $data['alltestimonial'] = $this->Frontpagemodel->getTestimonials();

        $this->load->view('header', $data);
        $this->load->view('menusection', $data);
        $this->load->view('slider', $data);
        $this->load->view('index', $data);
        $this->load->view('footer', $data);
    }

    public function loginpage() {
        $data['baseurl'] = $this->baseurl;
        $data['errorLogin'] = '';
        //its for logo & slogan call from database
        $data['allsettings'] = $this->Frontpagemodel->getlogoSlogan();
        //its for copyright call from database
        $data['allcopyright'] = $this->Frontpagemodel->getCopyright();
        $this->load->view('header', $data);
        $this->load->view('menusection');
        $this->load->view('loginpage');
        $this->load->view('footer');
    }

    public function loginProcess() {
        $data['baseurl'] = $this->baseurl;
        $data['errorLogin'] = '';
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['errorLogin'] = 'Please Input Username & Password';
            //its for allsettings
            $this->load->model('Frontpagemodel');
            $data['allsettings'] = $this->Frontpagemodel->getlogoSlogan();
            $this->load->view('header', $data);
            $this->load->view('menusection', $data);
            $this->load->view('loginpage', $data);
            $this->load->view('footer', $data);
//            redirect('Frontpage/loginpage',$data);
        } else {
            $result = $this->Frontpagemodel->validate($username, $password);
            //its for allsettings
            $data['allsettings'] = $this->Frontpagemodel->getlogoSlogan();
            if ($result) {
                // Session set
                if ($result['current_user_level'] == 1) {
                    $this->session->set_userdata($result);
                    $this->session->set_flashdata('msg', 'Welcome');
                    //redirect('NewsPosts'); 
                    redirect('Dashboard/index');
                } else {
                    $this->session->set_userdata($result);
                    $this->session->set_flashdata('msg', 'Welcome');
                    //redirect('Dashboard/home');
                    redirect('pore_dibo');
                }
            } else {
                $data['errorLogin'] = 'Username or Password is invalid';
                $this->load->view('header', $data);
                $this->load->view('menusection', $data);
                $this->load->view('loginpage', $data);
                $this->load->view('footer', $data);
//                redirect('Frontpage/loginpage',$data);
            }
        }
    }

    //Logout
    public function logout() {
        $data['baseurl'] = $this->baseurl;
        $this->session->unset_userdata('current_user_name');
        $this->session->unset_userdata('current_user_id');
        $this->session->unset_userdata('user_level');
        $this->session->sess_destroy();
        redirect($this->baseurl);
    }

    public function studentlogin() {
        $data['baseurl'] = $this->baseurl;
        //its for logo & slogan call from database
        $data['allsettings'] = $this->Frontpagemodel->getlogoSlogan();
        //its for copyright call from database
        $data['allcopyright'] = $this->Frontpagemodel->getCopyright();
        $this->load->view('header', $data);
        $this->load->view('menusection');
        $this->load->view('stdloginpage');
        $this->load->view('footer');
    }

    public function stdloginProcess() {
        $data['baseurl'] = $this->baseurl;
        $email = $this->input->post('stdemail');
        $password = $this->input->post('stdpassword');
        $this->form_validation->set_rules('stdemail', 'E-Mail', 'required');
        $this->form_validation->set_rules('stdpassword', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg', 'Please Input Your Email & Password!');
            redirect('Frontpage/studentlogin');
        } else {
            $results = $this->Frontpagemodel->stdValidate($email, $password);
            if ($results) {
                if ($results[0]->email == $email) {
                    $this->session->set_userdata('current_email', $results[0]->email);

                    //print_r($results);
                    redirect('Frontpage/studentsProfile');
                }
            } else {
                $this->session->set_flashdata('msg', 'Email or Password is invalid!');
                redirect('Frontpage/studentlogin');
            }
        }
    }

//    public function studentsProfile() {
//        if ($this->session->userdata('current_email')) {
//            $data['baseurl'] = $this->baseurl;
//            $studentsinfo = $this->Frontpagemodel->studentsinfo($this->session->userdata('current_email'));
//
//            foreach ($studentsinfo as $singleclass) {
//                $classid = $singleclass->class_id;
//                $monday = $singleclass->student_id;
//            }
//            $this->session->set_userdata('class', $classid);
//
//            $data['studentsinfo'] = $studentsinfo;
//
//            $this->load->view('dashboard/header', $data);
//            $this->load->view('dashboard/sidebar', $data);
//            $this->load->view('dashboard/students/studentProfile', $data);
//            $this->load->view('dashboard/footer', $data);
//        } else {
//            redirect('Frontpage/studentlogin');
//        }
//    }
    public function studentsProfile() {
        if ($this->session->userdata('current_email')) {
            $data['baseurl'] = $this->baseurl;
            $studentsinfo = $this->Frontpagemodel->studentsinfo($this->session->userdata('current_email'));

            foreach ($studentsinfo as $singleData) {
                $classid = $singleData->class_id;
                $stdID = $singleData->student_id;
            }
            $this->session->set_userdata('class', $classid);
            $this->session->set_userdata('studentsID', $stdID);


            $data['studentsinfo'] = $studentsinfo;
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/students/studentProfile', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/studentlogin');
        }
    }

    public function stdAcademicInfo() {
        if ($this->session->userdata('current_email')) {
            $data['baseurl'] = $this->baseurl;
            $stdAcademicInfo = $this->Frontpagemodel->studentsinfo($this->session->userdata('current_email'));
            $data['stdAcademicInfo'] = $stdAcademicInfo;
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/students/stdacademicInfo', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/studentlogin');
        }
    }

    public function stdExamwiseResult() {
        if ($this->session->userdata('current_email')) {
            $data['baseurl'] = $this->baseurl;
            $stdAcademicInfo = $this->Frontpagemodel->studentsinfo($this->session->userdata('current_email'));
            $data['stdAcademicInfo'] = $stdAcademicInfo;
            //its for exam list call
            $data['allexamlist'] = $this->Dashboardmodel->getexam();
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/students/stdExamwiseresult', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/studentlogin');
        }
    }

//    public function stdexamwisesubject() {
//        if ($this->session->userdata('current_email')) {
//            $data['baseurl'] = $this->baseurl;
//            $stdAcademicInfo = $this->Frontpagemodel->studentsinfo($this->session->userdata('current_email'));
//            $data['stdAcademicInfo'] = $stdAcademicInfo;
//
//
//            //its for exam list call 
//            $data['allexamlist'] = $this->Dashboardmodel->getexam();
//            $examid = $this->input->post('examlist');
//
//
//
//            $data['allsubject'] = $this->Frontpagemodel->examwiseSubject($examid);
//
//            $this->load->view('dashboard/header', $data);
//            $this->load->view('dashboard/sidebar', $data);
//            $this->load->view('dashboard/students/showexamwiseSubject', $data);
//            $this->load->view('dashboard/footer', $data);
//        } else {
//            redirect('Frontpage/studentlogin');
//        }
//    }
    public function stdexamwisesubject() {
        if ($this->session->userdata('current_email')) {
            $data['baseurl'] = $this->baseurl;
            $stdAcademicInfo = $this->Frontpagemodel->studentsinfo($this->session->userdata('current_email'));
            $data['stdAcademicInfo'] = $stdAcademicInfo;
            //its for exam list call 
            $data['allexamlist'] = $this->Dashboardmodel->getexam();
            $examid = $this->input->post('examlist');

            $getClassID = $this->session->userdata('class');
            $getStdID = $this->session->userdata('studentsID');

            $data['allmarks'] = $this->Frontpagemodel->getMarks($getClassID, $getStdID, $examid);
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/students/showexamwiseSubject', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/studentlogin');
        }
    }

    public function teacherlogin() {
        $data['baseurl'] = $this->baseurl;
        //its for logo & slogan call from database
        $data['allsettings'] = $this->Frontpagemodel->getlogoSlogan();
        //its for copyright call from database
        $data['allcopyright'] = $this->Frontpagemodel->getCopyright();
        $this->load->view('header', $data);
        $this->load->view('menusection');
        $this->load->view('teacherlogin');
        $this->load->view('footer');
    }

    // Check for user login process
    public function teacherLoginProcess() {
        $data['baseurl'] = $this->baseurl;
        $email = $this->input->post('temail');
        $password = $this->input->post('tpassword');
        $this->form_validation->set_rules('temail', 'E-Mail', 'required');
        $this->form_validation->set_rules('tpassword', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg', 'Please Input Your Email & Password!');
            redirect('Frontpage/teacherlogin');
        } else {
            $results = $this->Frontpagemodel->teacherValidate($email, $password);
            if ($results) {
                if ($results[0]->email == $email) {
                    $this->session->set_userdata('current_teacher_email', $results[0]->email);
                    //print_r($results);
                    redirect('Frontpage/teachersProfile');
                }
            } else {
                $this->session->set_flashdata('msg', 'Email or Password is invalid!');
                redirect('Frontpage/teacherlogin');
            }
        }
    }

    public function teachersProfile() {
        if ($this->session->userdata('current_teacher_email')) {
            $data['baseurl'] = $this->baseurl;
            $teachersinfo = $this->Frontpagemodel->teacherInfo($this->session->userdata('current_teacher_email'));
            $data['teachersinfo'] = $teachersinfo;
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/teacher/teacherProfile', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/teacherlogin');
        }
    }

    public function editTeacherPro() {
        if ($this->session->userdata('current_teacher_email')) {
            $data['baseurl'] = $this->baseurl;
            $teachersinfo = $this->Frontpagemodel->teacherInfo($this->session->userdata('current_teacher_email'));
            $data['teachersinfo'] = $teachersinfo;

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/teacher/editteacherProfile', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/teacherlogin');
        }
    }

    public function updateTeacherProfile() {
        $updateDate = date('Y-m-d H:i:s');
        $data['baseurl'] = $this->baseurl;
        $tid = $this->input->post('tid');
        $updataData = array(
            'teacher_name' => $this->input->post('tName'),
            'email' => $this->input->post('tEmail'),
            'mobile' => $this->input->post('tMobile'),
            'address' => $this->input->post('tAddress'),
            'birthday' => $this->input->post('tBirthday'),
            'gender' => $this->input->post('tGender'),
        );
        $this->db->where('teacher_id', $tid);
        $this->db->update('addteacher', $updataData);
        $this->session->set_flashdata('success', 'Data updated successfully!');
        redirect('Frontpage/teachersProfile');
    }

    public function updateTPpic() {
        $data['baseurl'] = $this->baseurl;
        $tid = $this->input->post('tid');
        $config = array(
            'upload_path' => "./uploads/teachers/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'file_name' => "BCA" . date("ymdhms"),
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('tPic')) {
            $data['upload_data'] = $this->upload->data();
            $teacherPic = array(
                'photo' => $data['upload_data']['file_name'],
            );
            $this->db->where('teacher_id', $tid);
            $this->db->update('addteacher', $teacherPic);
            $this->session->set_flashdata('success', 'Profile Picture Updated Successfully!');
            redirect('Frontpage/teachersProfile');
        } else {
            redirect('Frontpage/editTeacherPro');
            $this->session->set_flashdata('msg', 'Please Select Picture!');
        }
    }

    public function changeTPw() {
        $data['baseurl'] = $this->baseurl;
        $tid = $this->input->post('tid');
        $newPass = $this->input->post('newpass');
        $confirmPass = $this->input->post('confirmpass');
        $this->form_validation->set_rules('newpass', 'New Password', 'required');
        $this->form_validation->set_rules('confirmpass', 'Confirm Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('Frontpage/editTeacherPro');
            $this->session->set_flashdata('msg', 'Please, Enter Password!');
        } else {
            if ($newPass !== $confirmPass) {
                redirect('Frontpage/editTeacherPro');
                $this->session->set_flashdata('msg', 'New Password & Confirm Password is not correct!');
            } else {
                $updataData = array(
                    'password' => $this->input->post('confirmpass'));
                $this->db->where('teacher_id', $tid);
                $this->db->update('addteacher', $updataData);
                $this->session->set_flashdata('success', 'Data updated successfully!');
                redirect('Frontpage/teachersProfile');
            }
        }
    }

    public function showSettings() {
        $data['baseurl'] = $this->baseurl;
    }

    public function showSliders() {
        $data['baseurl'] = $this->baseurl;
        $this->load->Model('Frontpagemodel');
        $data['allslider'] = $this->Frontpagemodel->getSliders();
        $this->load->view('header', $data);
        $this->load->view('menusection', $data);
        $this->load->view('slider', $data);
        $this->load->view('index', $data);
        $this->load->view('footer', $data);
    }

    public function stdClsRoutine() {
        $data['baseurl'] = $this->baseurl;
//        its for all day collect
        $data['allDay'] = $this->Frontpagemodel->getManageDay();
//        its for all period time collect
        $data['allPeriodTime'] = $this->Frontpagemodel->getManagePeriodTime();
//        its for all period class & section wise collect
//        $data['allPeriodClsSec'] = $this->Frontpagemodel->getPeriodClsSec($cls, $sec);
        
        $studentsinfo = $this->Frontpagemodel->studentsinfo($this->session->userdata('current_email'));
        foreach ($studentsinfo as $singleData) {
//            echo "<br>"; echo "<br>";
//            echo "<pre>";
//            print_r($singleData);
//            echo "</pre>";
            $data['classid'] = $singleData->class_id;
            $data['sectionID'] = $singleData->section_id;
//                $stdID = $singleData->student_id;
        }

        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/sidebar', $data);
        $this->load->view('dashboard/students/stdClsRoutintPage', $data);
        $this->load->view('dashboard/footer', $data);
    }

}
