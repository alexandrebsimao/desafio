<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @controller Recados
 * Controller responsável por efetuar as operações de recados
 * @author Alexandre A. B. Simão <alexandre.b.simao@gmail.com>
 * 
 */
class Recados extends CI_Controller {
	
	private $_layout = 'layout';

	/**
	 * Método construtor
	 * @return void
	 */
	function __construct(){
		parent::__construct();

		$this->load->model('Recados_model');
		$this->load->helper('Date_helper');
		$this->load->library('pagination');
	}

	/**
	 * Método para exibição de todos os recados
	 * @param type $offset 
	 * @return void
	 */
	public function index( $offset = 0 ){
		$per_page = 5;

		$where 	= array();
		$like 	= array();

		$config['base_url'] 	= base_url() . 'recados/index/';
		$config['total_rows'] 	= count($this->Recados_model->get_all( $where, $like ));
		$config['per_page'] 	= $per_page;

		$this->pagination->initialize($config);

		$data['title']			= 'Todos os Recados';
		$data['page'] 			= 'recados/index';
		$data['recados']		= $this->Recados_model->get_all( $where, $like, $per_page, $offset);
		$data['pagination'] 	= $this->pagination->create_links();

		$this->load->view( $this->_layout, $data );
	}

	/**
	 * Método para exibição de recados aprovados
	 * @param type $offset 
	 * @return void
	 */
	public function aprovados( $offset = 0 ){
		$per_page = 5;

		$where 	= array();
		$like 	= array();

		$where 					= array( 'aprovado' => '1' ); 

		if( $_SERVER['REQUEST_METHOD'] == 'POST' )
			$like['data_envio'] = date2bd($_POST['data'], 'Y-m-d');

		$config['base_url'] 	= base_url() . 'recados/index/';
		$config['total_rows'] 	= count($this->Recados_model->get_all( $where, $like ));
		$config['per_page'] 	= $per_page;

		$this->pagination->initialize($config);

		$data['title']			= 'Recados Aprovados';
		$data['page'] 			= 'recados/aprovados';
		$data['recados']		= $this->Recados_model->get_all( $where, $like, $per_page, $offset );
		$data['pagination'] 	= $this->pagination->create_links();

		$this->load->view( $this->_layout, $data );
	}

	/**
	 * Método para cadastrar um novo recado
	 * @return void
	 */
	public function novo(){

		// Efetua a validação do formulario como campo obrigatorio e removendo tags
		$this->form_validation->set_rules('nome', 'Nome', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'E-mail', 'required|xss_clean');
		$this->form_validation->set_rules('titulo', 'Titulo', 'required|xss_clean');
		$this->form_validation->set_rules('texto', 'Texto', 'required|xss_clean');

		if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

			$data_insert = array(
				'nome'			=> $_POST['nome'],
				'email'			=> $_POST['email'],
				'titulo'		=> $_POST['titulo'],
				'texto'			=> $_POST['texto'],
				'data_envio' 	=> date('Y-m-d H:i:s'),
				'aprovado'		=> '0'
				);

			if( $this->Recados_model->insert( $data_insert ) ){
				$this->session->set_flashdata( 'alert', array( 'message' => 'Recado salvo com sucesso. Seu recado estará pendente a aprovação!', 'class' => 'alert-success' ) );
			}else{
				$this->session->set_flashdata( 'alert', array( 'message' => 'Houve um erro ao salvar recado!', 'class' => 'alert-danger' ) );
			}

			redirect( base_url() . 'recados' );

		}else{
			$data['title']		= 'Novo Recado';
			$data['page']		= 'recados/form';

			if( validation_errors() ){
				$data['alert'] = array(
					'message'	=> validation_errors(),
					'class'		=> 'alert-danger'
					);
			}

			$this->load->view( $this->_layout, $data );
		}
	}

	/**
	 * Método para aprovar recados via ajax
	 * Retorna em json
	 * @return void
	 */
	public function aprovar(){
		$id = $_POST['id'];

		$update_data = array(
			'aprovado' => '1'
			);

		$where_data = array(
			'id'	=> $id
			);

		if( $this->Recados_model->update( $update_data, $where_data ) ){
			
			$alert = array( 'status' => true, 'message' => 'O recado foi aprovado!', 'class' => 'alert-success' );
		}else{
			$alert = array( 'status' => false, 'message' => 'Houve um erro ao aprovar!', 'class' => 'alert-danger' );
		}	

		echo json_encode( $alert );
	}

	/**
	 * Método para remover recado
	 * @param type $id 
	 * @return void
	 */
	public function remover( $id ){
		$where = array( 'id' => $id );

		if( $this->Recados_model->delete( $where ) ){
			$this->session->set_flashdata( 'alert', array( 'message' => 'Recado removido com sucesso!', 'class' => 'alert-success' ) );
		}else{
			$this->session->set_flashdata( 'alert', array( 'message' => 'Houve um erro ao remover recado!', 'class' => 'alert-danger' ) );
		}

		redirect( base_url() . 'recados' );
	}

	/**
	 * Método para remover recado via ajax
	 * Retorna um json
	 * @return void
	 */
	public function remover_lista(){
		$where = array( 'id' => $_POST['id'] );

		if( $this->Recados_model->delete( $where ) ){
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}

	}
}
