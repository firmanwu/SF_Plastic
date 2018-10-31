<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materials extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('materials.php',(array)$output);
	}

	public function materials_management()
	{
		try{
                        $crud = new grocery_CRUD();

                        $crud->set_theme('bootstrap-v4');
						//$crud->set_table('recipe');
						$crud->set_table('material');
						$crud->set_subject('原料');
                        $crud->display_as('label', '原料');
                        $crud->display_as('order', '順序');

						$output = $crud->render();

						$this->_example_output($output);

                }catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
                }
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

}
