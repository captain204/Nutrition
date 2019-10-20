<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nutrition extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nutrition_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'nutrition/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'nutrition/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'nutrition/index.html';
            $config['first_url'] = base_url() . 'nutrition/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $clinic = $this->session->userdata('name');
        #echo $clinic;
        $config['total_rows'] = $this->Nutrition_model->total_rows($q,$clinic);
        $nutrition = $this->Nutrition_model->get_limit_data($config['per_page'], $start, $q,$clinic);
        #print_r($nutrition);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'nutrition_data' => $nutrition,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Patients';
        $data['content'] ='nutrition/nutrition_list';
        $this->load->view('layouts/main_clinic', $data);
        
    }

    public function read($id) 
    {
        $row = $this->Nutrition_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'firstname' => $row->firstname,
		'lastname' => $row->lastname,
        'address' => $row->address,
        'weight' => $row->weight,
		'height' => $row->height,
		'age' => $row->age,
		'officer_name' => $row->officer_name,
		'officer_phone' => $row->officer_phone,
		'clinic_name' => $row->clinic_name,
		//'patient_name' => $row->patient_name,
		'patient_id' => $row->patient_id,
		'sex' => $row->sex,
		'date' => $row->date,
        );
            $data['title'] = 'Patient Profile';
            $data['content'] ='nutrition/nutrition_read';
            $this->load->view('layouts/main_clinic', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nutrition'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nutrition/create_action'),
	    'id' => set_value('id'),
	    'firstname' => set_value('firstname'),
	    'lastname' => set_value('lastname'),
        'address' => set_value('address'),
        'weight' => set_value('weight'),
	    'height' => set_value('height'),
	    'age' => set_value('age'),
	    'officer_name' => set_value('officer_name'),
	    'officer_phone' => set_value('officer_phone'),
	    'clinic_name' => set_value('clinic_name'),
	    //'patient_name' => set_value('patient_name'),
	    'patient_id' => set_value('patient_id'),
	    'sex' => set_value('sex'),
    );
        $data['title'] = 'Add Patient';
        $data['content'] ='nutrition/nutrition_form';
        $this->load->view('layouts/main_clinic', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'firstname' => $this->input->post('firstname',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
        'address' => $this->input->post('address',TRUE),
        'weight' => $this->input->post('weight',TRUE),
		'height' => $this->input->post('height',TRUE),
		'age' => $this->input->post('age',TRUE),
		'officer_name' => $this->input->post('officer_name',TRUE),
		'officer_phone' => $this->input->post('officer_phone',TRUE),
		'clinic_name' => $this->input->post('clinic_name',TRUE),
		//'patient_name' => $this->input->post('patient_name',TRUE),
		'patient_id' => $this->input->post('patient_id',TRUE),
		'sex' => $this->input->post('sex',TRUE),
	    );

            $this->Nutrition_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nutrition'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nutrition_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nutrition/update_action'),
		'id' => set_value('id', $row->id),
		'firstname' => set_value('firstname', $row->firstname),
		'lastname' => set_value('lastname', $row->lastname),
        'address' => set_value('address', $row->address),
        'weight' => set_value('weight', $row->weight),
		'height' => set_value('height', $row->height),
		'age' => set_value('age', $row->age),
		'officer_name' => set_value('officer_name', $row->officer_name),
		'officer_phone' => set_value('officer_phone', $row->officer_phone),
		'clinic_name' => set_value('clinic_name', $row->clinic_name),
		//'patient_name' => set_value('patient_name', $row->patient_name),
		'patient_id' => set_value('patient_id', $row->patient_id),
		'sex' => set_value('sex', $row->sex),
		
        );
            $data['title'] = 'Add Patient';
            $data['content'] ='nutrition/nutrition_form';
            $this->load->view('layouts/main_clinic', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nutrition'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'firstname' => $this->input->post('firstname',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
        'address' => $this->input->post('address',TRUE),
        'weight' => $this->input->post('weight',TRUE),
		'height' => $this->input->post('height',TRUE),
		'age' => $this->input->post('age',TRUE),
		'officer_name' => $this->input->post('officer_name',TRUE),
		'officer_phone' => $this->input->post('officer_phone',TRUE),
		'clinic_name' => $this->input->post('clinic_name',TRUE),
		//'patient_name' => $this->input->post('patient_name',TRUE),
		'patient_id' => $this->input->post('patient_id',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'date' => $this->input->post('date',TRUE),
	    );

            $this->Nutrition_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nutrition'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nutrition_model->get_by_id($id);

        if ($row) {
            $this->Nutrition_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nutrition'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nutrition'));
        }
    }

    public function result($id){

        $row = $this->Nutrition_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'firstname' => $row->firstname,
		'lastname' => $row->lastname,
		'address' => $row->address,
        'height' => $row->height,
        'weight' => $row->weight,
        'status' => $row->status,
		'age' => $row->age,
		'officer_name' => $row->officer_name,
		'officer_phone' => $row->officer_phone,
		'clinic_name' => $row->clinic_name,
		//'patient_name' => $row->patient_name,
		'patient_id' => $row->patient_id,
		'sex' => $row->sex,
		'date' => $row->date,
        );
        // Calculating body mass index
            $data['bmi'] = $data['weight'] / $data['height'] ** 2;
            $value = $data['bmi'];
        // Setting expert recommendation
        if ($value < 18.5) {

            // Underweight
            $result = $this->Results_model->get_by_id(1);
            $data['status'] = $result->status;
            $data['remarks'] = $result->recommendation;

        }
        if ($value >= 18.5) {
            
            //Normal
            $result = $this->Results_model->get_by_id(2);
            $data['status'] = $result->status;
            $data['remarks'] = $result->recommendation;

        }
        if ($value >=25) {

            //Overweight

            $result = $this->Results_model->get_by_id(3);
            $data['status'] = $result->status;
            $data['remarks'] = $result->recommendation;
            

        }
        if ($value >=30) {

            //Obese

            
            $result = $this->Results_model->get_by_id(4);
            $data['status'] = $result->status;
            $data['remarks'] = $result->recommendation;

        } 


            $data['title'] = 'Nutrition Status';
            #$data['content'] ='nutrition/results';
            $this->load->view('nutrition/results', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nutrition'));
        }


    }

    public function _rules() 
    {
	$this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
	$this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
    $this->form_validation->set_rules('address', 'address', 'trim|required');
    $this->form_validation->set_rules('weight', 'weight', 'trim|required');
	$this->form_validation->set_rules('height', 'height', 'trim|required');
	$this->form_validation->set_rules('age', 'age', 'trim|required');
	$this->form_validation->set_rules('officer_name', 'officer name', 'trim|required');
	$this->form_validation->set_rules('officer_phone', 'officer phone', 'trim|required');
	$this->form_validation->set_rules('clinic_name', 'clinic name', 'trim|required');
	//$this->form_validation->set_rules('patient_name', 'patient name', 'trim|required');
	$this->form_validation->set_rules('patient_id', 'patient id', 'trim|required');
	$this->form_validation->set_rules('sex', 'sex', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Nutrition.php */
/* Location: ./application/controllers/Nutrition.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-07 17:24:30 */
/* http://harviacode.com */