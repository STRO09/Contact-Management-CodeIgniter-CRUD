<?php

class Sagarcontroller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("sagarmodel");
        $this->load->helper("url");
        $this->load->library("pagination");
    }
    public function index($offset = 0)
    {
        $this->pagination->initialize([
            "base_url" => base_url("index.php/Sagarcontroller/index"),
            "total_rows" => $this->sagarmodel->count_contacts(),
            "per_page" => 10,
            "uri_segment" => 3,
            // Bootstrap styling
            "full_tag_open" => '<ul class="pagination">',
            "full_tag_close" => "</ul>",
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "next_tag_open" => "<li>",
            "next_tag_close" => "</li>",
            "prev_tag_open" => "<li>",
            "prev_tag_close" => "</li>",
            "cur_tag_open" => '<li class="active"><a href="#">',
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>",
        ]);
        // Fetch limited records
        $contacts = $this->sagarmodel->get_limited_contacts(10, $offset);
        // Generate links
        $links = $this->pagination->create_links();
        $this->load->view("SagarView", [
            "contacts" => $contacts,
            "links" => $links,
        ]);
    }
    public function insertForm()
    {
        // Define rules for each field
        $this->form_validation->set_rules(
            "contactno",
            "Contact Number",
            "required|exact_length[10]|numeric|is_unique[contacts.contactno]",
            [
                "required" => "Contact number is required",
                "exact_length" => "Contact number must be exactly 10 digits",
                "numeric" => "Contact number must contain only digits",
                "is_unique" => "Duplicate entry",
            ]
        );
        $this->form_validation->set_rules(
            "contactname",
            "Contact Name",
            "required",
            ["required" => "Contact name is required"]
        );
        $this->form_validation->set_rules(
            "address",
            "Address",
            // "max_length[255]"
        );

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata("failure", "Duplicate entry");
            $this->load->view("addcontacts");
        } else {
            $data = [
                "contactno" => $this->input->post("contactno"),
                "contactname" => $this->input->post("contactname"),
                "address" => $this->input->post("address"),
            ];
            if ($this->sagarmodel->insertData($data)) {
                $this->session->set_flashdata(
                    "success",
                    "Contact Added successfully."
                );
            } else {
                $this->session->set_flashdata(
                    "failure",
                    "Contact Insertion Failed."
                );
            }
            redirect("Sagarcontroller");
        }
    }
    public function insertMultiple()
    {
        $data = $this->input->post("contacts"); 
        if (!empty($data)) {
            $this->sagarmodel->insertMultiple($data);
            $this->session->set_flashdata(
                "success",
                "All Contacts Added successfully."
            );
            $this->session->unset_userdata('csv_data');
        }
        redirect("Sagarcontroller", "refresh");
    }
    public function editForm($id)
    {
        $data = $this->sagarmodel->getById($id);
        $this->load->view("editForm", ["data" => $data]);
    }
    public function update()
    {
        $data = [
            "contactno" => $this->input->post("contactno"),
            "contactname" => $this->input->post("contactname"),
            "address" => $this->input->post("address"),
        ];
        $id = $this->input->post("id");
        $this->sagarmodel->updateData($data, $id);
        $this->session->set_flashdata(
            "success",
            "Contact updated successfully."
        );
        redirect("Sagarcontroller");
    }
    public function loadinsert()
    {
        $this->load->view("addcontacts");
    }
    public function delete($id)
    {
        $this->sagarmodel->deleteData($id);
        $this->session->set_flashdata(
            "success",
            "Contact Deleted successfully."
        );
        redirect("Sagarcontroller", "refresh");
    }
    public function getSingle()
    {
        $contactname = $this->input->post("contactname");
        $contact = $this->sagarmodel->getByName($contactname);
        $this->load->view("SingleView", ["contact" => $contact]);
    }
    public function uploadCSV()
    {
        $this->load->view("uploadCSV");
    }
public function previewCSV($offset = 0)
{
    // If a file was uploaded, parse and store in session
    if (isset($_FILES["csvfile"]["name"])) {
        $file = fopen($_FILES["csvfile"]["tmp_name"], "r");
        $data = [];

        // Read first row
    $firstRow = fgetcsv($file);

    // Simple heuristic: check if first column is numeric (phone number)
    $isHeader = !is_numeric($firstRow[0]);

    if (!$isHeader) {
        // Treat first row as data
        $data[] = [
            "contactno"   => $firstRow[0],
            "contactname" => $firstRow[1],
            "address"     => $firstRow[2],
        ];
    }



        while (($row = fgetcsv($file)) !== false) {
            $data[] = [
                "contactno" => $row[0],
                "contactname" => $row[1],
                "address" => $row[2],
            ];
        }
        fclose($file);

        // Save parsed data in session
        $this->session->set_userdata('csv_data', $data);
    }

    // Retrieve from session if no new upload
    $data = $this->session->userdata('csv_data');
    if (empty($data)) {
        // No data available, redirect back to upload page
        redirect('Sagarcontroller/uploadCSV');
    }

    // Pagination setup
    $per_page = 10;
    $this->load->library('pagination');
    $config = [
        "base_url" => site_url("Sagarcontroller/previewCSV"),
        "total_rows" => count($data),
        "per_page" => $per_page,
        "uri_segment" => 3,
        "full_tag_open" => '<ul class="pagination">',
        "full_tag_close" => "</ul>",
        "cur_tag_open" => '<li class="active"><a href="#">',
        "cur_tag_close" => "</a></li>",
        "num_tag_open" => "<li>",
        "num_tag_close" => "</li>",
        "next_tag_open" => "<li>",
        "next_tag_close" => "</li>",
        "prev_tag_open" => "<li>",
        "prev_tag_close" => "</li>",
    ];
    $this->pagination->initialize($config);

    // Slice array for current page
    $pagedData = array_slice($data, $offset, $per_page);

    $links = $this->pagination->create_links();

    $this->load->view("previewCSV", [
        "contacts" => $pagedData,
        "links" => $links,
        "allContacts" => $data // keep full data for hidden inputs
    ]);
}

    public function bulk_delete()
    {
        $ids = $this->input->post("ids");
        if (!empty($ids)) {
            $this->sagarmodel->BulkDeleteData($ids);
            $this->session->set_flashdata(
                "success",
                "Selected contacts deleted successfully."
            );
        } else {
            $this->session->set_flashdata("error", "No contacts selected.");
        }
       
        redirect("Sagarcontroller");
    }


    public function guzzle() {
                // Initialize Guzzle client
        $client = new Client([
            'base_uri' => 'http://10.10.15.140:5050/',
            'timeout'  => 5.0, // optional timeout
        ]);

        try {
            // Perform GET request
            $response = $client->request('GET', '/');

            // Get response body
            $body = $response->getBody()->getContents();

            // Pass data to view or echo directly
            echo $body;

        } catch (RequestException $e) {
            // Handle errors gracefully
            if ($e->hasResponse()) {
                $errorBody = $e->getResponse()->getBody()->getContents();
                log_message('error', 'API error: ' . $errorBody);
                echo "API returned an error: " . $errorBody;
            } else {
                log_message('error', 'Request failed: ' . $e->getMessage());
                echo "Request failed: " . $e->getMessage();
            }
        }
    }



    public function deleteAll () {
        $this -> sagarmodel -> deleteAll();
          $this->session->set_flashdata(
                "success",
                "All contacts deleted successfully."
            );
        redirect('Sagarcontroller','refresh');
    }
}
?>
