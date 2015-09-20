<?php
/**
 * @author Alexandre A. B. Simão <alexandre.b.sima0@gmail.com>
 */

class Recados_model extends CI_model{

	function __construct(){
		$this->load->database();
	}

	/**
	 * Efetua a busca dos recados no banco de dados utilizando Active Records
	 * recebe um parametro opcional para efetuar uma busca especifica no BD 
	 * é o mesmo que:
	 * 
	 * SELECT * FROM recados
	 * 	WHERE aprovado = 1
	 * 
	 * @param type $where 
	 * @return type
	 */
	public function get_all( $where = array(), $like = array(), $per_page = 0, $offset = 0){
		if( $where )
			$this->db->where( $where );

		if( $like )
			$this->db->like( $like );

		if( $per_page )
			$this->db->limit( $per_page, $offset );

		return $this->db->get( 'recados' )
				 		->result();
	}

	public function get_row(){

	}

	/**
	 * Efetua a inserção de recados via Active Records
	 * é o mesmo que
	 * 
	 * INSERT INTO recados ('nome', 'email', 'titulo', 'texto', 'aprovado', 'data_envio') 
	 *   VALUES ('João', 'joao@joao.com.br', 'Recado de Teste', 'Este é um recado de teste. Verificando a nova funcionalidade!', '0', '2015-09-20 11:20:18');	 
	 * 
	 * @param type $data 
	 * @return int $this->db->affected_rows()
	 */
	public function insert( $data ){
		$this->db->insert( 'recados', $data );
		return $this->db->affected_rows();
	}

	/**
	 * Efetua a atualização de recados via Active Records
	 * é o mesmo que
	 * 
	 * UPDATE recados SET ('aprovado') VALUES ('1')
	 * 	WHERE id = 1
	 * 
	 * @param type $data 
	 * @param type $where 
	 * @return int $this->db->affected_rows()
	 */
	public function update( $data, $where ){
		$this->db->where( $where );
		$this->db->update( 'recados', $data );
		return $this->db->affected_rows();
	}

	/**
	 * Efetua a remoção de recados via Active Records
	 * é o mesmo que
	 * 
	 * DELETE FROM recados
	 * 	WHERE id = 1
	 * 
	 * @param type $where 
	 * @return int $this->db->affected_rows()
	 */
	public function delete( $where ){
		$this->db->where( $where );
		$this->db->delete( 'recados' );
		return $this->db->affected_rows();
	}
}