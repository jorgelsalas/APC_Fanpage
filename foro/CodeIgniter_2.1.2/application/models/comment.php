<?php

Class Comment extends CI_Model
{
  function getCommentsDeTema($id)
  {
    $this->db->select('*');
    $this->db->from('comentarios');
	$this->db->where('id_tema',$id);
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
  
  function ingresarComment($id_tema, $nombre, $email, $comentario)
  {
    $data = array(
		'nombre' => $nombre,
		'email' => $email,
		'comentario' => $comentario,
		'id_tema' => $id_tema
	);
	
	$this->db->insert('comentarios',$data);
	
	if ( $this->db->affected_rows() == 1){
		return TRUE;
	}
	else {
		return FALSE;
	}
  }
  
  function getEmailsDeTema($id){
  	$this->db->select('email');
	$this->db->distinct();
    $this->db->from('comentarios');
	$this->db->where('id_tema',$id);
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
  
}

?>