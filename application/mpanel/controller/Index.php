<?php
namespace app\mpanel\controller;
use think\Controller;
use Config;
use app\mpanel\controller\User;

class Index extends Controller {
    protected $middleware = ['app\mpanel\middleware\Auth'];
    
    public function __construct() {
        parent::__construct();
        $this->assign('sitename', config('mppdef.sitename'));
        $this->assign('invite', User::invite_user());
    }
    
    public function index() {
        return $this->fetch();
    }
    
    public function node_manage() {
        return $this->fetch();
    }
}
