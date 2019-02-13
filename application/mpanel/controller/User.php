<?php
namespace app\mpanel\controller;
use think\Controller;
use think\facade\Request;
use think\facade\Validate;
use think\facade\Cookie;
use think\facade\Session;
use app\mpanel\model\User as UserModel;
use app\mpanel\controller\Code;
use app\mpanel\controller\Tools;

class User extends Controller {
    public function login() {
        return $this->fetch();
    }
    
    public function signup() {
        return $this->fetch();
    }
    
    public function verify_account() {
        $user = UserModel::where('name', Request::param()['username'])->find();
        if($user != NULL && password_verify(Request::param()['password'], $user->pass)) {
            $this->set_login($user);
            return 'LOL';
        } else {
            return 'WRONG USERNAME OR PASSWORD';
        }
    }
    
    public function register() {
        $user = new UserModel();
        $user->code = Request::param()['code'];
        $code_controller = new Code();
        $code = $code_controller->validation($user->code);
        if(empty($code) || !$code->enable) {
           return 'CODE: INVALID CODE';
        }
        if(UserModel::where('name', Request::param()['username'])->find() != NULL) {
            return 'USERNAME: ALREADY EXISTS';
        }
        if(!Validate::checkRule(Request::param()['username'],'require|alphaDash|length:1,25')) {
            return 'USERNAME: INCORRECT CHARACTERS';
        }
        $user->name = Request::param()['username'];
        if(!Validate::checkRule(Request::param()['password'],'require|alphaDash|length:1,25')) {
            return 'PASSWORD: INCORRECT CHARACTERS';
        }
        $user->pass = password_hash(Request::param()['password'], PASSWORD_BCRYPT);
        $user->passwd = Tools::rand_string(6);
        $user->port = rand(config('mppdef.port_min'), config('mppdef.port_max'));
        $user->transfer_enable = Tools::string_to_size(config('mppdef.transfer_enable'));
        $user->method = config('mppdef.method');
        $user->protocol = config('mppdef.protocol');
        $user->protocol_param = config('mppdef.protocol_param');
        $user->obfs = config('mppdef.obfs');
        $user->obfs_param = config('mppdef.obfs_param');
        $user->code_head = config('mppdef.code_head');
        $user->reg_date = time();
        $user->reg_ip = Tools::real_ip();;
        $user->reg_code = $code->code;
        $user->reg_by = $code->author;
        if($user->save()) {
            $code_controller->discard($user->code);
            $this->set_login($user);
            return 'LOL';
        } else {
            return 'MPP: UNKNOW ERROR';
        }
    }
    
    private function set_login($user) {
        session(null);
        $token = Tools::rand_string(10);
        Cookie::set('token', $token , 86400);
        Session::set('token', $token);
        Session::set('user', $user->id);
        Session::set('invite', $user->reg_by);
    }
    
    static public function is_login() {
        return Session::has('token') && Cookie::has('token') && !empty(Session::get('token')) && cookie('token') == session('token');
    }
    
    static public function invite_user() {
        return Session::get('invite');
    }
}
