<?php
namespace app\mpanel\controller;
use think\facade\Request;
use app\mpanel\controller\User;
use app\mpanel\controller\Tools;
use app\mpanel\model\Code as CodeModel;

class Code{
    public function validation($codenum) {
        return CodeModel::where('code', $codenum)->find();
    }
    
    public function discard($codenum) {
        $code = CodeModel::where('code', $codenum)->find();
        $code->enable = 0;
        $code->save();
    }

    static public function code_list($user) {
        return CodeModel::where('author', $user->id)->order('enable');
    }

    static public function one($id) {
        return CodeModel::get($id);
    }

    public function code_delete() {
        $code = NULL;

        if(Request::has('id','post')) {
            if(CodeModel::where('id', Request::param()['id'])->find()) {
                $code = CodeModel::get(Request::param()['id']);
                if($code->enable == 0) {
                    return '不可以删除已被使用的邀请码';
                }
            } else {
                return '错误的邀请码id';
            }
        } else {
            return '需要给定邀请码id';
        }

        if($code->delete()) {
            return 'LOL';
        } else {
            return '未知错误,请联系开发人员';
        }
    }

    public function add() {
        $user = User::fast_user();
        $code = new CodeModel();
        do {
            $codenum = $user->code_head . Tools::rand_string(15);
        } while(!empty(CodeModel::where('code', $codenum)->find()));
        $code->code = $codenum;
        $code->author = $user->id;
        $code->enable = 1;
        $code->time = time();
        
        if($code->save()) {
            return 'LOL';
        } else {
            return '未知错误,请联系开发人员';
        }
    }

    static public function delete_with_user($code) {
        $code = CodeModel::where('code', $code)->find();
        return $code->delete();
    }

    static public function enable_code($user) {
        return count(CodeModel::where('author', $user->id)->where('enable', 1)->all());
    }
}
