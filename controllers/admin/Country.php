<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Country extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('location_model');
        $this->load->library('CSVReader');
    }

    /* List all knowledgebase locationmakes */
    public function index()
    {
        if (!has_permission('master', '', 'view')) {
            access_denied('master');
        }
        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data('location_country');
        }
      
        $subheader_text = setupTitle_text('aside_menu_active', 'master', 'country');
        $data['sheading_text'] = $subheader_text;
        $data['sh_text'] = $subheader_text;
        $data['country_result'] = $this->db->get_where(db_prefix().'country')->result();
        $data['city_result'] = $this->db->get_where(db_prefix().'city')->result();
        $data['title']     = _l($subheader_text);
        $this->load->view('admin/country/countrys', $data);
    }

    /* Function: City List */
    public function getStatelist()
    {
        $profileResult = [];
        $country_id = $_POST['country_id'];
        $profileResult = $this->db->get_where(db_prefix().'state', array('country_id' => $country_id))->result();
        echo json_encode($profileResult);
    }
    /* Function: City List */
    public function getCitylist()
    {
        $profileResult = [];
        $country_id = $_POST['country_id'];
        $profileResult = $this->db->get_where(db_prefix().'city', array('country_id' => $country_id))->result();
        echo json_encode($profileResult);
    }

    /* Add new article or edit existing*/
    public function add($id = '')
    {
        if (!has_permission('master', '', 'view')) {
            access_denied('master');
        }
        if ($this->input->post()) {
            $data                = $this->input->post();
            
            if ($id == '') {
                if (!has_permission('master', '', 'create')) {
                    access_denied('master');
                }

                $countryName = $this->db->get_where('tblcountry', array('name' => $data['name']))->row('name');
                if($countryName)
                {
                    set_alert('warning', _l($countryName.' country name is already exists'));
                    redirect(admin_url('country'));
                }
                else
                {
                    $id = $this->location_model->add_Country($data);
                    if ($id) {
                        set_alert('success', _l('added_successfully', _l('Country')));
                    }
                    redirect(admin_url('country'));
                }
            } else {
                if (!has_permission('master', '', 'edit')) {
                    access_denied('master');
                }                
                $success = $this->location_model->update_Country($data, $id);
                if ($success) {
                    set_alert('success', _l('updated_successfully', _l('Country')));
                }
                redirect(admin_url('country'));
            }
        }
        
        $subheader_text = setupTitle_text('aside_menu_active', 'master', 'country');
        $data['sheading_text'] = $subheader_text;
        $data['sh_text'] = $subheader_text;
        
        $data['article'] = $this->db->get_where(db_prefix().'country',array('id' => $id))->row();
        $data['country_result'] = $this->db->get_where(db_prefix().'country')->result();
        $data['city_result'] = $this->db->get_where(db_prefix().'city')->result();

        $data['title']     = _l($sheader_text);
        $this->load->view('admin/country/country', $data);
    }

    /* getCityModel */
    public function citytable()
    {
        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data('location_city');
        }
    }
    /* Area table */
    public function areatable()
    {
        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data('location_area');
        }
    }

    /**
    * @ Change status
    */
    public function change_status($id, $status)
    {
        if ($this->input->is_ajax_request()) {
            $postdata['is_active'] = $status;
            $this->db->where('id', $id);
            $this->db->update(db_prefix().'country', $postdata);
            
            $statedata['is_active'] = $status;
            $this->db->where('country_id', $id);
            $this->db->update(db_prefix().'state', $statedata);
            
            $citydata['is_active'] = $status;
            $this->db->where('country_id', $id);
            $this->db->update(db_prefix().'city', $citydata);
        }
    }

    /* Add new article or edit existing*/
    public function addCity($id = '')
    {
        if (!has_permission('master', '', 'view')) {
            access_denied('master');
        }
        if ($this->input->post()) {
            $data                = $this->input->post();
            
            if ($id == '') {
                if (!has_permission('master', '', 'create')) {
                    access_denied('master');
                }
                $this->db->insert(db_prefix().'city', $data);
                $id = $this->db->insert_id();
                //$id = $this->location_model->add_locationCountry($data);
                if ($id) {
                    set_alert('success', _l('added_successfully', _l('State')));
                    redirect(admin_url('country#countrymodel'));
                }
            } else {
                if (!has_permission('master', '', 'edit')) {
                    access_denied('master');
                }
                $this->db->where('id', $id);
                $this->db->update(db_prefix().'city', $data);
                //$success = $this->location_model->update_locationmake($data, $id);
                if ($this->db->affected_rows() > 0) {
                    set_alert('success', _l('updated_successfully', _l('State')));
                }
                redirect(admin_url('country#countrymodel'));
            }
        }
        $data['country_result'] = $this->db->get_where(db_prefix().'country')->result();
        $data['city_result'] = $this->db->get_where(db_prefix().'city', array('id' => $id))->row();
        
        $subheader_text = setupTitle_text('aside_menu_active', 'master', 'country');
        $data['sheading_text'] = $subheader_text;
        $data['sh_text'] = $subheader_text;

        $data['title']     = _l($sheader_text);
        $this->load->view('admin/country/city', $data);
    }

    /* Add new article or edit existing*/
    public function addArea($id = '')
    {
        if (!has_permission('master', '', 'view')) {
            access_denied('master');
        }
        if ($this->input->post()) {
            $data                = $this->input->post();
            
            if ($id == '') {
                if (!has_permission('master', '', 'create')) {
                    access_denied('master');
                }
                $this->db->insert(db_prefix().'area', $data);
                $id = $this->db->insert_id();
                //$id = $this->location_model->add_locationCountry($data);
                if ($id) {
                    set_alert('success', _l('added_successfully', _l('City')));
                    redirect(admin_url('country#countryyear'));
                }
            } else {
                if (!has_permission('master', '', 'edit')) {
                    access_denied('master');
                }
                $this->db->where('id', $id);
                $this->db->update(db_prefix().'area', $data);
                //$success = $this->location_model->update_locationmake($data, $id);
                if ($this->db->affected_rows() > 0) {
                    set_alert('success', _l('updated_successfully', _l('City')));
                }
                redirect(admin_url('country#countryyear'));
            }
        }
        $data['country_result'] = $this->db->get_where(db_prefix().'country')->result();
        $data['city_result'] = $this->db->get_where(db_prefix().'city')->result();
        $data['area_result'] = $this->db->get_where(db_prefix().'area', array('id' => $id))->row(); 
        $subheader_text = setupTitle_text('aside_menu_active', 'master', 'country');
        $data['sheading_text'] = $subheader_text;
        $data['sh_text'] = $subheader_text;

        $data['title']     = _l($sheader_text);
        $this->load->view('admin/country/area', $data);
    }
    
    public function getmodel(){
        echo 'make model ';
    }

    public function save() {
        // If file uploaded
        if(is_uploaded_file($_FILES['fileURL']['tmp_name'])) {                            
            // Parse data from CSV file
            $csvData = $this->csvreader->parse_csv($_FILES['fileURL']['tmp_name']);       
            //echo '<pre>'; print_r($csvData); die;
            // create array from CSV file
            if(!empty($csvData)){
                $lid = '';
                foreach($csvData as $element){                    
                    // Prepare data for Database insertion
                    if($element['Country'] != '')
                    {
                        $data = array(
                            'name' => $element['Country']
                        );
                        $exitcategory = $this->db->get_where(db_prefix().'country', array('name' => $data['name']))->row('name');
                        if($exitcategory != ''){}
                        else
                        {
                            $this->db->insert(db_prefix() . 'country', $data);
                            $lid = $this->db->insert_id();
                        }
                    }
                }
                if($lid  != '')
                    set_alert('success', _l('Data are stored successful!'));
            }
            else
            {
                set_alert('warning', _l('File is required'));
            }
        }
        else
        {
            set_alert('warning', _l('File is required'));
        } 
        redirect(admin_url('country'));
    }
    
    // export Data
    public function sampledata() {
        $storData = array();
        $data[] = array('name' => 'Country');       
        
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"country".".xlsx\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $handle = fopen('php://output', 'w');
        foreach ($data as $data) {
            fputcsv($handle, $data);
        }
            fclose($handle);
        exit;
    }

    public function saveCity() {
        if(is_uploaded_file($_FILES['fileURL']['tmp_name'])) {     
            $csvData = $this->csvreader->parse_csv($_FILES['fileURL']['tmp_name']);       
            //echo '<pre>'; print_r($csvData); die;
           if(!empty($csvData)){
                foreach($csvData as $element){   
                    $name_make =   $element['Country'];
                    if($name_make)
                    {
                        $country_id = $this->db->get_where(db_prefix().'country', array('name' => $name_make))->row('id');
                        if($country_id)
                        {
                            $modeldata['country_id'] = $country_id;
                        }
                        else
                        {
                            $data_['name'] = $name_make;
                            $this->db->insert(db_prefix() . 'country', $data_);
                            $makelid = $this->db->insert_id();
                            $modeldata['country_id'] = $makelid;
                            $name_make = '';
                            $data_ = '';
                        }
                        $modeldata['name'] = $element['City'];
                        $cityName = $this->db->get_where(db_prefix().'city', array('name' => $modeldata['name']))->row('name');
                        if($cityName == '')
                        {
                            $this->db->insert(db_prefix() . 'city', $modeldata);
                            $modeldata[] = '';
                        }
                    }
                }
                set_alert('success', _l('Data are stored successful!'));
            }
            else
            {
                set_alert('warning', _l('File is required'));
            }
        }
        else
        {
            set_alert('warning', _l('File is required'));
        } 
        redirect(admin_url('country'));
    }
    
    // export Data
    public function sampledataCity() {
        $storData = array();
        $data[] = array('country_id' => 'Country', 'name' => 'State');       
        
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"xlsx-sample-state".".xlsx\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $handle = fopen('php://output', 'w');
        foreach ($data as $data) {
            fputcsv($handle, $data);
        }
            fclose($handle);
        exit;
    }
    
    public function saveArea() {
        if(is_uploaded_file($_FILES['fileURL']['tmp_name'])) {     
            $csvData = $this->csvreader->parse_csv($_FILES['fileURL']['tmp_name']);       
            //echo '<pre>'; print_r($csvData); die;
           if(!empty($csvData)){
               $k = 1;
                foreach($csvData as $element){   
                    $name_make =   $element['Country'];
                    $name_model =   $element['City'];
                    if($name_make != '' && $name_model != '')
                    {
                        $country_id = $this->db->get_where(db_prefix().'country', array('name' => $name_make))->row('id');
                        if($country_id)
                        {
                            $yeardata['country_id'] = $country_id;
                        }
                        else
                        {
                            $data_['name'] = $name_make;
                            $this->db->insert(db_prefix() . 'country', $data_);
                            $makelid = $this->db->insert_id();
                            $yeardata['country_id'] = $makelid;
                            $name_make = '';
                            $data_ = '';
                        }
                        $city_id = $this->db->get_where(db_prefix().'city', array('name' => $name_model))->row('id');
                        if($city_id)
                        {
                            $yeardata['city_id'] = $city_id;
                        }
                        else
                        {
                            $datamodel_['country_id'] = $yeardata['country_id'];
                            $datamodel_['name'] = $name_model;
                            $this->db->insert(db_prefix() . 'city', $datamodel_);
                            $modellid = $this->db->insert_id();
                            $yeardata['city_id'] = $modellid;
                            $name_model = '';
                            $datamodel_ = '';
                        }
                        $yeardata['name'] = $element['Area'];
                        //$areaid = '';
                        $areaid.$k = $this->db->get_where(db_prefix().'area', array('name' => $yeardata['name']))->row('id');
                        if($areaid.$k == '')
                        {
                            $this->db->insert(db_prefix() . 'area', $yeardata);
                            //$yeardata[] = ''; 
                            //$areaid = '';
                        }
                    }
                    $k++;
                }
                set_alert('success', _l('Data are stored successful!'));
            }
            else
            {
                set_alert('warning', _l('File is required'));
            }
        }
        else
        {
            set_alert('warning', _l('File is required'));
        } 
        redirect(admin_url('country'));
    }
    
    // export Data
    public function sampledataArea() {
        $storData = array();
        $data[] = array('country_id' => 'Country', 'city_id' => 'State', 'name' => 'City');       
        
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"xlsx-sample-area".".xlsx\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $handle = fopen('php://output', 'w');
        foreach ($data as $data) {
            fputcsv($handle, $data);
        }
            fclose($handle);
        exit;
    }

    /* Delete article from database */
    public function delete_Country($id)
    {
        if (!has_permission('master', '', 'delete')) {
            access_denied('master');
        }
        if (!$id) {
            redirect(admin_url('country'));
        }
        $response = $this->location_model->delete_Country($id);
        if ($response == true) {
            
            $this->db->where('country_id', $id);
            $this->db->delete(db_prefix().'city');
            
            $this->db->where('country_id', $id);
            $this->db->delete(db_prefix().'area');
            
            $this->db->where('country_id', $id);
            $this->db->delete(db_prefix().'area_new');
            
            $this->db->where('country_id', $id);
            $this->db->delete(db_prefix().'area_pincode');
            
            set_alert('success', _l('deleted', _l('Country')));
        } else {
            set_alert('warning', _l('problem_deleting', _l('Country')));
        }
        redirect(admin_url('country'));
    }
    
    /* Delete article from database */
    public function delete_City($id)
    {
        if (!has_permission('master', '', 'delete')) {
            access_denied('master');
        }
        if (!$id) {
            redirect(admin_url('country'));
        }
        $response = $this->location_model->delete_City($id);
        if ($response == true) {
            set_alert('success', _l('deleted', _l('State')));
        } else {
            set_alert('warning', _l('problem_deleting', _l('State')));
        }
        redirect(admin_url('country#countrymodel'));
    }
    /* Delete article from database */
    public function delete_Area($id)
    {
        if (!has_permission('master', '', 'delete')) {
            access_denied('master');
        }
        if (!$id) {
            redirect(admin_url('country'));
        }
        $response = $this->location_model->delete_Area($id);
        if ($response == true) {
            set_alert('success', _l('deleted', _l('City')));
        } else {
            set_alert('warning', _l('problem_deleting', _l('City')));
        }
        redirect(admin_url('country#countryyear'));
    }
}
