<?php
namespace app\mpanel\controller;
use think\Controller;
use Config;
use app\mpanel\controller\User;
use app\mpanel\controller\Node;
use app\mpanel\controller\Code;
use app\mpanel\controller\Announcement;
use app\mpanel\controller\Tools;

class Index extends Controller {
    protected $middleware = ['app\mpanel\middleware\Auth'];
    
    protected function initialize() {
        if(User::is_login()) {
            $this->assign('sitename', config('mppdef.sitename'));
            $this->assign('invite', User::fast_user()->reg_by);
            $this->assign('username', User::fast_user()->name);
        }
    }
    
    public function index() {
        $annos = Announcement::new();
        $this->assign('annos', $annos);
        $user = User::fast_user();
        $user->ds = Tools::size_to_string($user->d);
        $user->transfer_enables = Tools::size_to_string($user->transfer_enable);
        $user->enable_code = Code::enable_code($user);
        $user->pox_last_ol = User::pox_last_ol($user);
        $this->assign('user', $user);
        return $this->fetch();
    }
    
    public function announcement_manage($page = 1) {
        $announcements = Announcement::all()->paginate(10, false, ['page' => $page]);
        $this->assign('announcements', $announcements);
        $this->assign('count', ceil($announcements->total() / 10));
        $this->assign('page', $page);
        return $this->fetch();
    }

    public function announcement_add() {
        return $this->fetch();
    }

    public function announcement_edit($id) {
        $announcement = Announcement::one($id);
        $this->assign('announcement', $announcement);
        return $this->fetch();
    }
    
    public function node_manage($page = 1) {
        $nodes = Node::all()->paginate(10, false, ['page' => $page]);
        $this->assign('nodes', $nodes);
        $this->assign('count', ceil($nodes->total() / 10));
        $this->assign('page', $page);
        return $this->fetch();
    }
    
    public function node_add() {
        return $this->fetch();
    }

    public function node_edit($id) {
        $node = Node::one($id);
        $this->assign('node', $node);
        return $this->fetch();
    }

    public function user_manage($page = 1) {
        $users = User::all()->paginate(10, false, ['page' => $page]);
        $this->assign('users', $users);
        $this->assign('count', ceil($users->total() / 10));
        $this->assign('page', $page);
        return $this->fetch();
    }

    public function user_edit($id) {
        $user = User::one($id);
        $this->assign('user', $user);
        return $this->fetch();
    }

    public function node_list() {
        $user = User::fast_user();
        $nodes = Node::node_list($user);
        $this->assign('nodes', $nodes);
        return $this->fetch();
    }

    public function code_list($page = 1) {
        $user = User::fast_user();
        $codes = Code::code_list($user)->paginate(10, false, ['page' => $page]);
        foreach($codes as $key=>$code) {
            $codes[$key]->used = User::find_used($code->code)['name'];
        }
        $this->assign('codes', $codes);
        $this->assign('user', $user);
        $this->assign('count', ceil($codes->total() / 10));
        $this->assign('page', $page);
        return $this->fetch();
    }
}
