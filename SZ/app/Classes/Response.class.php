<?php
    namespace App\Classes;

    use Illuminate\Support\Facades\Input;

    class Response{
        //Error Information
        private $success = true;
        private $error_message = '';
        private $error_code = '';

        //Response information
        private $response_type = '';
        private $format = 'json';
        private $data = [];
        private $data_root = 'data';
        private $total_elements = 0;

        //construct

        public function __construct(){
            if(Input::get("format") != ""){
                $this->setFormat(Input::get("format"));
            }
        }

        //Set format

        public function setFormat($f){
            $this->format = strtolower($f);
        }

        //Set the errors
        public function setError($code,$message){
            $this   ->  success         =   false;
            $this   ->  error_message   =   $message;
            $this   ->  error_code      =   $code;
        }

        //Set the data
        public function setData($d){
            $this->data = $d;
        }

        //Set the data root
        public function setDataRoot($r){
            $this->data_root = $r;
        }

        //Set total elements
        public function setTotalElements($t){
            $this->total_elements = $t;
        }

        //Get the response
        //The default option is the JSON format
        public function getResponse(){
            switch($this->format){
                case 'json':
                    $this->response_type = 'application/json';
                    return $this -> getJSON();
                    break;
                case 'xml':
                    $this->response_type = 'text/xml';
                    return $this -> getXML();
                    break;
                default:
                    $this->response_type = 'application/json';
                    return $this -> getJSON();
                    break;
            }
        }

        //Return the response type
        public function getResponseType(){
            return $this->response_type;
        }

        // Get the response in JSON format
        private function getJSON(){
                return json_encode($this->getResponseStructure());
        }

        private function getXML(){
            $xml = new \SimpleXMLElement('<root/>');
            $response = $this->getResponseStructure();

            $this->array2XML($xml, $response);
            return $xml->asXML();
        }

        //This will work with all responses. Should work for json as well as xml.
        private function getResponseStructure(){
            $success = [];
            if($this->success == false){
                //WE have to show the error
                $success = [];
                $success["success"] = $this->success;
                $success["error_code"] = $this -> error_code;
                $success["error_msg"] = $this -> error_message;
            }else{

                $success = [];
                $success["success"] = $this->success;
                if($this->total_elements > 0){
                    $success["total_elements"] = $this->total_elements;
                }
                $success[$this->data_root] = $this->data;
            }
            return $success;
        }


        private function array2XML($obj, $array,$r = 'item'){
            foreach ($array as $key => $value){
                if(is_numeric($key)) $key = $r;
                if (is_array($value)) {
                    $node = $obj->addChild($key);
                    $this->array2XML($node, $value, $r);
                }elseif(is_object($value)){
                    $node = $obj->addChild($key);
                    $this->array2XML($node, (array)$value, $r);
                }else{
                        $obj->addChild($key, htmlspecialchars($value));
                }
            }
        }
    }

