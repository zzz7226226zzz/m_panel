<?php
namespace app\mpanel\controller;
use think\Controller;
use Config;
use app\index\User;

class Index extends Controller {
    protected $middleware = ['app\mpanel\middleware\Auth'];
    
    public function index() {
        echo "islogin";
    }
}
