<?php
namespace app\mpanel\controller;

class Tools{
    static public function size_to_string($size) {
        $string = '0KB';
        if($size >= pow(1024, 4)) {
            $string = round($size, pow(1024, 4)) . 'TB';
        } else if($size >= pow(1024, 3)) {
            $string = round($size, pow(1024, 3)) . 'GB';
        } else if($size >= pow(1024, 2)) {
            $string = round($size, pow(1024, 2)) . 'MB';
        } else if($size >= 1024) {
            $string = round($size, 1024) . 'KB';
        }
        return $string;
    }
    
    static public function string_to_size($string) {
        $size = 0;
        $num = substr($string, 0, -2);
        $unit = substr($string, -2);
        
        switch($unit) {
            case 'KB':
                $size = $num * 1024;
                break;
            case 'MB':
                $size = $num * pow(1024, 2);
                break;
            case 'GB':
                $size = $num * pow(1024, 3);
                break;
            case 'PB':
                $size = $num * pow(1024, 4);
                break;
        }
        
        return $size;
    }
    
    static function rand_string($length = 5, $ex = "") { 
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' . $ex; 
        $string = ''; 
        for ($i = 0; $i < $length; $i++) { 
            $string .= $chars[rand(0, strlen($chars) - 1)]; 
        } 
        return $string; 
    }
    
    
    static public function real_ip(){ 
        //from https://www.ctolib.com/topics-88500.html    
        static $realip = NULL;  
       
        if ($realip !== NULL){  
            return $realip;  
        }  
       
        if (isset($_SERVER)){  
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){  
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);  
                /* 取X-Forwarded-For中第一个非unknown的有效IP字符串 */  
                foreach ($arr AS $ip){  
                    $ip = trim($ip);  
                    if ($ip != 'unknown'){  
                        $realip = $ip;  
                        break;  
                    }  
                }  
            }  
            elseif (isset($_SERVER['HTTP_CLIENT_IP'])){  
                $realip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
            else{  
                if (isset($_SERVER['REMOTE_ADDR'])){  
                    $realip = $_SERVER['REMOTE_ADDR'];  
                }  
                else{  
                    $realip = '0.0.0.0';  
                }  
            }  
        }  
        else{  
            if (getenv('HTTP_X_FORWARDED_FOR')){  
                $realip = getenv('HTTP_X_FORWARDED_FOR');  
            }  
            elseif (getenv('HTTP_CLIENT_IP')){  
                $realip = getenv('HTTP_CLIENT_IP');  
            }  
            else{  
                $realip = getenv('REMOTE_ADDR');  
            }  
        }  
       
        preg_match("/[\d\.]{7,15}/", $realip, $onlineip);  
        $realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';  
       
        return $realip;  
    }
}
