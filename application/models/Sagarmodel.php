<?php
class Sagarmodel extends CI_Model {

public function get_all () {
return $this -> db -> get('contacts')-> result_array();
}

public function get_limited_contacts($limit, $offset)
{
    return $this->db->get('contacts', $limit, $offset)->result_array();
}


public function getByName($contactname) {
return $this -> db -> get_where('contacts', ['contactname'=> $contactname]) -> row_array();
}


public function getById($id) {
return $this -> db -> get_where('contacts', ['id'=> $id]) -> row_array();
}

public function insertData($data) {
return $this -> db -> insert('contacts', $data);
}


public function DeleteData($id) {
return $this -> db -> delete('contacts', ['id'=> $id]);
}

public  function updateData($data, $id) {
return $this -> db -> where('id', $id)-> update('contacts', $data);
}

public function count_contacts()
{
    return $this->db->count_all('contacts');
}

public function insertMultiple($data) {
	return $this -> db -> insert_batch('contacts', $data);
}

public function BulkDeleteData($ids) {

	$this -> db -> where_in('id',$ids) ;
	return $this -> db -> delete('contacts');

}

}
?>