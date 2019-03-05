<?php
namespace app\mpanel\controller;
use think\Db;
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

    public function logout() {
        session(null);
        return redirect('mpanel/user/login');
    }
    
    public function change_password() {
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
        $codenum = Request::param()['code'];
        $code_controller = new Code();
        $code = $code_controller->validation($codenum);
        if(empty($code) || !$code->enable) {
           return 'CODE: INVALID CODE';
        }
        if(UserModel::where('name', Request::param()['username'])->find() != NULL) {
            return 'USERNAME: ALREADY EXISTS';
        }
        if(!Validate::checkRule(Request::param()['username'],'require|chsAlphaNum|length:1,25')) {
            return 'USERNAME: INCORRECT CHARACTERS';
        }
        $user->name = Request::param()['username'];
        if(!Validate::checkRule(Request::param()['password'],'require|chsAlphaNum|length:1,25')) {
            return 'PASSWORD: INCORRECT CHARACTERS';
        }
        $user->pass = password_hash(Request::param()['password'], PASSWORD_BCRYPT);
        $user->passwd = Tools::rand_string(6);
        do {
            $port = rand(config('mppdef.port_min'), config('mppdef.port_max'));
        } while(!empty(UserModel::where('port', $port)->find()));
        $user->port = $port;
        $user->transfer_enable = Tools::string_to_size(config('mppdef.transfer_enable'));
        $user->method = config('mppdef.method');
        $user->protocol = config('mppdef.protocol');
        $user->protocol_param = config('mppdef.protocol_param');
        $user->obfs = config('mppdef.obfs');
        $user->obfs_param = config('mppdef.obfs_param');
        $user->code_head = config('mppdef.code_head');
        $user->reg_date = time();
        $user->reg_ip = ip2long(Tools::real_ip());
        $user->reg_code = $codenum;
        $user->reg_by = $code->author;
        if($user->save()) {
            $code_controller->discard($codenum);
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
    }
    
    static public function is_login() {
        return Session::has('token') && Cookie::has('token') && !empty(Session::get('token')) && cookie('token') == session('token');
    }

    static public function fast_user() {
        return UserModel::where('id', Session::get('user'))->find();
    }

    static public function all() {
        return UserModel::where(1, 1);
    }    
    
    static public function one($id) {
        return UserModel::get($id);
    }

    public function back_update() {
        $error = [];
        if(UserModel::where('id', Request::param()['id'])->find()) {
            $user = UserModel::get(Request::param()['id']);
        } else {
            return '错误的用户id';
        }
        if(UserModel::where('port', Request::param()['port'])->find() && Request::param()['port'] != $user->port) {
            $error[] = ['key'=>'port', 'error'=>'该端口已被使用'];
        } else {
            $valistr = 'require|number|Between:' . config('mppdef.port_min') . ',' . config('mppdef.port_max');
            if(Validate::checkRule(Request::param()['port'], $valistr)) {
                $user->port = Request::param()['port'];
            } else {
                $error[] = ['key'=>'port', 'error'=>'端口必须为' . config('mppdef.port_min') . '到' . config('mppdef.port_max') . '之间的数字'];
            }
        }
        if(!Validate::checkRule(Request::param()['passwd'],'require|chsAlphaNum|length:1,25')) {
            $error[] = ['key'=>'passwd', 'error'=>'必须为1-25位中英文或数字组合'];
        } else {
            $user->passwd = Request::param()['passwd'];
        }
        $user->method = Request::param()['method'];
        $user->protocol = Request::param()['protocol'];
        $user->protocol_param = Request::param()['protocol_param'];
        $user->obfs = Request::param()['obfs'];
        $user->obfs_param = Request::param()['obfs_param'];
        if(!Validate::checkRule(Request::param()['enable'],'number|Between:0,1')) {
            $error[] = ['key'=>'enable', 'error'=>'必须一个选择状态'];
        } else {
            $user->enable = Request::param()['enable'];
        }
        if(count($error) > 0) {
            return $error;
        }
        if($user->save()) {
            return "LOL";
        } else {
            return '未知错误,请联系开发人员';
        }
    }

    public function user_delete() {
        $user = NULL;

        if(Request::has('id','post')) {
            if(UserModel::where('id', Request::param()['id'])->find()) {
                $user = UserModel::get(Request::param()['id']);
            } else {
                return '错误的用户id';
            }
        } else {
            return '需要给定用户id';
        }

        if($user->delete() && Code::delete_with_user($user->reg_code)) {
            return 'LOL';
        } else {
            return '未知错误,请联系开发人员';
        }
    }

    static public function find_used($code) {
        return UserModel::where('reg_code', $code)->find();
    }

    static public function pox_last_ol($user) {
        return date('Y-m-d h:i', Db::table('user_traffic_log')->where('user_id', $user->id)->order('log_time', 'desc')->find()['log_time']);
    }

    static public function update_code_head() {
        $user = self::fast_user();
        if(!Validate::checkRule(Request::param()['head'],'require|chsAlphaNum|length:1,5')) {
            return '必须为1-5位中英文或数字组合';
        }
        if($user->code_head == Request::param()['head']) {
            return "LOL";
        }
        $user->code_head = Request::param()['head'];
        if($user->save()) {
            return "LOL";
        } else {
            return '未知错误,请联系开发人员';
        }
    }

    public function update_password() {
        $user = NULL;
        if(Session::has('name')) {
            $user = self::fast_user();
            if(Request::param()['code'] == $user->reg_code) {
                if(!Validate::checkRule(Request::param()['password'],'require|chsAlphaNum|length:1,25')) {
                    return '密码必须为1-25位数字与字母组合';
                }
            } else {
                return '邀请码错误';
            }
        } else {
            $user = self::find_used(Request::param()['code']);
            if(!$user) {
                return '邀请码错误';
            }
        }
        $user->pass = password_hash(Request::param()['password'], PASSWORD_BCRYPT);
        
        if($user->save()) {
            return "LOL";
        } else {
            return '未知错误,请联系开发人员';
        }
    }
}