<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scale extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
	}

	public function get_output()
	{
		try{
				$file = 'assets/uploads/weight.txt';
				$final_json = "";
				if (file_exists($file)) {
				    $filesize = filesize($file);
				    if ($filesize > 0){
				    	//echo "The size of your file is $filesize bytes.";
				    	$fichero = file_get_contents($file, FILE_USE_INCLUDE_PATH);  
				    	if (preg_match_all('/{\K[^}]*(?=})/m', $fichero, $m)) {
						    $final_json= "{".$m[0][0]."}";
						    //echo nl2br("\r\n FINAL JSON: $final_json"); 
						    $is_json = self::isJson($final_json);
						    if ($is_json) {
						    	//echo nl2br("\r\nIT IS A JSON STRING");
						    	//$return["json"] = json_encode($final_json);
						    	echo $final_json; 
						    }
						    else{
						    	//echo nl2br("\r\nIT IS NOT A JSON STRING");
						    	$final_string = "Error: Not JSON format";  
						    	$return["json"] = $final_json;
  								echo $return; 
						    }
						} else {
							$final_string = "Error: Not JSON format";
						   	$return["json"] = $final_json;
  							echo $return; 
						}    
				    }
				} else {
					echo 0;      
				}

	        }catch(Exception $e){
	                show_error($e->getMessage().' --- '.$e->getTraceAsString());
	        }
	}

	public function isJson($string) {
		json_decode($string);
		return (json_last_error() == JSON_ERROR_NONE);
	}

	public function reset_weight_file (){
		$file = 'assets/uploads/weight.txt';
		file_put_contents($file, "");
	}

	public function put_output(){
		//In this function we will retrieve the output from the windows software connected to the scale and save it into the temp file we use to communicate with the frontend
    	parse_str(file_get_contents("php://input"),$post_vars);
    	$is_number = is_numeric($post_vars['weight']);
    	if ($is_number){
    		self::generate_weight_file($post_vars['weight']);
    		echo "200 OK";
    	} else {
    		echo "400 Bad Request: scale output received is not numeric";
    	}

	}

	public function generate_weight_file($weight){
		$scale_output=$weight;
		$json_string='{"weight":"'.$scale_output.'"}';
		$file = 'assets/uploads/weight.txt';
		file_put_contents($file, $json_string);
	}
}
