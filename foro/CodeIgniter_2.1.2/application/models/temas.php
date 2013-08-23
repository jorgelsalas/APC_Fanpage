<?php

Class Temas extends CI_Model
{
  function getTemasForo()
  {
    $this->db->select('id, nombre, email, titulo, tema');
    $this->db->from('temas_foro');
    $query = $this->db->get();
	
	//$query = $this->db->get('temas_foro');
    
	if ($query -> num_rows() == 0){
		return NULL;
	}
	else {
		return $query->result();
		//return $query->result_array();
		
	}
  }
  
  
  function getTema($id)
  {
    $this->db->select('nombre, email, titulo, tema');
    $this->db->from('temas_foro');
	$this->db->where('id',$id);
	//$this->db->where('');
    $query = $this->db->get();
	
    
	if ($query -> num_rows() == 0){
		return NULL;
	}
	else {
		return $query->result();
		//return $query->result_array();
		
	}
  }
  
  function getURLTema($id){
  	return site_url('welcome/ver_tema/'.$id);
  }
  
}

?>