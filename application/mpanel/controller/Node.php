<?php
namespace app\mpanel\controller;
use think\Db;
use think\facade\Request;
use think\facade\Validate;
use app\mpanel\controller\Tools;
use app\mpanel\model\Node as NodeModel;

class Node{
    public function update(){
        $error = [];
        $node = NULL;
        if(Request::has('id','post')) {
            if(NodeModel::where('id', Request::param()['id'])->find()) {
                $node = NodeModel::get(Request::param()['id']);
            } else {
                return '错误的节点id';
            }
        } else {
            $node = new NodeModel();
        }
        if(!Validate::checkRule(Request::param()['name'],'require|chsAlphaNum|length:1,25')) {
            $error[] = ['key'=>'name', 'error'=>'必须为1-25位中英文或数字组合'];
        }
        $node->name = Request::param()['name'];
        if(!Validate::checkRule(Request::param()['server'],'require')) {
            $error[] = ['key'=>'server', 'error'=>'必须为有效的域名或ip'];
        }
        $node->server = Request::param()['server'];
        if(!empty(Request::param()['ip'])) {
            if(!Validate::checkRule(Request::param()['ip'],'ip')) {
                $error[] = ['key'=>'ip', 'error'=>'必须为有效的ip'];
            }
            $node->ip = ip2long(Request::param()['ip']);
        } else {
            if(!Validate::checkRule(gethostbyname(Request::param()['server']), 'ip')) {
                $error[] = ['key'=>'ip', 'error'=>'无法从节点地址获取正确的ip'];
            }
            $node->ip = ip2long(gethostbyname(Request::param()['server']));
        }
        $node->info = Request::param()['info'];
        if(!empty(Request::param()['traffic_rate'])) {
            if(!Validate::checkRule(Request::param()['traffic_rate'],'float')) {
                $error[] = ['key'=>'traffic_rate', 'error'=>'必须为整数或小数'];
            }
            $node->traffic_rate = Request::param()['traffic_rate'];
        } else {
            $node->traffic_rate = config('mppdef.traffic_rate');
        }
        if(!empty(Request::param()['sort'])) {
            if(!Validate::checkRule(Request::param()['sort'],'number|Between:0,99')) {
                $error[] = ['key'=>'sort', 'error'=>'必须为0-99之间数字'];
            }
            $node->sort = Request::param()['sort'];
        } else {
            $node->sort = 0;
        }
        if(!Validate::checkRule(Request::param()['enable'],'number|Between:0,1')) {
            $error[] = ['key'=>'enable', 'error'=>'必须一个选择状态'];
        }
        $node->enable = Request::param()['enable'];
        if(count($error) > 0) {
            return $error;
        }
        if($node->save()) {
            return "LOL";
        } else {
            return '未知错误,请联系开发人员';
        }
    }
    
    public function open($id) {
        $Node = NodeModel::where('id', $id)->find();
        $Node->enable = 1;
        return $Node->save();
    }

    public function close($id) {
        $Node = NodeModel::where('id', $id)->find();
        $Node->enable = 0;
        return $Node->save();
    }

    static public function all() {
        return NodeModel::where(1, 1);
    }

    static public function one($id) {
        return NodeModel::get($id);
    }

    public function node_delete() {
        $node = NULL;

        if(Request::has('id','post')) {
            if(NodeModel::where('id', Request::param()['id'])->find()) {
                $node = NodeModel::get(Request::param()['id']);
            } else {
                return '错误的节点id';
            }
        } else {
            return '需要给定节点id';
        }

        if($node->delete()) {
            return 'LOL';
        } else {
            return '未知错误,请联系开发人员';
        }
    }

    static public function node_list($user) {
        $nodes = NodeModel::where('enable', 1)->order('sort', 'desc')->all();
        foreach($nodes as $key=>$node) {
            $temp = (Object) [];
            $connect_info = Db::table('ss_node_online_log')->where('node_id', $node->id)->order('log_time', 'desc')->find();
            $nodes[$key]->connetc_num = $connect_info['online_user'] <=> 0;
            $nodes[$key]->SSlink = 'ss://' . Tools::base64url_encode($user->method . ':' . $user->passwd . '@' . $node->server . ':' . $user->port) . '#' . $node->name;
            $param64 = '';
            if(!empty($user->protocol_param)) {
                $param64 .= '&protoparam=' . Tools::base64url_encode($user->protocol_param);
            }
            if(!empty($user->obfs_param)) {
                $param64 .= '&obfsparam=' . Tools::base64url_encode($user->obfs_param);
            }
            $param64 .= '&remarks=' . Tools::base64url_encode($node->name);
            $param64 .= '&group=' . Tools::base64url_encode(config('mppdef.sitename'));
            if(!empty($param64)) {
                $param64 = '/?' . substr($param64, 1);
            }
            $nodes[$key]->SSRlink = 'ssr://' . Tools::base64url_encode($node->server . ':' . $user->port . ':' . $user->protocol . ':' . $user->method . ':' . $user->obfs . ':' . Tools::base64url_encode($user->passwd) . $param64);
        }
        return $nodes;
    }
}
