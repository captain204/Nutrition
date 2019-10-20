<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clinic extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Clinic_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'clinic/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'clinic/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'clinic/index.html';
            $config['first_url'] = base_url() . 'clinic/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Clinic_model->total_rows($q);
        $clinic = $this->Clinic_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'clinic_data' => $clinic,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'List of Clinics';
        $data['content'] ='clinic/clinic_list';
        if ($this->session->userdata('name')) {
               $this->load->view('layouts/main_clinic', $data);
        }else{

            $this->load->view('layouts/main', $data);
        }
        
    }

    public function read($id) 
    {
        $row = $this->Clinic_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'username' => $row->username,
		'email' => $row->email,
        'password' => $row->password,
        'clinic_name' => $row->clinic_name,
        'phone' => $row->phone,
        'address' => $row->address,
        );
            $data['title'] = 'Clinic';
            $data['content'] ='clinic/clinic_read';
            if ($this->session->userdata('name')) {
                $this->load->view('layouts/main_clinic', $data);
                }else{
 
             $this->load->view('layouts/main', $data);
             } 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('clinic'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('clinic/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('username'),
	    'email' => set_value('email'),
        'password' => set_value('password'),
        'clinic_name' => set_value('clinic_name'),
        'phone' => set_value('phone'),
        'address' => set_value('address'),
    );
        $data['title'] = 'Clinic';
        $data['content'] ='clinic/clinic_form';

        if ($this->session->userdata('name')) {
            $this->load->view('layouts/main_clinic', $data);
            }else{

            $this->load->view('layouts/main', $data);
         }
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'email' => $this->input->post('email',TRUE),
        'password' => $this->input->post('password',TRUE),
        'clinic_name' => $this->input->post('clinic_name',TRUE),
        'phone' => $this->input->post('phone',TRUE),
        'address' => $this->input->post('address',TRUE),
	    );

            $this->Clinic_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('clinic'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Clinic_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('clinic/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('username', $row->username),
		'email' => set_value('email', $row->email),
        'password' => set_value('password', $row->password),
        'clinic_name' => set_value('clinic_name',$row->clinic_name),
        'phone' => set_value('phone',$row->phone),
        'address' => set_value('address',$row->address),
        );
            $data['title'] = 'Clinic';
            $data['content'] ='clinic/clinic_form';
            
            if ($this->session->userdata('name')) {
                $this->load->view('layouts/main_clinic', $data);
                }else{

                $this->load->view('layouts/main', $data);
            }
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('clinic'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'email' => $this->input->post('email',TRUE),
        'password' => $this->input->post('password',TRUE),
        'clinic_name' => $this->input->post('clinic_name',TRUE),
        'phone' => $this->input->post('phone',TRUE),
        'address' => $this->input->post('address',TRUE),
	    );

            $this->Clinic_model->update($this->input->post('id', TRUE), $data);
            if ($this->session->userdata('name')) {
                $this->session->set_flashdata('message', 'Profile Updated Successfully');
                redirect(site_url('nutrition'));
            }else{
                $this->session->set_flashdata('message', 'Profile Updated Successfully');
                redirect(site_url('clinic'));
            }
            
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Clinic_model->get_by_id($id);

        if ($row) {
            $this->Clinic_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('clinic'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('clinic'));
        }
    }

    private function hash_password($password){

        return password_hash($password,PASSWORD_BCRYPT);
    }

    public function register(){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('confirm','Password','trim|required|matches[password]');
        $this->form_validation->set_rules('address','Address','trim|required');
        $this->form_validation->set_rules('phone','Phone','trim|required');
        $this->form_validation->set_rules('clinic_name','clinic name','trim|required');

        if ($this->form_validation->run()==false) {
                $this->load->view('clinic/register');            
        } else{
            $password = $this->input->post('confirm');
            $data = array(

                'username'=>$this->input->post('username'),
                'email'=>$this->input->post('email'),
                'password'=>$this->hash_password($password),
                'address'=>$this->input->post('address'),
                'clinic_name'=>$this->input->post('clinic_name'),
                'phone'=>$this->input->post('phone'),

            );

                $this->Clinic_model->insert($data); 
                $this->session->set_flashdata('registered','Registration complete continue to login');
                redirect('clinic/login');
            
        }
    }


    public function login(){
        
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if($this->form_validation->run()==false){
            $this->load->view('clinic/login'); 
        }else{

        $user = $this->Clinic_model->login($username,$password);

        //Vallidating users data
        if($user){

            /*$this->session->set_userdata('clinic_id',$user['id']);
            $this->session->set_userdata('name',$user['name']);*/
            $clinic_user = $this->Clinic_model->get_by_id($user['id']);
            $this->session->set_userdata('name',$clinic_user->username);
            $this->session->set_userdata('id',$clinic_user->id);
            $this->session->set_flashdata('login','You are currently logged in');
            
            redirect('nutrition');
            
                     
        }   else{
        // Set login error
            $this->session->set_flashdata('fail','Invalid user name or password');
            redirect('clinic/login');
        }

    }
}


    public function logout(){

        $this->session->unset_userdata('clinic_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('clinic/login');
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
    $this->form_validation->set_rules('password', 'password', 'trim|required');
    $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
    $this->form_validation->set_rules('address', 'address', 'trim|required');
    $this->form_validation->set_rules('clinic_name', 'clinic name', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Clinic.php */
/* Location: ./application/controllers/Clinic.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-07 17:29:38 */
/* http://harviacode.com */