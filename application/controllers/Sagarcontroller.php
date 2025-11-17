<?php

class Sagarcontroller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sagarmodel');
        $this->load->helper('url');
        $this->load->library('pagination');
     }


    public function index($offset = 0)
    {
        $this->pagination->initialize([
            'base_url'   => base_url('index.php/Sagarcontroller/index'),
            'total_rows' => $this->sagarmodel->count_contacts(),
            'per_page'   => 10,
            'uri_segment' => 3
        ]);

         // Fetch limited records
        $contacts = $this->sagarmodel -> get_limited_contacts(10, $offset);

        // Generate links
        $links = $this->pagination->create_links();

        $this->load->view('SagarView', ['contacts' => $contacts, 'links' => $links]);
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

    public function insertMultiple() {
        $data = $this->input->post('contacts'); // already array of arrays
        if (!empty($data)) {
            $this->sagarmodel->insertMultiple($data);
        }
        redirect('Sagarcontroller','refresh');
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

    public function uploadCSV()
    {
        $this->load->view('uploadCSV');
    }

    public function previewCSV()
    {
        if (isset($_FILES['csvfile']['name'])) {
            $file = fopen($_FILES['csvfile']['tmp_name'], "r");
            $data = [];

            $header = fgetcsv($file);
            while (($row = fgetcsv($file)) !== FALSE) {
                $data[] = [
                    'contactno'   => $row[0],
                    'contactname' => $row[1],
                    'address'     => $row[2]
                ];
            }
            fclose($file);

            $this->load->view('previewCSV', ['contacts' => $data]);
        }
    }

    // public function insertCSV() {
    //     $contacts = json_decode( $this->input->post('contacts')); // comes from hidden form field

    //     if (!empty($contacts)) {
    //         foreach ($contacts as $contact) {
    //             $this->sagarmodel->insertData($contact);
    //         }
    //     }
    //     redirect('Sagarcontroller');
    // }

}
?>