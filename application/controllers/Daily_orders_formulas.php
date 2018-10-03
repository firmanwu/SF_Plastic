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

    public function getSerialNumber()
    {
        $this->load->helper('file');
        $this->load->helper('date');

        $dateString = '%Y%m%d';
        $time = time();
        $currentDate = mdate($dateString, $time);
        $fileName = 'OrderSN';
        if (TRUE == file_exists($fileName)) {
            $currentSerialNumber = read_file($fileName);
            if (FALSE == strstr($currentSerialNumber, $currentDate)) {
                $newSerialNumber = $currentDate . "001";
                write_file($fileName, $newSerialNumber);

                return $newSerialNumber;
            }
            else {
                return $currentSerialNumber;
            }
        }
        else {
            $newSerialNumber = $currentDate . "001";
            write_file($fileName, $newSerialNumber);

            return $newSerialNumber;
        }
    }

    public function increaseSerialNumber()
    {
        $this->load->helper('file');
        $this->load->helper('date');

        $dateString = '%Y%m%d';
        $time = time();
        $currentDate = mdate($dateString, $time);
        $fileName = 'OrderSN';
        if (TRUE == file_exists($fileName)) {
            $currentSerialNumber = read_file($fileName);
            if (FALSE == strstr($currentSerialNumber, $currentDate)) {
                $newSerialNumber = $currentDate . "001";
            }
            else {
                $number = str_replace($currentDate, '', $currentSerialNumber);
                $number = (int)$number + 1;
                $length = strlen($number);
                if (3 >= $length) {
                    for($i = 0; $i < (3 - $length); $i++)
                    {
                        $number = '0' . $number;
                    }
                }
                else {
                    $number = '0' . $number;
                }
                $newSerialNumber = $currentDate . $number;
            }
            write_file($fileName, $newSerialNumber);
        }
        else {
            $newSerialNumber = $currentDate . "001";
            write_file($fileName, $newSerialNumber);
        }
    }

    public function daily_orders_formulas_management()
    {
        try{
                $crud = new grocery_CRUD();

                $crud->set_theme('bootstrap-v4');
                $crud->set_table('formula_daily_order');
                $crud->set_subject('生產排程');
                $crud->set_relation('formula_id', "formula",'name');
                $crud->add_action('Process','','check_materials','el el-qrcode');
                $crud->display_as('order_id', '排程單編號');
                $crud->display_as('formula_id', '配方名稱');
                $crud->display_as('materialCheck', '備料確認');
                $crud->display_as('date', '預定生產日期');
                $crud->display_as('producedAmount', '爐數');
                $crud->required_fields('order_id', 'formula_id', 'date', 'producedAmount');

                $crud->callback_add_field('order_id', function() {
                    $datetime = $this->getSerialNumber();
                    return '<input id="field-order_id" class="form-control" name="order_id" type="text" value=' . $datetime . ' maxlength="255" readonly="yes" />';
                });
                $crud->callback_after_insert(array($this, 'increaseSerialNumber'));

                $output = $crud->render();
                $this->_example_output($output);

        } catch(Exception $e){
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
