<?php
namespace app\mpanel\controller;

class Call{
    static public function __callStatic($methodname, $arguments) {
        $action = explode('_', $methodname);
        if($action[1] == 'call') {
            return self::call($action[0], $arguments[0], $arguments[1]);
        } else {
            throw new Exception('No such function:' . $methodname . '.');
        }
    }
    
    static function call($method, $url, $data) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        $request = curl_exec($curl);
        curl_close($curl);
        return $process_request($request);
    }
    
    static function process_request($string) {
        var_dump($string);
    }
    
    static function parser($string) {
        $result = NULL;
        
        if(self::is_json($string)) {
            
        } else if(self::is_xml($string)) {
            
        } else {
            throw new Exception('Unknow request type.');
        }
        
        return $result;
    }
    
    static function is_json($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
    
    static function is_xml($string) {
        
    }
}
