<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public $baseurl;
    var $marksData = array();

    public function __construct() {
        parent::__construct();
        $this->baseurl = $this->config->item('base_url');
        $this->load->helper("url");
        $this->load->model('Dashboardmodel');
    }

    public function index() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/dashboardpage', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addSlider() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//pagination settings 
            $config['base_url'] = $this->baseurl . ('index.php/Dashboard/addSlider/');
            $config['total_rows'] = $this->db->count_all('sliders');
            $config['per_page'] = "3";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allslider'] = $this->Dashboardmodel->getSlider($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/slider/addSlider', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function sliderProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('Y-m-d H:i:s');
            $config = array(
                'upload_path' => "./uploads/sliders/",
                'allowed_types' => 'gif|jpg|png|jpeg',
                'overwrite' => TRUE,
                'file_name' => "BCA" . date("ymdhms"),
                'max_size' => "2048000",
                'max_height' => "768",
                'max_width' => "1024"
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->form_validation->set_rules('title', 'Slider Title', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/slider/addSlider', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                if ($this->upload->do_upload('logofile')) {
                    $data['upload_data'] = $this->upload->data();
                    $allslidersdata = array(
                        'shortname' => $this->input->post('name'),
                        'title' => $this->input->post('title'),
                        'slider' => $data['upload_data']['file_name'],
                        'created' => $created
                    );
                    $this->db->insert('sliders', $allslidersdata);
                    $this->session->set_flashdata('msg', 'Your Sliders Save Successfully!');
                    redirect('Dashboard/addSlider');
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('dashboard/dashboardpage', $data);
                }
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function sliderDelete($sliderid) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            if ($sliderid != '') {
                $this->db->delete('sliders', array('slider_id' => $sliderid));
                $this->session->set_flashdata('msg', 'Data Deleted Successfully!');
                redirect('Dashboard/addSlider');
            }
            redirect('Dashboard/addSlider');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addLogo() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/settings/addLogo', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function logoSloganProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('Y-m-d H:i:s');
            $config = array(
                'upload_path' => "./uploads/logo/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'file_name' => "BCA" . date("ymdhms"),
                'max_size' => "2048000",
                'max_height' => "768",
                'max_width' => "1024"
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->form_validation->set_rules('name', 'University Name', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/settings/addLogo', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                if ($this->upload->do_upload('logofile')) {
                    $data['upload_data'] = $this->upload->data();
                    $allsettingsdata = array(
                        'versityname' => $this->input->post('name'),
                        'title' => $this->input->post('title'),
                        'logo' => $data['upload_data']['file_name'],
                        'created' => $created
                    );
                    $this->db->insert('settings', $allsettingsdata);
                    $this->session->set_flashdata('msg', 'Your Settings Save Successfully!');
                    redirect('Dashboard/logoSloganlist');
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('dashboard/dashboardpage', $data);
                }
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function logoSloganlist() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $this->load->model('Dashboardmodel');
            $data['alllogoslogan'] = $this->Dashboardmodel->getlogoslogan();
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/settings/logoSloganlist', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function enablelogoSlogan($id) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $enablearray = array(
                'enable' => 1,
            );
            $this->db->where('id', $id);
            $this->db->update('settings', $enablearray);
            redirect('Dashboard/logoSloganlist');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function disablelogoSlogan($id) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $disablearray = array(
                'enable' => 0,
            );
            $this->db->where('id', $id);
            $this->db->update('settings', $disablearray);
            redirect('Dashboard/logoSloganlist');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function editLogoSlogan() {
        
    }

    public function deleteLogoSlogan($logosloganid) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            if ($logosloganid != '') {
                $this->db->delete('settings', array('id' => $logosloganid));
                $this->session->set_flashdata('msg', 'Data Deleted Successfully!');
                redirect('Dashboard/logoSloganlist');
            }
            redirect('Dashboard/logoSloganlist');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addcopyright() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/settings/copyright', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function copyrightProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('Y-m-d H:i:s');
            $this->form_validation->set_rules('cpname', 'Copyright Name', 'trim|required');
            $this->form_validation->set_rules('orgname', 'Organization Name', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('msg', 'Please input Correctly');
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/settings/copyright', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                $alldata = array(
                    'copyright' => $this->input->post('cpname'),
                    'orgname' => $this->input->post('orgname'),
                    'created' => $created,
                );
                $this->db->insert('copyright', $alldata);
                $this->session->set_flashdata('msg', 'Data Saved Successfully!');
                redirect('Dashboard/addcopyright');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addTeacher() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//pagination settings
            $config['base_url'] = base_url('index.php/Dashboard/addTeacher/');
            $config['total_rows'] = $this->db->count_all('addteacher');
            $config['per_page'] = "4";
            $config["uri_segment"] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

//call the model function to get the department data
            $data['allteacher'] = $this->Dashboardmodel->getTeacherlist($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();
            
        $data['teacherCount'] = $this->db->count_all('addteacher');

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/teacher/addteacher', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function teacheraddProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('Y-m-d H:i:s');
            $config = array(
                'upload_path' => "./uploads/teachers/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'file_name' => "BCA" . date("ymdhms"),
                'max_size' => "2048000",
                'max_height' => "768",
                'max_width' => "1024"
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->form_validation->set_rules('name', 'Teacher Name', 'required|trim');
            $this->form_validation->set_rules('mobile', 'Mobile No', 'required|trim');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_rules('address', 'Address', 'required|trim');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please Insert Correctly!');
                redirect('Dashboard/addTeacher');
            } else {
                if ($this->upload->do_upload('photo')) {
                    $data['upload_data'] = $this->upload->data();
                    $allteacherdata = array(
                        'teacher_name' => $this->input->post('name'),
                        'mobile' => $this->input->post('mobile'),
                        'birthday' => $this->input->post('dob'),
                        'gender' => $this->input->post('gender'),
                        'email' => $this->input->post('email'),
                        'password' => $this->input->post('password'),
                        'address' => $this->input->post('address'),
                        'photo' => $data['upload_data']['file_name'],
                    );
                    $this->db->insert('addteacher', $allteacherdata);
                    $this->session->set_flashdata('success', 'Teacher Add Successfully!');
                    redirect('Dashboard/addTeacher');
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('dashboard/dashboardpage', $data);
                }
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function teacherEdit($teacherEditid) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $editTeacherinfo = $this->Dashboardmodel->getTeacherid($teacherEditid);
            $data['teacherid'] = $editTeacherinfo['teacher_id'];
            $data['tName'] = $editTeacherinfo['teacher_name'];
            $data['mobile'] = $editTeacherinfo['mobile'];
            $data['birthday'] = $editTeacherinfo['birthday'];
            $data['gender'] = $editTeacherinfo['gender'];
            $data['address'] = $editTeacherinfo['address'];
            $data['photo'] = $editTeacherinfo['photo'];

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/teacher/editTeacher', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function teacherUpdate() {
        if ($this->session->userdata('current_user_id')) {
            $updateddate = date('Y-m-d H:i:s');
            $data['baseurl'] = $this->baseurl;
            $id = $this->input->post('te_id');
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
            if ($this->upload->do_upload('teacherphoto')) {
                $data['upload_data'] = $this->upload->data();
                $allteacherdata = array(
                    'teacher_name' => $this->input->post('name'),
                    'mobile' => $this->input->post('mobile'),
                    'birthday' => $this->input->post('dob'),
                    'gender' => $this->input->post('gender'),
                    'address' => $this->input->post('address'),
                    'photo' => $data['upload_data']['file_name'],
                );
                $this->db->where('teacher_id', $id);
                $this->db->update('addteacher', $allteacherdata);
                $this->session->set_flashdata('success', 'Data updated successfully!');
                redirect('Dashboard/addTeacher');
            } else {
                $data['error'] = $this->upload->display_errors();
                redirect('Dashboard/addTeacher');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function teacherDelete($teacherid) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            if ($teacherid != '') {
                $this->db->delete('addteacher', array('teacher_id' => $teacherid));
                $this->session->set_flashdata('msg', 'Data Deleted Successfully!');
                redirect('Dashboard/addTeacher');
            }
            redirect('Dashboard/addTeacher');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function searchTeachers() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $data['varMatch'] = $this->input->post('dataMatch');
//pagination settings
            $config['base_url'] = base_url('index.php/Dashboard/addTeacher/');
            $config['total_rows'] = $this->db->count_all('addteacher');
            $config['per_page'] = "4";
            $config["uri_segment"] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

//call the model function to get the department data
            $data['allteacher'] = $this->Dashboardmodel->getSearchTeacherlist($config["per_page"], $data['page'], $data['varMatch']);
            $data['pagination'] = $this->pagination->create_links();

//            $this->load->view('dashboard/header', $data);
//            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/teacher/searchTeacherPage', $data);
//            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addclass() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//pagination settings 
            $config['base_url'] = base_url('index.php/Dashboard/addclass/');
            $config['total_rows'] = $this->db->count_all('addclass');
            $config['per_page'] = "4";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allclasslist'] = $this->Dashboardmodel->getClasslist($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/class/addclass', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function classAddProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//its for teacher name call
            $data['allteacher'] = $this->Dashboardmodel->getTeacher();
//end
            $created = date('Y-m-d H:i:s');
            $this->form_validation->set_rules('name', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('n_no', 'Numeric No', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please Insert Correctly!');
                redirect('Dashboard/addclass');
            } else {
                $allclass = array(
                    'class_name' => $this->input->post('name'),
                    'numeric_no' => $this->input->post('n_no'),
                    'created' => $created,
                );
                $this->db->insert('addclass', $allclass);
                $this->session->set_flashdata('success', 'Class add successfully!');
                redirect('Dashboard/addclass');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function searchClass() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//its for teacher name call
            $data['allteacher'] = $this->Dashboardmodel->getTeacher();
//end
//its for search
            $classname = $this->input->post('search');
            if (isset($classname) and ! empty($classname)) {
                $data['allclasslist'] = $this->Dashboardmodel->searchClass($classname);
                $data['pagination'] = $this->pagination->create_links();
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/class/addclass', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                redirect('Dashboard/addclass');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
//end search
    }

    public function classDelete($classid) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            if ($classid != '') {
                $this->db->delete('addclass', array('class_id' => $classid));
                $this->session->set_flashdata('msg', 'Data delete successfully!');
                redirect('Dashboard/addclass');
            }
            redirect('Dashboard/addclass');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addSection() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//            its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
//its for teacher name call
            $data['allteacher'] = $this->Dashboardmodel->getTeacher();
//pagination settings 
            $config['base_url'] = base_url('index.php/Dashboard/addSection/');
            $config['total_rows'] = $this->db->count_all('addsection');
            $config['per_page'] = "4";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allsectionlist'] = $this->Dashboardmodel->getsectionlist($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/class/addSection', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function sectionaddProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('Y-m-d H:i:s');
            $this->form_validation->set_rules('name', 'Section Name', 'trim|required');
            $this->form_validation->set_rules('classname', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('teachername', 'Teacher Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please Insert Correctly!');
                redirect('Dashboard/addSection');
            } else {
                $allsection = array(
                    'section_name' => $this->input->post('name'),
                    'class_id' => $this->input->post('classname'),
                    'teacher_id' => $this->input->post('teachername'),
                    'created' => $created,
                );
                $this->load->model('Dashboardmodel');
                if ($this->Dashboardmodel->check_section_exist($allsection['section_name'])) {
                    $this->session->set_flashdata('exist', 'Already Exists!');
                    redirect('Dashboard/addSection');
                } else {
                    $this->Dashboardmodel->saveSection($allsection);
                    redirect('Dashboard/addSection');
                }
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function updateSection() {
        if ($this->session->userdata('current_user_id')) {
            if ($this->input->is_ajax_request()) {
                $sec_id = $this->input->post('sec_id');
                $section = $this->input->post('section');
                $data = array(
                    'section_name' => $section,
                );

                if (!$this->db->where('section_id', (int) $sec_id)->update('addsection', $data)) {
                    echo 'problem';
                } else {
                    $query = $this->db->where('section_id', (int) $sec_id)->get('addsection');
                    $user = $query->row();
                    echo $user->section_name;
                }
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function sectionDelete($sectionid) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            if ($sectionid != '') {
                $this->db->delete('addsection', array('section_id' => $sectionid));
                $this->session->set_flashdata('msg', 'Data Deleted Successsfully!');
                redirect('Dashboard/addSection');
            }
            redirect('Dashboard/addSection');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addstudent() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//        its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
//pagination settings 
            $config['base_url'] = base_url('index.php/Dashboard/addstudent/');
            $config['total_rows'] = $this->db->count_all('addstudent');
            $config['per_page'] = "10";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allstudents'] = $this->Dashboardmodel->getStudentslist($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();
            
        $data['studentsCount'] = $this->db->count_all('addstudent');

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/students/addstudent', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function ajax_sectionid($id) {
        if ($this->session->userdata('current_user_id')) {
            $this->load->model('Dashboardmodel');
            $data['allsection'] = $this->Dashboardmodel->getsectionid($id);
            $this->load->view('dashboard/classRoutine/sectionpage', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function ajax_subjectid($id) {
        if ($this->session->userdata('current_user_id')) {
            $this->load->model('Dashboardmodel');
            $data['allsubject'] = $this->Dashboardmodel->getsubject($id);
            $this->load->view('dashboard/classRoutine/ajax_subjectid', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function ajax_std($id) {
        if ($this->session->userdata('current_user_id')) {
            $this->load->model('Dashboardmodel');
            $data['allStd'] = $this->Dashboardmodel->getStdID($id);
            $this->load->view('dashboard/feesCollection/ajax_stdIDPage', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function studentAddProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//        its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
            $created = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $year = date('Y');
            $month = date('F');
            $config = array(
                'upload_path' => "./uploads/students/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'file_name' => "BCA" . date("ymdhms"),
                'max_size' => "2048000",
                'max_height' => "768",
                'max_width' => "1024"
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->form_validation->set_rules('name', 'Students Name', 'trim|required');
            $this->form_validation->set_rules('guardian_name', 'Guardian Name', 'trim|required');
            $this->form_validation->set_rules('classname', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('sectionid', 'Section Name', 'trim|required');
            $this->form_validation->set_rules('rollno', 'Roll No', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('email', 'E-Mail', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please insert correctly!');
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/students/addstudent', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                if ($this->upload->do_upload('photo')) {
                    $data['upload_data'] = $this->upload->data();
                    $allstudents = array(
                        'student_name' => $this->input->post('name'),
                        'guardian_name' => $this->input->post('guardian_name'),
                        'class_id' => $this->input->post('classname'),
                        'section_id' => $this->input->post('sectionid'),
                        'roll_no' => $this->input->post('rollno'),
                        'birthday' => $this->input->post('dob'),
                        'gender' => $this->input->post('gender'),
                        'address' => $this->input->post('address'),
                        'phone' => $this->input->post('mobile'),
                        'email' => $this->input->post('email'),
                        'password' => $this->input->post('password'),
                        'photo' => $data['upload_data']['file_name'],
                        'year' => $year,
                        'month' => $month,
                        'created' => $created,
                    );
                    $this->db->insert('addstudent', $allstudents);
                    $this->session->set_flashdata('success', 'Students add successfully!');
                    redirect('Dashboard/addstudent');
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('dashboard/students/addstudent', $data);
                }
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function searchStudents() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//        its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
//its for search
            $search = $this->input->post('search');
            if (isset($search) and ! empty($search)) {
                $data['allstudents'] = $this->Dashboardmodel->searchstudents($search);
                $data['pagination'] = $this->pagination->create_links();
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/students/addstudent', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                redirect('Dashboard/addstudent');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function studentDelete($studentid) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            if ($studentid != '') {
                $this->db->delete('addstudent', array('student_id' => $studentid));
                $this->session->set_flashdata('msg', 'Data Deleted Successfully!');
                redirect('Dashboard/addstudent');
            }
            redirect('Dashboard/addstudent');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addSubject() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//        its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
//its for teacher name call
            $data['allteacher'] = $this->Dashboardmodel->getTeacher();
//pagination settings 
            $config['base_url'] = base_url('index.php/Dashboard/addSubject/');
            $config['total_rows'] = $this->db->count_all('addsubject');
            $config['per_page'] = "10";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allsubjects'] = $this->Dashboardmodel->getSubjectslist($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/subject/addsubject', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function subjectaddProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $year = date('Y');
            $month = date('F');
            $this->form_validation->set_rules('name', 'Subject Name', 'trim|required');
            $this->form_validation->set_rules('classid', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('teacherid', 'Teacher Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please insert correctly!');
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/subject/addsubject', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                $allsubject = array(
                    'subject_name' => $this->input->post('name'),
                    'class_id' => $this->input->post('classid'),
                    'teacher_id' => $this->input->post('teacherid'),
                    'created' => $created,
                );
                $this->db->insert('addsubject', $allsubject);
                $this->session->set_flashdata('success', 'Subject Add Successfully!');
                redirect('Dashboard/addSubject');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function searchSubject() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//its for search
            $search = $this->input->post('search');
            if (isset($search) and ! empty($search)) {
//        its for class list
                $data['allclass'] = $this->Dashboardmodel->getclass();
//its for teacher name call
                $data['allteacher'] = $this->Dashboardmodel->getTeacher();

                $data['allsubjects'] = $this->Dashboardmodel->searchsubjects($search);
                $data['pagination'] = $this->pagination->create_links();
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/subject/addsubject', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                redirect('Dashboard/addSubject');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function subjectDelete($subjectid) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            if ($subjectid != '') {
                $this->db->delete('addsubject', array('subject_id' => $subjectid));
                $this->session->set_flashdata('msg', 'Data Deleted Successfully!');
                redirect('Dashboard/addSubject');
            }
            redirect('Dashboard/addSubject');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addExam() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//pagination settings 
            $config['base_url'] = base_url('index.php/Dashboard/addExam/');
            $config['total_rows'] = $this->db->count_all('examlist');
            $config['per_page'] = "10";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allexamlist'] = $this->Dashboardmodel->getExamlist($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/exam/addExam', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function examaddProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $year = date('Y');
            $month = date('F');
            $this->form_validation->set_rules('name', 'Exam Name', 'trim|required');
            $this->form_validation->set_rules('examdate', 'Exam Date', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please insert correctly!');
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/exam/addExam', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                $allsubject = array(
                    'exam_name' => $this->input->post('name'),
                    'date' => $this->input->post('examdate'),
                    'comments' => $this->input->post('comment'),
                    'created' => $created,
                );
                $this->db->insert('examlist', $allsubject);
                $this->session->set_flashdata('success', 'Exam Add Successfully!');
                redirect('Dashboard/addExam');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function searchExam() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//its for search
            $search = $this->input->post('search');
            if (isset($search) and ! empty($search)) {
                $data['allexamlist'] = $this->Dashboardmodel->searchexam($search);
                $data['pagination'] = $this->pagination->create_links();
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/exam/addExam', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                redirect('Dashboard/addExam');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function examDelete($examid) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            if ($examid != '') {
                $this->db->delete('examlist', array('exam_id' => $examid));
                $this->session->set_flashdata('msg', 'Data Deleted Successfully!');
                redirect('Dashboard/addExam');
            }
            redirect('Dashboard/addExam');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addExamGrade() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//pagination settings 
            $config['base_url'] = base_url('index.php/Dashboard/addExamGrade/');
            $config['total_rows'] = $this->db->count_all('gradelist');
            $config['per_page'] = "10";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allgradelist'] = $this->Dashboardmodel->getGradelist($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/exam/addExamGrade', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function examgradeaddProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $year = date('Y');
            $month = date('F');
            $this->form_validation->set_rules('name', 'Grade Name', 'trim|required');
            $this->form_validation->set_rules('point', 'Grade Point', 'trim|required');
            $this->form_validation->set_rules('markfrom', 'Mark From', 'trim|required');
            $this->form_validation->set_rules('markupto', 'Mark Upto', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please insert correctly!');
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/exam/addExamGrade', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                $allgradet = array(
                    'grade_name' => $this->input->post('name'),
                    'grade_point' => $this->input->post('point'),
                    'mark_from' => $this->input->post('markfrom'),
                    'mark_upto' => $this->input->post('markupto'),
                    'comments' => $this->input->post('comment'),
                    'created' => $created,
                );
                $this->db->insert('gradelist', $allgradet);
                $this->session->set_flashdata('success', 'Grade Add Successfully!');
                redirect('Dashboard/addExamGrade');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function searchGrade() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//its for search
            $search = $this->input->post('search');
            if (isset($search) and ! empty($search)) {
                $data['allgradelist'] = $this->Dashboardmodel->searchgrade($search);
                $data['pagination'] = $this->pagination->create_links();
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/exam/addExamGrade', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                redirect('Dashboard/addExamGrade');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function examGradeDelete($examgradeid) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            if ($examgradeid != '') {
                $this->db->delete('gradelist', array('grade_id' => $examgradeid));
                $this->session->set_flashdata('msg', 'Data Deleted Successfully!');
                redirect('Dashboard/addExamGrade');
            }
            redirect('Dashboard/addExamGrade');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addmanagemarks() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//            its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
//its for exam list call
            $data['allexamlist'] = $this->Dashboardmodel->getexam();
//its for list class wise subject 
            $clsname = '';
            $data['allclssubexam'] = $this->Dashboardmodel->getclasswisesubmarks($clsname);

//pagination settings 
            $config['base_url'] = base_url('index.php/Dashboard/addmanagemarks/');
            $config['total_rows'] = $this->db->count_all('managemarks');
            $config['per_page'] = "5";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allmanagemarksstd'] = $this->Dashboardmodel->getManagemarksList($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();


            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/exam/addmanagemarks', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function searchManageMarksStd() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $searchfld = $this->input->post('search');
            if (isset($searchfld) and ! empty($searchfld)) {
                $data['allmanagemarksstd'] = $this->Dashboardmodel->searchMngMrkStd($searchfld);
                $data['pagination'] = $this->pagination->create_links();
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/exam/addmanagemarks', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                redirect('Dashboard/addmanagemarks');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function ajax_sectionidexam($id) {
        if ($this->session->userdata('current_user_id')) {
            $this->load->model('Dashboardmodel');
//its for section
            $data['allsection'] = $this->Dashboardmodel->getsectionid($id);
            $this->load->view('dashboard/exam/sectionpage', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function ajax_subjectidexam($subid) {
        if ($this->session->userdata('current_user_id')) {
//its for subject
            $data['allsubject'] = $this->Dashboardmodel->getsubjectid($subid);
            $this->load->view('dashboard/exam/subjectpage', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function manageMarksstd() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//            its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
//its for exam list call
            $data['allexamlist'] = $this->Dashboardmodel->getexam();
//its for class wise students
            $cid = $this->input->post('classname');
            $sid = $this->input->post('hiddensection');
            $sub = $this->input->post('hiddensubject');
            $data['allstd'] = $this->Dashboardmodel->getclssecsub($cid, $sid, $sub);

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/exam/liststd', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function marksaddProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $month = date('F');
            $year = date('Y');
            $data['allstd'] = '';
            $this->form_validation->set_rules('marks[]', 'Marks', 'required');
            $this->form_validation->set_rules('examid', 'Exam', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please insert Correctly!');
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/exam/liststd', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                $std_id = $this->input->post('hidestdid[]');
                $std_rollno = $this->input->post('stdrollno[]');
                $cls_id = $this->input->post('hideclsid[]');
                $sec_id = $this->input->post('hidesecid[]');
                $sub_id = $this->input->post('hidesubid[]');
                $exam_id = $this->input->post('examid');
                $marks = $this->input->post('marks[]');
                $lg = $this->input->post('lg[]');
                $gp = $this->input->post('gp[]');
                $i = 0;
                foreach ($std_id as $row) {
                    $record['student_id'] = $std_id[$i];
                    $record['roll_no'] = $std_rollno[$i];
                    $record['class_id'] = $cls_id[$i];
                    $record['section_id'] = $sec_id[$i];
                    $record['subject_id'] = $sub_id[$i];
                    $record['exam_id'] = $exam_id;
                    $record['marks'] = $marks[$i];
                    $record['letter_grade'] = $lg[$i];
                    $record['grade_point'] = $gp[$i];
                    $record['month'] = $month;
                    $record['year'] = $year;
                    $record['created'] = $created;

                    $this->db->insert('managemarks', $record);
                    $i++;
                }
                $this->session->set_flashdata('success', 'Marks Add Successfully!');
                redirect('Dashboard/addmanagemarks');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function showclssubmarks() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//      its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
            $clsname = $this->input->post('clsname');
            $data['allclssubexam'] = $this->Dashboardmodel->getclasswisesubmarks($clsname);

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/exam/addmanagemarks', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

//    public function addManageMarksOption() {
//        $data['baseurl'] = $this->baseurl;
//        //            its for class list
//        $data['allclass'] = $this->Dashboardmodel->getclass();
//        //its for exam list call
//        $data['allexamlist'] = $this->Dashboardmodel->getexam();
////        its for std & subject
//        $cid = $this->input->post('classname');
//        $sid = $this->input->post('hiddensection');
//        $subid = '';
//        $data['allstdsubject'] = $this->Dashboardmodel->getclssecStdSub($cid, $sid, $subid);
//
//        $this->load->view('dashboard/header', $data);
//        $this->load->view('dashboard/sidebar', $data);
//        $this->load->view('dashboard/exam/addmanagemarksOption', $data);
//        $this->load->view('dashboard/footer', $data);
//    }
//
//    public function addGrade() {
//        $data['baseurl'] = $this->baseurl;
//        // its for class list
//        $data['allclass'] = $this->Dashboardmodel->getclass();
//        
//        $this->load->view('dashboard/header', $data);
//        $this->load->view('dashboard/sidebar', $data);
//        $this->load->view('dashboard/grade/addgradepage', $data);
//        $this->load->view('dashboard/footer', $data);
//    }
//    public function addSixClass(){
//        $data['baseurl'] = $this->baseurl;
////        its for subject list
//        $data['allsubject'] = $this->Dashboardmodel->getsubject();
//        $this->load->view('dashboard/header', $data);
//        $this->load->view('dashboard/sidebar', $data);
//        $this->load->view('dashboard/grade/addSixClassPage', $data);
//        $this->load->view('dashboard/footer', $data);
//    }

    public function testimonialList() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//pagination settings 
            $config['base_url'] = $this->baseurl . ('index.php/Dashboard/testimonialList/');
            $config['total_rows'] = $this->db->count_all('testimonial');
            $config['per_page'] = "2";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['alltestimonial'] = $this->Dashboardmodel->getTestimonials($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/testimonials/testimonialsList', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addTestimonial() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('Y-m-d H:i:s');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('name', 'Author Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please Input Correctly');
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/testimonials/testimonialsList', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                $testimonial = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('desc'),
                    'name' => $this->input->post('name'),
                    'created' => $created,
                );
                $this->db->insert('testimonial', $testimonial);
                $this->session->set_flashdata('msg', 'Data input Successfully!');
                redirect('Dashboard/testimonialList');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function updateTestimonial() {
        if ($this->session->userdata('current_user_id')) {
            if ($this->input->is_ajax_request()) {
                $testi_id = $this->input->post('testi_id');
                $title = $this->input->post('title');
                $discription = $this->input->post('discription');
                $author = $this->input->post('author');
                $data = array(
                    'title' => $title,
                    'description' => $discription,
                    'name' => $author,
                );

                if (!$this->db->where('testimonial_id', (int) $testi_id)->update('testimonial', $data)) {
                    echo 'problem';
                } else {
                    $query = $this->db->where('testimonial_id', (int) $testi_id)->get('testimonial');
                    $user = $query->row();
                    echo $user->title . '|' . $user->description . '|' . $user->name;
                }
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function deleteTestimonial($testimonialid) {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            if ($testimonialid != '') {
                $this->db->delete('testimonial', array('testimonial_id' => $testimonialid));
                $this->session->set_flashdata('msg', 'Data Deleted Successfully!');
                redirect('Dashboard/testimonialList');
            }
            redirect('Dashboard/testimonialList');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addManageday() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//pagination settings 
            $config['base_url'] = $this->baseurl . ('index.php/Dashboard/addManageday/');
            $config['total_rows'] = $this->db->count_all('manageday');
            $config['per_page'] = "10";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allmanageday'] = $this->Dashboardmodel->getManageDay($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/classRoutine/addManageday', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function manageDayProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $this->form_validation->set_rules('name', 'Day Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please Data insert correctly!');
                redirect('Dashboard/addManageday');
            } else {
                $allDay = array(
                    'dayName' => $this->input->post('name'),
                );
                if ($this->Dashboardmodel->checkManageDay($allDay['dayName'])) {
                    $this->session->set_flashdata('exist', 'Already Exists!');
                    redirect('Dashboard/addManageday');
                } else {
                    $this->Dashboardmodel->saveManageDay($allDay);
                    redirect('Dashboard/addManageday');
                }
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function manageDayEdit() {
        
    }

    public function addManagePeriodTime() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//pagination settings 
            $config['base_url'] = $this->baseurl . ('index.php/Dashboard/addManagePeriodTime/');
            $config['total_rows'] = $this->db->count_all('manageTime');
            $config['per_page'] = "10";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allmanagetime'] = $this->Dashboardmodel->getManageTime($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/classRoutine/addManagePeriodTime', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function manageTimePeriod() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $this->form_validation->set_rules('name', 'Time Period', 'required');
            $this->form_validation->set_rules('period', 'Time Period', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Data insert correctly');
                redirect('Dashboard/addManagePeriodTime');
            } else {
                $allTimeperiod = array(
                    'time' => $this->input->post('name'),
                    'period' => $this->input->post('period'),
                );
                if ($this->Dashboardmodel->checkManageTime($allTimeperiod['time'])) {
                    $this->session->set_flashdata('exist', 'Already Exists!');
                    redirect('Dashboard/addManagePeriodTime');
                } else {
                    $this->Dashboardmodel->saveTimePeriod($allTimeperiod);
                    redirect('Dashboard/addManagePeriodTime');
                }
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addManageVenu() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            // all campus show
            $data['allCampusname'] = $this->Dashboardmodel->getCampus();

//pagination settings 
            $config['base_url'] = $this->baseurl . ('index.php/Dashboard/addManageVenu/');
            $config['total_rows'] = $this->db->count_all('manageVanu');
            $config['per_page'] = "10";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allmanagevanu'] = $this->Dashboardmodel->getManageVanu($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/classRoutine/addVanu', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function CampusProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $this->form_validation->set_rules('camName', 'Campus Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Data insert correctly');
                redirect('Dashboard/addManageVenu');
            } else {
                $allCampus = array(
                    'campusName' => $this->input->post('camName'),
                );
                if ($this->Dashboardmodel->check_campus($allCampus['campusName'])) {
                    $this->session->set_flashdata('exist', 'Already Exists!');
                    redirect('Dashboard/addManagevenu');
                } else {
                    $this->Dashboardmodel->saveCampus($allCampus);
                    redirect('Dashboard/addManagevenu');
                }
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function managevanuProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $this->form_validation->set_rules('name', 'Vanu Name', 'required');
            $this->form_validation->set_rules('roomno', 'Room No', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Data insert correctly');
                redirect('Dashboard/addManageVenu');
            } else {
                $allTimeperiod = array(
                    'campus_id' => $this->input->post('name'),
                    'roomno' => $this->input->post('roomno'),
                );
                $this->Dashboardmodel->savevanu($allTimeperiod);
                redirect('Dashboard/addManageVenu');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addRoutine() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            // its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
            // its for teacher name call
            $data['allteacher'] = $this->Dashboardmodel->getTeacher();
            // its for all day call
            $data['allday'] = $this->Dashboardmodel->getallDay();
            // its for all time schedule
            $data['allTime'] = $this->Dashboardmodel->getTimeFrom();
            // all campus show
            $data['allCampusname'] = $this->Dashboardmodel->getCampus();

            //pagination settings 
            $config['base_url'] = $this->baseurl . ('index.php/Dashboard/addRoutine/');
            $config['total_rows'] = $this->db->count_all('addroutine');
            $config['per_page'] = "10";
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//call the model function to get the department data
            $this->load->model('Dashboardmodel');
            $data['allroutine'] = $this->Dashboardmodel->getRoutine($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/classRoutine/createRoutine', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function ajax_teacherid($id) {
        if ($this->session->userdata('current_user_id')) {
            $this->load->model('Dashboardmodel');
            $data['allteacher'] = $this->Dashboardmodel->getTeachersid($id);
            $this->load->view('dashboard/classRoutine/techeridpage', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function routineProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            date_timezone_set("asia/Dhaka");
            $month = date('F');
            $created = date('d-m-Y');
            $this->form_validation->set_rules('year', 'Year', 'required');
            $this->form_validation->set_rules('classname', 'Class Name', 'required');
            $this->form_validation->set_rules('section_id', 'Section Name', 'required');
            $this->form_validation->set_rules('subjectid', 'Subject Name', 'required');
            $this->form_validation->set_rules('teacherid', 'Teacher Name', 'required');
            $this->form_validation->set_rules('dayid', 'Day Name', 'required');
            $this->form_validation->set_rules('fromtime', 'Start Time', 'required');
            $this->form_validation->set_rules('totime', 'End Time', 'required');
            $this->form_validation->set_rules('campusname', 'Campus Name', 'required');
            $this->form_validation->set_rules('roomNo', 'Room No', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Data insert correctly');
                redirect('Dashboard/addRoutine');
            } else {
                $alldata = array(
                    'year' => $this->input->post('year'),
                    'class_id' => $this->input->post('classname'),
                    'section_id' => $this->input->post('section_id'),
                    'subject_id' => $this->input->post('subjectid'),
                    'teacher_id' => $this->input->post('teacherid'),
                    'day' => $this->input->post('dayid'),
                    'time_from' => $this->input->post('fromtime'),
                    'time_to' => $this->input->post('totime'),
                    'campus_name' => $this->input->post('campusname'),
                    'room_no' => $this->input->post('roomNo'),
                    'month' => $month,
                    'created' => $created,
                );
                $this->Dashboardmodel->saveRoutine($alldata);
                redirect('Dashboard/addRoutine');
            }
            redirect('Dashboard/addRoutine');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function ajax_campus($rid) {
        if ($this->session->userdata('current_user_id')) {
            $this->load->model('Dashboardmodel');
            $data['allroomid'] = $this->Dashboardmodel->getRoomid($rid);
            $this->load->view('dashboard/classRoutine/roomidpage', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addFeesCollection() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//            its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
//        its for fees 
            $data['allFees'] = $this->Dashboardmodel->getFees();
//its for exam list call
            $data['allexamlist'] = $this->Dashboardmodel->getexam();


            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/feesCollection/feesCollectionPage', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function ajax_feesAmount($fid) {
        if ($this->session->userdata('current_user_id')) {
            $this->load->model('Dashboardmodel');
            $data['allFeesAmt'] = $this->Dashboardmodel->getAmount($fid);
            $this->load->view('dashboard/feesCollection/feesAmountPage', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addFees() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            //pagination settings
            $config['base_url'] = base_url('index.php/Dashboard/addFeesProcess/');
            $config['total_rows'] = $this->db->count_all('addfees');
            $config['per_page'] = "5";
            $config["uri_segment"] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);
//config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
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

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

//call the model function to get the department data
            $data['allfeesList'] = $this->Dashboardmodel->feesList($config["per_page"], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/feesCollection/addFeesPage', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function addFeesProcess() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('Y-m-d H:i:s');
            $month = date('Y');
            $year = date('F');

            //its for validation
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('msg', 'Please input Correctly');
                redirect('Dashboard/addFees');
            } else {
                $allFees = array(
                    'fees_name' => $this->input->post('name'),
                    'fees_amount' => $this->input->post('amount'),
                );
                if ($this->Dashboardmodel->check_addFees($allFees['fees_name'])) {
                    $this->session->set_flashdata('exist', 'Already Exists!');
                    redirect('Dashboard/addFees');
                } else {
                    $this->Dashboardmodel->saveFees($allFees);
                    redirect('Dashboard/addFees');
                }
            }
            redirect('addFees');
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function insertstdFees() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $created = date('d-m-Y');
            $month = date('F');
            $year = date('Y');
            $this->form_validation->set_rules('classname', 'Class Name', 'required');
            $this->form_validation->set_rules('section_id', 'Section Name', 'required');
            $this->form_validation->set_rules('stdID', 'Roll No', 'required');
            $this->form_validation->set_rules('exam', 'Exam', 'required');
            $this->form_validation->set_rules('feesID[]', 'Fees Name', 'required');
            $this->form_validation->set_rules('amount[]', 'Amount', 'required');
//        $this->form_validation->set_rules('paidAmount[]', 'Paid Amount', 'required');
//        $this->form_validation->set_rules('ttlamount','Total Amount','required');
//        $this->form_validation->set_rules('paidamount','Paid Amount','required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please insert Correctly!');
                redirect('Dashboard/addFeesCollection');
            } else {
                $feesID = $this->input->post('feesID[]');
                $classname = $this->input->post('classname');
                $section_id = $this->input->post('section_id');
                $stdID = $this->input->post('stdID');
                $exam_id = $this->input->post('exam');
                $amount = $this->input->post('amount[]');
//            $totalamount = $this->input->post('ttlamount');
//            $paidamount = $this->input->post('paidamount');
//            $paidAmount = $this->input->post('paidAmount[]');
                $i = 0;
                foreach ($feesID as $row) {
                    $record['class_id'] = $classname;
                    $record['section_id'] = $section_id;
                    $record['roll_no'] = $stdID;
                    $record['exam_id'] = $exam_id;
                    $record['fees_id'] = $feesID[$i];
                    $record['amount'] = $amount[$i];
//                $record['totalAmount'] = $totalamount;
//                $record['paidamount'] = $paidamount;
//                $record['paidamount'] = $paidAmount[$i];
                    $record['month'] = $month;
                    $record['year'] = $year;
                    $record['created'] = $created;

                    $this->db->insert('addfeescollection', $record);
                    $i++;
                }
                $this->session->set_flashdata('success', 'Data save successfully!');
                redirect('Dashboard/addFeesCollection');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function stdFeesPaid() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//            its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
//        its for fees 
//        $data['allFees'] = $this->Dashboardmodel->getFees();
//its for exam list call
            $data['allexamlist'] = $this->Dashboardmodel->getexam();


            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/feesCollection/stdFeesPaidPage', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function searchstdtotalFees() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
//            its for class list
            $data['allclass'] = $this->Dashboardmodel->getclass();
//        its for fees 
//        $data['allFees'] = $this->Dashboardmodel->getFees();
//its for exam list call
            $data['allexamlist'] = $this->Dashboardmodel->getexam();
            $clsid = $this->input->post('classname');
            $sectionid = $this->input->post('section_id');
            $rollNo = $this->input->post('stdID');
            $examid = $this->input->post('exam');

            $data['allStdPayable'] = $this->Dashboardmodel->getshowStdPayment($clsid, $sectionid, $rollNo, $examid);
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/feesCollection/showstudentsPayment', $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            redirect('Frontpage/loginpage');
        }
    }

    public function insertStdPayment() {
        if ($this->session->userdata('current_user_id')) {
            $data['baseurl'] = $this->baseurl;
            $month = date('F');
            $year = date('Y');
            $created = date('d-m-Y');
            $cls = $this->input->post('clsid');
            $sec = $this->input->post('secid');
            $roll = $this->input->post('rollno');
            $exam = $this->input->post('examid');
            $this->form_validation->set_rules('paidamount', 'Enter Payment', 'required');
            $this->form_validation->set_rules('paymentStatus', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Please data insert correctly!');
                redirect('Dashboard/searchstdtotalFees');
            } else {
                $alldata = array(
                    'cls_id' => $cls,
                    'sec_id' => $sec,
                    'roll_no' => $roll,
                    'exam_id' => $exam,
                    'totalAmount' => $this->input->post('ttlamount'),
                    'paidAmount' => $this->input->post('paidamount'),
                    'dueAmount' => $this->input->post('dueamount'),
                    'status' => $this->input->post('paymentStatus'),
                    'month' => $month,
                    'year' => $year,
                    'created' => $created,
                );
                $this->db->insert('stdPayments', $alldata);
                $this->session->set_flashdata('success', 'Data save successfully!');
                redirect('Dashboard/searchstdtotalFees');
            }
        } else {
            redirect('Frontpage/loginpage');
        }
    }

}
