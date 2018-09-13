<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formulas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('formulas.php',(array)$output);
	}

	public function formulas_management()
	{
		try{
                        $crud = new grocery_CRUD();

                        $crud->set_theme('bootstrap-v4');
						//$crud->set_table('recipe');
						$crud->set_table('formula');
						$crud->set_subject('配方');
                        $crud->display_as('name', '配方');
                        $crud->display_as('totalWeight', '總重量');
                        $crud->display_as('description', '描述');
                        $crud->display_as('instructions', '操作說明');
						//$crud->set_relation('ingredient_id', "recipe_ingredient",'label');
						//$crud->set_relation('recipe_id', "recipe",'name');
						//$crud->set_relation('ingredient_id', "ingredient",'label');

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
