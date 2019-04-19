<?php
namespace app\mpanel\controller;

class File{
    static public function __callStatic($methodname, $arguments) {
        $action = explode('_', $methodname);
        if($action[1] == 'read') {
            $method = $action[0] . '2data';
            $str = file_get_contents($arguments)
            return self::$method($str);
        } else if($action[1] == 'write') {
            $method = 'data2' . $action[0];
            file_put_contents($arguments[0], self::$method($arguments[1]));
        } else {
            throw new Exception('No such function:' . $methodname . '.');
        }
    }
    
    static function json2data($str) {
        return json_decode($str);
    }
    
    static function data2json($data) {
        return json_encode($data);
    }
}
