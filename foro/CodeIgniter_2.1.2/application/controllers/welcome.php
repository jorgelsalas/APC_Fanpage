<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('temas','',TRUE);   
		$this->load->model('comment','',TRUE);
		//$this->load->library('email');
 
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$result = $this->temas->getTemasForo();
		$resultados['result'] = $result;
		$this->load->view('foro', $resultados);
		
	}
	
	public function agregar_tema()
	{
		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');
		$titulo = $this->input->post('titulo');
		$tema = $this->input->post('tema');
		
		$data = array(
			'nombre' => $nombre,
			'email' => $email,
			'titulo' => $titulo,
			'tema' => $tema
		);
		
		
		$this->db->insert('temas_foro',$data);
		
		$result = $this->temas->getTemasForo();
		$resultados['result'] = $result;
		$this->load->view('foro', $resultados);
	}
	
	public function ver_tema($id){
		$result = $this->temas->getTema($id);
		$resultados['result'] = $result;
		
		$result2 = $this->comment->getCommentsDeTema($id);
		$resultados['result2'] = $result2;
		
		$resultados['id'] = $id;
		
		$this->load->view('tema', $resultados);
	}
	
	public function agregar_comentario($id_tema){
		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');
		$comentario = $this->input->post('comentario');
		
		
		$insercion = $this->comment->ingresarComment($id_tema, $nombre, $email, $comentario);
		if ($insercion){
			
			$url = $this->temas->getURLTema($id_tema);
			
			$emailCreador = '';
			$tituloTema = '';
			$nombreCreador = '';
			
			$temaComentado = $this->temas->getTema($id_tema);
			
			foreach ($temaComentado as $row) {
				$emailCreador = $emailCreador . $row->email;
				$tituloTema = $tituloTema . $row->titulo;
				$nombreCreador = $nombreCreador . $row->nombre;
			}
			
			$lista = $this->comment->getEmailsDeTema($id_tema);
			$string = "";
			foreach ($lista as $row) {
				$string = $string . $row->email . ', ';
			}
			
			$dummy = $string;
			
			//Verifica si el creador del tema debe ser agregado a la lista de correos
			if (strcmp($emailCreador, $email) != 0){
				if (substr_count($string, $emailCreador) < 1){
					$string = $string . $emailCreador . ', ';
				}
			}
			
			$dummy2 = $string;
			
			//Verifica si debe eliminar la direccion del creador del comentario que se 
			//esta insertando de la lista de correos
			if (substr_count($string, $email) > 0){
				$posicion = strpos($string, $email);
				$string = substr_replace($string, '', $posicion, strlen($email) + 2);
			}
			
			$dummy3 = $string;
			
			if (strlen ($string) > 0){
				$string = substr($string, 0, -2);
			}
			
			$dummy4 = $string;
			
			if (strlen($string) > 0) {
				$this->load->library('email');
	            
				$config['protocol'] = "smtp";
				$config['smtp_host'] = "ssl://smtp.googlemail.com";
				$config['smtp_port'] = "465";
				$config['smtp_user'] = "prueba.lab8@gmail.com"; 
				$config['smtp_pass'] = "prueba.lab8";
				$config['charset'] = "utf-8";
				$config['mailtype'] = "html";
				$config['newline'] = "\r\n";
				
				$this->email->initialize($config);        
				        
				$this->email->from('prueba.lab8@gmail.com', 'A PERFECT CIRCLE FAN PAGE');
				
				$this->email->to($string);
				
				//$this->email->to("jorgesalch@yahoo.com");
				
				$this->email->subject('Notificación del foro');
				
				$mailBody = "";
				$mailBody = $mailBody . 'Se ha realizado un comentario en uno de los temas en los que ud. se encuentra participando.' . "<br/> <br/>";
				$mailBody = $mailBody . 'Datos del creador del tema:' .  "<br/>" . 'Nombre: ' . $nombreCreador . "<br/>";
				$mailBody = $mailBody . 'Email: ' . $emailCreador . "<br/>";
				$mailBody = $mailBody . 'Titulo del tema: ' . $tituloTema . "<br/> <br/>";
				$mailBody = $mailBody . 'Comentario: ' . $comentario . "<br/> <br/>";
				$mailBody = $mailBody . 'Puede observar el thread del tema en el siguiente URL: '. "<br/> <br/>";
				$mailBody = $mailBody . $url;
				//$mailBody = $mailBody . "<br/> <br/> El dummy contiene: " . $dummy;
				//$mailBody = $mailBody . "<br/> <br/> El dummy2 contiene: " . $dummy2;
				//$mailBody = $mailBody . "<br/> <br/> El dummy3 contiene: " . $dummy3;
				//$mailBody = $mailBody . "<br/> <br/> El dummy4 contiene: " . $dummy4;
				
				$this->email->message($mailBody);
				
				
				$this->email->set_alt_message(strip_tags('<h1>TEXT MSG<h1>')); 
				        
				if ( ! $this->email->send())
				{
					show_error($this->email->print_debugger());
				} else {
					$this->ver_tema($id_tema);
				}
			}
			else {
				$this->ver_tema($id_tema);
			}

				  
			
		}
		else{
			
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */