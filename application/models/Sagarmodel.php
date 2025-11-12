<?php
class Sagarmodel extends CI_Model {

public function get_all () {
return $this -> db -> get('contacts')-> result_array();
}

public function getData($id) {
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
}
?>