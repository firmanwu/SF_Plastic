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

	function isJson($string) {
		json_decode($string);
		return (json_last_error() == JSON_ERROR_NONE);
	}

	public function reset_weight_file (){
		$file = 'assets/uploads/weight.txt';
		file_put_contents($file, "");
	}

	public function put_output(){
		//In this function we will retrieve the output from the windows software connected to the scale and save it into the temp file we use to communicate with the frontend
		//$data['weight'] = $_POST['weight'];


		echo "this is a put request\n";
    	parse_str(file_get_contents("php://input"),$post_vars);
    	var_dump($post_vars);
    	echo $post_vars['weight']." is the fruit\n";

		//$json_data = json_encode($data);
		//var_dump($json_data);

		//Now we copy the data into the file

	}

}
