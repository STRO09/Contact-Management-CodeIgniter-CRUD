<?php

class Sagarcontroller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sagarmodel');
        $this->load->helper('url');
    }


    public function index()
    {
        $contacts = $this->sagarmodel->get_all();
        $this->load->view('SagarView', ['contacts' => $contacts]);
    }


    public function insertForm()
    {

        $data = [
            "contactno" => $this->input->post('contactno'),
            "contactname" => $this->input->post('contactname'),
            "address" => $this->input->post('address')
        ];
        $this->sagarmodel->insertData($data);
        redirect('Sagarcontroller');
    }


    public function editForm($id)
    {
        $data = [
            "contactno" => $this->input->post('contactno'),
            "contactname" => $this->input->post('contactname'),
            "address" => $this->input->post('address')
        ];
        $this->load->view('editForm', $data);
    }

    public function update() {

        $data = [
            "contactno" => $this->input->post('contactno'),
            "contactname" => $this->input->post('contactname'),
            "address" => $this->input->post('address')
        ];
        $this->sagarmodel->updateData($data, $this -> input -> post('$id'));
        redirect('Sagarcontroller');
    }

    public functiom delete($id){
        $this -> sagarmodel -> deleteData($id);
        redirect('Sagarcontroller','refresh');
    }
}
?>