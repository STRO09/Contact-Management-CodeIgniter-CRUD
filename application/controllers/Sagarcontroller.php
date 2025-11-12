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
            "Contact" => $this->input->post('contactno'),
            "Name" => $this->input->post('contactname'),
            "Address" => $this->input->post('address')
        ];
        $this->sagarmodel->insertData($data);
        redirect('sagarcontroller');
    }


    public function editForm($id)
    {
        $data = [
            "Contact" => $this->input->post('contactno'),
            "Name" => $this->input->post('contactname'),
            "Address" => $this->input->post('address')
        ];
        $this->sagarmodel->updateData($data, $id);
    }
}
?>