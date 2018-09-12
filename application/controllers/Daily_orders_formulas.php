<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daily_orders_formulas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('daily_orders_formulas.php',(array)$output);
	}

	public function daily_orders_formulas_management()
	{
		try{
                        $crud = new grocery_CRUD();

                        $crud->set_theme('bootstrap-v4');
						//$crud->set_table('recipe');
						$crud->set_table('formula_daily_order');
						$crud->set_subject('Daily Order/Formula');
						//$crud->unset_fields('unit_id');
						$crud->set_relation('order_id', "daily_order",'label');
						$crud->set_relation('formula_id', "formula",'name');
						$crud->add_action('Process','','bootstrap','el el-qrcode');
						$crud->add_action('Process','','','el el-qrcode', array($this, 'prepare_materials'));
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

	public function prepare_materials($key, $row){
		return site_url('bootstrap?material_id='.$key);
	}

}