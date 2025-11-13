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
        $data = $this -> sagarmodel -> getById($id);
        $this->load->view('editForm',['data'=> $data]);
    }

    public function update() {

        $data = [
            "contactno" => $this->input->post('contactno'),
            "contactname" => $this->input->post('contactname'),
            "address" => $this->input->post('address')
        ];
        $id =  $this -> input -> post('id');
        $this->sagarmodel->updateData($data, $id);
        redirect('Sagarcontroller');
    }


    public function loadinsert() {
        $this -> load -> view('addcontacts');
    }

    public function delete($id){
        $this -> sagarmodel -> deleteData($id);
        redirect('Sagarcontroller','refresh');
    }


    public function getSingle() {
        $contactname  = $this -> input -> post('contactname');
        $contact = $this -> sagarmodel -> getByName($contactname);

        $this -> load -> view('SingleView', ['contact'=> $contact]);
    }

}
?>